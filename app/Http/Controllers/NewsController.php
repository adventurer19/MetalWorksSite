<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // Sample news data (you'll replace this with database queries later)
        $news = collect([
            [
                'id' => 1,
                'title' => 'New Laser Cutting Equipment Installation',
                'excerpt' => 'We are pleased to announce the installation of our new Bodor C 12025 20kW laser cutting equipment.',
                'content' => 'We are pleased to announce the installation of our new Bodor C 12025 20kW laser cutting equipment, which significantly enhances our production capabilities...',
                'image' => null,
                'published_at' => '15.09.2025',
                'category' => 'Equipment'
            ],
            [
                'id' => 2,
                'title' => 'ISO Certification Renewal',
                'excerpt' => 'Metalik AD successfully renewed all ISO certifications for quality, environmental, and safety management.',
                'content' => 'We are proud to announce that Metalik AD has successfully renewed all ISO certifications including ISO 9001:2015, ISO 14001:2015, and ISO 45001:2018...',
                'image' => null,
                'published_at' => '10.09.2025',
                'category' => 'Quality'
            ],
            [
                'id' => 3,
                'title' => 'Expansion into European Markets',
                'excerpt' => 'Our company continues to grow with new partnerships across European markets.',
                'content' => 'Metalik AD is expanding its presence in European markets through strategic partnerships and new project acquisitions...',
                'image' => null,
                'published_at' => '05.09.2025',
                'category' => 'Business'
            ],
            [
                'id' => 4,
                'title' => 'Employee Training Program',
                'excerpt' => 'New comprehensive training program launched for all technical staff.',
                'content' => 'We have launched a comprehensive training program to ensure our technical staff stays updated with the latest industry standards and technologies...',
                'image' => null,
                'published_at' => '01.09.2025',
                'category' => 'Training'
            ]
        ]);

        return view('pages.news', compact('news'));
    }
}
