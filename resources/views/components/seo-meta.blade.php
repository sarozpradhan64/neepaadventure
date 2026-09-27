@props([
    'seo' => null,
    'title' => null,
    'description' => null,
    'image' => null,
])

@php
    $finalTitle = $seo?->meta_title ?? $title ?? $websiteSettings['seo_default_title'] ?? config('app.name', 'Neepa Adventure');
    $finalDescription = $seo?->meta_description ?? $description ?? $websiteSettings['seo_default_description'] ?? 'Experience the best trekking, climbing, and adventure tours in Nepal.';
    $finalImage = $seo?->og_image ?? $image ?? $websiteSettings['seo_default_image'];
    $finalImageUrl = $finalImage ? (Str::startsWith($finalImage, 'http') ? $finalImage : Storage::url($finalImage)) : null;
@endphp

<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDescription }}" />
<meta name="keywords" content="{{ $websiteSettings['seo_default_keywords'] ?? 'trekking, nepal, himalayas' }}" />

@if(!empty($seo?->canonical_url))
    <link rel="canonical" href="{{ $seo->canonical_url }}" />
@endif
@if(!empty($seo?->robots))
    <meta name="robots" content="{{ $seo->robots }}" />
@endif

<meta property="og:title" content="{{ $seo?->og_title ?? $finalTitle }}" />
<meta property="og:description" content="{{ $seo?->og_description ?? $finalDescription }}" />
<meta property="og:type" content="{{ $seo?->og_type ?? 'website' }}" />
<meta property="og:url" content="{{ request()->url() }}" />
@if($finalImageUrl)
    <meta property="og:image" content="{{ $finalImageUrl }}" />
@endif

<meta name="twitter:card" content="{{ $seo?->twitter_card ?? 'summary_large_image' }}" />
<meta name="twitter:title" content="{{ $seo?->twitter_title ?? $finalTitle }}" />
<meta name="twitter:description" content="{{ $seo?->twitter_description ?? $finalDescription }}" />
@if(!empty($seo?->twitter_image))
    <meta name="twitter:image" content="{{ Str::startsWith($seo->twitter_image, 'http') ? $seo->twitter_image : Storage::url($seo->twitter_image) }}" />
@elseif($finalImageUrl)
    <meta name="twitter:image" content="{{ $finalImageUrl }}" />
@endif

@if(!empty($seo?->schema_markup))
    {!! $seo->schema_markup !!}
@endif
