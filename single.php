<?php
/**
 * Single Blog Post Template (single.php)
 * Features:
 * - Post Featured Image as the Full-Width Hero Header with Dark Overlay (showing Category, Read Time, Date, Title & Tags)
 * - Normal Blog Article layout on the left (Title, Meta Bar, Featured Image Frame, Content, Tags, Prev/Next Nav)
 * - Right-Sided Blog Sidebar (sidebar.php) on the right
 *
 * @package MILEYM3DIA
 */

get_header();
$blog_posts = m3_get_blog_posts_data();
$req_id     = isset( $_GET['post_id'] ) ? intval( $_GET['post_id'] ) : 301;
$current    = $blog_posts[0];
$curr_index = 0;

foreach ( $blog_posts as $idx => $item ) {
    if ( intval( $item['id'] ) === $req_id ) {
        $current    = $item;
        $curr_index = $idx;
        break;
    }
}

$prev_post = $blog_posts[ ( $curr_index - 1 + count( $blog_posts ) ) % count( $blog_posts ) ];
$next_post = $blog_posts[ ( $curr_index + 1 ) % count( $blog_posts ) ];
?>

<main id="primary" class="site-main">

    <!-- ====================================================================
         1. POST FEATURED IMAGE HEADER WITH DARK OVERLAY
            Displays Category, Read Time, Date, Title, and Tags cleanly over the Featured Image
         ==================================================================== -->
    <section class="m3-post-featured-header accent-<?php echo esc_attr( $current['accent'] ); ?>"
             style="background-image: url('<?php echo esc_url( $current['image'] ); ?>');">
        <div class="m3-post-featured-overlay" aria-hidden="true"></div>
        <div class="m3-container m3-post-featured-inner">
            <div style="margin-bottom:14px;">
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-back-link">
                    ← BACK TO BLOG &amp; INSIGHTS
                </a>
            </div>

            <div class="m3-post-featured-top">
                <span class="m3-blog-cat-pill"><?php echo esc_html( $current['category'] ); ?></span>
                <span class="m3-blog-readtime-pill">⏱ <?php echo esc_html( $current['read_time'] ); ?></span>
                <span class="m3-post-header-date"><?php echo esc_html( $current['date'] . ' • BY ' . $current['author'] ); ?></span>
            </div>

            <h1 class="m3-post-featured-title">
                <?php echo esc_html( $current['title'] ); ?>
            </h1>

            <p class="m3-post-featured-excerpt">
                <?php echo esc_html( $current['excerpt'] ); ?>
            </p>

            <?php if ( ! empty( $current['tags'] ) ) : ?>
                <div class="m3-blog-card-tags" style="margin-top:16px;">
                    <?php foreach ( $current['tags'] as $tag_label ) : ?>
                        <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&tag=' . rawurlencode( ltrim( $tag_label, '#' ) ) ); ?>" class="m3-tag-chip">
                            <?php echo esc_html( $tag_label ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ====================================================================
         2. NORMAL BLOG ARTICLE VIEW (Left) + RIGHT-SIDED SIDEBAR (Right)
         ==================================================================== -->
    <section class="m3-blog-section" style="padding:64px 0;">
        <div class="m3-container">
            <div class="m3-blog-with-sidebar">

                <!-- Left Column: Full Editorial Blog Post -->
                <article class="m3-single-post-article accent-<?php echo esc_attr( $current['accent'] ); ?>">

                    <!-- Normal Blog Title & Meta Header Box -->
                    <div class="m3-single-post-header-box">
                        <div class="m3-blog-date" style="margin-bottom:10px;">
                            <span class="cat-dot"></span>
                            <span class="cat-text"><?php echo esc_html( $current['category'] ); ?></span>
                            <span>•</span>
                            <span><?php echo esc_html( $current['date'] ); ?></span>
                            <span>•</span>
                            <span class="read-text">⏱ <?php echo esc_html( $current['read_time'] ); ?></span>
                            <span>•</span>
                            <span>BY <?php echo esc_html( $current['author'] ); ?></span>
                        </div>

                        <h2 class="m3-single-article-title">
                            <?php echo esc_html( $current['title'] ); ?>
                        </h2>
                    </div>

                    <!-- Featured Image Frame Inside Article with Overlay Caption Bar -->
                    <div class="m3-single-featured-frame">
                        <div class="m3-single-featured-img-wrap">
                            <img src="<?php echo esc_url( $current['image'] ); ?>" alt="<?php echo esc_attr( $current['title'] ); ?>">
                            <div class="m3-single-featured-img-overlay">
                                <span class="m3-blog-cat-pill"><?php echo esc_html( $current['category'] ); ?></span>
                                <span class="m3-blog-readtime-pill">⏱ <?php echo esc_html( $current['read_time'] ); ?></span>
                            </div>
                        </div>
                        <div class="m3-single-featured-caption">
                            <span>MILEYM3DIA STUDIO EDITORIAL • <?php echo esc_html( $current['category'] ); ?></span>
                            <span><?php echo esc_html( $current['date'] ); ?></span>
                        </div>
                    </div>

                    <!-- Article Content Body -->
                    <div class="m3-single-post-content">
                        <?php echo wp_kses_post( $current['content'] ); ?>
                    </div>

                    <!-- Article Footer Tags & Category Bar -->
                    <div class="m3-single-post-tags-bar">
                        <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
                            <span class="m3-tags-label">ARTICLE TAGS:</span>
                            <?php foreach ( $current['tags'] as $tag_label ) : ?>
                                <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&tag=' . rawurlencode( ltrim( $tag_label, '#' ) ) ); ?>" class="m3-tag-chip">
                                    <?php echo esc_html( $tag_label ); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <div style="font-family:var(--m3-font-mono);font-size:0.74rem;color:var(--m3-text-muted);">
                            READ TIME: <strong style="color:#fff;"><?php echo esc_html( $current['read_time'] ); ?></strong>
                        </div>
                    </div>

                    <!-- Previous / Next Blog Post Navigation -->
                    <div class="m3-project-nav-grid" style="margin-top:28px;">
                        <a href="<?php echo esc_url( m3_post_url( $prev_post['id'] ) ); ?>" class="m3-project-nav-cell">
                            <span style="font-family:var(--m3-font-mono);font-size:0.68rem;color:var(--m3-text-dim);">← PREVIOUS ARTICLE</span>
                            <strong style="font-family:var(--m3-font-display);font-size:0.92rem;color:#fff;text-transform:uppercase;"><?php echo esc_html( $prev_post['title'] ); ?></strong>
                        </a>
                        <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" class="m3-project-nav-cell center-cta" style="justify-content:center;">
                            <span style="font-family:var(--m3-font-mono);font-size:0.68rem;color:var(--m3-red);">ALL INSIGHTS</span>
                            <strong style="font-family:var(--m3-font-display);font-size:0.92rem;color:#fff;text-transform:uppercase;">BACK TO BLOG GRID</strong>
                        </a>
                        <a href="<?php echo esc_url( m3_post_url( $next_post['id'] ) ); ?>" class="m3-project-nav-cell" style="text-align:right;">
                            <span style="font-family:var(--m3-font-mono);font-size:0.68rem;color:var(--m3-text-dim);">NEXT ARTICLE →</span>
                            <strong style="font-family:var(--m3-font-display);font-size:0.92rem;color:#fff;text-transform:uppercase;"><?php echo esc_html( $next_post['title'] ); ?></strong>
                        </a>
                    </div>

                </article>

                <!-- Right Column: Right-Sided Blog Sidebar -->
                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
