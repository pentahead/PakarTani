<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

class JwtMiddleware
{
    public function handle($request, Closure $next)
    {
        try {
            if (!$token = $request->session()->get('jwt_token')) {
                throw new Exception('Token not provided');
            }
            $user = JWTAuth::setToken($token)->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return redirect()->route('login')->withErrors(['error' => 'Token is Invalid']);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return redirect()->route('login')->withErrors(['error' => 'Token is Expired']);
            } else {
                return redirect()->route('login')->withErrors(['error' => 'Authorization Token not found']);
            }
        }
        return $next($request);
    }
}
