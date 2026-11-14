<?php
/**
 * Template Name: 05 Blog / Insights Grid (home.php)
 * Features a 2-column layout with main articles on the left and a Right-Sided Blog Sidebar (sidebar.php).
 *
 * @package MILEYM3DIA
 */

get_header();
$uri        = get_template_directory_uri();
$blog_posts = m3_get_blog_posts_data();
?>

<main id="primary" class="site-main">

    <!-- Blog Hero Header -->
    <section class="m3-color-banner accent-blue" style="background-image: url('<?php echo esc_url( $uri . '/assets/images/banners/plate-blue-your-vision.jpg' ); ?>');padding:64px 0;">
        <div class="m3-container" style="position:relative;z-index:2;">
            <span class="m3-banner-badge">05 • BLOG &amp; INSIGHTS</span>
            <h1 class="m3-banner-headline">
                TIPS, TRENDS &amp;<br>
                <span class="accent">BEHIND THE SCENES</span>
            </h1>
            <p style="color:var(--m3-text-muted);max-width:540px;">
                Deep dives into music video direction, audio mixing, brand strategy, and digital media production from the MILEYM3DIA studio team.
            </p>
        </div>
    </section>

    <!-- Blog Grid + Right-Sided Sidebar -->
    <section class="m3-blog-section">
        <div class="m3-container">
            <div class="m3-blog-with-sidebar">
                <div class="m3-blog-main-grid">
                    <?php foreach ( $blog_posts as $post_item ) : ?>
                        <article class="m3-blog-card">
                            <a href="<?php echo esc_url( m3_page_url( 'single' ) . '&post_id=' . $post_item['id'] ); ?>" class="m3-blog-thumb">
                                <img src="<?php echo esc_url( $post_item['image'] ); ?>" alt="<?php echo esc_attr( $post_item['title'] ); ?>">
                            </a>
                            <div class="m3-blog-body">
                                <div>
                                    <div class="m3-blog-date">
                                        <span style="color:var(--m3-red);"><?php echo esc_html( $post_item['category'] ); ?></span> • <?php echo esc_html( $post_item['date'] ); ?>
                                    </div>
                                    <h2 class="m3-blog-title" style="margin-bottom:10px;">
                                        <a href="<?php echo esc_url( m3_page_url( 'single' ) . '&post_id=' . $post_item['id'] ); ?>">
                                            <?php echo esc_html( $post_item['title'] ); ?>
                                        </a>
                                    </h2>
                                    <p style="font-size:0.86rem;color:var(--m3-text-muted);line-height:1.6;">
                                        <?php echo esc_html( $post_item['excerpt'] ); ?>
                                    </p>
                                </div>
                                <div class="m3-blog-readmore">
                                    <a href="<?php echo esc_url( m3_page_url( 'single' ) . '&post_id=' . $post_item['id'] ); ?>">READ FULL ARTICLE →</a>
                                    <span><?php echo esc_html( $post_item['read_time'] ); ?></span>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <!-- Right-Sided Blog Sidebar -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
