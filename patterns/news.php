<?php
/**
 * Title: Tin Tức
 * Slug: alize/news
 * Categories: alize-blocks
 */
/**
 * News Block Template
 */
?>
<section id="news" class="g-section py-20 md:py-32 bg-bg-dark border-t border-border-color">
	<div class="container mx-auto px-4 md:px-10 max-w-[1600px]">
		
		<!-- Header -->
		<header class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 gap-6">
			<div>
				<div class="flex items-center gap-2 mb-4">
					<span class="w-1.5 h-1.5 rounded-full bg-text-main block mt-0.5"></span>
					<span class="text-sm font-medium tracking-wide text-text-main uppercase">Tin Tức</span>
				</div>
				<h2 class="font-heading text-4xl md:text-6xl text-text-main font-light tracking-tight m-0">
					Tiêu Điểm
				</h2>
			</div>
			<a href="<?php echo esc_url( home_url( '/tin-tuc' ) ); ?>" class="inline-block px-8 py-3.5 rounded-full bg-[#111] text-white hover:bg-primary transition-colors duration-300 shadow-md text-sm font-medium whitespace-nowrap">
				Xem Tất Cả
			</a>
		</header>

		<!-- Categories Tabs -->
		<div class="flex items-center gap-6 md:gap-10 mb-10 md:mb-14 overflow-x-auto scrollbar-hide pb-4 news-filter-tabs relative">
			<?php
			$total_posts = wp_count_posts('post')->publish;
			?>
			<button data-cat-id="0" class="filter-tab active text-xl md:text-2xl text-[#111] whitespace-nowrap font-light transition-colors outline-none shrink-0 bg-transparent border-none p-0 m-0 hover:bg-transparent focus:bg-transparent shadow-none">
				Tất cả <span class="text-[10px] md:text-[11px] align-text-top font-medium tracking-wider ml-1 text-gray-400 uppercase"><?php echo sprintf('%02d', $total_posts); ?> bài viết</span>
			</button>
			<?php
			$categories = get_categories( array(
				'orderby' => 'count',
				'order'   => 'DESC',
				'number'  => 4,
				'hide_empty' => true
			) );
			foreach ( $categories as $category ) {
				$count = sprintf('%02d', $category->count);
				?>
				<div class="h-6 w-px bg-gray-200 shrink-0"></div>
				<button data-cat-id="<?php echo esc_attr($category->term_id); ?>" class="filter-tab text-xl md:text-2xl text-[#999] hover:text-[#111] whitespace-nowrap font-light transition-colors outline-none shrink-0 bg-transparent border-none p-0 m-0 hover:bg-transparent focus:bg-transparent shadow-none">
					<?php echo esc_html($category->name); ?> <span class="text-[10px] md:text-[11px] align-text-top font-medium tracking-wider ml-1 text-gray-400 uppercase"><?php echo $count; ?> bài viết</span>
				</button>
				<?php
			}
			?>
		</div>

		<!-- Horizontal Carousel -->
		<!-- Tapping into modern CSS features: flex, snap-x mandatory to create an effortless native carousel block -->
		<div class="flex overflow-x-auto snap-x snap-mandatory flex-nowrap gap-4 md:gap-6 pb-12 pt-2 scrollbar-hide transition-opacity duration-300 delay-75" style="-webkit-overflow-scrolling: touch; scroll-behavior: smooth;" id="news-carousel">
			<?php
			$alize_loop_query = new WP_Query( array(
				'post_type'      => 'post',
				'posts_per_page' => 8,
				'post_status'    => 'publish',
			) );

			require get_theme_file_path('parts/news-loop.php');
			?>
		</div>
	</div>
</section>

<!-- Fetch Logic -->
<script>
document.addEventListener('DOMContentLoaded', function() {
	const tabs = document.querySelectorAll('.filter-tab');
	const container = document.getElementById('news-carousel');
	
	if(!tabs.length || !container) return;

	tabs.forEach(tab => {
		tab.addEventListener('click', function() {
			const catId = this.dataset.catId;
			
			// Update UI active state: just text color toggling
			tabs.forEach(t => {
				t.classList.remove('text-[#111]', 'active');
				t.classList.add('text-[#999]');
			});
			this.classList.remove('text-[#999]');
			this.classList.add('text-[#111]', 'active');
			
			// Bring tab smoothly into full view natively
			this.scrollIntoView({ inline: "center", behavior: "smooth" });
			
			// Show loading fade
			container.style.opacity = '0.4';
			container.style.pointerEvents = 'none';

			const formData = new URLSearchParams();
			formData.append('action', 'filter_news');
			formData.append('category', catId);

			fetch(alizeData.ajax_url, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded',
				},
				body: formData.toString()
			})
			.then(response => response.json())
			.then(data => {
				if(data.success) {
					container.innerHTML = data.data.html;
					// Snap scroll back to start natively
					container.scrollTo({ left: 0, behavior: 'smooth' });
				}
				container.style.pointerEvents = 'auto';
				container.style.opacity = '1';
			})
			.catch(error => {
				console.error('Error fetching news:', error);
				container.style.pointerEvents = 'auto';
				container.style.opacity = '1';
			});
		});
	});
});
</script>
