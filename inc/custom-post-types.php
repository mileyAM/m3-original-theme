<?php
/**
 * MILEYM3DIA Custom Post Types, Taxonomies & Editable Meta Boxes
 * Ensures all Services, Portfolio Projects, Packages, Testimonials, and Client Portal Inquiries
 * are 100% editable inside the WordPress Admin Dashboard.
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function m3_register_custom_post_types() {
    // 1. Services CPT
    register_post_type( 'm3_service', array(
        'labels' => array(
            'name'          => __( 'Services (M3)', 'mileym3dia' ),
            'singular_name' => __( 'Service', 'mileym3dia' ),
            'add_new_item'  => __( 'Add New Service', 'mileym3dia' ),
            'edit_item'     => __( 'Edit Service', 'mileym3dia' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-video-alt3',
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'service' ),
    ) );

    // 2. Projects / Portfolio CPT (Each project has its own Single Page: single-m3_project.php)
    register_post_type( 'm3_project', array(
        'labels' => array(
            'name'          => __( 'Portfolio Projects (M3)', 'mileym3dia' ),
            'singular_name' => __( 'Project', 'mileym3dia' ),
            'add_new_item'  => __( 'Add New Project', 'mileym3dia' ),
            'edit_item'     => __( 'Edit Project', 'mileym3dia' ),
        ),
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-format-gallery',
        'supports'     => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' ),
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'project' ),
    ) );

    register_taxonomy( 'm3_project_category', 'm3_project', array(
        'label'        => __( 'Project Categories', 'mileym3dia' ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'project-category' ),
    ) );

    // 3. Pricing Packages CPT
    register_post_type( 'm3_package', array(
        'labels' => array(
            'name'          => __( 'Pricing Packages (M3)', 'mileym3dia' ),
            'singular_name' => __( 'Package', 'mileym3dia' ),
        ),
        'public'       => true,
        'menu_icon'    => 'dashicons-cart',
        'supports'     => array( 'title', 'editor', 'page-attributes' ),
        'show_in_rest' => true,
    ) );

    // 4. Client Testimonials CPT
    register_post_type( 'm3_testimonial', array(
        'labels' => array(
            'name'          => __( 'Testimonials (M3)', 'mileym3dia' ),
            'singular_name' => __( 'Testimonial', 'mileym3dia' ),
        ),
        'public'       => true,
        'menu_icon'    => 'dashicons-format-quote',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
        'show_in_rest' => true,
    ) );

    // 5. Client Portal Project Inquiries / Briefs CPT
    register_post_type( 'm3_inquiry', array(
        'labels' => array(
            'name'          => __( 'Client Portal Briefs', 'mileym3dia' ),
            'singular_name' => __( 'Client Brief', 'mileym3dia' ),
        ),
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-businessman',
        'supports'     => array( 'title', 'editor', 'author', 'custom-fields' ),
    ) );
}
add_action( 'init', 'm3_register_custom_post_types' );

/**
 * Add Editable Meta Boxes for Services & Projects in WP Admin
 */
function m3_add_meta_boxes() {
    add_meta_box( 'm3_service_meta', __( 'M3 Service Settings (Icon, Accent Color, Starting Price)', 'mileym3dia' ), 'm3_service_meta_callback', 'm3_service', 'normal', 'high' );
    add_meta_box( 'm3_project_meta', __( 'M3 Single Project Page Settings (Client, Deliverables, Optional Video Embed)', 'mileym3dia' ), 'm3_project_meta_callback', 'm3_project', 'normal', 'high' );
    add_meta_box( 'm3_inquiry_meta', __( 'M3 Client Portal Status & Deliverables', 'mileym3dia' ), 'm3_inquiry_meta_callback', 'm3_inquiry', 'normal', 'high' );
    add_meta_box( 'm3_post_meta', __( 'M3 Blog Post Display Settings (Read Time, Accent Color, Category Badge)', 'mileym3dia' ), 'm3_post_meta_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'm3_add_meta_boxes' );

function m3_post_meta_callback( $post ) {
    $read_time = get_post_meta( $post->ID, '_m3_post_read_time', true ) ?: '5 MIN READ';
    $accent    = get_post_meta( $post->ID, '_m3_post_accent', true ) ?: 'red';
    $cat_label = get_post_meta( $post->ID, '_m3_post_category_label', true ) ?: 'MUSIC VIDEOS';
    $cat_slug  = get_post_meta( $post->ID, '_m3_post_category_slug', true ) ?: 'music-videos';
    $author    = get_post_meta( $post->ID, '_m3_post_author', true ) ?: 'M3 STUDIO TEAM';
    $image     = get_post_meta( $post->ID, '_m3_post_image', true ) ?: '';
    wp_nonce_field( 'm3_save_meta', 'm3_meta_nonce' );
    ?>
    <p>
        <label><strong>Read Time Badge (e.g. 5 MIN READ):</strong></label><br>
        <input type="text" name="m3_post_read_time" value="<?php echo esc_attr( $read_time ); ?>" style="width:100%;max-width:260px;">
    </p>
    <p>
        <label><strong>Category Badge Label:</strong></label><br>
        <input type="text" name="m3_post_category_label" value="<?php echo esc_attr( $cat_label ); ?>" style="width:100%;max-width:340px;">
    </p>
    <p>
        <label><strong>Category Filter Slug:</strong></label><br>
        <select name="m3_post_category_slug" style="width:100%;max-width:340px;">
            <?php
            $cats = array(
                'music-videos'       => 'Music Videos',
                'branding'           => 'Branding & Identity',
                'music-production'   => 'Music Production',
                'artist-development' => 'Artist Development',
                'cinematography'     => 'Cinematography & Color',
                'content-strategy'   => 'Content Strategy',
            );
            foreach ( $cats as $slug => $label ) :
                ?>
                <option value="<?php echo esc_attr( $slug ); ?>" <?php selected( $cat_slug, $slug ); ?>><?php echo esc_html( $label ); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label><strong>Card Top Accent Color:</strong></label><br>
        <select name="m3_post_accent" style="width:100%;max-width:340px;">
            <?php foreach ( array( 'red' => 'Crimson Red', 'blue' => 'Electric Blue', 'green' => 'Neon Yellow-Green', 'purple' => 'Vivid Purple', 'gold' => 'Studio Gold' ) as $k => $label ) : ?>
                <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $accent, $k ); ?>><?php echo esc_html( $label ); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label><strong>Author Credit Label:</strong></label><br>
        <input type="text" name="m3_post_author" value="<?php echo esc_attr( $author ); ?>" style="width:100%;max-width:340px;">
    </p>
    <p>
        <label><strong>Fallback Header / Featured Image URL (or use WP Featured Image on right):</strong></label><br>
        <input type="text" name="m3_post_image" value="<?php echo esc_attr( $image ); ?>" style="width:100%;">
    </p>
    <?php
}

function m3_service_meta_callback( $post ) {
    $icon        = get_post_meta( $post->ID, '_m3_service_icon', true ) ?: 'videography';
    $accent      = get_post_meta( $post->ID, '_m3_service_accent', true ) ?: 'red';
    $price       = get_post_meta( $post->ID, '_m3_service_price', true ) ?: '$499+';
    $deliverable = get_post_meta( $post->ID, '_m3_service_deliverable', true ) ?: '4K Cinema Capture • Editing';
    wp_nonce_field( 'm3_save_meta', 'm3_meta_nonce' );
    ?>
    <p>
        <label><strong>Icon Style:</strong></label><br>
        <select name="m3_service_icon" style="width:100%;max-width:320px;">
            <?php foreach ( array( 'videography', 'photography', 'branding', 'graphic', 'content', 'editing', 'music', 'artist' ) as $opt ) : ?>
                <option value="<?php echo esc_attr( $opt ); ?>" <?php selected( $icon, $opt ); ?>><?php echo esc_html( ucfirst( $opt ) ); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label><strong>Accent Color Theme:</strong></label><br>
        <select name="m3_service_accent" style="width:100%;max-width:320px;">
            <?php foreach ( array( 'red' => 'Crimson Red', 'green' => 'Neon Yellow-Green', 'blue' => 'Electric Blue', 'purple' => 'Vivid Purple' ) as $k => $label ) : ?>
                <option value="<?php echo esc_attr( $k ); ?>" <?php selected( $accent, $k ); ?>><?php echo esc_html( $label ); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label><strong>Starting Price Label:</strong></label><br>
        <input type="text" name="m3_service_price" value="<?php echo esc_attr( $price ); ?>" style="width:100%;max-width:320px;">
    </p>
    <p>
        <label><strong>Deliverables Summary:</strong></label><br>
        <input type="text" name="m3_service_deliverable" value="<?php echo esc_attr( $deliverable ); ?>" style="width:100%;">
    </p>
    <?php
}

function m3_project_meta_callback( $post ) {
    $cat          = get_post_meta( $post->ID, '_m3_project_category', true ) ?: 'video';
    $client       = get_post_meta( $post->ID, '_m3_project_client', true ) ?: '';
    $year         = get_post_meta( $post->ID, '_m3_project_year', true ) ?: '2024';
    $deliverables = get_post_meta( $post->ID, '_m3_project_deliverables', true ) ?: '4K Cinema Capture • Grading • Brand Assets';
    $video_url    = get_post_meta( $post->ID, '_m3_project_video_url', true ) ?: '';
    $video_label  = get_post_meta( $post->ID, '_m3_project_video_label', true ) ?: '4K MASTER VIDEO CUT';
    $challenge    = get_post_meta( $post->ID, '_m3_project_challenge', true ) ?: '';
    $execution    = get_post_meta( $post->ID, '_m3_project_execution', true ) ?: '';
    $image        = get_post_meta( $post->ID, '_m3_project_image', true ) ?: '';
    wp_nonce_field( 'm3_save_meta', 'm3_meta_nonce' );
    ?>
    <p>
        <label><strong>Filter Tab Category:</strong></label><br>
        <select name="m3_project_category" style="width:100%;max-width:320px;">
            <option value="video" <?php selected( $cat, 'video' ); ?>>Video Projects</option>
            <option value="photo" <?php selected( $cat, 'photo' ); ?>>Photo Projects</option>
            <option value="branding" <?php selected( $cat, 'branding' ); ?>>Branding Projects</option>
            <option value="music" <?php selected( $cat, 'music' ); ?>>Music / Audio Production</option>
        </select>
    </p>
    <p>
        <label><strong>Client / Artist Name:</strong></label><br>
        <input type="text" name="m3_project_client" value="<?php echo esc_attr( $client ); ?>" style="width:100%;max-width:420px;">
    </p>
    <p>
        <label><strong>Year:</strong></label><br>
        <input type="text" name="m3_project_year" value="<?php echo esc_attr( $year ); ?>" style="width:100%;max-width:180px;">
    </p>
    <p>
        <label><strong>Deliverables List:</strong></label><br>
        <input type="text" name="m3_project_deliverables" value="<?php echo esc_attr( $deliverables ); ?>" style="width:100%;">
    </p>
    <hr>
    <p>
        <label><strong>Optional Video URL (YouTube / Vimeo / MP4 — Leave blank for Photo or Branding projects):</strong></label><br>
        <input type="text" name="m3_project_video_url" value="<?php echo esc_attr( $video_url ); ?>" placeholder="https://www.youtube.com/embed/..." style="width:100%;">
    </p>
    <p>
        <label><strong>Video Player Caption / Label:</strong></label><br>
        <input type="text" name="m3_project_video_label" value="<?php echo esc_attr( $video_label ); ?>" style="width:100%;max-width:420px;">
    </p>
    <hr>
    <p>
        <label><strong>The Challenge (Case Study Left Column):</strong></label><br>
        <textarea name="m3_project_challenge" rows="3" style="width:100%;"><?php echo esc_textarea( $challenge ); ?></textarea>
    </p>
    <p>
        <label><strong>The Execution (Case Study Right Column):</strong></label><br>
        <textarea name="m3_project_execution" rows="3" style="width:100%;"><?php echo esc_textarea( $execution ); ?></textarea>
    </p>
    <p>
        <label><strong>Custom Thumbnail URL (or use Featured Image):</strong></label><br>
        <input type="text" name="m3_project_image" value="<?php echo esc_attr( $image ); ?>" style="width:100%;">
    </p>
    <?php
}

function m3_inquiry_meta_callback( $post ) {
    $status  = get_post_meta( $post->ID, '_m3_inquiry_status', true ) ?: 'In Production / Mixing';
    $package = get_post_meta( $post->ID, '_m3_inquiry_package', true ) ?: 'STANDARD ($999)';
    $promo   = get_post_meta( $post->ID, '_m3_inquiry_promo', true ) ?: 'M3FIRST10';
    wp_nonce_field( 'm3_save_meta', 'm3_meta_nonce' );
    ?>
    <p>
        <label><strong>Project Status (Visible in Client Portal):</strong></label><br>
        <input type="text" name="m3_inquiry_status" value="<?php echo esc_attr( $status ); ?>" style="width:100%;max-width:420px;">
    </p>
    <p>
        <label><strong>Selected Package:</strong></label><br>
        <input type="text" name="m3_inquiry_package" value="<?php echo esc_attr( $package ); ?>" style="width:100%;max-width:420px;">
    </p>
    <p>
        <label><strong>Applied Promo Code:</strong></label><br>
        <input type="text" name="m3_inquiry_promo" value="<?php echo esc_attr( $promo ); ?>" style="width:100%;max-width:240px;">
    </p>
    <?php
}

function m3_save_custom_meta( $post_id ) {
    if ( ! isset( $_POST['m3_meta_nonce'] ) || ! wp_verify_nonce( $_POST['m3_meta_nonce'], 'm3_save_meta' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    $fields = array(
        'm3_service_icon'         => '_m3_service_icon',
        'm3_service_accent'       => '_m3_service_accent',
        'm3_service_price'        => '_m3_service_price',
        'm3_service_deliverable'  => '_m3_service_deliverable',
        'm3_project_category'     => '_m3_project_category',
        'm3_project_client'       => '_m3_project_client',
        'm3_project_year'         => '_m3_project_year',
        'm3_project_deliverables' => '_m3_project_deliverables',
        'm3_project_video_url'    => '_m3_project_video_url',
        'm3_project_video_label'  => '_m3_project_video_label',
        'm3_project_challenge'    => '_m3_project_challenge',
        'm3_project_execution'    => '_m3_project_execution',
        'm3_project_image'        => '_m3_project_image',
        'm3_inquiry_status'       => '_m3_inquiry_status',
        'm3_inquiry_package'      => '_m3_inquiry_package',
        'm3_inquiry_promo'        => '_m3_inquiry_promo',
        'm3_post_read_time'       => '_m3_post_read_time',
        'm3_post_category_label'  => '_m3_post_category_label',
        'm3_post_category_slug'   => '_m3_post_category_slug',
        'm3_post_accent'          => '_m3_post_accent',
        'm3_post_author'          => '_m3_post_author',
        'm3_post_image'           => '_m3_post_image',
    );
    foreach ( $fields as $input => $meta_key ) {
        if ( isset( $_POST[ $input ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $input ] ) ) );
        }
    }
}
add_action( 'save_post', 'm3_save_custom_meta' );
