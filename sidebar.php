<div class="box6 left-border right">
    <h3>Search</h3>
    
    <div class="box19 sidebar">
        <?php get_search_form(); ?>
    </div>
    <!--TODO: how to widgetize the sidebar-->
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) { ?>
    <div class="box19 sidebar">
        <li id="recent-posts" class="widget">
            <h3>Recent Posts</h3>
            <ul>
                <ul><?php wp_get_archives('type=postbypost&limit=7');?></ul>
            </ul>
        </li>
    </div>
    <div class="box19 sidebar">
        <li id="archives" class="widget"><h3>Archives</h3>
            <ul><?php wp_get_archives('type=monthly&limit=7'); ?></ul>
        </li>
    </div>
    <div class="box19 sidebar">
        <li id="categories" class="widget">
            <h3>Categories</h3>
            <ul>
                <?php wp_list_categories('title_li=&orderby=name'); ?>
            </ul>
        </li>
    </div>
    <?php } ?>
</div>