<?php
/**
 * Template part for displaying project amenities
 */

$amenities = get_field('project_amenities_list');

if ( ! $amenities || ! is_array($amenities) ) {
    return;
}
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
                            // If icon contains SVG code, output directly. Else assume class name.
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
