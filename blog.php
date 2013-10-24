<?php
/*
Template Name: Blog
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
					<div class="box19 offset1">
						<div class="block_inside">
						<?php
						
							$featured = new WP_Query();
							$featured->query('showposts=1');
							while($featured->have_posts()) :
								$featured->the_post();
								$wp_query->in_the_loop = true;
								$featured_ID = $post->ID;
							?>
							<?php if (get_post_meta($post->ID, 'large_preview', true)) {
							?>
								<div>
									<img src="<?php echo get_post_meta($post->ID, 'large_preview', true); ?>" alt="Featured Post" />
								</div>
							<?php }
							?>
								<div class="post-info post-major">
									<h2>
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
									</h2>
									<ul class="box20 post-meta-text">
										<li class="box2"><p id="offset-text"><?php the_time('D d M Y'); ?></p></li>
										<li class="box1"><p id="offset-text"><?php the_category(', '); ?></p></li>
										<li class="box2"><p id="offset-text"><?php comments_popup_link(__('0 comments','example'),__('1 comment','example'),__('% comments','example')); ?></p></li>
									</ul>
									
									<?php
									$featuredImageID = get_post_thumbnail_id();
									$featured_img_src = wp_get_attachment_image_src( $featuredImageID,'full');
									?>
									<div class="post-major-img">
										<a href="<?php the_permalink(); ?>">
											<img class="content-img-full post-thumbnail" src="<?php echo $featured_img_src[0]; ?>" />
										</a>
									</div>
									<?php the_excerpt(__('Continue reading »','example')); ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="box19">
						<div class="box12">
							<div class="box20">
								<?php query_posts('post_type=post&post_status=publish&posts_per_page=5&paged='. get_query_var('paged')); ?>
 									
								<?php if( have_posts() > 0 ):
										$num_posts=4;
										//Start from -1 because we don't want to count the featured post as our extra posts to show.
										//So we show $num_posts additional posts plus the feartured.
										$postnum=-1; ?>
									<?php while( $postnum < $num_posts ): the_post(); $postnum += 1;; 
										if ($post->ID != $featured_ID) :
											?>
											<div class="box20 post-info post-minor post-box-color">
									   
												<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											
												<ul class="box20 post-meta-text">
													<li class="box3"><?php the_time('D d M Y'); ?></li>
													<li class="box2"><?php the_category(', '); ?></li>
													<li class="box2"><?php comments_popup_link(__('0 comments','example'),__('1 comment','example'),__('% comments','example')); ?></li>
												</ul>
												<?php if (get_the_post_thumbnail())
													{
												?>
														 <div class="box20 post-minor-img">
															<a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail('post-thumbnail', array( 'class'	=> "content-img-medium attachment-post-thumbnail")); ?></a>
														</div> 
												<?php
													}
													else {

													}
												?>
												
												<?php the_excerpt(__('Continue reading »','example')); ?>
											</div>
												
										<?php endif; ?>
									<?php endwhile; ?>
							   
									<div class="navigation">
									  <span class="newer"><?php previous_posts_link(__('<< Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older >>','example')) ?></span>
									</div>
							   
								<?php else: ?>
							   
									<div id="post-404" class="noposts">
										<p><?php _e('More Posts coming soon!','example'); ?></p>
									</div>
							   
								<?php endif; wp_reset_query(); ?>
							   
							</div>

							</div>
							<?php get_sidebar(); ?>
						</div>
						
					</div>
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



