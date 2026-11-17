<?php
/**
 * Template Name: 06 Contact Us Page
 * Includes: Project Inquiry Form, Interactive Studio Map Visual, and Get In Touch Info.
 *
 * @package MILEYM3DIA
 */

get_header();
$uri    = get_template_directory_uri();
$notice = get_transient( 'm3_auth_notice' );
if ( $notice ) {
    delete_transient( 'm3_auth_notice' );
}
?>

<main id="primary" class="site-main">

    <!-- Contact Header Banner -->
    <section class="m3-color-banner accent-red" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-cta-red.jpg' ); ?>');padding:64px 0;">
        <div class="m3-container" style="position:relative;z-index:2;text-align:center;">
            <span class="m3-banner-badge">06 • GET IN TOUCH</span>
            <h1 class="m3-banner-headline">
                LET'S CREATE SOMETHING <span class="accent">LEGENDARY.</span>
            </h1>
            <p style="color:var(--m3-text-muted);max-width:560px;margin:0 auto;">
                Book a music video, studio beat/mixing session, brand commercial, or full artist development rollout with MILEYM3DIA.
            </p>
        </div>
    </section>

    <section class="m3-services-section">
        <div class="m3-container">
            <?php if ( ! empty( $notice ) ) : ?>
                <div style="background:rgba(197,232,0,0.14);border:1px solid var(--m3-green);color:#fff;padding:16px 20px;border-radius:6px;margin-bottom:28px;">
                    <?php echo esc_html( $notice['msg'] ); ?>
                </div>
            <?php endif; ?>

            <!-- Interactive Quick-Scope & Smaller-Job Estimator -->
            <div class="m3-estimator-card" id="m3-scope-estimator">
                <div style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:12px;">
                    <div>
                        <div class="m3-eyebrow" style="margin-bottom:4px;">QUICK-SCOPE ESTIMATOR • SMALLER JOBS &amp; FAST TURNAROUND</div>
                        <h2 class="m3-section-title" style="font-size:1.55rem;">NEED A <span style="color:var(--m3-cyan);">LOGO, EDIT, OR SINGLE TRACK?</span></h2>
                    </div>
                    <span style="font-family:var(--m3-font-mono);font-size:0.72rem;color:var(--m3-text-muted);">
                        CLICK ONE OR MORE ITEMS TO AUTO-FILL YOUR BRIEF ↓
                    </span>
                </div>

                <div class="m3-estimator-pills" role="group" aria-label="Select Project Scope">
                    <button type="button" class="m3-scope-pill accent-purple" data-scope-name="Logo & Brand Kit" data-scope-min="250" data-scope-max="450" data-scope-days="3–4 Days" data-scope-service="Branding & Graphic Design">
                        <span class="m3-scope-pill-title">LOGO &amp; BRAND KIT</span>
                        <span class="m3-scope-pill-meta">$250–$450 • 3–4 Days</span>
                    </button>
                    <button type="button" class="m3-scope-pill accent-yellow" data-scope-name="Cover Art / Flyer" data-scope-min="125" data-scope-max="250" data-scope-days="48 Hours" data-scope-service="Branding & Graphic Design">
                        <span class="m3-scope-pill-title">COVER ART / FLYER</span>
                        <span class="m3-scope-pill-meta">$125–$250 • 48 Hours</span>
                    </button>
                    <button type="button" class="m3-scope-pill accent-cyan" data-scope-name="Web / WordPress UI Edit" data-scope-min="199" data-scope-max="499" data-scope-days="2–3 Days" data-scope-service="Content Creation & Video Editing">
                        <span class="m3-scope-pill-title">WEB / UI EDIT &amp; FIX</span>
                        <span class="m3-scope-pill-meta">$199–$499 • 2–3 Days</span>
                    </button>
                    <button type="button" class="m3-scope-pill accent-red" data-scope-name="Short-Form Video Edit" data-scope-min="175" data-scope-max="350" data-scope-days="48–72 Hours" data-scope-service="Content Creation & Video Editing">
                        <span class="m3-scope-pill-title">SHORT-FORM VIDEO EDIT</span>
                        <span class="m3-scope-pill-meta">$175–$350 • 48–72 Hours</span>
                    </button>
                    <button type="button" class="m3-scope-pill accent-green" data-scope-name="Mix & Master / Custom Beat" data-scope-min="150" data-scope-max="350" data-scope-days="2–4 Days" data-scope-service="Music Production & Mixing">
                        <span class="m3-scope-pill-title">MIX &amp; MASTER / BEAT</span>
                        <span class="m3-scope-pill-meta">$150–$350 • 2–4 Days</span>
                    </button>
                    <button type="button" class="m3-scope-pill accent-blue" data-scope-name="Small-Crew Shoot (2HR)" data-scope-min="499" data-scope-max="699" data-scope-days="3–5 Days" data-scope-service="Videography & Music Video">
                        <span class="m3-scope-pill-title">SMALL-CREW SHOOT (2HR)</span>
                        <span class="m3-scope-pill-meta">$499–$699 • 3–5 Days</span>
                    </button>
                </div>

                <div class="m3-estimator-summary">
                    <div>
                        <div style="font-family:var(--m3-font-mono);font-size:0.68rem;color:var(--m3-text-dim);letter-spacing:0.1em;">SELECTED SCOPE</div>
                        <div id="m3-est-scope-label" style="font-family:var(--m3-font-display);font-size:1rem;color:#fff;margin-top:2px;">Click any job pill above to estimate</div>
                    </div>
                    <div style="display:flex;gap:28px;align-items:center;flex-wrap:wrap;">
                        <div>
                            <div style="font-family:var(--m3-font-mono);font-size:0.68rem;color:var(--m3-text-dim);letter-spacing:0.1em;">ESTIMATED RANGE</div>
                            <div class="m3-estimator-stat-val" id="m3-est-price">$0</div>
                        </div>
                        <div>
                            <div style="font-family:var(--m3-font-mono);font-size:0.68rem;color:var(--m3-text-dim);letter-spacing:0.1em;">TURNAROUND</div>
                            <div id="m3-est-time" style="font-family:var(--m3-font-display);font-size:1.15rem;color:var(--m3-cyan);font-weight:700;">—</div>
                        </div>
                        <button type="button" id="m3-est-apply-btn" class="m3-btn m3-btn-outline-accent accent-cyan m3-btn-sm">
                            APPLY TO BRIEF ↓
                        </button>
                    </div>
                </div>
            </div>

            <div class="m3-auth-wrap" style="min-height:auto;padding:0;align-items:stretch;">
                <!-- Left: Contact Form -->
                <div class="m3-auth-card">
                    <div class="m3-eyebrow">START YOUR PROJECT</div>
                    <h2 class="m3-section-title" style="font-size:2rem;margin-bottom:20px;">SEND A <span class="accent">PROJECT BRIEF</span></h2>

                    <form method="post" action="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>">
                        <input type="hidden" name="m3_action" value="submit_brief">
                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="contact-name">YOUR NAME / ARTIST NAME *</label>
                                <input type="text" id="contact-name" name="project_title" class="m3-input" placeholder="e.g. Jaylen Smith / Kai Vance" required>
                            </div>
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="contact-email">EMAIL ADDRESS *</label>
                                <input type="email" id="contact-email" name="contact_email" class="m3-input" placeholder="you@brand.com" required>
                            </div>
                        </div>

                        <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="contact-service">SERVICE NEEDED</label>
                                <select id="contact-service" name="service_type" class="m3-select">
                                    <option value="Videography & Music Video">Videography &amp; Music Video</option>
                                    <option value="Music Production & Mixing">Music Production &amp; Mixing</option>
                                    <option value="Artist Development Rollout">Artist Development Rollout</option>
                                    <option value="Branding & Graphic Design">Branding &amp; Graphic Design</option>
                                    <option value="Photography Shoot">Photography Shoot</option>
                                    <option value="Content Creation & Video Editing">Content Creation &amp; Video Editing</option>
                                </select>
                            </div>
                            <div class="m3-form-group">
                                <label class="m3-form-label" for="contact-package">PACKAGE / BUDGET</label>
                                <select id="contact-package" name="package_tier" class="m3-select">
                                    <option value="STANDARD ($999)">STANDARD ($999 - Most Popular)</option>
                                    <option value="BASIC ($499)">BASIC ($499)</option>
                                    <option value="PREMIUM ($1999)">PREMIUM ($1,999 - Full Production)</option>
                                    <option value="Custom Retainer">Custom Agency Retainer</option>
                                </select>
                            </div>
                        </div>

                        <div class="m3-form-group">
                            <label class="m3-form-label" for="contact-promo">PROMO CODE (OPTIONAL - USE M3FIRST10 FOR 10% OFF)</label>
                            <input type="text" id="contact-promo" name="promo_code" class="m3-input" value="M3FIRST10">
                        </div>

                        <div class="m3-form-group">
                            <label class="m3-form-label" for="contact-details">PROJECT VISION &amp; TIMELINE *</label>
                            <textarea id="contact-details" name="project_details" rows="4" class="m3-textarea" placeholder="Tell us about your song, brand, visual references, and target shoot/release dates..." required></textarea>
                        </div>

                        <button type="submit" class="m3-btn m3-btn-primary" style="width:100%;">
                            SUBMIT PROJECT INQUIRY →
                        </button>
                    </form>
                </div>

                <!-- Right: Get In Touch Info + Studio Map -->
                <div style="display:flex;flex-direction:column;gap:22px;">
                    <div class="m3-auth-card" style="flex:1;">
                        <div class="m3-eyebrow">DIRECT STUDIO ACCESS</div>
                        <h3 class="m3-section-title" style="font-size:1.75rem;margin-bottom:18px;">GET IN <span class="accent">TOUCH INFO</span></h3>

                        <ul class="m3-contact-list" style="font-size:0.98rem;gap:16px;margin-bottom:24px;">
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <div>
                                    <strong style="color:#fff;display:block;font-family:var(--m3-font-display);letter-spacing:0.06em;">EMAIL US</strong>
                                    <?php echo esc_html( m3_mod( 'm3_contact_email', 'info@mileym3dia.com' ) ); ?>
                                </div>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <div>
                                    <strong style="color:#fff;display:block;font-family:var(--m3-font-display);letter-spacing:0.06em;">CALL / TEXT STUDIO DESK</strong>
                                    <?php echo esc_html( m3_mod( 'm3_contact_phone', '(123) 456-7890' ) ); ?>
                                </div>
                            </li>
                            <li>
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <div>
                                    <strong style="color:#fff;display:block;font-family:var(--m3-font-display);letter-spacing:0.06em;">STUDIO HEADQUARTERS</strong>
                                    <?php echo esc_html( m3_mod( 'm3_contact_location', 'Los Angeles, CA (Arts District Soundstage & Suite)' ) ); ?>
                                </div>
                            </li>
                        </ul>

                        <!-- Interactive Studio Map Card -->
                        <div style="border-radius:6px;overflow:hidden;border:1px solid var(--m3-border-strong);position:relative;height:210px;background:url('<?php echo esc_url( $uri . '/assets/images/projects/project-5-corporate-video.jpg' ); ?>') center/cover;">
                            <div style="position:absolute;inset:0;background:rgba(7,7,9,0.68);display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:18px;">
                                <div style="width:42px;height:42px;border-radius:50%;background:var(--m3-red);display:flex;align-items:center;justify-content:center;box-shadow:0 0 24px var(--m3-red);margin-bottom:8px;">
                                    📍
                                </div>
                                <div style="font-family:var(--m3-font-display);font-size:1.05rem;letter-spacing:0.08em;text-transform:uppercase;">MILEYM3DIA SOUNDSTAGE &amp; LABS</div>
                                <div style="font-size:0.8rem;color:var(--m3-text-muted);">Downtown Arts District • Los Angeles, CA</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
