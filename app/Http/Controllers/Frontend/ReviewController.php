<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\Testimonial;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
        return view('write-review');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'content' => 'required|string|max:1000',
        ]);

        Testimonial::create([
            'user_id' => auth()->id(),
            'name' => $validated['name'],
            'role' => $validated['role'],
            'company' => $validated['company'],
            'rating' => $validated['rating'],
            'content' => $validated['content'],
            'status' => false, // Set as draft/pending
            'is_featured' => false, // Fix for missing default value
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Thank you! Your review has been submitted and is pending approval.'
            ]);
        }

        return back()->with('success', 'Thank you! Your review has been submitted and is pending approval.');
    }
}
