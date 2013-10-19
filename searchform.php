<?php
/**
 * The template for displaying search forms in the Sleek theme
 *
 * @package WordPress
 * @subpackage Sleek 1.0
 * @since Sleek 1.0
 */
?>
	
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="field" name="s" id="search" placeholder="<?php esc_attr_e( 'Search', 'sleek' ); ?>" />
		<input type="submit" class="search-submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'sleek' ); ?>" />
	</form>
	