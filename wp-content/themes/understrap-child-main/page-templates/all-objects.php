<?php
/**
 * Template Name: Все объекты
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">
				<div class="col-12">

					<?php the_content();?>

					<?php
						

						$arg = array(
						'post_type'	    => 'objects', 
						'order'		    => 'ASC',
						'orderby'	    => 'date',
						'posts_per_page'    => -1,
					);

					$query = new WP_Query( $arg );

					if ( $query->have_posts() ) { ?>
					<div class="all-objects row">
						<?php while ( $query->have_posts() ) {
							$query->the_post(); ?>

							<?php $terms = get_the_terms( $post->ID, 'district' ); ?>

							<?php foreach ( $terms as $term ) { ?>

							<div class="col-12 col-md-6 col-lg-4">
								<div class="card mb-3">
									<a href="<?php the_permalink() ;?>" class="">
										<img src="<?php the_field('image') ;?>" alt="" class="card-img-top"/>
									</a>
									<div class="card-body">
										<h5 class="card-title"><a href="<?php the_permalink() ;?>" class=""><?php the_field('name') ;?></a></h5>
										<p class="card-text text-muted">Район: <?php echo $term->name; ?></p>
										<ul class="list-unstyled mb-0">
											<li><small>Этажей: <?php the_field('floors') ;?></small></li>
											<li><small>Экологичность: <?php the_field('eco') ;?></small></li>
											<li><small>Тип: <?php the_field('type') ;?></small></li>
										</ul>

									</div>

								</div>
							</div>	
							<?php } ;?>	
						<?php } ?>
						</div>

					<?php } 
					wp_reset_query(); ?>
					
				</div>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();


