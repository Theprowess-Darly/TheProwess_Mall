<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use NotchPay\NotchPay;
use NotchPay\Payment;

class PaymentCallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd('here', $request->all());
        // get transaction details
        $transaction = Transaction::where('reference', $request->get('reference'))->first();

        // verify transaction status
        NotchPay::setApiKey(apiKey: config('services.nochtpay'));
        $pay = Payment::verify($request->reference);

        // dd($transaction, $pay);

        //change transaction status
        $transaction->status = $pay->transaction->status;
        $transaction->save();

        // Update order payment status
        $order = Order::find($transaction->order_id);
        if ($order) {
            $order->payment_status = $pay->transaction->status;
            $order->save();
            
            // send email notification to client
            // if ()
            //     $user = $order->user;
                
            //     mail()::to($user->email)->send(new OrderConfirmation($order));
                
            // //     Log::info('Email de confirmation envoyé à ' . $user->email . ' pour la commande #' . $order->id);
            // } catch (\Exception $e) {
            //     Log::error('Erreur lors de l\'envoi de l\'email: ' . $e->getMessage());
            // }
        }
        
        // redirect to client.orders
        return redirect()->route('client.orders')
            ->with($pay->status === 'complete' ? 'success' : 'error', 
                  $pay->status === 'complete' ? 
                  'Paiement effectué avec succès' : 
                  'Échec du paiement. Veuillez réessayer.');
    }
}
