<?php
/*
Template Name: Client Portfolio - 2 Columns
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
					$thumbnail_id = get_post_thumbnail_id($post->ID);
					$args = array(  
						'numberposts' => -1, // Using -1 loads all posts  
						'orderby' => 'menu_order', // This ensures images are in the order set in the page media manager  
						'order'=> 'ASC',  
						'post_mime_type' => implode( ',', get_allowed_mime_types() ), // We only want to pull images into this array, what about videos?
						'post_parent' => $post->ID, // Important part - ensures the associated images are loaded 
						'post_status' => null, 
						'post_type' => 'attachment',
						'include' => $thumbnail_id,
					);
					$attachments = get_children($args);
					
					if ($attachments)
					{ ?>
						<div class="box19 offset2 portfolio">
						<?php foreach($attachments as $attachment)
							
							{ ?>
							<div class="box8 offset2 two-columns">
								
								<?php if (strstr($attachment->post_mime_type, 'image' ) != FALSE) {
									?>
										<div class="portfolio-img-thumbs">
										<a title="<?php echo $attachment->post_content; ?>" href="<?php echo $attachment->guid; ?>" rel="prettyPhoto[pp_gal]">
											<img alt="<?php echo $attachment->post_title; ?>" src="<?php echo $attachment->guid; ?>"/>
										</a>
										</div>
										<div class="box20 portfolio-description">
											<h4><?php echo $attachment->post_title; ?></h4>
											<?php
											echo "WHAT IS GOING ON";
											//echo $attachment->post_content;
											$attachment->post_excerpt;
											//$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
											//if(count($alt)) {
											//	echo $alt;
											//}
											//else{
											//	echo "wtf";
											//}


											?>
										</div>

								<?php	}
								elseif (strpos($attachment->post_mime_type, 'video' ) !== FALSE){
									
									if (strstr($attachment->guid, 'youtube') != FALSE){
										
										$img_id = str_replace('http://www.youtube.com/watch?v=', '', $attachment->guid);
									?>
										
										<a title="<?php echo $attachment->post_content; ?>" href="<?php echo $attachment->guid; ?>" rel="prettyPhoto[pp_gal]">
											<img alt="<?php echo $attachment->post_title; ?>" src="<?php echo 'http://img.youtube.com/vi/'.$img_id.'/0.jpg' //<?php bloginfo('template_directory')/images/icons/video-icon.png;?>"/>
										</a>
									<?php }
									elseif (strstr($attachment->guid, 'vimeo') != FALSE){
										$img_id = str_replace('http://vimeo.com/', '', $attachment->guid);
										$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$img_id.php"));
										?>
										<a title="<?php echo $attachment->post_content; ?>" href="<?php echo $attachment->guid; ?>" rel="prettyPhoto[pp_gal]">
											<img alt="<?php echo $attachment->post_title; ?>" src="<?php echo $hash[0]['thumbnail_large'];?>" />
										</a>
									<?php }
									else {?>
									
										<a title="<?php echo $attachment->post_content; ?>" href="<?php echo $attachment->guid; ?>" rel="prettyPhoto[pp_gal]">
											<img alt="<?php echo $attachment->post_title; ?>" src="<?php bloginfo('template_directory'); ?>/images/icons/video-icon.png"/>
										</a>
									<?php } ?>
								<?php } ?>
							</div>  
							<?php }
							
							?>
							
							
						</div>
						
					<?php
					} ?>
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

