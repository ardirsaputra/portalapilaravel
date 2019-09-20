<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;

class API extends Controller {
    public static function sendAPI($uri)
    {
        try {
            $client2 = new \GuzzleHttp\Client();
            $request = $client2->request('GET', $uri);
            return $request->getBody();
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            return '{ status : "gagal terhubung" }';
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            return '{ status : "respon buruk" }';
        }
    }
    public static function sendOrError(Validator $validator, $uri)
    {
        if ($validator->passes()) {
            return self::sendAPI($uri);
        } else {
            return $validator->errors();
        }
    }
}