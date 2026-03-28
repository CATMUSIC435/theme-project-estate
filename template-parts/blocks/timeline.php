<?php
/**
 * Timeline Block Template Part
 * 
 * Displays the custom post type "timeline" in an alternating horizontal layout.
 */

$args = array(
    'post_type'      => 'timeline',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order', // Allow manual sorting in admin
    'order'          => 'ASC',
);
$timeline_query = new WP_Query( $args );

if ( ! $timeline_query->have_posts() ) {
    echo '<p class="text-center text-zinc-500 py-10">Đang cập nhật mốc lịch sử...</p>';
    return;
}

// Color Mapping
$color_classes = array(
    'yellow' => 'from-yellow-300 to-yellow-500 shadow-yellow-500/30',
    'red'    => 'from-red-400 to-orange-500 shadow-red-500/30',
    'green'  => 'from-green-400 to-emerald-500 shadow-green-500/30',
    'blue'   => 'from-cyan-400 to-blue-500 shadow-blue-500/30',
    'purple' => 'from-purple-400 to-indigo-500 shadow-purple-500/30',
);

// Fallback Icons
$fallback_icons = array(
    'yellow' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />',
    'red'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />',
    'green'  => '<path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />',
    'blue'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />',
    'purple' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />',
);
?>

<section class="timeline-section py-20 bg-white overflow-hidden" id="timeline">
    <div class="container mx-auto px-4 mb-16 text-center">
        <h2 class="text-4xl md:text-5xl font-serif text-zinc-900 mb-4 tracking-wide uppercase">Lịch sử phát triển</h2>
        <p class="text-zinc-500 max-w-2xl mx-auto">Những cột mốc quan trọng đánh dấu hành trình vươn mình của chúng tôi.</p>
    </div>

    <!-- Timeline Wrapper (Scrollable Horizontally on Desktop, stacked vertically on small screens) -->
    <div class="w-full overflow-x-auto pb-16 pt-10 hide-scrollbar cursor-grab js-horizontal-scroll">
        <div class="inline-flex flex-col md:flex-row items-center md:items-start relative min-w-full px-4 md:px-20 h-auto md:h-[600px]">
            
            <!-- Horizontal Center Line (Desktop Only) -->
            <div class="hidden md:block absolute top-1/2 left-0 w-full h-1 bg-zinc-900 -translate-y-1/2 z-0"></div>

            <!-- Vertical Center Line (Mobile Only) -->
            <div class="md:hidden absolute left-1/2 top-0 w-1 h-full bg-zinc-900 -translate-x-1/2 z-0"></div>

            <?php
            $index = 0;
            while ( $timeline_query->have_posts() ) :
                $timeline_query->the_post();
                
                $title = get_the_title();
                $step = get_field('timeline_step');
                $year = get_field('timeline_year');
                $desc = get_field('timeline_desc');
                $color_key = get_field('timeline_color');
                $icon_svg = get_field('timeline_icon_svg');
                $image = get_field('timeline_image');

                if (!$color_key) $color_key = 'blue';
                $gradient = isset($color_classes[$color_key]) ? $color_classes[$color_key] : $color_classes['blue'];
                $default_icon = isset($fallback_icons[$color_key]) ? $fallback_icons[$color_key] : $fallback_icons['blue'];
                if (!$icon_svg) {
                    $icon_svg = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">' . $default_icon . '</svg>';
                }

                $is_odd = ($index % 2 == 0); // 0, 2, 4 are odd visually (1st, 3rd, 5th)
                ?>
                
                <!-- Timeline Node -->
                <div class="relative w-full md:w-[350px] shrink-0 flex items-center justify-center md:h-[600px] py-16 md:py-0 group">
                    
                    <!-- The Main Circle Container (Center) -->
                    <div class="z-20 w-16 h-16 rounded-full bg-gradient-to-br <?php echo esc_attr($gradient); ?> text-white flex items-center justify-center shadow-lg relative transition-transform duration-500 group-hover:scale-110 md:absolute md:top-1/2 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2">
                        <?php echo $icon_svg; ?>
                    </div>

                    <?php if ( $is_odd ) : ?>
                        <!-- MOBILE: Content Right, Photo Left /// DESKTOP: Content Top, Photo Bottom -->
                        
                        <!-- Content Box -->
                        <div class="hidden md:block absolute bottom-[calc(50%+3.5rem)] w-64 text-left p-6">
                            <h3 class="text-2xl font-serif text-zinc-900 font-bold mb-1"><?php echo esc_html($title); ?></h3>
                            <div class="flex items-baseline space-x-3 mb-3">
                                <span class="text-3xl font-bold tracking-tighter text-zinc-900"><?php echo esc_html($step); ?></span>
                                <span class="text-sm font-bold text-zinc-500 uppercase tracking-widest"><?php echo esc_html($year); ?></span>
                            </div>
                            <p class="text-sm text-zinc-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                        </div>
                        
                        <!-- Connector Line Top (Desktop) -->
                        <div class="hidden md:block absolute bottom-[calc(50%+2rem)] left-[calc(50%-1px)] w-[2px] h-6 bg-zinc-300"></div>
                        <!-- Connector Line Left (Desktop, pointing right to content box) -->
                        <div class="hidden md:block absolute bottom-[calc(50%+3.5rem)] left-[120px] w-6 h-[2px] bg-zinc-300"></div>
                        <!-- Actually simpler: just a vertical line straight up -->
                        
                        <!-- Let's fix lines for desktop: A simple vertical line connecting circle to text box, and another to photo -->
                        <div class="hidden md:block absolute bottom-[calc(50%+2rem)] left-1/2 w-px h-12 bg-zinc-200"></div>

                        <!-- Photo Box (Desktop) -->
                        <?php if ($image): ?>
                            <div class="hidden md:block absolute top-[calc(50%+3rem)] w-32 h-32 rounded-full overflow-hidden border-[6px] border-white shadow-xl transition-transform duration-700 group-hover:scale-105">
                                <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover">
                            </div>
                            <div class="hidden md:block absolute top-[calc(50%+2rem)] left-1/2 w-px h-6 bg-zinc-200"></div>
                        <?php endif; ?>

                        <!-- MOBILE LAYOUT (Stacked) -->
                        <div class="md:hidden w-1/2 pl-12 py-4">
                            <h3 class="text-xl font-serif text-zinc-900 font-bold mb-1"><?php echo esc_html($title); ?></h3>
                            <div class="flex items-baseline space-x-2 mb-2">
                                <span class="text-2xl font-bold tracking-tighter text-zinc-900"><?php echo esc_html($step); ?></span>
                                <span class="text-xs font-bold text-zinc-500 uppercase tracking-widest"><?php echo esc_html($year); ?></span>
                            </div>
                            <p class="text-sm text-zinc-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                        </div>
                        <?php if ($image): ?>
                            <div class="md:hidden absolute left-8 w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow-lg -translate-x-full">
                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endif; ?>

                    <?php else : ?>
                        <!-- MOBILE: Content Left, Photo Right /// DESKTOP: Content Bottom, Photo Top -->
                        
                        <!-- Content Box (Desktop) -->
                        <div class="hidden md:block absolute top-[calc(50%+3.5rem)] w-64 text-left p-6">
                            <h3 class="text-2xl font-serif text-zinc-900 font-bold mb-1"><?php echo esc_html($title); ?></h3>
                            <div class="flex items-baseline space-x-3 mb-3">
                                <span class="text-3xl font-bold tracking-tighter text-zinc-900"><?php echo esc_html($step); ?></span>
                                <span class="text-sm font-bold text-zinc-500 uppercase tracking-widest"><?php echo esc_html($year); ?></span>
                            </div>
                            <p class="text-sm text-zinc-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                        </div>

                        <!-- Vertical Line Bottom (Desktop) -->
                        <div class="hidden md:block absolute top-[calc(50%+2rem)] left-1/2 w-px h-12 bg-zinc-200"></div>

                        <!-- Photo Box (Desktop) -->
                        <?php if ($image): ?>
                            <div class="hidden md:block absolute bottom-[calc(50%+3rem)] w-32 h-32 rounded-full overflow-hidden border-[6px] border-white shadow-xl transition-transform duration-700 group-hover:scale-105">
                                <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover">
                            </div>
                            <!-- Vertical Line Top (Desktop) -->
                            <div class="hidden md:block absolute bottom-[calc(50%+2rem)] left-1/2 w-px h-6 bg-zinc-200"></div>
                        <?php endif; ?>

                        <!-- MOBILE LAYOUT (Stacked) -->
                        <div class="md:hidden w-1/2 pr-12 py-4 ml-auto text-right flex flex-col items-end">
                            <h3 class="text-xl font-serif text-zinc-900 font-bold mb-1"><?php echo esc_html($title); ?></h3>
                            <div class="flex items-baseline space-x-2 mb-2 flex-row-reverse space-x-reverse">
                                <span class="text-2xl font-bold tracking-tighter text-zinc-900"><?php echo esc_html($step); ?></span>
                                <span class="text-xs font-bold text-zinc-500 uppercase tracking-widest"><?php echo esc_html($year); ?></span>
                            </div>
                            <p class="text-sm text-zinc-500 leading-relaxed"><?php echo esc_html($desc); ?></p>
                        </div>
                        <?php if ($image): ?>
                            <div class="md:hidden absolute right-8 w-16 h-16 rounded-full overflow-hidden border-4 border-white shadow-lg translate-x-full">
                                <img src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($title); ?>" class="w-full h-full object-cover">
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>

            <?php
            $index++;
            endwhile;
            wp_reset_postdata();
            ?>
            
        </div>
    </div>
</section>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
/* Hide scrollbar for IE, Edge and Firefox */
.hide-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.js-horizontal-scroll');
    if (!slider) return;

    let isDown = false;
    let startX;
    let scrollLeft;

    slider.addEventListener('mousedown', (e) => {
        isDown = true;
        slider.classList.add('cursor-grabbing');
        slider.classList.remove('cursor-grab');
        startX = e.pageX - slider.offsetLeft;
        scrollLeft = slider.scrollLeft;
    });

    slider.addEventListener('mouseleave', () => {
        isDown = false;
        slider.classList.remove('cursor-grabbing');
        slider.classList.add('cursor-grab');
    });

    slider.addEventListener('mouseup', () => {
        isDown = false;
        slider.classList.remove('cursor-grabbing');
        slider.classList.add('cursor-grab');
    });

    slider.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - slider.offsetLeft;
        const walk = (x - startX) * 2; // scroll-fast
        slider.scrollLeft = scrollLeft - walk;
    });
});
</script>
