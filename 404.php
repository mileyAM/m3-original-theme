<?php
/**
 * 07. 404 Page (Not Found) Template
 *
 * @package MILEYM3DIA
 */

get_header();
$uri = get_template_directory_uri();
?>

<main id="primary" class="site-main">
    <section class="m3-hero" style="min-height:560px;background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-vision-meets-execution.jpg' ); ?>');justify-content:center;text-align:center;">
        <div class="m3-container" style="position:relative;z-index:2;max-width:640px;">
            <span class="m3-banner-badge">ERROR 404 • SCENE NOT FOUND</span>
            <h1 class="m3-hero-title" style="font-size:clamp(4rem, 9vw, 7rem);margin-bottom:8px;">
                4<span style="color:var(--m3-red);">0</span>4
            </h1>
            <h2 class="m3-section-title" style="margin-bottom:14px;">LOST IN THE <span class="accent">EDIT SUITE.</span></h2>
            <p style="color:var(--m3-text-muted);margin-bottom:28px;">
                The page or project reel you're looking for may have been moved, renamed, or archived. Let's get you back on set.
            </p>
            <div style="display:flex;justify-content:center;gap:14px;flex-wrap:wrap;">
                <a href="<?php echo esc_url( m3_page_url( 'home' ) ); ?>" class="m3-btn m3-btn-primary">BACK TO HOME</a>
                <a href="<?php echo esc_url( m3_page_url( 'work' ) ); ?>" class="m3-btn m3-btn-outline">VIEW PORTFOLIO</a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
