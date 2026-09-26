<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\ContactInformation;
use Blaze\AdminCore\Models\ContactMessage;
use Blaze\AdminCore\Models\Enquiry;
use Blaze\AdminCore\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = ContactInformation::first();

        return view('contact', compact('contact'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        ContactMessage::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'new',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Your message has been sent successfully. We will get back to you shortly.']);
        }

        return back()->with('success', 'Your message has been sent successfully. We will get back to you shortly.');
    }

    public function planYourTrek()
    {
        $services = Service::where('status', true)->orderBy('sort_order')->get();
        $contact = ContactInformation::first();

        return view('plan-your-trek', compact('services', 'contact'));
    }

    public function storePlanYourTrek(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'service_id' => 'nullable|exists:services,id',
        ]);

        $message = '';
        if ($request->filled('country')) {
            $message .= 'Country: '.$request->country."\n";
        }
        if ($request->filled('window')) {
            $message .= 'Estimated Window & Duration: '.$request->window."\n";
        }
        if ($request->filled('group_size')) {
            $message .= 'Group Size: '.$request->group_size."\n";
        }
        if ($request->filled('experience')) {
            $message .= 'Experience: '.$request->experience."\n";
        }
        if ($request->filled('logistics')) {
            $message .= 'Logistics: '.implode(', ', (array) $request->logistics)."\n";
        }
        if ($request->filled('notes')) {
            $message .= 'Notes: '.$request->notes."\n";
        }

        Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'message' => $message,
            'status' => 'new',
            'priority' => 'normal',
            'source' => 'Plan Your Trek Form',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Your trek inquiry has been submitted successfully. We will get back to you shortly.']);
        }

        return back()->with('success', 'Your trek inquiry has been submitted successfully. We will get back to you shortly.');
    }
}
