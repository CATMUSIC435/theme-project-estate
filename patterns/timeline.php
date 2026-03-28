<?php
/**
 * Title: Lịch Sử
 * Slug: alize/timeline
 * Categories: alize-blocks
 */
/**
 * Timeline Block Template
 */
?>
<section id="timeline" class="timeline-horizontal-section">
	<div class="timeline-sidebar">
		<div class="sidebar-content">
			<h2 class="section-title">Hành Trình <br><span class="italic-accent">Phát Triển</span></h2>
			<p class="sidebar-desc">Những dấu ấn tự hào định hình vị thế và tiêu chuẩn sống đẳng cấp.</p>
		</div>
		<div class="timeline-nav-circle">
			<div class="swiper-button-prev-tl nav-circle"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6 1.41-1.41z"/></svg></div>
			<div class="swiper-button-next-tl nav-circle"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/></svg></div>
		</div>
	</div>

	<div class="timeline-slider-wrapper">
		<div class="swiper timeline-swiper">
			<div class="swiper-wrapper">
				<?php
				$timeline_query = new WP_Query( array(
					'post_type'      => 'cpt_timeline',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
					'orderby'        => 'title', // Year ordered
					'order'          => 'ASC',
				) );

				if ( $timeline_query->have_posts() ) :
					$counter = 0;
					while ( $timeline_query->have_posts() ) :
						$timeline_query->the_post();
						$counter++;
						
						$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
						if ( ! $thumb_url ) {
							$thumb_url = 'https://images.unsplash.com/photo-1626178793926-22b28830aa30?auto=format&fit=crop&q=80&w=800';
						}
						
						// Title is the year (e.g., "2008"), Excerpt is title (e.g. "Khởi Nguyên")
						$year = get_the_title();
						$event_name = get_the_excerpt();
						if ( ! $event_name ) {
							$event_name = 'Dấu Mốc Quan Trọng';
						}
						?>
						<div class="swiper-slide timeline-panel">
							<img src="<?php echo esc_url( $thumb_url ); ?>" class="panel-bg" alt="<?php echo esc_attr( $year ); ?>">
							<div class="panel-overlay"></div>
							<div class="panel-content">
								<span class="panel-num"><?php echo sprintf( '%02d / %s', $counter, esc_html( $year ) ); ?></span>
								<h3 class="panel-title"><?php echo esc_html( $event_name ); ?></h3>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					echo '<p style="padding:40px; color:#fff;">Đang cập nhật lịch sử.</p>';
				endif;
				?>
			</div>
		</div>
	</div>
</section>
