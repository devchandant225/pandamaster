<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\MetaTag;
use App\Models\GameCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrionStarSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🌟 Seeding Orion Star Official Platform...');

        $this->seedAdminProfile();
        $this->seedGameCategories();
        $this->seedMetaTags();
        $this->seedBlogCategories();
        $this->seedBlogPosts();

        $this->command->info('✅ Orion Star Official platform seeded successfully!');
    }

    protected function seedAdminProfile(): void
    {
        $this->command->info('📝 Seeding Admin Profile...');

        User::updateOrCreate(
            ['email' => 'admin@orionstarsbet.com'],
            [
                'name' => 'Orion Star Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '+1234567890',
                'whatsapp' => '+1234567890',
                'viber' => '+1234567890',
                'facebook' => 'https://facebook.com/orionstarofficial',
                'twitter' => 'https://twitter.com/orionstarvip',
                'linkedin' => 'https://linkedin.com/company/orionstar',
                'instagram' => 'https://instagram.com/orionstarvip',
                'tiktok' => 'https://tiktok.com/@orionstarvip',
                'telegram' => 'https://t.me/orionstarvip',
                'pinterest' => 'https://pinterest.com/orionstarvip',
                'description' => 'Orion Star Official — Your Go-To Platform for Fish Games, Slots & Online Casino Fun. Play directly in your browser or download the app.',
                'login_url' => 'https://orionstarsbet.com/admin-login',
                'register_url' => 'https://facebook.com/orionstarofficial',
                'youtube_url' => 'https://youtube.com/@orionstarvip',
                'external_dashboard_url' => 'https://orionstarsbet.com/dashboard',
                'footer_description' => 'Orion Star Official — The Ultimate Fish Game & Online Casino Platform. Play 30+ games, win real cash, join the community today.',
            ]
        );

        $this->command->info('   ✓ Admin user created: admin@orionstarsbet.com');
    }

    protected function seedGameCategories(): void
    {
        $this->command->info('🎮 Seeding Game Categories...');

        $categories = [
            ['name' => 'Fish Games', 'slug' => 'fish-games', 'description' => 'Multiplayer boss battles — Ocean King, Thunder Dragon, and more', 'icon_url' => 'https://via.placeholder.com/100x100/00BFFF/FFFFFF?text=Fish', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Orion Slots', 'slug' => 'orion-slots', 'description' => 'Spin and win with exciting slot games featuring progressive jackpots', 'icon_url' => 'https://via.placeholder.com/100x100/22C55E/FFFFFF?text=Slots', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Arcade Games', 'slug' => 'arcade-games', 'description' => 'Fun arcade-style games with real rewards', 'icon_url' => 'https://via.placeholder.com/100x100/A855F7/FFFFFF?text=Arcade', 'sort_order' => 3, 'is_active' => true],
            ['name' => 'Table Games', 'slug' => 'table-games', 'description' => 'Classic casino table games — roulette, blackjack, and more', 'icon_url' => 'https://via.placeholder.com/100x100/EF4444/FFFFFF?text=Table', 'sort_order' => 4, 'is_active' => true],
            ['name' => 'Board Games', 'slug' => 'board-games', 'description' => 'Strategic board games for competitive players', 'icon_url' => 'https://via.placeholder.com/100x100/F59E0B/FFFFFF?text=Board', 'sort_order' => 5, 'is_active' => true],
        ];

        foreach ($categories as $cat) {
            GameCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
            $this->command->info('   ✓ Game Category: ' . $cat['name']);
        }
    }

    protected function seedMetaTags(): void
    {
        $this->command->info('🔍 Seeding Meta Tags...');

        $metaTags = [
            ['page_type' => 'home', 'title' => 'Orion Star Official — Fish Games, Slots & Online Casino Fun', 'desc' => 'Welcome to Orion Stars. Play 30+ fish games, slots, and sweepstakes online. Instant browser play or free download for Android/iOS/PC. Join the elite today!', 'keyword' => 'orion star, orion stars, orion stars vip, fish game, online casino, real rewards, orionstars online', 'is_active' => true],
            ['page_type' => 'play-online', 'title' => 'Play Orion Star Online — No Download Needed, Instant Browser Play', 'desc' => 'Play Orion Star online instantly in your browser. No download required. Access 30+ fish games, slots and arcade games directly from any device.', 'keyword' => 'orion star play online, orion stars online, play orion stars no download, orion stars web version', 'is_active' => true],
            ['page_type' => 'download', 'title' => 'Orion Star Download — Get the App on Android, iOS & PC | Free APK', 'desc' => 'Download Orion Star for Android, iOS and PC. Safe, verified download. Install and start playing the latest fish games and slots today.', 'keyword' => 'orion star download, orion stars apk, orion stars download apk, orion star 777 download', 'is_active' => true],
            ['page_type' => '777', 'title' => 'Orion Star 777 Download, Login & Play Online', 'desc' => 'Get the Orion Star 777 APK latest version. Exclusive 777 login and game lobby access. Play the best fish games and slots on Orion Star 777.', 'keyword' => 'orion star 777, orion stars 777, orion star 777 download, orion 777 login', 'is_active' => true],
            ['page_type' => 'casino', 'title' => 'Orion Star Casino — Fish Games, Slots & Online Gaming', 'desc' => 'Experience Orion Star Casino — immersive fish games, premium slots, and rewarding gameplay. Play online or download the official app.', 'keyword' => 'orion star casino, online casino fish games, orion stars slot games', 'is_active' => true],
            ['page_type' => 'games', 'title' => 'Orion Star Games — 30+ Fish Games, Slots & Arcade Titles', 'desc' => 'Browse the full Orion Star game library. Find your favorite fish games, slots, and skill-based arcade games. New titles added regularly!', 'keyword' => 'orion star games, orion stars fish game list, orion star slot games', 'is_active' => true],
            ['page_type' => 'blog', 'title' => 'Orion Star Blog — Game Guides, Tips & Winning Strategies', 'desc' => 'Read the latest Orion Star news, winning tips, and game guides. Stay updated with platform improvements and new game releases.', 'keyword' => 'orion star blog, orion stars news, fish game tips, winning strategies', 'is_active' => true],
            ['page_type' => 'contact', 'title' => 'Contact Orion Star — 24/7 Player Support & Help', 'desc' => 'Need help with your Orion Star account? Contact our support team via Facebook, WhatsApp, or email. We are here to help 24/7.', 'keyword' => 'contact orion star, orion stars support, orion star help', 'is_active' => true],
            ['page_type' => 'about', 'title' => 'About Orion Star — Redefining the Level of Play', 'desc' => 'Learn about Orion Star — the leading online gaming platform for fish games and slots. Built for immersive experiences and high-stakes thrills.', 'keyword' => 'about orion star, orion stars company, what is orion star', 'is_active' => true],
            ['page_type' => 'login', 'title' => 'Orion Star Login — Fast Player Access to Fish Games & Slots', 'desc' => 'Access your Orion Star account and start playing the best fish games and slots online. Fast, secure player login for mobile and browser play.', 'keyword' => 'orion star login, orion stars login, orion stars vip login, player login', 'is_active' => true],
        ];

        foreach ($metaTags as $mt) {
            MetaTag::updateOrCreate(['page_type' => $mt['page_type']], $mt);
            $this->command->info('   ✓ Meta Tag: ' . $mt['page_type']);
        }
    }

    protected function seedBlogCategories(): void
    {
        $this->command->info('📁 Seeding Blog Categories...');

        $categories = [
            ['name' => 'Game Guides', 'slug' => 'game-guides'],
            ['name' => 'Fish Games', 'slug' => 'fish-games-blog'],
            ['name' => 'Slots Strategy', 'slug' => 'slots-strategy'],
            ['name' => 'Orion Star Updates', 'slug' => 'orion-star-updates'],
            ['name' => 'Tips & Tricks', 'slug' => 'tips-tricks'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
            $this->command->info('   ✓ Blog Category: ' . $cat['name']);
        }
    }

    protected function seedBlogPosts(): void
    {
        $this->command->info('📝 Seeding Blog Posts...');

        $gameGuides = Category::where('slug', 'game-guides')->first();
        $pandaUpdates = Category::where('slug', 'orion-star-updates')->first();

        $posts = [
            [
                'title' => 'What is Orion Star? The Ultimate Fish Game & Casino Platform Guide',
                'slug' => 'what-is-orion-star-ultimate-guide',
                'content' => "Orion Star is the ultimate online fish game and casino platform. Built for winners, it offers 30+ games including fish hunting, slots, and arcade games.\n\n## Why Choose Orion Star?\n\nOrion Star stands out with its extensive game library, user-friendly interface, and high-octane thrills. Available on Android, iOS, and PC.\n\n## Key Features\n- **30+ Games**: Fish games, slots, and arcade titles\n- **Play Online or Download**: Instant browser play or native apps\n- **Elite Support**: 24/7 assistance through official channels\n- **Secure Platform**: Encrypted and fair gameplay\n\n## Getting Started\nConnect with our distributor on Facebook, get your login, and start playing instantly in your browser or download the app.",
                'excerpt' => 'Discover everything about Orion Star — the ultimate fish game and online casino platform with 30+ games.',
                'author' => 'Orion Star Team',
                'category_id' => $gameGuides?->id,
                'status' => 'published',
                'meta_title' => 'What is Orion Star? Complete Fish Game & Casino Platform Guide',
                'meta_description' => 'Learn what Orion Star is and why it\'s the top choice for fish games and online casino gaming.',
                'meta_keywords' => 'what is orion star, orion stars guide, fish game platform',
            ],
            [
                'title' => 'How to Play Orion Star Online — No Download Needed',
                'slug' => 'how-to-play-orion-star-online-no-download',
                'content' => "Playing Orion Star online is simple and fast. With instant browser play, you can access your favorite games without installing anything.\n\n## Steps to Play Online\n1. **Visit the Portal**: Click the Play Online button on our site\n2. **Login**: Enter your account credentials\n3. **Select Game**: Pick any fish game or slot\n4. **Start Winning**: Play instantly on any device\n\n## Benefits of Online Play\n- Zero installation required\n- Works perfectly on Android/iOS browsers\n- Saves device storage\n- Automatic updates",
                'excerpt' => 'Learn how to play Orion Star online instantly without downloading. Quick guide to browser-based gaming.',
                'author' => 'Orion Star Team',
                'category_id' => $gameGuides?->id,
                'status' => 'published',
                'meta_title' => 'How to Play Orion Star Online — Instant Browser Play Guide',
                'meta_description' => 'Play Orion Star online without downloading. Step-by-step guide to instant browser fish games.',
                'meta_keywords' => 'orion star play online, no download casino, browser fish game',
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
            $this->command->info('   ✓ Blog Post: ' . $post['title']);
        }
    }
}
