<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TrekController;
use App\Http\Controllers\ServiceDepartureController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/treks', [TrekController::class, 'index'])->name('treks');
Route::get('/treks/{slug}', [TrekController::class, 'show'])->name('trek-detail');

use App\Http\Controllers\Frontend\GalleryController;

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
use App\Http\Controllers\Frontend\ContactController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/plan-your-trek', [ContactController::class, 'planYourTrek'])->name('plan-your-trek');
Route::post('/plan-your-trek', [ContactController::class, 'storePlanYourTrek'])->name('plan-your-trek.store');
Route::get('/community', fn () => view('community'))->name('community');
use App\Http\Controllers\Frontend\ProjectController;

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

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

    Route::resource('service-departures', ServiceDepartureController::class)->except(['show']);
});
