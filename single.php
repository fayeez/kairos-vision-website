<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>
			<div class="main-background"></div>
			<div class="main-content" id="content">
				<?php get_template_part( 'content', 'single' ); ?>
				<div id="centre">
					<?php comments_template( '', true ); ?>
				</div>	
			</div>
			
		</div>
		<?php get_footer(); ?>
		<div id="flow-wrapper">
			<div class="flow-style">
				<h2 id="flow-size">
					<a class="call-to-action" href="#">Portfolio</a>
				</h2>
			</div>
		</div>
		<?php	wp_footer(); ?>

	</body>
</html>
