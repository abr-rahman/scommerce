<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorCountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! isset($_COOKIE['visit_date'])) {
            setcookie('visit_date', time() + 60 * 60 * 24);
            Visitor::firstOrCreate([
                'ip' => $request->ip(),
                'visit_date' => today(),
            ]);
        }

        return $next($request);
    }
}
