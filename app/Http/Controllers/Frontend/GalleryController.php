<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Blaze\AdminCore\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index()
    {
        $allAlbums = GalleryAlbum::cachedActive();
        [$featuredAlbums, $albums] = $allAlbums->partition(fn ($album) => $album->is_featured);

        return view('gallery.index', compact('featuredAlbums', 'albums'));
    }

    public function show($slug)
    {
        $album = GalleryAlbum::with(['items' => function ($q) {
            $q->orderBy('sort_order');
        }])->where('slug', $slug)->firstOrFail();

        return view('gallery.show', compact('album'));
    }
}
