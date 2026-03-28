<?php
/**
 * The main template file
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
				?>
				<header class="page-header">
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				// Include template part here if needed, or simply output
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
					</header>
					
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<?php

			endwhile;

			the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			echo '<p>No content found.</p>';

		endif;
		?>

	</main><!-- #primary -->

<?php
get_footer();
