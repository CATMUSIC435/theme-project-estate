<?php
/**
 * Title: Giới Thiệu
 * Slug: alize/about
 * Categories: alize-blocks
 */
/**
 * About Block Template
 */

$about_title = get_theme_mod('about_title', 'Về Chúng Tôi');
$about_lead  = get_theme_mod('about_lead', 'Hơn 15 năm kinh nghiệm trong lĩnh vực phát triển bất động sản cao cấp, chúng tôi cam kết mang đến những giá trị sống đích thực và bền vững cho cộng đồng.');
$about_desc  = get_theme_mod('about_desc', 'Tự hào là đơn vị tiên phong trong việc kiến tạo những không gian sống xanh, thông minh và hiện đại. Mỗi dự án của chúng tôi đều là một kiệt tác kiến trúc, hòa quyện giữa thiên nhiên và tiện ích đẳng cấp.');
$about_image = get_theme_mod('about_image', 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=1000');
?>
<section id="about" class="g-section relative py-20 md:py-32 lg:py-44 overflow-hidden border-t border-border-color">
	<div class="container mx-auto px-6 md:px-10 max-w-[1400px]">
		<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-24 items-center">
			
			<!-- Semantic Text Block -->
			<article class="flex flex-col justify-center">
				<header>
					<h2 class="font-heading text-4xl md:text-5xl lg:text-6xl font-light text-text-main mb-8 leading-[1.15] tracking-tight">
						<?php echo esc_html($about_title); ?>
					</h2>
				</header>
				
				<div class="prose prose-invert max-w-none">
					<p class="text-xl md:text-2xl text-text-muted mb-6 leading-relaxed font-light">
						<?php echo wp_kses_post($about_lead); ?>
					</p>
					<p class="text-lg text-text-muted leading-relaxed mb-12">
						<?php echo wp_kses_post($about_desc); ?>
					</p>
				</div>
				
				<!-- Stats Grid Layout with Tailwind -->
				<div class="grid grid-cols-2 md:grid-cols-4 gap-8 pt-12 mt-4 border-t border-border-color">
					<div class="flex flex-col border-l border-border-color pl-5">
						<strong class="font-heading text-4xl md:text-5xl text-primary font-bold mb-2">120+</strong>
						<span class="text-xs md:text-sm uppercase tracking-widest text-text-muted font-medium">Dự án hoàn thành</span>
					</div>
					<div class="flex flex-col border-l border-white/10 pl-5">
						<strong class="font-heading text-4xl md:text-5xl text-primary font-bold mb-2">90+</strong>
						<span class="text-xs md:text-sm uppercase tracking-widest text-text-muted font-medium">Đối tác chiến lược</span>
					</div>
					<div class="flex flex-col border-l border-white/10 pl-5">
						<strong class="font-heading text-4xl md:text-5xl text-primary font-bold mb-2">6+</strong>
						<span class="text-xs md:text-sm uppercase tracking-widest text-text-muted font-medium">Quốc gia</span>
					</div>
					<div class="flex flex-col border-l border-white/10 pl-5">
						<strong class="font-heading text-4xl md:text-5xl text-primary font-bold mb-2">100%</strong>
						<span class="text-xs md:text-sm uppercase tracking-widest text-text-muted font-medium">Cam kết chất lượng</span>
					</div>
				</div>
			</article>
			
			<!-- Semantic Figure for SEO and accessibility -->
			<figure class="relative w-full h-[500px] md:h-[600px] lg:h-[750px] rounded-[40px] overflow-hidden group shadow-2xl">
				<img src="<?php echo esc_url($about_image); ?>" alt="<?php echo esc_attr($about_title); ?>" class="absolute inset-0 w-full h-full object-cover transform scale-110 transition-transform duration-1000 ease-out group-hover:scale-105">
				<!-- Optional geometric overlay layer for luxury feel -->
				<div class="absolute inset-0 bg-gradient-to-t from-bg-dark/60 to-transparent opacity-80 mix-blend-multiply"></div>
			</figure>
			
		</div>
	</div>
</section>
