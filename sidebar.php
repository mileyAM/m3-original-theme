<?php
/**
 * Right-Sided Blog Sidebar Template (sidebar.php)
 * Displayed on the Main Blog Page (home.php) and Single Blog Post Page (single.php).
 * Features dark architectural cards with M3 multi-color top accent borders (Red, Blue, Green, Purple).
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$blog_posts = m3_get_blog_posts_data();
$categories = m3_get_blog_categories();
?>

<aside id="secondary" class="m3-blog-sidebar" aria-label="Blog Right Sidebar">

    <?php if ( function_exists( 'is_active_sidebar' ) && is_active_sidebar( 'm3-blog-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'm3-blog-sidebar' ); ?>
    <?php else : ?>

        <!-- Widget 1: Search Blog (Crimson Red Top Border) -->
        <div class="m3-sidebar-widget accent-red">
            <h3 class="m3-widget-title">SEARCH INSIGHTS</h3>
            <form method="get" action="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-sidebar-search">
                <input type="hidden" name="page" value="blog">
                <input type="search" name="s" class="m3-input" placeholder="Search articles, tips, gear..." value="<?php echo isset( $_GET['s'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_GET['s'] ) ) ) : ''; ?>">
                <button type="submit" class="m3-btn m3-btn-primary m3-btn-sm">GO</button>
            </form>
        </div>

        <!-- Widget 2: Categories with Accent Color Indicators (Electric Blue Top Border) -->
        <div class="m3-sidebar-widget accent-blue">
            <h3 class="m3-widget-title">STUDIO CATEGORIES</h3>
            <ul class="m3-widget-cats">
                <?php foreach ( $categories as $cat ) : ?>
                    <li>
                        <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&cat=' . rawurlencode( $cat['slug'] ) ); ?>"
                           class="accent-<?php echo esc_attr( $cat['accent'] ); ?>">
                            <span style="display:inline-flex;align-items:center;gap:8px;">
                                <span class="cat-dot"></span>
                                <?php echo esc_html( $cat['name'] ); ?>
                            </span>
                            <span class="count"><?php echo esc_html( $cat['count'] ); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Widget 3: Recent Articles with Read Time (Neon Green Top Border) -->
        <div class="m3-sidebar-widget accent-green">
            <h3 class="m3-widget-title">RECENT ARTICLES</h3>
            <div class="m3-widget-posts">
                <?php foreach ( array_slice( $blog_posts, 0, 4 ) as $rp ) : ?>
                    <a href="<?php echo esc_url( m3_post_url( $rp['id'] ) ); ?>" class="m3-widget-post-item">
                        <img src="<?php echo esc_url( $rp['image'] ); ?>" alt="<?php echo esc_attr( $rp['title'] ); ?>">
                        <div>
                            <span class="date"><?php echo esc_html( $rp['category'] . ' • ' . $rp['read_time'] ); ?></span>
                            <h4><?php echo esc_html( $rp['title'] ); ?></h4>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Widget 4: Studio Topics / Tags (Vivid Purple Top Border) -->
        <div class="m3-sidebar-widget accent-purple">
            <h3 class="m3-widget-title">POPULAR TAGS</h3>
            <div class="m3-widget-tags">
                <?php
                $all_tags = array( '#REDCinema', '#MusicVideos', '#BrandIdentity', '#MusicProduction', '#DolbyAtmos', '#ArtistDev', '#EPK', '#ColorGrading', '#Anamorphic', '#ContentStrategy' );
                foreach ( $all_tags as $tag_item ) :
                    ?>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&tag=' . rawurlencode( ltrim( $tag_item, '#' ) ) ); ?>" class="m3-tag-chip">
                        <?php echo esc_html( $tag_item ); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Widget 5: Studio Booking Callout (Crimson Red Top Border) -->
        <div class="m3-sidebar-widget accent-red" style="background:linear-gradient(180deg, rgba(229,25,35,0.12) 0%, #101016 100%);">
            <div style="font-family:var(--m3-font-mono);font-size:0.68rem;letter-spacing:0.12em;color:var(--m3-green);margin-bottom:6px;">
                M3 PRODUCTION COLLECTIVE
            </div>
            <h3 style="font-family:var(--m3-font-display);font-size:1.15rem;text-transform:uppercase;margin-bottom:8px;">
                NEED VISUALS OR STUDIO PRODUCTION?
            </h3>
            <p style="font-size:0.82rem;color:var(--m3-text-muted);line-height:1.55;margin-bottom:14px;">
                Book 8K music video shoots, brand campaigns, or studio mixing &amp; mastering directly with our team.
            </p>
            <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary m3-btn-sm" style="width:100%;">
                BOOK A STUDIO SESSION →
            </a>
        </div>

    <?php endif; ?>

</aside>
