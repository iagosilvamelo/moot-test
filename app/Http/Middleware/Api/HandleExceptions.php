<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class HandleExceptions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            return $next($request);

        } catch (Throwable $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
                'code' => $exception->getCode() ?: Response::HTTP_INTERNAL_SERVER_ERROR,
                'trace' => config('app.debug') ? $exception->getTrace() : null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
