<?php
/**
 * The template for displaying the Leadership (cpt_team) archive.
 */

get_header();
?>

<main id="primary" class="site-main bg-white pt-32 pb-24">
	<div class="container mx-auto px-6 md:px-10 max-w-[1400px]">
		
		<!-- Archive Header -->
		<header class="mb-16 md:mb-24 flex flex-col items-center text-center">
			<div class="flex items-center gap-2 mb-6 justify-center">
				<span class="w-1.5 h-1.5 rounded-full bg-primary block mt-0.5"></span>
				<span class="text-sm font-medium tracking-widest text-[#111] uppercase">Đội Ngũ</span>
			</div>
			<h1 class="font-heading text-5xl md:text-7xl text-[#111] font-light leading-[1.1] mb-8">
				Ban Lãnh Đạo<br>
				<span class="italic font-serif text-primary">Chuyên Nghiệp</span>
			</h1>
			<p class="text-lg md:text-xl text-text-muted font-light max-w-2xl mx-auto leading-relaxed">
				Những bộ óc xuất chúng đằng sau các kiệt tác kiến trúc, mang tầm nhìn chiến lược và kinh nghiệm dày dặn kiến tạo những giá trị sống đích thực.
			</p>
		</header>

		<?php if ( have_posts() ) : ?>
			<!-- Team Grid -->
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 md:gap-14">
				<?php
				while ( have_posts() ) :
					the_post();
					
					$role       = get_post_meta( get_the_ID(), '_team_role', true );
					$experience = get_post_meta( get_the_ID(), '_team_experience', true );
					$focus      = get_post_meta( get_the_ID(), '_team_focus', true );
					
					$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					if ( ! $thumb_url ) {
						$thumb_url = 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&q=80&w=800';
					}
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'team-member flex flex-col group' ); ?>>
						<!-- Image -->
						<div class="relative w-full aspect-[3/4] rounded-[30px] overflow-hidden mb-6 shadow-sm">
							<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover transform transition-transform duration-1000 ease-out group-hover:scale-105">
							<div class="absolute inset-0 bg-black/10 transition-opacity duration-500 group-hover:opacity-0"></div>
						</div>
						
						<!-- Info -->
						<div class="flex flex-col flex-1 pl-2">
							<h2 class="font-heading text-2xl md:text-3xl font-medium text-[#111] mb-2">
								<?php the_title(); ?>
							</h2>
							<?php if ( $role ) : ?>
								<p class="text-[13px] font-semibold tracking-widest uppercase text-primary mb-6">
									<?php echo esc_html( $role ); ?>
								</p>
							<?php endif; ?>
							
							<div class="mt-auto pt-6 border-t border-gray-100 grid grid-cols-2 gap-4">
								<?php if ( $experience ) : ?>
									<div>
										<span class="block text-[11px] uppercase tracking-wider text-gray-400 font-medium mb-1">Kinh Nghiệm</span>
										<strong class="font-body text-sm font-semibold text-[#111]">
											<?php echo esc_html( $experience ); ?>
										</strong>
									</div>
								<?php endif; ?>
								
								<?php if ( $focus ) : ?>
									<div>
										<span class="block text-[11px] uppercase tracking-wider text-gray-400 font-medium mb-1">Chuyên Môn</span>
										<strong class="font-body text-sm font-semibold text-[#111] line-clamp-2">
											<?php echo esc_html( $focus ); ?>
										</strong>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>

			<!-- Pagination -->
			<div class="mt-20 flex justify-center">
				<?php
				the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>',
					'next_text' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>',
					'class'     => 'pagination flex gap-2 items-center',
				) );
				?>
				<style>
					/* Inline styles for WP Pagination to match the high-end look */
					.pagination .nav-links { display: flex; gap: 0.5rem; align-items: center; }
					.pagination .page-numbers { display: flex; align-items: center; justify-content: center; width: 44px; height: 44px; border-radius: 50%; border: 1px solid #eaeaea; color: #111; font-size: 14px; font-weight: 500; transition: all 0.3s ease; text-decoration: none; }
					.pagination .page-numbers:hover { border-color: #111; background: #fdfdfd; }
					.pagination .page-numbers.current { background: #111; color: #fff; border-color: #111; pointer-events: none; }
					.pagination .page-numbers.dots { border: none; background: transparent; pointer-events: none; }
				</style>
			</div>

		<?php else : ?>
			<!-- No Posts Found -->
			<div class="text-center py-20">
				<h2 class="text-2xl font-body text-gray-400">Danh sách hiện đang được cập nhật.</h2>
			</div>
		<?php endif; ?>

	</div>
</main>

<?php
get_footer();
