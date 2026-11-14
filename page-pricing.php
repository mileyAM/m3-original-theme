<?php
/**
 * Template Name: Pricing & Packages Page
 *
 * @package MILEYM3DIA
 */

get_header();
$uri      = get_template_directory_uri();
$packages = m3_get_packages_data();
?>

<main id="primary" class="site-main">

    <!-- Sliced Red Banner ("WE DON'T JUST CREATE. WE BRING IT TO LIFE.") -->
    <section class="m3-sliced-banner-wrap">
        <img src="<?php echo esc_url( $uri . '/assets/images/banners/banner-red-bring-to-life.jpg' ); ?>" alt="MILEYM3DIA Red Studio Banner">
    </section>

    <section class="m3-pricing-section">
        <div class="m3-container">
            <div class="m3-section-header">
                <div>
                    <div class="m3-eyebrow">SIMPLE PRICING • STUDIO PACKAGES</div>
                    <h1 class="m3-section-title">PACKAGES THAT FIT <span class="accent">YOUR NEEDS</span></h1>
                </div>
                <div class="m3-promo-code-pill" data-copy-code="M3FIRST10">
                    <span>10% OFF FIRST PROJECT: <strong>M3FIRST10</strong></span>
                    <span class="copy-feedback" style="font-size:0.7rem;">[COPY]</span>
                </div>
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
                                    <li><span class="check">✓</span><span><?php echo esc_html( $feat ); ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <a href="<?php echo esc_url( m3_page_url( 'portal' ) . '?package=' . rawurlencode( $pkg['name'] ) ); ?>"
                           class="m3-btn <?php echo $pkg['featured'] ? 'm3-btn-primary' : 'm3-btn-outline'; ?>" style="width:100%;">
                            BOOK <?php echo esc_html( $pkg['name'] ); ?> PACKAGE
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
