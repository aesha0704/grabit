<?php


namespace App\Http\Controllers;


use App\Order;
use App\Order_invoice;
use App\User;
use PaytmWallet;
use Illuminate\Http\Request;
use App\EventRegistration;


class OrderController extends Controller
{


    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function register()
    {
        return view('register');
    }


    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function order(Request $request)
    {

//dd('hi');

        $this->validate($request, [
            'mobile_no' => 'required|numeric|digits:10',
        ]);
            $price=$request->fee;
        $oi=$request->order_invoice_id;

        $input = $request->all();
        $input['order_id'] = $request->mobile_no.rand(1,100);
        $input['fee'] = $price;
        $input['order_invoice_id']=$oi;
        EventRegistration::create($input);
        $user=$request->user_id;
        User::where('id',$user)->update(['phone'=>$request->mobile_no]);

        $payment = PaytmWallet::with('receive');
        $payment->prepare([
            'order' => $input['order_id'],
            'user' => 'cust_11',
            'mobile_number' => 'your paytm number',
            'email' => 'your paytm email',
            'amount' => $input['fee'],
            'callback_url' => url('api/payment/status')
        ]);
        return $payment->receive();
    }


    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {
        $transaction = PaytmWallet::with('receive');


        $response = $transaction->response();
        $order_id = $transaction->getOrderId();


        if($transaction->isSuccessful()){
            EventRegistration::where('order_id',$order_id)->update(['status'=>2, 'transaction_id'=>$transaction->getTransactionId()]);
           $eid= EventRegistration::where('order_id',$order_id)->first();
           $eeid=$eid->id;
           $oid=$eid->order_invoice_id;
           $order=Order::where('order_invoice_id',$oid)->first();
           $uid=$order->user_id;

//           dd($uid);
            Order_invoice::where('id',$oid)->update(['status'=>'success','transaction_id'=>$transaction->getTransactionId()]);
            Order::where('order_invoice_id',$oid)->update(['status'=>'ORDERED']);
            return redirect()->route('feedback.show',$uid);
//            return view('front.feedback',compact('uid'));
//            dd('Payment Successfully Paid.');
        }else if($transaction->isFailed()){
            EventRegistration::where('order_id',$order_id)->update(['status'=>1, 'transaction_id'=>$transaction->getTransactionId()]);
            return view('front.failed_payment');
        }
    }
}


