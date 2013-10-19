<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package test
 * @subpackage Sleek
 * @since Sleek 1.0
 */
?>

    <article class="inner-content box20">
        <div class="box19 offset">
            <header>
                <h2><?php the_title(); ?></h2>
            </header>
            <div class="box19">
            <?php the_content(); ?>
            </div>
        </div>
    </article>
