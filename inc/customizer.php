<?php
/**
 * Alize Luxury Theme Customizer
 */

function alize_luxury_customize_register( $wp_customize ) {

	// ================================
	// 1. HERO SECTION
	// ================================
	$wp_customize->add_section('alize_hero_section', array(
		'title'    => __('Khối Hero (Ảnh bìa)', 'alize-luxury'),
		'priority' => 30,
	));

	// Hero Title
	$wp_customize->add_setting('hero_title', array(
		'default'           => 'Kiến tạo không gian <br><span>đẳng cấp</span>',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('hero_title', array(
		'label'       => __('Tiêu đề chính (cho phép thẻ HTML)', 'alize-luxury'),
		'section'     => 'alize_hero_section',
		'type'        => 'textarea',
	));

	// Hero Subtitle
	$wp_customize->add_setting('hero_subtitle', array(
		'default'           => 'Nơi khởi nguồn thịnh vượng - Vững bước tương lai',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('hero_subtitle', array(
		'label'   => __('Tiêu đề phụ', 'alize-luxury'),
		'section' => 'alize_hero_section',
		'type'    => 'text',
	));

	// Hero Button Text
	$wp_customize->add_setting('hero_btn_text', array(
		'default'           => 'Khám phá dự án',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('hero_btn_text', array(
		'label'   => __('Chữ trên Nút bấm', 'alize-luxury'),
		'section' => 'alize_hero_section',
		'type'    => 'text',
	));

	// Hero Button Link
	$wp_customize->add_setting('hero_btn_url', array(
		'default'           => '#projects',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('hero_btn_url', array(
		'label'   => __('Link Nút bấm URL', 'alize-luxury'),
		'section' => 'alize_hero_section',
		'type'    => 'url',
	));

	// Hero Background Image
	$wp_customize->add_setting('hero_bg_image', array(
		'default'           => 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=2000',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_bg_image', array(
		'label'   => __('Ảnh Nền (Background Image)', 'alize-luxury'),
		'section' => 'alize_hero_section',
	)));


	// ================================
	// 2. ABOUT SECTION
	// ================================
	$wp_customize->add_section('alize_about_section', array(
		'title'    => __('Khối Giới Thiệu (About)', 'alize-luxury'),
		'priority' => 31,
	));

	// About Title
	$wp_customize->add_setting('about_title', array(
		'default'           => 'Về Chúng Tôi',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('about_title', array(
		'label'   => __('Tiêu đề', 'alize-luxury'),
		'section' => 'alize_about_section',
		'type'    => 'text',
	));

	// About Lead Text
	$wp_customize->add_setting('about_lead', array(
		'default'           => 'Hơn 15 năm kinh nghiệm trong lĩnh vực phát triển bất động sản cao cấp, chúng tôi cam kết mang đến những giá trị sống đích thực và bền vững cho cộng đồng.',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('about_lead', array(
		'label'   => __('Đoạn văn mở đầu (Lead)', 'alize-luxury'),
		'section' => 'alize_about_section',
		'type'    => 'textarea',
	));

	// About Description Text
	$wp_customize->add_setting('about_desc', array(
		'default'           => 'Tự hào là đơn vị tiên phong trong việc kiến tạo những không gian sống xanh, thông minh và hiện đại. Mỗi dự án của chúng tôi đều là một kiệt tác kiến trúc, hòa quyện giữa thiên nhiên và tiện ích đẳng cấp.',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('about_desc', array(
		'label'   => __('Đoạn mô tả chi tiết', 'alize-luxury'),
		'section' => 'alize_about_section',
		'type'    => 'textarea',
	));

	// About Image
	$wp_customize->add_setting('about_image', array(
		'default'           => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=1000',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
		'label'   => __('Ảnh minh họa', 'alize-luxury'),
		'section' => 'alize_about_section',
	)));

	// (We could add stat fields here too, but for speed we'll leave them hardcoded in block or add later if needed)

	// ================================
	// 3. CONTACT SECTION
	// ================================
	$wp_customize->add_section('alize_contact_section', array(
		'title'    => __('Khối Liên Hệ (Contact)', 'alize-luxury'),
		'priority' => 37,
	));

	$wp_customize->add_setting('contact_phone', array(
		'default'           => '090 123 4567',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('contact_phone', array(
		'label'   => __('Số điện thoại', 'alize-luxury'),
		'section' => 'alize_contact_section',
	));

	$wp_customize->add_setting('contact_email', array(
		'default'           => 'contact@alizeluxury.com',
		'sanitize_callback' => 'sanitize_email',
	));
	$wp_customize->add_control('contact_email', array(
		'label'   => __('Địa chỉ Email', 'alize-luxury'),
		'section' => 'alize_contact_section',
	));

	$wp_customize->add_setting('contact_address', array(
		'default'           => 'Tòa nhà Alize Tower, 123 Nguyễn Văn Linh, Đà Nẵng',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('contact_address', array(
		'label'   => __('Địa chỉ văn phòng', 'alize-luxury'),
		'section' => 'alize_contact_section',
	));
	// ================================
	// 4. FOOTER SECTION
	// ================================
	$wp_customize->add_section('alize_footer_section', array(
		'title'    => __('Khối Chân Trang (Footer)', 'alize-luxury'),
		'priority' => 38,
	));

	$wp_customize->add_setting('footer_slogan', array(
		'default'           => 'Building Your Dreams<br>In Real Estate',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('footer_slogan', array(
		'label'   => __('Slogan dưới Logo', 'alize-luxury'),
		'section' => 'alize_footer_section',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('footer_col5_text', array(
		'default'           => 'We are here to change<br>your future.',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('footer_col5_text', array(
		'label'   => __('Dòng chữ trên nút Contact', 'alize-luxury'),
		'section' => 'alize_footer_section',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('footer_map', array(
		'default'           => 'https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80&w=800', // A static map screenshot
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_map', array(
		'label'   => __('Ảnh Bản đồ (Map)', 'alize-luxury'),
		'section' => 'alize_footer_section',
	)));

	$wp_customize->add_setting('footer_logo_text', array(
		'default'           => 'Alize<br>Luxury',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('footer_logo_text', array(
		'label'   => __('Chữ Logo Footer', 'alize-luxury'),
		'section' => 'alize_footer_section',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('footer_news_title', array(
		'default'           => 'Đăng ký nhận bản tin',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_news_title', array(
		'label'   => __('Tiêu đề form đăng ký', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_news_desc', array(
		'default'           => 'Cập nhật những thông tin dự án mới nhất<br>và các cơ hội đầu tư hấp dẫn.',
		'sanitize_callback' => 'wp_kses_post',
	));
	$wp_customize->add_control('footer_news_desc', array(
		'label'   => __('Mô tả form đăng ký', 'alize-luxury'),
		'section' => 'alize_footer_section',
		'type'    => 'textarea',
	));

	$wp_customize->add_setting('footer_news_placeholder', array(
		'default'           => 'Nhập email của bạn',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_news_placeholder', array(
		'label'   => __('Chữ mờ ô nhập Email', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_news_btn_text', array(
		'default'           => 'Đăng Ký',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_news_btn_text', array(
		'label'   => __('Chữ nút Đăng Ký', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_menu1_title', array(
		'default'           => 'Điều Hướng Nhanh',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_menu1_title', array(
		'label'   => __('Tiêu đề Cột Menu 1', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_menu2_title', array(
		'default'           => 'Sản Phẩm',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_menu2_title', array(
		'label'   => __('Tiêu đề Cột Menu 2', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_menu3_title', array(
		'default'           => 'Thông Tin',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_menu3_title', array(
		'label'   => __('Tiêu đề Cột Menu 3', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));
	
	$wp_customize->add_setting('footer_bottom_link1_text', array(
		'default'           => 'Điều Khoản Dịch Vụ',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_bottom_link1_text', array(
		'label'   => __('Chữ link dưới 1', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_bottom_link1_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('footer_bottom_link1_url', array(
		'label'   => __('URL link dưới 1', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_bottom_link2_text', array(
		'default'           => 'Chính Sách Bảo Mật',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('footer_bottom_link2_text', array(
		'label'   => __('Chữ link dưới 2', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));

	$wp_customize->add_setting('footer_bottom_link2_url', array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control('footer_bottom_link2_url', array(
		'label'   => __('URL link dưới 2', 'alize-luxury'),
		'section' => 'alize_footer_section',
	));
}
add_action( 'customize_register', 'alize_luxury_customize_register' );
