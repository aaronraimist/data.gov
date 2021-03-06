<?php
$category = get_the_category();
$term_name = $category[0]->cat_name;
$term_slug = $category[0]->slug;
?>
<?php
$cat_name = $category[0]->cat_name;
$cat_slug = $category[0]->slug;
?>
<div class="subnav banner">
    <div class="container">
        <nav role="navigation" class="topic-subnav">
            <ul class="nav navbar-nav">
                <?php
                // show Links associated to a community
                // we need to build $args based either term_name or term_slug
                $args = array(
                    'category_name'=> $term_slug, 'categorize'=>0, 'title_li'=>0,'orderby'=>'rating');
                wp_list_bookmarks($args);
                if (strcasecmp($term_name,$term_slug)!=0) {
                    $args = array(
                        'category_name'=> $term_name, 'categorize'=>0, 'title_li'=>0,'orderby'=>'rating');
                    wp_list_bookmarks($args);
                }
                ?>
            </ul></nav></div>
</div>
<div class="container">
<?php
                    while( have_posts() ) {
                        the_post();
                        ?>
    <?php the_content();   ?>
    <?php }?>
    <div id="regionsidebar">
        <div class="panels-flexible-region-inside">
            <div class="panel-pane pane-views pane-ocean-regional-planning">
<div class="inner">
  <?php
                                    $args = array(
                                        'orderby'          => '',
                                        'meta_key'         => 'field_alias',
                                        'orderby'          => 'meta_value',
                                        'order'            => 'ASC',
                                        'post_type'        => 'regional_planning',
                                        'post_status'      => 'publish',
                                        'suppress_filters' => true );
                                    $query = null;
                                    $query = new WP_Query($args);
                                    if( $query->have_posts() ) {
                                        echo '<h2 class="block-title">Planning Regions</h2>';
                                        echo '<div class="panecontent">';
                                        echo '<div class="item-list">';
                                        echo '<ul>';
                                        while ($query->have_posts()) : $query->the_post();
                                            $link="/ocean/page/regional-planning?field_alias_value=".get_post_meta($post->ID, 'field_alias',TRUE)
                                            ?>
  <li><a href="<?php echo $link?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
    <?php the_title(); ?>
    </a></li>
  <?php
                                        endwhile;
                                    }?>
</div>
</div>
        </div>
    </div>
    </div>