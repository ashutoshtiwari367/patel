document.addEventListener("DOMContentLoaded", () => {
  // 1. Header scroll effect
  const header = document.getElementById("header");
  window.addEventListener("scroll", () => {
    header?.classList.toggle("scrolled", window.scrollY > 20);
  });

  // 2. Mobile menu toggle
  const menuToggle = document.querySelector(".menu-toggle");
  const navLinks = document.querySelector(".nav-links");
  menuToggle?.addEventListener("click", () => {
    navLinks?.classList.toggle("open");
  });

  // Close menu on link click
  document.querySelectorAll(".nav-links a").forEach((link) => {
    link.addEventListener("click", () => {
      navLinks?.classList.remove("open");
    });
  });

  // 3. Dynamic Captcha Refresh via AJAX
  const refreshCaptchaBtn = document.getElementById("refreshCaptchaBtn");
  const captchaText = document.getElementById("captchaQuestionText");
  const csrfTokenInput = document.getElementById("formCsrfToken");

  if (refreshCaptchaBtn && captchaText) {
    refreshCaptchaBtn.addEventListener("click", async () => {
      refreshCaptchaBtn.disabled = true;
      const originalText = refreshCaptchaBtn.innerHTML;
      refreshCaptchaBtn.innerHTML = "<span>↻</span> Refreshing...";

      try {
        const response = await fetch("ajax-captcha");
        if (response.ok) {
          const data = await response.json();
          if (data.success) {
            captchaText.textContent = data.question;
            if (csrfTokenInput && data.csrf_token) {
              csrfTokenInput.value = data.csrf_token;
            }
            const captchaInput = document.getElementById("form_captcha_answer");
            if (captchaInput) {
              captchaInput.value = "";
              captchaInput.focus();
            }
          }
        }
      } catch (err) {
        console.error("Failed to refresh captcha:", err);
      } finally {
        refreshCaptchaBtn.disabled = false;
        refreshCaptchaBtn.innerHTML = originalText;
      }
    });
  }

  // 4. AJAX Form Submission with smooth feedback
  const enquiryForm = document.getElementById("mainEnquiryForm");
  const formAlert = document.getElementById("formAlert");
  const submitBtn = document.getElementById("submitBtn");

  if (enquiryForm) {
    enquiryForm.addEventListener("submit", async (e) => {
      e.preventDefault();

      if (formAlert) {
        formAlert.style.display = "none";
        formAlert.className = "alert-box";
      }

      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = "<span>⏳ Submitting enquiry...</span>";
      }

      const formData = new FormData(enquiryForm);
      formData.append("ajax", "1");

      try {
        const response = await fetch("submit-enquiry", {
          method: "POST",
          headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json"
          },
          body: formData
        });

        const data = await response.json();

        if (data.success) {
          if (formAlert) {
            formAlert.textContent = data.message;
            formAlert.className = "alert-box alert-success";
            formAlert.style.display = "block";
            formAlert.scrollIntoView({ behavior: "smooth", block: "center" });
          }
          enquiryForm.reset();
          // Trigger a captcha refresh for subsequent submission
          refreshCaptchaBtn?.click();

          // Redirect to thank-you after 1.5 seconds
          setTimeout(() => {
            window.location.href = "thank-you";
          }, 1500);
        } else {
          if (formAlert) {
            formAlert.textContent = data.message || "An error occurred. Please check your inputs.";
            formAlert.className = "alert-box alert-error";
            formAlert.style.display = "block";
            formAlert.scrollIntoView({ behavior: "smooth", block: "center" });
          }
          // Refresh captcha on failure so new challenge is issued
          refreshCaptchaBtn?.click();
        }
      } catch (err) {
        console.error("Submission failed:", err);
        // Fallback: Submit normally if JS fetch encountered any network blocker
        enquiryForm.submit();
      } finally {
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = '<span class="btn-text">Submit Enquiry & Get Free Estimate</span> <span class="btn-arrow">→</span>';
        }
      }
    });
  }

  // 5. Portfolio Filter Tabs (projects.php)
  const filterBtns = document.querySelectorAll(".portfolio-filters .filter-btn");
  const portfolioCards = document.querySelectorAll(".portfolio-grid .portfolio-card");

  if (filterBtns.length > 0 && portfolioCards.length > 0) {
    filterBtns.forEach((btn) => {
      btn.addEventListener("click", () => {
        filterBtns.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        const filter = btn.getAttribute("data-filter");

        portfolioCards.forEach((card) => {
          if (filter === "all" || card.getAttribute("data-category") === filter) {
            card.style.display = "block";
          } else {
            card.style.display = "none";
          }
        });
      });
    });
  }
});
