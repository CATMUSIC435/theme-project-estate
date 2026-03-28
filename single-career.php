<?php
/**
 * The template for displaying all single career posts.
 *
 * @package Alize_Luxury
 */

get_header();
?>

<main id="primary" class="site-main bg-zinc-50 pb-24">

    <?php
    while ( have_posts() ) :
        the_post();
        
        $description = get_field('career_description');
        if ( ! $description ) {
            $description = get_the_content();
        }
        
        $location = get_field('career_location');
        $deadline_raw = get_field('career_deadline', false, false);
        $quantity = get_field('career_quantity');
        
        $deadline_formatted = '';
        if ( $deadline_raw ) {
            $date = DateTime::createFromFormat('Ymd', $deadline_raw);
            if ($date) {
                $deadline_formatted = $date->format('d/m/Y');
            }
        }
    ?>

    <!-- Page Header -->
    <section class="career-header pt-32 pb-16 bg-zinc-900 relative">
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <a href="<?php echo esc_url(get_post_type_archive_link('career')); ?>" class="inline-flex items-center text-champagne-gold hover:text-white transition-colors duration-300 mb-6 text-sm uppercase tracking-wider font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Trở về danh sách
                </a>
                <h1 class="text-3xl md:text-5xl font-serif text-white mb-6 leading-tight"><?php the_title(); ?></h1>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="career-content -mt-8 relative z-20">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto flex flex-col lg:flex-row gap-12">
                
                <!-- Sidebar Info -->
                <div class="w-full lg:w-1/3 shrink-0">
                    <div class="bg-white p-8 rounded-2xl shadow-xl border border-zinc-100 sticky top-24">
                        <h3 class="text-xl font-serif text-zinc-900 mb-8 border-b border-zinc-100 pb-4 uppercase tracking-wide">Thông tin tuyển dụng</h3>
                        
                        <ul class="space-y-6">
                            <?php if ($location): ?>
                            <li class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-champagne-gold/10 text-champagne-gold flex items-center justify-center shrink-0 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs uppercase tracking-wider text-zinc-500 mb-1">Địa điểm</span>
                                    <span class="block text-zinc-900 font-medium"><?php echo esc_html($location); ?></span>
                                </div>
                            </li>
                            <?php endif; ?>
                            
                            <?php if ($quantity): ?>
                            <li class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-champagne-gold/10 text-champagne-gold flex items-center justify-center shrink-0 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs uppercase tracking-wider text-zinc-500 mb-1">Số lượng</span>
                                    <span class="block text-zinc-900 font-medium"><?php echo esc_html($quantity); ?> người</span>
                                </div>
                            </li>
                            <?php endif; ?>
                            
                            <?php if ($deadline_formatted): ?>
                            <li class="flex items-start">
                                <div class="w-10 h-10 rounded-full bg-champagne-gold/10 text-champagne-gold flex items-center justify-center shrink-0 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <span class="block text-xs uppercase tracking-wider text-zinc-500 mb-1">Hạn nộp hồ sơ</span>
                                    <span class="block text-zinc-900 font-medium"><?php echo esc_html($deadline_formatted); ?></span>
                                </div>
                            </li>
                            <?php endif; ?>
                        </ul>

                        <div class="mt-10">
                            <!-- Link to contact page or email -->
                            <a href="mailto:info@alizeluxury.com?subject=Ứng tuyển: <?php echo rawurlencode(get_the_title()); ?>" class="block w-full text-center py-4 bg-zinc-900 text-white font-medium uppercase tracking-wide rounded-full hover:bg-champagne-gold hover:text-zinc-900 transition-colors duration-300">
                                Ứng tuyển ngay
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Job Description Job Details -->
                <div class="w-full lg:w-2/3">
                    <div class="bg-white p-8 md:p-12 rounded-2xl shadow-sm border border-zinc-100 prose max-w-none prose-zinc prose-headings:font-serif prose-h2:text-2xl prose-h2:uppercase prose-h2:tracking-wide prose-h2:text-zinc-900 prose-h2:mb-6 prose-h2:mt-10 prose-h3:text-xl prose-a:text-champagne-gold prose-a:no-underline hover:prose-a:underline prose-li:text-zinc-600 prose-p:text-zinc-600">
                        <?php 
                        if ($description) {
                            echo wp_kses_post($description);
                        } else {
                            echo '<p>Nội dung chi tiết công việc đang được cập nhật.</p>';
                        }
                        ?>
                    </div>
                    
                    <!-- Share & Print (Optional additions for luxury feel) -->
                    <div class="mt-8 flex justify-between items-center border-t border-zinc-200 pt-6">
                        <div class="text-zinc-500 text-sm">
                            Đăng ngày: <?php echo get_the_date('d/m/Y'); ?>
                        </div>
                        <div class="flex space-x-4">
                            <span class="text-zinc-500 text-sm mr-2 hidden sm:inline-block">Chia sẻ:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-600 hover:bg-champagne-gold hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-zinc-600 hover:bg-champagne-gold hover:text-white transition-colors duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php endwhile; // End of the loop. ?>

</main><!-- #main -->

<?php
get_footer();
