<?php
/**
 * MILEYM3DIA Client Login, Registration & Portal Handlers
 * Integrates directly with WordPress User Accounts and the m3_inquiry Custom Post Type.
 *
 * @package MILEYM3DIA
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Handle frontend Login, Registration, and Project Brief submissions
 */
function m3_handle_portal_actions() {
    if ( ! isset( $_POST['m3_action'] ) ) {
        return;
    }

    $action = sanitize_text_field( wp_unslash( $_POST['m3_action'] ) );

    // 1. User Login
    if ( 'login' === $action ) {
        $creds = array(
            'user_login'    => isset( $_POST['user_login'] ) ? sanitize_text_field( wp_unslash( $_POST['user_login'] ) ) : '',
            'user_password' => isset( $_POST['user_password'] ) ? $_POST['user_password'] : '',
            'remember'      => ! empty( $_POST['remember'] ),
        );
        $user = wp_signon( $creds, false );
        if ( is_wp_error( $user ) ) {
            set_transient( 'm3_auth_notice', array( 'type' => 'error', 'msg' => $user->get_error_message() ), 60 );
        } else {
            wp_safe_redirect( home_url( '/?page=portal&welcome=1' ) );
            exit;
        }
    }

    // 2. User Registration
    if ( 'register' === $action ) {
        $username   = isset( $_POST['user_login'] ) ? sanitize_user( wp_unslash( $_POST['user_login'] ) ) : '';
        $email      = isset( $_POST['user_email'] ) ? sanitize_email( wp_unslash( $_POST['user_email'] ) ) : '';
        $password   = isset( $_POST['user_password'] ) ? $_POST['user_password'] : '';
        $brand_name = isset( $_POST['brand_name'] ) ? sanitize_text_field( wp_unslash( $_POST['brand_name'] ) ) : '';
        $niche      = isset( $_POST['client_niche'] ) ? sanitize_text_field( wp_unslash( $_POST['client_niche'] ) ) : 'Music / Artist';

        if ( empty( $username ) || empty( $email ) || empty( $password ) ) {
            set_transient( 'm3_auth_notice', array( 'type' => 'error', 'msg' => 'Please complete all required registration fields.' ), 60 );
            return;
        }

        $user_id = wp_create_user( $username, $password, $email );
        if ( is_wp_error( $user_id ) ) {
            set_transient( 'm3_auth_notice', array( 'type' => 'error', 'msg' => $user_id->get_error_message() ), 60 );
        } else {
            update_user_meta( $user_id, '_m3_brand_name', $brand_name );
            update_user_meta( $user_id, '_m3_client_niche', $niche );
            wp_set_current_user( $user_id );
            wp_set_auth_cookie( $user_id );
            wp_safe_redirect( home_url( '/?page=portal&registered=1' ) );
            exit;
        }
    }

    // 3. Submit New Project Brief / Booking Inquiry
    if ( 'submit_brief' === $action ) {
        $title   = isset( $_POST['project_title'] ) ? sanitize_text_field( wp_unslash( $_POST['project_title'] ) ) : 'New Creative Project';
        $service = isset( $_POST['service_type'] ) ? sanitize_text_field( wp_unslash( $_POST['service_type'] ) ) : 'Music Video & Branding';
        $package = isset( $_POST['package_tier'] ) ? sanitize_text_field( wp_unslash( $_POST['package_tier'] ) ) : 'STANDARD ($999)';
        $promo   = isset( $_POST['promo_code'] ) ? strtoupper( sanitize_text_field( wp_unslash( $_POST['promo_code'] ) ) ) : '';
        $details = isset( $_POST['project_details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['project_details'] ) ) : '';

        $post_id = wp_insert_post( array(
            'post_type'    => 'm3_inquiry',
            'post_title'   => $title . ' — ' . $service,
            'post_content' => $details,
            'post_status'  => 'publish',
            'post_author'  => get_current_user_id() ?: 1,
        ) );

        if ( $post_id && ! is_wp_error( $post_id ) ) {
            update_post_meta( $post_id, '_m3_inquiry_status', 'Pre-Production & Strategy' );
            update_post_meta( $post_id, '_m3_inquiry_package', $package );
            update_post_meta( $post_id, '_m3_inquiry_promo', $promo );
            update_post_meta( $post_id, '_m3_inquiry_service', $service );
            set_transient( 'm3_auth_notice', array( 'type' => 'success', 'msg' => 'Project brief submitted! Our M3 producers have added it to your active portal pipeline.' ), 60 );
        }
    }
}
add_action( 'init', 'm3_handle_portal_actions' );

/**
 * Get Active Client Portal Projects
 */
function m3_get_client_projects() {
    $defaults = array(
        array(
            'id'          => 901,
            'title'       => 'Q4 SINGLE & MUSIC VIDEO ROLLOUT ("NIGHTFALL")',
            'service'     => 'Videography + Music Production + Branding',
            'package'     => 'PREMIUM ($1,999 — 10% OFF M3FIRST10 Applied: $1,799)',
            'status'      => 'In Production / Mixing',
            'status_type' => 'production',
            'date'        => 'Updated 2 hours ago',
            'deliverable' => '4K Master Cut v2 + Dolby Atmos Stems + Press Kit',
        ),
        array(
            'id'          => 902,
            'title'       => 'BRAND IDENTITY & MERCH CAPSULE LOOKBOOK',
            'service'     => 'Branding + Photography + Graphic Design',
            'package'     => 'STANDARD ($999)',
            'status'      => 'Ready for Review',
            'status_type' => 'review',
            'date'        => 'Updated yesterday',
            'deliverable' => '36-Page Brand Bible PDF + 25 Retouched Studio Stills',
        ),
    );

    if ( function_exists( 'get_posts' ) ) {
        $posts = get_posts( array(
            'post_type'      => 'm3_inquiry',
            'posts_per_page' => 10,
            'post_status'    => 'publish',
        ) );
        if ( ! empty( $posts ) ) {
            foreach ( $posts as $p ) {
                array_unshift( $defaults, array(
                    'id'          => $p->ID,
                    'title'       => strtoupper( $p->post_title ),
                    'service'     => get_post_meta( $p->ID, '_m3_inquiry_service', true ) ?: 'Custom Production',
                    'package'     => get_post_meta( $p->ID, '_m3_inquiry_package', true ) ?: 'STANDARD ($999)',
                    'status'      => get_post_meta( $p->ID, '_m3_inquiry_status', true ) ?: 'Pre-Production & Strategy',
                    'status_type' => 'production',
                    'date'        => 'Just submitted',
                    'deliverable' => $p->post_content ?: 'Initial creative treatment & moodboard in progress.',
                ) );
            }
        }
    }

    return $defaults;
}
