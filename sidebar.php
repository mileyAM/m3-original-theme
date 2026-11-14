<?php
/**
 * Right-Sided Blog Sidebar Template (sidebar.php)
 * Registered as a WordPress Widget Area ('m3-blog-sidebar') with clean, symmetrical M3 widgets.
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$blog_posts = m3_get_blog_posts_data();
?>

<aside id="secondary" class="m3-blog-sidebar" aria-label="Blog Right Sidebar">

    <?php if ( function_exists( 'is_active_sidebar' ) && is_active_sidebar( 'm3-blog-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'm3-blog-sidebar' ); ?>
    <?php else : ?>

        <!-- Widget 1: Search Blog -->
        <div class="m3-sidebar-widget">
            <h3 class="m3-widget-title">SEARCH INSIGHTS</h3>
            <form method="get" action="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-sidebar-search">
                <input type="hidden" name="page" value="blog">
                <input type="search" name="s" class="m3-input" placeholder="Search articles, tips, gear..." value="<?php echo isset( $_GET['s'] ) ? esc_attr( sanitize_text_field( wp_unslash( $_GET['s'] ) ) ) : ''; ?>">
                <button type="submit" class="m3-btn m3-btn-primary m3-btn-sm">GO</button>
            </form>
        </div>

        <!-- Widget 2: Categories -->
        <div class="m3-sidebar-widget">
            <h3 class="m3-widget-title">CATEGORIES</h3>
            <ul class="m3-widget-cats">
                <li>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>?cat=production">
                        <span>Music Video Production</span>
                        <span class="count">08</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>?cat=music">
                        <span>Music Production &amp; Mixing</span>
                        <span class="count">06</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>?cat=artist">
                        <span>Artist Development</span>
                        <span class="count">05</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>?cat=branding">
                        <span>Branding &amp; Visual Identity</span>
                        <span class="count">07</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>?cat=gear">
                        <span>Cinema Gear &amp; Color Grading</span>
                        <span class="count">04</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Widget 3: Recent Articles -->
        <div class="m3-sidebar-widget">
            <h3 class="m3-widget-title">RECENT ARTICLES</h3>
            <div class="m3-widget-posts">
                <?php foreach ( array_slice( $blog_posts, 0, 3 ) as $rp ) : ?>
                    <a href="<?php echo esc_url( m3_page_url( 'single' ) . '&post_id=' . $rp['id'] ); ?>" class="m3-widget-post-item">
                        <img src="<?php echo esc_url( $rp['image'] ); ?>" alt="<?php echo esc_attr( $rp['title'] ); ?>">
                        <div>
                            <span class="date"><?php echo esc_html( $rp['date'] ); ?></span>
                            <h4><?php echo esc_html( $rp['title'] ); ?></h4>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Widget 4: Studio Topics / Tags -->
        <div class="m3-sidebar-widget">
            <h3 class="m3-widget-title">STUDIO TAGS</h3>
            <div class="m3-widget-tags">
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#REDCinema</a>
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#MusicProduction</a>
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#ArtistDev</a>
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#Branding</a>
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#DolbyAtmos</a>
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#ColorGrading</a>
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>">#DirectorNotes</a>
            </div>
        </div>

    <?php endif; ?>

</aside>
