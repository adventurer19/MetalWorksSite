<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use Illuminate\Http\Request;

class ContactSubmissionController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactSubmission::query();

        // Filter by read status
        if ($request->has('status')) {
            switch ($request->status) {
                case 'unread':
                    $query->where('is_read', false);
                    break;
                case 'read':
                    $query->where('is_read', true);
                    break;
                case 'replied':
                    $query->where('is_replied', true);
                    break;
            }
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%")
                    ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $submissions = $query->latest()->paginate(20);

        return view('admin.contact-submissions.index', compact('submissions'));
    }

    public function show(ContactSubmission $contactSubmission)
    {
        // Mark as read when viewed
        if (!$contactSubmission->is_read) {
            $contactSubmission->markAsRead();
        }

        return view('admin.contact-submissions.show', compact('contactSubmission'));
    }

    public function markAsRead(ContactSubmission $contactSubmission)
    {
        $contactSubmission->markAsRead();
        return redirect()->back()->with('success', 'Message marked as read.');
    }

    public function markAsReplied(ContactSubmission $contactSubmission)
    {
        $contactSubmission->markAsReplied();
        return redirect()->back()->with('success', 'Message marked as replied.');
    }

    public function destroy(ContactSubmission $contactSubmission)
    {
        $contactSubmission->delete();
        return redirect()->route('admin.contact-submissions.index')
            ->with('success', 'Contact submission deleted successfully.');
    }
}
