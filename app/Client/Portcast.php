<?php 
namespace App\Client;

use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\FuncCall;

class Portcast {
    private static $instance;
    private $addr;
    private $api_key;
    private $_api_container_list = "/v1/eta/tracking/container-bookmarks";

    public static function getInstance()
    {
        if(empty(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct()
    {
        $this->addr = config("portcast.base_addr");
        $this->api_key = config("portcast.api_key");
    }

    public function getListContainer(&$error, string $containerNumber) 
    {
        $response = Http::withHeaders(["x-api-key" => $this->api_key])->get($this->addr . $this->_api_container_list, ["cntr_no" => $containerNumber]);
        if(!$response->ok()) {
            $error = "Failed to get response from API";
            return null;
        }

        return json_decode($response->body());
    }
}