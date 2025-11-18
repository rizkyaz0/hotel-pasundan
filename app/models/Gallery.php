<?php
class Gallery {
    public static function getAll() {
        return [
            [
                'id' => 1,
                'title' => 'Lobby Hotel',
                'category' => 'interior',
                'image' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1564501049412-61c2a3083791?w=400&q=80'
            ],
            [
                'id' => 2,
                'title' => 'Kolam Renang',
                'category' => 'facilities',
                'image' => 'https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?w=400&q=80'
            ],
            [
                'id' => 3,
                'title' => 'Restaurant',
                'category' => 'dining',
                'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&q=80'
            ],
            [
                'id' => 4,
                'title' => 'Deluxe Room',
                'category' => 'rooms',
                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=400&q=80'
            ],
            [
                'id' => 5,
                'title' => 'Spa & Wellness',
                'category' => 'facilities',
                'image' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=400&q=80'
            ],
            [
                'id' => 6,
                'title' => 'Executive Suite',
                'category' => 'rooms',
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400&q=80'
            ],
            [
                'id' => 7,
                'title' => 'Rooftop Bar',
                'category' => 'dining',
                'image' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=400&q=80'
            ],
            [
                'id' => 8,
                'title' => 'Fitness Center',
                'category' => 'facilities',
                'image' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=400&q=80'
            ],
            [
                'id' => 9,
                'title' => 'Presidential Suite',
                'category' => 'rooms',
                'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=400&q=80'
            ],
            [
                'id' => 10,
                'title' => 'Meeting Room',
                'category' => 'facilities',
                'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&q=80'
            ],
            [
                'id' => 11,
                'title' => 'Ballroom',
                'category' => 'facilities',
                'image' => 'https://images.unsplash.com/photo-1519167758481-83f29da8c2b0?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1519167758481-83f29da8c2b0?w=400&q=80'
            ],
            [
                'id' => 12,
                'title' => 'Garden View',
                'category' => 'exterior',
                'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&q=80',
                'thumbnail' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80'
            ]
        ];
    }

    public static function getByCategory($category) {
        $all = self::getAll();
        return array_filter($all, function($item) use ($category) {
            return $item['category'] === $category;
        });
    }

    public static function getCategories() {
        return [
            'all' => 'Semua',
            'rooms' => 'Kamar',
            'facilities' => 'Fasilitas',
            'dining' => 'Restoran & Bar',
            'exterior' => 'Eksterior',
            'interior' => 'Interior'
        ];
    }
}
