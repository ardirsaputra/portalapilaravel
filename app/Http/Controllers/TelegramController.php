<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API;

class TelegramController extends Controller
{
    function __construct()
    {
        $this->middleware('token');
    }
    public function msg(Request $request)
    {
        $req = $request->all();
        if (isset($req['pesan'])) {
            $validator = Validator::make($req, ['pesan' => 'required']);
            $uri = "localhost:7897/msg?pesan=" . $req['pesan'];
            return API::sendOrError($validator, $uri);
        }
        return '{ status : "uri tidak valid"}';
    }
    public function server(Request $request)
    {
        $req = $request->all();
        if (isset($req['pesan'])&&isset($req['server'])) {
            $validator = Validator::make($req, ['pesan' => 'required', 'server' => 'required']);
            $uri = "localhost:7897/msg?pesan=" . $req['pesan'] . "&server=" . $req['server'];
            return API::sendOrError($validator, $uri);
        }
        return '{ status : "uri tidak valid"}';
    }
    public function port(Request $request)
    {
        $req = $request->all();
        if (isset($req['pesan']) && isset($req['port'])) {
            $validator = Validator::make($req, ['pesan' => 'required', 'port' => 'required']);
            $uri = "localhost:7897/msg?pesan=" . $req['pesan'] . "&port=" . $req['port'];
            return API::sendOrError($validator, $uri);
        }
        return '{ status : "uri tidak valid"}';
    }
    public function user(Request $request)
    {
        $req = $request->all();
        if (isset($req['pesan']) && isset($req['user'])) {
            $validator = Validator::make($req, ['pesan' => 'required', 'user' => 'required']);
            $uri = "localhost:7897/msg?pesan=" . $req['pesan'] . "&service=" . $req['service'];
            return API::sendOrError($validator, $uri);
        }
        return '{ status : "uri tidak valid"}';
    }
    public function service(Request $request)
    {
        $req = $request->all();
        if (isset($req['pesan']) && isset($req['service'])) {
            $validator = Validator::make($req, ['pesan' => 'required', 'service' => 'required']);
            $uri = "localhost:7897/msg?pesan=" . $req['pesan'] . "&service=" . $req['service'];
            return API::sendOrError($validator, $uri);
        }
        return '{ status : "uri tidak valid"}';
    }
}