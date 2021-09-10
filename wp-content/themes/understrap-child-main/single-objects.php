<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<!-- <?php
				//while ( have_posts() ) {
					//the_post();
					//get_template_part( 'loop-templates/content', 'single' );
					//understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					//if ( comments_open() || get_comments_number() ) {
					//	comments_template();
					//}
				//}
				?> -->

				<?php	while ( have_posts() ) {
					the_post(); ?>
					<h1 class="text-center my-3"><?php the_field('name') ;?></h1>
						<img src="<?php the_field('image') ;?>" alt="" class="mb-4"/>
					<ul class="list-unstyled mb-5">
						<?php $terms = get_the_terms( $post->ID, 'district' ); ?>
							<?php foreach ( $terms as $term ) { ?>
							<li><b>Район:</b> <?php echo $term->name; ?></li>
						<?php } ;?>
					
						<li><b>Координаты местонахождения:</b> <?php the_field('location') ;?></li>
						<li><b>Этажей: </b><?php the_field('floors') ;?></li>
						<li><b>Тип строения:</b> <?php the_field('type') ;?></li>
						<li><b>Экологичность: </b><?php the_field('eco') ;?></li>
					</ul>
					<h5>Помещение:</h5>
					<?php if( have_rows('accomodation') ) { 
					 		while( have_rows('accomodation') ): the_row(); 

						// Get sub field values.
						$sq = get_sub_field('sq');
						$rooms = get_sub_field('rooms');
						$balcony = get_sub_field('balcony');
						$wc = get_sub_field('wc');
						$img = get_sub_field('img');

						?>
					
							<div class="card mb-3">
								<div class="row no-gutters">
									<div class="col-md-4">
										<img src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $img['alt'] ); ?>" />
									</div>
									<div class="col-md-8">
										<div class="card-body">
										<h5 class="card-title">Площадь: <?php echo $sq ;?> м<sup>2</sup></h5>
										
										<ul class="card-text">
											<li>Комнат: <?php echo $rooms ;?></li>
											<li>Балкон: <?php echo $balcony ;?></li>
											<li>Санузел: <?php echo $wc ;?></li>
										</ul>
										</div>
									</div>
								</div>
							</div>

					<?php endwhile; ?>
				<?php }; ?>




				<?php } ;?>



			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
