<?php
/**
 * Template part for displaying project floorplans
 */

$floorplans = get_field('project_floorplans_list');

if ( ! $floorplans || ! is_array($floorplans) ) {
    return;
}
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
