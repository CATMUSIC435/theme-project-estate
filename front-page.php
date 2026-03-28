<?php
/**
 * The front page template file
 */

get_header();
?>

<main id="primary" class="site-main front-page">

	<?php get_template_part( 'patterns/hero' ); ?>
	
	<?php get_template_part( 'patterns/about' ); ?>
	
	<?php get_template_part( 'patterns/timeline' ); ?>
	
	<?php get_template_part( 'patterns/projects' ); ?>
	
	<?php get_template_part( 'patterns/gallery' ); ?>
	
	<?php get_template_part( 'patterns/news' ); ?>
	
	<?php get_template_part( 'patterns/leadership' ); ?>
	
	<?php get_template_part( 'patterns/careers' ); ?>
	
	<?php get_template_part( 'patterns/contact' ); ?>

</main><!-- #primary -->

<?php
get_footer();
