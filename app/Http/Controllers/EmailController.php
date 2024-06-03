<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    private $apiKey;
    private $fromEmail;

    public function __construct()
    {
//        $this->apiKey = env('ELASTIC_EMAIL_API_KEY');
        $this->apiKey ="1580080E567761238045D49CE90A18992352EF1FB6E30C64E819E0C359D7041C8188A96D8022214626E7ED23B64F1586";
//        $this->fromEmail = env('ELASTIC_EMAIL_FROM_EMAIL');
        $this->fromEmail = "enquiry@interlinks.in";
    }

    function sendEmail2($to, $subject, $message, $from = 'enquiry@interlinx.in') {
        $apiKey = $this->apiKey;
        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', 'https://api.elasticemail.com/v4/emails', [
            'headers' => [
                'Content-Type' => 'application/json',
                'X-ElasticEmail-ApiKey' => $apiKey
            ],
            'json' => [
                'Recipients' => [
                    'To' => $to
                ],
                'Content' => [
                    'Body' => [
                        [
                            'ContentType' => 'HTML',
                            'Charset' => 'utf-8',
                            'Content' => $message
                        ]
                    ]
                ],
                'From' => $from,
                'Subject' => $subject
            ]
        ]);

        $responseBody = json_decode($response->getBody(), true);
        return $responseBody;
    }

    public function sendBulkEmail($subject, $message, $recipients)
    {
        $url = config('elasticemail.api_url');
        $apiKey = config('elasticemail.api_key');
        $fromEmail = config('elasticemail.from_email');
        $fromName = config('elasticemail.from_name');

        try {
            $to = implode(';', $recipients);
            $postData = [
                'from' => $fromEmail,
                'fromName' => $fromName,
                'apikey' => $apiKey,
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $message,
            ];

            $response = Http::asForm()->post($url, $postData);

            if ($response->successful() && $response->json('success')) {
                return response()->json(['message' => 'Emails sent successfully'], 200);
            } else {
                Log::error('Elastic Email Error: ', $response->json());
                return response()->json(['error' => 'Failed to send emails'], 500);
            }
        } catch (\Exception $e) {
            Log::error('Exception caught while sending emails: ', ['message' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred while sending emails'], 500);
        }
    }


    function sendBulkEmail2($subject, $message, $to)
    {
        $url = 'https://api.elasticemail.com/v2/email/send';

        try {
            $to = implode(";", $to);
            $post = array(
                'from' => 'enquiry@interlinx.in', // 'vivek.patil@mmactiv.com',
                'fromName' => "Prawaas",
                'apikey' => 'E3789A39124B6397F3C4290637E5D57F269ACABD51053D992C4B9A44CB0BA59555EA032B359CC27ACFDC566E585FE74D',
                'subject' => $subject,
                'to' => $to,
                'bodyHtml' => $message
            ); //,//'<h1>Html Body</h1>',
            //'bodyText' => 'Text Body');

            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $post,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_SSL_VERIFYPEER => false
            ));

            $result = curl_exec($ch);
            curl_close($ch);

            $data = json_decode($result, true);
            if (isset($data['success']) && $data['success']) {
                //print_r($data);
                return true;
            } else {
                //echo $qr_gt_user_inx_login_data_ans['pri_email'] . '#<br/>';
            }
            echo $result . '#<br/>';
            return false;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function test(){
        try {
        $emailController = new EmailController();
        $to = array('manish.interlink@gmail.com', 'harsh.interlinks@gmail.com'); // This can also be an array of email addresses
        $subject = "Your Subject Here";
        $bodyHtml = "<html><body><h1>This is a test email</h1></body></html>";

        $response = $emailController->sendBulkEmail( $subject, $bodyHtml,$to);

        print_r($response);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }




    public function sendEmail(array $to, string $subject, string $message)
    {
        // Prepare the recipients array
        $recipients = [];
        foreach ($to as $email) {
            $recipients[] = ['Email' => $email];
        }

        // Prepare the request payload
        $payload = [
            'Recipients' => $recipients,
            'Content' => [
                'Body' => $message,
                'Subject' => $subject,
                'From' => 'enquiry@interlinx.in'
            ],
            'Options' => [
                'Transactional' => true
            ]
        ];

//        try {
            // Initialize Guzzle client
            $client = new Client();

            // Send the request to ElasticEmail API
            $response = $client->post('https://api.elasticemail.com/v4/emails', [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'X-ElasticEmail-ApiKey' => $this->apiKey
                ],
                'json' => $payload
            ]);
            Log::info('Email sent successfully', [
                'response' => $response
            ]);

            // Get the response body
            $responseBody = json_decode($response->getBody(), true);
            //$responseBody = json_decode($response->getBody(), true);
            return $responseBody;
            // Return success response
//            return response()->json([
//                'message' => 'Emails sent successfully',
//                'transactionId' => $responseBody['TransactionID'] ?? null,
//                'messageId' => $responseBody['MessageID'] ?? null
//            ], 200);
//        } catch (\Exception $e) {
//            // Log the error
//            Log::error('Failed to send bulk email', [
//                'error' => $e->getMessage()
//            ]);
//
//            // Return error response
//            return response()->json([
//                'message' => 'Failed to send emails',
//                'error' => $e->getMessage()
//            ], 500);
//        }

    }
}
