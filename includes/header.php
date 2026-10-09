<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/captcha.php';

// Default metadata if not set by individual page
$page_title = $page_title ?? 'Patel Construction | Best Construction & Interior Company in Kanpur & Lucknow';
$page_desc = $page_desc ?? 'Patel Construction is the leading construction, interior design, and turnkey building contractor in Kanpur and Lucknow. Quality residential & commercial construction with material.';
$page_keywords = $page_keywords ?? 'construction company Kanpur, building contractors Lucknow, interior designers Kanpur, house construction with material Kanpur, commercial construction Lucknow, home renovation Kanpur, Patel Construction';
$active_page = $active_page ?? 'home';
$canonical_url = $canonical_url ?? 'http://localhost/Patel/' . ($active_page === 'home' ? '' : $active_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_desc); ?>">
  <meta name="keywords" content="<?php echo htmlspecialchars($page_keywords); ?>">
  <meta name="author" content="Patel Construction">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

  <!-- Geo Local SEO Tags for Kanpur & Lucknow Ranking -->
  <meta name="geo.region" content="IN-UP">
  <meta name="geo.placename" content="Kanpur, Lucknow, Uttar Pradesh, India">
  <meta name="geo.position" content="26.4499;80.3319">
  <meta name="ICBM" content="26.4499, 80.3319">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
  <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($page_desc); ?>">
  <meta property="og:image" content="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80">
  <meta property="og:site_name" content="Patel Construction">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title); ?>">
  <meta name="twitter:description" content="<?php echo htmlspecialchars($page_desc); ?>">
  <meta name="twitter:image" content="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80">

  <!-- Fonts & Stylesheet -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">

  <!-- JSON-LD LocalBusiness Schema Markup for Kanpur & Lucknow -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "GeneralContractor",
    "name": "Patel Construction",
    "image": "https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80",
    "url": "http://localhost/Patel/",
    "telephone": "<?php echo SITE_PHONE_RAW; ?>",
    "email": "<?php echo SITE_EMAIL; ?>",
    "priceRange": "₹₹ - ₹₹₹",
    "description": "Leading building contractor and interior design firm providing residential and commercial construction with material in Kanpur and Lucknow.",
    "address": [
      {
        "@type": "PostalAddress",
        "streetAddress": "128/95 Y Block, Ground Floor, Near Naubasta Chauraha, Anand Nagar",
        "addressLocality": "Kanpur",
        "addressRegion": "Uttar Pradesh",
        "postalCode": "208011",
        "addressCountry": "IN"
      },
      {
        "@type": "PostalAddress",
        "streetAddress": "Shop 14, Commercial Hub, Sector 7, Gomti Nagar Extension",
        "addressLocality": "Lucknow",
        "addressRegion": "Uttar Pradesh",
        "postalCode": "226010",
        "addressCountry": "IN"
      }
    ],
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 26.4499,
      "longitude": 80.3319
    },
    "openingHoursSpecification": {
      "@type": "OpeningHoursSpecification",
      "dayOfWeek": [
        "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
      ],
      "opens": "09:00",
      "closes": "20:00"
    },
    "areaServed": [
      { "@type": "City", "name": "Kanpur" },
      { "@type": "City", "name": "Lucknow" },
      { "@type": "City", "name": "Unnao" },
      { "@type": "AdministrativeArea", "name": "Uttar Pradesh" }
    ],
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Construction & Interior Services",
      "itemListElement": [
        { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Residential Construction with Material" } },
        { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Commercial Building Construction" } },
        { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Luxury Interior Design & Execution" } },
        { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Home Renovation & Remodeling" } },
        { "@type": "Offer", "itemOffered": { "@type": "Service", "name": "Architectural 3D Elevation & Map Planning" } }
      ]
    }
  }
  </script>
</head>
<body>

<!-- Header Navigation -->
<header class="header" id="header">
  <div class="container nav">
    <a href="index" class="brand" title="Patel Construction - Kanpur & Lucknow">
      <span class="brand-mark">PC</span>
      <span>
        <strong>PATEL</strong>
        <small>CONSTRUCTION</small>
      </span>
    </a>

    <button class="menu-toggle" aria-label="Toggle Navigation Menu"><span></span><span></span><span></span></button>

    <nav class="nav-links">
      <a href="index" class="<?php echo $active_page === 'home' ? 'active' : ''; ?>">Home</a>
      <a href="about" class="<?php echo $active_page === 'about' ? 'active' : ''; ?>">About Us</a>
      <a href="services" class="<?php echo $active_page === 'services' ? 'active' : ''; ?>">Services</a>
      <a href="projects" class="<?php echo $active_page === 'projects' ? 'active' : ''; ?>">Projects</a>
      <a href="gallery" class="<?php echo $active_page === 'gallery' ? 'active' : ''; ?>">Gallery</a>
      <a href="contact" class="<?php echo $active_page === 'contact' ? 'active' : ''; ?>">Contact</a>
    </nav>

    <div class="nav-right">
      <a class="phone" href="tel:<?php echo SITE_PHONE_RAW; ?>" title="Call Patel Construction">☎ <?php echo SITE_PHONE; ?></a>
      <a href="contact" class="btn btn-gold">Get a Quote <span>→</span></a>
    </div>
  </div>
</header>
