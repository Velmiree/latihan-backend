<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class TolakUserAgentKosong
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->userAgent()) {
            return response()->json([
                'message' => 'User-Agent wajib diisi',
            ], 400);
        }

        return $next($request);
    }
}