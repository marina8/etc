<?php
/**
 * Search results partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="card mb-3 search-card">
		<div class="row no-gutters">
			<div class="col-md-4 d-flex">
				<?php if ( get_field('image') ) { ?>
					<img src="<?php the_field('image');?>" class="card-img" alt="...">
				<?php } else { ?>
					<img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" alt="th" class="card-img mb-3" />
				<?php } ;?>
				
			</div>
			<div class="col-md-8">
				<div class="card-body">
				<?php
					the_title(
						sprintf( '<h2 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
						'</a></h2>'
					);
					?>
				
				<?php if ( !empty( get_the_content( $post->ID ) ) ) { ?>
					<p class="card-text"><?php the_excerpt(); ?></p>
				<?php } else { ?>

					<?php $terms = get_the_terms( $post->ID, 'district' ); ?>
					
					<ul class="list-unstyled mb-2">
						<li><b>Этажей: </b><?php the_field('floors') ;?></li>
						<li><b>Тип строения:</b> <?php the_field('type') ;?></li>
						<?php foreach ( $terms as $term ) { ?>
							<li><b>Район:</b> <?php echo $term->name; ?></li>
						<?php } ;?>
					</ul>

					<a class="btn btn-secondary" href="<?php the_permalink() ;?>"> Подробнее...</a>
				<?php } ;?>
				
				</div>
			</div>
		</div>
	</div>

</article><!-- #post-## -->
