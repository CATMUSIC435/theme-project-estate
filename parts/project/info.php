<?php
/**
 * Template part for displaying project info
 */

$investor = get_field('project_investor');
$location = get_field('project_location_text');
$scale = get_field('project_scale');
$product_type = get_field('project_product_type');
$price = get_field('project_price');
$progress = get_field('project_progress');
$handover = get_field('project_handover');
$short_desc = get_field('project_short_desc');
$highlights = get_field('project_highlights');

// Featured image as hero background
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
