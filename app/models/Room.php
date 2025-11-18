<?php
class Room {
    public static function getAll() {
        return [
            [
                'id' => 1,
                'name' => 'Deluxe Room',
                'slug' => 'deluxe-room',
                'description' => 'Kamar mewah dengan pemandangan kota yang menakjubkan. Dilengkapi dengan tempat tidur king-size, TV LED 55", dan balkon pribadi.',
                'image' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800&q=80',
                'size' => '35 m²',
                'capacity' => '2 Orang',
                'bed' => 'King Bed',
                'facilities' => ['WiFi Gratis', 'AC', 'TV LED 55"', 'Mini Bar', 'Balkon Pribadi', 'Kamar Mandi Mewah']
            ],
            [
                'id' => 2,
                'name' => 'Executive Suite',
                'slug' => 'executive-suite',
                'description' => 'Suite eksekutif dengan ruang tamu terpisah dan area kerja yang nyaman. Sempurna untuk tamu bisnis yang menginginkan kenyamanan ekstra.',
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&q=80',
                'size' => '50 m²',
                'capacity' => '2-3 Orang',
                'bed' => 'King Bed',
                'facilities' => ['WiFi Gratis', 'AC', 'TV LED 65"', 'Mini Bar', 'Ruang Tamu', 'Area Kerja', 'Bathtub', 'Coffee Maker']
            ],
            [
                'id' => 3,
                'name' => 'Presidential Suite',
                'slug' => 'presidential-suite',
                'description' => 'Suite paling mewah dengan pemandangan panorama 360°. Dilengkapi dengan ruang makan pribadi, jacuzzi, dan layanan butler 24 jam.',
                'image' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800&q=80',
                'size' => '120 m²',
                'capacity' => '4 Orang',
                'bed' => 'King Bed + Twin Bed',
                'facilities' => ['WiFi Gratis', 'AC', 'TV LED 75"', 'Mini Bar Premium', 'Ruang Tamu', 'Ruang Makan', 'Jacuzzi', 'Butler Service', 'Kitchen']
            ],
            [
                'id' => 4,
                'name' => 'Family Suite',
                'slug' => 'family-suite',
                'description' => 'Suite keluarga yang luas dengan 2 kamar tidur terpisah. Ideal untuk liburan keluarga dengan fasilitas lengkap dan area bermain anak.',
                'image' => 'https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=800&q=80',
                'size' => '75 m²',
                'capacity' => '4-6 Orang',
                'bed' => '2 King Beds',
                'facilities' => ['WiFi Gratis', 'AC', '2 TV LED 55"', 'Mini Bar', 'Ruang Keluarga', 'Kitchenette', '2 Kamar Mandi', 'Area Bermain']
            ]
        ];
    }

    public static function getBySlug($slug) {
        $rooms = self::getAll();
        foreach ($rooms as $room) {
            if ($room['slug'] === $slug) {
                return $room;
            }
        }
        return null;
    }

    public static function getFeatured($limit = 3) {
        return array_slice(self::getAll(), 0, $limit);
    }
}
