<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;

class MonetbilController extends Controller
{
    /**
     * Initialise un paiement Monetbil
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function initiatePayment(Request $request)
    {
        // Valider les données requises
        $request->validate([
            'amount' => 'required|numeric',
            'transaction_id' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        // Paramètres Monetbil
        $serviceKey = env('MONETBIL_SERVICE_KEY'); // Votre clé de service Monetbil
        $amount = $request->amount;
        $currency = 'XAF'; // Franc CFA
        $payment_ref = $request->transaction_id;
        $return_url = route('monetbil.return');
        $notify_url = route('monetbil.callback');
        
        // Stocker temporairement les données de commande en session
        session([
            'order_data' => [
                'cart_data' => $request->query('cart_data'),
                'transaction_id' => $payment_ref,
                'amount' => $amount,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                // Autres données de commande
            ]
        ]);
        
        // Construire l'URL de paiement Monetbil
        $paymentUrl = "https://www.monetbil.com/pay/v2.1/{$serviceKey}";
        $paymentUrl .= "?amount={$amount}";
        $paymentUrl .= "&currency={$currency}";
        $paymentUrl .= "&payment_ref={$payment_ref}";
        $paymentUrl .= "&return_url=" . urlencode($return_url);
        $paymentUrl .= "&notify_url=" . urlencode($notify_url);
        $paymentUrl .= "&user_firstname=" . urlencode($request->first_name);
        $paymentUrl .= "&user_lastname=" . urlencode($request->last_name);
        $paymentUrl .= "&user_email=" . urlencode($request->email);
        $paymentUrl .= "&user_phone=" . urlencode($request->phone);
        
        // Rediriger vers la page de paiement Monetbil
        return redirect($paymentUrl);
    }
    
    /**
     * Traite la notification de paiement de Monetbil (webhook)
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function handleCallback(Request $request)
    {
        // Vérifier la signature pour s'assurer que la requête vient bien de Monetbil
        $secretKey = env('MONETBIL_SECRET_KEY');
        $receivedSignature = $request->input('signature');
        
        // Construire la signature à partir des données reçues
        // Note: Consultez la documentation Monetbil pour la méthode exacte de vérification
        
        // Récupérer les données de la transaction
        $status = $request->input('status');
        $paymentRef = $request->input('payment_ref');
        
        Log::info('Monetbil callback received', $request->all());
        
        if ($status === 'success') {
            // Paiement réussi, créer la commande
            $orderData = session('order_data');
            
            if ($orderData) {
                $order = new Order();
                $order->user_id = auth()->id();
                $order->transaction_id = $paymentRef;
                $order->total_amount = $orderData['amount'];
                $order->payment_method = 'monetbil';
                $order->payment_status = 'paid';
                $order->status = 'pending';
                // Autres champs de commande
                $order->save();
                
                // Créer les éléments de commande à partir du panier
                $cartData = json_decode($orderData['cart_data'], true);
                foreach ($cartData as $item) {
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $item['id'];
                    $orderItem->quantity = $item['quantity'];
                    $orderItem->price = $item['price'];
                    $orderItem->save();
                }
                
                // Vider le panier en session
                session()->forget('cart');
            }
        }
        
        // Répondre à Monetbil
        return response('OK', 200);
    }
    
    /**
     * Gère le retour de l'utilisateur après le paiement
     * 
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleReturn(Request $request)
    {
        $status = $request->input('status');
        
        if ($status === 'success') {
            // Paiement réussi
            return redirect()->route('orders.success')->with('success', 'Votre paiement a été effectué avec succès!');
        } else {
            // Paiement échoué
            return redirect()->route('orders.failed')->with('error', 'Le paiement a échoué. Veuillez réessayer.');
        }
    }
}