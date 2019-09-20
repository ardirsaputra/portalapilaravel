<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controller\API;

class AllController extends Controller
{
    public function port(Request $request)
    {
        $req = $request->all();
        if (isset($req['port']) && isset($req['email'])) {
            $validator = Validator::make($req, ['email' => 'required', 'port' => 'required']);
            // Telegram
            $uri = "localhost:7897/msg?pesan=Port Error&port=" . $req['port'];
            $status = API::sendOrError($validator, $uri);
            // Email
            $emaillist = explode(",", $req['email']);
            $jumlahemail = count($emaillist);
            for ($i = 0; $i < $jumlahemail; $i++) {
                $uri = "localhost:7000/data/error_port/" . $emaillist[$i] . "/" . $req['port'];
                $status .= ',' . API::sendOrError($validator, $uri);
            }
            return $status;
        }
        return '{ status : "uri tidak valid"}';
    }
}