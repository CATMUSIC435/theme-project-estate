<?php
/**
 * Title: Dự Án
 * Slug: alize/projects
 * Categories: alize-blocks
 */
/**
 * Projects Block Template (Tabbed Grid)
 */
?>
<section id="projects" class="projects-section relative py-20 md:py-32 bg-bg-dark">
	<div class="container mx-auto px-6 md:px-10 max-w-[1500px]">
		
		<!-- Top Filter Bar -->
		<div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-12 pb-8 border-b border-border-color">
			
			<!-- Filter Label/Icon -->
			<div class="flex items-center gap-4 w-full lg:w-auto">
				<div class="flex items-center justify-center bg-bg-dark-elem px-6 py-3 rounded-full border border-border-color shadow-sm">
					<span class="text-sm font-medium mr-3 text-text-main">Bộ lọc</span>
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-primary">
						<path d="M3 6h18M6 12h12M10 18h4" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
			</div>

			<!-- Dynamic Select Filters -->
			<div class="flex items-center gap-4 overflow-x-auto w-full lg:w-auto pb-4 lg:pb-0 scrollbar-hide">
				
				<!-- Status Filter -->
				<div class="relative">
					<select id="filter-status" class="appearance-none bg-bg-dark-elem border border-border-color text-text-main rounded-full px-6 py-3 pr-10 text-sm focus:outline-none cursor-pointer shadow-sm hover:border-primary transition-colors">
						<option value="all">Sở Hữu / Thuê</option>
						<?php
						$statuses = get_terms( array( 'taxonomy' => 'project_status', 'hide_empty' => true ) );
						foreach ( $statuses as $status ) {
							echo '<option value="' . esc_attr($status->slug) . '">' . esc_html($status->name) . '</option>';
						}
						?>
					</select>
					<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-muted">
						<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
					</div>
				</div>

				<!-- Type Filter -->
				<div class="relative">
					<select id="filter-type" class="appearance-none bg-bg-dark-elem border border-border-color text-text-main rounded-full px-6 py-3 pr-10 text-sm focus:outline-none cursor-pointer shadow-sm hover:border-primary transition-colors">
						<option value="all">Loại Bất Động Sản</option>
						<?php
						$types = get_terms( array( 'taxonomy' => 'project_type', 'hide_empty' => true ) );
						foreach ( $types as $type ) {
							echo '<option value="' . esc_attr($type->slug) . '">' . esc_html($type->name) . '</option>';
						}
						?>
					</select>
					<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-muted">
						<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
					</div>
				</div>

				<!-- Location Filter -->
				<div class="relative">
					<select id="filter-location" class="appearance-none bg-bg-dark-elem border border-border-color text-text-main rounded-full px-6 py-3 pr-10 text-sm focus:outline-none cursor-pointer shadow-sm hover:border-primary transition-colors">
						<option value="all">Khu Vực (Tất cả)</option>
						<?php
						$locations = get_terms( array( 'taxonomy' => 'project_location', 'hide_empty' => true ) );
						foreach ( $locations as $location ) {
							echo '<option value="' . esc_attr($location->slug) . '">' . esc_html($location->name) . '</option>';
						}
						?>
					</select>
					<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-text-muted">
						<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
					</div>
				</div>

			</div>

			<!-- View All Button -->
			<div class="w-full lg:w-auto flex justify-end">
				<a href="#" class="bg-[#111] text-white px-8 py-3 rounded-full text-sm font-medium hover:bg-primary transition-colors duration-300 shadow-md">Xem Tất Cả</a>
			</div>
		</div>

		<!-- Projects Grid -->
		<div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10" id="projects-grid">
			<?php
			$projects_query = new WP_Query( array(
				'post_type'      => 'cpt_project',
				'posts_per_page' => 10,
				'post_status'    => 'publish',
			) );

			if ( $projects_query->have_posts() ) :
				$count = 0;
				while ( $projects_query->have_posts() ) :
					$projects_query->the_post();
					$count++;

					// Get terms for filtering
					$post_statuses = get_the_terms( get_the_ID(), 'project_status' );
					$status_slug = ( ! empty($post_statuses) && ! is_wp_error($post_statuses) ) ? $post_statuses[0]->slug : 'all';

					$post_types = get_the_terms( get_the_ID(), 'project_type' );
					$type_slug = ( ! empty($post_types) && ! is_wp_error($post_types) ) ? $post_types[0]->slug : 'all';

					$post_locations = get_the_terms( get_the_ID(), 'project_location' );
					$location_slug = ( ! empty($post_locations) && ! is_wp_error($post_locations) ) ? $post_locations[0]->slug : 'all';
					$location_name = ( ! empty($post_locations) && ! is_wp_error($post_locations) ) ? $post_locations[0]->name : 'Khu Vực Mới';

					// Thumbnail
					$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
					if ( ! $thumb_url ) {
						$thumb_url = 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&q=80&w=1200';
					}
					?>
					
					<!-- Large Card -->
					<div class="project-card-filter relative aspect-[4/5] md:aspect-[5/4] lg:aspect-[4/3] rounded-[30px] lg:rounded-[40px] overflow-hidden group cursor-pointer" 
						 data-status="<?php echo esc_attr($status_slug); ?>" 
						 data-type="<?php echo esc_attr($type_slug); ?>" 
						 data-location="<?php echo esc_attr($location_slug); ?>">
						
						<!-- Image -->
						<img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title_attribute(); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
						
						<!-- Gradient Overlay -->
						<div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-80 group-hover:opacity-100 transition-opacity duration-500"></div>
						
						<!-- Top Badges Layer -->
						<div class="absolute top-6 left-6 right-6 flex justify-between items-start pointer-events-none z-10">
							<div class="px-5 py-2 rounded-full border border-white/40 text-white text-xs md:text-sm font-medium flex items-center gap-2 backdrop-blur-md bg-black/10">
								<svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="10" r="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
								<?php echo esc_html($location_name); ?>
							</div>
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="w-10 h-10 md:w-12 md:h-12 bg-white rounded-full flex items-center justify-center pointer-events-auto hover:bg-primary hover:text-white transition-colors duration-300 text-black">
								<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5l7 7-7 7"/></svg>
							</a>
						</div>

						<!-- Bottom Content Layer -->
						<div class="absolute bottom-8 left-8 right-8 z-10 pointer-events-none">
							<span class="block text-4xl text-white/70 font-light mb-1 leading-none"><?php echo sprintf("%02d", $count); ?></span>
							<h3 class="text-2xl md:text-3xl lg:text-4xl text-white font-body font-light leading-tight">
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="hover:text-primary transition-colors pointer-events-auto"><?php the_title(); ?></a>
							</h3>
						</div>
					</div>
					
				<?php
				endwhile;
				wp_reset_postdata();
			else :
				echo '<p class="col-span-full text-center text-text-muted py-20">Đang cập nhật danh sách dự án...</p>';
			endif;
			?>
		</div>
	</div>
</section>
