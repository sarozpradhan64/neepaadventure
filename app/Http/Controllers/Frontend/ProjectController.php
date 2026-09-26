<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\Project;
use Blaze\AdminCore\Models\ProjectCategory;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['category'])
            ->where('status', true)
            ->orderBy('sort_order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();

        $categories = ProjectCategory::where('status', true)->orderBy('sort_order', 'asc')->get();

        return view('projects', compact('projects', 'categories'));
    }
}
