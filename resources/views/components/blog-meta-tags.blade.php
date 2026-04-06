@props(['post'])

@php
    $title = $post->meta_title ?: $post->title;
    $description = $post->meta_description ?: Str::limit(strip_tags($post->content), 160);
    $keywords = $post->meta_keywords;
    $url = route('blog.show', $post->slug);
    $image = $post->image_url ? asset($post->image_url) : asset('logo.png');
    $siteName = '888Realty';
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "BlogPosting",
        "headline" => $post->title,
        "description" => $description,
        "image" => $image,
        "author" => [
            "@type" => "Organization",
            "name" => $post->author ?: $siteName
        ],
        "publisher" => [
            "@type" => "Organization",
            "name" => $siteName,
            "logo" => [
                "@type" => "ImageObject",
                "url" => asset('logo.png')
            ]
        ],
        "datePublished" => $post->created_at->toIso8601String(),
        "dateModified" => $post->updated_at->toIso8601String(),
        "mainEntityOfPage" => [
            "@type" => "WebPage",
            "@id" => $url
        ]
    ];
@endphp

<!-- Standard SEO Tags -->
<title>{{ $title }} | {{ $siteName }}</title>
<meta name="description" content="{{ $description }}">
@isset($keywords)
    <meta name="keywords" content="{{ $keywords }}">
@endisset

<!-- Open Graph / Facebook -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:site_name" content="{{ $siteName }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">

<!-- JSON-LD Structured Data -->
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
