<?php
/**
 * The template for displaying the footer
 */

$footer_slogan = get_theme_mod('footer_slogan', 'Kiến Tạo Giấc Mơ<br>An Cư');
$footer_col5_text = get_theme_mod('footer_col5_text', 'Chúng tôi ở đây để thay đổi<br>tương lai của bạn.');
$footer_map = get_theme_mod('footer_map', 'https://images.unsplash.com/photo-1524661135-423995f22d0b?auto=format&fit=crop&q=80&w=800');
$contact_address = get_theme_mod('contact_address', 'Tòa nhà Alize Tower,<br>123 Nguyễn Văn Linh,<br>Đà Nẵng');

$footer_logo_text = get_theme_mod('footer_logo_text', 'Alize<br>Luxury');
$footer_news_title = get_theme_mod('footer_news_title', 'Đăng ký nhận bản tin');
$footer_news_desc = get_theme_mod('footer_news_desc', 'Cập nhật những thông tin dự án mới nhất<br>và các cơ hội đầu tư hấp dẫn.');
$footer_news_placeholder = get_theme_mod('footer_news_placeholder', 'Nhập email của bạn');
$footer_news_btn_text    = get_theme_mod('footer_news_btn_text', 'Đăng Ký');

$footer_menu1_title = get_theme_mod('footer_menu1_title', 'Điều Hướng Nhanh');
$footer_menu2_title = get_theme_mod('footer_menu2_title', 'Sản Phẩm');
$footer_menu3_title = get_theme_mod('footer_menu3_title', 'Thông Tin');

$footer_bottom_link1_text = get_theme_mod('footer_bottom_link1_text', 'Điều Khoản Dịch Vụ');
$footer_bottom_link1_url  = get_theme_mod('footer_bottom_link1_url', '#');
$footer_bottom_link2_text = get_theme_mod('footer_bottom_link2_text', 'Chính Sách Bảo Mật');
$footer_bottom_link2_url  = get_theme_mod('footer_bottom_link2_url', '#');
?>

	<footer id="colophon" class="bg-[#fcfcfc] border-t border-gray-100 pt-20 pb-10">
		<div class="container mx-auto px-6 md:px-10 max-w-[1400px]">
			<!-- Responsive Footer Grid -->
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-12 gap-10 lg:gap-8 mb-20">
				
				<!-- Column 1: Brand & Subscribe -->
				<div class="md:col-span-2 lg:col-span-1 xl:col-span-3 flex flex-col">
					<div class="flex items-center gap-2 mb-8">
						<!-- Sample Logo Icon -->
						<svg class="w-8 h-8 text-[#111]" viewBox="0 0 24 24" fill="currentColor"><path d="M10 2L2 10v12h7v-7h6v7h7V10L14 2h-4zm-1 2.5l5 5V20h-3v-7H9v7H6V9.5l3-3z"/></svg>
						<span class="font-heading text-xl font-medium tracking-wide leading-tight"><?php echo wp_kses_post( $footer_logo_text ); ?></span>
					</div>
					
					<p class="text-text-main text-sm font-body leading-relaxed mb-12">
						<?php echo wp_kses_post( $footer_slogan ); ?>
					</p>
					
					<h4 class="text-text-main text-lg font-light tracking-wide mb-4"><?php echo esc_html( $footer_news_title ); ?></h4>
					<p class="text-[#999] text-xs font-body mb-6 w-10/12 leading-relaxed">
						<?php echo wp_kses_post( $footer_news_desc ); ?>
					</p>
					
					<form class="flex flex-col gap-4 w-10/12">
						<input type="email" placeholder="<?php echo esc_attr( $footer_news_placeholder ); ?>" required class="bg-transparent border-b border-gray-200 py-3 text-sm text-text-main placeholder-gray-400 focus:outline-none focus:border-black transition-colors w-full">
						<button type="submit" class="self-start mt-2 px-8 py-3 bg-[#111] text-white rounded-full text-xs font-semibold hover:bg-primary transition-colors">
							<?php echo esc_html( $footer_news_btn_text ); ?>
						</button>
					</form>
				</div>
				
				<!-- Column 2: Quick Navigation -->
				<div class="md:col-span-1 lg:col-span-1 xl:col-span-2 flex flex-col gap-6">
					<h4 class="text-text-main text-sm font-medium tracking-wide"><?php echo esc_html( $footer_menu1_title ); ?></h4>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-1',
						'menu_class'     => 'list-none pl-0 m-0 flex flex-col gap-5 text-sm text-[#888] font-body',
						'container'      => false,
						'fallback_cb'    => function() {
							echo '<ul class="list-none pl-0 m-0 flex flex-col gap-5 text-sm text-[#888] font-body">';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Trang Chủ</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Dự Án</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Đặc Quyền</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Đội Ngũ</a></li>';
							echo '<li><a href="#careers" class="hover:text-[#111] transition-colors">Tuyển Dụng</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Sứ Mệnh</a></li>';
							echo '</ul>';
						}
					) );
					?>
				</div>
				
				<!-- Column 3: Properties -->
				<div class="md:col-span-1 lg:col-span-1 xl:col-span-2 flex flex-col gap-6">
					<h4 class="text-text-main text-sm font-medium tracking-wide"><?php echo esc_html( $footer_menu2_title ); ?></h4>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-2',
						'menu_class'     => 'list-none pl-0 m-0 flex flex-col gap-5 text-sm text-[#888] font-body',
						'container'      => false,
						'fallback_cb'    => function() {
							echo '<ul class="list-none pl-0 m-0 flex flex-col gap-5 text-sm text-[#888] font-body">';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Căn Hộ</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Biệt Thự</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Nhà Phố</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Dự Án Mới</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Bất Động Sản Hạng Sang</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Giáp Biển</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Trung Tâm</a></li>';
							echo '</ul>';
						}
					) );
					?>
				</div>
				
				<!-- Column 4: Resources -->
				<div class="md:col-span-1 lg:col-span-1 xl:col-span-2 flex flex-col gap-6">
					<h4 class="text-text-main text-sm font-medium tracking-wide"><?php echo esc_html( $footer_menu3_title ); ?></h4>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'footer-3',
						'menu_class'     => 'list-none pl-0 m-0 flex flex-col gap-5 text-sm text-[#888] font-body',
						'container'      => false,
						'fallback_cb'    => function() {
							echo '<ul class="list-none pl-0 m-0 flex flex-col gap-5 text-sm text-[#888] font-body">';
							echo '<li><a href="#news" class="hover:text-[#111] transition-colors">Tin Tức</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Câu Hỏi Thường Gặp</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Cẩm Nang Mua</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Cẩm Nang Bán</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Khu Vực</a></li>';
							echo '<li><a href="#" class="hover:text-[#111] transition-colors">Tin Tức Thị Trường</a></li>';
							echo '</ul>';
						}
					) );
					?>
				</div>
				
				<!-- Column 5: Contact & Map -->
				<div class="md:col-span-1 lg:col-span-2 xl:col-span-3 flex flex-col text-left md:text-right items-start md:items-end">
					<h3 class="font-heading text-3xl font-light leading-10 mb-8 text-text-main w-full">
						<?php echo wp_kses_post( $footer_col5_text ); ?>
					</h3>
					
					<div class="flex gap-4 items-center mb-10 self-end">
						<a href="#contact" class="px-6 py-3 bg-[#111] text-white rounded-full text-xs font-semibold hover:bg-primary transition-colors">
							Liên Hệ
						</a>
						<a href="mailto:<?php echo get_theme_mod('contact_email', 'contact@alizeluxury.com'); ?>" class="w-10 h-10 flex items-center justify-center text-[#111] hover:text-[#555] transition-colors">
							<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
						</a>
						<a href="#" class="w-10 h-10 flex items-center justify-center text-[#111] hover:text-[#555] transition-colors">
							<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
						</a>
					</div>
					
					<div class="w-[260px] max-w-full place-self-end mt-auto text-left">
						<div class="w-full relative h-[140px] rounded-lg overflow-hidden mb-4 bg-gray-200">
							<img src="<?php echo esc_url($footer_map); ?>" alt="Map" class="w-full h-full object-cover">
						</div>
						<p class="text-xs text-text-main leading-relaxed font-body">
							<?php echo wp_kses_post( $contact_address ); ?>
						</p>
					</div>
				</div>
				
			</div>
			
			<!-- Footer Bottom -->
			<div class="flex flex-col md:flex-row justify-between items-center text-xs text-[#999] font-body border-t border-gray-100 pt-8 mt-10">
				<div>
					Copyright <?php echo date('Y'); ?> © <?php bloginfo( 'name' ); ?>
				</div>
				<div class="flex gap-6 mt-4 md:mt-0">
					<a href="<?php echo esc_url( $footer_bottom_link1_url ); ?>" class="hover:text-[#111] transition-colors text-text-main font-medium"><?php echo esc_html( $footer_bottom_link1_text ); ?></a>
					<a href="<?php echo esc_url( $footer_bottom_link2_url ); ?>" class="hover:text-[#111] transition-colors text-text-main font-medium"><?php echo esc_html( $footer_bottom_link2_text ); ?></a>
				</div>
			</div>
			
		</div>
	</footer><!-- #colophon -->

	</div><!-- #smooth-content -->
</div><!-- #smooth-wrapper -->

</div><!-- #page -->

<?php wp_footer(); ?>

<script>
// A helper script within footer to apply common hover state behavior for injected wp_menu <a> tags without writing PHP custom walkers
document.addEventListener("DOMContentLoaded", function() {
    const footerLinks = document.querySelectorAll('#colophon .lg\\:col-span-2 ul li a');
    footerLinks.forEach(link => {
        link.classList.add('hover:text-[#111]', 'transition-colors');
    });
});
</script>

</body>
</html>
