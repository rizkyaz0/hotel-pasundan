<?php
class ContactController extends Controller {
    public function index() {
        $data = [
            'contact' => [
                'address' => 'Jl. Asia Afrika No. 123, Bandung, Jawa Barat 40261',
                'phone' => '+62 22 1234 5678',
                'whatsapp' => '+62 812 3456 7890',
                'email' => 'info@hotelpasundan.com',
                'instagram' => '@hotelpasundan',
                'facebook' => 'Hotel Pasundan Official',
                'hours' => '24 Jam (Reception)',
                'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798464181358!2d107.61870431477!3d-6.914744995006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sJl.%20Asia%20Afrika%2C%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sen!2sid!4v1234567890'
            ],
            'socials' => [
                ['icon' => '📱', 'name' => 'WhatsApp', 'value' => '+62 812 3456 7890', 'link' => 'https://wa.me/6281234567890'],
                ['icon' => '📧', 'name' => 'Email', 'value' => 'info@hotelpasundan.com', 'link' => 'mailto:info@hotelpasundan.com'],
                ['icon' => '📷', 'name' => 'Instagram', 'value' => '@hotelpasundan', 'link' => 'https://instagram.com/hotelpasundan'],
                ['icon' => '👍', 'name' => 'Facebook', 'value' => 'Hotel Pasundan', 'link' => 'https://facebook.com/hotelpasundan']
            ]
        ];
        
        $this->view('contact', $data);
    }

    public function submit() {
        // Handle form submission (for future implementation)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validate and process form data
            $name = htmlspecialchars($_POST['name'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');
            
            // For now, just redirect back with success message
            header('Location: /contact?success=1');
            exit;
        }
    }
}
