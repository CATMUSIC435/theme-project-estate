<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found g-section" style="min-height: 80vh; display: flex; align-items: center; justify-content: center;">
			<div class="container text-center">
				<h1 class="section-title" style="font-size: 8rem; color: var(--primary-color);">404</h1>
				<h2 class="page-title">Trang không tồn tại</h2>
				<p style="margin: 30px 0; color: var(--text-muted);">Có vẻ như không nội dung nào tồn tại ở địa chỉ này. Bạn có muốn quay lại trang chủ không?</p>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Trở Về Trang Chủ</a>
			</div>
		</section>

	</main><!-- #primary -->

<?php
get_footer();
