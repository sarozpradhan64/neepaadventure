<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ServiceDeparture;
use Blaze\AdminCore\Models\Blog;
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
        $departures = ServiceDeparture::with('service')->where('start_date', '>=', now())->orderBy('start_date')->take(3)->get();
        $latestBlogs = Blog::with('author')->where('status', true)->orderByDesc('created_at')->take(4)->get();

        return view('welcome', compact('treks', 'testimonials', 'departures', 'latestBlogs'));
    }
}
