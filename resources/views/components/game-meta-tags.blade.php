@php
    $siteName = config('app.name', 'Panda Master');
    $currentUrl = request()->url();
    
    $logoUrl = (isset($adminSettings) && $adminSettings->logo) 
        ? (str_starts_with($adminSettings->logo, 'http') ? $adminSettings->logo : Storage::url($adminSettings->logo))
        : asset('logo.png');

    $title = $game->meta_title ?: $game->title . ' | ' . $siteName;
    $description = $game->meta_description ?: Str::limit(strip_tags($game->description), 160);
    $keywords = $game->meta_keywords ?: 'Panda Master game, ' . $game->game_type . ', ' . $game->title;
    $image = $game->thumbnail ?: $logoUrl;

    $metaSchemas = (isset($game->meta_schema) && is_array($game->meta_schema)) ? $game->meta_schema : [];
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

<?php if (count($metaSchemas) > 0): ?>
    <?php foreach ($metaSchemas as $schema): ?>
        <?php if (!empty($schema)): ?>
            <script type="application/ld+json">
                <?php echo is_string($schema) ? $schema : json_encode($schema); ?>
            </script>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>
