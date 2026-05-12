<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\MetaTag;
use App\Models\GameCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrionStarSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🌟 Seeding Panda Master Official Platform...');

        $this->seedAdminProfile();
        $this->seedGameCategories();
        $this->seedMetaTags();
        $this->seedBlogPosts();

        $this->command->info('✅ Panda Master Official platform seeded successfully!');
    }

    protected function seedAdminProfile(): void
    {
        $this->command->info('📝 Seeding Admin Profile...');

        User::updateOrCreate(
            ['email' => 'admin@pandamasterbet.com'],
            [
                'name' => 'Panda Master Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '+1234567890',
                'whatsapp' => '+1234567890',
                'viber' => '+1234567890',
                'facebook' => 'https://facebook.com/pandamasterofficial',
                'twitter' => 'https://twitter.com/pandamastervip',
                'linkedin' => 'https://linkedin.com/company/pandamaster',
                'instagram' => 'https://instagram.com/pandamastervip',
                'tiktok' => 'https://tiktok.com/@pandamastervip',
                'telegram' => 'https://t.me/pandamastervip',
                'pinterest' => 'https://pinterest.com/pandamastervip',
                'description' => 'Panda Master Official — Your Go-To Platform for Fish Games, Slots & Online Casino Fun. Play directly in your browser or download the app.',
                'login_url' => 'https://pandamasterbet.com/admin-login',
                'register_url' => 'https://facebook.com/pandamasterofficial',
                'youtube_url' => 'https://youtube.com/@pandamastervip',
                'external_dashboard_url' => 'https://pandamasterbet.com/dashboard',
                'footer_description' => 'Panda Master Official — The Ultimate Fish Game & Online Casino Platform. Play 30+ games, win real cash, join the community today.',
            ]
        );

        $this->command->info('   ✓ Admin user created: admin@pandamasterbet.com');
    }

    protected function seedGameCategories(): void
    {
        $this->command->info('🎮 Seeding Game Categories...');

        $categories = [
            ['name' => 'Fish Games', 'slug' => 'fish-games', 'description' => 'Multiplayer boss battles — Ocean King, Thunder Dragon, and more', 'icon_url' => 'https://via.placeholder.com/100x100/00BFFF/FFFFFF?text=Fish', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Panda Slots', 'slug' => 'panda-slots', 'description' => 'Spin and win with exciting slot games featuring progressive jackpots', 'icon_url' => 'https://via.placeholder.com/100x100/22C55E/FFFFFF?text=Slots', 'sort_order' => 2, 'is_active' => true],
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
            ['page_type' => 'home', 'title' => 'Panda Master Official — Fish Games, Slots & Online Casino Fun', 'desc' => 'Welcome to Panda Master. Play 30+ fish games, slots, and sweepstakes online. Instant browser play or free download for Android/iOS/PC. Join the elite today!', 'keyword' => 'panda master, panda masters, panda masters vip, fish game, online casino, real rewards, pandamaster online', 'is_active' => true],
            ['page_type' => 'play-online', 'title' => 'Play Panda Master Online — No Download Needed, Instant Browser Play', 'desc' => 'Play Panda Master online instantly in your browser. No download required. Access 30+ fish games, slots and arcade games directly from any device.', 'keyword' => 'panda master play online, panda masters online, play panda masters no download, panda masters web version', 'is_active' => true],
            ['page_type' => 'download', 'title' => 'Panda Master Download — Get the App on Android, iOS & PC | Free APK', 'desc' => 'Download Panda Master for Android, iOS and PC. Safe, verified download. Install and start playing the latest fish games and slots today.', 'keyword' => 'panda master download, panda masters apk, panda masters download apk, panda master 777 download', 'is_active' => true],
            ['page_type' => '777', 'title' => 'Panda Master 777 Download, Login & Play Online', 'desc' => 'Get the Panda Master 777 APK latest version. Exclusive 777 login and game lobby access. Play the best fish games and slots on Panda Master 777.', 'keyword' => 'panda master 777, panda masters 777, panda master 777 download, panda master 777 login', 'is_active' => true],
            ['page_type' => 'casino', 'title' => 'Panda Master Casino — Fish Games, Slots & Online Gaming', 'desc' => 'Experience Panda Master Casino — immersive fish games, premium slots, and rewarding gameplay. Play online or download the official app.', 'keyword' => 'panda master casino, online casino fish games, panda masters slot games', 'is_active' => true],
            ['page_type' => 'games', 'title' => 'Panda Master Games — 30+ Fish Games, Slots & Arcade Titles', 'desc' => 'Browse the full Panda Master game library. Find your favorite fish games, slots, and skill-based arcade games. New titles added regularly!', 'keyword' => 'panda master games, panda masters fish game list, panda master slot games', 'is_active' => true],
            ['page_type' => 'blog', 'title' => 'Panda Master Blog — Game Guides, Tips & Winning Strategies', 'desc' => 'Read the latest Panda Master news, winning tips, and game guides. Stay updated with platform improvements and new game releases.', 'keyword' => 'panda master blog, panda masters news, fish game tips, winning strategies', 'is_active' => true],
            ['page_type' => 'contact', 'title' => 'Contact Panda Master — 24/7 Player Support & Help', 'desc' => 'Need help with your Panda Master account? Contact our support team via Facebook, WhatsApp, or email. We are here to help 24/7.', 'keyword' => 'contact panda master, panda masters support, panda master help', 'is_active' => true],
            ['page_type' => 'about', 'title' => 'About Panda Master — Redefining the Level of Play', 'desc' => 'Learn about Panda Master — the leading online gaming platform for fish games and slots. Built for immersive experiences and high-stakes thrills.', 'keyword' => 'about panda master, panda masters company, what is panda master', 'is_active' => true],
            ['page_type' => 'login', 'title' => 'Panda Master Login — Fast Player Access to Fish Games & Slots', 'desc' => 'Access your Panda Master account and start playing the best fish games and slots online. Fast, secure player login for mobile and browser play.', 'keyword' => 'panda master login, panda masters login, panda masters vip login, player login', 'is_active' => true],
            ['page_type' => 'fish-games', 'title' => 'Panda Master Fish Games — Play Fish Shooting Games Online', 'desc' => 'Play Panda Master fish games online. Experience skill-based shooting games with real rewards. Join competitive rooms and win genuine cash prizes.', 'keyword' => 'panda masters fish games, panda masters online fish games, play panda masters fish games, panda masters fish game, panda masters fish table', 'is_active' => true],
            ['page_type' => 'slot-games', 'title' => 'Panda Master Slot Games — Spin and Win Real Money Online', 'desc' => 'Spin the reels on Panda Master slot games. Classic three-reel machines and modern video slots with massive bonus features and jackpots.', 'keyword' => 'panda masters slot games, panda masters slots, play panda masters slots, panda masters slot machine games, panda masters casino slots', 'is_active' => true],
            ['page_type' => 'table-games', 'title' => 'Panda Master Sweepstakes Table Games — Play Online', 'desc' => 'Strategic Panda Master table games online. Play card games and sweepstakes games with real prize opportunities on any device.', 'keyword' => 'panda masters sweepstakes table games, panda masters table games, panda masters sweepstakes games, panda masters casino table games', 'is_active' => true],
            ['page_type' => 'keno', 'title' => 'Panda Master Keno — Play Online Keno Games and Win Real Prizes', 'desc' => 'Play Panda Master keno online. Pick your numbers, watch the draw, and win real prizes. Simple, fast, and exciting keno action.', 'keyword' => 'panda masters keno, panda masters keno games, play panda masters keno, panda masters online keno, panda masters keno login', 'is_active' => true],
        ];

        foreach ($metaTags as $mt) {
            MetaTag::updateOrCreate(['page_type' => $mt['page_type']], $mt);
            $this->command->info('   ✓ Meta Tag: ' . $mt['page_type']);
        }
    }

    protected function seedBlogPosts(): void
    {
        $this->command->info('📝 Seeding Blog Posts...');

        $posts = [
            [
                'title' => 'What is Panda Master? The Ultimate Fish Game & Casino Platform Guide',
                'slug' => 'what-is-panda-master-ultimate-guide',
                'content' => "Panda Master is the ultimate online fish game and casino platform. Built for winners, it offers 30+ games including fish hunting, slots, and arcade games.\n\n## Why Choose Panda Master?\n\nPanda Master stands out with its extensive game library, user-friendly interface, and high-octane thrills. Available on Android, iOS, and PC.\n\n## Key Features\n- **30+ Games**: Fish games, slots, and arcade titles\n- **Play Online or Download**: Instant browser play or native apps\n- **Elite Support**: 24/7 assistance through official channels\n- **Secure Platform**: Encrypted and fair gameplay\n\n## Getting Started\nConnect with our distributor on Facebook, get your login, and start playing instantly in your browser or download the app.",
                'excerpt' => 'Discover everything about Panda Master — the ultimate fish game and online casino platform with 30+ games.',
                'author' => 'Panda Master Team',
                'status' => 'published',
                'meta_title' => 'What is Panda Master? Complete Fish Game & Casino Platform Guide',
                'meta_description' => 'Learn what Panda Master is and why it\'s the top choice for fish games and online casino gaming.',
                'meta_keywords' => 'what is panda master, panda masters guide, fish game platform',
            ],
            [
                'title' => 'How to Play Panda Master Online — No Download Needed',
                'slug' => 'how-to-play-panda-master-online-no-download',
                'content' => "Playing Panda Master online is simple and fast. With instant browser play, you can access your favorite games without installing anything.\n\n## Steps to Play Online\n1. **Visit the Portal**: Click the Play Online button on our site\n2. **Login**: Enter your account credentials\n3. **Select Game**: Pick any fish game or slot\n4. **Start Winning**: Play instantly on any device\n\n## Benefits of Online Play\n- Zero installation required\n- Works perfectly on Android/iOS browsers\n- Saves device storage\n- Automatic updates",
                'excerpt' => 'Learn how to play Panda Master online instantly without downloading. Quick guide to browser-based gaming.',
                'author' => 'Panda Master Team',
                'status' => 'published',
                'meta_title' => 'How to Play Panda Master Online — Instant Browser Play Guide',
                'meta_description' => 'Play Panda Master online without downloading. Step-by-step guide to instant browser fish games.',
                'meta_keywords' => 'panda master play online, no download casino, browser fish game',
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
            $this->command->info('   ✓ Blog Post: ' . $post['title']);
        }
    }
}
