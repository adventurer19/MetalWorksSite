<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapabilityController extends Controller
{
    public function index()
    {
        // You can add capability data here later
        $capabilities = [
            [
                'name' => 'Laser Cutting',
                'description' => 'Bodor C 12025 20kW laser cutter',
                'capacity' => '25mm steel thickness'
            ],
            [
                'name' => 'Welding',
                'description' => 'Advanced welding capabilities',
                'capacity' => 'Up to 10,000mm length'
            ],
            [
                'name' => 'Mechanical Processing',
                'description' => 'Complete mechanical processing services',
                'capacity' => 'High precision machining'
            ],
            [
                'name' => 'Quality Control',
                'description' => 'Comprehensive testing and inspection',
                'capacity' => 'ISO certified processes'
            ],
            [
                'name' => 'Steel Fabrication',
                'description' => 'Custom steel structure manufacturing',
                'capacity' => 'Large scale projects'
            ],
            [
                'name' => 'Surface Treatment',
                'description' => 'Painting and coating services',
                'capacity' => 'Industrial grade finishes'
            ]
        ];

        return view('pages.capabilities', compact('capabilities'));
    }
}
