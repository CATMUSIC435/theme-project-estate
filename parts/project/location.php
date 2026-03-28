<?php
/**
 * Template part for displaying project location
 */

$iframe = get_field('project_map_iframe');
$lat = get_field('project_lat');
$lng = get_field('project_lng');
$nearby = get_field('project_nearby');

if ( ! $iframe && ! $nearby ) {
    return;
}

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
