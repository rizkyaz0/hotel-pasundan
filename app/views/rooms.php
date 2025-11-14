<?php include 'layouts/header.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-3xl font-bold text-yellow-700 mb-12">Our Rooms</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <?php
      $rooms = [
        ['Deluxe Suite', 'room1.jpg', 'Luxurious room with ocean view.'],
        ['Executive Room', 'room2.jpg', 'Elegant room with skyline view.'],
        ['Presidential Suite', 'room3.jpg', 'Exclusive suite with private lounge.']
      ];
      foreach ($rooms as $r): ?>
      <div class="bg-white shadow-lg rounded-xl overflow-hidden">
        <img src="assets/images/<?= $r[1] ?>" class="w-full h-56 object-cover">
        <div class="p-6">
          <h3 class="text-xl font-semibold mb-2"><?= $r[0] ?></h3>
          <p class="text-gray-600"><?= $r[2] ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php include 'layouts/footer.php'; ?>
