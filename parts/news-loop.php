<?php
/**
 * News Carousel Item Loop
 * Used for both server-side render and AJAX responses.
 * Expects $alize_loop_query to be defined in scope.
 */

if ( ! isset($alize_loop_query) || ! $alize_loop_query->have_posts() ) {
	?>
	<div class="w-full h-[400px] flex items-center justify-center rounded-[32px] border border-border-color shrink-0 w-full">
		<p class="text-text-muted">Chưa có bài viết nào được đăng.</p>
	</div>
	<?php
	return;
}

$count = 0;
// Aspect ratio classes for asymmetric grid cycle
$width_classes = [
	'w-[85vw] sm:w-[45vw] md:w-[420px]',  // Wide (e.g. Retail)
	'w-[85vw] sm:w-[40vw] md:w-[340px]',  // Native (e.g. Interior Design)
	'w-[85vw] sm:w-[35vw] md:w-[300px]',  // Portrait (e.g. Residential)
	'w-[85vw] sm:w-[50vw] md:w-[480px]',  // Extra Wide (e.g. Commercial)
];

while ( $alize_loop_query->have_posts() ) :
	$alize_loop_query->the_post();
	$w_class = $width_classes[$count % 4];
	$count++;
	
	$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
	if ( ! $thumb_url ) {
		$thumb_url = 'https://images.unsplash.com/photo-1582407947304-fd86f028f716?auto=format&fit=crop&q=80&w=800';
	}
	?>
	
	<!-- Card -->
	<article class="news-carousel-item relative flex-none h-[400px] md:h-[480px] <?php echo esc_attr($w_class); ?> snap-center rounded-[24px] lg:rounded-[32px] overflow-hidden group cursor-pointer shadow-sm">
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="block w-full h-full">
			
			<!-- Image -->
			<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
			
			<!-- Dark Gradient Overlay -->
			<div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>
			
			<!-- Top-Right Circle Arrow -->
			<div class="absolute top-5 right-5 md:top-6 md:right-6 w-10 h-10 md:w-11 md:h-11 bg-white/95 backdrop-blur-sm rounded-full flex items-center justify-center text-[#111] shadow-lg transform group-hover:-translate-y-1 group-hover:translate-x-1 transition-all duration-300">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7"/><path d="M7 7h10v10"/></svg>
			</div>

			<!-- Bottom Title Area -->
			<div class="absolute bottom-6 left-6 right-6 md:bottom-8 md:left-8 md:right-8 z-10 text-white pointer-events-none flex flex-col gap-2">
				<time class="block text-[13px] md:text-sm font-medium tracking-wider text-white/80 font-body uppercase" datetime="<?php echo get_the_date('c'); ?>">
					<?php echo get_the_date( 'd M Y' ); ?>
				</time>
				<h3 class="font-body text-2xl md:text-[28px] font-light leading-[1.25] line-clamp-3 text-white">
					<?php the_title(); ?>
				</h3>
			</div>
		</a>
	</article>
	
<?php
endwhile;
wp_reset_postdata();
?>
