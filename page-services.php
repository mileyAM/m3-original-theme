<?php
/**
 * Template Name: 03 Services Page
 * Includes all editable Visual, Branding, Music Production & Artist Development services,
 * Neon Yellow-Green Banner, 4-Step Process, Pricing Packages, and FAQ Accordion.
 *
 * @package MILEYM3DIA
 */

get_header();
$uri      = get_template_directory_uri();
$services = m3_get_services_data();
$packages = m3_get_packages_data();
?>

<main id="primary" class="site-main">

    <!-- Neon Yellow-Green Hero Banner ("BIG IDEAS. BOLD CONTENT. REAL IMPACT.") -->
    <section class="m3-color-banner accent-green" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-green-big-ideas.jpg' ); ?>');padding:72px 0;">
        <div class="m3-container" style="position:relative;z-index:2;display:grid;grid-template-columns:1fr 1.4fr 0.85fr;gap:24px;align-items:center;">
            <div></div>
            <div style="text-align:center;">
                <span class="m3-banner-badge">03 • OUR CAPABILITIES</span>
                <h1 class="m3-banner-headline">
                    BIG IDEAS. BOLD CONTENT.
                </h1>
                <div class="m3-script-text" style="color:var(--m3-accent);font-size:2.5rem;margin-bottom:12px;">
                    REAL IMPACT.
                </div>
                <p style="font-size:0.95rem;color:var(--m3-text-muted);max-width:520px;margin:0 auto;">
                    End-to-end visual media, music production, artist development, and brand design—100% customizable to your project goals.
                </p>
            </div>
            <div style="background:rgba(7,7,9,0.88);border:1px solid var(--m3-accent);padding:20px;border-radius:4px;text-align:center;">
                <div style="font-family:var(--m3-font-display);font-size:1.85rem;font-weight:700;color:var(--m3-accent);line-height:1;">10% OFF</div>
                <div style="font-family:var(--m3-font-display);font-size:0.88rem;letter-spacing:0.08em;margin:4px 0 10px;">YOUR FIRST PROJECT</div>
                <div class="m3-promo-code-pill" data-copy-code="M3FIRST10" style="margin:0 auto;font-size:0.75rem;">
                    <span>USE CODE: <strong>M3FIRST10</strong></span>
                    <span class="copy-feedback" style="font-size:0.65rem;">[COPY]</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Full 8-Service Detailed Grid (All Editable via m3_service CPT & Customizer) -->
    <section class="m3-services-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">WHAT WE DO • FULL SUITE</div>
                    <h2 class="m3-section-title">CREATIVE &amp; PRODUCTION <span class="accent">SERVICES</span></h2>
                </div>
                <a href="<?php echo esc_url( m3_page_url( 'portal' ) ); ?>" class="m3-btn m3-btn-primary m3-btn-sm">
                    BOOK A SERVICE IN PORTAL →
                </a>
            </div>

            <div class="m3-services-grid grid-8">
                <?php foreach ( $services as $srv ) : ?>
                    <article id="<?php echo esc_attr( $srv['icon'] ); ?>" class="m3-service-card accent-<?php echo esc_attr( $srv['accent'] ); ?>" style="text-align:left;align-items:flex-start;padding:30px 24px;">
                        <div style="display:flex;align-items:center;justify-content:space-between;width:100%;margin-bottom:16px;">
                            <div class="m3-service-icon" style="margin-bottom:0;">
                                <?php echo m3_get_svg_icon( $srv['icon'] ); ?>
                            </div>
                            <span class="m3-service-tag" style="margin-top:0;"><?php echo esc_html( $srv['price'] ); ?></span>
                        </div>
                        <h3 class="m3-service-title" style="font-size:1.18rem;"><?php echo esc_html( $srv['title'] ); ?></h3>
                        <p class="m3-service-desc" style="margin-bottom:16px;flex-grow:1;"><?php echo esc_html( $srv['desc'] ); ?></p>
                        <div style="font-family:var(--m3-font-mono);font-size:0.7rem;color:var(--m3-text-dim);border-top:1px solid var(--m3-border);padding-top:12px;width:100%;margin-bottom:14px;">
                            <?php echo esc_html( $srv['deliverable'] ); ?>
                        </div>
                        <a href="<?php echo esc_url( m3_url_with_query( 'portal', array( 'service' => $srv['title'] ) ) ); ?>" class="m3-btn m3-btn-outline-accent m3-btn-sm" style="width:100%;">
                            SELECT SERVICE
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Extra Section from Mockup 1: PROCESS / HOW WE WORK (4 Steps) -->
    <section class="m3-pricing-section" style="background:#0A0A0E;">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">HOW WE WORK</div>
                    <h2 class="m3-section-title">OUR 4-STEP <span class="accent">PROCESS</span></h2>
                </div>
            </div>

            <div class="m3-process-grid">
                <div class="m3-process-step">
                    <div class="m3-step-num">01</div>
                    <h3 class="m3-service-title">DISCOVERY &amp; STRATEGY</h3>
                    <p class="m3-service-desc">We align on your sonic identity, brand goals, target audience, and visual references inside your M3 Client Portal.</p>
                </div>
                <div class="m3-process-step">
                    <div class="m3-step-num">02</div>
                    <h3 class="m3-service-title">PRE-PRODUCTION</h3>
                    <p class="m3-service-desc">Treatment boards, scripting, location scouting, casting, or studio demo arrangement before production day.</p>
                </div>
                <div class="m3-process-step">
                    <div class="m3-step-num">03</div>
                    <h3 class="m3-service-title">CAPTURE &amp; RECORDING</h3>
                    <p class="m3-service-desc">High-impact 4K/8K cinema capture on set and/or multi-track vocal &amp; instrumental production in our studio.</p>
                </div>
                <div class="m3-process-step">
                    <div class="m3-step-num">04</div>
                    <h3 class="m3-service-title">EDIT, GRADE &amp; LAUNCH</h3>
                    <p class="m3-service-desc">Precision editing, color grading, audio mastering, and multi-platform rollout formats delivered to your portal.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages Section -->
    <section class="m3-pricing-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">TRANSPARENT RATES</div>
                    <h2 class="m3-section-title">PACKAGES THAT FIT <span class="accent">YOUR NEEDS</span></h2>
                </div>
            </div>
            <div class="m3-pricing-grid">
                <?php
                $pkg_accents = array( 'cyan', 'red', 'yellow' );
                foreach ( $packages as $idx => $pkg ) :
                    $p_accent = $pkg_accents[ $idx % count( $pkg_accents ) ];
                    ?>
                    <div class="m3-pricing-card accent-<?php echo esc_attr( $p_accent ); ?> <?php echo $pkg['featured'] ? 'featured' : ''; ?>">
                        <?php if ( ! empty( $pkg['badge'] ) ) : ?>
                            <span class="m3-popular-badge"><?php echo esc_html( $pkg['badge'] ); ?></span>
                        <?php endif; ?>
                        <div>
                            <div class="m3-pricing-tier" style="color:var(--m3-accent);"><?php echo esc_html( $pkg['name'] ); ?></div>
                            <div class="m3-pricing-price">
                                <?php echo esc_html( $pkg['price'] ); ?><small><?php echo esc_html( $pkg['unit'] ); ?></small>
                            </div>
                            <ul class="m3-pricing-features">
                                <?php foreach ( $pkg['features'] as $feat ) : ?>
                                    <li><span class="check" style="color:var(--m3-accent);">✓</span><span><?php echo esc_html( $feat ); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url( m3_url_with_query( 'portal', array( 'package' => $pkg['name'] ) ) ); ?>"
                           class="m3-btn <?php echo $pkg['featured'] ? 'm3-btn-primary' : 'm3-btn-outline-accent'; ?>" style="width:100%;">
                            GET STARTED
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Extra Section from Mockup 1: FAQ SECTION (Common Questions) -->
    <section class="m3-services-section">
        <div class="m3-container">
            <div style="text-align:center;margin-bottom:36px;">
                <div class="m3-eyebrow">COMMON QUESTIONS</div>
                <h2 class="m3-section-title">FREQUENTLY ASKED <span class="accent">QUESTIONS</span></h2>
            </div>

            <div class="m3-faq-list">
                <div class="m3-faq-item open">
                    <button type="button" class="m3-faq-question">
                        <span>Can I combine Music Production &amp; Artist Development with a Music Video package?</span>
                        <span>+</span>
                    </button>
                    <div class="m3-faq-answer">
                        Yes! Our <strong>Premium ($1,999)</strong> and custom Artist Development packages combine studio beat production, mixing/mastering, visual branding, and 4K music video direction under one cohesive creative team.
                    </div>
                </div>
                <div class="m3-faq-item">
                    <button type="button" class="m3-faq-question">
                        <span>How do I use the 10% OFF first project promo code (M3FIRST10)?</span>
                        <span>+</span>
                    </button>
                    <div class="m3-faq-answer">
                        Simply register or log in to the M3 Client Portal and enter code <strong>M3FIRST10</strong> when submitting your project brief, or mention it on our Contact form to automatically lock in 10% off your first production.
                    </div>
                </div>
                <div class="m3-faq-item">
                    <button type="button" class="m3-faq-question">
                        <span>How are services and prices edited inside WordPress?</span>
                        <span>+</span>
                    </button>
                    <div class="m3-faq-answer">
                        Every service card, icon, accent color, starting price, and package feature is editable via the <strong>Services (M3)</strong> and <strong>Pricing Packages (M3)</strong> Custom Post Types in your WordPress Dashboard as well as <strong>Appearance → Customize</strong>.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Studio Gear & Software Stack Strip -->
    <section class="m3-gear-section" id="gear-stack">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">IN-HOUSE ARSENAL</div>
                    <h2 class="m3-section-title">STUDIO GEAR &amp; <span class="accent">SOFTWARE STACK</span></h2>
                </div>
            </div>

            <div class="m3-gear-grid">
                <?php foreach ( m3_get_gear_stack_data() as $gear ) : ?>
                    <div class="m3-gear-card accent-<?php echo esc_attr( $gear['accent'] ); ?>">
                        <div class="m3-gear-header">
                            <div class="m3-gear-icon"><?php echo m3_get_svg_icon( $gear['icon'] ); ?></div>
                            <h3 class="m3-gear-title"><?php echo esc_html( $gear['title'] ); ?></h3>
                        </div>
                        <ul class="m3-gear-list">
                            <?php foreach ( $gear['tools'] as $tool ) : ?>
                                <li><?php echo esc_html( $tool ); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
