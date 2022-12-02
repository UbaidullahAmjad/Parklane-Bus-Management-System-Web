<?php
namespace App\Services;

use App\Models\Booking;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class PaypalService
{
   private $client;

   function __construct()
   {
     $clientId = "AaVryo9wE0Zm65N2z1BC_yHOTrfAUsRW81OUSLFtSHGAhDeBNR81Cz7-RUercxOHUmRy8nKCLoggSIB9";
     $clientSecret = "EKmqzscYKVOnDNxSnGv0UVO7kwWsHzuoHVlsyGD11081TvQzHSggBeXskfU3DCY3_2dirolW9NGC7R2T";


    $environment = new SandboxEnvironment($clientId, $clientSecret);
     $this->client = new PayPalHttpClient($environment);
   }

   public function createOrder($orderId)
   {
    $request = new OrdersCreateRequest();

    $request->headers['prefer'] = 'return=representation';
    $request->body = $this->simpleCheckoutData($orderId);
    return $this->client->execute($request);
   }

   public function success($booking)
    {
            
        $request = new OrdersCaptureRequest($booking);
        // dd($request);
        return $this->client->execute($request);
    }

    private function simpleCheckoutData($orderId)
    {

        $booking = Booking::find($orderId);
         return[
                        "intent" => "CAPTURE",
                        "purchase_units" => [[
                            "reference_id" => "webmall_".uniqid(),
                            "amount" => [
                                "value" => "200.00",
                                "currency_code" => "USD"
                            ]
                        ]],
                        "application_context" => [
                            "cancel_url" => route('paypal.cancel'),
                            "return_url" => route('paypal.success',$orderId)
                        ]
                    ];
    }


}
