-- Insert cities for 888Realty
-- Run this SQL in your database (e.g., via phpMyAdmin or MySQL command line)

INSERT INTO cities (name, slug, image_url, description, listing_count, created_at, updated_at) VALUES
('Vancouver', 'vancouver', 'https://images.unsplash.com/photo-1513656428746-66aea1af5590?w=1080', 'The heart of British Columbia, offering urban luxury and natural beauty.', '1,200+', NOW(), NOW()),
('Burnaby', 'burnaby', 'https://images.unsplash.com/photo-1724113595861-93b16bc264a5?w=1080', 'A vibrant city with excellent parks, shopping, and diverse neighborhoods.', '850+', NOW(), NOW()),
('Surrey', 'surrey', 'https://images.unsplash.com/photo-1563421743460-1ee3c68f0ddf?w=1080', 'One of Canada\'s fastest-growing cities, perfect for families and investors.', '950+', NOW(), NOW()),
('Richmond', 'richmond', 'https://images.unsplash.com/photo-1660283698464-ea3914326c29?w=1080', 'A unique island city known for its rich culture and waterfront properties.', '720+', NOW(), NOW()),
('Coquitlam', 'coquitlam', 'https://images.unsplash.com/photo-1621293954908-45f497cc8ec5?w=1080', 'A family-friendly community with great schools and outdoor recreation.', '580+', NOW(), NOW()),
('North Vancouver', 'north-vancouver', 'https://images.unsplash.com/photo-1599423423927-7e7f3287b3e8?w=1080', 'Nestled between mountains and sea, offering stunning views and outdoor lifestyle.', '620+', NOW(), NOW()),
('West Vancouver', 'west-vancouver', 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?w=1080', 'Luxury waterfront living with prestigious neighborhoods and top-rated schools.', '450+', NOW(), NOW());
