<?php
/**
 * Register Custom Post Types and Taxonomies
 */

function alize_custom_post_types() {





	$gallery_labels = array(
		'name'          => 'Thư Viện Ảnh',
		'singular_name' => 'Ảnh',
		'menu_name'     => 'Gallery',
		'add_new'       => 'Thêm Ảnh Mới',
		'all_items'     => 'Tất Cả Ảnh',
	);
	$gallery_args = array(
		'labels'        => $gallery_labels,
		'public'        => false, 
		'show_ui'       => true,
		'menu_icon'     => 'dashicons-format-gallery',
		'supports'      => array( 'title', 'thumbnail', 'custom-fields' ), // Title is caption, thumbnail is image
	);
	register_post_type( 'cpt_gallery', $gallery_args );

	// 5. Team / Leadership (Đội Ngũ)
	$team_labels = array(
		'name'          => 'Đội Ngũ',
		'singular_name' => 'Thành Viên',
		'menu_name'     => 'Leadership',
		'add_new'       => 'Thêm Thành Viên',
		'all_items'     => 'Tất Cả Thành Viên',
	);
	$team_args = array(
		'labels'        => $team_labels,
		'public'        => true, // needs an archive page and single page
		'has_archive'   => true, // important for the /team page
		'show_ui'       => true,
		'menu_icon'     => 'dashicons-groups',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ), // Title is name, Excerpt/Editor is bio
	);
	register_post_type( 'cpt_team', $team_args );

}
add_action( 'init', 'alize_custom_post_types' );


// ==========================================
// CPT GALLERY META BOXES
// ==========================================
function alize_gallery_meta_boxes() {
    add_meta_box(
        'gallery_link_meta_box',
        'Cài đặt Link (View Button)',
        'alize_gallery_meta_box_html',
        'cpt_gallery',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'alize_gallery_meta_boxes' );

function alize_gallery_meta_box_html( $post ) {
    $link = get_post_meta( $post->ID, '_gallery_link', true );
    $subtitle = get_post_meta( $post->ID, '_gallery_subtitle', true );
    wp_nonce_field( 'alize_gallery_meta_box_nonce', 'alize_gallery_nonce' );
    ?>
    <p>
        <label for="gallery_link"><strong>Link Điều Hướng (khi click nút View hoặc khi click vào ảnh):</strong></label><br/>
        <input type="text" id="gallery_link" name="gallery_link" value="<?php echo esc_attr( $link ); ?>" style="width:100%; padding:5px;" placeholder="Ví dụ: /thuvien hoặc https://..." />
    </p>
    <p>
        <label for="gallery_subtitle"><strong>Tiêu Đề Phụ ở Bảng Trắng (Vd: 12 Photos &lt;br&gt; Exterior):</strong></label><br/>
        <input type="text" id="gallery_subtitle" name="gallery_subtitle" value="<?php echo esc_attr( $subtitle ); ?>" style="width:100%; padding:5px;" placeholder="Nhập tiêu đề hoặc để trống tính tự động" />
    </p>
    <?php
}

function alize_save_gallery_meta( $post_id ) {
    if ( ! isset( $_POST['alize_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['alize_gallery_nonce'], 'alize_gallery_meta_box_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['gallery_link'] ) ) {
        update_post_meta( $post_id, '_gallery_link', sanitize_text_field( $_POST['gallery_link'] ) );
    }
	if ( isset( $_POST['gallery_subtitle'] ) ) {
        // Allow some basic HTML like <br> for the subtitle if needed, or sanitize as text and handle br later.
        // sanitize_text_field removes <br>. Let's use wp_kses_post or sanitize_textarea_field.
        update_post_meta( $post_id, '_gallery_subtitle', wp_kses_post( wp_unslash( $_POST['gallery_subtitle'] ) ) );
    }
}
add_action( 'save_post_cpt_gallery', 'alize_save_gallery_meta' );

// ==========================================
// CPT TEAM META BOXES
// ==========================================
function alize_team_meta_boxes() {
    add_meta_box(
        'team_info_meta_box',
        'Thông Tin Thành Viên (Role, Experience, Focus)',
        'alize_team_meta_box_html',
        'cpt_team',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'alize_team_meta_boxes' );

function alize_team_meta_box_html( $post ) {
    $role = get_post_meta( $post->ID, '_team_role', true );
    $experience = get_post_meta( $post->ID, '_team_experience', true );
    $focus = get_post_meta( $post->ID, '_team_focus', true );
    wp_nonce_field( 'alize_team_meta_box_nonce', 'alize_team_nonce' );
    ?>
    <p>
        <label for="team_role"><strong>Chức vụ (Role):</strong></label><br/>
        <input type="text" id="team_role" name="team_role" value="<?php echo esc_attr( $role ); ?>" style="width:100%; padding:5px;" placeholder="Vd: CEO & Co-Founder" />
    </p>
    <p>
        <label for="team_experience"><strong>Kinh nghiệm (Experience):</strong></label><br/>
        <input type="text" id="team_experience" name="team_experience" value="<?php echo esc_attr( $experience ); ?>" style="width:100%; padding:5px;" placeholder="Vd: 12 years" />
    </p>
    <p>
        <label for="team_focus"><strong>Khu vực chuyên môn (Areas of Focus):</strong></label><br/>
        <input type="text" id="team_focus" name="team_focus" value="<?php echo esc_attr( $focus ); ?>" style="width:100%; padding:5px;" placeholder="Vd: Dubai Marina, Bluewaters Island" />
    </p>
    <?php
}

function alize_save_team_meta( $post_id ) {
    if ( ! isset( $_POST['alize_team_nonce'] ) || ! wp_verify_nonce( $_POST['alize_team_nonce'], 'alize_team_meta_box_nonce' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    if ( isset( $_POST['team_role'] ) ) {
        update_post_meta( $post_id, '_team_role', sanitize_text_field( $_POST['team_role'] ) );
    }
    if ( isset( $_POST['team_experience'] ) ) {
        update_post_meta( $post_id, '_team_experience', sanitize_text_field( $_POST['team_experience'] ) );
    }
    if ( isset( $_POST['team_focus'] ) ) {
        update_post_meta( $post_id, '_team_focus', sanitize_text_field( $_POST['team_focus'] ) );
    }
}
add_action( 'save_post_cpt_team', 'alize_save_team_meta' );
