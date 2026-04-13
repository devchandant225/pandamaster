<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\MetaTag;
use App\Models\GameCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PandaMasterSeeder extends Seeder
{
    public function run(): void
    {
        $this->command->info('🐼 Seeding PandaMaster VIP Platform...');

        $this->seedAdminProfile();
        $this->seedGameCategories();
        $this->seedMetaTags();
        $this->seedBlogCategories();
        $this->seedBlogPosts();

        $this->command->info('✅ PandaMaster VIP platform seeded successfully!');
    }

    protected function seedAdminProfile(): void
    {
        $this->command->info('📝 Seeding Admin Profile...');

        User::updateOrCreate(
            ['email' => 'admin@pandamaster.vip'],
            [
                'name' => 'PandaMaster Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'phone' => '+1234567890',
                'whatsapp' => '+1234567890',
                'viber' => '+1234567890',
                'facebook' => 'https://facebook.com/pandamastervip',
                'twitter' => 'https://twitter.com/pandamastervip',
                'linkedin' => 'https://linkedin.com/company/pandamaster',
                'instagram' => 'https://instagram.com/pandamastervip',
                'tiktok' => 'https://tiktok.com/@pandamastervip',
                'telegram' => 'https://t.me/pandamastervip',
                'pinterest' => 'https://pinterest.com/pandamastervip',
                'description' => 'PandaMaster VIP — The Ultimate Fish Game & Online Casino Platform. Built on Fire Kirin with 30+ games and real cash rewards.',
                'login_url' => 'https://pandamaster.vip/login',
                'register_url' => 'https://pandamaster.vip/register',
                'youtube_url' => 'https://youtube.com/@pandamastervip',
                'external_dashboard_url' => 'https://dashboard.pandamaster.vip',
                'footer_description' => 'PandaMaster VIP — The Ultimate Fish Game & Online Casino Platform. Play 30+ games, win real cash, join the community today.',
            ]
        );

        $this->command->info('   ✓ Admin user created: admin@pandamaster.vip');
    }

    protected function seedGameCategories(): void
    {
        $this->command->info('🎮 Seeding Game Categories...');

        $categories = [
            ['name' => 'Fish Games', 'slug' => 'fish-games', 'description' => 'Multiplayer boss battles — Ocean King, Thunder Dragon, and more', 'icon_url' => 'https://via.placeholder.com/100x100/00BFFF/FFFFFF?text=Fish', 'sort_order' => 1, 'is_active' => true],
            ['name' => 'Panda Slots', 'slug' => 'panda-slots', 'description' => 'Spin and win with exciting slot games featuring progressive jackpots', 'icon_url' => 'https://via.placeholder.com/100x100/22C55E/FFFFFF?text=Slots', 'sort_order' => 2, 'is_active' => true],
            ['name' => 'Arcade Games', 'slug' => 'arcade-games', 'description' => 'Fun arcade-style games with real money rewards', 'icon_url' => 'https://via.placeholder.com/100x100/A855F7/FFFFFF?text=Arcade', 'sort_order' => 3, 'is_active' => true],
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
            ['page_type' => 'home', 'title' => 'PandaMaster VIP — The Ultimate Fish Game & Online Casino Platform', 'desc' => 'Play PandaMaster VIP — 30+ fish games, slots, arcade & table games. Free download for Android/iOS/PC. Get real cash rewards and join thousands of players today!', 'keyword' => 'panda master, pandamaster, panda master vip, pandamaster vip, panda master xyz, panda masters, fish game, online casino, real cash, fire kirin', 'is_active' => true],
            ['page_type' => 'play-online', 'title' => 'PandaMaster Play Online — No Download Needed, Play Instantly in Your Browser', 'desc' => 'Play PandaMaster online instantly in your browser. No download required. Access 30+ fish games, slots and arcade games directly from your device.', 'keyword' => 'panda master play online, panda master play online without downloading, panda master casino play online, fire kirin play online login, pandamaster online', 'is_active' => true],
            ['page_type' => 'download', 'title' => 'PandaMaster Download — Get the App on Android, iOS & PC | Free APK', 'desc' => 'Download PandaMaster for Android (~93MB APK), iOS and PC. Safe, verified download. Install and start playing fish games, slots and arcade games today.', 'keyword' => 'panda master download, panda master apk, pandamaster download apk, panda master 777 apk download, fire kirin xyz app, panda master pc download', 'is_active' => true],
            ['page_type' => 'casino', 'title' => 'PandaMaster Casino — Fish Games, Slots & Real Money Gaming Online', 'desc' => 'Experience PandaMaster Casino — fish games, panda slots, table games and real money rewards. Play online or download the app. Safe, fair, and fun.', 'keyword' => 'panda master casino, panda master online casino, panda master casino play online, panda slots, fish game casino, real money casino', 'is_active' => true],
            ['page_type' => 'games', 'title' => 'PandaMaster Games — 30+ Fish Games, Slots, Arcade & More', 'desc' => 'Browse all PandaMaster games. Find your favorite fish games, panda slots, arcade and table games. Filter by category, popularity, or new releases.', 'keyword' => 'panda master games, panda slots, panda master fish game, arcade games, online casino games, fire kirin games', 'is_active' => true],
            ['page_type' => 'game', 'title' => 'Play PandaMaster Game Online | Fish Games & Casino Gaming', 'desc' => 'Play this exciting PandaMaster game online. Enjoy high-quality graphics, multiplayer action, and real cash rewards. Try demo mode or play for real money.', 'keyword' => 'panda master game, play panda master online, fish game, online casino game, panda master slots', 'is_active' => true],
            ['page_type' => 'login', 'title' => 'PandaMaster Login — Access Your Account & Play Online', 'desc' => 'Login to your PandaMaster account and start playing. Access your balance, bonuses, and favorite games. Player and admin login available.', 'keyword' => 'panda master login, pandamaster login, panda master online login, panda master admin login, panda master play online login', 'is_active' => true],
            ['page_type' => 'register', 'title' => 'PandaMaster Register — Create Your Account | Get Welcome Bonus', 'desc' => 'Register for PandaMaster VIP and get welcome bonus credits. Quick signup via distributor, instant access to 30+ games, and 24/7 support.', 'keyword' => 'panda master register, pandamaster signup, create panda master account, panda master vip register, panda master welcome bonus', 'is_active' => true],
            ['page_type' => 'about', 'title' => 'About PandaMaster VIP — Leading Fish Game & Casino Platform', 'desc' => 'Learn about PandaMaster VIP — built on Fire Kirin with 30+ games, real cash rewards, and a growing community of players worldwide.', 'keyword' => 'about panda master, panda master vip about, panda master company, fish game platform, panda master community', 'is_active' => true],
            ['page_type' => 'blog', 'title' => 'PandaMaster Blog — Game Guides, Tips & Winning Strategies', 'desc' => 'Read the latest PandaMaster blog posts. Get game guides, winning strategies, platform updates, and community news.', 'keyword' => 'panda master blog, panda master tips, fish game guides, casino strategies, panda master news, gaming blog', 'is_active' => true],
            ['page_type' => 'post', 'title' => 'PandaMaster Blog Post — Gaming Insights & Tips', 'desc' => 'Expert insights and tips for PandaMaster VIP gaming. Learn strategies, game mechanics, and bonus optimization.', 'keyword' => 'panda master blog post, gaming insights, fish game tips, casino strategies, panda master advice', 'is_active' => true],
            ['page_type' => 'dashboard', 'title' => 'PandaMaster Dashboard — Your Gaming Hub', 'desc' => 'Access your PandaMaster dashboard. View your balance, bonuses, game history, and personalized recommendations.', 'keyword' => 'panda master dashboard, pandamaster player dashboard, panda master account, gaming dashboard', 'is_active' => true],
            ['page_type' => 'contact', 'title' => 'Contact PandaMaster VIP — 24/7 Customer Support & Help', 'desc' => 'Need help? Contact PandaMaster VIP support via WhatsApp, Telegram, email, or Discord. Our team is available 24/7 to assist you.', 'keyword' => 'contact panda master, panda master support, panda master help, customer service, panda master contact', 'is_active' => true],
            ['page_type' => 'privacy', 'title' => 'Privacy Policy — PandaMaster VIP', 'desc' => 'Read PandaMaster VIP privacy policy. We protect your personal information and ensure secure gaming with industry-standard encryption.', 'keyword' => 'panda master privacy policy, data protection, panda master security, gaming privacy', 'is_active' => true],
            ['page_type' => 'terms', 'title' => 'Terms & Conditions — PandaMaster VIP', 'desc' => 'Review PandaMaster VIP terms and conditions. Understand our rules, bonuses, withdrawals, and player responsibilities.', 'keyword' => 'panda master terms, panda master conditions, gaming policies, terms of service', 'is_active' => true],
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
            ['name' => 'PandaMaster Updates', 'slug' => 'pandamaster-updates'],
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
        $fishGames = Category::where('slug', 'fish-games-blog')->first();
        $slotsStrategy = Category::where('slug', 'slots-strategy')->first();
        $pandaUpdates = Category::where('slug', 'pandamaster-updates')->first();
        $tipsTricks = Category::where('slug', 'tips-tricks')->first();

        $posts = [
            [
                'title' => 'What is PandaMaster? The Ultimate Fish Game & Casino Platform Guide',
                'slug' => 'what-is-pandamaster-ultimate-guide',
                'content' => "PandaMaster VIP is the ultimate online fish game and casino platform. Built on the Fire Kirin engine, it offers 30+ games including fish hunting, slots, arcade, and table games.\n\n## Why Choose PandaMaster?\n\nPandaMaster stands out with its extensive game library, user-friendly interface, and real cash rewards. Available on Android, iOS, and PC.\n\n## Key Features\n- **30+ Games**: Fish games, slots, arcade, and table games\n- **Play Online or Download**: Browser play or native apps\n- **Welcome Bonus**: Get credits when you sign up via distributor\n- **Secure Platform**: Encrypted and fair gameplay\n- **24/7 Support**: Community on Discord, Reddit, TikTok\n\n## Getting Started\nRegister through an authorized distributor, download the app, login, and start playing. You can also play directly in your browser without downloading.",
                'excerpt' => 'Discover everything about PandaMaster VIP — the ultimate fish game and online casino platform with 30+ games and real cash rewards.',
                'author' => 'PandaMaster Team',
                'category_id' => $gameGuides?->id,
                'status' => 'published',
                'meta_title' => 'What is PandaMaster? Complete Fish Game & Casino Platform Guide',
                'meta_description' => 'Learn what PandaMaster VIP is and why it\'s the top choice for fish games and online casino gaming. Discover slots, arcade games, and more.',
                'meta_keywords' => 'what is panda master, pandamaster guide, fish game platform, panda master review, online casino',
            ],
            [
                'title' => 'How to Play PandaMaster Online — No Download Needed',
                'slug' => 'how-to-play-pandamaster-online-no-download',
                'content' => "Playing PandaMaster online has never been easier. With instant browser play, you can access all your favorite games without downloading any software.\n\n## Steps to Play Online\n1. **Visit the Website**: Go to pandamaster.vip/play-online\n2. **Login**: Use your credentials or guest access\n3. **Browse Games**: Explore fish games, slots, and arcade\n4. **Start Playing**: Click any game to start instantly\n\n## Benefits of Online Play\n- No installation required\n- Works on all devices\n- Always updated automatically\n- Save storage space on your device",
                'excerpt' => 'Learn how to play PandaMaster online instantly without downloading. Quick guide to browser-based fish game and casino gaming.',
                'author' => 'PandaMaster Team',
                'category_id' => $gameGuides?->id,
                'status' => 'published',
                'meta_title' => 'How to Play PandaMaster Online — Instant Browser Play Guide',
                'meta_description' => 'Play PandaMaster online without downloading. Step-by-step guide to instant browser fish game and casino gaming.',
                'meta_keywords' => 'panda master play online, no download casino, browser fish game, instant play pandamaster',
            ],
            [
                'title' => 'PandaMaster Download Guide — Get the Latest APK for Android, iOS & PC',
                'slug' => 'pandamaster-download-guide-latest-apk',
                'content' => "Download the PandaMaster app for the ultimate gaming experience. Optimized for Android (~93MB APK), iOS, and Windows PC.\n\n## Android Download\n1. Enable 'Install from Unknown Sources' in settings\n2. Download the APK from our official page\n3. Install and open the app\n4. Login with your credentials\n\n## iOS Installation\nFollow the on-screen instructions after downloading from our page.\n\n## PC Download\nDownload the Windows installer and run it as administrator.\n\n## Safety Note\nAll downloads are verified, encrypted, and malware-free.",
                'excerpt' => 'Complete guide to downloading and installing PandaMaster on Android, iOS and PC. Get the latest APK now.',
                'author' => 'PandaMaster Team',
                'category_id' => $pandaUpdates?->id,
                'status' => 'published',
                'meta_title' => 'PandaMaster Download Guide — Latest APK for Android, iOS & PC',
                'meta_description' => 'Download PandaMaster APK for Android and iOS. Complete installation guide for the latest version including PC download.',
                'meta_keywords' => 'panda master download, panda master apk, pandamaster download, fire kirin xyz app, panda master pc',
            ],
            [
                'title' => 'Top Fish Games on PandaMaster — Ocean King, Thunder Dragon & More',
                'slug' => 'top-fish-games-pandamaster',
                'content' => "Fish games are the heart of PandaMaster. Here are the most popular ones:\n\n## Ocean King\nThe flagship fish game with boss battles and multiplayer action.\n\n## Thunder Dragon\nHigh-energy fish hunting with special weapons and power-ups.\n\n## Tips for Winning\n- Start with smaller fish to practice\n- Save special weapons for bosses\n- Play during off-peak hours\n- Manage your bankroll wisely",
                'excerpt' => 'Discover the top fish games on PandaMaster. Learn tips, strategies, and which games offer the best payouts.',
                'author' => 'PandaMaster Team',
                'category_id' => $fishGames?->id,
                'status' => 'published',
                'meta_title' => 'Top Fish Games on PandaMaster — Ocean King, Thunder Dragon & More',
                'meta_description' => 'Explore the best fish games on PandaMaster. Get tips, strategies, and find out which games offer the biggest payouts.',
                'meta_keywords' => 'panda master fish game, ocean king, thunder dragon, fish hunting game, pandamaster fish games',
            ],
            [
                'title' => 'Panda Slots Strategy — How to Win Big on PandaMaster',
                'slug' => 'panda-slots-strategy-win-big',
                'content' => "Maximize your slot winnings on PandaMaster with these proven strategies:\n\n## Understanding RTP\nChoose games with higher Return to Player percentages.\n\n## Bankroll Management\n- Set a budget before playing\n- Start with smaller bets\n- Know when to stop\n- Take advantage of free spins\n\n## Bonus Features\nMost slots include free spins, multipliers, and progressive jackpots. Learn how to trigger them.",
                'excerpt' => 'Proven panda slots strategies to maximize your winnings on PandaMaster VIP. Tips from experienced players.',
                'author' => 'PandaMaster Team',
                'category_id' => $slotsStrategy?->id,
                'status' => 'published',
                'meta_title' => 'Panda Slots Strategy — How to Win Big on PandaMaster',
                'meta_description' => 'Learn winning strategies for panda slots on PandaMaster. Bankroll management, game selection, and bonus optimization tips.',
                'meta_keywords' => 'panda slots strategy, panda master slots, slot machine tips, how to win slots, panda master strategy',
            ],
        ];

        foreach ($posts as $post) {
            Post::updateOrCreate(['slug' => $post['slug']], $post);
            $this->command->info('   ✓ Blog Post: ' . $post['title']);
        }

        $this->command->info('');
        $this->command->info('📊 Seeding Summary:');
        $this->command->info('   - Admin Profile: 1 user (admin@pandamaster.vip)');
        $this->command->info('   - Game Categories: 5 categories');
        $this->command->info('   - Meta Tags: 15 page types');
        $this->command->info('   - Blog Categories: 5 categories');
        $this->command->info('   - Blog Posts: 5 posts');
    }
}
