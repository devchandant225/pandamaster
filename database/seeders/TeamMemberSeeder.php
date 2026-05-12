<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Michael Chen',
                'role' => 'Principal Broker & Founder',
                'bio' => 'With over 15 years of experience in the Vancouver luxury market, Michael has facilitated over $500M in residential transactions. He specializes in high-end estates in West Vancouver and Shaughnessy.',
                'sort_order' => 1,
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'facebook_url' => 'https://facebook.com',
            ],
            [
                'name' => 'Sarah Thompson',
                'role' => 'Senior Market Analyst',
                'bio' => 'Sarah provides our clients with data-driven insights. Her weekly market reports are a staple for investors looking to navigate the complex Greater Vancouver real estate landscape.',
                'sort_order' => 2,
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'facebook_url' => 'https://facebook.com',
            ],
            [
                'name' => 'David Rodriguez',
                'role' => 'Investment Specialist',
                'bio' => 'David focuses on multi-family residential and commercial investment opportunities. He helps international and local investors build diverse portfolios with high-yield potential.',
                'sort_order' => 3,
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'facebook_url' => 'https://facebook.com',
            ],
            [
                'name' => 'Emily White',
                'role' => 'Client Success Manager',
                'bio' => 'Emily ensures that every client matched through our platform receives premium service. She oversees our agent vetting process and handles specialist matching for high-priority inquiries.',
                'sort_order' => 4,
                'linkedin_url' => 'https://linkedin.com',
                'twitter_url' => 'https://twitter.com',
                'facebook_url' => 'https://facebook.com',
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['name' => $member['name']],
                $member
            );
        }
    }
}
