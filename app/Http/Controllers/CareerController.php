<?php

namespace App\Http\Controllers;

use Blaze\AdminCore\Models\Job;
use Blaze\AdminCore\Models\JobApplication;
use Blaze\AdminCore\Models\JobCategory;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $jobs = Job::with('category')->where('status', true)->orderBy('sort_order')->latest()->get();
        $categories = JobCategory::where('status', true)->orderBy('sort_order')->get();

        return view('careers.index', compact('jobs', 'categories'));
    }

    public function show(Job $job)
    {
        if (! $job->status) {
            abort(404);
        }

        return view('careers.show', compact('job'));
    }

    public function apply(Job $job)
    {
        if (! $job->status) {
            abort(404);
        }

        return view('careers.apply', compact('job'));
    }

    public function submitApplication(Request $request, Job $job)
    {
        if (! $job->status) {
            abort(404);
        }

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:1024',
            'cover_letter' => 'nullable|string|max:10000',
            'license' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:1024',
            'other_documents' => 'nullable|array|max:3',
            'other_documents.*.title' => 'required_with:other_documents.*.file|string|max:255',
            'other_documents.*.file' => 'required_with:other_documents.*.title|file|mimes:pdf,doc,docx,jpg,png|max:1024',
        ]);

        $validated['job_id'] = $job->id;
        $validated['status'] = 'pending';

        if ($request->hasFile('cv')) {
            $validated['cv'] = $request->file('cv')->store('job_applications/cvs', 'public');
        }
        if ($request->hasFile('license')) {
            $validated['license'] = $request->file('license')->store('job_applications/licenses', 'public');
        }

        $otherDocs = [];
        if ($request->has('other_documents') && is_array($request->other_documents)) {
            foreach ($request->other_documents as $index => $docData) {
                if (isset($docData['title']) && $request->hasFile("other_documents.{$index}.file")) {
                    $path = $request->file("other_documents.{$index}.file")->store('job_applications/other', 'public');
                    $otherDocs[] = [
                        'title' => $docData['title'],
                        'file' => $path,
                    ];
                }
            }
        }
        $validated['other_documents'] = empty($otherDocs) ? null : $otherDocs;

        JobApplication::create($validated);

        return redirect()->route('careers.show', $job->slug)->with('success', 'Your application has been submitted successfully.');
    }
}
