<?php
/**
 * Template Name: 01 Home Page (M3 Front Page)
 * Refined with:
 * - 3-Tier Stacked Hero ("WE CREATE / VISUALS / THAT HIT DIFFERENT.") + Multi-layer dark cinematic overlay
 * - Contrasting Electric Blue & Carbon Architectural Mission/Stats section right below Hero
 * - Symmetrical 4x2 Services Grid & 3x2 Projects Grid opening dedicated Single Project Pages
 * - "From The Blog" moved up directly below Projects with Right-Sided Blog Sidebar
 * - Decluttered CTAs (only one closing CTA at bottom of Home page)
 *
 * @package MILEYM3DIA
 */

get_header();

$uri          = get_template_directory_uri();
$services     = m3_get_services_data();
$projects     = m3_get_projects_data();
$packages     = m3_get_packages_data();
$testimonials = m3_get_testimonials_data();
$blog_posts   = m3_get_blog_posts_data();
?>

<main id="primary" class="site-main">

    <!-- ====================================================================
         1. HERO SECTION (3-Stack Tier: WE CREATE / VISUALS / THAT HIT DIFFERENT.)
         ==================================================================== -->
    <section class="m3-hero" id="hero-section" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/sections/hero-composite-hd.jpg' ); ?>');">
        <div class="m3-hero-overlay" aria-hidden="true"></div>
        <div class="m3-container">
            <div class="m3-hero-content">
                <div class="m3-hero-kicker">
                    <span>CREATE <span class="sep">•</span> CAPTURE <span class="sep">•</span> ELEVATE</span>
                    <span style="opacity:0.4;">|</span>
                    <span style="color:var(--m3-red);">M3 MUSIC &amp; VISUALS</span>
                </div>

                <!-- 3-Stack Tier Hero Headline -->
                <h1 class="m3-hero-title m3-hero-stack">
                    <span class="m3-stack-tier tier-1"><?php echo esc_html( m3_mod( 'm3_hero_title_line1', 'WE CREATE' ) ); ?></span>
                    <span class="m3-stack-tier tier-2"><?php echo esc_html( m3_mod( 'm3_hero_title_line2', 'VISUALS' ) ); ?></span>
                    <span class="m3-stack-tier tier-3 highlight-red"><?php echo esc_html( m3_mod( 'm3_hero_title_line3', 'THAT HIT DIFFERENT.' ) ); ?></span>
                </h1>

                <div class="m3-hero-sub">
                    <?php echo esc_html( m3_mod( 'm3_hero_kicker', 'MEDIA. VISUALS. BRANDING. MUSIC PRODUCTION.' ) ); ?>
                </div>
                <p class="m3-hero-desc">
                    <?php echo esc_html( m3_mod( 'm3_hero_desc', 'POWERFUL VISUALS. STRONGER BRANDS. REAL IMPACT. High quality visuals, music production, artist development and content that converts.' ) ); ?>
                </p>

                <div class="m3-hero-ctas">
                    <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary" id="hero-primary-cta">
                        <?php echo esc_html( m3_mod( 'm3_hero_btn1_text', "LET'S WORK TOGETHER" ) ); ?>
                    </a>
                    <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>" class="m3-btn m3-btn-outline" id="hero-portfolio-cta">
                        <span class="m3-play-circle">▶</span>
                        <?php echo esc_html( m3_mod( 'm3_hero_btn2_text', 'EXPLORE OUR WORK' ) ); ?>
                    </a>
                </div>
            </div>
        </div>

        <!-- Brand Logos Bar -->
        <div class="m3-brand-strip">
            <div class="m3-container m3-brand-strip-inner">
                <?php
                $brands = array_map( 'trim', explode( ',', m3_mod( 'm3_hero_brands', 'NIKE, adidas, SONY, Canon, RED, PUMA' ) ) );
                foreach ( $brands as $brand ) :
                    ?>
                    <span class="m3-partner-logo"><?php echo esc_html( $brand ); ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         2. MISSION & STATS BAR ("WE ARE MILEYM3DIA / VISION MEETS EXECUTION")
            Reassessed Color Usage: Contrasting Carbon / Electric Blue & Neon Chartreuse
            to cleanly break up the Red Hero above from the sections below.
         ==================================================================== -->
    <section class="m3-mission-stats accent-blue" id="mission-section">
        <div class="m3-container m3-mission-grid">
            <div class="m3-mission-copy">
                <div class="m3-eyebrow">
                    <span style="display:inline-block;width:8px;height:8px;background:var(--m3-blue);"></span>
                    WE ARE <span class="accent">MILEYM3DIA</span>
                </div>
                <h2 class="m3-section-title">
                    <?php echo esc_html( m3_mod( 'm3_mission_title1', 'VISION MEETS' ) ); ?><br>
                    <span class="accent"><?php echo esc_html( m3_mod( 'm3_mission_title2', 'EXECUTION' ) ); ?></span>
                </h2>
                <p>
                    <?php echo esc_html( m3_mod( 'm3_mission_desc', "We're a creative media & music production company helping brands, artists and businesses stand out with cinematic visuals, bold branding and content that connects." ) ); ?>
                </p>
                <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>" class="m3-btn m3-btn-outline-accent m3-btn-sm">MORE ABOUT M3 →</a>
            </div>

            <div class="m3-stats-row">
                <div class="m3-stat-box stat-blue">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'clock' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_1_num', '150+' ) ); ?></div>
                    <div class="m3-stat-label"><?php echo esc_html( m3_mod( 'm3_stat_1_label', 'PROJECTS COMPLETED' ) ); ?></div>
                </div>
                <div class="m3-stat-box stat-green">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'smile' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_2_num', '100+' ) ); ?></div>
                    <div class="m3-stat-label"><?php echo esc_html( m3_mod( 'm3_stat_2_label', 'HAPPY CLIENTS' ) ); ?></div>
                </div>
                <div class="m3-stat-box stat-blue">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'award' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_3_num', '5+' ) ); ?></div>
                    <div class="m3-stat-label"><?php echo esc_html( m3_mod( 'm3_stat_3_label', 'YEARS OF EXPERIENCE' ) ); ?></div>
                </div>
                <div class="m3-stat-box stat-green">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'eye' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_4_num', '10M+' ) ); ?></div>
                    <div class="m3-stat-label"><?php echo esc_html( m3_mod( 'm3_stat_4_label', 'VIEWS GENERATED' ) ); ?></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         3. WHAT WE DO / OUR SERVICES (Symmetrical 4x2 Grid of 8 Disciplines)
         ==================================================================== -->
    <section class="m3-services-section" id="services-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">WHAT WE DO</div>
                    <h2 class="m3-section-title">OUR <span class="accent">SERVICES</span></h2>
                </div>
                <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>" class="m3-btn m3-btn-outline m3-btn-sm">
                    EXPLORE ALL SERVICES →
                </a>
            </div>

            <!-- Symmetrical 4x2 Grid (All 8 Cards Identical Proportions & Straight Borders) -->
            <div class="m3-services-grid grid-8">
                <?php foreach ( array_slice( $services, 0, 8 ) as $srv ) : ?>
                    <a href="<?php echo esc_url( m3_page_url( 'services' ) . '#' . $srv['icon'] ); ?>" class="m3-service-card accent-<?php echo esc_attr( $srv['accent'] ); ?>">
                        <div class="m3-service-icon">
                            <?php echo m3_get_svg_icon( $srv['icon'] ); ?>
                        </div>
                        <h3 class="m3-service-title"><?php echo esc_html( $srv['title'] ); ?></h3>
                        <p class="m3-service-desc"><?php echo esc_html( $srv['desc'] ); ?></p>
                        <span class="m3-service-tag"><?php echo esc_html( $srv['price'] ); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         4. ABOUT US SPLIT ("CREATIVE MINDS. REAL IMPACT." — High-Res Studio Plates)
         ==================================================================== -->
    <section class="m3-about-split" id="about-preview-section">
        <div class="m3-container m3-about-grid">
            <div class="m3-about-visual-left">
                <img src="<?php echo esc_url( $uri . '/assets/images/sections/about-hoodie-graphic.jpg' ); ?>" alt="MILEYM3DIA Studio Production & Visual Identity">
            </div>

            <div class="m3-about-copy">
                <div class="m3-eyebrow">ABOUT US</div>
                <h2 class="m3-section-title">
                    CREATIVE MINDS.<br>
                    <span class="accent">REAL IMPACT.</span>
                </h2>
                <p>
                    MILEYM3DIA (M3) is more than a media company. We're storytellers, music producers, artist developers, and visual innovators. Our mission is simple: bring ideas to life through powerful visuals and sonic identity that connect, inspire and drive results.
                </p>
                <div style="display:flex;gap:12px;flex-wrap:wrap;">
                    <a href="<?php echo esc_url( m3_page_url( 'about' ) ); ?>" class="m3-btn m3-btn-outline-accent m3-btn-sm">DISCOVER OUR STORY →</a>
                </div>
            </div>

            <div class="m3-about-visual-right">
                <img src="<?php echo esc_url( $uri . '/assets/images/sections/about-camera-collage.jpg' ); ?>" alt="MILEYM3DIA Cinema Camera Rig & Studio Set">
            </div>
        </div>
    </section>

    <!-- ====================================================================
         5. FEATURED WORK / PORTFOLIO ("OUR LATEST PROJECTS")
            Symmetrical 3x2 Grid — Each card opens its own Single Project Page
         ==================================================================== -->
    <section class="m3-projects-section" id="work-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">FEATURED WORK</div>
                    <h2 class="m3-section-title">OUR LATEST <span class="accent">PROJECTS</span></h2>
                </div>

                <div class="m3-filter-tabs" role="tablist" aria-label="Filter Portfolio Projects">
                    <button type="button" class="m3-filter-btn active" data-filter="all">ALL</button>
                    <button type="button" class="m3-filter-btn" data-filter="video">VIDEO</button>
                    <button type="button" class="m3-filter-btn" data-filter="photo">PHOTO</button>
                    <button type="button" class="m3-filter-btn" data-filter="branding">BRANDING</button>
                    <button type="button" class="m3-filter-btn" data-filter="music">MUSIC / AUDIO</button>
                </div>
            </div>

            <div class="m3-projects-grid">
                <?php foreach ( array_slice( $projects, 0, 6 ) as $proj ) : ?>
                    <a href="<?php echo esc_url( m3_project_url( $proj['id'] ) ); ?>"
                       class="m3-project-card"
                       data-category="<?php echo esc_attr( $proj['category'] ); ?>">
                        <img src="<?php echo esc_url( $proj['image'] ); ?>" alt="<?php echo esc_attr( $proj['title'] ); ?>" loading="lazy">
                        <div class="m3-project-overlay">
                            <div class="m3-project-top-tags">
                                <span class="m3-project-badge">
                                    <?php echo esc_html( $proj['cat_name'] ); ?>
                                </span>
                                <?php if ( ! empty( $proj['has_video'] ) ) : ?>
                                    <span class="m3-project-badge badge-video">▶ VIDEO INCLUDED</span>
                                <?php else : ?>
                                    <span class="m3-project-badge badge-case">CASE STUDY</span>
                                <?php endif; ?>
                            </div>

                            <div class="m3-project-meta">
                                <div class="m3-project-client"><?php echo esc_html( $proj['client'] . ' • ' . $proj['year'] ); ?></div>
                                <div style="display:flex;align-items:center;justify-content:space-between;gap:12px;">
                                    <h3 class="m3-project-title"><?php echo esc_html( $proj['title'] ); ?></h3>
                                    <span class="m3-project-arrow">VIEW PROJECT →</span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <div style="text-align:center;">
                <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>" class="m3-btn m3-btn-outline">
                    VIEW ALL WORK &amp; CASE STUDIES →
                </a>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         6. FROM THE BLOG ("LATEST INSIGHTS") — 6-Post Multi-Category Grid & Carousel (No Sidebar on Home)
         ==================================================================== -->
    <section class="m3-blog-section m3-home-blog-section" id="blog-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">LATEST INSIGHTS • STAY <span class="accent">INSPIRED</span></div>
                    <h2 class="m3-section-title">FROM THE <span class="accent">BLOG</span></h2>
                </div>

                <div class="m3-home-blog-controls">
                    <div class="m3-filter-tabs m3-blog-cat-tabs" role="tablist" aria-label="Filter Blog Categories">
                        <button type="button" class="m3-filter-btn active" data-blog-filter="all">ALL (6)</button>
                        <button type="button" class="m3-filter-btn" data-blog-filter="music-videos">MUSIC VIDEOS</button>
                        <button type="button" class="m3-filter-btn" data-blog-filter="branding">BRANDING</button>
                        <button type="button" class="m3-filter-btn" data-blog-filter="music-production">MUSIC PROD</button>
                        <button type="button" class="m3-filter-btn" data-blog-filter="artist-development">ARTIST DEV</button>
                        <button type="button" class="m3-filter-btn" data-blog-filter="cinematography">CINEMA</button>
                        <button type="button" class="m3-filter-btn" data-blog-filter="content-strategy">STRATEGY</button>
                    </div>
                    <div class="m3-carousel-nav" aria-label="Blog Carousel Controls">
                        <button type="button" class="m3-carousel-btn" id="m3-blog-prev" title="Previous Posts" aria-label="Previous Posts">◀</button>
                        <button type="button" class="m3-carousel-btn" id="m3-blog-next" title="Next Posts" aria-label="Next Posts">▶</button>
                        <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-btn m3-btn-outline m3-btn-sm">
                            ALL ARTICLES →
                        </a>
                    </div>
                </div>
            </div>

            <!-- 6-Post Symmetrical Grid / Interactive Carousel Track (No Sidebar on Home Page) -->
            <div class="m3-home-blog-showcase" id="m3-home-blog-track">
                <?php foreach ( array_slice( $blog_posts, 0, 6 ) as $post_item ) : ?>
                    <article class="m3-blog-card accent-<?php echo esc_attr( $post_item['accent'] ); ?>"
                             data-blog-category="<?php echo esc_attr( $post_item['cat_slug'] ); ?>">
                        <!-- Featured Image Header with Dark Overlay, Category Pill, Read Time & Overlaid Title -->
                        <a href="<?php echo esc_url( m3_post_url( $post_item['id'] ) ); ?>" class="m3-blog-thumb">
                            <img src="<?php echo esc_url( $post_item['image'] ); ?>" alt="<?php echo esc_attr( $post_item['title'] ); ?>" loading="lazy">
                            <div class="m3-blog-thumb-overlay">
                                <div class="m3-blog-thumb-top">
                                    <span class="m3-blog-cat-pill"><?php echo esc_html( $post_item['category'] ); ?></span>
                                    <span class="m3-blog-readtime-pill">⏱ <?php echo esc_html( $post_item['read_time'] ); ?></span>
                                </div>
                                <div class="m3-blog-thumb-bottom">
                                    <span class="m3-blog-thumb-meta"><?php echo esc_html( $post_item['date'] . ' • ' . $post_item['author'] ); ?></span>
                                    <h3 class="m3-blog-thumb-title"><?php echo esc_html( $post_item['title'] ); ?></h3>
                                </div>
                            </div>
                        </a>

                        <!-- Crisp Dark Architectural Card Body with Normal Title, Excerpt, Tags & Read Link -->
                        <div class="m3-blog-body">
                            <div>
                                <div class="m3-blog-date">
                                    <span class="cat-dot"></span>
                                    <span class="cat-text"><?php echo esc_html( $post_item['category'] ); ?></span>
                                    <span>•</span>
                                    <span><?php echo esc_html( $post_item['date'] ); ?></span>
                                    <span>•</span>
                                    <span class="read-text"><?php echo esc_html( $post_item['read_time'] ); ?></span>
                                </div>
                                <h4 class="m3-blog-title">
                                    <a href="<?php echo esc_url( m3_post_url( $post_item['id'] ) ); ?>">
                                        <?php echo esc_html( $post_item['title'] ); ?>
                                    </a>
                                </h4>
                                <p class="m3-blog-excerpt">
                                    <?php echo esc_html( $post_item['excerpt'] ); ?>
                                </p>
                            </div>

                            <div>
                                <?php if ( ! empty( $post_item['tags'] ) ) : ?>
                                    <div class="m3-blog-card-tags">
                                        <?php foreach ( array_slice( $post_item['tags'], 0, 3 ) as $tag_label ) : ?>
                                            <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&tag=' . rawurlencode( ltrim( $tag_label, '#' ) ) ); ?>" class="m3-tag-chip">
                                                <?php echo esc_html( $tag_label ); ?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="m3-blog-readmore">
                                    <a href="<?php echo esc_url( m3_post_url( $post_item['id'] ) ); ?>">READ FULL ARTICLE →</a>
                                    <span><?php echo esc_html( $post_item['read_time'] ); ?></span>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         7. TESTIMONIALS ("WHAT CLIENTS SAY" — Symmetrical 3-Column Grid)
         ==================================================================== -->
    <section class="m3-testimonials-section" id="testimonials-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">CLIENTS <span class="accent">LOVE</span></div>
                    <h2 class="m3-section-title">WHAT <span class="accent">CLIENTS</span> SAY</h2>
                </div>
            </div>

            <div class="m3-testimonials-grid">
                <?php foreach ( $testimonials as $t ) : ?>
                    <div class="m3-testimonial-card">
                        <div>
                            <div class="m3-quote-icon">
                                <span>“</span>
                                <span style="font-family:var(--m3-font-mono);font-size:0.75rem;color:var(--m3-green);letter-spacing:0.1em;">★★★★★</span>
                            </div>
                            <p class="m3-testimonial-text"><?php echo esc_html( $t['quote'] ); ?></p>
                        </div>
                        <div class="m3-client-info">
                            <img src="<?php echo esc_url( $t['avatar'] ); ?>" alt="<?php echo esc_attr( $t['name'] ); ?>" class="m3-client-avatar">
                            <div>
                                <div class="m3-client-name"><?php echo esc_html( $t['name'] ); ?></div>
                                <div class="m3-client-role"><?php echo esc_html( $t['role'] ); ?></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         8. SIMPLE PRICING ("PACKAGES THAT FIT YOUR NEEDS" — Symmetrical 3-Col Grid)
         ==================================================================== -->
    <section class="m3-pricing-section" id="pricing-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">SIMPLE <span class="accent">PRICING</span></div>
                    <h2 class="m3-section-title">PACKAGES THAT FIT <span class="accent">YOUR NEEDS</span></h2>
                </div>
                <a href="<?php echo esc_url( m3_page_url( 'pricing' ) ); ?>" class="m3-btn m3-btn-outline m3-btn-sm">
                    VIEW FULL PRICING &amp; ADD-ONS →
                </a>
            </div>

            <div class="m3-pricing-grid">
                <?php foreach ( $packages as $pkg ) : ?>
                    <div class="m3-pricing-card <?php echo $pkg['featured'] ? 'featured' : ''; ?>">
                        <?php if ( ! empty( $pkg['badge'] ) ) : ?>
                            <span class="m3-popular-badge"><?php echo esc_html( $pkg['badge'] ); ?></span>
                        <?php endif; ?>
                        <div>
                            <div class="m3-pricing-tier"><?php echo esc_html( $pkg['name'] ); ?></div>
                            <div class="m3-pricing-price">
                                <?php echo esc_html( $pkg['price'] ); ?><small><?php echo esc_html( $pkg['unit'] ); ?></small>
                            </div>
                            <ul class="m3-pricing-features">
                                <?php foreach ( $pkg['features'] as $feat ) : ?>
                                    <li>
                                        <span class="check">✓</span>
                                        <span><?php echo esc_html( $feat ); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url( m3_page_url( 'portal' ) . '&package=' . rawurlencode( $pkg['name'] ) ); ?>"
                           class="m3-btn <?php echo $pkg['featured'] ? 'm3-btn-primary' : 'm3-btn-outline'; ?>" style="width:100%;">
                            SELECT <?php echo esc_html( $pkg['name'] ); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         9. CLOSING CTA BANNER ("READY TO BRING YOUR VISION TO LIFE?")
            Single focused bottom CTA on the Home page
         ==================================================================== -->
    <?php
    $cta_accent = m3_mod( 'm3_cta_accent_color', 'purple' );
    $cta_plate  = ( 'red' === $cta_accent ) ? '/assets/images/banners/plate-cta-red.jpg' : '/assets/images/banners/plate-cta-purple.jpg';
    ?>
    <section class="m3-cta-banner accent-<?php echo esc_attr( $cta_accent ); ?>" id="cta-banner-section" style="background-image: url('<?php echo esc_url( $uri . $cta_plate ); ?>');">
        <div class="m3-container m3-cta-inner">
            <h2 class="m3-cta-title">
                <?php echo esc_html( m3_mod( 'm3_cta_title_1', 'READY TO BRING' ) ); ?><br>
                <?php echo esc_html( m3_mod( 'm3_cta_title_2', 'YOUR VISION' ) ); ?>
                <span class="accent"><?php echo esc_html( m3_mod( 'm3_cta_title_accent', 'TO LIFE?' ) ); ?></span>
            </h2>
            <p class="m3-cta-sub">
                <?php echo esc_html( m3_mod( 'm3_cta_sub', "Let's create something legendary together." ) ); ?>
            </p>
            <div style="display:flex;justify-content:center;gap:14px;flex-wrap:wrap;">
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary">
                    START YOUR PROJECT
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
