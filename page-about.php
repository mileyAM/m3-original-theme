<?php
/**
 * Template Name: 02 About Us Page
 * Includes: Our Story with High-Res Studio Plates, Contrasting Electric Blue Mission & Stats,
 * Electric Blue Banner, and Studio Leadership Team.
 *
 * @package MILEYM3DIA
 */

get_header();
$uri = get_template_directory_uri();
?>

<main id="primary" class="site-main">

    <!-- 1. Our Story Section (High-Res Studio Plates with Straight Symmetrical Borders) -->
    <section class="m3-about-split" id="story" style="padding-top:76px;">
        <div class="m3-container m3-about-grid">
            <div class="m3-about-visual-left">
                <img src="<?php echo esc_url( $uri . '/assets/images/sections/about-hoodie-graphic.jpg' ); ?>" alt="MILEYM3DIA Studio Production & Visual Identity">
            </div>

            <div class="m3-about-copy">
                <div class="m3-eyebrow">01 • OUR <span class="accent">STORY</span></div>
                <h1 class="m3-section-title">
                    BORN IN THE STUDIO.<br>
                    BUILT FOR <span class="accent">IMPACT.</span>
                </h1>
                <p>
                    Founded with a singular vision—to merge cinema-grade visual production with authentic music production and artist development—<strong>MILEYM3DIA (M3)</strong> has grown into a full-scale creative powerhouse in Los Angeles.
                </p>
                <p>
                    Whether we're engineering custom records, developing a breakthrough artist's visual identity, or directing high-conversion brand commercials, every frame and frequency is crafted to leave a lasting cultural footprint.
                </p>
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary m3-btn-sm">WORK WITH M3</a>
            </div>

            <div class="m3-about-visual-right">
                <img src="<?php echo esc_url( $uri . '/assets/images/sections/about-camera-collage.jpg' ); ?>" alt="MILEYM3DIA Film & Studio Set">
            </div>
        </div>
    </section>

    <!-- 2. Mission & Values + Stats (Contrasting Carbon & Electric Blue Palette) -->
    <section class="m3-mission-stats accent-blue" id="mission">
        <div class="m3-container m3-mission-grid">
            <div class="m3-mission-copy">
                <div class="m3-eyebrow">02 • MISSION &amp; <span class="accent">VALUES</span></div>
                <h2 class="m3-section-title">
                    VISION MEETS<br>
                    <span class="accent">EXECUTION</span>
                </h2>
                <p>
                    We believe great art and great business go hand in hand. Our core values—<strong>Relentless Originality</strong>, <strong>Cinema &amp; Sonic Precision</strong>, and <strong>Fast Turnaround</strong>—guide every project from concept to release.
                </p>
            </div>

            <div class="m3-stats-row">
                <div class="m3-stat-box stat-blue">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'clock' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_1_num', '150+' ) ); ?></div>
                    <div class="m3-stat-label">PROJECTS COMPLETED</div>
                </div>
                <div class="m3-stat-box stat-green">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'smile' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_2_num', '100+' ) ); ?></div>
                    <div class="m3-stat-label">HAPPY CLIENTS</div>
                </div>
                <div class="m3-stat-box stat-blue">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'award' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_3_num', '5+' ) ); ?></div>
                    <div class="m3-stat-label">YEARS OF EXPERIENCE</div>
                </div>
                <div class="m3-stat-box stat-green">
                    <div class="m3-stat-icon"><?php echo m3_get_svg_icon( 'eye' ); ?></div>
                    <div class="m3-stat-num"><?php echo esc_html( m3_mod( 'm3_stat_4_num', '10M+' ) ); ?></div>
                    <div class="m3-stat-label">VIEWS GENERATED</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Electric Blue Banner ("YOUR VISION. OUR CREATION. WHY WORK WITH US?") -->
    <section class="m3-color-banner accent-blue" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-blue-your-vision.jpg' ); ?>');">
        <div class="m3-container" style="position:relative;z-index:2;display:grid;grid-template-columns:1.25fr 0.75fr 1fr;gap:24px;align-items:center;">
            <div>
                <span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA</span>
                <h2 class="m3-banner-headline">
                    YOUR VISION.<br>
                    OUR <span class="accent">CREATION.</span>
                </h2>
                <div style="font-family:var(--m3-font-wide);font-size:1.15rem;font-weight:700;letter-spacing:0.06em;text-transform:uppercase;margin-bottom:10px;">
                    LIMITLESS POSSIBILITIES.
                </div>
                <p style="font-family:var(--m3-font-mono);font-size:0.72rem;letter-spacing:0.1em;color:var(--m3-text-muted);margin-bottom:18px;">
                    PHOTOGRAPHY • VIDEO PRODUCTION • BRANDING • MUSIC PRODUCTION
                </p>
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-outline-accent m3-btn-sm">
                    LET'S BRING YOUR VISION TO LIFE.
                </a>
            </div>
            <div></div>
            <div style="background:rgba(5,8,16,0.88);border:1px solid rgba(0,136,255,0.42);padding:24px;border-radius:2px;">
                <h3 style="font-family:var(--m3-font-display);font-size:1.05rem;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:10px;">
                    WHY WORK WITH US?
                </h3>
                <ul class="m3-banner-checklist">
                    <li><?php echo m3_get_svg_icon( 'check' ); ?> CREATIVE &amp; STRATEGIC APPROACH</li>
                    <li><?php echo m3_get_svg_icon( 'check' ); ?> HIGH QUALITY &amp; PROFESSIONAL</li>
                    <li><?php echo m3_get_svg_icon( 'check' ); ?> FAST TURNAROUND</li>
                    <li><?php echo m3_get_svg_icon( 'check' ); ?> 100% SATISFACTION</li>
                </ul>
                <div class="m3-script-text" style="color:var(--m3-accent);font-size:1.85rem;margin-top:8px;">
                    Let's Create Greatness.
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Creative Leadership & Studio Team (Crisp High-Res Studio Imagery) -->
    <section class="m3-services-section" id="team">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">03 • THE COLLECTIVE</div>
                    <h2 class="m3-section-title">MEET THE <span class="accent">M3 TEAM</span></h2>
                </div>
            </div>

            <div class="m3-pricing-grid">
                <div class="m3-testimonial-card" style="text-align:center;align-items:center;">
                    <img src="<?php echo esc_url( $uri . '/assets/images/blog/blog-1-music-videos.jpg' ); ?>" alt="Miley - Founder & Executive Director" style="width:100%;height:240px;object-fit:cover;border-radius:2px;margin-bottom:18px;border:1px solid var(--m3-border-strong);">
                    <h3 class="m3-service-title" style="font-size:1.25rem;">MILEY (M3)</h3>
                    <span style="font-family:var(--m3-font-mono);font-size:0.74rem;color:var(--m3-red);letter-spacing:0.12em;text-transform:uppercase;margin-bottom:10px;">FOUNDER • EXECUTIVE PRODUCER &amp; DIRECTOR</span>
                    <p class="m3-service-desc">Lead visual director, music producer, and brand architect overseeing all M3 creative productions and artist development rollouts.</p>
                </div>

                <div class="m3-testimonial-card" style="text-align:center;align-items:center;">
                    <img src="<?php echo esc_url( $uri . '/assets/images/projects/project-7-music-production.jpg' ); ?>" alt="Lead Audio & Mixing Engineer" style="width:100%;height:240px;object-fit:cover;border-radius:2px;margin-bottom:18px;border:1px solid var(--m3-border-strong);">
                    <h3 class="m3-service-title" style="font-size:1.25rem;">MARCUS VANCE</h3>
                    <span style="font-family:var(--m3-font-mono);font-size:0.74rem;color:var(--m3-blue);letter-spacing:0.12em;text-transform:uppercase;margin-bottom:10px;">HEAD OF MUSIC PRODUCTION &amp; SOUND</span>
                    <p class="m3-service-desc">Multi-platinum mixing engineer and beatmaker specializing in custom instrumentation, vocal production, and cinematic sound design.</p>
                </div>

                <div class="m3-testimonial-card" style="text-align:center;align-items:center;">
                    <img src="<?php echo esc_url( $uri . '/assets/images/blog/blog-3-visual-storytelling.jpg' ); ?>" alt="Director of Photography & Colorist" style="width:100%;height:240px;object-fit:cover;border-radius:2px;margin-bottom:18px;border:1px solid var(--m3-border-strong);">
                    <h3 class="m3-service-title" style="font-size:1.25rem;">DEVON BROOKS</h3>
                    <span style="font-family:var(--m3-font-mono);font-size:0.74rem;color:var(--m3-green);letter-spacing:0.12em;text-transform:uppercase;margin-bottom:10px;">DIRECTOR OF PHOTOGRAPHY &amp; COLORIST</span>
                    <p class="m3-service-desc">RED &amp; ARRI certified cinematographer and DaVinci Resolve colorist crafting signature dark, high-contrast M3 visuals.</p>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
