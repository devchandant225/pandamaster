@php
    $siteName = config('app.name', 'Orion Stars');
    $currentUrl = request()->url();
    
    $finalTitle = $title ?: $siteName;
    $finalDescription = $description ?: 'Official Orion Stars Platform - Fish Games, Slots & Online Casino';
    $finalKeywords = $keywords ?: 'Orion Stars, fish games, online slots, casino games';
    $finalImage = $image ? asset('storage/' . $image) : asset('logo.png');

    $headSchemas = ($meta && !empty($meta->schema_head_json)) ? $meta->schema_head_json : [];
    $bodySchemas = ($meta && !empty($meta->schema_body_json)) ? $meta->schema_body_json : [];

    $segments = request()->segments();
    $breadcrumbItems = [];
    if (count($segments) > 0) {
        $breadcrumbItems[] = [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Home',
            'item' => url('/')
        ];
        
        $url = url('/');
        foreach ($segments as $index => $segment) {
            $url .= '/' . $segment;
            $breadcrumbItems[] = [
                '@type' => 'ListItem',
                'position' => $index + 2,
                'name' => Str::headline($segment),
                'item' => $url
            ];
        }
    }
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
@foreach($headSchemas as $schema)
    @if(!empty($schema))
        <script type="application/ld+json">
            {!! is_string($schema) ? $schema : json_encode($schema) !!}
        </script>
    @endif
@endforeach

<!-- Schema JSON-LD (Body) -->
@if(count($bodySchemas) > 0)
    @push('scripts')
        @foreach($bodySchemas as $schema)
            @if(!empty($schema))
                <script type="application/ld+json">
                    {!! is_string($schema) ? $schema : json_encode($schema) !!}
                </script>
            @endif
        @endforeach
    @endpush
@endif

@if(count($breadcrumbItems) > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": {!! json_encode($breadcrumbItems, JSON_UNESCAPED_SLASHES) !!}
}
</script>
@endif
