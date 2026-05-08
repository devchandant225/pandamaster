ParseError
resources/views/components/meta-tags.blade.php:83
syntax error, unexpected end of file, expecting "elseif" or "else" or "endif"

LARAVEL
12.58.0
PHP
8.3.30
UNHANDLED
CODE 0
500
GET
https://orionstarsbet.com

Exception trace
Illuminate\Filesystem\Filesystem::Illuminate\Filesystem\{closure}()
resources/views/components/meta-tags.blade.php:83

78<?php if(count($segments) > 0): ?>
79<script type="application/ld+json">
80{
81  "@context": "https://schema.org",
82  "@type": "BreadcrumbList",
83  "itemListElement": {!! json_encode($breadcrumbItems, JSON_UNESCAPED_SLASHES) !!}
84}
85</script>
86<?php endif; ?>