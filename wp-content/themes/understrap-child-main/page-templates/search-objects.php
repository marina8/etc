<?php
/**
 * Template Name: Поиск объектов
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<main class="site-main" id="main">
			<div class="col-12">

				<?php the_content();?>

				<?php get_search_form() ;?>

				<?php 
				// args
					$args = array(
						'numberposts'	=> -1,
						'post_type'		=> 'objects',
						'meta_query'	=> array(
							'relation'		=> 'AND',
							array(
								'key'		=> 'floors',
								'value'		=> 15,
								'type'		=> 'NUMERIC',
								'compare'	=> '<'
							),
							array(
								'key'		=> 'type',
								'value'		=> 'кирпич',
								'compare'	=> '='
							)
						)
					);
					// query
					$the_query = new WP_Query( $args );

					?>
					<?php if( $the_query->have_posts() ): ?>
						
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<div class="card mb-2">
								<div class="row no-gutters">
									<div class="col-md-3">
										<a href="<?php the_permalink(); ?>">
											<img src="<?php the_field('image'); ?>"  class="card-img"/>
										</a>
									</div>
									
									<div class="col-md-9">
										<div class="card-body"><?php the_field('name'); ?></div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					
					<?php endif; ?>

					<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
					
				</div>

			</main><!-- #main -->



	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
