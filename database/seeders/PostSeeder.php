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
                'title' => 'Vancouver Real Estate Market Outlook 2026',
                'excerpt' => 'Discover the latest trends and predictions for Vancouver\'s housing market this year.',
                'image_url' => 'https://images.unsplash.com/photo-1513656428746-66aea1af5590?w=1080',
                'content' => 'The Vancouver real estate market remains one of the most dynamic in North America. In 2026, we expect to see a stabilization of prices coupled with a continued high demand for luxury condos and family homes in emerging neighborhoods like Burnaby and Surrey. Experts suggest that inventory levels will remain tight, making it essential for buyers to have access to off-market listings.'
            ],
            [
                'title' => 'First-Time Home Buyer\'s Guide',
                'excerpt' => 'Essential tips and strategies for navigating your first real estate purchase.',
                'image_url' => 'https://images.unsplash.com/photo-1652878530627-cc6f063e3947?w=1080',
                'content' => 'Buying your first home can be overwhelming. From understanding mortgage rates to navigating open houses, there\'s a lot to learn. Our guide breaks down the process into simple steps, starting with financial preparation and ending with the successful closing of your new home. We also explore government grants and incentives available to first-time buyers in British Columbia.'
            ],
            [
                'title' => 'How to Sell Your Home Fast in 2026',
                'excerpt' => 'Proven tactics to attract buyers and close deals quickly in today\'s market.',
                'image_url' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1080',
                'content' => 'In a competitive market, preparation is key. We discuss the importance of professional staging, high-quality photography, and strategic pricing. Additionally, we explore how digital marketing and social media play a crucial role in reaching potential buyers and creating a sense of urgency.'
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
                    'author' => '888Realty Team'
                ]
            );
        }
    }
}
