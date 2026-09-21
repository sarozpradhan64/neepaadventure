<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/treks', fn () => view('treks'))->name('treks');
Route::get('/treks/{slug}', fn () => view('trek-detail'))->name('trek-detail');
Route::get('/peak-climbing', fn () => view('peak-climbing'))->name('peak-climbing');
Route::get('/gallery', fn () => view('gallery'))->name('gallery');
Route::get('/contact', fn () => view('contact'))->name('contact');
Route::get('/community', fn () => view('community'))->name('community');
Route::get('/projects', fn () => view('projects'))->name('projects');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-detail');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('lucide-icon/{icon}', function (string $icon) {
        abort_unless(preg_match('/^[a-z0-9\-]+$/', $icon), 404);

        $path = base_path('vendor/mallardduck/blade-lucide-icons/resources/svg/icons/'.$icon.'.svg');
        abort_unless(file_exists($path), 404);

        return response(file_get_contents($path), 200, [
            'Content-Type' => 'image/svg+xml',
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    })->name('lucide-icon');

    Route::get('lucide-icons', function () {
        $dir = base_path('vendor/mallardduck/blade-lucide-icons/resources/svg/icons');

        $icons = collect(scandir($dir))
            ->filter(fn ($file) => str_ends_with($file, '.svg'))
            ->map(fn ($file) => str_replace('.svg', '', $file))
            ->sort()
            ->values();

        return response()->json($icons, 200, ['Cache-Control' => 'public, max-age=3600']);
    })->name('lucide-icons');
});
