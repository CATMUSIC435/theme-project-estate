<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header g-section" style="padding-bottom: 50px;">
				<div class="container text-center">
					<?php
					the_archive_title( '<h1 class="section-title">', '</h1>' );
					the_archive_description( '<div class="archive-description lead">', '</div>' );
					?>
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
								<div class="meta">
									<span class="date"><?php echo get_the_date( 'd.m.Y' ); ?></span>
								</div>
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

		<?php else : ?>
			<div class="container g-section">
				<p>Không tìm thấy nội dung nào.</p>
			</div>
		<?php endif; ?>

	</main><!-- #primary -->

<?php
get_footer();
