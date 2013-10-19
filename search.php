<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage SleekDesign
 * @since Sleek 1.0
 */

get_header(); ?>

		<div class="main-background"></div>
			<div class="main-content" id="content">
				<div class="inner-content box20">
					<div class="box19">
						<?php if ( have_posts() ) : ?>
							<header class="page-header">
								<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'sleek' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
							</header>
							<?php
							$counter = 0;?>
							<?php while (have_posts()) : the_post();
								if($counter == 0) {
									$numposts = $wp_query->found_posts; ?>
									<h3> Search Term: <?php the_search_query(); ?></h3>
									<h3>Number of Results: <?php echo $numposts; ?></h3> <div class="content-ver-sep"></div><br />
									<?php } ?>
								
									<div class="box20">
										<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
										<div class="box20 search-result">
											<?php if (get_post_thumbnail_id() != ""){ ?>
												<div class="box6">
													<?php
														$img = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
														$img = $img[0];
													?>
													<img class="post-thumbnail" src="<?php echo $img; ?>"/>
												</div>
											<? } ?>
											<div class=""><?php the_excerpt(); ?></div>
										</div>
									</div>
									
								<?php $counter++; ?>
							<?php endwhile; ?>
						<?php else :
								status_header(404);
								get_template_part( 'content', '404' );
							
						endif; ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>