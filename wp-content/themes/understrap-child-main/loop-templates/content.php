<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	
	<div class="entry-content">

	<div class="card mb-3">
		<img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" class="card-img-top" alt="th">
		<div class="card-body">
			<h5 class="card-title">
				<?php	the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
					'</a></h2>'
					);
					?>
			</h5>
			<p class="card-text"><?php the_excerpt();?></p>


			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<p class="card-text">
						<small class="text-muted"><?php understrap_posted_on(); ?></small>
					</p>
				</div><!-- .entry-meta -->
			<?php endif; ?>
			
		</div>
		</div>

		<?php
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->


</article><!-- #post-## -->
