@php
    $siteName = config('app.name', 'Orion Stars');
    $currentUrl = request()->url();
    
    $finalTitle = $title ?: $siteName;
    $finalDescription = $description ?: 'Official Orion Stars Platform - Fish Games, Slots & Online Casino';
    $finalKeywords = $keywords ?: 'Orion Stars, fish games, online slots, casino games';
    $finalImage = $image ? asset('storage/' . $image) : asset('logo.png');
@endphp

<title>{{ $finalTitle }}</title>
<meta name="description" content="{{ $finalDescription }}">
<meta name="keywords" content="{{ $finalKeywords }}">
<link rel="canonical" href="{{ $currentUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $finalTitle }}">
<meta property="og:description" content="{{ $finalDescription }}">
<meta property="og:image" content="{{ $finalImage }}">
<meta property="og:site_name" content="{{ $siteName }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $finalTitle }}">
<meta name="twitter:description" content="{{ $finalDescription }}">
<meta name="twitter:image" content="{{ $finalImage }}">

<!-- Schema JSON-LD (Head) -->
@if($meta && !empty($meta->schema_head))
    @foreach($meta->schema_head_json as $schema)
        <script type="application/ld+json">
            {!! is_string($schema) ? $schema : json_encode($schema) !!}
        </script>
    @endforeach
@endif
