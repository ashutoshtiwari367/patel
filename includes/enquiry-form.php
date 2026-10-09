<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/captcha.php';
$captcha_q = ($_SESSION['captcha_a'] ?? 5) . ' ' . ($_SESSION['captcha_op'] ?? '+') . ' ' . ($_SESSION['captcha_b'] ?? 3);
?>
<div class="enquiry-card-wrap">
  <div class="form-header">
    <h3>Request a Free Quote & Consultation</h3>
    <p>Share your project requirements in Kanpur or Lucknow. Our site engineer will inspect and provide an estimate.</p>
  </div>

  <div id="formAlert" class="alert-box" style="display:none;"></div>

  <form class="contact-form enquiry-form" id="mainEnquiryForm" action="submit-enquiry" method="POST">
    <input type="hidden" name="csrf_token" id="formCsrfToken" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">

    <div class="form-row">
      <div class="form-group">
        <label for="form_name">Your Name *</label>
        <input required type="text" id="form_name" name="name" placeholder="e.g. Ramesh Patel">
      </div>
      <div class="form-group">
        <label for="form_phone">Phone Number *</label>
        <input required type="tel" id="form_phone" name="phone" placeholder="e.g. 98765 43210" pattern="[0-9+\s\-]{10,15}">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label for="form_email">Email Address *</label>
        <input required type="email" id="form_email" name="email" placeholder="name@example.com">
      </div>
      <div class="form-group">
        <label for="form_city">Project Location *</label>
        <select required id="form_city" name="city">
          <option value="Kanpur" selected>Kanpur (All Areas)</option>
          <option value="Lucknow">Lucknow (All Areas)</option>
          <option value="Unnao">Unnao / Kanpur Dehat</option>
          <option value="Other UP">Other Location in UP</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label for="form_service">Service Required *</label>
      <select required id="form_service" name="service">
        <option value="">Select Service Type</option>
        <option value="Residential Construction">Residential House / Villa Construction</option>
        <option value="Commercial Construction">Commercial Building / Office / Shop</option>
        <option value="Turnkey Material Contract">Complete Turnkey Construction (With Material)</option>
        <option value="Interior Design">Luxury Interior Design & Execution</option>
        <option value="Renovation & Remodeling">House / Office Renovation & Elevation</option>
        <option value="Architectural & 3D Planning">Architectural Layout & 3D Front Elevation</option>
      </select>
    </div>

    <div class="form-group">
      <label for="form_message">Project Details / Plot Size *</label>
      <textarea required rows="4" id="form_message" name="message" placeholder="Describe plot area (e.g. 1500 sq ft), number of floors, budget, or specific interior needs..."></textarea>
    </div>

    <!-- Enhanced Captcha Box -->
    <div class="captcha-box-enhanced">
      <div class="captcha-badge-container">
        <div class="captcha-icon">🔒</div>
        <div class="captcha-text">
          <span class="captcha-subtext">Security Verification</span>
          <span class="captcha-equation">
            Solve: <strong id="captchaQuestionText"><?php echo $captcha_q; ?> = ?</strong>
          </span>
        </div>
        <button type="button" class="btn-refresh-captcha" id="refreshCaptchaBtn" title="Click to get a new security question">
          <span class="refresh-icon">↻</span> Refresh
        </button>
      </div>
      <div class="captcha-input-wrap">
        <input required type="number" id="form_captcha_answer" name="captcha_answer" placeholder="Enter answer here" autocomplete="off">
      </div>
    </div>

    <button class="btn btn-gold btn-submit-full" id="submitBtn" type="submit">
      <span class="btn-text">Submit Enquiry & Get Free Estimate</span>
      <span class="btn-arrow">→</span>
    </button>
    <p class="form-guarantee">🔒 100% Privacy Guaranteed. No spam. You will receive a call within 2 business hours.</p>
  </form>
</div>
