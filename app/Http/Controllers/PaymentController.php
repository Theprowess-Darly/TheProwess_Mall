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

class PaymentController extends Controller
{
    public function __invoke(Request $request)
    {
        // dd(session()->get('cart'), $request->all());
        $user = Auth::user();
        try{
        DB::beginTransaction();
        // create order
        $order = Order::create([
            'user_id' => $user->id,
            'total_amount' => $request->total_amount,
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'delivery_status' => 'pending',
        ]);

        // todo: save cart in order_items, 
       foreach (session()->get('cart') as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $details['id'],
                'quantity' => $details['quantity'],
                'price' => $details['price'],
            ]);
       }
        
        //create delivery
        Delivery::create([
            'order_id' => $order->id,
            'delivery_address' => $request->address,
            'phone' => $request->phone,
            'status' => 'pending',
            'delivery_person_id' => null,
        ]);

            // payment
            NotchPay::setApiKey(apiKey: config('services.nochtpay'));

            $payload = Payment::initialize([
                'amount' => 50,     //$request->total_amount,
                'email' => $request->email,
                'name' => $request->first_name,
                'currency' => 'xaf',
                'reference' => $user->id.'-'.$user->name.'-'.uniqid(),
                'callback' => route('notchpay-callback'),
                'description' => 'Order Payment Number-'. $order->id,
            ]);

            // create transaction
            $transaction = Transaction::create([
                'order_id' => $order->id,
                'reference' => $payload->transaction->reference,
                'status' => 'pending',
                'amount' => $request->total_amount,
                'currency' => 'xaf',
            ]);

        }catch(Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }

     //   redirect user to payment platform
        DB::commit();
        session()->forget('cart');
        return redirect($payload->authorization_url);
    }




//     array:4 [▼ // app\Http\Controllers\PaymentController.php:21
//   "reference" => "trx.test_HPGO59Jun0HRlUIIJIZIn9fB"
//   "trxref" => "6-Laurent Blair-681a96f36bdea"
//   "notchpay_trxref" => "6-Laurent Blair-681a96f36bdea"
//   "status" => "complete"
// ]

}