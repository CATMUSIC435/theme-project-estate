<?php
/**
 * Auto-generate dummy data for custom post types
 * Trigger once on theme activation or via ?seed_data=1
 */

function alize_insert_dummy_data() {
    // Prevent multiple inserts
    if ( get_option( 'alize_dummy_data_inserted' ) ) {
        if ( ! isset( $_GET['seed_data'] ) ) {
            return;
        }
    }

    // 1. Projects
    $projects = [
        [ 'title' => 'Penthouse Sapphire', 'badge' => 'Đang mở bán', 'loc' => 'Quận 1, TP.HCM', 'thumb' => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&q=80&w=800' ],
        [ 'title' => 'Ocean Villa Resort', 'badge' => 'Dự án mới', 'loc' => 'Hải Châu, Đà Nẵng', 'thumb' => 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&q=80&w=800' ],
        [ 'title' => 'Emerald City', 'badge' => 'Đã bàn giao', 'loc' => 'Quận 2, TP.HCM', 'thumb' => 'https://images.unsplash.com/photo-1628624747186-a941c476b7ef?auto=format&fit=crop&q=80&w=800' ],
        [ 'title' => 'Lakeview Estates', 'badge' => 'Giới hạn', 'loc' => 'Lâm Đồng', 'thumb' => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=800' ],
        [ 'title' => 'Alize Commercial Tower', 'badge' => 'Sắp ra mắt', 'loc' => 'Quận 1, TP.HCM', 'thumb' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&q=80&w=800' ],
        [ 'title' => 'Sunset Premium Apartments', 'badge' => 'Đã bàn giao', 'loc' => 'Sơn Trà, Đà Nẵng', 'thumb' => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&q=80&w=800' ]
    ];
    foreach ( $projects as $p ) {
        $post_id = wp_insert_post( array(
            'post_title'   => $p['title'],
            'post_type'    => 'cpt_project',
            'post_status'  => 'publish',
            'post_content' => 'Nội dung chi tiết dự án ' . $p['title'],
        ) );
        update_post_meta( $post_id, '_project_badge', $p['badge'] );
        update_post_meta( $post_id, '_project_location', $p['loc'] );
        // Note: Thumbnail ID requires sideloading, so we skip setting meta thumbnail here and use the fallback in our template for now.
    }

    // 2. Careers
    $careers = [
        [ 'title' => 'Chuyên Viên Kinh Doanh', 'meta' => 'Toàn thời gian • TP.HCM' ],
        [ 'title' => 'Kiến Trúc Sư Trưởng', 'meta' => 'Toàn thời gian • Hà Nội' ],
    ];
    foreach ( $careers as $c ) {
        $post_id = wp_insert_post( array(
            'post_title'   => $c['title'],
            'post_type'    => 'cpt_career',
            'post_status'  => 'publish',
            'post_content' => 'Mô tả công việc...',
        ) );
        update_post_meta( $post_id, '_career_meta', $c['meta'] );
    }

    // 3. Timeline
    $timelines = [
        [ 'title' => '2008', 'desc' => 'Khởi Nguyên' ],
        [ 'title' => '2012', 'desc' => 'Dấu Ấn Bất Động Sản Dân Dụng' ],
        [ 'title' => '2018', 'desc' => 'Dịch Vụ Khách Sạn & Nghỉ Dưỡng' ],
        [ 'title' => '2024', 'desc' => 'Phát Triển Hạ Tầng & Công Nghiệp' ],
        [ 'title' => 'Tương lai', 'desc' => 'Logistics & Chuỗi Cung Ứng' ]
    ];
    foreach ( $timelines as $t ) {
        wp_insert_post( array(
            'post_title'   => $t['title'],
            'post_excerpt' => $t['desc'],
            'post_type'    => 'cpt_timeline',
            'post_status'  => 'publish',
        ) );
    }

    // 4. Gallery
    $galleries = [ 'Phòng khách', 'Nhà bếp', 'Phòng ngủ', 'Tiện ích', 'Cảnh quan' ];
    foreach ( $galleries as $g ) {
        wp_insert_post( array(
            'post_title'   => $g,
            'post_type'    => 'cpt_gallery',
            'post_status'  => 'publish',
        ) );
    }

    update_option( 'alize_dummy_data_inserted', true );
}

if ( isset( $_GET['seed_data'] ) ) {
    add_action( 'init', 'alize_insert_dummy_data' );
}
