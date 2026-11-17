<?php
/**
 * Template Name: 04 Work / Portfolio Page
 * Includes: Vivid Purple "VISUALS THAT SPEAK." Banner, Category Filter Tabs
 * (All, Video, Photo, Branding, Music/Audio), and Full Symmetrical 4x2 Project Grid
 * where every project card opens its own dedicated Single Project Page (single-m3_project.php).
 *
 * @package MILEYM3DIA
 */

get_header();
$uri           = get_template_directory_uri();
$projects      = m3_get_projects_data();
$active_filter = isset( $_GET['filter'] ) ? sanitize_text_field( wp_unslash( $_GET['filter'] ) ) : 'all';
?>

<main id="primary" class="site-main">

    <!-- Purple Banner ("VISUALS THAT SPEAK. BRANDING THAT STICKS. CONTENT THAT CONNECTS.") -->
    <section class="m3-color-banner accent-purple" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-purple-visuals-speak.jpg' ); ?>');padding:68px 0;">
        <div class="m3-container" style="position:relative;z-index:2;display:grid;grid-template-columns:1.1fr 1fr 0.85fr;gap:24px;align-items:center;">
            <div>
                <span class="m3-banner-badge">MILEYM<span class="three">3</span>DIA PORTFOLIO</span>
                <h1 class="m3-banner-headline">
                    VISUALS<br>
                    THAT<br>
                    <span class="accent">SPEAK.</span>
                </h1>
                <p style="font-family:var(--m3-font-display);font-size:0.9rem;letter-spacing:0.08em;text-transform:uppercase;margin-bottom:18px;">
                    BRANDING THAT STICKS.<br>CONTENT THAT CONNECTS.
                </p>
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-outline-accent m3-btn-sm">
                    WORK WITH US
                </a>
            </div>
            <div></div>
            <div style="text-align:right;">
                <div style="display:inline-block;text-align:left;background:rgba(8,6,14,0.86);border:1px solid rgba(157,78,221,0.45);padding:20px 24px;border-radius:2px;">
                    <div style="font-family:var(--m3-font-display);font-size:1.3rem;font-weight:700;text-transform:uppercase;line-height:1.25;">
                        HIGH QUALITY<br>
                        <span style="color:var(--m3-accent);">VISUALS.</span><br>
                        REAL RESULTS.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid with Category Filters (Symmetrical 4x2 Grid Opening Dedicated Project Pages) -->
    <section class="m3-projects-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">04 • SELECTED WORK</div>
                    <h2 class="m3-section-title">ALL <span class="accent">PROJECTS</span></h2>
                </div>

                <div class="m3-filter-tabs" role="tablist">
                    <button type="button" class="m3-filter-btn <?php echo ( 'all' === $active_filter ) ? 'active' : ''; ?>" data-filter="all">ALL PROJECTS</button>
                    <button type="button" class="m3-filter-btn <?php echo ( 'web' === $active_filter ) ? 'active' : ''; ?>" data-filter="web">WEB DEV</button>
                    <button type="button" class="m3-filter-btn <?php echo ( 'video' === $active_filter ) ? 'active' : ''; ?>" data-filter="video">VIDEO PROJECTS</button>
                    <button type="button" class="m3-filter-btn <?php echo ( 'photo' === $active_filter ) ? 'active' : ''; ?>" data-filter="photo">PHOTO PROJECTS</button>
                    <button type="button" class="m3-filter-btn <?php echo ( 'branding' === $active_filter ) ? 'active' : ''; ?>" data-filter="branding">BRANDING PROJECTS</button>
                    <button type="button" class="m3-filter-btn <?php echo ( 'music' === $active_filter ) ? 'active' : ''; ?>" data-filter="music">MUSIC / AUDIO</button>
                </div>
            </div>

            <div class="m3-projects-grid grid-large">
                <?php foreach ( $projects as $proj ) :
                    $hidden = ( 'all' !== $active_filter && $proj['category'] !== $active_filter ) ? 'display:none;' : '';
                    ?>
                    <a href="<?php echo esc_url( m3_project_url( $proj['id'] ) ); ?>"
                       class="m3-project-card"
                       style="<?php echo esc_attr( $hidden ); ?>"
                       data-category="<?php echo esc_attr( $proj['category'] ); ?>">
                        <img src="<?php echo esc_url( $proj['image'] ); ?>" alt="<?php echo esc_attr( $proj['title'] ); ?>">
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
                                <h3 class="m3-project-title" style="font-size:1.05rem;margin-bottom:6px;"><?php echo esc_html( $proj['title'] ); ?></h3>
                                <p style="font-size:0.78rem;color:var(--m3-text-muted);margin-bottom:10px;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                    <?php echo esc_html( $proj['summary'] ); ?>
                                </p>
                                <div style="display:flex;align-items:center;justify-content:space-between;padding-top:8px;border-top:1px solid rgba(255,255,255,0.12);">
                                    <span class="m3-project-arrow">OPEN PROJECT PAGE →</span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Closing CTA Banner -->
    <section class="m3-cta-banner accent-red" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-cta-red.jpg' ); ?>');">
        <div class="m3-container m3-cta-inner">
            <h2 class="m3-cta-title">
                READY TO BRING<br>
                YOUR VISION <span class="accent">TO LIFE?</span>
            </h2>
            <p class="m3-cta-sub">Let's create something legendary together.</p>
            <div style="display:flex;justify-content:center;gap:14px;flex-wrap:wrap;">
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary">START YOUR PROJECT</a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
