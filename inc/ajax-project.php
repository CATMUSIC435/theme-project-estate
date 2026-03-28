<?php
/**
 * AJAX Handler for Project Registration Forms
 */

function alize_submit_project_registration() {
    // Check nonce
    if ( ! isset( $_POST['project_nonce'] ) || ! wp_verify_nonce( $_POST['project_nonce'], 'submit_project_form' ) ) {
        wp_send_json_error( array( 'message' => 'Lỗi bảo mật. Vui lòng thử lại.' ) );
    }

    $project_id = isset( $_POST['project_id'] ) ? intval( $_POST['project_id'] ) : 0;
    $name = isset( $_POST['customer_name'] ) ? sanitize_text_field( $_POST['customer_name'] ) : '';
    $phone = isset( $_POST['customer_phone'] ) ? sanitize_text_field( $_POST['customer_phone'] ) : '';
    $email = isset( $_POST['customer_email'] ) ? sanitize_email( $_POST['customer_email'] ) : '';
    $content = isset( $_POST['customer_content'] ) ? sanitize_textarea_field( $_POST['customer_content'] ) : '';

    if ( empty( $name ) || empty( $phone ) ) {
        wp_send_json_error( array( 'message' => 'Vui lòng nhập đầy đủ họ tên và số điện thoại.' ) );
    }

    $project_title = $project_id ? get_the_title( $project_id ) : 'Chưa rõ dự án';

    // Create the registration post
    $post_data = array(
        'post_title'    => sprintf( 'Đăng ký từ %s - %s', $name, $phone ),
        'post_type'     => 'project_registration',
        'post_status'   => 'publish',
    );

    $post_id = wp_insert_post( $post_data );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => 'Có lỗi xảy ra khi lưu dữ liệu. Vui lòng thử lại.' ) );
    }

    // Save ACF fields or post meta if ACF is not active yet during save
    update_post_meta( $post_id, 'reg_project_id', $project_id );
    update_post_meta( $post_id, 'reg_name', $name );
    update_post_meta( $post_id, 'reg_phone', $phone );
    update_post_meta( $post_id, 'reg_email', $email );
    update_post_meta( $post_id, 'reg_content', $content );

    // Also update field keys so ACF shows them properly
    update_post_meta( $post_id, '_reg_project_id', 'field_reg_project_id' );
    update_post_meta( $post_id, '_reg_name', 'field_reg_name' );
    update_post_meta( $post_id, '_reg_phone', 'field_reg_phone' );
    update_post_meta( $post_id, '_reg_email', 'field_reg_email' );
    update_post_meta( $post_id, '_reg_content', 'field_reg_content' );

    wp_send_json_success( array( 'message' => 'Đăng ký nhận thông tin thành công!' ) );
}
add_action( 'wp_ajax_submit_project_registration', 'alize_submit_project_registration' );
add_action( 'wp_ajax_nopriv_submit_project_registration', 'alize_submit_project_registration' );
