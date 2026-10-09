<?php
$page_title = 'Contact Us | Patel Construction - Kanpur & Lucknow Offices';
$page_desc = 'Contact Patel Construction for residential and commercial construction, turnkey material contracts, and interior inquiries in Kanpur and Lucknow. Free site inspection.';
$page_keywords = 'contact Patel Construction, Kanpur builder office, Lucknow construction company contact, civil contractors phone number';
$active_page = 'contact';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-main">
  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container banner-content">
      <div class="eyebrow">GET IN TOUCH</div>
      <h1>Contact <em>Patel Construction</em></h1>
      <p>Whether you need a free plot inspection, turnkey material pricing, or interior consultation in Kanpur or Lucknow, our civil engineers are at your service.</p>
    </div>
  </section>

  <!-- Contact Grid & Details -->
  <section class="section contact-section">
    <div class="container">
      
      <!-- Contact Cards -->
      <div class="contact-cards-grid">
        <div class="contact-box-card">
          <div class="card-icon">📍</div>
          <h3>Kanpur Head Office</h3>
          <p><?php echo SITE_ADDRESS_KANPUR; ?></p>
          <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="card-link">☎ <?php echo SITE_PHONE; ?></a>
          <span class="sub-badge">Head Office & Material Warehouse</span>
        </div>

        <div class="contact-box-card">
          <div class="card-icon">📍</div>
          <h3>Lucknow Branch</h3>
          <p><?php echo SITE_ADDRESS_LUCKNOW; ?></p>
          <a href="tel:<?php echo SITE_PHONE_RAW; ?>" class="card-link">☎ <?php echo SITE_PHONE; ?></a>
          <span class="sub-badge">Regional Office & Design Studio</span>
        </div>

        <div class="contact-box-card">
          <div class="card-icon">💬</div>
          <h3>Direct WhatsApp</h3>
          <p>Instant chat with our project coordinator for quick questions and project photos.</p>
          <a href="https://wa.me/917985230018?text=Hello%20Patel%20Construction,%20I%20want%20to%20discuss%20a%20construction%20project." target="_blank" rel="noopener" class="card-link">Chat on WhatsApp →</a>
          <span class="sub-badge">Typical reply: 15 mins</span>
        </div>

        <div class="contact-box-card">
          <div class="card-icon">⏰</div>
          <h3>Business Hours</h3>
          <p>Monday - Saturday: <strong>9:00 AM - 8:00 PM</strong><br>Sunday: By Prior Appointment for Plot Visits</p>
          <a href="mailto:<?php echo SITE_EMAIL; ?>" class="card-link">✉ <?php echo SITE_EMAIL; ?></a>
          <span class="sub-badge">All Days Support</span>
        </div>
      </div>

      <!-- Main Form + Details Grid -->
      <div class="contact-grid" style="margin-top: 60px;">
        <div>
          <div class="eyebrow dark">SEND US A MESSAGE</div>
          <h2>Book a Free On-Site Inspection & Consultation</h2>
          <p style="color: var(--muted); margin-bottom: 25px;">
            Fill out the form with your plot dimensions and requirements. Our lead engineer in Kanpur or Lucknow will reach out to schedule an on-site evaluation at zero cost.
          </p>

          <!-- Why Choose Us Mini List -->
          <div class="check-list" style="margin-bottom: 35px;">
            <div>✓ <span>Zero obligation initial cost estimate and floor plan consultation</span></div>
            <div>✓ <span>Site inspection for soil quality, groundwater level, and road elevation</span></div>
            <div>✓ <span>Transparent package breakdown with Grade-A material specifications</span></div>
            <div>✓ <span>Complete assistance with KDA / LDA municipal approvals</span></div>
          </div>

          <!-- Embed Google Map -->
          <div class="map-container">
            <iframe 
              title="Patel Construction Kanpur Office Location"
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114343.89667793448!2d80.26002958229871!3d26.447412773950456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c4770b127c46f%3A0x1778302a9fbe7b41!2sKanpur%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin" 
              width="100%" 
              height="280" 
              style="border:0; border-radius: 6px;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>

        <div>
          <?php require __DIR__ . '/includes/enquiry-form.php'; ?>
        </div>
      </div>

    </div>
  </section>

  <!-- Local SEO FAQ Section for Kanpur & Lucknow -->
  <section class="section faq-section" style="background: #fbfaf6; border-top: 1px solid #edebe4;">
    <div class="container">
      <div class="section-head text-center">
        <div class="eyebrow dark">FREQUENTLY ASKED QUESTIONS</div>
        <h2>Construction Queries in <em>Kanpur & Lucknow</em></h2>
        <p style="margin: auto;">Clear answers regarding construction rates, materials, and contracts.</p>
      </div>

      <div class="faq-accordion-grid">
        <div class="faq-item">
          <h4>What is the cost of house construction per sq ft in Kanpur and Lucknow?</h4>
          <p>Standard residential construction in Kanpur and Lucknow generally ranges from ₹1,450 to ₹1,850 per sq ft for basic-to-standard grade, and ₹1,950 to ₹2,500+ per sq ft for premium luxury turnkey construction with branded materials (Tata Tiscon, UltraTech, premium vitrified tiles, Havells wiring, and sanitary fittings).</p>
        </div>

        <div class="faq-item">
          <h4>Does Patel Construction provide construction with material?</h4>
          <p>Yes! We specialize in comprehensive turnkey material contracts. We procure 100% certified materials, manage skilled labor, provide structural architectural drawings, and deliver ready-to-move-in homes with price protection guarantees.</p>
        </div>

        <div class="faq-item">
          <h4>Which localities do you serve in Kanpur and Lucknow?</h4>
          <p>In Kanpur, we cover Swaroop Nagar, Civil Lines, Kakadeo, Naubasta, Kidwai Nagar, Kalyanpur, Shyam Nagar, Barra, and Govind Nagar. In Lucknow, we cover Gomti Nagar, Hazratganj, Indira Nagar, Sushant Golf City, Alambagh, Mahanagar, Ashiyana, and Shaheed Path.</p>
        </div>

        <div class="faq-item">
          <h4>Do you assist with KDA and LDA building map approvals?</h4>
          <p>Yes. Our in-house architectural team prepares sanctioned architectural blueprints and structural calculations compliant with Kanpur Development Authority (KDA) and Lucknow Development Authority (LDA) regulations.</p>
        </div>
      </div>
    </div>
  </section>
</main>

<!-- FAQ Schema Markup for Rich Snippets -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What is the cost of house construction per sq ft in Kanpur and Lucknow?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Standard residential construction in Kanpur and Lucknow ranges from ₹1,450 to ₹1,850 per sq ft, and ₹1,950 to ₹2,500+ per sq ft for premium luxury turnkey construction with branded materials."
      }
    },
    {
      "@type": "Question",
      "name": "Does Patel Construction provide construction with material?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Yes! We specialize in comprehensive turnkey material contracts including branded cement, steel, bricks, plumbing, electrical, and tiles under a single contract."
      }
    },
    {
      "@type": "Question",
      "name": "Which localities do you serve in Kanpur and Lucknow?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "In Kanpur: Swaroop Nagar, Civil Lines, Kakadeo, Naubasta, Kidwai Nagar, Kalyanpur, Shyam Nagar. In Lucknow: Gomti Nagar, Hazratganj, Indira Nagar, Sushant Golf City, Alambagh, and Shaheed Path."
      }
    }
  ]
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
