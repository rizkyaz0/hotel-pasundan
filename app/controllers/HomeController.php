<?php
require_once '../app/models/Room.php';
require_once '../app/models/Gallery.php';

class HomeController extends Controller {
    public function index() {
        $data = [
            'rooms' => Room::getFeatured(3),
            'gallery' => array_slice(Gallery::getAll(), 0, 8),
            'stats' => [
                ['number' => '150+', 'label' => 'Kamar Mewah'],
                ['number' => '10K+', 'label' => 'Tamu Puas'],
                ['number' => '15+', 'label' => 'Tahun Pengalaman'],
                ['number' => '50+', 'label' => 'Penghargaan']
            ],
            'testimonials' => [
                [
                    'name' => 'Budi Santoso',
                    'role' => 'CEO PT. Maju Jaya',
                    'image' => 'https://i.pravatar.cc/150?img=12',
                    'rating' => 5,
                    'comment' => 'Pengalaman menginap yang luar biasa! Pelayanan sangat profesional dan kamar yang sangat nyaman. Hotel Pasundan adalah pilihan terbaik untuk bisnis dan liburan.'
                ],
                [
                    'name' => 'Siti Nurhaliza',
                    'role' => 'Travel Blogger',
                    'image' => 'https://i.pravatar.cc/150?img=45',
                    'rating' => 5,
                    'comment' => 'Desain interior yang memukau dengan sentuhan budaya Sunda yang elegan. Fasilitas lengkap dan makanan di restaurant sangat lezat. Highly recommended!'
                ],
                [
                    'name' => 'Ahmad Wijaya',
                    'role' => 'Pengusaha',
                    'image' => 'https://i.pravatar.cc/150?img=33',
                    'rating' => 5,
                    'comment' => 'Hotel bintang 5 dengan harga yang reasonable. Staff sangat ramah dan helpful. Kolam renang dan spa-nya top! Pasti akan kembali lagi.'
                ]
            ],
            'facilities' => [
                [
                    'icon' => '🍽️',
                    'name' => 'Restaurant & Bar',
                    'description' => 'Nikmati kuliner Nusantara dan Internasional'
                ],
                [
                    'icon' => '🏊',
                    'name' => 'Infinity Pool',
                    'description' => 'Kolam renang dengan pemandangan kota'
                ],
                [
                    'icon' => '💆',
                    'name' => 'Spa & Wellness',
                    'description' => 'Relaksasi dengan treatment premium'
                ],
                [
                    'icon' => '💪',
                    'name' => 'Fitness Center',
                    'description' => 'Gym modern dengan peralatan lengkap'
                ],
                [
                    'icon' => '🎯',
                    'name' => 'Meeting Rooms',
                    'description' => 'Ruang meeting dengan teknologi canggih'
                ],
                [
                    'icon' => '🎊',
                    'name' => 'Grand Ballroom',
                    'description' => 'Ballroom mewah untuk acara spesial'
                ]
            ]
        ];
        
        $this->view('home', $data);
    }
}
