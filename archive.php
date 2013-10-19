<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage SleekDesign
 * @since Sleek 1.0
 */

get_header(); ?>

		<div class="main-background"></div>
		<div class="main-content" id="content">

			<div class="inner-content box20">
				<div class="box12">
					<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h1 class="page-title">
							<?php if ( is_day() ) : ?>
								<?php printf( __( 'Daily Archives: %s', 'sleek' ), '<span>' . get_the_date() . '</span>' ); ?>
							<?php elseif ( is_month() ) : ?>
								<?php printf( __( 'Monthly Archives: %s', 'sleek' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'sleek' ) ) . '</span>' ); ?>
							<?php elseif ( is_year() ) : ?>
								<?php printf( __( 'Yearly Archives: %s', 'sleek' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'sleek' ) ) . '</span>' ); ?>
							<?php else : ?>
								<?php _e( 'Blog Archives', 'sleek' ); ?>
							<?php endif; ?>
						</h1>
					</header>
					<?php /* Start the Loop */ ?>
					<?php while( have_posts() ): the_post();?>
							
						<div class="box19 post-info post-minor">
				   
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
							<ul class="blue-text">
								 <li><small><?php the_time('D d M Y'); ?></small></li>
								 <li><small><?php the_category(', '); ?></small></li>
								 <li><small>tagged <?php the_tags(''); ?></small></li>
								 <li><small><?php the_author_posts_link(); ?></small></li>
								 <li><small><?php comments_popup_link(__('0 comments','example'),__('1 comment','example'),__('% comments','example')); ?></small></li>
							</ul>
				   
							<?php the_excerpt(__('Continue reading È','example')); ?>
						</div>
					<?php endwhile; ?>
					<?php else : ?>
						<article>
							<header>
								<h1><?php _e( 'Nothing Found', 'sleek' ); ?></h1>
							</header>
							<div>
								<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'sleek' ); ?></p>
								<?php get_search_form(); ?>
							</div>
						</article>
					<?php endif; ?>
				
				</div>
				<?php get_sidebar(); ?>
			</div>
		</div>
<?php get_footer(); ?>