<?php
/**
 * Single Portfolio Project Template (single-m3_project.php)
 * Every project opens to its own dedicated page with the exact same symmetrical layout,
 * and automatically renders an interactive embedded video section when a Video URL is provided in WP Admin.
 *
 * @package MILEYM3DIA
 */

get_header();

$projects   = m3_get_projects_data();
$req_id     = isset( $_GET['project_id'] ) ? intval( $_GET['project_id'] ) : 201;
$current    = $projects[0];
$curr_index = 0;

foreach ( $projects as $idx => $item ) {
    if ( intval( $item['id'] ) === $req_id ) {
        $current    = $item;
        $curr_index = $idx;
        break;
    }
}

$prev_proj = $projects[ ( $curr_index - 1 + count( $projects ) ) % count( $projects ) ];
$next_proj = $projects[ ( $curr_index + 1 ) % count( $projects ) ];
?>

<main id="primary" class="site-main">

    <!-- 1. Project Header & Symmetrical 4-Column Spec Bar -->
    <section class="m3-project-single-header">
        <div class="m3-container">
            <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-bottom:20px;">
                <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>" class="m3-back-link">
                    ← BACK TO ALL WORK / PORTFOLIO
                </a>
                <span class="m3-banner-badge" style="margin-bottom:0;">
                    <?php echo esc_html( $current['cat_name'] ); ?>
                </span>
            </div>

            <h1 class="m3-section-title" style="font-size:clamp(2.2rem, 4.4vw, 3.5rem);margin-bottom:14px;">
                <?php echo esc_html( $current['title'] ); ?>
            </h1>
            <p style="color:var(--m3-text-muted);font-size:1.04rem;max-width:780px;margin-bottom:32px;">
                <?php echo esc_html( $current['summary'] ); ?>
            </p>

            <!-- Symmetrical 4-Column Spec Grid -->
            <div class="m3-spec-grid">
                <div class="m3-spec-cell">
                    <span class="m3-spec-label">01 / CLIENT &amp; PARTNER</span>
                    <strong class="m3-spec-val"><?php echo esc_html( $current['client'] ); ?></strong>
                </div>
                <div class="m3-spec-cell">
                    <span class="m3-spec-label">02 / DISCIPLINE</span>
                    <strong class="m3-spec-val"><?php echo esc_html( $current['cat_name'] ); ?></strong>
                </div>
                <div class="m3-spec-cell">
                    <span class="m3-spec-label">03 / RELEASE YEAR</span>
                    <strong class="m3-spec-val"><?php echo esc_html( $current['year'] ); ?></strong>
                </div>
                <div class="m3-spec-cell">
                    <span class="m3-spec-label">04 / DELIVERABLES</span>
                    <strong class="m3-spec-val"><?php echo esc_html( $current['deliverables'] ); ?></strong>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Primary Media Showcase (Video Player if project has video, or High-Res Key Visual if Photo/Branding) -->
    <section class="m3-project-single-media">
        <div class="m3-container">
            <?php if ( ! empty( $current['has_video'] ) ) : ?>
                <div class="m3-video-stage" id="project-video-stage">
                    <div class="m3-video-stage-bar">
                        <span>● <?php echo esc_html( $current['video_label'] ?: 'PROJECT VIDEO MASTER' ); ?></span>
                        <span style="color:var(--m3-text-dim);">4K UHD • STEREO / ATMOS</span>
                    </div>
                    <div class="m3-video-frame" id="m3-inline-video-container">
                        <img src="<?php echo esc_url( $current['image'] ); ?>" alt="<?php echo esc_attr( $current['title'] ); ?>" class="m3-video-poster">
                        <div class="m3-video-overlay-trigger" id="m3-play-inline-video" data-video-src="<?php echo esc_url( $current['video_url'] ); ?>">
                            <button type="button" class="m3-video-play-btn" aria-label="Play Project Video">
                                <?php echo m3_get_svg_icon( 'play' ); ?>
                                <span>WATCH PROJECT VIDEO</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="m3-video-stage">
                    <div class="m3-video-stage-bar">
                        <span>◆ KEY VISUAL SHOWCASE — <?php echo esc_html( $current['cat_name'] ); ?></span>
                        <span style="color:var(--m3-text-dim);">HIGH-RESOLUTION STUDIO MASTER</span>
                    </div>
                    <div class="m3-video-frame">
                        <img src="<?php echo esc_url( $current['image'] ); ?>" alt="<?php echo esc_attr( $current['title'] ); ?>" class="m3-video-poster">
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- 3. Symmetrical 2-Column Case Study Story (The Challenge & The Execution) -->
    <section class="m3-project-story-section">
        <div class="m3-container">
            <div class="m3-story-grid">
                <div class="m3-story-box">
                    <div class="m3-eyebrow">01 • THE BRIEF</div>
                    <h2 class="m3-service-title" style="font-size:1.35rem;margin-bottom:12px;">THE CHALLENGE &amp; VISION</h2>
                    <p style="color:var(--m3-text-muted);line-height:1.75;">
                        <?php echo esc_html( $current['challenge'] ); ?>
                    </p>
                </div>
                <div class="m3-story-box">
                    <div class="m3-eyebrow">02 • STUDIO PRODUCTION</div>
                    <h2 class="m3-service-title" style="font-size:1.35rem;margin-bottom:12px;">THE M3 EXECUTION &amp; IMPACT</h2>
                    <p style="color:var(--m3-text-muted);line-height:1.75;">
                        <?php echo esc_html( $current['execution'] ); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Symmetrical 3-Column Project Stills / Gallery -->
    <section class="m3-project-gallery-section">
        <div class="m3-container">
            <div class="m3-section-header" style="margin-bottom:24px;">
                <div>
                    <div class="m3-eyebrow">VISUAL BREAKDOWN</div>
                    <h2 class="m3-section-title" style="font-size:1.9rem;">PROJECT <span class="accent">GALLERY &amp; STILLS</span></h2>
                </div>
            </div>

            <div class="m3-gallery-grid">
                <?php foreach ( $current['gallery'] as $idx => $gal_img ) : ?>
                    <div class="m3-gallery-item">
                        <img src="<?php echo esc_url( $gal_img ); ?>" alt="<?php echo esc_attr( $current['title'] . ' Still ' . ( $idx + 1 ) ); ?>">
                        <div class="m3-gallery-caption">
                            <span>FRAME 0<?php echo intval( $idx + 1 ); ?></span>
                            <span><?php echo esc_html( $current['cat_name'] ); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 5. Symmetrical Next / Previous Project Navigation Bar -->
    <section class="m3-project-nav-bar">
        <div class="m3-container">
            <div class="m3-project-nav-grid">
                <a href="<?php echo esc_url( m3_project_url( $prev_proj['id'] ) ); ?>" class="m3-project-nav-cell">
                    <span class="m3-spec-label">← PREVIOUS PROJECT</span>
                    <strong class="m3-spec-val"><?php echo esc_html( $prev_proj['title'] ); ?></strong>
                </a>
                <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-project-nav-cell center-cta">
                    <span class="m3-spec-label">READY TO BUILD YOURS?</span>
                    <strong class="m3-spec-val" style="color:var(--m3-red);">BOOK THIS PRODUCTION STYLE →</strong>
                </a>
                <a href="<?php echo esc_url( m3_project_url( $next_proj['id'] ) ); ?>" class="m3-project-nav-cell" style="text-align:right;">
                    <span class="m3-spec-label">NEXT PROJECT →</span>
                    <strong class="m3-spec-val"><?php echo esc_html( $next_proj['title'] ); ?></strong>
                </a>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
