<?php
/**
 * The template for displaying all single projects.
 *
 * @package Alize_Luxury
 */

get_header();

// Setup SEO tags before outputting body if possible (already done via wp_head normally)
?>

<main id="primary" class="site-main project-single-main bg-white">
	<?php
	while ( have_posts() ) :
		the_post();

        /* ==========================================
           1. THÔNG TIN TỔNG QUAN
        ========================================== */
        $investor = get_field('project_investor');
        $location = get_field('project_location_text');
        $scale = get_field('project_scale');
        $product_type = get_field('project_product_type');
        $price = get_field('project_price');
        $progress = get_field('project_progress');
        $handover = get_field('project_handover');
        $short_desc = get_field('project_short_desc');
        $highlights = get_field('project_highlights');

        $hero_bg_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if ( ! $hero_bg_url ) {
            $hero_bg_url = get_template_directory_uri() . '/assets/images/default-hero.jpg';
        }
        ?>

        <section class="project-hero relative w-full h-[70vh] min-h-[500px] flex items-center justify-center bg-zinc-900 overflow-hidden">
            <div class="absolute inset-0 w-full h-full">
                <img src="<?php echo esc_url($hero_bg_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" class="w-full h-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-t from-zinc-900/90 via-zinc-900/40 to-transparent"></div>
            </div>
            <div class="container mx-auto px-4 relative z-10 text-center">
                <h1 class="text-4xl md:text-6xl font-serif text-white mb-6 uppercase tracking-wider"><?php the_title(); ?></h1>
                <?php if ($short_desc): ?>
                    <p class="text-lg md:text-xl text-zinc-300 max-w-3xl mx-auto"><?php echo esc_html($short_desc); ?></p>
                <?php endif; ?>
            </div>
        </section>

        <section class="project-overview py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                    
                    <div class="lg:col-span-8">
                        <h2 class="text-3xl font-serif text-zinc-900 mb-8 border-b-2 border-champagne-gold inline-block pb-2">Tổng quan dự án</h2>
                        <?php if ($highlights): ?>
                            <div class="prose max-w-none text-zinc-600 mb-10 prose-headings:font-serif prose-a:text-champagne-gold">
                                <?php echo wp_kses_post($highlights); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="lg:col-span-4">
                        <div class="bg-zinc-50 p-8 rounded-2xl border border-zinc-100 shadow-sm sticky top-24">
                            <h3 class="text-xl font-serif text-zinc-900 mb-6 uppercase tracking-wide">Thông tin nhanh</h3>
                            <ul class="space-y-4 text-zinc-700">
                                <?php if ($investor): ?>
                                    <li class="flex justify-between border-b border-zinc-200 pb-3">
                                        <span class="font-medium text-zinc-500">Chủ đầu tư:</span>
                                        <span class="text-right font-semibold text-zinc-900"><?php echo esc_html($investor); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if ($location): ?>
                                    <li class="flex justify-between border-b border-zinc-200 pb-3">
                                        <span class="font-medium text-zinc-500">Vị trí:</span>
                                        <span class="text-right font-semibold text-zinc-900"><?php echo esc_html($location); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if ($scale): ?>
                                    <li class="flex justify-between border-b border-zinc-200 pb-3">
                                        <span class="font-medium text-zinc-500">Quy mô:</span>
                                        <span class="text-right font-semibold text-zinc-900"><?php echo esc_html($scale); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if ($product_type): ?>
                                    <li class="flex justify-between border-b border-zinc-200 pb-3">
                                        <span class="font-medium text-zinc-500">Loại sản phẩm:</span>
                                        <span class="text-right font-semibold text-zinc-900"><?php echo esc_html($product_type); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if ($price): ?>
                                    <li class="flex justify-between border-b border-zinc-200 pb-3">
                                        <span class="font-medium text-zinc-500">Giá bán:</span>
                                        <span class="text-right font-semibold text-champagne-gold"><?php echo esc_html($price); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if ($progress): ?>
                                    <li class="flex justify-between border-b border-zinc-200 pb-3">
                                        <span class="font-medium text-zinc-500">Tiến độ:</span>
                                        <span class="text-right text-zinc-900"><?php echo esc_html($progress); ?></span>
                                    </li>
                                <?php endif; ?>
                                <?php if ($handover): ?>
                                    <li class="flex justify-between pt-1">
                                        <span class="font-medium text-zinc-500">Bàn giao:</span>
                                        <span class="text-right text-zinc-900"><?php echo esc_html($handover); ?></span>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <div class="mt-8">
                                <a href="#project-contact" class="block w-full text-center bg-zinc-900 text-white font-medium py-4 px-6 rounded-full hover:bg-champagne-gold hover:text-zinc-900 transition-colors duration-300">Nhận thông tin chi tiết</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <?php
        /* ==========================================
           2. VIDEO DỰ ÁN
        ========================================== */
        $video_url = get_field('project_video_url');
        $video_thumbnail = get_field('project_video_thumbnail');

        if ( $video_url ) :
            $thumb_url = $video_thumbnail ? $video_thumbnail['url'] : get_the_post_thumbnail_url(get_the_ID(), 'large');
        ?>
            <section class="project-video py-20 bg-zinc-50">
                <div class="container mx-auto px-4 text-center">
                    <h2 class="text-3xl font-serif text-zinc-900 mb-12 uppercase tracking-wide">Video Trải Nghiệm</h2>
                    <div class="relative max-w-5xl mx-auto rounded-3xl overflow-hidden shadow-2xl group aspect-video bg-zinc-900">
                        <?php if ($thumb_url): ?>
                            <img src="<?php echo esc_url($thumb_url); ?>" alt="Video Thumbnail" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-70 group-hover:opacity-40">
                        <?php endif; ?>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <button class="w-20 h-20 bg-champagne-gold/90 rounded-full flex items-center justify-center text-zinc-900 hover:scale-110 hover:bg-white transition-all duration-300 shadow-lg z-10 cursor-pointer js-play-video" aria-label="Play Video">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                            </button>
                        </div>
                        
                        <div class="hidden js-video-container absolute inset-0 w-full h-full z-20">
                            <?php echo $video_url; // oEmbed HTML ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        /* ==========================================
           3. VỊ TRÍ
        ========================================== */
        $iframe = get_field('project_map_iframe');
        $lat = get_field('project_lat');
        $lng = get_field('project_lng');
        $nearby = get_field('project_nearby');

        if ( $iframe || $nearby ) :
            $icon_mapping = array(
                'school' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7"/>',
                'hospital' => '<path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10M12 13v4m-2-2h4"/>',
                'mall' => '<path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>',
                'traffic' => '<path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                'other' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>',
            );
        ?>
            <section class="project-location py-20 bg-white" id="project-location">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-serif text-zinc-900 mb-4 tracking-wide uppercase">Vị trí đắc địa</h2>
                        <p class="text-zinc-500 max-w-2xl mx-auto">Kết nối giao thông thuận tiện, thừa hưởng trọn vẹn tiện ích khu vực.</p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        <div class="lg:col-span-8 order-2 lg:order-1">
                            <?php if ($iframe): ?>
                                <div class="rounded-3xl overflow-hidden shadow-lg h-[400px] md:h-[600px] relative [&>iframe]:w-full [&>iframe]:h-full [&>iframe]:absolute [&>iframe]:inset-0">
                                    <?php echo $iframe; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="lg:col-span-4 order-1 lg:order-2">
                            <?php if ($nearby && is_array($nearby)): ?>
                                <h3 class="text-2xl font-serif text-zinc-900 mb-6 border-b border-zinc-200 pb-4">Kết nối khu vực</h3>
                                <ul class="space-y-6">
                                    <?php foreach ($nearby as $item): 
                                        $type_key = isset($item['type']) ? $item['type'] : 'other';
                                        $svg_path = isset($icon_mapping[$type_key]) ? $icon_mapping[$type_key] : $icon_mapping['other'];
                                    ?>
                                        <li class="flex items-start group">
                                            <div class="w-12 h-12 rounded-full bg-zinc-50 border border-zinc-200 flex items-center justify-center text-champagne-gold group-hover:bg-champagne-gold group-hover:text-white transition-colors duration-300 mt-1 shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <?php echo $svg_path; ?>
                                                </svg>
                                            </div>
                                            <div class="ml-4">
                                                <h4 class="text-lg font-medium text-zinc-800"><?php echo esc_html($item['name']); ?></h4>
                                                <?php if (!empty($item['distance'])): ?>
                                                    <p class="text-sm text-zinc-500 mt-1"><?php echo esc_html($item['distance']); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        /* ==========================================
           4. TIỆN ÍCH
        ========================================== */
        $amenities = get_field('project_amenities_list');
        if ( $amenities && is_array($amenities) ) :
        ?>
            <section class="project-amenities py-20 bg-zinc-50" id="project-amenities">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-serif text-zinc-900 mb-4 tracking-wide uppercase">Hệ thống Tiện ích</h2>
                        <p class="text-zinc-500 max-w-2xl mx-auto">Tận hưởng không gian sống đẳng cấp với chuỗi tiện ích nội khu hoàn hảo.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <?php foreach ($amenities as $amenity): 
                            $icon = isset($amenity['icon']) ? $amenity['icon'] : '';
                            $name = isset($amenity['name']) ? $amenity['name'] : '';
                            $desc = isset($amenity['desc']) ? $amenity['desc'] : '';
                        ?>
                            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-zinc-100 group text-center">
                                <?php if ($icon): ?>
                                    <div class="w-16 h-16 mx-auto bg-champagne-gold/10 text-champagne-gold rounded-full flex items-center justify-center mb-6 group-hover:bg-champagne-gold group-hover:text-white transition-colors duration-300">
                                        <?php 
                                        if (strpos($icon, '<svg') !== false) {
                                            echo $icon;
                                        } else {
                                            echo '<i class="' . esc_attr($icon) . ' text-2xl"></i>';
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
                                <h3 class="text-xl font-medium text-zinc-900 mb-3"><?php echo esc_html($name); ?></h3>
                                <?php if ($desc): ?>
                                    <p class="text-zinc-500 text-sm leading-relaxed"><?php echo esc_html($desc); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        /* ==========================================
           5. MẶT BẰNG
        ========================================== */
        $floorplans = get_field('project_floorplans_list');
        if ( $floorplans && is_array($floorplans) ) :
        ?>
            <section class="project-floorplans py-20 bg-white" id="project-floorplans">
                <div class="container mx-auto px-4">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-serif text-zinc-900 mb-4 tracking-wide uppercase">Mặt bằng Thiết kế</h2>
                        <p class="text-zinc-500 max-w-2xl mx-auto">Thiết kế tối ưu công năng, đón nắng gió tự nhiên.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach ($floorplans as $plan): 
                            $title = isset($plan['title']) ? $plan['title'] : '';
                            $type = isset($plan['type']) ? $plan['type'] : '';
                            $image = isset($plan['image']) && is_array($plan['image']) ? $plan['image']['url'] : '';
                            $pdf = isset($plan['pdf']) ? $plan['pdf'] : '';
                        ?>
                            <div class="bg-zinc-50 rounded-2xl overflow-hidden shadow-sm border border-zinc-100 group">
                                <div class="relative overflow-hidden aspect-[4/3] bg-white p-4">
                                    <?php if ($image): ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-500 lazy">
                                    <?php endif; ?>
                                </div>
                                <div class="p-6">
                                    <div class="flex justify-between items-start mb-4">
                                        <div>
                                            <h3 class="text-xl font-serif text-zinc-900 mb-1"><?php echo esc_html($title); ?></h3>
                                            <?php if ($type): ?>
                                                <span class="text-sm font-medium text-champagne-gold"><?php echo esc_html($type); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ($pdf): ?>
                                        <a href="<?php echo esc_url($pdf); ?>" target="_blank" class="inline-flex items-center text-sm font-medium text-zinc-700 hover:text-champagne-gold transition-colors duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                              <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Tải Layout (PDF)
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        /* ==========================================
           6. GALLERY
        ========================================== */
        $gallery = get_field('project_gallery');
        if ( $gallery && is_array($gallery) ) :
        ?>
            <section class="project-gallery py-20 bg-zinc-900 text-white" id="project-gallery">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-end mb-12">
                        <div>
                            <h2 class="text-3xl font-serif mb-4 tracking-wide uppercase text-champagne-gold">Thư viện Hình ảnh</h2>
                            <p class="text-zinc-400 max-w-xl">Khám phá không gian sống chân thực qua từng góc nhìn.</p>
                        </div>
                        <div class="hidden md:flex gap-4">
                            <button class="gallery-prev w-12 h-12 rounded-full border border-zinc-700 flex items-center justify-center hover:bg-champagne-gold hover:text-zinc-900 hover:border-champagne-gold transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                            </button>
                            <button class="gallery-next w-12 h-12 rounded-full border border-zinc-700 flex items-center justify-center hover:bg-champagne-gold hover:text-zinc-900 hover:border-champagne-gold transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                            </button>
                        </div>
                    </div>

                    <div class="swiper project-gallery-swiper overflow-visible">
                        <div class="swiper-wrapper">
                            <?php foreach ($gallery as $image): ?>
                                <div class="swiper-slide w-[80%] md:w-[60%] lg:w-[40%]">
                                    <a href="<?php echo esc_url($image['url']); ?>" class="block rounded-2xl overflow-hidden aspect-[4/5] group js-lightbox">
                                        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                            <span class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" /></svg>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        /* ==========================================
           7. BẢNG GIÁ
        ========================================== */
        $pricing_list = get_field('project_pricing_list');
        if ( $pricing_list && is_array($pricing_list) ) :
            $status_labels = array(
                'available' => '<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold uppercase tracking-wider">Đang mở bán</span>',
                'sold'      => '<span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold uppercase tracking-wider">Đã bán</span>',
                'coming'    => '<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold uppercase tracking-wider">Sắp ra mắt</span>',
            );
        ?>
            <section class="project-pricing py-20 bg-white" id="project-pricing">
                <div class="container mx-auto px-4 max-w-5xl">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-serif text-zinc-900 mb-4 tracking-wide uppercase">Bảng Giá Căn Hộ</h2>
                        <p class="text-zinc-500 max-w-2xl mx-auto">Thông tin giá bán chi tiết từng loại hình sản phẩm.</p>
                    </div>

                    <div class="overflow-x-auto rounded-2xl border border-zinc-200 shadow-sm">
                        <table class="w-full text-left border-collapse min-w-[600px]">
                            <thead>
                                <tr class="bg-zinc-50 border-b border-zinc-200">
                                    <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Loại căn hộ</th>
                                    <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Diện tích</th>
                                    <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Giá bán dự kiến</th>
                                    <th class="py-5 px-6 font-serif text-zinc-900 font-medium">Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-100">
                                <?php foreach ($pricing_list as $price_item): 
                                    $type = isset($price_item['type']) ? $price_item['type'] : '';
                                    $area = isset($price_item['area']) ? $price_item['area'] : '';
                                    $price = isset($price_item['price']) ? $price_item['price'] : '';
                                    $status_key = isset($price_item['status']) ? $price_item['status'] : 'available';
                                    $status_html = isset($status_labels[$status_key]) ? $status_labels[$status_key] : '';
                                ?>
                                    <tr class="hover:bg-zinc-50/50 transition-colors duration-200">
                                        <td class="py-4 px-6 font-medium text-zinc-900"><?php echo esc_html($type); ?></td>
                                        <td class="py-4 px-6 text-zinc-600"><?php echo esc_html($area); ?></td>
                                        <td class="py-4 px-6 font-semibold text-champagne-gold"><?php echo esc_html($price); ?></td>
                                        <td class="py-4 px-6"><?php echo $status_html; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php
        /* ==========================================
           8. LIÊN HỆ
        ========================================== */
        ?>
        <section class="project-contact py-24 bg-zinc-900 text-white relative" id="project-contact">
            <div class="absolute inset-0 overflow-hidden opacity-10 pointer-events-none">
                <svg class="absolute w-full h-full text-champagne-gold" width="100%" height="100%" fill="none" stroke="currentColor" stroke-width="1.5">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M0 40V0h40"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>
            <div class="container mx-auto px-4 relative z-10">
                <div class="max-w-3xl mx-auto bg-zinc-800/80 backdrop-blur-lg p-10 md:p-14 rounded-3xl border border-zinc-700 shadow-2xl">
                    <div class="text-center mb-10">
                        <h2 class="text-3xl font-serif text-white mb-4 tracking-wide uppercase">Nhận Tâm Điểm Đầu Tư</h2>
                        <p class="text-zinc-400">Đăng ký ngay để nhận thông tin chi tiết, bảng giá và chính sách ưu đãi mới nhất.</p>
                    </div>

                    <form id="project-registration-form" class="space-y-6">
                        <?php wp_nonce_field('submit_project_form', 'project_nonce'); ?>
                        <input type="hidden" name="project_id" value="<?php echo get_the_ID(); ?>">
                        <input type="hidden" name="action" value="submit_project_registration">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="customer_name" class="block text-sm font-medium text-zinc-300 mb-2">Họ và tên *</label>
                                <input type="text" id="customer_name" name="customer_name" required class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300" placeholder="Nhập họ và tên">
                            </div>
                            <div>
                                <label for="customer_phone" class="block text-sm font-medium text-zinc-300 mb-2">Số điện thoại *</label>
                                <input type="tel" id="customer_phone" name="customer_phone" required class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300" placeholder="Nhập số điện thoại">
                            </div>
                        </div>

                        <div>
                            <label for="customer_email" class="block text-sm font-medium text-zinc-300 mb-2">Email</label>
                            <input type="email" id="customer_email" name="customer_email" class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300" placeholder="Nhập email của bạn (không bắt buộc)">
                        </div>

                        <div>
                            <label for="customer_content" class="block text-sm font-medium text-zinc-300 mb-2">Lời nhắn / Yêu cầu</label>
                            <textarea id="customer_content" name="customer_content" rows="4" class="w-full bg-zinc-900/50 border border-zinc-600 rounded-xl px-4 py-3 text-white placeholder-zinc-500 focus:outline-none focus:border-champagne-gold focus:ring-1 focus:ring-champagne-gold transition-colors duration-300 resize-none" placeholder="Bạn cần tư vấn thêm về..."></textarea>
                        </div>

                        <div class="pt-4 text-center">
                            <button type="submit" id="btn-submit-registration" class="inline-flex items-center justify-center w-full md:w-auto px-10 py-4 font-serif text-lg tracking-wide uppercase bg-champagne-gold text-zinc-900 hover:bg-white transition-colors duration-300 rounded-full font-medium min-w-[200px]">
                                <span id="btn-text">Gửi Yêu Cầu</span>
                                <svg id="btn-loader" class="hidden animate-spin ml-3 h-5 w-5 text-zinc-900" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <div id="form-message" class="hidden mt-4 text-center text-sm font-medium p-3 rounded-lg"></div>
                    </form>
                </div>
            </div>
        </section>

	<?php endwhile; // End of the loop. ?>

    <!-- JS for Video, Gallery Lightbox, Form Submission -->
    <div id="gallery-lightbox" class="fixed inset-0 z-50 bg-black/95 hidden flex items-center justify-center opacity-0 transition-opacity duration-300">
        <button class="absolute top-6 right-6 text-white hover:text-champagne-gold transition-colors js-close-lightbox">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
        </button>
        <img id="lightbox-img" src="" alt="" class="max-h-[90vh] max-w-[90vw] object-contain">
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- 1. Video Play ---
        const playBtn = document.querySelector('.js-play-video');
        const container = document.querySelector('.js-video-container');
        if (playBtn && container) {
            playBtn.addEventListener('click', function() {
                container.classList.remove('hidden');
                const iframe = container.querySelector('iframe');
                if (iframe) {
                    let src = iframe.getAttribute('src');
                    if (src.indexOf('?') > -1) {
                        iframe.setAttribute('src', src + '&autoplay=1');
                    } else {
                        iframe.setAttribute('src', src + '?autoplay=1');
                    }
                }
            });
        }

        // --- 2. Swiper ---
        if (typeof Swiper !== 'undefined') {
            new Swiper('.project-gallery-swiper', {
                slidesPerView: 'auto',
                spaceBetween: 30,
                grabCursor: true,
                navigation: {
                    nextEl: '.gallery-next',
                    prevEl: '.gallery-prev',
                },
            });
        }

        // --- 3. Lightbox ---
        const links = document.querySelectorAll('.js-lightbox');
        const lightbox = document.getElementById('gallery-lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const closeBtn = document.querySelector('.js-close-lightbox');

        if (links.length > 0 && lightbox) {
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    lightboxImg.setAttribute('src', this.getAttribute('href'));
                    lightbox.classList.remove('hidden');
                    setTimeout(() => lightbox.classList.remove('opacity-0'), 10);
                });
            });

            const closeLightbox = () => {
                lightbox.classList.add('opacity-0');
                setTimeout(() => {
                    lightbox.classList.add('hidden');
                    lightboxImg.setAttribute('src', '');
                }, 300);
            };

            closeBtn.addEventListener('click', closeLightbox);
            lightbox.addEventListener('click', e => {
                if (e.target === lightbox) closeLightbox();
            });
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') closeLightbox();
            });
        }

        // --- 4. Form Submission ---
        const form = document.getElementById('project-registration-form');
        const msgBox = document.getElementById('form-message');
        const btnSubmit = document.getElementById('btn-submit-registration');
        const btnText = document.getElementById('btn-text');
        const btnLoader = document.getElementById('btn-loader');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                btnSubmit.disabled = true;
                btnSubmit.classList.add('opacity-80', 'cursor-not-allowed');
                btnText.textContent = 'Đang xử lý...';
                btnLoader.classList.remove('hidden');
                msgBox.classList.add('hidden');
                msgBox.className = 'hidden mt-4 text-center text-sm font-medium p-3 rounded-lg';
                
                const formData = new FormData(form);
                
                fetch(typeof alizeData !== 'undefined' ? alizeData.ajax_url : '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    msgBox.classList.remove('hidden');
                    form.reset();
                    if (data.success) {
                        msgBox.classList.add('bg-green-100', 'text-green-700');
                        msgBox.innerHTML = data.data.message || 'Gửi yêu cầu thành công!';
                    } else {
                        msgBox.classList.add('bg-red-100', 'text-red-700');
                        msgBox.innerHTML = data.data.message || 'Có lỗi xảy ra. Vui lòng thử lại sau.';
                    }
                })
                .catch(error => {
                    msgBox.classList.remove('hidden');
                    msgBox.classList.add('bg-red-100', 'text-red-700');
                    msgBox.innerHTML = 'Lỗi kết nối. Vui lòng thử lại.';
                    console.error('Error:', error);
                })
                .finally(() => {
                    btnSubmit.disabled = false;
                    btnSubmit.classList.remove('opacity-80', 'cursor-not-allowed');
                    btnText.textContent = 'Gửi Yêu Cầu';
                    btnLoader.classList.add('hidden');
                });
            });
        }
    });
    </script>
</main><!-- #main -->

<?php
get_footer();
