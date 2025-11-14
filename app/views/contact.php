<?php include 'layouts/header.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<section class="py-20 container mx-auto px-6 text-center">
  <h2 class="text-3xl font-bold text-yellow-700 mb-6">Contact Us</h2>
  <p class="text-gray-600 mb-8">We’d love to hear from you! Get in touch for bookings and inquiries.</p>

  <form class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-8 space-y-4">
    <input type="text" placeholder="Your Name" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
    <input type="email" placeholder="Email" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
    <textarea rows="4" placeholder="Message" class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-yellow-500" required></textarea>
    <button class="bg-yellow-600 text-white px-6 py-3 rounded-lg hover:bg-yellow-500 transition">Send Message</button>
  </form>
</section>

<?php include 'layouts/footer.php'; ?>
