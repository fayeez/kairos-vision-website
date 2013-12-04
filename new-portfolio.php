<?php
/*
Template Name: New Portfolio - 2 Columns
*/
?>

<?php get_header(); ?>
	
		<div class="main-background"></div>
		<div class="main-content" id="content">
			<article class="inner-content box20">
				<div class="box19 offset">
					<header>
						<h2><?php the_title(); ?></h2>
					</header>
					<?php 
					$args = array(  
						'numberposts' => -1, // Using -1 loads all posts  
						'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager  
						'order'=> 'ASC',  
						//'post_mime_type' => implode( ',', get_allowed_mime_types() ), // We only want to pull images into this array, what about videos?
						'post_parent' => $post->ID, // Important part - ensures the associated images are loaded 
						'post_status' => null, 
						'post_type' => 'any'  
					);
					foreach ($args as $arg)
					{
						echo $arg . "  <br/> ";
					}
					echo get_children($args);
					$attachments = get_children($args);
					echo count($attachments);
					
					//if (!$attachments)
					//{ ?>
						<div class="box19 offset2 portfolio">
						<?php foreach($attachments as $attachment)
							
							{ echo $attachment; ?>
							
							
							<?php }
							
							?>
							
							
						</div>
						
					<?php
					//} ?>
				</div>
			</article>
				
			
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

