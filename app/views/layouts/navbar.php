<nav class="navbar">
  <div class="navbar-container">
    <a href="/" class="navbar-logo">Hotel Pasundan</a>
    
    <div class="navbar-toggle">
      <span></span>
      <span></span>
      <span></span>
    </div>
    
    <ul class="navbar-menu">
      <li><a href="/" class="navbar-link <?= $_SERVER['REQUEST_URI'] == '/' || strpos($_SERVER['REQUEST_URI'], 'home') !== false ? 'active' : '' ?>">Home</a></li>
      <li><a href="/rooms" class="navbar-link <?= strpos($_SERVER['REQUEST_URI'], 'rooms') !== false ? 'active' : '' ?>">Kamar</a></li>
      <li><a href="/gallery" class="navbar-link <?= strpos($_SERVER['REQUEST_URI'], 'gallery') !== false ? 'active' : '' ?>">Galeri</a></li>
      <li><a href="/about" class="navbar-link <?= strpos($_SERVER['REQUEST_URI'], 'about') !== false ? 'active' : '' ?>">Tentang</a></li>
      <li><a href="/contact" class="navbar-link <?= strpos($_SERVER['REQUEST_URI'], 'contact') !== false ? 'active' : '' ?>">Kontak</a></li>
    </ul>
  </div>
</nav>
