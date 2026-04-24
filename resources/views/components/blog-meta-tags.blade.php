@php
    $siteName = config('app.name', 'Orion Stars');
    $currentUrl = request()->url();
    
    $title = $post->meta_title ?: $post->title . ' | ' . $siteName;
    $description = $post->meta_description ?: $post->excerpt;
    $keywords = $post->meta_keywords ?: 'Orion Stars blog, fish games news';
    $image = $post->image_url ?: asset('logo.png');
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

@if($post->faqs && $post->faqs->count() > 0)
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
    }@if(!$loop->last),@endif
    @endforeach
  ]
}
</script>
@endif
