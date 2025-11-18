<?php
class AboutController extends Controller {
    public function index() {
        $data = [
            'about' => [
                'title' => 'Tentang Hotel Pasundan',
                'subtitle' => 'Kemewahan Bertemu Budaya Sunda',
                'description' => 'Hotel Pasundan adalah hotel bintang 5 yang menggabungkan kemewahan modern dengan keanggunan budaya Sunda. Terletak strategis di jantung kota, kami menawarkan pengalaman menginap yang tak terlupakan dengan fasilitas kelas dunia dan pelayanan yang hangat khas Sunda.',
                'vision' => 'Menjadi hotel terkemuka yang menghadirkan pengalaman menginap berkelas internasional dengan sentuhan budaya lokal yang autentik.',
                'mission' => [
                    'Memberikan pelayanan terbaik dengan standar internasional',
                    'Melestarikan dan mempromosikan budaya Sunda',
                    'Menciptakan pengalaman menginap yang berkesan',
                    'Mengutamakan kepuasan dan kenyamanan tamu'
                ]
            ],
            'values' => [
                [
                    'icon' => '⭐',
                    'title' => 'Excellence',
                    'description' => 'Komitmen pada kualitas dan keunggulan dalam setiap aspek'
                ],
                [
                    'icon' => '🤝',
                    'title' => 'Hospitality',
                    'description' => 'Keramahan dan kehangatan khas budaya Sunda'
                ],
                [
                    'icon' => '🎨',
                    'title' => 'Culture',
                    'description' => 'Mempertahankan dan merayakan warisan budaya lokal'
                ],
                [
                    'icon' => '🌟',
                    'title' => 'Innovation',
                    'description' => 'Terus berinovasi untuk pengalaman tamu yang lebih baik'
                ]
            ],
            'history' => [
                [
                    'year' => '2010',
                    'title' => 'Berdiri',
                    'description' => 'Hotel Pasundan resmi dibuka dengan 100 kamar'
                ],
                [
                    'year' => '2015',
                    'title' => 'Ekspansi',
                    'description' => 'Penambahan 50 kamar dan fasilitas spa mewah'
                ],
                [
                    'year' => '2020',
                    'title' => 'Renovasi',
                    'description' => 'Renovasi total dengan desain modern luxury'
                ],
                [
                    'year' => '2025',
                    'title' => 'Penghargaan',
                    'description' => 'Meraih Best Luxury Hotel Award'
                ]
            ],
            'team' => [
                [
                    'name' => 'Drs. Asep Suryadi',
                    'position' => 'General Manager',
                    'image' => 'https://i.pravatar.cc/300?img=12'
                ],
                [
                    'name' => 'Siti Rahmawati, S.ST.Par',
                    'position' => 'Operations Manager',
                    'image' => 'https://i.pravatar.cc/300?img=45'
                ],
                [
                    'name' => 'Chef Budi Santoso',
                    'position' => 'Executive Chef',
                    'image' => 'https://i.pravatar.cc/300?img=33'
                ]
            ]
        ];
        
        $this->view('about', $data);
    }
}
