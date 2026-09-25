<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\Service;
use Blaze\AdminCore\Models\Testimonial;

class HomeController extends Controller
{
    /**
     * Handle the application's home page.
     */
    public function index()
    {
        $treks = Service::get();
        $testimonials = Testimonial::where('status', true)->orderBy('sort_order')->get();

        return view('welcome', compact('treks', 'testimonials'));
    }
}
