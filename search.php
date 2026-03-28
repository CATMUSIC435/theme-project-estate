<?php
/**
 * The template for displaying search results pages
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header g-section" style="padding-bottom: 50px;">
				<div class="container text-center">
					<h1 class="section-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Kết quả cho: %s', 'alize-luxury' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</div>
			</header><!-- .page-header -->

			<div class="container">
				<div class="news-grid">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						$thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
						if ( ! $thumb_url ) {
							$thumb_url = 'https://images.unsplash.com/photo-1582407947304-fd86f028f716?auto=format&fit=crop&q=80&w=800';
						}
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-card' ); ?>>
							<a href="<?php the_permalink(); ?>" class="news-thumb">
								<img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>">
							</a>
							<div class="news-content">
								<h3><a href="<?php echo esc_url( get_permalink() ); ?>" style="color:var(--text-light);"><?php the_title(); ?></a></h3>
								<p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
								<a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">Chi tiết &rarr;</a>
							</div>
						</article>
					<?php
					endwhile;
					?>
				</div>
				<div class="pagination-wrapper" style="margin-top: 50px; text-align: center;">
					<?php the_posts_navigation(); ?>
				</div>
			</div>

		<?php
		else :
		?>
			<section class="no-results not-found g-section">
				<div class="container text-center">
					<header class="page-header">
						<h1 class="section-title">Không tìm thấy</h1>
					</header>
					<div class="page-content">
						<p>Xin lỗi, nhưng không có gì phù hợp với từ khóa bạn tìm. Vui lòng thử lại bằng vài từ khóa khác.</p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</section>
		<?php
		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();
