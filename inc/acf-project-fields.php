<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_project_data',
    'title' => 'Thông tin Dự án',
    'fields' => array(
        // Tab 1: Tổng quan
        array(
            'key' => 'field_tab_overview',
            'label' => 'Tổng quan',
            'name' => '',
            'type' => 'tab',
            'placement' => 'top',
        ),
        array(
            'key' => 'field_project_investor',
            'label' => 'Chủ đầu tư',
            'name' => 'project_investor',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_location_text',
            'label' => 'Vị trí dự án',
            'name' => 'project_location_text',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_scale',
            'label' => 'Quy mô',
            'name' => 'project_scale',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_product_type',
            'label' => 'Loại hình sản phẩm',
            'name' => 'project_product_type',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_price',
            'label' => 'Giá bán',
            'name' => 'project_price',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_progress',
            'label' => 'Tiến độ xây dựng',
            'name' => 'project_progress',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_handover',
            'label' => 'Thời gian bàn giao',
            'name' => 'project_handover',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_short_desc',
            'label' => 'Nội dung mô tả ngắn',
            'name' => 'project_short_desc',
            'type' => 'textarea',
            'rows' => 4,
        ),
        array(
            'key' => 'field_project_highlights',
            'label' => 'Điểm nổi bật dự án',
            'name' => 'project_highlights',
            'type' => 'wysiwyg',
        ),

        // Tab 2: Vị trí
        array(
            'key' => 'field_tab_location',
            'label' => 'Vị trí',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_project_map_iframe',
            'label' => 'Nhúng Google Maps',
            'name' => 'project_map_iframe',
            'type' => 'textarea',
            'instructions' => 'Dán mã iframe từ Google Maps',
        ),
        array(
            'key' => 'field_project_lat',
            'label' => 'Latitude',
            'name' => 'project_lat',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_lng',
            'label' => 'Longitude',
            'name' => 'project_lng',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_nearby',
            'label' => 'Danh sách địa điểm lân cận',
            'name' => 'project_nearby',
            'type' => 'repeater',
            'layout' => 'table',
            'sub_fields' => array(
                array(
                    'key' => 'field_nearby_type',
                    'label' => 'Loại địa điểm',
                    'name' => 'type',
                    'type' => 'select',
                    'choices' => array(
                        'school' => 'Trường học',
                        'hospital' => 'Bệnh viện',
                        'mall' => 'Trung tâm thương mại',
                        'traffic' => 'Tuyến giao thông chính',
                        'other' => 'Khác',
                    ),
                ),
                array(
                    'key' => 'field_nearby_name',
                    'label' => 'Tên địa điểm',
                    'name' => 'name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_nearby_distance',
                    'label' => 'Khoảng cách',
                    'name' => 'distance',
                    'type' => 'text',
                    'placeholder' => 'VD: 5 minutes / 2 km',
                ),
            ),
        ),

        // Tab 3: Tiện ích
        array(
            'key' => 'field_tab_amenities',
            'label' => 'Tiện ích',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_project_amenities_list',
            'label' => 'Danh sách tiện ích',
            'name' => 'project_amenities_list',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_amenity_icon',
                    'label' => 'Icon (SVG/Class)',
                    'name' => 'icon',
                    'type' => 'text',
                    'instructions' => 'Class SVG hoặc mã SVG',
                ),
                array(
                    'key' => 'field_amenity_name',
                    'label' => 'Tên tiện ích',
                    'name' => 'name',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_amenity_desc',
                    'label' => 'Mô tả ngắn',
                    'name' => 'desc',
                    'type' => 'textarea',
                    'rows' => 2,
                ),
            ),
        ),

        // Tab 4: Mặt bằng
        array(
            'key' => 'field_tab_floorplans',
            'label' => 'Mặt bằng',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_project_floorplans_list',
            'label' => 'Danh sách mặt bằng',
            'name' => 'project_floorplans_list',
            'type' => 'repeater',
            'layout' => 'block',
            'sub_fields' => array(
                array(
                    'key' => 'field_floorplan_title',
                    'label' => 'Tiêu đề',
                    'name' => 'title',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_floorplan_type',
                    'label' => 'Loại căn hộ',
                    'name' => 'type',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_floorplan_image',
                    'label' => 'Hình ảnh',
                    'name' => 'image',
                    'type' => 'image',
                    'return_format' => 'array',
                ),
                array(
                    'key' => 'field_floorplan_pdf',
                    'label' => 'File PDF tải xuống',
                    'name' => 'pdf',
                    'type' => 'file',
                    'return_format' => 'url',
                ),
            ),
        ),

        // Tab 5: Gallery
        array(
            'key' => 'field_tab_gallery',
            'label' => 'Thư viện hình ảnh',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_project_gallery',
            'label' => 'Gallery Ảnh',
            'name' => 'project_gallery',
            'type' => 'gallery',
            'return_format' => 'array',
        ),
        array(
            'key' => 'field_project_video_url',
            'label' => 'Video Review (YouTube/Vimeo)',
            'name' => 'project_video_url',
            'type' => 'oembed',
        ),
        array(
            'key' => 'field_project_video_thumbnail',
            'label' => 'Ảnh Thumbnail Video',
            'name' => 'project_video_thumbnail',
            'type' => 'image',
            'return_format' => 'array',
        ),

        // Tab 6: Bảng giá
        array(
            'key' => 'field_tab_pricing',
            'label' => 'Bảng giá',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_project_pricing_list',
            'label' => 'Bảng giá căn hộ',
            'name' => 'project_pricing_list',
            'type' => 'repeater',
            'layout' => 'table',
            'sub_fields' => array(
                array(
                    'key' => 'field_pricing_type',
                    'label' => 'Loại căn hộ',
                    'name' => 'type',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_pricing_area',
                    'label' => 'Diện tích',
                    'name' => 'area',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_pricing_price',
                    'label' => 'Giá bán',
                    'name' => 'price',
                    'type' => 'text',
                ),
                array(
                    'key' => 'field_pricing_status',
                    'label' => 'Tình trạng',
                    'name' => 'status',
                    'type' => 'select',
                    'choices' => array(
                        'available' => 'Đang mở bán',
                        'sold' => 'Đã bán',
                        'coming' => 'Sắp ra mắt',
                    ),
                ),
            ),
        ),

        // Tab 7: SEO
        array(
            'key' => 'field_tab_seo',
            'label' => 'SEO Tùy chỉnh (Tùy chọn)',
            'name' => '',
            'type' => 'tab',
        ),
        array(
            'key' => 'field_project_seo_title',
            'label' => 'Meta Title động',
            'name' => 'project_seo_title',
            'type' => 'text',
        ),
        array(
            'key' => 'field_project_seo_desc',
            'label' => 'Meta Description động',
            'name' => 'project_seo_desc',
            'type' => 'textarea',
            'rows' => 3,
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'project',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));

// Group for Registration
acf_add_local_field_group(array(
    'key' => 'group_project_registration_data',
    'title' => 'Thông tin Khách hàng',
    'fields' => array(
        array(
            'key' => 'field_reg_project_id',
            'label' => 'Dự án quan tâm',
            'name' => 'reg_project_id',
            'type' => 'post_object',
            'post_type' => array('project'),
            'return_format' => 'object',
        ),
        array(
            'key' => 'field_reg_name',
            'label' => 'Họ tên',
            'name' => 'reg_name',
            'type' => 'text',
        ),
        array(
            'key' => 'field_reg_phone',
            'label' => 'Số điện thoại',
            'name' => 'reg_phone',
            'type' => 'text',
        ),
        array(
            'key' => 'field_reg_email',
            'label' => 'Email',
            'name' => 'reg_email',
            'type' => 'email',
        ),
        array(
            'key' => 'field_reg_content',
            'label' => 'Nội dung',
            'name' => 'reg_content',
            'type' => 'textarea',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'project_registration',
            ),
        ),
    ),
    'position' => 'normal',
    'style' => 'default',
));

endif;
