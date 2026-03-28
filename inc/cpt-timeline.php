<?php
/**
 * Register Custom Post Type for "Timeline" (Mốc Lịch Sử)
 */

function alize_register_timeline_cpt() {
    $labels = array(
        'name'                  => _x( 'Mốc lịch sử', 'Post Type General Name', 'alize-luxury' ),
        'singular_name'         => _x( 'Mốc lịch sử', 'Post Type Singular Name', 'alize-luxury' ),
        'menu_name'             => __( 'Timeline', 'alize-luxury' ),
        'name_admin_bar'        => __( 'Timeline', 'alize-luxury' ),
        'archives'              => __( 'Lưu trữ Timeline', 'alize-luxury' ),
        'add_new_item'          => __( 'Thêm mốc lịch sử mới', 'alize-luxury' ),
        'add_new'               => __( 'Thêm mới', 'alize-luxury' ),
        'new_item'              => __( 'Mốc mới', 'alize-luxury' ),
        'edit_item'             => __( 'Chỉnh sửa Mốc', 'alize-luxury' ),
        'update_item'           => __( 'Cập nhật Mốc', 'alize-luxury' ),
        'view_item'             => __( 'Xem Mốc lịch sử', 'alize-luxury' ),
        'view_items'            => __( 'Xem Mốc lịch sử', 'alize-luxury' ),
        'search_items'          => __( 'Tìm Mốc', 'alize-luxury' ),
        'all_items'             => __( 'Tất cả Mốc lịch sử', 'alize-luxury' ),
    );
    $args = array(
        'label'                 => __( 'Timeline', 'alize-luxury' ),
        'description'           => __( 'Các mốc lịch sử phát triển', 'alize-luxury' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'page-attributes' ), // title for internal use/step title, page-attributes for ordering
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-chart-line',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'timeline', $args );
}
add_action( 'init', 'alize_register_timeline_cpt', 0 );
