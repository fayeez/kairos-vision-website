<?php
/**
 * The template used for displaying single post content in single.php
 *
 * @package test
 * @subpackage Sleek
 * @since Sleek 1.0
 */
?>

    <article class="inner-content box20">
        <div class="box19 bottom-border">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<div class="box20 blue-text post-nav">
						<div class="alignleft"><?php previous_post_link( '%link', '&laquo; %title' ) ?></div>
						<div class="alignright"><?php next_post_link( '%link', '%title &raquo;' ) ?></div>
					</div>
			
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <h2><?php the_title(); ?></h2>			
			
						<div class="box20 entry">
							<?php the_content('<p class="serif">' . __('Read the rest of this entry &raquo;', 'kubrick') . '</p>'); ?>
							<hr/>
							<?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:', 'kubrick') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							<?php the_tags( '<p class="tags">' . __('Tags:', 'kubrick') . ' ', ', ', '</p>'); ?>
						</div>
					</div>
			
			
				<?php endwhile; else: ?>
			
					<p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
			
			<?php endif; ?>
        </div>
    </article>
