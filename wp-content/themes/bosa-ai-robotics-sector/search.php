<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bosa AI Robotics Sector
 */

get_header();
?>
<div id="content" class="site-content">
	<div class="container">
		<div class="wrap-detail-page">
			<?php
				bosa_ai_robotics_sector_blog_page_title();
				if( !get_theme_mod( 'bosa_ai_robotics_sector_breadcrumbs_controls', 'show_in_all_page_post' ) == 'disable_in_all_pages' || get_theme_mod( 'bosa_ai_robotics_sector_breadcrumbs_controls', 'show_in_all_page_post' ) == 'show_in_all_page_post' ){
					bosa_ai_robotics_sector_breadcrumb_wrap();
				}
			?>
			<div class="search-post-wrap">
				<?php if ( have_posts() ) : ?>
				<div class="row masonry-wrapper">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile; ?>
					</div>
						<?php
							if( !get_theme_mod( 'bosa_ai_robotics_sector_disable_pagination', false ) ):
								the_posts_pagination( array(
									'next_text' => '<span>'.esc_html__( 'Next', 'bosa-ai-robotics-sector' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Next page', 'bosa-ai-robotics-sector' ) . '</span>',
									'prev_text' => '<span>'.esc_html__( 'Prev', 'bosa-ai-robotics-sector' ) .'</span><span class="screen-reader-text">' . esc_html__( 'Previous page', 'bosa-ai-robotics-sector' ) . '</span>',
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'bosa-ai-robotics-sector' ) . ' </span>',
								) );
							endif;
						?>
					<?php
				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
		</div>
	</div><!-- #container -->
</div><!-- #content -->
<?php
get_footer();
