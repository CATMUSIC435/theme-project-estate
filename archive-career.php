<?php
/**
 * The template for displaying career archives.
 *
 * @package Alize_Luxury
 */

get_header();
?>

<main id="primary" class="site-main bg-zinc-50 min-h-screen pb-24">
    
    <!-- Hero Section -->
    <section class="career-hero pt-32 pb-20 bg-zinc-900 overflow-hidden relative">
        <div class="absolute inset-0 overflow-hidden opacity-10 pointer-events-none">
            <svg class="absolute w-full h-full text-champagne-gold" width="100%" height="100%" fill="none" stroke="currentColor" stroke-width="1.5">
                <defs><pattern id="grid-c" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M0 40V0h40"/></pattern></defs>
                <rect width="100%" height="100%" fill="url(#grid-c)" />
            </svg>
        </div>
        <div class="container mx-auto px-4 relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-serif text-white mb-6 uppercase tracking-wider">Cơ Hội Nghề Nghiệp</h1>
            <p class="text-lg md:text-xl text-zinc-400 max-w-2xl mx-auto">Gia nhập đội ngũ tinh hoa, kiến tạo những không gian sống đẳng cấp và vươn xa cùng Alize Luxury.</p>
        </div>
    </section>

    <!-- Career Listings -->
    <section class="career-list -mt-10 relative z-20">
        <div class="container mx-auto px-4 max-w-6xl">
            <?php if ( have_posts() ) : ?>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        $location = get_field('career_location');
                        $deadline_raw = get_field('career_deadline', false, false);
                        $quantity = get_field('career_quantity');
                        
                        // Parse deadline
                        $deadline_formatted = '';
                        if ( $deadline_raw ) {
                            $date = DateTime::createFromFormat('Ymd', $deadline_raw);
                            if ($date) {
                                $deadline_formatted = $date->format('d/m/Y');
                            }
                        }
                    ?>
                        <div class="bg-white rounded-2xl shadow-lg border border-zinc-100 hover:shadow-2xl hover:border-champagne-gold transition-all duration-300 flex flex-col h-full group">
                            <div class="p-8 flex-grow">
                                <h2 class="text-2xl font-serif text-zinc-900 mb-4 group-hover:text-champagne-gold transition-colors duration-300">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                
                                <ul class="space-y-3 mb-8">
                                    <?php if ($location): ?>
                                    <li class="flex items-center text-zinc-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-champagne-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span class="text-sm"><?php echo esc_html($location); ?></span>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if ($quantity): ?>
                                    <li class="flex items-center text-zinc-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-champagne-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <span class="text-sm">Số lượng: <?php echo esc_html($quantity); ?> người</span>
                                    </li>
                                    <?php endif; ?>
                                    
                                    <?php if ($deadline_formatted): ?>
                                    <li class="flex items-center text-zinc-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-champagne-gold shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm">Hạn nộp: <?php echo esc_html($deadline_formatted); ?></span>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            
                            <div class="px-8 pb-8 mt-auto">
                                <a href="<?php the_permalink(); ?>" class="inline-flex w-full justify-center items-center py-3 bg-zinc-900 text-white font-medium uppercase tracking-wide text-sm rounded-full hover:bg-champagne-gold hover:text-zinc-900 transition-colors duration-300">
                                    Xem chi tiết & Ứng tuyển
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-16 text-center pagination">
                    <?php
                    the_posts_pagination( array(
                        'mid_size'  => 2,
                        'prev_text' => __( '« Trước', 'alize-luxury' ),
                        'next_text' => __( 'Sau »', 'alize-luxury' ),
                        'class'     => 'flex justify-center space-x-2',
                    ) );
                    ?>
                </div>

            <?php else : ?>
                <div class="bg-white p-12 text-center rounded-2xl shadow-sm border border-zinc-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-zinc-300 mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h2 class="text-2xl font-serif text-zinc-800 mb-2">Hiện tại chưa có vị trí tuyển dụng nào</h2>
                    <p class="text-zinc-500">Vui lòng quay lại sau để cập nhật những cơ hội nghề nghiệp mới nhất.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
