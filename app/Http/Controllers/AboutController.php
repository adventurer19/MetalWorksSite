<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $companyData = [
            'founded' => '1998',
            'employees' => '300+',
            'facility_size' => '45,000',
            'certifications' => [
                'ISO 9001:2015',
                'ISO 14001:2015',
                'ISO 45001:2018'
            ],
            'markets' => [
                'Bulgaria',
                'Europe',
                'Middle East',
                'Africa'
            ]
        ];

        return view('pages.about', compact('companyData'));
    }
}
