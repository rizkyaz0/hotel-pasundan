<?php include 'layouts/header.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<section class="py-20 container mx-auto px-6 text-center">
  <h2 class="text-3xl font-bold text-yellow-700 mb-12">Hotel Gallery</h2>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
    <?php for ($i = 1; $i <= 8; $i++): ?>
      <img src="assets/images/gallery<?= $i ?>.jpg" class="rounded-lg shadow-lg">
    <?php endfor; ?>
  </div>
</section>

<?php include 'layouts/footer.php'; ?>
