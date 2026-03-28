<?php
/**
 * Register Custom Post Type for "Tuyển dụng"
 */

function alize_register_career_cpt() {
    $labels = array(
        'name'                  => _x( 'Tuyển dụng', 'Post Type General Name', 'alize-luxury' ),
        'singular_name'         => _x( 'Tuyển dụng', 'Post Type Singular Name', 'alize-luxury' ),
        'menu_name'             => __( 'Tuyển dụng', 'alize-luxury' ),
        'name_admin_bar'        => __( 'Tuyển dụng', 'alize-luxury' ),
        'archives'              => __( 'Lưu trữ Tuyển dụng', 'alize-luxury' ),
        'add_new_item'          => __( 'Thêm Tuyển dụng mới', 'alize-luxury' ),
        'add_new'               => __( 'Thêm mới', 'alize-luxury' ),
        'new_item'              => __( 'Tuyển dụng mới', 'alize-luxury' ),
        'edit_item'             => __( 'Chỉnh sửa Tuyển dụng', 'alize-luxury' ),
        'update_item'           => __( 'Cập nhật Tuyển dụng', 'alize-luxury' ),
        'view_item'             => __( 'Xem Tuyển dụng', 'alize-luxury' ),
        'view_items'            => __( 'Xem Tuyển dụng', 'alize-luxury' ),
        'search_items'          => __( 'Tìm Tuyển dụng', 'alize-luxury' ),
        'all_items'             => __( 'Tất cả Tuyển dụng', 'alize-luxury' ),
    );
    $args = array(
        'label'                 => __( 'Tuyển dụng', 'alize-luxury' ),
        'description'           => __( 'Danh sách tin tuyển dụng', 'alize-luxury' ),
        'labels'                => $labels,
        'supports'              => array( 'title' ), // Hiding editor because we use ACF Wysiwyg 'career_description'
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-businessman',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'career', $args );
}
add_action( 'init', 'alize_register_career_cpt', 0 );
