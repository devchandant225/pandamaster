# Dynamic SEO & Meta Management Implementation Plan

This plan outlines the steps to implement dynamic sitemaps, robots.txt management, multiple JSON-LD schemas, and raw script insertion for Orion Star.

## 1. Database Updates

### Migration for Global Settings (Users Table)
Add fields for dynamic robots.txt and global scripts to the `users` table (where `adminSettings` resides).
- `robots_txt`: `longText`, nullable
- `header_scripts`: `longText`, nullable
- `footer_scripts`: `longText`, nullable

### Migration for Posts & Games
Ensure `posts` and `games` have SEO fields to allow per-page custom schemas.
- `meta_title`: `string`, nullable
- `meta_description`: `text`, nullable
- `meta_keywords`: `text`, nullable
- `meta_schema`: `json`, nullable (to store multiple JSON-LD schemas)

## 2. Model Updates

### Update `User.php`
- Add new fields to `$fillable`.

### Update `MetaTag.php`
- The model already supports `schema_head` and `schema_body` as arrays via casts.
- Add a helper method to ensure valid JSON output.

### Update `Post.php` & `Game.php`
- Add SEO fields to `$fillable`.
- Cast `meta_schema` to `array`.

## 3. Admin Implementation

### Meta Tag Repeater Enhancement
- The `x-schema-repeater` component is already created.
- Update `MetaTagController` to handle the array input for `schema_head` and `schema_body` correctly (it already has logic for this, but needs testing).

### Global SEO Management (Admin Profile)
- Add an "SEO & Scripts" tab to `admin/profile.blade.php`.
- Fields:
    - **Robots.txt**: A textarea for raw robots.txt content.
    - **Global Header Scripts**: Textarea for raw HTML (GTM, Analytics, etc.) to be placed in `<head>`.
    - **Global Footer Scripts**: Textarea for raw HTML to be placed before `</body>`.

### Update `AdminProfileController`
- Add validation and saving logic for the new SEO fields.

## 4. Dynamic Sitemap & Robots.txt

### `SitemapController`
Create a controller to generate dynamic XML sitemap.
- **Route**: `GET /sitemap.xml`
- **Logic**:
    - Include static routes (home, about, contact, download, etc.)
    - Loop through all active `posts` and include them.
    - Loop through all active `games` and include them.

### `RobotsController`
Create a controller to serve the `robots.txt` content from the database.
- **Route**: `GET /robots.txt`
- **Logic**:
    - Return `adminSettings->robots_txt` if not empty.
    - Default to a basic "Allow: /" if empty.
    - Set `Content-Type: text/plain`.

## 5. Sidebar & Navigation Updates

### Update `dashboard-sidebar.blade.php`
Ensure all CRUDs and new SEO features are accessible.
- **Content Management Section**:
    - Games Management
    - Game Categories
    - Blog Posts
    - Blog Categories
    - Landing Sections
- **SEO & Settings Section**:
    - Meta Tags Management
    - Sitemap & Robots (Link to Profile SEO tab or dedicated page)
    - System Profile

## 6. Frontend Synchronization

### Layout Updates (`layouts/app.blade.php`)
- Render `adminSettings->header_scripts` in the `<head>`.
- Render `adminSettings->footer_scripts` before `</body>`.

### Meta Tag Component Synchronization
- Update `components/meta-tags.blade.php` and `components/blog-meta-tags.blade.php`.
- Ensure they loop through the `schema_head` array and render each item inside its own `<script type="application/ld+json">` tag.
- Add logic to escape special characters if needed, while keeping the JSON valid.

## 6. Execution Steps

1.  **Run Migrations**: Create and run the migration files.
2.  **Controller Logic**: Update `AdminProfileController`, `AdminPostController`, and `GameAdminController`.
3.  **UI Updates**: Update the Admin Profile and SEO edit views.
4.  **Sitemap & Robots**: Implement the new routes and controllers.
5.  **Layout Rendering**: Update the main layout and components to output the new tags.

---
**Approval Required**: Once this plan is approved, I will begin with Step 1.
