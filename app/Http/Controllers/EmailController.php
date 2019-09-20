<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API;

class EmailController extends Controller
{
    function __construct()
    {   
        $this->middleware('token');
    }
    public function port(Request $request)
    {
        $req = $request->all();
        if (isset($req['port']) && isset($req['email'])) {
            $validator = Validator::make($req, ['pesan' => 'required', 'service' => 'required']);
            $emaillist = explode(",",$req['email']);
            $jumlahemail = count($emaillist);
            $status = '';
            for ($i=0; $i < $jumlahemail; $i++) {
                $uri = "localhost:7000/data/error_port/".$emaillist[$i]."/".$req['port'];
                if($i == 0 ){
                    $status .= API::sendOrError($validator, $uri);
                }else{
                    $status .= ','. API::sendOrError($validator, $uri);
                }
            }
            return $status;
        }
        return '{ status : "uri tidak valid"}';
    }
}
