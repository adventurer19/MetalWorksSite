<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Sample services data (you'll replace this with database queries later)
        $services = collect([
            [
                'id' => 1,
                'name' => 'Laser Cutting',
                'description' => 'High precision laser cutting services with advanced Bodor C 12025 20kW equipment',
                'image' => null,
                'slug' => 'laser-cutting'
            ],
            [
                'id' => 2,
                'name' => 'Welding Services',
                'description' => 'Professional welding solutions for industrial applications up to 10,000mm length',
                'image' => null,
                'slug' => 'welding-services'
            ],
            [
                'id' => 3,
                'name' => 'Mechanical Processing',
                'description' => 'Complete mechanical processing and finishing services',
                'image' => null,
                'slug' => 'mechanical-processing'
            ],
            [
                'id' => 4,
                'name' => 'Quality Control',
                'description' => 'Comprehensive quality assurance and testing procedures',
                'image' => null,
                'slug' => 'quality-control'
            ]
        ]);

        return view('pages.services', compact('services'));
    }

    public function show($locale, $id, $slug)
    {
        // Sample service detail (you'll replace this with database query later)
        $services = collect([
            1 => [
                'id' => 1,
                'name' => 'Laser Cutting',
                'description' => 'High precision laser cutting services with advanced Bodor C 12025 20kW equipment',
                'full_description' => 'Our laser cutting services utilize state-of-the-art Bodor C 12025 20kW laser cutting equipment, capable of processing steel up to 25mm thickness with exceptional precision and quality.',
                'specifications' => [
                    'Equipment' => 'Bodor C 12025 20kW',
                    'Max Thickness' => '25mm steel',
                    'Cutting Area' => '12000 x 2500mm',
                    'Precision' => '±0.1mm'
                ],
                'slug' => 'laser-cutting'
            ],
            // Add other services as needed...
        ]);

        $service = $services->get($id);

        if (!$service) {
            abort(404);
        }

        return view('pages.service-detail', compact('service'));
    }
}
