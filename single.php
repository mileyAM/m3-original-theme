<?php
/**
 * Single Blog Post Template (single.php)
 * Features main article content on the left and the Right-Sided Blog Sidebar (sidebar.php) on the right.
 *
 * @package MILEYM3DIA
 */

get_header();
$blog_posts = m3_get_blog_posts_data();
$req_id     = isset( $_GET['post_id'] ) ? intval( $_GET['post_id'] ) : 301;
$current    = $blog_posts[0];
foreach ( $blog_posts as $item ) {
    if ( intval( $item['id'] ) === $req_id ) {
        $current = $item;
        break;
    }
}
?>

<main id="primary" class="site-main">
    <section class="m3-blog-section" style="padding:64px 0;">
        <div class="m3-container">
            <div class="m3-blog-with-sidebar">
                <article class="m3-single-post-article">
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-back-link" style="display:inline-block;margin-bottom:18px;">
                        ← BACK TO BLOG / INSIGHTS
                    </a>

                    <div class="m3-blog-date" style="font-size:0.8rem;margin-bottom:8px;">
                        <span style="color:var(--m3-red);"><?php echo esc_html( $current['category'] ); ?></span> • <?php echo esc_html( $current['date'] ); ?> • <?php echo esc_html( $current['read_time'] ); ?>
                    </div>

                    <h1 class="m3-section-title" style="margin-bottom:24px;">
                        <?php echo esc_html( $current['title'] ); ?>
                    </h1>

                    <div style="border-radius:2px;overflow:hidden;border:1px solid var(--m3-border-strong);margin-bottom:32px;aspect-ratio:16/9;">
                        <img src="<?php echo esc_url( $current['image'] ); ?>" alt="<?php echo esc_attr( $current['title'] ); ?>" style="width:100%;height:100%;object-fit:cover;">
                    </div>

                    <div style="font-size:1.04rem;line-height:1.8;color:rgba(255,255,255,0.88);display:grid;gap:18px;">
                        <?php echo wp_kses_post( $current['content'] ); ?>
                    </div>

                    <div style="margin-top:44px;padding:28px;background:var(--m3-bg-card);border:1px solid var(--m3-border-strong);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:16px;">
                        <div>
                            <div style="font-family:var(--m3-font-display);font-size:1.1rem;text-transform:uppercase;">READY TO SHOOT OR PRODUCE YOUR NEXT PROJECT?</div>
                            <p style="font-size:0.86rem;color:var(--m3-text-muted);">Partner with MILEYM3DIA for music videos, audio production, and brand rollouts.</p>
                        </div>
                        <a href="<?php echo esc_url( m3_page_url( 'contact' ) ); ?>" class="m3-btn m3-btn-primary">START YOUR PROJECT</a>
                    </div>
                </article>

                <!-- Right-Sided Blog Sidebar -->
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
