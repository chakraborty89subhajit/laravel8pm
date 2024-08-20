<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $balance = $request->query('balance', 0); // Default to 0 if not present

        // Check if balance is numeric
        if (!is_numeric($balance)) {
            return redirect('denied');
        }

        // Convert to integer if it's numeric
        $balance = (int) $balance;

        // Redirect if balance is greater than 1000
        if ($balance > 1000) {
            return redirect('denied');
        }

        return $next($request);
    }
}
