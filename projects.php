<?php
$page_title = 'Our Projects | Patel Construction - Kanpur & Lucknow Portfolios';
$page_desc = 'Explore our portfolio of completed and ongoing residential homes, commercial complexes, and luxury interior projects in Kanpur (Swaroop Nagar, Civil Lines) and Lucknow (Gomti Nagar, Sushant Golf City).';
$page_keywords = 'Patel Construction projects, residential villas Kanpur, commercial builders Lucknow, building construction Swaroop Nagar, interior projects Gomti Nagar';
$active_page = 'projects';
require_once __DIR__ . '/includes/header.php';
?>

<main class="page-main">
  <!-- Page Banner -->
  <section class="page-banner">
    <div class="container banner-content">
      <div class="eyebrow">PORTFOLIO OF EXCELLENCE</div>
      <h1>Our Landmark <em>Projects</em></h1>
      <p>Explore residential homes, luxury villas, commercial towers, and interior fit-outs crafted across prominent neighborhoods in Kanpur and Lucknow.</p>
    </div>
  </section>

  <!-- Filter & Projects Grid -->
  <section class="section portfolio-section">
    <div class="container">
      
      <!-- Filter Tabs -->
      <div class="portfolio-filters">
        <button class="filter-btn active" data-filter="all">All Projects</button>
        <button class="filter-btn" data-filter="residential">Residential</button>
        <button class="filter-btn" data-filter="commercial">Commercial</button>
        <button class="filter-btn" data-filter="interior">Interiors</button>
        <button class="filter-btn" data-filter="renovation">Renovations</button>
      </div>

      <!-- Project Grid -->
      <div class="portfolio-grid">
        
        <!-- Project 1 -->
        <article class="portfolio-card" data-category="residential">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=900&q=85" alt="Modern luxury villa in Swaroop Nagar Kanpur">
            <span class="portfolio-badge">RESIDENTIAL</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Swaroop Nagar, Kanpur</span>
            <h3>The Grand Courtyard Villa</h3>
            <p>4,500 sq ft independent luxury villa with complete turnkey material contract, double-height ceiling, Italian marble, and automated lighting.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Turnkey Build</span>
              <span><strong>Year:</strong> 2025</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 2 -->
        <article class="portfolio-card" data-category="commercial">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=900&q=85" alt="Corporate office building in Gomti Nagar Lucknow">
            <span class="portfolio-badge">COMMERCIAL</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Gomti Nagar, Lucknow</span>
            <h3>Apex Corporate Tower</h3>
            <p>12,000 sq ft 4-storey commercial office complex featuring structural glass curtain walling, basement parking, and advanced fire safety systems.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Commercial RCC</span>
              <span><strong>Year:</strong> 2024</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 3 -->
        <article class="portfolio-card" data-category="interior">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=900&q=85" alt="Luxury interior fit out Sushant Golf City Lucknow">
            <span class="portfolio-badge">INTERIOR</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Sushant Golf City, Lucknow</span>
            <h3>Serenade Luxury Penthouse</h3>
            <p>Complete turnkey interior fit-out including custom acrylic modular kitchen, walk-in closets, acoustic home theater, and mood lighting.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Full Turnkey Interior</span>
              <span><strong>Year:</strong> 2025</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 4 -->
        <article class="portfolio-card" data-category="residential">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&w=900&q=85" alt="Modern duplex residence in Civil Lines Kanpur">
            <span class="portfolio-badge">RESIDENTIAL</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Civil Lines, Kanpur</span>
            <h3>Aura Duplex Residence</h3>
            <p>3,200 sq ft contemporary residential duplex designed with cantilever balconies, Vastu compliant puja room, and rooftop terrace garden.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Design & Construction</span>
              <span><strong>Year:</strong> 2024</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 5 -->
        <article class="portfolio-card" data-category="commercial">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=85" alt="Modern medical center Kakadeo Kanpur">
            <span class="portfolio-badge">COMMERCIAL</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Kakadeo, Kanpur</span>
            <h3>LifeCare Diagnostic Complex</h3>
            <p>6,500 sq ft medical hub engineered with heavy radiation shielding for MRI/CT equipment, anti-bacterial vinyl flooring, and cleanroom HVAC.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Healthcare Infrastructure</span>
              <span><strong>Year:</strong> 2024</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 6 -->
        <article class="portfolio-card" data-category="renovation">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1600566753086-00f18fb6b3ea?auto=format&fit=crop&w=900&q=85" alt="House renovation and elevation remodeling Hazratganj Lucknow">
            <span class="portfolio-badge">RENOVATION</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Hazratganj, Lucknow</span>
            <h3>Heritage House Elevation Remodel</h3>
            <p>Structural strengthening, replacement of plumbing/electrics, and installation of modern CNC cut front louvers for a 35-year-old family residence.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Complete Retrofitting</span>
              <span><strong>Year:</strong> 2025</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 7 -->
        <article class="portfolio-card" data-category="residential">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=900&q=85" alt="Luxury bungalow Kidwai Nagar Kanpur">
            <span class="portfolio-badge">RESIDENTIAL</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Kidwai Nagar, Kanpur</span>
            <h3>Shanti Nilayam Bungalow</h3>
            <p>5,000 sq ft grand residence built with Tata Tiscon steel, 3-car shaded porch, private elevator shaft, and solar roofing integration.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Turnkey Material Contract</span>
              <span><strong>Year:</strong> 2025</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

        <!-- Project 8 -->
        <article class="portfolio-card" data-category="interior">
          <div class="portfolio-img-wrap">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=900&q=85" alt="Living room interior Indira Nagar Lucknow">
            <span class="portfolio-badge">INTERIOR</span>
          </div>
          <div class="portfolio-body">
            <span class="location-tag">📍 Indira Nagar, Lucknow</span>
            <h3>Signature Living & Lounge</h3>
            <p>Contemporary interior transformation with custom fluted paneling, brass inlay accents, Italian Statuario marble floors, and motorized blinds.</p>
            <div class="portfolio-meta">
              <span><strong>Scope:</strong> Bespoke Interior</span>
              <span><strong>Year:</strong> 2024</span>
            </div>
            <a href="contact" class="btn btn-outline-dark">Enquire About Similar Project →</a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- Live Site Visits CTA -->
  <section class="cta">
    <div class="container cta-inner">
      <div>
        <div class="eyebrow">SEE OUR CRAFTSMANSHIP IN PERSON</div>
        <h2>Want to Visit an Ongoing Project Site?</h2>
        <p>We believe in 100% transparency. We gladly invite prospective home and commercial builders to inspect our active construction sites in Kanpur or Lucknow to witness material quality first-hand.</p>
      </div>
      <a href="contact" class="btn btn-gold">Schedule a Site Tour →</a>
    </div>
  </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
