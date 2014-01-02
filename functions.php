<?php
    
    //error_reporting(E_ALL);
    //ini_set('error_reporting', E_ALL);
    //ini_set('display_errors',1);

    
    add_theme_support('menus');
    add_theme_support( 'post-thumbnails' );
    
    /*DEFINE 'areas' for where the menu should be displayed*/	
    if(function_exists('register_nav_menu'))
    {
        register_nav_menu( 'primary_nav', 'Primary Navigation');
    };

    if (function_exists('register_sidebar'))
    {
       register_sidebar(array(
           'name' => 'Customisation Menu',
           'before_widget' => '<div id="customiser">',
           'after_widget' => '</div>',
           'before_title' => '',
           'after_title' => '',
       ));
    }
     
    // Load up our theme options page and related code.
    require_once(get_template_directory() . '/inc/theme-options.php');
    
    //Widgetized Sidebar
    //Check to see if there is an updated version of doing this

    if(function_exists('register_sidebar')) {
        register_sidebar(array('name' => 'Sleek'));
    }
    if ( ! function_exists( 'sleek_comment' ) ) :
    
    function display_images() {
        $imgdir=scandir("/home2/kairosvi/public_html/wp-content/themes/kairos-vision-website/images");
        shuffle($imgdir);
        $imgformats=array('.jpg', '.jpeg', '.png', '.tiff', '.tif', '.bmp', '.gif');
        $id=1;
        $currentFile=$_SERVER["PHP_SELF"];
        
        if (($key = array_search('semi-transparent.png', $imgdir)) !== false)
        {
            unset($imgdir[$key]);
        }
        
        foreach($imgdir as $img)
        {
            foreach($imgformats as $imgformat)
            {
         
                if (strpos($img, $imgformat))
                {
                    $alt = basename($img, $imgformat);
                    if (strpos($currentFile, 'index'))
                    {
                        $img_tag="<img class='img-bg' id='$id' src='$imgpath$img' alt='$alt'/>";
                        print $img_tag;
                    }
                    $id+=1;
                }
            }  
        }
    }
    
    function google_maps_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    "width" => '640',
    "height" => '480',
    "src" => ''
    ), $atts));
    return '<div class="google-map"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&output=embed"></iframe></div>';
    }
    add_shortcode("googlemap", "google_maps_shortcode");

/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own sleek_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since SLeek 1.0
 */
function sleek_comment( $comment, $args, $depth ) {
    print "<div class='box19'>";
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
        ?>
        <li>
            <p><?php _e( 'Pingback:', 'sleek' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'sleek' ), '<span class="edit-link">', '</span>' ); ?></p>
        <?php
                break;
            default :
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="box16">
                <footer class="comment-meta">
                    <div class="box20 comment-title">
                        <span class="fn"><?php echo get_comment_author_link() ?></span> on <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
                        <time datetime="<?php echo get_comment_time( 'c' ) ?>"><?php  echo get_comment_date(). " " . get_comment_time() ?></time></a>
                     </div>
                    <div class="box2">
                        <?php
                            $avatar_size = 40;
                            if ( '0' != $comment->comment_parent )
                                $avatar_size = 25;
    
                            echo get_avatar( $comment, $avatar_size );
                    print "</div><!-- .comment-author .vcard -->";
                        ?>
    
                        <?php edit_comment_link( __( 'Edit', 'sleek' ), '<span class="edit-link">', '</span>' ); ?>
                    
    
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'sleek' ); ?></em>
                        <br />
                    <?php endif; ?>
    
                </footer>
    
                <div class="comment-content"><?php comment_text(); ?></div>
    
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'sleek' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div><!-- .reply -->
            </div><!-- #comment-## -->
    
        <?php
                break;
        endswitch;
    print "</div>";
}
endif; // ends check for sleek_comment()

?>