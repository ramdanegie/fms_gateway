<?php

namespace App\Client;

use Illuminate\Support\Facades\Http;

class TmsDesktop
{
    const base_url       = "http://gateway-cl.com/api";
    const addr_quotation = "/quotation_gateway";
    const API_KEY        = "gateway-fms";

    /**
     *  PAYLOAD EXAMPLE
     *  booking_code        = GTW-202212345
     *  type_of_booking     = EXPORT
     *  mode                = FCL
     *  movement_type       = Door to door
     *  incoterm            = DDU
     *  origin_country      = INDONESIA
     *  origin_city         = TG. PRIOK, JAKARTA
     *  destination_country = JAPAN
     */
    public static function createQuotation(&$error, array $payload)
    {
        $payload['X-API-KEY'] = self::API_KEY;
        $response = Http::asForm()->post(self::base_url . self::addr_quotation, $payload);

        if ($response->status() == 500) {
            $error = "API : " . $response->getReasonPhrase();
            return false;
        }

        if ($response->status() == 201 || $response->status() == 200) {
            return true;
        }

        $error = "API : " . $response->getReasonPhrase();
        return false;
    }

    public static function deleteQuotation(&$error, string $booking_code)
    {
        $payload = [
            'X-API-KEY' => self::API_KEY,
            'booking_code' => $booking_code,
        ];

        $response = Http::asForm()
            ->delete(self::base_url . self::addr_quotation, $payload);

        if ($response->status() == 500) {
            $error = "API : " . $response->getReasonPhrase();
            return false;
        }

        if ($response->status() == 201 || $response->status() == 200) {
            return true;
        }

        $error = "API : " . $response->getReasonPhrase();
        return false;
    }
}
