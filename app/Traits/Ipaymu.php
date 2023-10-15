<?php
namespace App\Traits;

// use GuzzleHttp\Psr7\Request;

use App\Models\Payment;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait Ipaymu {
    public $va;
    public $apiKey;

    public function __construct()
    {
        $this->va = config('ipaymu.va');
        $this->apiKey = config('ipaymu.api_key');
    }
    public function signature($body,$method)
    {
        $jsonBody     = json_encode($body, JSON_UNESCAPED_SLASHES);
        $requestBody  = strtolower(hash('sha256', $jsonBody));
        $stringToSign = strtoupper($method) . ':' . $this->va . ':' . $requestBody . ':' . $this->apiKey;
        $signature    = hash_hmac('sha256', $stringToSign, $this->apiKey);

        return $signature;
    }
    protected function balance()
    {
        $va           = $this->va; //get on iPaymu dashboard
        $url          = 'https://sandbox.ipaymu.com/api/v2/balance'; // for development mode     
        $method       = 'POST'; //method     
        $timestamp    = Date('YmdHis');
        $body['account']    = $va;
        $signature    = $this->signature($body,$method);

        $headers = array(
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'va' => $va,
            'signature' => $signature,
            'timestamp' => $timestamp
        );

        $data_request = Http::withHeaders(
            $headers
        )->post($url, [
            'account' => $va
        ]);

        $responser = $data_request->object();

        // $balance = json_decode($responser);

        return $responser;
    }

    public function redirect_payment($id)
    {
        $va           = $this->va; //get on iPaymu dashboard
        $url          = 'https://sandbox.ipaymu.com/api/v2/payment'; // for development mode     
        $method       = 'POST'; //method
        $timestamp    = Date('YmdHis');

        $user         = User::find($id);

        // $body['name']         = $user->name;
        // $body['phone']        = $user->nomor;
        $body['product'][]       = 'Pendaftaran';
        $body['qty'][]           = 1;
        $body['price'][]         = 100000;
        $body['referenceId']     = 'ID-PPDB-'.rand(1111,9999);
        $body['returnUrl']       = route('callback.return');
        $body['notifyUrl']       = 'https://3d62-149-108-82-66.ngrok-free.app/callback/notify';
        $body['cancelUrl']       = route('callback.cancel');
        $body['paymentChannel']  = 'qris';
        $body['expired']         = 24;
        $body['buyerName']       = $user->name;
        $body['buyerPhone']      = $user->nomor;
        if ($user->email) {
            $body['buyerEmail']  = $user->email;
        }
        
        $signature               = $this->signature($body,$method);

        $headers = array(
            'Content-Type'       => 'application/json',
            'signature'          => $signature,
            'va'                 => $va,
            'timestamp'          => $timestamp
        );

        $data_request = Http::withHeaders($headers)->post($url,$body);
        $response     = $data_request->object();

        return $response;
    }
}