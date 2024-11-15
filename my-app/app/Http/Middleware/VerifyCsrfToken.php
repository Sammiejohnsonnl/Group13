<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [

        '/admin-create-staff',

    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Log the incoming request token and session token for debugging
        Log::info('Incoming CSRF Token: ' . $request->input('_token'));
        Log::info('Session CSRF Token: ' . $request->session()->token());
    
        // If the CSRF token matches or the request is a GET or OPTIONS request, proceed
        if ($this->isReading($request) || $this->isJson($request) || $this->tokensMatch($request)) {
            return $next($request);
        }
    
        // Log CSRF mismatch error
        Log::error('CSRF token mismatch for request: ' . $request->fullUrl());
    
        // Abort with a 419 error if the CSRF token is invalid
        abort(419, 'Page Expired');
    }
    

    /**
     * Determine if the HTTP request is a read request (GET, HEAD, OPTIONS).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function isReading(Request $request)
    {
        return in_array($request->method(), ['HEAD', 'GET', 'OPTIONS']);
    }

    /**
     * Determine if the request expects a JSON response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function isJson(Request $request)
    {
        return $request->expectsJson();
    }

    /**
     * Determine if the CSRF token in the request matches the session token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function tokensMatch(Request $request)
    {
        return $request->session()->token() === $request->input('_token');
    }

    
}

