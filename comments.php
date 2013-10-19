<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to sleek_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage SleekDesign
 * @since Sleek 1.0
 */
?>
<div>
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'sleek' ); ?></p>
</div><!-- #comments -->

<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>
<?php comment_form(); ?>
<?php if ( have_comments() ) :?>
	<div class='box20  '>
		<h2 id="comments-title">
			<?php
				printf( _n( 'One thought on &ldquo;%2$s&rdquo;', 'Comments (%1$s) ', get_comments_number(), 'sleek' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav>
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'sleek' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'sleek' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'sleek' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
	
		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use sleek_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define sleek_comment() and that will be used instead.
				 * See sleek_comment() in sleek/functions.php for more.
				 */
				
				wp_list_comments( array( 'callback' => 'sleek_comment' ) );
				
			?>
		</ol>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav>
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'sleek' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'sleek' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'sleek' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>
	
		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="nocomments"><?php _e( 'Comments are currently closed.' , 'sleek' ); ?></p>
		<?php endif; ?>
	</div>

<?php endif; // have_comments()
?>

</div><!-- #comments -->
