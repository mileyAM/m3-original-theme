<?php
/**
 * Template Name: 05 Blog / Insights Grid (home.php)
 * Features:
 * - Featured Post Hero Header using the Featured Image with a multi-layer dark overlay
 * - Category & Tag filter bar with colorful M3 accents
 * - 2-Column Layout: Main Blog Posts Grid on the left + Right-Sided Blog Sidebar (sidebar.php) on the right
 * - Every blog card displays both a Featured Image Header with dark overlay (Category, Read Time, Title)
 *   AND normal blog body details (Title, Excerpt, Read Time, Tags).
 *
 * @package MILEYM3DIA
 */

get_header();
$uri        = get_template_directory_uri();
$all_posts  = m3_get_blog_posts_data();
$categories = m3_get_blog_categories();

$active_cat = isset( $_GET['cat'] ) ? sanitize_text_field( wp_unslash( $_GET['cat'] ) ) : 'all';
$active_tag = isset( $_GET['tag'] ) ? sanitize_text_field( wp_unslash( $_GET['tag'] ) ) : '';
$search_q   = isset( $_GET['s'] ) ? sanitize_text_field( wp_unslash( $_GET['s'] ) ) : '';

$filtered_posts = array();
foreach ( $all_posts as $bp ) {
    if ( 'all' !== $active_cat && '' !== $active_cat && $bp['cat_slug'] !== $active_cat ) {
        continue;
    }
    if ( '' !== $active_tag ) {
        $matched_tag = false;
        foreach ( $bp['tags'] as $t ) {
            if ( stripos( $t, $active_tag ) !== false ) {
                $matched_tag = true;
                break;
            }
        }
        if ( ! $matched_tag ) {
            continue;
        }
    }
    if ( '' !== $search_q ) {
        if ( stripos( $bp['title'], $search_q ) === false && stripos( $bp['excerpt'], $search_q ) === false && stripos( $bp['category'], $search_q ) === false ) {
            continue;
        }
    }
    $filtered_posts[] = $bp;
}
if ( empty( $filtered_posts ) ) {
    $filtered_posts = $all_posts;
}

$lead_post = $filtered_posts[0];
?>

<main id="primary" class="site-main">

    <!-- ====================================================================
         1. FEATURED POST HERO HEADER (Uses Lead Post Featured Image + Dark Overlay)
         ==================================================================== -->
    <section class="m3-post-featured-header accent-<?php echo esc_attr( $lead_post['accent'] ); ?>"
             style="background-image: url('<?php echo esc_url( $lead_post['image'] ); ?>');">
        <div class="m3-post-featured-overlay" aria-hidden="true"></div>
        <div class="m3-container m3-post-featured-inner">
            <div class="m3-post-featured-top">
                <span class="m3-banner-badge">05 • M<span class="three">3</span> BLOG &amp; STUDIO INSIGHTS</span>
                <span class="m3-blog-cat-pill"><?php echo esc_html( $lead_post['category'] ); ?></span>
                <span class="m3-blog-readtime-pill">⏱ <?php echo esc_html( $lead_post['read_time'] ); ?></span>
                <span class="m3-post-header-date"><?php echo esc_html( $lead_post['date'] . ' • BY ' . $lead_post['author'] ); ?></span>
            </div>

            <h1 class="m3-post-featured-title">
                <a href="<?php echo esc_url( m3_post_url( $lead_post['id'] ) ); ?>">
                    <?php echo esc_html( $lead_post['title'] ); ?>
                </a>
            </h1>

            <p class="m3-post-featured-excerpt">
                <?php echo esc_html( $lead_post['excerpt'] ); ?>
            </p>

            <div class="m3-post-featured-footer">
                <a href="<?php echo esc_url( m3_post_url( $lead_post['id'] ) ); ?>" class="m3-btn m3-btn-primary">
                    READ FEATURED ARTICLE →
                </a>
                <?php if ( ! empty( $lead_post['tags'] ) ) : ?>
                    <div class="m3-blog-card-tags">
                        <?php foreach ( $lead_post['tags'] as $tag_label ) : ?>
                            <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&tag=' . rawurlencode( ltrim( $tag_label, '#' ) ) ); ?>" class="m3-tag-chip">
                                <?php echo esc_html( $tag_label ); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- ====================================================================
         2. BLOG CATEGORY FILTER BAR (Straight Symmetrical Architectural Lines)
         ==================================================================== -->
    <section class="m3-blog-category-bar">
        <div class="m3-container m3-blog-category-bar-inner">
            <div class="m3-filter-tabs" role="navigation" aria-label="Blog Category Filter">
                <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>"
                   class="m3-filter-btn <?php echo ( 'all' === $active_cat && '' === $active_tag ) ? 'active' : ''; ?>">
                    ALL ARTICLES (<?php echo count( $all_posts ); ?>)
                </a>
                <?php foreach ( $categories as $cat ) : ?>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&cat=' . rawurlencode( $cat['slug'] ) ); ?>"
                       class="m3-filter-btn accent-<?php echo esc_attr( $cat['accent'] ); ?> <?php echo ( $active_cat === $cat['slug'] ) ? 'active' : ''; ?>">
                        <?php echo esc_html( $cat['name'] ); ?>
                    </a>
                <?php endforeach; ?>
            </div>

            <?php if ( '' !== $active_tag || '' !== $search_q ) : ?>
                <div style="display:flex;align-items:center;gap:10px;font-family:var(--m3-font-mono);font-size:0.74rem;">
                    <span style="color:var(--m3-green);">
                        FILTERED BY: <?php echo esc_html( $active_tag ? '#' . $active_tag : $search_q ); ?>
                    </span>
                    <a href="<?php echo esc_url( m3_page_url( 'blog' ) ); ?>" style="color:var(--m3-red);text-decoration:underline;">CLEAR ×</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- ====================================================================
         3. MAIN BLOG POSTS GRID (Left) + RIGHT-SIDED BLOG SIDEBAR (Right)
         ==================================================================== -->
    <section class="m3-blog-section">
        <div class="m3-container">
            <div class="m3-blog-with-sidebar">

                <!-- Left Column: Symmetrical 2-Column Blog Articles Grid -->
                <div class="m3-blog-main-grid">
                    <?php foreach ( $filtered_posts as $post_item ) : ?>
                        <article class="m3-blog-card accent-<?php echo esc_attr( $post_item['accent'] ); ?>"
                                 data-blog-category="<?php echo esc_attr( $post_item['cat_slug'] ); ?>">
                            <!-- Featured Image Header with Dark Overlay, Category Pill, Read Time & Overlaid Title -->
                            <a href="<?php echo esc_url( m3_post_url( $post_item['id'] ) ); ?>" class="m3-blog-thumb">
                                <img src="<?php echo esc_url( $post_item['image'] ); ?>" alt="<?php echo esc_attr( $post_item['title'] ); ?>" loading="lazy">
                                <div class="m3-blog-thumb-overlay">
                                    <div class="m3-blog-thumb-top">
                                        <span class="m3-blog-cat-pill"><?php echo esc_html( $post_item['category'] ); ?></span>
                                        <span class="m3-blog-readtime-pill">⏱ <?php echo esc_html( $post_item['read_time'] ); ?></span>
                                    </div>
                                    <div class="m3-blog-thumb-bottom">
                                        <span class="m3-blog-thumb-meta"><?php echo esc_html( $post_item['date'] . ' • ' . $post_item['author'] ); ?></span>
                                        <h2 class="m3-blog-thumb-title"><?php echo esc_html( $post_item['title'] ); ?></h2>
                                    </div>
                                </div>
                            </a>

                            <!-- Normal Blog Card Body with Title, Category, Read Time, Excerpt & Tags -->
                            <div class="m3-blog-body">
                                <div>
                                    <div class="m3-blog-date">
                                        <span class="cat-dot"></span>
                                        <span class="cat-text"><?php echo esc_html( $post_item['category'] ); ?></span>
                                        <span>•</span>
                                        <span><?php echo esc_html( $post_item['date'] ); ?></span>
                                        <span>•</span>
                                        <span class="read-text"><?php echo esc_html( $post_item['read_time'] ); ?></span>
                                    </div>
                                    <h3 class="m3-blog-title">
                                        <a href="<?php echo esc_url( m3_post_url( $post_item['id'] ) ); ?>">
                                            <?php echo esc_html( $post_item['title'] ); ?>
                                        </a>
                                    </h3>
                                    <p class="m3-blog-excerpt">
                                        <?php echo esc_html( $post_item['excerpt'] ); ?>
                                    </p>
                                </div>

                                <div>
                                    <?php if ( ! empty( $post_item['tags'] ) ) : ?>
                                        <div class="m3-blog-card-tags">
                                            <?php foreach ( $post_item['tags'] as $tag_label ) : ?>
                                                <a href="<?php echo esc_url( m3_page_url( 'blog' ) . '&tag=' . rawurlencode( ltrim( $tag_label, '#' ) ) ); ?>" class="m3-tag-chip">
                                                    <?php echo esc_html( $tag_label ); ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="m3-blog-readmore">
                                        <a href="<?php echo esc_url( m3_post_url( $post_item['id'] ) ); ?>">READ FULL ARTICLE →</a>
                                        <span><?php echo esc_html( $post_item['read_time'] ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

                <!-- Right Column: Right-Sided Blog Sidebar -->
                <?php get_sidebar(); ?>

            </div>
        </div>
    </section>

</main>

<?php
get_footer();
