The issue is Blade's parser getting confused by `{!! ... !!}` inside a JSON block within an `@if` directive — the `!!}` sequence breaks Blade's template parsing. Fix it by pre-computing the JSON in the `@php` block:

**Change this in your `@php` block:**
```php
// Add this line at the bottom of your existing @php block
$faqJson = count($faqItems) > 0 ? json_encode($faqItems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : '';
```

**Then replace the entire FAQ script block** (the problematic part at the bottom):

```blade
@if($faqJson)
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": {{ $faqJson }}
}
</script>
@endif
```

> ✅ Use `{{ }}` here (not `{!! !!}`) — since `json_encode` already produces safe output, and more importantly `{{ }}` doesn't confuse Blade's `@if`/`@endif` block parser the way `{!! !!}` does.

---

**Your full corrected `@php` block** for reference:

```php
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

    $metaSchemas = (isset($post->meta_schema) && is_array($post->meta_schema)) ? $post->meta_schema : [];
    
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

    // ✅ Pre-encode here — never use {!! !!} inside @if blocks
    $faqJson = !empty($faqItems)
        ? json_encode($faqItems, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
        : '';
@endphp
```

---

**While you're here — two other issues in this file to fix:**

**1. XSS risk in the BlogPosting schema** — `str_replace` is not safe enough for JSON string escaping. Replace the inline string wrangling with `json_encode`:

```blade
{{-- ❌ Unsafe --}}
"headline": "{{ str_replace('"', '\"', $post->title) }}",

{{-- ✅ Safe --}}
@php
    $blogPostingSchema = json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post->title,
        'description' => $post->excerpt ?: Str::limit(strip_tags($post->content), 160),
        'image' => $image,
        'author' => ['@type' => 'Person', 'name' => $post->author ?: 'Orion Star VIP Team'],
        'publisher' => ['@type' => 'Organization', 'name' => $siteName, 'logo' => ['@type' => 'ImageObject', 'url' => $logoUrl]],
        'datePublished' => $post->created_at->toIso8601String(),
        'dateModified' => $post->updated_at->toIso8601String(),
        'mainEntityOfPage' => ['@type' => 'WebPage', '@id' => $currentUrl],
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
@endphp
<script type="application/ld+json">{{ $blogPostingSchema }}</script>
```

**2. Same issue in `$metaSchemas` loop** — move `is_string` check to PHP too if those schemas ever contain quotes or special characters.