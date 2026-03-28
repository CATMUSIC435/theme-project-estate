<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_timeline_data',
    'title' => 'Thông tin Mốc Timeline',
    'fields' => array(
        array(
            'key' => 'field_timeline_step',
            'label' => 'Số thứ tự Bước',
            'name' => 'timeline_step',
            'type' => 'text',
            'instructions' => 'Ví dụ: 01, 02, 03... (Sẽ hiển thị to trên frontend)',
            'required' => 1,
            'placeholder' => '01',
        ),
        array(
            'key' => 'field_timeline_year',
            'label' => 'Năm (hoặc Thời gian)',
            'name' => 'timeline_year',
            'type' => 'text',
            'instructions' => 'Ví dụ: 2017, Tháng 5/2021',
            'placeholder' => '2018',
        ),
        array(
            'key' => 'field_timeline_desc',
            'label' => 'Mô tả ngắn',
            'name' => 'timeline_desc',
            'type' => 'textarea',
            'instructions' => 'Mô tả chi tiết sự kiện',
            'rows' => 4,
        ),
        array(
            'key' => 'field_timeline_color',
            'label' => 'Màu sắc chủ đạo (Gradient)',
            'name' => 'timeline_color',
            'type' => 'select',
            'choices' => array(
                'yellow' => 'Vàng (Yellow)',
                'red'    => 'Đỏ Cam (Red/Orange)',
                'green'  => 'Xanh lá (Green)',
                'blue'   => 'Xanh dương (Blue)',
                'purple' => 'Tím (Purple)',
            ),
            'default_value' => 'blue',
            'return_format' => 'value',
        ),
        array(
            'key' => 'field_timeline_icon_svg',
            'label' => 'Icon SVG (trong vòng tròn) - Tùy chọn',
            'name' => 'timeline_icon_svg',
            'type' => 'textarea',
            'instructions' => 'Dán mã <svg> vào đây nếu muốn thay đổi icon mặc định. Để trống sẽ hiện icon mặc định theo màu.',
            'rows' => 3,
        ),
        array(
            'key' => 'field_timeline_image',
            'label' => 'Ảnh minh họa',
            'name' => 'timeline_image',
            'type' => 'image',
            'instructions' => 'Sẽ hiển thị ảnh hình tròn cắt trên timeline',
            'return_format' => 'array',
            'preview_size' => 'medium',
            'library' => 'all',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'timeline',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
        0 => 'the_content',
    ),
    'active' => true,
    'description' => '',
));

endif;
