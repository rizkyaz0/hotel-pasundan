<?php include 'layouts/header.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Hero -->
<section class="relative h-[90vh] flex items-center justify-center bg-cover bg-center" style="background-image: url('assets/images/hero-hotel.jpg');">
  <div class="absolute inset-0 bg-black/50"></div>
  <div class="relative text-center text-white px-6">
    <h1 class="text-5xl font-bold mb-4">Welcome to Grand Luxora</h1>
    <p class="text-lg mb-6">Luxury redefined. Experience comfort and elegance like never before.</p>
    <a href="rooms" class="bg-yellow-600 px-6 py-3 rounded-full text-white hover:bg-yellow-500 transition">Explore Rooms</a>
  </div>
</section>

<!-- Rooms Section -->
<section class="py-20 bg-gray-50 text-center">
  <h2 class="text-3xl font-bold text-yellow-700 mb-12">Our Rooms</h2>
  <div class="grid md:grid-cols-3 gap-8 container mx-auto px-6">
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
      <img src="assets/images/room1.jpg" class="w-full h-56 object-cover" />
      <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">Deluxe Suite</h3>
        <p class="text-gray-600 mb-4">Luxurious room with ocean view and king-size bed.</p>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
      <img src="assets/images/room2.jpg" class="w-full h-56 object-cover" />
      <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">Executive Room</h3>
        <p class="text-gray-600 mb-4">Elegant and spacious with city skyline views.</p>
      </div>
    </div>
    <div class="bg-white shadow-lg rounded-xl overflow-hidden">
      <img src="assets/images/room3.jpg" class="w-full h-56 object-cover" />
      <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">Presidential Suite</h3>
        <p class="text-gray-600 mb-4">Ultimate luxury with private lounge & VIP service.</p>
      </div>
    </div>
  </div>
</section>

<!-- Gallery Section -->
<section class="py-20 bg-white text-center">
  <h2 class="text-3xl font-bold text-yellow-700 mb-12">Gallery</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4 container mx-auto px-6">
    <img src="assets/images/gallery1.jpg" class="rounded-lg shadow" />
    <img src="assets/images/gallery2.jpg" class="rounded-lg shadow" />
    <img src="assets/images/gallery3.jpg" class="rounded-lg shadow" />
    <img src="assets/images/gallery4.jpg" class="rounded-lg shadow" />
  </div>
</section>

<?php include 'layouts/footer.php'; ?>
