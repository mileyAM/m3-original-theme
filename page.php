<?php
/**
 * Standard WordPress Page Fallback Template (page.php)
 * Allows any new page created in WordPress Admin to render with full Gutenberg/Block Editor content.
 *
 * @package MILEYM3DIA
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="m3-services-section" style="padding:72px 0;">
        <div class="m3-container">
            <?php
            if ( function_exists( 'have_posts' ) && have_posts() ) :
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <header style="margin-bottom:32px;">
                        <div class="m3-eyebrow">MILEYM<span class="accent">3</span>DIA</div>
                        <h1 class="m3-section-title"><?php the_title(); ?></h1>
                    </header>
                    <div class="entry-content" style="display:grid;gap:18px;color:rgba(255,255,255,0.88);">
                        <?php the_content(); ?>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
    </section>
</main>

<?php
get_footer();
