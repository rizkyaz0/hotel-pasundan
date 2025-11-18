<?php 
$pageTitle = 'Kamar Kami';
include 'layouts/header.php'; 
?>
<?php include 'layouts/navbar.php'; ?>

<!-- Page Header -->
<section class="hero" style="height: 50vh; min-height: 400px;">
  <img 
    src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=1920&q=80" 
    alt="Rooms" 
    class="hero-bg"
  >
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <h1 class="hero-title" style="font-size: 3rem;">Kamar Kami</h1>
    <p class="hero-subtitle">Pilih kamar yang sempurna untuk pengalaman menginap Anda</p>
  </div>
</section>

<!-- Rooms Section -->
<section class="section">
  <div class="container">
    <div class="grid grid-2" style="gap: 3rem;">
      <?php foreach ($data['rooms'] as $index => $room): ?>
        <div class="card animate-fade-in-up stagger-<?= ($index % 2) + 1 ?>" style="flex-direction: row; max-width: 100%;">
          <div class="card-image" style="flex: 0 0 45%; aspect-ratio: 4/3;">
            <img 
              data-src="<?= $room['image'] ?>" 
              alt="<?= $room['name'] ?>"
              class="lazy-load"
              src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 600'%3E%3Crect fill='%23f0f0f0' width='800' height='600'/%3E%3C/svg%3E"
            >
            <div class="card-badge">Premium</div>
          </div>
          <div class="card-content" style="flex: 1;">
            <h3 class="card-title"><?= $room['name'] ?></h3>
            <p class="card-description"><?= $room['description'] ?></p>
            
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; margin: 1.5rem 0;">
              <div style="display: flex; align-items: center; gap: 0.5rem;">
                <span style="font-size: 1.5rem;">📐</span>
                <div>
                  <div style="font-size: 0.75rem; color: var(--color-text-light);">Ukuran</div>
                  <div style="font-weight: 600;"><?= $room['size'] ?></div>
                </div>
              </div>
              <div style="display: flex; align-items: center; gap: 0.5rem;">
                <span style="font-size: 1.5rem;">👥</span>
                <div>
                  <div style="font-size: 0.75rem; color: var(--color-text-light);">Kapasitas</div>
                  <div style="font-weight: 600;"><?= $room['capacity'] ?></div>
                </div>
              </div>
              <div style="display: flex; align-items: center; gap: 0.5rem;">
                <span style="font-size: 1.5rem;">🛏️</span>
                <div>
                  <div style="font-size: 0.75rem; color: var(--color-text-light);">Tempat Tidur</div>
                  <div style="font-weight: 600;"><?= $room['bed'] ?></div>
                </div>
              </div>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
              <h4 style="font-weight: 600; margin-bottom: 0.75rem; color: var(--color-secondary);">Fasilitas:</h4>
              <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                <?php foreach ($room['facilities'] as $facility): ?>
                  <span style="background: var(--color-bg-light); padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.875rem; color: var(--color-text);">
                    ✓ <?= $facility ?>
                  </span>
                <?php endforeach; ?>
              </div>
            </div>
            
            <div class="card-footer" style="border-top: none; padding-top: 0;">
              <a href="/contact" class="btn btn-primary" style="padding: 0.75rem 2rem;">Hubungi Kami</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Features Section -->
<section class="section" style="background: var(--color-bg-light);">
  <div class="container">
    <div style="text-align: center; margin-bottom: 3rem;">
      <h2 class="section-title">Semua Kamar Dilengkapi</h2>
      <p class="section-subtitle">Fasilitas standar di setiap kamar untuk kenyamanan maksimal</p>
    </div>
    
    <div class="grid grid-4">
      <?php 
      $standardFeatures = [
        ['icon' => '📶', 'name' => 'WiFi Super Cepat', 'desc' => 'Internet berkecepatan tinggi'],
        ['icon' => '❄️', 'name' => 'AC Premium', 'desc' => 'Pendingin ruangan terbaik'],
        ['icon' => '📺', 'name' => 'Smart TV', 'desc' => 'TV LED dengan Netflix'],
        ['icon' => '☕', 'name' => 'Coffee & Tea', 'desc' => 'Kopi dan teh gratis'],
        ['icon' => '🛁', 'name' => 'Kamar Mandi Mewah', 'desc' => 'Dengan amenities premium'],
        ['icon' => '🔒', 'name' => 'Safe Box', 'desc' => 'Brankas elektronik'],
        ['icon' => '🧺', 'name' => 'Laundry Service', 'desc' => 'Layanan cuci setrika'],
        ['icon' => '🍽️', 'name' => 'Room Service', 'desc' => 'Tersedia 24 jam']
      ];
      foreach ($standardFeatures as $index => $feature): ?>
        <div class="facility-card animate-scale-in stagger-<?= ($index % 4) + 1 ?>">
          <span class="facility-icon"><?= $feature['icon'] ?></span>
          <h3 class="facility-name" style="font-size: 1rem;"><?= $feature['name'] ?></h3>
          <p class="facility-description" style="font-size: 0.875rem;"><?= $feature['desc'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 100%); color: white; text-align: center;">
  <div class="container">
    <h2 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 1rem;">Tertarik dengan Kamar Kami?</h2>
    <p style="font-size: 1.25rem; margin-bottom: 2rem; opacity: 0.95;">Hubungi kami untuk informasi lebih lanjut dan penawaran terbaik</p>
    <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
      <a href="/contact" class="btn" style="background: white; color: var(--color-primary); padding: 1rem 2.5rem;">Hubungi Kami</a>
      <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-secondary">WhatsApp Sekarang</a>
    </div>
  </div>
</section>

<?php include 'layouts/footer.php'; ?>
