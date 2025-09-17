<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegalController extends Controller
{
    public function privacyPolicy()
    {
        return view('pages.privacy-policy');
    }

    public function cookiePolicy()
    {
        return view('pages.cookie-policy');
    }

    public function termsOfService()
    {
        return view('pages.terms-of-service');
    }
}
