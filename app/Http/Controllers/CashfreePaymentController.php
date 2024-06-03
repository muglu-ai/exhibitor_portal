<?php

namespace App\Http\Controllers;
//use env file client id CASHFREE_API_KEY

//use env file client secret CASHFREE_SECRET_KEY

//$SANDBOX = "https://sandbox.cashfree.com";
//
//\Cashfree\Cashfree::$XClientId = "TEST430329ae80e0f32e41a393d78b923034";
//\Cashfree\Cashfree::$XClientSecret = "TESTaf195616268bd6202eeb3bf8dc458956e7192a85";
//\Cashfree\Cashfree::$XEnvironment = Cashfree\Cashfree::$SANDBOX;


use App\Models\exhibitor_reg_details;
use Cashfree\Model\OrderEntity;
use Cashfree\Cashfree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CashfreePaymentController extends Controller
{

    public static mixed $XClientId;
    public static mixed $XClientSecret;
    public static mixed $XEnvironment;

    public function __construct()
    {
        self::$XClientId = env('CASHFREE_API_KEY');
        self::$XClientSecret = env('CASHFREE_API_SECRET');
        self::$XEnvironment = env('CASHFREE_ENVIRONMENT');
    }


    public function createOrder($order)
    {
        \Cashfree\Cashfree::$XClientId = "TEST430329ae80e0f32e41a393d78b923034";
        \Cashfree\Cashfree::$XClientSecret = "TESTaf195616268bd6202eeb3bf8dc458956e7192a85";
        \Cashfree\Cashfree::$XEnvironment = Cashfree::$SANDBOX;

        $clientId = Cashfree::$XClientId;

        $amount = $order['amount'];
        $currency = $order['currency'];
        $customer_id = $order['tin_no'];
        $customer_phone = $order['customer_phone'];
        $customer_name = $order['customer_name'];
        $customer_email = $order['customer_email'];
        $customer_address = $order['customer_address'];
        $customer_city = $order['customer_city'];
        $customer_state = $order['customer_state'];
        $customer_zip = $order['customer_zip'];
        $customer_country = $order['customer_country'];

        $cashfree = new \Cashfree\Cashfree();

        $x_api_version = "2023-08-01";
        $create_orders_request = new \Cashfree\Model\CreateOrderRequest();
        $create_orders_request->setOrderAmount($amount);
        $create_orders_request->setOrderCurrency($currency);
        $customer_details = new \Cashfree\Model\CustomerDetails();
        $customer_details->setCustomerId($customer_id);

        $customer_details = new \Cashfree\Model\CustomerDetails();

        $customer_details->setCustomerId("$customer_id");
        $customer_details->setCustomerPhone("$customer_phone");
        $customer_details->setCustomerName("$customer_name");
        $customer_details->setCustomerEmail("$customer_email");

        $create_orders_request->setCustomerDetails($customer_details);

        //return_ur
        $order_meta = new \Cashfree\Model\OrderMeta();
        $order_meta->setReturnUrl("http://127.0.0.1:8000/pay?order_id={order_id}");
        $create_orders_request->setOrderMeta($order_meta);

        try {
            //redirect to payment page with order id


            return json_encode($cashfree->PGCreateOrder($x_api_version, $create_orders_request));
//            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling PGCreateOrder: ', $e->getMessage(), PHP_EOL;
        }

    }
    //paynow view
    public function paynow($order) : string {
        //call $result from createOrder
        $payment_session = $this->createOrder($order);
        // Decode the JSON data
        $data = json_decode($payment_session, true);
        // Access the payment_session_id
        $payment_session_id = $data[0]['payment_session_id'];
        Log::info('id:' . $payment_session_id);
        return $payment_session_id;
        //return view('payment.paynow',compact('payment_session_id'));
    }

    public function paymentRedirect(Request $request)

    {
        \Cashfree\Cashfree::$XClientId = "TEST430329ae80e0f32e41a393d78b923034";
        \Cashfree\Cashfree::$XClientSecret = "TESTaf195616268bd6202eeb3bf8dc458956e7192a85";
        \Cashfree\Cashfree::$XEnvironment = Cashfree::$SANDBOX;

        $payment_session_id = $request->query('order_id');
        //update payment order_id in exhibitor_reg_details table where it matches with tin_no from session
//        $tin_no = session('tin_no');
//        $exhibitor_id = request()->session()->get('exhibitor_id');
            $tin_no = $request->session()->get('tin_no');
        exhibitor_reg_details::where('tin_no', $tin_no)->update(['pg_paymentId' => $payment_session_id]);


        $cashfree = new \Cashfree\Cashfree();
        $x_api_version = "2023-08-01";

        try {
            $pin = '';
            $response = $cashfree->PGOrderFetchPayments($x_api_version, "$payment_session_id");
            $cf_payment_id = $response[0][0]->getCfPaymentId();
            //$order_id
            $failure_msg = '';
            $order_id = $response[0][0]->getOrderId();
            $entity = $response[0][0]->getEntity();
            $is_captured = $response[0][0]->getIsCaptured();
            $order_amount = $response[0][0]->getOrderAmount();
            $payment_group = $response[0][0]->getPaymentGroup();
            $payment_currency = $response[0][0]->getPaymentCurrency();
            $payment_amount = $response[0][0]->getPaymentAmount();
            $payment_time = $response[0][0]->getPaymentTime();
            $payment_completion_time = $response[0][0]->getPaymentCompletionTime();
            $payment_status = $response[0][0]->getPaymentStatus();
            $payment_message = $response[0][0]->getPaymentMessage();
            $bank_reference = $response[0][0]->getBankReference();
            $payment_channel = $response[0][0]->getPaymentMethod()->getUpi()->getChannel();
            $upi_id = $response[0][0]->getPaymentMethod()->getUpi()->getUpiId();

            Log::info("cf_payment_id: $cf_payment_id, order_id: $order_id");
            // Display the payment details
//            Log::info( "cf_payment_id: $cf_payment_id, order_id: $order_id, entity: $entity, is_captured: $is_captured, order_amount: $order_amount, payment_group: $payment_group, payment_currency: $payment_currency, payment_amount: $payment_amount, payment_time: $payment_time, payment_completion_time: $payment_completion_time, payment_status: $payment_status, payment_message: $payment_message, bank_reference: $bank_reference <br>");

            //if payment is success
            if ($payment_status == 'SUCCESS') {
                //generate pin number
                $cf_payment_id = $response[0][0]->getCfPaymentId();
                $msg = "Payment Successful and updates into database";
                $pin = "PIN" . mt_rand(100000, 999999);
                $pay_status = "Paid";
                $total_amount_received = $payment_amount;
                $payment_time = $response[0][0]->getPaymentTime();
                $payment_completion_time = $response[0][0]->getPaymentCompletionTime();
                $bank_reference = $response[0][0]->getBankReference();
                $payment_channel = $response[0][0]->getPaymentMethod()->getUpi()->getChannel();
                $payment_group = $response[0][0]->getPaymentGroup();



                //redirect to success page
                //return response()->json(['response' => 'payment success']);
               // return view('payment.paymentSuccess', compact('cf_payment_id', 'order_id', 'entity', 'is_captured', 'order_amount', 'payment_group', 'payment_currency', 'payment_amount', 'payment_time', 'payment_completion_time', 'payment_status', 'payment_message', 'bank_reference', 'upi_channel', 'upi_id'));
            } else if($payment_status == 'FAILED')
            {
                $cf_payment_id = $response[0][0]->getCfPaymentId();
                $msg = "Payment Failed";
                $pay_status = "Not Paid";
                $total_amount_received = '';
                $pin = '';
                $failure_msg = $payment_message;


                //return response()->json(['response' => 'payment failed']);
                //redirect to failed page
               // return view('payment.paymentFailed', compact('cf_payment_id', 'order_id', 'entity', 'is_captured', 'order_amount', 'payment_group', 'payment_currency', 'payment_amount', 'payment_time', 'payment_completion_time', 'payment_status', 'payment_message', 'bank_reference', 'upi_channel', 'upi_id'));
            }
            else if ($payment_status == 'PENDING')
            {
                $cf_payment_id = $response[0][0]->getCfPaymentId();
                $msg = "Payment Pending - Please wait for the payment to be processed";
                $pay_status = "Pending";
                $total_amount_received = '';
                $pin = '';
                $failure_msg = $payment_message;

                // response()->json(['response' => 'payment pending']);
                //redirect to pending page
                //return view('payment.paymentPending', compact('cf_payment_id', 'order_id', 'entity', 'is_captured', 'order_amount', 'payment_group', 'payment_currency', 'payment_amount', 'payment_time', 'payment_completion_time', 'payment_status', 'payment_message', 'bank_reference', 'upi_channel', 'upi_id'));
            }
            else
            {
                $cf_payment_id = $response[0][0]->getCfPaymentId();
                $msg = "Payment Error";
                $pay_status = "Not Paid";
                $pin_no = '';
                $total_amount_received = '';
                //return response()->json(['response' => 'payment error']);
                //redirect to error page
               // return view('payment.paymentError', compact('cf_payment_id', 'order_id', 'entity', 'is_captured', 'order_amount', 'payment_group', 'payment_currency', 'payment_amount', 'payment_time', 'payment_completion_time', 'payment_status', 'payment_message', 'bank_reference', 'upi_channel', 'upi_id'));
            }

            $pg_response = $msg ." ". $order_id ." " . $entity ." ". $is_captured ." " .$order_amount ." ".  $payment_group ." ". $payment_currency ." ". $payment_amount ." ".  $payment_time ." ". $payment_completion_time . " ". $payment_status ." ". $payment_message ." ". $bank_reference ." ". $payment_channel ." ". $upi_id;

            /* TODO
            Add payment date and time column in exhibitor_reg_details table
            pg_message to be added in exhibitor_reg_details table
            pg_datestamp to be added in exhibitor_reg_details table
            pg_timestamp to be added in exhibitor_reg_details table
            pg_response to be added in exhibitor_reg_details table
            */

            //update exhibitor_reg_details database with payment status where tin_no matches
            exhibitor_reg_details::where('tin_no', $tin_no)->update(['pay_status' => $pay_status, 'total_amt_received' => $total_amount_received, 'pin_no' => $pin, 'pg_paymentId'=> $cf_payment_id, 'pg_timestamp' => $payment_time, 'pg_datestamp' => $payment_completion_time, 'pg_ref' => $bank_reference, 'pg_result' => $payment_message, 'pg_errorText' => $failure_msg, 'pg_response' => $pg_response  ]);

            //return view('payment.paymentResponse', compact('cf_payment_id', 'order_id', 'entity', 'is_captured', 'order_amount', 'payment_group', 'payment_currency', 'payment_amount', 'payment_time', 'payment_completion_time', 'payment_status', 'payment_message', 'bank_reference', 'payment_channel', 'upi_id', 'msg', 'failure_msg'));
            //return route to payment success page with route name paymentSuccess
            return redirect()->route('paymentSuccess');


            return response()->json(['response' => $msg]);

        } catch (Exception $e) {
            echo 'Exception when calling PGOrderFetchPayments: ', $e->getMessage(), PHP_EOL;
        }

//        $payment_session_id = $request->payment_session_id;
//        return response()->json(['payment_session_id' => $payment_session_id]);
//        return view('payment.paymentRedirect', compact('payment_session_id'));
    }
}
