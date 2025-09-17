<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function acceptCookies(Request $request)
    {
        $response = response()->json(['status' => 'success']);

        // Set cookie consent for 1 year
        $response->cookie('cookie_consent', 'accepted', 525600, '/', null, false, false);

        return $response;
    }

    public function rejectCookies(Request $request)
    {
        $response = response()->json(['status' => 'success']);

        // Set cookie consent as rejected
        $response->cookie('cookie_consent', 'rejected', 525600, '/', null, false, false);

        return $response;
    }

    public function cookieSettings()
    {
        return view('pages.cookie-settings');
    }

    public function updateCookieSettings(Request $request)
    {
        $settings = $request->only([
            'necessary',
            'analytics',
            'marketing',
            'preferences'
        ]);

        $response = response()->json(['status' => 'success']);
        $response->cookie('cookie_preferences', json_encode($settings), 525600, '/', null, false, false);

        return $response;
    }
}
