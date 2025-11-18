<?php include 'layouts/header.php'; ?>
<?php include 'layouts/navbar.php'; ?>

<!-- Hero Section -->
<section class="hero">
  <img 
    src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1920&q=80" 
    alt="Hotel Pasundan" 
    class="hero-bg"
    data-parallax="0.5"
  >
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="hero-title">Selamat Datang di Hotel Pasundan</h1>
    <p class="hero-subtitle">Kemewahan Bertemu Budaya Sunda - Pengalaman Menginap yang Tak Terlupakan</p>
    <div class="hero-cta">
      <a href="/rooms" class="btn btn-primary">Jelajahi Kamar</a>
      <a href="/contact" class="btn btn-secondary">Hubungi Kami</a>
    </div>
  </div>
</section>

<!-- Stats Section -->
<section class="stats">
  <div class="container">
    <div class="stats-grid">
      <?php foreach ($data['stats'] as $index => $stat): ?>
        <div class="stat-item stagger-<?= $index + 1 ?>">
          <span class="stat-number"><?= $stat['number'] ?></span>
          <span class="stat-label"><?= $stat['label'] ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Rooms Section -->
<section class="section" style="background: #f8f8f8;">
  <div class="container">
    <div style="text-align: center; margin-bottom: 4rem;">
      <h2 class="section-title">Kamar Kami</h2>
      <p class="section-subtitle">Pilih kamar yang sesuai dengan kebutuhan Anda</p>
    </div>
    
    <div class="grid grid-3">
      <?php foreach ($data['rooms'] as $index => $room): ?>
        <div class="card animate-fade-in-up stagger-<?= $index + 1 ?>">
          <div class="card-image">
            <img 
              data-src="<?= $room['image'] ?>" 
              alt="<?= $room['name'] ?>"
              class="lazy-load"
              src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 500'%3E%3Crect fill='%23f0f0f0' width='800' height='500'/%3E%3C/svg%3E"
            >
            <div class="card-badge">Premium</div>
          </div>
          <div class="card-content">
            <h3 class="card-title"><?= $room['name'] ?></h3>
            <div class="card-meta">
              <span class="card-meta-item">📐 <?= $room['size'] ?></span>
              <span class="card-meta-item">👥 <?= $room['capacity'] ?></span>
            </div>
            <p class="card-description"><?= $room['description'] ?></p>
            <div class="card-footer">
              <span style="font-weight: 600; color: var(--color-primary);"><?= $room['bed'] ?></span>
              <a href="/rooms" class="btn btn-primary" style="padding: 0.5rem 1.5rem; font-size: 0.875rem;">Lihat Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <div style="text-align: center; margin-top: 3rem;">
      <a href="/rooms" class="btn btn-primary">Lihat Semua Kamar</a>
    </div>
  </div>
</section>

<!-- Facilities Section -->
<section class="section">
  <div class="container">
    <div style="text-align: center; margin-bottom: 4rem;">
      <h2 class="section-title">Fasilitas Premium</h2>
      <p class="section-subtitle">Nikmati berbagai fasilitas kelas dunia untuk kenyamanan Anda</p>
    </div>
    
    <div class="grid grid-3">
      <?php foreach ($data['facilities'] as $index => $facility): ?>
        <div class="facility-card animate-scale-in stagger-<?= $index + 1 ?>">
          <span class="facility-icon"><?= $facility['icon'] ?></span>
          <h3 class="facility-name"><?= $facility['name'] ?></h3>
          <p class="facility-description"><?= $facility['description'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Gallery Preview Section -->
<section class="section" style="background: #f8f8f8;">
  <div class="container">
    <div style="text-align: center; margin-bottom: 4rem;">
      <h2 class="section-title">Galeri Hotel</h2>
      <p class="section-subtitle">Lihat keindahan dan kemewahan Hotel Pasundan</p>
    </div>
    
    <div class="gallery-grid">
      <?php foreach (array_slice($data['gallery'], 0, 8) as $index => $item): ?>
        <div class="gallery-item animate-fade-in stagger-<?= ($index % 4) + 1 ?>" data-category="<?= $item['category'] ?>">
          <img 
            data-src="<?= $item['thumbnail'] ?>" 
            alt="<?= $item['title'] ?>"
            class="lazy-load"
            src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 400'%3E%3Crect fill='%23f0f0f0' width='400' height='400'/%3E%3C/svg%3E"
          >
          <div class="gallery-overlay">
            <span class="gallery-title"><?= $item['title'] ?></span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <div style="text-align: center; margin-top: 3rem;">
      <a href="/gallery" class="btn btn-primary">Lihat Semua Galeri</a>
    </div>
  </div>
</section>

<!-- Testimonials Section -->
<section class="section">
  <div class="container">
    <div style="text-align: center; margin-bottom: 4rem;">
      <h2 class="section-title">Testimoni Tamu</h2>
      <p class="section-subtitle">Apa kata tamu kami tentang pengalaman menginap di Hotel Pasundan</p>
    </div>
    
    <div class="testimonial-slider">
      <div class="testimonial-track">
        <?php foreach ($data['testimonials'] as $testimonial): ?>
          <div class="testimonial-card">
            <img 
              src="<?= $testimonial['image'] ?>" 
              alt="<?= $testimonial['name'] ?>" 
              class="testimonial-avatar"
            >
            <div class="testimonial-rating">
              <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>★<?php endfor; ?>
            </div>
            <p class="testimonial-text">"<?= $testimonial['comment'] ?>"</p>
            <div class="testimonial-author"><?= $testimonial['name'] ?></div>
            <div class="testimonial-role"><?= $testimonial['role'] ?></div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="testimonial-controls"></div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%); color: white; text-align: center;">
  <div class="container">
    <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">Siap Merasakan Pengalaman Luxury?</h2>
    <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.9;">Hubungi kami sekarang untuk informasi lebih lanjut dan penawaran spesial</p>
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="/contact" class="btn btn-primary">Hubungi Kami</a>
      <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-secondary">WhatsApp</a>
    </div>
  </div>
</section>

<?php include 'layouts/footer.php'; ?>
