<?php
/**
 * Title: Hero Banner
 * Slug: alize/hero
 * Categories: alize-blocks
 */
/**
 * Hero Block Template
 */

$hero_bg_image = get_theme_mod('hero_bg_image', 'https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?auto=format&fit=crop&q=80&w=2000');
$slide2_bg = 'https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?auto=format&fit=crop&q=80&w=2000';
$slide3_bg = 'https://images.unsplash.com/photo-1628624747186-a941c476b7ef?auto=format&fit=crop&q=80&w=2000';
?>
<section id="hero" class="relative w-full h-screen min-h-[700px] overflow-hidden">
	
	<!-- Swiper Slider Background -->
	<div class="swiper hero-swiper absolute inset-0 z-0 w-full h-full">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="hero-bg w-full h-full"><img src="<?php echo esc_url($hero_bg_image); ?>" alt="Bất động sản cao cấp" class="w-full h-full object-cover"></div>
			</div>
			<div class="swiper-slide">
				<div class="hero-bg w-full h-full"><img src="<?php echo esc_url($slide2_bg); ?>" alt="Bất động sản hạng sang" class="w-full h-full object-cover"></div>
			</div>
			<div class="swiper-slide">
				<div class="hero-bg w-full h-full"><img src="<?php echo esc_url($slide3_bg); ?>" alt="Tổ hợp tiện ích" class="w-full h-full object-cover"></div>
			</div>
		</div>
	</div>
	
	<!-- Subtle Dark Gradient Overlay for Typography Contrast -->
	<div class="absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/40 z-10 pointer-events-none"></div>
	
	<!-- Centered Minimalist Typography Content -->
	<div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center px-4 md:px-10 pointer-events-none mt-16 pb-16">
		<h1 class="text-white font-body font-light leading-[1.05] tracking-tight mb-10 w-full max-w-[1400px]" style="font-size: clamp(1.5rem, 5vw, 85px);">
			<div class="overflow-hidden pb-4"><span class="hero-title-line block transform translate-y-[120%] opacity-0 whitespace-nowrap">Kiến Tạo Bất Động Sản</span></div>
			<div class="overflow-hidden pb-4"><span class="hero-title-line block transform translate-y-[120%] opacity-0 whitespace-nowrap">Dành Riêng Cho Tương Lai</span></div>
		</h1>
		<div class="hero-btn-wrap transform translate-y-10 opacity-0 pointer-events-auto">
			<a href="#projects" class="inline-flex items-center justify-center px-12 py-5 bg-white text-[#1a1a1a] rounded-full font-body font-medium text-[15px] tracking-wide hover:scale-105 hover:shadow-2xl hover:shadow-white/20 transition-all duration-400">
				Khám Phá Dự Án
			</a>
		</div>
	</div>
	
	<!-- Slider Pagination -->
	<div class="hero-pagination absolute bottom-12 left-0 w-full flex justify-center gap-3 z-30 pointer-events-auto"></div>
	
</section>
