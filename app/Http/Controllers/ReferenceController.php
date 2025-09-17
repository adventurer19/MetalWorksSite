<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reference;

class ReferenceController extends Controller
{
    public function index()
    {
        // Sample references data (you'll replace this with database queries later)
        $references = collect([
            [
                'id' => 1,
                'title' => 'Steel Structure Manufacturing Plant',
                'client' => 'Industrial Company A',
                'year' => '2023',
                'description' => 'Complete manufacturing and installation of steel structures for industrial facility',
                'image' => null,
                'category' => 'Industrial',
                'location' => 'Sofia, Bulgaria'
            ],
            [
                'id' => 2,
                'title' => 'Energy Sector Equipment',
                'client' => 'Power Generation Ltd',
                'year' => '2023',
                'description' => 'Custom equipment manufacturing for power generation facility',
                'image' => null,
                'category' => 'Energy',
                'location' => 'Plovdiv, Bulgaria'
            ],
            [
                'id' => 3,
                'title' => 'Metallurgical Equipment',
                'client' => 'MetalWorks International',
                'year' => '2022',
                'description' => 'Specialized equipment for metallurgical processing and handling',
                'image' => null,
                'category' => 'Metallurgy',
                'location' => 'Export Project'
            ],
            [
                'id' => 4,
                'title' => 'Industrial Automation Systems',
                'client' => 'Automation Solutions',
                'year' => '2022',
                'description' => 'Custom automation equipment and control systems',
                'image' => null,
                'category' => 'Automation',
                'location' => 'Varna, Bulgaria'
            ]
        ]);

        return view('pages.references', compact('references'));
    }
}
