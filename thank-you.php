<?php
$page_title = 'Thank You | Patel Construction';
$page_desc = 'Thank you for contacting Patel Construction. Our expert team will review your inquiry and get in touch with you promptly.';
$active_page = 'thank-you';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-main" style="padding: 140px 0 90px; background: #07141c; color: #fff; min-height: 80vh; display: flex; align-items: center;">
  <div class="container" style="text-align: center; max-width: 720px;">
    <div class="brand-mark" style="margin: 0 auto 25px; width: 64px; height: 64px; font-size: 24px; border-width: 2px;">✓</div>
    <div class="eyebrow" style="color: var(--gold); justify-content: center;">ENQUIRY RECEIVED SUCCESSFULLY</div>
    <h1 style="font-family: 'Playfair Display', serif; font-size: clamp(38px, 5vw, 56px); margin: 15px 0 20px; line-height: 1.1;">Thank You For Choosing<br><em>Patel Construction</em></h1>
    <p style="color: #b9c4c8; font-size: 17px; line-height: 1.7; margin-bottom: 35px;">
      We have received your project details. Our civil engineers and project consultants in Kanpur & Lucknow are reviewing your requirements and will contact you within 2 business hours with a preliminary estimate.
    </p>

    <div style="background: rgba(255,255,255,0.05); border: 1px solid rgba(231,185,79,0.3); border-radius: 8px; padding: 25px; margin-bottom: 35px;">
      <h3 style="font-family: 'Playfair Display', serif; color: var(--gold); margin-bottom: 10px; font-size: 20px;">Need Immediate Assistance or Site Visit?</h3>
      <p style="color: #d8dde0; font-size: 14px; margin-bottom: 18px;">Directly speak to our Lead Project Consultant:</p>
      <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
        <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="btn btn-gold">
          <span>📞 Call <?php echo SITE_PHONE; ?></span>
        </a>
        <a href="https://wa.me/917985230018?text=Hello%20Patel%20Construction,%20I%20just%20submitted%20an%20enquiry%20online." target="_blank" rel="noopener" class="btn btn-outline">
          <span>💬 Chat on WhatsApp</span>
        </a>
      </div>
    </div>

    <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
      <a class="btn btn-outline" href="index">Return to Home</a>
      <a class="btn btn-outline" href="projects">Explore Projects</a>
      <a class="btn btn-outline" href="gallery">View Gallery</a>
    </div>
  </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
