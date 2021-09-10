<?php
/**
 * Template Name: Full Width Page
 *	Template Post Type: post
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *	
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post(); 
						//get_template_part( 'loop-templates/content', 'page' );?>
						<h1 class="mb-3 text-center"><?php the_title() ;?></h1>

						<img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" alt="" class="mb-3" />

						<?php the_content() ;?>
						
						

				
					<?php } ;?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();