@php
    $siteName = config('app.name', 'Panda Master');
    $currentUrl = request()->url();
    
    $title = $post->meta_title ?: $post->title . ' | ' . $siteName;
    $description = $post->meta_description ?: $post->excerpt;
    $keywords = $post->meta_keywords ?: 'Panda Master blog, fish games news';
    $image = $post->image_url ?: asset('logo.png');

    $logoUrl = (isset($adminSettings) && $adminSettings->logo) 
        ? (str_starts_with($adminSettings->logo, 'http') ? $adminSettings->logo : Storage::url($adminSettings->logo))
        : asset('logo.png');

    // 1. Pre-compute BlogPosting Schema
    $blogPostingSchema = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => $post->excerpt ?: Str::limit(strip_tags($post->content), 160),
        'image' => $image,
        'author' => [
            '@type' => 'Person', 
            'name' => $post->author ?: 'Panda Master VIP Team'
        ],
        'publisher' => [
            '@type' => 'Organization', 
            'name' => $siteName, 
            'logo' => [
                '@type' => 'ImageObject', 
                'url' => $logoUrl
            ]
        ],
        'datePublished' => $post->created_at->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String(),
        'mainEntityOfPage' => [
            '@type' => 'WebPage', 
            '@id' => $currentUrl
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

    // 2. Pre-compute Custom Meta Schemas
    $metaSchemas = (isset($post->meta_schema) && is_array($post->meta_schema)) ? $post->meta_schema : [];
    $processedMetaSchemas = [];
    foreach ($metaSchemas as $schema) {
        if (!empty($schema)) {
            $processedMetaSchemas[] = is_string($schema) ? $schema : json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
    }
    
    // 3. Pre-compute FAQ Schema
    $faqItems = [];
    if (isset($post->faqs) && $post->faqs->count() > 0) {
        foreach ($post->faqs as $faq) {
            $faqItems[] = [
                '@type' => 'Question',
                'name' => $faq->question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq->answer
                ]
            ];
        }
    }
    $faqJson = !empty($faqItems) 
        ? json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $faqItems
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) 
        : '';
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<link rel="canonical" href="{{ $currentUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="article">
<meta property="og:url" content="{{ $currentUrl }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:site_name" content="{{ $siteName }}">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

@foreach($processedMetaSchemas as $schemaContent)
    <script type="application/ld+json">{!! $schemaContent !!}</script>
@endforeach

<script type="application/ld+json">{!! $blogPostingSchema !!}</script>

@if($faqJson)
<script type="application/ld+json">{!! $faqJson !!}</script>
@endif
