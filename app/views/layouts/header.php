<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Hotel Pasundan - Hotel Bintang 5 dengan kemewahan modern dan sentuhan budaya Sunda. Nikmati pengalaman menginap yang tak terlupakan.">
  <meta name="keywords" content="hotel pasundan, hotel mewah, luxury hotel, hotel bandung, hotel bintang 5">
  <meta name="author" content="Hotel Pasundan">
  
  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="Hotel Pasundan - Luxury Hotel">
  <meta property="og:description" content="Kemewahan Bertemu Budaya Sunda">
  <meta property="og:image" content="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=1200&q=80">
  
  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Hotel Pasundan - Luxury Hotel">
  <meta property="twitter:description" content="Kemewahan Bertemu Budaya Sunda">
  
  <title><?= isset($pageTitle) ? $pageTitle . ' - Hotel Pasundan' : 'Hotel Pasundan - Luxury Hotel' ?></title>
  
  <!-- Preconnect to external domains -->
  <link rel="preconnect" href="https://images.unsplash.com">
  <link rel="preconnect" href="https://i.pravatar.cc">
  
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#d4af37',
            'primary-dark': '#b8941f',
            'primary-light': '#f0d97d',
            secondary: '#1a1a1a'
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          }
        }
      }
    }
  </script>
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body class="loading">
