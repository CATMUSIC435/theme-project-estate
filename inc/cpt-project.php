<?php
/**
 * Register Custom Post Types for "Dự án" and "Đăng ký dự án"
 */

function alize_register_project_cpt() {
    $labels = array(
        'name'                  => _x( 'Dự án', 'Post Type General Name', 'alize-luxury' ),
        'singular_name'         => _x( 'Dự án', 'Post Type Singular Name', 'alize-luxury' ),
        'menu_name'             => __( 'Dự án', 'alize-luxury' ),
        'name_admin_bar'        => __( 'Dự án', 'alize-luxury' ),
        'archives'              => __( 'Lưu trữ Dự án', 'alize-luxury' ),
        'attributes'            => __( 'Thuộc tính Dự án', 'alize-luxury' ),
        'parent_item_colon'     => __( 'Dự án cha:', 'alize-luxury' ),
        'all_items'             => __( 'Tất cả Dự án', 'alize-luxury' ),
        'add_new_item'          => __( 'Thêm Dự án mới', 'alize-luxury' ),
        'add_new'               => __( 'Thêm mới', 'alize-luxury' ),
        'new_item'              => __( 'Dự án mới', 'alize-luxury' ),
        'edit_item'             => __( 'Chỉnh sửa Dự án', 'alize-luxury' ),
        'update_item'           => __( 'Cập nhật Dự án', 'alize-luxury' ),
        'view_item'             => __( 'Xem Dự án', 'alize-luxury' ),
        'view_items'            => __( 'Xem Dự án', 'alize-luxury' ),
        'search_items'          => __( 'Tìm kiếm Dự án', 'alize-luxury' ),
        'not_found'             => __( 'Không tìm thấy', 'alize-luxury' ),
        'not_found_in_trash'    => __( 'Không tìm thấy trong thùng rác', 'alize-luxury' ),
        'featured_image'        => __( 'Ảnh đại diện', 'alize-luxury' ),
        'set_featured_image'    => __( 'Đặt ảnh đại diện', 'alize-luxury' ),
        'remove_featured_image' => __( 'Xóa ảnh đại diện', 'alize-luxury' ),
        'use_featured_image'    => __( 'Sử dụng làm ảnh đại diện', 'alize-luxury' ),
        'insert_into_item'      => __( 'Chèn vào Dự án', 'alize-luxury' ),
        'uploaded_to_this_item' => __( 'Tải lên Dự án này', 'alize-luxury' ),
        'items_list'            => __( 'Danh sách Dự án', 'alize-luxury' ),
        'items_list_navigation' => __( 'Điều hướng danh sách Dự án', 'alize-luxury' ),
        'filter_items_list'     => __( 'Lọc danh sách Dự án', 'alize-luxury' ),
    );
    $args = array(
        'label'                 => __( 'Dự án', 'alize-luxury' ),
        'description'           => __( 'Danh sách Dự án Bất Động Sản', 'alize-luxury' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-building',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type( 'project', $args );

    $registration_labels = array(
        'name'                  => _x( 'Đăng ký dự án', 'Post Type General Name', 'alize-luxury' ),
        'singular_name'         => _x( 'Đăng ký dự án', 'Post Type Singular Name', 'alize-luxury' ),
        'menu_name'             => __( 'Đăng ký dự án', 'alize-luxury' ),
        'all_items'             => __( 'Tất cả Đăng ký', 'alize-luxury' ),
        'view_item'             => __( 'Xem Đăng ký', 'alize-luxury' ),
        'search_items'          => __( 'Tìm Đăng ký', 'alize-luxury' ),
    );
    $registration_args = array(
        'label'                 => __( 'Đăng ký dự án', 'alize-luxury' ),
        'labels'                => $registration_labels,
        'supports'              => array( 'title' ),
        'hierarchical'          => false,
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-email-alt',
        'show_in_admin_bar'     => false,
        'show_in_nav_menus'     => false,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'capability_type'       => 'post',
        'capabilities' => array(
            'create_posts' => 'do_not_allow', // Prevents creating new posts in admin
        ),
        'map_meta_cap' => true,
    );
    register_post_type( 'project_registration', $registration_args );
}
add_action( 'init', 'alize_register_project_cpt', 0 );
