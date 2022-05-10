<?php

namespace App\Client;

use App\Exceptions\FmsException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

use function GuzzleHttp\json_decode;

class Tms {

    private $base_api;
    private $token = null;
    private $token_key = "token";

    public function __construct() {
        $this->base_api = config("tms.base_api");
        if (Cache::has($this->token_key)) {
            $this->token = Cache::get($this->token_key);
        }
    }

    public function getToken(&$error) {
 
        if (!empty($this->token)) {
            return $this->token;
        }

        $response = Http::asForm()->post($this->base_api . config("tms.end_points.get_token"), [
            "username" => config("tms.auth.username"),
            "password" => config("tms.auth.password"),
            "domain_name" => config("tms.auth.domain")
        ]);

        if (!$response->ok()) {
            $error = "TMS API: Unable to get token " . join("", ["username=", config("tms.auth.username"), "&password=", config("tms.auth.password"), "&domain_name=", config("tms.auth.domain")]);
            return null;
        }
// dd();
        $this->token = $response->json()['data']['token'];
        if (!empty($this->token)) {
            Cache::put($this->token_key, $this->token, 3600); // set token for next 1 hour
        }

        return $this->token;
    }

    public function getDetailOrder(string $order_number) {
        $response = Http::get($this->base_api . config("tms.end_points.detail_order"), [
                    "order_number" => $order_number
        ]);

        if (!$response->ok()) {
            $error = "TMS API: Unable to get detail order";
            return null;
        }

        return [];
    }

    public function createOrder(&$error, array $payload) {
        $token = $this->getToken($error);
        if (!empty($error)) {
            return null;
        }
    //     $jsonPayload = json_encode([
    //         "customer_name:". $payload["customer_name"],
    //         "shipment_number:". $payload["shipment_number"],
    //         "departure_time:". $payload["departure_time"],
    //         "fleet_category:". $payload["fleet_category"],
    //         "fleet_type:". $payload["fleet_type"],
    //         "origins.address_name:". $payload["origins.address_name"],
    //         "destinations.address_name:". $payload["destinations.address_name"],
    //         "items.name:". $payload["items.name"],
    //         "items.qty:". $payload["items.qty"],
    //         "items.volume:". $payload["items.volume"],
    //         "items.weight:". $payload["items.weight"],
    //         "note:". $payload["note"]
    // ]);
    //     $response = Http::
    //     withHeaders([
    //         "Authorization"=> "Bearer {$token}",
    //         'Content-Type'=> 'multipart/form-data' 
    //     ])
    //     ->post($this->base_api . config("tms.end_points.create_order"), $jsonPayload);
        
        ## PHP CURL ##
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->base_api . config("tms.end_points.create_order"));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "customer_name"=> $payload["customer_name"],
            "shipment_number"=> $payload["shipment_number"],
            "departure_time"=> $payload["departure_time"],
            "fleet_category"=> $payload["fleet_category"],
            "fleet_type"=> $payload["fleet_type"],
            "origins.address_name"=> $payload["origins.address_name"],
            "destinations.address_name"=> $payload["destinations.address_name"],
            "items.name"=> $payload["items.name"],
            "items.qty"=> $payload["items.qty"],
            "items.volume"=> $payload["items.volume"],
            "items.weight"=> $payload["items.weight"],
            "note"=> $payload["note"]
        ));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            // "Content-Type: /form-data",
            "Authorization: Bearer {$token}"
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);


        curl_close($ch);

        // if ($http_status == 500) {
        //     $error = "TMS API: Internal server error, payload = " . http_build_query([
        //                 "customer_name" => $payload["customer_name"],
        //                 "shipment_number" => $payload["shipment_number"],
        //                 "departure_time" => $payload["departure_time"],
        //                 "fleet_category" => $payload["fleet_category"],
        //                 "fleet_type" => $payload["fleet_type"],
        //                 "origins.address_name" => $payload["origins.address_name"],
        //                 "destinations.address_name" => $payload["destinations.address_name"],
        //                 "items.name" => $payload["items.name"],
        //                 "items.qty" => $payload["items.qty"],
        //                 "items.volume" => $payload["items.volume"],
        //                 "items.weight" => $payload["items.weight"],
        //                 "note" => $payload["note"],
        //     ]);
        //     return [];
        // }

        if ($http_status == 400) {
            dd($server_output);
            $error = "TMS API: Error code 400.";
            
            return [];
        }
// dd($http_status);
        if(!$response->ok()){
            dd($response->json());
            $error = 'TMS API : ' .$response->json()['message'];
            // dd($error);
            return [];
        }
// dd($server_output);
## PHP CURL ##
## PHP GUZZLE ##
// $response = Http::asForm()->withToken($token)->post($this->base_api . config("tms.end_points.create_order"), [
//     "customer_name"             => $payload["customer_name"],
//     "shipment_number"           => $payload["shipment_number"],
//     "departure_time"            => $payload["departure_time"],
//     "fleet_category"            => $payload["fleet_category"],
//     "fleet_type"                => $payload["fleet_type"],
//     "origins.address_name"      => $payload["origins.address_name"],
//     "destinations.address_name" => $payload["destinations.address_name"],
//     "items.name"                => $payload["items.name"],
//     "items.qty"                 => $payload["items.qty"],
//     "items.volume"              => $payload["items.volume"],
//     "items.weight"              => $payload["items.weight"],
//     "note"                      => $payload["note"],
// ]);
// if ($response->status() == "500") {
//     $error = "TMS API: Internal Server Error payload: " . json_encode([
//         "customer_name"             => $payload["customer_name"],
//         "shipment_number"           => $payload["shipment_number"],
//         "departure_time"            => $payload["departure_time"],
//         "fleet_category"            => $payload["fleet_category"],
//         "fleet_type"                => $payload["fleet_type"],
//         "origins.address_name"      => $payload["origins.address_name"],
//         "destinations.address_name" => $payload["destinations.address_name"],
//         "items.name"                => $payload["items.name"],
//         "items.qty"                 => $payload["items.qty"],
//         "items.volume"              => $payload["items.volume"],
//         "items.weight"              => $payload["items.weight"],
//         "note"                      => $payload["note"],
//     ]);
//     return null;
// }
// if (!$response->ok()) {
//     $error = "TMS API: Unable to create order";
//     return null;
// }
## PHP GUZZLE ##

        return [];
    }

}
