<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_career_data',
    'title' => 'Thông tin Tuyển dụng',
    'fields' => array(
        array(
            'key' => 'field_career_description',
            'label' => 'Mô tả công việc chi tiết',
            'name' => 'career_description',
            'type' => 'wysiwyg',
            'tabs' => 'all',
            'toolbar' => 'full',
            'media_upload' => 1,
            'delay' => 0,
        ),
        array(
            'key' => 'field_career_location',
            'label' => 'Địa điểm làm việc',
            'name' => 'career_location',
            'type' => 'text',
            'placeholder' => 'Vd: TP.HCM, Hà Nội...',
        ),
        array(
            'key' => 'field_career_deadline',
            'label' => 'Ngày hết hạn tuyển dụng',
            'name' => 'career_deadline',
            'type' => 'date_picker',
            'display_format' => 'd/m/Y',
            'return_format' => 'Ymd',
            'first_day' => 1,
        ),
        array(
            'key' => 'field_career_quantity',
            'label' => 'Số lượng cần tuyển',
            'name' => 'career_quantity',
            'type' => 'number',
            'min' => 1,
            'placeholder' => 'Vd: 5',
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'career',
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
