/**
 * MILEYM3DIA (M3) Theme Interactive Scripts
 * Handles Active Navigation State, Offcanvas Menu, Portfolio Filtering,
 * Inline Single Project Video Player, Showreel Modal, Promo Code Copy, and FAQ Accordion.
 */
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    // 0. Ensure Active Menu Red Line Stays Locked on Current Page
    const currentSlug = document.body.getAttribute('data-current-page') || 'home';
    document.querySelectorAll('.m3-nav-link[data-nav-slug]').forEach(function (link) {
      if (link.getAttribute('data-nav-slug') === currentSlug) {
        link.classList.add('active');
        link.setAttribute('aria-current', 'page');
        const li = link.closest('.m3-nav-item');
        if (li) li.classList.add('current-menu-item');
      }
    });

    // 1. Numbered Offcanvas Menu Toggle
    const mobileToggle = document.getElementById('m3-mobile-toggle');
    const offcanvas = document.getElementById('m3-offcanvas');
    const backdrop = document.getElementById('m3-offcanvas-backdrop');
    const closeBtn = document.getElementById('m3-offcanvas-close');

    function closeOffcanvas() {
      if (offcanvas) offcanvas.classList.remove('open');
      if (backdrop) backdrop.classList.remove('open');
    }

    if (mobileToggle && offcanvas && backdrop) {
      mobileToggle.addEventListener('click', function () {
        offcanvas.classList.add('open');
        backdrop.classList.add('open');
      });
      backdrop.addEventListener('click', closeOffcanvas);
    }
    if (closeBtn) {
      closeBtn.addEventListener('click', closeOffcanvas);
    }

    // 2. Portfolio Filter Tabs (ALL, VIDEO, PHOTO, BRANDING, MUSIC)
    const filterButtons = document.querySelectorAll('.m3-filter-btn[data-filter]');
    const projectCards = document.querySelectorAll('.m3-project-card[data-category]');

    filterButtons.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = btn.getAttribute('data-filter');
        filterButtons.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');

        projectCards.forEach(function (card) {
          const cat = card.getAttribute('data-category');
          if (filter === 'all' || cat === filter) {
            card.style.display = 'block';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // 2B. Home Page Blog Category Filter Tabs & Carousel Controls
    const blogFilterBtns = document.querySelectorAll('.m3-filter-btn[data-blog-filter]');
    const blogCards = document.querySelectorAll('.m3-blog-card[data-blog-category]');
    const blogTrack = document.getElementById('m3-home-blog-track');
    const blogPrev = document.getElementById('m3-blog-prev');
    const blogNext = document.getElementById('m3-blog-next');

    blogFilterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = btn.getAttribute('data-blog-filter');
        blogFilterBtns.forEach(function (b) { b.classList.remove('active'); });
        btn.classList.add('active');
        if (blogTrack) blogTrack.classList.remove('carousel-mode');

        blogCards.forEach(function (card) {
          const cat = card.getAttribute('data-blog-category');
          if (filter === 'all' || cat === filter) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    if (blogTrack && blogPrev && blogNext) {
      blogPrev.addEventListener('click', function () {
        blogTrack.classList.add('carousel-mode');
        blogTrack.scrollBy({ left: -420, behavior: 'smooth' });
      });
      blogNext.addEventListener('click', function () {
        blogTrack.classList.add('carousel-mode');
        blogTrack.scrollBy({ left: 420, behavior: 'smooth' });
      });
    }

    // 3. Dedicated Single Project Page — Inline 16:9 Video Player
    const inlinePlayTrigger = document.getElementById('m3-play-inline-video');
    const inlineVideoContainer = document.getElementById('m3-inline-video-container');
    if (inlinePlayTrigger && inlineVideoContainer) {
      inlinePlayTrigger.addEventListener('click', function () {
        const videoSrc = inlinePlayTrigger.getAttribute('data-video-src') || '';
        const posterImg = inlineVideoContainer.querySelector('.m3-video-poster');
        const posterUrl = posterImg ? posterImg.getAttribute('src') : '';

        if (videoSrc.indexOf('youtube.com/embed') !== -1 || videoSrc.indexOf('player.vimeo.com') !== -1) {
          inlineVideoContainer.innerHTML =
            '<iframe src="' + videoSrc + '?autoplay=1" style="width:100%;height:100%;border:0;" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
        } else {
          // Render interactive studio 4K player with timeline & audio visualizer
          inlineVideoContainer.innerHTML =
            '<div style="position:relative;width:100%;height:100%;background:#050508;display:flex;flex-direction:column;justify-content:space-between;padding:24px;">' +
              '<img src="' + posterUrl + '" alt="" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;opacity:0.42;filter:contrast(1.1);">' +
              '<div style="position:relative;z-index:2;display:flex;justify-content:space-between;align-items:center;font-family:var(--m3-font-mono);font-size:0.75rem;color:#fff;">' +
                '<span style="background:var(--m3-red);padding:4px 10px;border-radius:2px;">▶ PLAYING 4K STUDIO MASTER</span>' +
                '<span>TIMECODE 00:01:18:04 / 00:03:42:00</span>' +
              '</div>' +
              '<div style="position:relative;z-index:2;text-align:center;margin:auto;">' +
                '<div style="font-family:var(--m3-font-display);font-size:1.5rem;letter-spacing:0.08em;text-transform:uppercase;color:#fff;margin-bottom:8px;">MILEYM3DIA INLINE VIDEO PLAYER ACTIVE</div>' +
                '<p style="font-size:0.86rem;color:var(--m3-text-muted);max-width:480px;margin:0 auto;">In WordPress Admin, paste any YouTube, Vimeo, or direct MP4 URL into the Project Video meta field to stream it inside this frame.</p>' +
              '</div>' +
              '<div style="position:relative;z-index:2;background:rgba(8,8,12,0.9);border:1px solid rgba(255,255,255,0.18);padding:12px 16px;display:flex;align-items:center;gap:14px;">' +
                '<span style="color:var(--m3-red);font-weight:700;">❚❚</span>' +
                '<div style="flex:1;height:4px;background:rgba(255,255,255,0.18);position:relative;"><div style="width:38%;height:100%;background:var(--m3-red);"></div></div>' +
                '<span style="font-family:var(--m3-font-mono);font-size:0.7rem;color:#fff;">4K UHD • STEREO</span>' +
              '</div>' +
            '</div>';
        }
      });
    }

    // 4. Showreel Lightbox Modal
    const modal = document.getElementById('m3-showreel-modal');
    const modalTitle = document.getElementById('m3-modal-title');
    const modalClient = document.getElementById('m3-modal-client');
    const modalSummary = document.getElementById('m3-modal-summary');
    const modalImage = document.getElementById('m3-modal-image');
    const modalClose = document.getElementById('m3-modal-close');

    function openModal(title, client, summary, img) {
      if (!modal) return;
      if (modalTitle) modalTitle.textContent = title || 'MILEYM3DIA OFFICIAL SHOWREEL (4K)';
      if (modalClient) modalClient.textContent = client || 'M3 CREATIVE AGENCY • MUSIC & VISUAL PRODUCTION';
      if (modalSummary) modalSummary.textContent = summary || 'Featuring highlights across Music Video Production, Artist Development, Brand Commercials, Studio Beat Sessions, and Visual Storytelling.';
      if (modalImage && img) modalImage.src = img;
      modal.classList.add('open');
    }

    document.querySelectorAll('[data-open-showreel]').forEach(function (el) {
      el.addEventListener('click', function (e) {
        e.preventDefault();
        openModal(
          el.getAttribute('data-title'),
          el.getAttribute('data-client'),
          el.getAttribute('data-summary'),
          el.getAttribute('data-image')
        );
      });
    });

    if (modalClose && modal) {
      modalClose.addEventListener('click', function () {
        modal.classList.remove('open');
      });
      modal.addEventListener('click', function (e) {
        if (e.target === modal) modal.classList.remove('open');
      });
    }

    // Floating Notification Toast Helper
    function showToast(message, color) {
      let toast = document.getElementById('m3-global-toast');
      if (!toast) {
        toast = document.createElement('div');
        toast.id = 'm3-global-toast';
        toast.style.cssText = 'position:fixed;bottom:28px;right:28px;background:#0E0E14;border:1px solid ' + (color || 'var(--m3-accent)') + ';color:#FFFFFF;padding:12px 20px;border-radius:3px;font-family:var(--m3-font-mono);font-size:0.8rem;letter-spacing:0.06em;z-index:99999;box-shadow:0 8px 30px rgba(0,0,0,0.6);display:flex;align-items:center;gap:10px;transform:translateY(20px);opacity:0;transition:all 0.25s ease;';
        document.body.appendChild(toast);
      }
      toast.innerHTML = '<span style="color:' + (color || 'var(--m3-accent)') + ';font-weight:700;">✓</span> ' + message;
      toast.style.transform = 'translateY(0)';
      toast.style.opacity = '1';
      clearTimeout(window.__m3ToastTimer);
      window.__m3ToastTimer = setTimeout(function () {
        toast.style.transform = 'translateY(20px)';
        toast.style.opacity = '0';
      }, 3500);
    }

    // 5. Click-to-Copy Promo Code (M3FIRST10) with Visual Feedback & Toast
    document.querySelectorAll('[data-copy-code]').forEach(function (pill) {
      pill.addEventListener('click', function (e) {
        e.preventDefault();
        const code = pill.getAttribute('data-copy-code') || 'M3FIRST10';
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(code);
        }
        const statusEl = pill.querySelector('.copy-feedback');
        if (statusEl) {
          const orig = statusEl.textContent;
          statusEl.textContent = 'COPIED!';
          setTimeout(function () { statusEl.textContent = orig; }, 2000);
        }
        const tooltip = pill.querySelector('.m3-coupon-tooltip');
        if (tooltip) {
          tooltip.textContent = 'CODE COPIED: ' + code;
          setTimeout(function () { tooltip.textContent = 'CLICK TO COPY CODE'; }, 2500);
        }
        showToast('PROMO CODE <strong>' + code + '</strong> COPIED TO CLIPBOARD! (10% OFF FIRST PROJECT)', '#C5E800');
      });
    });

    // 5B. Banner Category Hotspot Triggers (Videography, Branding, Graphic Design, Content Creation)
    document.querySelectorAll('[data-filter-trigger]').forEach(function (trigger) {
      trigger.addEventListener('click', function (e) {
        const cat = trigger.getAttribute('data-filter-trigger');
        const targetBtn = document.querySelector('.m3-filter-btn[data-filter="' + cat + '"]');
        if (targetBtn) {
          e.preventDefault();
          targetBtn.click();
          const targetSection = document.querySelector('.m3-projects-section');
          if (targetSection) {
            targetSection.scrollIntoView({ behavior: 'smooth' });
          }
        }
      });
    });

    // 6. FAQ Accordion
    document.querySelectorAll('.m3-faq-question').forEach(function (q) {
      q.addEventListener('click', function () {
        const item = q.closest('.m3-faq-item');
        if (item) {
          item.classList.toggle('open');
        }
      });
    });

    // 7. Live Customizer Accent Color Switcher
    document.querySelectorAll('[data-set-accent]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        const targetId = btn.getAttribute('data-target');
        const accent = btn.getAttribute('data-set-accent');
        const target = targetId ? document.getElementById(targetId) : document.body;
        if (target) {
          target.classList.remove('accent-red', 'accent-green', 'accent-blue', 'accent-purple');
          target.classList.add('accent-' + accent);
        }
      });
    });
  });

  // =========================================================================
  // 8. CONTACT PAGE QUICK-SCOPE & SMALLER-JOB ESTIMATOR
  // =========================================================================
  const estimator = document.getElementById('m3-scope-estimator');
  if (estimator) {
    const pills = estimator.querySelectorAll('.m3-scope-pill');
    const labelEl = document.getElementById('m3-est-scope-label');
    const priceEl = document.getElementById('m3-est-price');
    const timeEl = document.getElementById('m3-est-time');
    const applyBtn = document.getElementById('m3-est-apply-btn');

    const updateEstimator = () => {
      const selected = Array.from(pills).filter((p) => p.classList.contains('selected'));
      if (selected.length === 0) {
        if (labelEl) labelEl.textContent = 'Click any job pill above to estimate';
        if (priceEl) priceEl.textContent = '$0';
        if (timeEl) timeEl.textContent = '—';
        return;
      }

      let minTotal = 0;
      let maxTotal = 0;
      const names = [];
      const times = [];

      selected.forEach((btn) => {
        names.push(btn.getAttribute('data-scope-name'));
        minTotal += parseInt(btn.getAttribute('data-scope-min') || '0', 10);
        maxTotal += parseInt(btn.getAttribute('data-scope-max') || '0', 10);
        times.push(btn.getAttribute('data-scope-days'));
      });

      if (labelEl) labelEl.textContent = names.join(' + ');
      if (priceEl) priceEl.textContent = `$${minTotal}–$${maxTotal}`;
      if (timeEl) timeEl.textContent = selected.length === 1 ? times[0] : '3–5 Days';
    };

    pills.forEach((pill) => {
      pill.addEventListener('click', () => {
        pill.classList.toggle('selected');
        updateEstimator();
      });
    });

    if (applyBtn) {
      applyBtn.addEventListener('click', () => {
        const selected = Array.from(pills).filter((p) => p.classList.contains('selected'));
        if (selected.length === 0) return;

        const names = selected.map((b) => b.getAttribute('data-scope-name'));
        const firstService = selected[0].getAttribute('data-scope-service');
        const priceRange = priceEl ? priceEl.textContent : '';
        const turnaround = timeEl ? timeEl.textContent : '';

        const serviceSelect = document.getElementById('contact-service');
        const detailsField = document.getElementById('contact-details');

        if (serviceSelect && firstService) {
          Array.from(serviceSelect.options).forEach((opt) => {
            if (opt.value === firstService) opt.selected = true;
          });
        }

        if (detailsField) {
          const summaryLine = `Quick-Scope Estimate: ${names.join(' + ')} (${priceRange}, est. ${turnaround}).\n\nProject notes: `;
          if (!detailsField.value.includes('Quick-Scope Estimate:')) {
            detailsField.value = summaryLine + detailsField.value;
          } else {
            detailsField.value = detailsField.value.replace(/Quick-Scope Estimate:.*\n\n/, summaryLine);
          }
          detailsField.focus();
          detailsField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      });
    }
  }
})();

