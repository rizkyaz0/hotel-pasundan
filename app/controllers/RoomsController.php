<?php
require_once '../app/models/Room.php';

class RoomsController extends Controller {
    public function index() {
        $data = [
            'rooms' => Room::getAll()
        ];
        $this->view('rooms', $data);
    }

    public function detail($slug) {
        $room = Room::getBySlug($slug);
        if (!$room) {
            header('Location: /rooms');
            exit;
        }
        $data = [
            'room' => $room,
            'otherRooms' => array_filter(Room::getAll(), function($r) use ($slug) {
                return $r['slug'] !== $slug;
            })
        ];
        $this->view('room-detail', $data);
    }
}
