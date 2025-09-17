<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        // Check if first segment is a valid locale
        if (in_array($locale, ['bg', 'en'])) {
            App::setLocale($locale);
            Session::put('locale', $locale);
        } else {
            // Default to Bulgarian if no locale specified
            App::setLocale('bg');
        }

        return $next($request);
    }
}
