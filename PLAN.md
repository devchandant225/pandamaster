# Development Log & Architectural Summary

This document summarizes the core changes and architectural decisions made during the recent development phase. It serves as a guide for subsequent updates to ensure consistency across the project.

## 1. Game System Overhaul
*   **Decoupling**: Removed all relationships between `Games` and `GameCategories`. Games now operate as independent entities.
*   **Dynamic Design**: Implemented a fully dynamic layout for `games.show` based on wireframe specifications.
*   **Dynamic Card Section**: Added a new modular section for secondary CTAs.
    *   **Structure**: Features a 2-column grid of cards (with images and custom buttons) positioned **above** a full-width centered paragraph and title.
*   **New Sections**: 
    *   **Key Features**: Added a dedicated grid for game highlights (e.g. "Free Spins", "Progressive Jackpot").
    *   **Why Play**: Moved the special highlights section to follow "Key Features" for better narrative flow.
*   **Seeding**: Created `JuwaGameSeeder` (adapted for FireKirin) which populates the platform with high-quality content.

## 2. Blog System Simplification
*   **Decoupling**: Removed all relationships between `Posts` and `Categories`. 
*   **CRUD Updates**: Simplified `AdminPostController` and public `BlogController` to remove category filtering and data passing.

## 3. Media Management System
*   **Media Library**: Created a full Media CRUD (`Media` model, migration, and `MediaController`).
*   **Media Drawer**: Implemented a global AJAX-powered drawer for quick asset access with Clipboard support (`Ctrl+V`).

## 4. SEO & Security
*   **Schema Visibility**: Updated the `schema-repeater` component to use a monospaced font and larger textareas.
*   **Enforced HTTPS**: Updated `AppServiceProvider` to call `URL::forceScheme('https')` in production.

---

## Technical Reference

### Migration: Dynamic Sections (Including Card Section)
```php
Schema::table('games', function (Blueprint $table) {
    // Hero Section
    $table->string('hero_title')->nullable();
    $table->string('hero_subtitle')->nullable();
    $table->json('hero_ctas')->nullable();

    // Alternating Content Sections
    $table->json('sections')->nullable();

    // How To Section
    $table->json('how_to')->nullable();

    // Dynamic Card Grid Section
    $table->string('card_section_title')->nullable();
    $table->text('card_section_content')->nullable();
    $table->json('card_section_cards')->nullable(); // {image_url, content, button_label, button_url}

    // Testimonials, FAQs, and Special Notes
    $table->json('testimonials')->nullable();
    $table->json('faqs')->nullable();
    $table->string('special_title')->nullable();
    $table->json('special_items')->nullable();
});
```

### Migration: Category Removal
```php
Schema::table('games', function (Blueprint $table) {
    $table->dropForeign(['game_category_id']);
    $table->dropColumn('game_category_id');
});

Schema::table('posts', function (Blueprint $table) {
    $table->dropForeign(['category_id']);
    $table->dropColumn('category_id');
});
```

### Admin Controller: Game Management
The `GameAdminController@update` handles the expanded list of JSON dynamic fields:
```php
$validated['hero_ctas'] = isset($validated['hero_ctas']) ? array_values(array_filter($validated['hero_ctas'])) : null;
$validated['sections'] = isset($validated['sections']) ? array_values(array_filter($validated['sections'])) : null;
$validated['how_to'] = isset($validated['how_to']) ? array_values(array_filter($validated['how_to'])) : null;
$validated['card_section_cards'] = isset($validated['card_section_cards']) ? array_values(array_filter($validated['card_section_cards'])) : null;
$validated['testimonials'] = isset($validated['testimonials']) ? array_values(array_filter($validated['testimonials'])) : null;
$validated['faqs'] = isset($validated['faqs']) ? array_values(array_filter($validated['faqs'])) : null;
$validated['special_items'] = isset($validated['special_items']) ? array_values(array_filter($validated['special_items'])) : null;
```

### Game Page Design (Blade Reference)
The public game page (`resources/views/games/show.blade.php`) uses these dynamic sections to build the layout:
*   **Hero**: Uses `hero_title` and `hero_ctas`.
*   **Alternating Blocks**: Loops through `sections` with alternating flex directions.
*   **How To Play**: Displays `how_to` array as a numbered list.
*   **Key Features**: Renders `features` array in a 3-column grid with gold icons.
*   **Why Play**: Premium "Special highlights" grid using `special_items`.
*   **Dynamic Card Grid**: Renders `card_section_cards` in a 2-col grid followed by `card_section_title/content`.
*   **Testimonials/FAQs**: Premium grid and accordion components.

### Media Drawer Clipboard Upload (JS Reference)
```javascript
async handlePaste(e) {
    if (!window.mediaDrawerOpen) return;
    const items = (e.clipboardData || e.originalEvent.clipboardData).items;
    for (let index in items) {
        const item = items[index];
        if (item.kind === 'file') {
            const blob = item.getAsFile();
            await this.uploadFile(blob);
        }
    }
}
```
