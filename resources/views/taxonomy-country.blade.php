<?php get_template_part('templates/page', 'header'); ?>

@if ( !have_posts() )
  <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
@endif

<div class="ui container">

    @php( $image_country = get_term_meta(get_queried_object()->term_id, 'image_country', false) )
    <h1>{{ get_queried_object()->name; }}</h1>
    <div class="ui grid stackable">
        <div class="one wide column"></div>
        <div class="seven wide column">
            <img src="<?= $image_country[0]; ?>" alt="" class="ui image" />
        </div>
        <div class="seven wide column">
            <?php echo term_description( $term_id, $taxonomy ) ?>
        </div>
        <div class="one wide column"></div>
    </div>
</div>
<br>
<br>
<br>
<div class="ui container">
    <div class="ui four column grid stackable">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
        <?php endwhile; ?>
    </div>
    <?php the_posts_navigation(); ?>
    <br>
</div>
<br>
