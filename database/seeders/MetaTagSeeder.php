<?php

namespace Database\Seeders;

use App\Models\MetaTag;
use Illuminate\Database\Seeder;

class MetaTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metaTags = [
            [
                'page_type' => 'home',
                'title' => '888Realty - Premium Real Estate Services in Vancouver',
                'desc' => 'Discover luxury homes and exclusive property listings in Vancouver. Work with top real estate agents at 888Realty for buying, selling, and investment opportunities.',
                'keyword' => 'Vancouver real estate, luxury homes, property for sale, Vancouver realtor, 888Realty, premium listings, condos Vancouver, houses Vancouver',
                'is_active' => true,
            ],
            [
                'page_type' => 'about',
                'title' => 'About 888Realty - Vancouver\'s Trusted Real Estate Partner',
                'desc' => 'Learn about 888Realty\'s commitment to excellence in Vancouver real estate. Our experienced team provides personalized service for buyers and sellers.',
                'keyword' => 'about 888Realty, Vancouver real estate company, real estate agents Vancouver, property experts',
                'is_active' => true,
            ],
            [
                'page_type' => 'contact',
                'title' => 'Contact 888Realty - Get in Touch with Our Real Estate Experts',
                'desc' => 'Ready to buy or sell? Contact 888Realty today. Our Vancouver real estate specialists are here to help you find your dream home or investment property.',
                'keyword' => 'contact 888Realty, Vancouver realtor contact, real estate inquiry, property consultation Vancouver',
                'is_active' => true,
            ],
            [
                'page_type' => 'city',
                'title' => 'Vancouver Neighborhoods - Find Your Perfect Community | 888Realty',
                'desc' => 'Explore Vancouver\'s diverse neighborhoods. Find the perfect community with 888Realty\'s comprehensive city and neighborhood guides.',
                'keyword' => 'Vancouver neighborhoods, Vancouver communities, city guide, living in Vancouver, neighborhood real estate',
                'is_active' => true,
            ],
            [
                'page_type' => 'property',
                'title' => 'Property Details - Luxury Homes & Condos | 888Realty',
                'desc' => 'View detailed property information, photos, and amenities for Vancouver luxury homes and condos. Schedule your private showing with 888Realty.',
                'keyword' => 'property details, Vancouver homes for sale, luxury condos, property listing, real estate viewing',
                'is_active' => true,
            ],
            [
                'page_type' => 'properties',
                'title' => 'Properties for Sale - Vancouver Real Estate Listings | 888Realty',
                'desc' => 'Browse all available properties in Vancouver. Find houses, condos, townhomes, and land for sale with 888Realty\'s comprehensive listings.',
                'keyword' => 'Vancouver properties, homes for sale, condos for sale, townhomes Vancouver, land for sale, real estate listings',
                'is_active' => true,
            ],
            [
                'page_type' => 'blog',
                'title' => 'Vancouver Real Estate Blog - Market Insights & Tips | 888Realty',
                'desc' => 'Stay informed with the latest Vancouver real estate market insights, buying tips, and property trends from the 888Realty blog.',
                'keyword' => 'Vancouver real estate blog, market insights, property tips, home buying advice, real estate trends',
                'is_active' => true,
            ],
            [
                'page_type' => 'post',
                'title' => 'Real Estate Insights & News | 888Realty Blog',
                'desc' => 'Read expert insights on Vancouver real estate, market analysis, and home buying/selling tips from 888Realty professionals.',
                'keyword' => 'real estate news, Vancouver market update, property insights, home selling tips, real estate advice',
                'is_active' => true,
            ],
            [
                'page_type' => 'privacy',
                'title' => 'Privacy Policy - 888Realty Real Estate Services',
                'desc' => 'Read 888Realty\'s privacy policy. We are committed to protecting your personal information and ensuring your privacy rights.',
                'keyword' => 'privacy policy, data protection, personal information, privacy rights, 888Realty policies',
                'is_active' => true,
            ],
            [
                'page_type' => 'terms-condition',
                'title' => 'Terms & Conditions - 888Realty Real Estate Services',
                'desc' => 'Review 888Realty\'s terms and conditions for using our website and real estate services. Understand your rights and responsibilities.',
                'keyword' => 'terms and conditions, website terms, service agreement, legal terms, 888Realty policies',
                'is_active' => true,
            ],
        ];

        foreach ($metaTags as $metaTagData) {
            MetaTag::updateOrCreate(
                ['page_type' => $metaTagData['page_type']],
                $metaTagData
            );
        }

        $this->command->info('Meta tags seeded successfully!');
    }
}
