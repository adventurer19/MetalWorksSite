<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = [
            'main' => [
                'title' => 'Head Office',
                'address' => '1309 Sofia, Bulgaria<br>Business Park Sofia Building 1<br>Floor 5, Office 501',
                'phone' => '+359 2 XXX XXXX',
                'fax' => '+359 2 XXX XXXX',
                'email' => 'office@metalik.bg'
            ],
            'production' => [
                'title' => 'Production Facility',
                'address' => '1309 Sofia, Bulgaria<br>Industrial Zone<br>Production Complex',
                'phone' => '+359 2 XXX XXXY',
                'email' => 'production@metalik.bg'
            ],
            'sales' => [
                'title' => 'Sales Department',
                'phone' => '+359 2 XXX XXXZ',
                'email' => 'sales@metalik.bg'
            ]
        ];

        $departments = [
            [
                'name' => 'General Management',
                'email' => 'management@metalik.bg',
                'phone' => '+359 2 XXX XXXX'
            ],
            [
                'name' => 'Sales & Marketing',
                'email' => 'sales@metalik.bg',
                'phone' => '+359 2 XXX XXXY'
            ],
            [
                'name' => 'Production',
                'email' => 'production@metalik.bg',
                'phone' => '+359 2 XXX XXXZ'
            ],
            [
                'name' => 'Quality Control',
                'email' => 'quality@metalik.bg',
                'phone' => '+359 2 XXX XXXW'
            ]
        ];

        return view('pages.contact', compact('contacts', 'departments'));
    }

    public function store(Request $request)
    {
        // Validate the contact form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        // Save to database
        ContactSubmission::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'locale' => app()->getLocale(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        // Here you could also send email notification to admin
        // Mail::to('admin@metalik.bg')->send(new ContactFormSubmitted($submission));

        return redirect()->back()->with('success', __('Thank you for your message. We will contact you soon.'));
    }
}
