<?php

namespace App\Http\Middleware;

use Closure;

class Token
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $tokens  =   [
            '12093801297873jkkasduyf2',
            '123123123123123123123123',
            '123456789101112131415162',
         ];
         $token = in_array($request->token, $tokens, TRUE);
         //if($token == true){
             return $next($request);
        // }
//return "{ status : 'Token tidak dikenal'}";
    }
}
