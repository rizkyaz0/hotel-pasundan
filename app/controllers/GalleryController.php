<?php
require_once '../app/models/Gallery.php';

class GalleryController extends Controller {
    public function index() {
        $category = isset($_GET['category']) ? $_GET['category'] : 'all';
        
        $data = [
            'gallery' => $category === 'all' ? Gallery::getAll() : Gallery::getByCategory($category),
            'categories' => Gallery::getCategories(),
            'activeCategory' => $category
        ];
        
        $this->view('gallery', $data);
    }
}
