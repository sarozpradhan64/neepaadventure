<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TrekController;
use App\Http\Controllers\ServiceDepartureController;
use Blaze\AdminCore\Models\TeamMember;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('about-us')->group(function () {
    Route::get('/', fn () => view('about'))->name('about');
    Route::get('/story', fn () => view('about'))->name('about.story');
    Route::get('/team', fn () => view('team', [
        'teamMembers' => TeamMember::where('status', true)->orderBy('sort_order')->get(),
    ]))->name('team');
    Route::get('/reviews', fn () => view('reviews'))->name('reviews');
});
Route::get('/treks', [TrekController::class, 'index'])->name('treks');
Route::get('/treks/{slug}', [TrekController::class, 'show'])->name('trek-detail');

use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\NewsletterController;

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery.show');
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');
use App\Http\Controllers\Frontend\ContactController;

use App\Http\Controllers\Frontend\ReviewController;

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/write-review', [ReviewController::class, 'create'])->name('write-review');
Route::post('/write-review', [ReviewController::class, 'store'])->name('write-review.store');

Route::get('/plan-your-trek', [ContactController::class, 'planYourTrek'])->name('plan-your-trek');
Route::post('/plan-your-trek', [ContactController::class, 'storePlanYourTrek'])->name('plan-your-trek.store');
Route::get('/community', fn () => view('community'))->name('community');
use App\Http\Controllers\Frontend\ProjectController;
use Blaze\AdminCore\Models\LegalDocument;
use Illuminate\Support\Facades\Storage;

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::get('/blogs', [BlogController::class, 'index'])->name('blog');
Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('blog-detail');

Route::prefix('about-us')->group(function () {
    Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
    Route::get('/careers/{job:slug}', [CareerController::class, 'show'])->name('careers.show');
    Route::get('/careers/{job:slug}/apply', [CareerController::class, 'apply'])->name('careers.apply');
    Route::post('/careers/{job:slug}/apply', [CareerController::class, 'submitApplication'])->name('careers.submit');
});

use Blaze\AdminCore\Models\Page;

Route::get('/page/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('status', true)->firstOrFail();

    return view('page', compact('page'));
})->name('pages.show');

Route::get('/legal', function () {
    $legalDocuments = LegalDocument::where('status', true)->latest()->get();

    return view('legal-documents', compact('legalDocuments'));
})->name('legal.index');

Route::get('/legal/{slug}', function ($slug) {
    $legalDocument = LegalDocument::where('slug', $slug)->where('status', true)->firstOrFail();
    if ($legalDocument->file_path) {
        return redirect(Storage::disk('public')->url($legalDocument->file_path));
    }
    abort(404, 'Document file not found.');
})->name('legal-document.show');

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
