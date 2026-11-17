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

    <!-- 3. Master Royal Blue Banner ("YOUR VISION. OUR CREATION. LIMITLESS POSSIBILITIES.")
         Full uncropped banner with clickable [LET'S BRING YOUR VISION TO LIFE] button and checklist overlay -->
    <?php m3_render_master_banner( 'blue' ); ?>

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

    <!-- 5. Studio Gear & Software Stack Strip -->
    <section class="m3-gear-section" id="gear-stack">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">04 • PRODUCTION ARSENAL</div>
                    <h2 class="m3-section-title">STUDIO GEAR &amp; <span class="accent">SOFTWARE STACK</span></h2>
                </div>
                <a href="<?php echo esc_url( m3_page_url( 'services' ) ); ?>" class="m3-btn m3-btn-outline m3-btn-sm">
                    EXPLORE CAPABILITIES →
                </a>
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
