@php
    $siteName = config('app.name', 'Orion Stars');
    $currentUrl = request()->url();
    
    $title = $game->meta_title ?: $game->title . ' | ' . $siteName;
    $description = $game->meta_description ?: Str::limit($game->description, 160);
    $keywords = $game->meta_keywords ?: 'Orion Stars game, ' . $game->game_type . ', ' . $game->title;
    $image = $game->thumbnail ?: asset('logo.png');
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">
<link rel="canonical" href="{{ $currentUrl }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
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

<?php if(isset($game->meta_schema) && is_array($game->meta_schema)): ?>
    <?php foreach($game->meta_schema as $schema): ?>
        <?php if(!empty($schema)): ?>
            <script type="application/ld+json">
                <?php echo is_string($schema) ? $schema : json_encode($schema); ?>
            </script>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

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
      "name": "Games",
      "item": "{{ url('/games') }}"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "{{ str_replace('"', '\"', $game->title) }}",
      "item": "{{ $currentUrl }}"
    }
  ]
}
</script>
