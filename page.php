<?php get_header(); ?>
			<div class="main-background"></div>
			<div class="main-content" id="content">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					
				<?php endwhile; // end of the loop. ?>
			</div>
				
		</div>
		<?php get_footer(); ?>
		<div id="flow-wrapper">
			<div class="flow-style">
				<h2 id="flow-size">
					<a class="call-to-action" href="#"></a>
				</h2>
			</div>
		</div>
	</body>
</html>