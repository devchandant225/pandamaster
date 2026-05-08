@php
    $siteName = config('app.name', 'Orion Stars');
    $currentUrl = request()->url();
    
    $title = $post->meta_title ?: $post->title . ' | ' . $siteName;
    $description = $post->meta_description ?: $post->excerpt;
    $keywords = $post->meta_keywords ?: 'Orion Stars blog, fish games news';
    $image = $post->image_url ?: asset('logo.png');

    $logoUrl = (isset($adminSettings) && $adminSettings->logo) 
        ? (str_starts_with($adminSettings->logo, 'http') ? $adminSettings->logo : Storage::url($adminSettings->logo))
        : asset('logo.png');
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

@if(isset($post->meta_schema) && is_array($post->meta_schema))
    @foreach($post->meta_schema as $schema)
        @if(!empty($schema))
            <script type="application/ld+json">
                {!! is_string($schema) ? $schema : json_encode($schema) !!}
            </script>
        @endif
    @endforeach
@endif

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BlogPosting",
  "headline": "{{ str_replace('"', '\"', $post->title) }}",
  "description": "{{ str_replace('"', '\"', $post->excerpt ?: Str::limit(strip_tags($post->content), 160)) }}",
  "image": "{{ $image }}",
  "author": {
    "@type": "Person",
    "name": "{{ $post->author ?: 'Orion Star VIP Team' }}"
  },
  "publisher": {
    "@type": "Organization",
    "name": "{{ $siteName }}",
    "logo": {
      "@type": "ImageObject",
      "url": "{{ $logoUrl }}"
    }
  },
  "datePublished": "{{ $post->created_at->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at->toIso8601String() }}",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ $currentUrl }}"
  }
}
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "{{ url('/') }}"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Blog",
      "item": "{{ url('/blog') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ str_replace('"', '\"', $post->title) }}",
      "item": "{{ $currentUrl }}"
    }
  ]
}
</script>

@if(isset($post->faqs) && $post->faqs->count() > 0)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($post->faqs as $faq)
    {
      "@type": "Question",
      "name": "{{ str_replace('"', '\"', $faq->question) }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ str_replace('"', '\"', $faq->answer) }}"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
  ]
}
</script>
@endif
