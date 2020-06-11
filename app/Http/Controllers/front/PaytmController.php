<?php

namespace App\Http\Controllers\front;

use PaytmWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaytmController extends Controller
{
    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function pay()
    {

        $payment = PaytmWallet::with('receive');
//        dd($payment);
        $payment->prepare([
            'order' => '1',
            'user' => '1',
            'mobile_number' => '9967031001',
            'email' => 'armashfankar@gmail.com',
            'amount' => '20',
            'callback_url' => url('api/payment/status')

        ]);
        return $payment->receive();
//        dd($payment->receive());

    }


    public function paymentCallback()
    {
//        dd('hyy');
        $transaction = PaytmWallet::with('receive');

        $response = $transaction->response(); // To get raw response as object'
//        dd($response);
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm

        if ($transaction->isSuccessful()) {
            dd('Payment Successfully Paid.');
        } else if ($transaction->isFailed()) {
            //Transaction Failed
        } else if ($transaction->isOpen()) {
            //Transaction Open/Processing
        }

        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id
        $transaction->getTransactionId(); // Get transaction id
    }
}
