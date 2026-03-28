<?php
/**
 * Title: Tuyển Dụng
 * Slug: alize/careers
 * Categories: alize-blocks
 */
/**
 * Careers Block Template
 */
?>
<section id="careers" class="g-section py-20 md:py-32 bg-white">
	<div class="container mx-auto px-6 md:px-10 max-w-[1400px]">
		<!-- Header Area -->
		<div class="flex flex-col md:flex-row justify-between items-start mb-16 gap-8">
			<div class="md:w-1/2">
				<div class="flex items-center gap-2 mb-4">
					<span class="w-1.5 h-1.5 rounded-full bg-text-main block mt-0.5"></span>
					<span class="text-sm font-medium tracking-wide text-text-main uppercase">Tuyển Dụng</span>
				</div>
				<h2 class="font-heading text-4xl md:text-5xl lg:text-6xl text-text-main font-light leading-tight tracking-tight">
					Gia Nhập <br><span class="italic font-serif text-primary">Đội Ngũ</span>
				</h2>
			</div>
			<div class="md:w-1/2 md:pt-10 flex flex-col justify-end">
				<p class="text-lg md:text-xl text-text-muted font-light leading-relaxed max-w-xl md:ml-auto">
					Chúng tôi luôn tìm kiếm những nhân tài đam mê vượt qua giới hạn trong ngành bất động sản. Hãy cùng nhau kiến tạo những công trình biểu tượng.
				</p>
			</div>
		</div>

		<!-- Job Listings -->
		<div class="flex flex-col gap-0 border-t border-border-color">
			<?php
			$careers_query = new WP_Query( array(
				'post_type'      => 'cpt_career',
				'posts_per_page' => -1,
				'post_status'    => 'publish',
			) );

			if ( $careers_query->have_posts() ) :
				while ( $careers_query->have_posts() ) :
					$careers_query->the_post();
					
					// Fallback meta format: Full-time / Location
					$job_meta = get_post_meta( get_the_ID(), '_career_meta', true );
					if ( ! $job_meta ) {
						$job_meta = 'Toàn thời gian • TP.HCM';
					}
					?>
					
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="group flex flex-col md:flex-row justify-between md:items-center py-8 md:py-10 border-b border-border-color hover:border-[#111] transition-colors duration-400 gap-6 cursor-pointer">
						<div class="flex-1">
							<h3 class="font-heading text-2xl md:text-4xl text-text-main font-light group-hover:text-primary transition-colors duration-400">
								<?php the_title(); ?>
							</h3>
							<span class="block text-sm md:text-base font-medium uppercase tracking-widest text-[#999] mt-3 group-hover:text-text-main transition-colors duration-400">
								<?php echo esc_html( $job_meta ); ?>
							</span>
						</div>
						
						<div class="mt-4 md:mt-0">
							<span class="inline-flex items-center justify-center px-8 py-3 rounded-full border border-gray-300 text-text-main uppercase text-[13px] font-semibold tracking-wider group-hover:bg-[#111] group-hover:text-white group-hover:border-[#111] transition-all duration-400">
								Ứng tuyển
								<svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
							</span>
						</div>
					</a>
					
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<div class="py-16 text-center text-text-muted text-lg border-b border-border-color">Hiện tại chưa có vị trí đang tuyển.</div>';
			endif;
			?>
		</div>
	</div>
</section>
