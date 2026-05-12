<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Top 10 Slot Strategies for Maximum Wins in 2026',
                'excerpt' => 'Master these proven slot strategies to boost your winning potential and maximize your bankroll.',
                'image_url' => 'https://images.unsplash.com/photo-1596838132731-3301c3fd4317?w=1080',
                'content' => '<p>Slot machines remain one of the most popular games in online gaming. In 2026, understanding RTP (Return to Player) percentages and volatility is essential for smart play.</p>

<h2>Understanding RTP</h2>
<p>Always choose games with RTP of 96% or higher. Games like Starlight Princess (96.50%) and Gates of Olympus (96.51%) offer some of the best odds in the industry.</p>

<h2>Bankroll Management</h2>
<p>Never bet more than 2% of your total bankroll on a single spin. This ensures you can weather losing streaks and stay in the game long enough to hit big wins.</p>

<h2>Take Advantage of Bonuses</h2>
<p>Orion Star offers generous bonus coins and free spins. Always check the promotions page and use these bonuses to extend your gameplay without additional deposits.</p>

<h2>Know When to Stop</h2>
<p>Set win and loss limits before you start playing. If you hit your target, cash out and celebrate. Responsible gaming is the key to long-term enjoyment.</p>'
            ],
            [
                'title' => 'Beginner\'s Guide to Fish Games: Catch Big Wins',
                'excerpt' => 'Learn the basics of fish shooting games and discover techniques to maximize your earnings.',
                'image_url' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=1080',
                'content' => '<p>Fish games have exploded in popularity, offering skill-based gameplay where your accuracy directly impacts your winnings. Here\'s everything you need to know to get started.</p>

<h2>What Are Fish Games?</h2>
<p>Fish games are arcade-style shooting games where you target various sea creatures. Each fish has a different point value, with boss fish offering massive payouts.</p>

<h2>Essential Tips for Beginners</h2>
<ul>
<li><strong>Start Small:</strong> Begin with low-stakes tables to practice your aim and understand the game mechanics.</li>
<li><strong>Target High-Value Fish:</strong> Focus on rare fish and bosses for maximum returns.</li>
<li><strong>Use Special Weapons:</strong> Learn when to use bombs, lightning, and other power-ups for optimal results.</li>
<li><strong>Watch Your Ammo:</strong> Don\'t waste shots on fish that are about to disappear. Be strategic with every bullet.</li>
</ul>

<h2>Pro Strategy</h2>
<p>Many experienced players recommend targeting medium-value fish consistently rather than chasing bosses. This steady approach builds your balance over time.</p>'
            ],
            [
                'title' => 'VIP Program Explained: How to Reach Diamond Status',
                'excerpt' => 'Unlock exclusive perks and rewards by climbing the Orion Star VIP ladder.',
                'image_url' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?w=1080',
                'content' => '<p>Our VIP program rewards loyal players with exclusive benefits, faster withdrawals, personal account managers, and special bonuses. Here\'s how to climb the ranks.</p>

<h2>VIP Tiers</h2>
<ul>
<li><strong>Bronze:</strong> Entry level - Access to basic rewards</li>
<li><strong>Silver:</strong> Wager $1,000 - Priority support</li>
<li><strong>Gold:</strong> Wager $10,000 - Higher withdrawal limits</li>
<li><strong>Platinum:</strong> Wager $50,000 - Personal account manager</li>
<li><strong>Diamond:</strong> Wager $100,000 - Exclusive VIP events and bonuses</li>
</ul>

<h2>Tips to Level Up Faster</h2>
<p>Play games with higher RTP to minimize losses while accumulating wagering requirements. Take advantage of double points promotions and special VIP events.</p>

<h2>Diamond Benefits</h2>
<p>Diamond members enjoy instant withdrawals, custom bonus offers, invitations to exclusive tournaments, and a dedicated VIP host available 24/7.</p>'
            ]
        ];

        foreach ($posts as $postData) {
            Post::updateOrCreate(
                ['slug' => Str::slug($postData['title'])],
                [
                    'title' => $postData['title'],
                    'excerpt' => $postData['excerpt'],
                    'image_url' => $postData['image_url'],
                    'content' => $postData['content'],
                    'author' => 'Orion Star VIP Team'
                ]
            );
        }
    }
}
