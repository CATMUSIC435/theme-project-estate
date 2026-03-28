<?php
/**
 * The template for displaying all single pages
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			// Custom header for page (simulate single.php)
			$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
			if ( ! $thumbnail_url ) {
				$thumbnail_url = 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2000';
			}
			?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="article-hero" style="background-image: url('<?php echo esc_url( $thumbnail_url ); ?>');">
					<div class="article-hero-overlay"></div>
					<div class="article-hero-content container">
						<h1 class="article-title"><?php the_title(); ?></h1>
					</div>
				</div>

				<div class="article-body-container">
					<div class="article-content">
						<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Trang:', 'alize-luxury' ),
							'after'  => '</div>',
						) );
						?>
					</div>
				</div>
			</article>

			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
get_footer();
