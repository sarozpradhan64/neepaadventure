<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index(): View
    {
        $teamMembers = TeamMember::where('status', true)
            ->orderBy('sort_order')
            ->get();

        return view('team', compact('teamMembers'));
    }

    /**
     * Display the specified team member profile.
     */
    public function show(string $slug): View|RedirectResponse
    {
        $member = TeamMember::where('status', true)
            ->where(function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();

        // Redirect to canonical slug if accessed via numeric id and slug exists
        if (is_numeric($slug) && ! empty($member->slug) && $member->slug !== $slug) {
            return redirect()->route('team.show', $member->slug, 301);
        }

        return view('team-detail', compact('member'));
    }
}
