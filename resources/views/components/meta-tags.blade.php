@php
    $siteName = config('app.name', 'Orion Stars');
    $currentUrl = request()->url();
    
    $finalTitle = $title ?: $siteName;
    $finalDescription = $description ?: 'Official Orion Stars Platform - Fish Games, Slots & Online Casino';
    $finalKeywords = $keywords ?: 'Orion Stars, fish games, online slots, casino games';
    $finalImage = $image ? asset('storage/' . $image) : asset('logo.png');

    $headSchemas = ($meta && !empty($meta->schema_head_json)) ? $meta->schema_head_json : [];
    $bodySchemas = ($meta && !empty($meta->schema_body_json)) ? $meta->schema_body_json : [];
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
<?php if (count($headSchemas) > 0): ?>
    <?php foreach ($headSchemas as $schema): ?>
        <?php if (!empty($schema)): ?>
            <script type="application/ld+json">
                <?php echo is_string($schema) ? $schema : json_encode($schema); ?>
            </script>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Schema JSON-LD (Body) -->
<?php if (count($bodySchemas) > 0): ?>
    @push('scripts')
        <?php foreach ($bodySchemas as $schema): ?>
            <?php if (!empty($schema)): ?>
                <script type="application/ld+json">
                    <?php echo is_string($schema) ? $schema : json_encode($schema); ?>
                </script>
            <?php endif; ?>
        <?php endforeach; ?>
    @endpush
<?php endif; ?>
