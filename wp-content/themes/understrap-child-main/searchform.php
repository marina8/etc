<?php
/**
 * The template for displaying search forms
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$uid = wp_unique_id( 's-' ); // The search form specific unique ID for the input.

$aria_label = '';
if ( isset( $args['aria_label'] ) && ! empty( $args['aria_label'] ) ) {
	$aria_label = 'aria-label="' . esc_attr( $args['aria_label'] ) . '"';
}
?>

<!-- <form role="search" class="search-form" method="get" action="<?php //echo esc_url( home_url( '/' ) ); ?>" <?php //echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>>
	<label class="sr-only" for="<?php //echo $uid; ?>"><?php //echo esc_html_x( 'Search for:', 'label', 'understrap' ); ?></label>
	<div class="input-group">
		<input type="search" class="field search-field form-control" id="<?php //echo $uid; ?>" name="s" value="<?php //the_search_query(); ?>" placeholder="<?php //echo esc_attr_x( 'Search &hellip;', 'placeholder', 'understrap' ); ?>">
		<span class="input-group-append">
			<input type="submit" class="submit search-submit btn btn-primary" name="submit" value="<?php //echo esc_attr_x( 'Search', 'submit button', 'understrap' ); ?>">
		</span>
	</div>
</form> -->

<form role="search" class="search-form border rounded px-3 py-4 mb-5" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo $aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>>
				<div class="row">
					<div class="form-group col-3">
						<label for="name">Название</label>
						<input type="text" class="form-control" id="name" name="s" value="<?php the_search_query(); ?>">
					</div>
						<div class="form-group col-3">
							<label for="floors">Кол-во этажей</label>
							<select class="form-control" id="floors">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
								<option>14</option>
								<option>15</option>
								<option>16</option>
								<option>17</option>
								<option>18</option>
								<option>19</option>
								<option>20</option>
							</select>
						</div>
						
						
						<div class="form-group col-3">
							<label for="floors">Экологичность</label>
							<select class="form-control" id="floors">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						</div>
						<div class="form-group col-3">	
							<label for="sq">Площадь, кв.м</label>
							<input type="text" class="form-control" id="sq"">
						</div>
						<div class="form-group col-auto">
							<p>Тип строения</p>
							<div class="form-check form-check-inline">	
								<input class="form-check-input" type="radio" name="exampleRadios" id="type1" value="option1" checked>
								<label class="form-check-label" for="type1">панель</label>
							</div>
							<div class="form-check form-check-inline">	
								<input class="form-check-input" type="radio" name="exampleRadios" id="type2" value="option2" >
								<label class="form-check-label" for="type2">кирпич</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="exampleRadios" id="type3" value="option3" >
								<label class="form-check-label" for="type3">пеноблок</label>
							</div>
						</div>
						
						<div class="form-group col-auto">
							<p>Количество комнат</p>
							<div class="form-check form-check-inline">	
								<input class="form-check-input" type="radio" name="rooms" id="room1" value="1" checked>
								<label class="form-check-label" for="room1">1</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="rooms" id="room2" value="2" >
								<label class="form-check-label" for="room2">2</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="rooms" id="room3" value="3" >
								<label class="form-check-label" for="room3">3</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="rooms" id="room4" value="4" >
								<label class="form-check-label" for="room4">4</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="rooms" id="room5" value="5" >
								<label class="form-check-label" for="room5">5</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="rooms" id="room10" value="10" >
								<label class="form-check-label" for="room10">10</label>
							</div>
						</div>
						<div class="form-group col-auto">
							<p>Балкон</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="balcony" id="balcony" value="yes" >
								<label class="form-check-label" for="balcony">да</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="balcony" id="balcony2" value="no" >
								<label class="form-check-label" for="balcony2">нет</label>
							</div>
						</div>
						<div class="form-group col-auto">
							<p>Санузел</p>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="wc" id="wc" value="yes" >
								<label class="form-check-label" for="wc">да</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="wc" id="wc2" value="no" >
								<label class="form-check-label" for="wc2">нет</label>
							</div>
						</div>

						<span class="input-group-append col-12">
							<input type="submit" class="submit search-submit btn btn-primary m-auto" name="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'understrap' ); ?>">
						</span>
					</div>
				</form>




