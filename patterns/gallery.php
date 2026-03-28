<?php
/**
 * Title: Thư Viện Ảnh
 * Slug: alize/gallery
 * Categories: alize-blocks
 */
/**
 * Gallery Block Template
 */
?>
<section id="gallery" class="g-section bg-bg-dark py-20 md:py-32">
	<div class="container mx-auto px-4 md:px-10 max-w-[1600px]">
		<header class="text-center mb-16">
			<h2 class="font-heading text-4xl md:text-5xl text-text-main font-light tracking-wide">Thư Viện <span class="italic font-serif text-primary">Ảnh</span></h2>
		</header>
		
		<?php
		$images = array();
		$gallery_query = new WP_Query( array(
			'post_type'      => 'cpt_gallery',
			'posts_per_page' => 5,
			'post_status'    => 'publish',
		) );

		if ( $gallery_query->have_posts() ) {
			while ( $gallery_query->have_posts() ) {
				$gallery_query->the_post();
				$img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				
				$link = get_post_meta( get_the_ID(), '_gallery_link', true );
				if ( empty( $link ) ) $link = '#';

				$subtitle = get_post_meta( get_the_ID(), '_gallery_subtitle', true );
				if ( empty( $subtitle ) ) $subtitle = '12 Hình Ảnh<br>Ngoại Thất';

				if ( $img_url ) {
					$images[] = array(
						'url'      => $img_url,
						'title'    => get_the_title(),
						'link'     => $link,
						'subtitle' => $subtitle
					);
				}
			}
			wp_reset_postdata();
		}
		
		// Fallbacks just in case there are less than 5 images
		$fallbacks = array(
			'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=1200',
			'https://images.unsplash.com/photo-1628624747186-a941c476b7ef?auto=format&fit=crop&q=80&w=800',
			'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&q=80&w=800',
			'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=800',
			'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&q=80&w=800'
		);
		
		for($i = count($images); $i < 5; $i++) {
			$images[] = array( 
				'url'      => $fallbacks[$i], 
				'title'    => 'Ảnh Mẫu ' . ($i+1),
				'link'     => '#',
				'subtitle' => '12 Hình Ảnh<br>Ngoại Thất'
			);
		}
		?>

		<!-- Dubai Realty Asymmetric Masonry Grid -->
		<div class="flex flex-col lg:flex-row gap-3 md:gap-4 h-auto lg:h-[550px] xl:h-[750px] w-full rounded-[40px]">
			
			<!-- Column 1: Massive Left Cover (40%) -->
			<div class="gallery-masonry-item w-full lg:w-[40%] h-[500px] lg:h-full relative overflow-hidden group rounded-[24px] lg:rounded-none lg:rounded-l-[30px]">
				<a href="<?php echo esc_url($images[0]['link']); ?>" class="block w-full h-full">
					<img src="<?php echo esc_url($images[0]['url']); ?>" alt="<?php echo esc_attr($images[0]['title']); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
				</a>
				
				<!-- Floating Dashboard Module -->
				<div class="absolute bottom-6 left-6 bg-white/95 backdrop-blur-md px-8 py-5 flex px-6 rounded-[30px] shadow-2xl flex-col gap-3 pointer-events-none z-10 w-[240px]">
					<span class="text-[13px] text-gray-400 font-medium tracking-wide font-body">Thư Viện Ảnh</span>
					<div class="flex justify-between items-end">
						<h3 class="text-base font-body font-semibold text-[#111] leading-tight"><?php echo wp_kses_post($images[0]['subtitle']); ?></h3>
						<a href="<?php echo esc_url($images[0]['link']); ?>" class="text-[13px] font-semibold px-5 py-2.5 bg-gray-100 rounded-full text-center hover:bg-black hover:text-white transition-colors duration-300 pointer-events-auto shadow-sm">Xem Ảnh</a>
					</div>
				</div>
			</div>
			
			<!-- Column 2: Middle Stack (30%) - Equal 50/50 -->
			<div class="w-full lg:w-[30%] flex flex-col gap-3 md:gap-4 h-[500px] lg:h-full">
				<!-- Top -->
				<div class="gallery-masonry-item h-1/2 w-full relative overflow-hidden group rounded-[24px] lg:rounded-none">
					<a href="<?php echo esc_url($images[1]['link']); ?>" class="block w-full h-full">
						<img src="<?php echo esc_url($images[1]['url']); ?>" alt="<?php echo esc_attr($images[1]['title']); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
					</a>
				</div>
				<!-- Bottom -->
				<div class="gallery-masonry-item h-1/2 w-full relative overflow-hidden group rounded-[24px] lg:rounded-none">
					<a href="<?php echo esc_url($images[2]['link']); ?>" class="block w-full h-full">
						<img src="<?php echo esc_url($images[2]['url']); ?>" alt="<?php echo esc_attr($images[2]['title']); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
					</a>
				</div>
			</div>

			<!-- Column 3: Right Stack (30%) - Asymmetric 65/35 -->
			<div class="w-full lg:w-[30%] flex flex-col gap-3 md:gap-4 h-[500px] lg:h-full">
				<!-- Top (65%) -->
				<div class="gallery-masonry-item h-[65%] w-full relative overflow-hidden group rounded-[24px] lg:rounded-none lg:rounded-tr-[30px]">
					<a href="<?php echo esc_url($images[3]['link']); ?>" class="block w-full h-full">
						<img src="<?php echo esc_url($images[3]['url']); ?>" alt="<?php echo esc_attr($images[3]['title']); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
					</a>
				</div>
				<!-- Bottom (35%) -->
				<div class="gallery-masonry-item h-[35%] w-full relative overflow-hidden group rounded-[24px] lg:rounded-none lg:rounded-br-[30px]">
					<a href="<?php echo esc_url($images[4]['link']); ?>" class="block w-full h-full">
						<img src="<?php echo esc_url($images[4]['url']); ?>" alt="<?php echo esc_attr($images[4]['title']); ?>" class="absolute inset-0 w-full h-full object-cover transform transition-transform duration-1000 group-hover:scale-105">
					</a>
				</div>
			</div>

		</div>
	</div>
</section>
