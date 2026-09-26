<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\GalleryAlbum;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $featuredAlbums = GalleryAlbum::where('status', true)->where('is_featured', true)->orderBy('sort_order')->get();
        $albums = GalleryAlbum::where('status', true)->where('is_featured', false)->orderBy('sort_order')->get();

        return view('gallery.index', compact('featuredAlbums', 'albums'));
    }

    public function show($slug)
    {
        $album = GalleryAlbum::with(['items' => function($q) {
            $q->orderBy('sort_order');
        }])->where('slug', $slug)->firstOrFail();
        
        return view('gallery.show', compact('album'));
    }
}
