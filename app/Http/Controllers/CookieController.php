<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CookieController extends Controller
{
    public function acceptCookies(Request $request)
    {
        $cookieValue = json_encode([
            'consent' => 'accepted',
            'timestamp' => now()->toISOString(),
            'necessary' => true,
            'analytics' => true,
            'marketing' => true,
            'preferences' => true,
        ]);

        $response = response()->json([
            'status' => 'success',
            'message' => 'Cookies accepted'
        ]);

        // Set cookie with proper settings for localhost
        $response->cookie(
            'cookie_consent',
            $cookieValue,
            525600, // 1 year in minutes
            '/', // path
            null, // domain - null for localhost
            false, // secure - false for localhost HTTP
            false, // httpOnly - false so JavaScript can read it
            false, // raw
            'lax' // sameSite
        );

        return $response;
    }

    public function rejectCookies(Request $request)
    {
        $cookieValue = json_encode([
            'consent' => 'rejected',
            'timestamp' => now()->toISOString(),
            'necessary' => true, // Always required
            'analytics' => false,
            'marketing' => false,
            'preferences' => false,
        ]);

        $response = response()->json([
            'status' => 'success',
            'message' => 'Cookies rejected'
        ]);

        // Set cookie with proper settings for localhost
        $response->cookie(
            'cookie_consent',
            $cookieValue,
            525600, // 1 year in minutes
            '/', // path
            null, // domain - null for localhost
            false, // secure - false for localhost HTTP
            false, // httpOnly - false so JavaScript can read it
            false, // raw
            'lax' // sameSite
        );

        return $response;
    }

    public function cookieSettings()
    {
        $locale = app()->getLocale();
        return view('pages.cookie-settings', compact('locale'));
    }

    public function updateCookieSettings(Request $request)
    {
        $request->validate([
            'necessary' => 'boolean',
            'analytics' => 'boolean',
            'marketing' => 'boolean',
            'preferences' => 'boolean',
        ]);

        $settings = [
            'consent' => 'custom',
            'timestamp' => now()->toISOString(),
            'necessary' => true, // Always true
            'analytics' => $request->boolean('analytics', false),
            'marketing' => $request->boolean('marketing', false),
            'preferences' => $request->boolean('preferences', false),
        ];

        $response = response()->json([
            'status' => 'success',
            'message' => 'Cookie preferences updated',
            'settings' => $settings
        ]);

        $response->cookie(
            'cookie_consent',
            json_encode($settings),
            525600, // 1 year in minutes
            '/', // path
            null, // domain - null for localhost
            false, // secure - false for localhost HTTP
            false, // httpOnly - false so JavaScript can read it
            false, // raw
            'lax' // sameSite
        );

        return $response;
    }

    /**
     * Helper method to check if user has given consent
     */
    public static function hasConsent(Request $request): bool
    {
        $consentCookie = $request->cookie('cookie_consent');

        if (!$consentCookie) {
            return false;
        }

        try {
            $consent = json_decode($consentCookie, true);
            return isset($consent['consent']) && in_array($consent['consent'], ['accepted', 'rejected', 'custom']);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Get current cookie preferences
     */
    public static function getPreferences(Request $request): array
    {
        $consentCookie = $request->cookie('cookie_consent');

        $default = [
            'consent' => null,
            'necessary' => true,
            'analytics' => false,
            'marketing' => false,
            'preferences' => false,
        ];

        if (!$consentCookie) {
            return $default;
        }

        try {
            $consent = json_decode($consentCookie, true);
            return array_merge($default, $consent);
        } catch (\Exception $e) {
            return $default;
        }
    }
}
