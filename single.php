<?php
/**
 * Single Post Template
 */
get_header();

// Make sure we have a post to display
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		// Get the post thumbnail URL, or use a default professional background
		$thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
		if ( ! $thumbnail_url ) {
			$thumbnail_url = 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&q=80&w=2000';
		}
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-article' ); ?>>
			<!-- Article Hero -->
			<div class="article-hero" style="background-image: url('<?php echo esc_url( $thumbnail_url ); ?>');">
				<div class="article-hero-overlay"></div>
				<div class="article-hero-content container">
					<div class="article-meta">
						<span class="article-category"><?php the_category( ', ' ); ?></span>
						<span class="article-date"><?php echo get_the_date(); ?></span>
					</div>
					<h1 class="article-title"><?php the_title(); ?></h1>
					<div class="article-author">Bởi <strong><?php the_author(); ?></strong></div>
				</div>
			</div>

			<!-- Article Body -->
			<div class="article-body-container">
				<div class="article-content">
					<?php
					// Display post content
					the_content();
					
					// Display pagination if the post is split into multiple pages
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Trang:', 'alize-luxury' ),
						'after'  => '</div>',
					) );
					?>
				</div>
                
                <!-- Articles Navigation -->
                <nav class="article-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link( '%link', '<span class="nav-label">Bài trước</span><span class="nav-title">%title</span>' ); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link( '%link', '<span class="nav-label">Bài tiếp theo</span><span class="nav-title">%title</span>' ); ?>
                    </div>
                </nav>
			</div>
		</article>

	<?php
	endwhile;
endif;

get_footer();
