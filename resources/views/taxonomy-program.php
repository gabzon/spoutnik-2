<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<div class="ui container">

  <?php $image_cycle = get_term_meta(get_queried_object()->term_id, 'program_image', false); ?>
  <h1><?= get_queried_object()->description ?></h1>
  <div class="ui grid stackable">
    <div class="one wide column"></div>
    <div class="seven wide column">
      <?php if ($image_cycle[0]): ?>
        <img src="<?= $image_cycle[0]; ?>" alt="" class="ui image" />
      <?php endif; ?>
      <br>
      <?php $pdf = get_term_meta(get_queried_object()->term_id, 'program_pdf', false); ?>
      <?php if ( $pdf[0] ): ?>
        <?php $pdf = get_term_meta(get_queried_object()->term_id, 'program_pdf', false); ?>
        <a href="<?= esc_url($pdf[0]); ?>" class="ui button">
          <?php _e('Télécharger le programme','sage'); ?>
        </a>
      <?php endif; ?>
    </div>
    <div class="seven wide column">
      <?php echo get_term_meta(get_queried_object()->term_id, 'program_text', true); ?>
    </div>
    <div class="one wide column"></div>
  </div>
</div>
<br>
<br>
<br>
<?php $program = []; ?>

<?php while (have_posts()) : the_post(); ?>
  <?php
  $movie_detail = [
    'id'          => get_the_ID(),
    'image'       => wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'full'),
    'title'       => get_the_title(),
    'link'        => get_the_permalink(),
    'tagline'     => get_post_meta($post->ID,'film_landing',true),
    'description' => get_the_excerpt()
  ];
  array_push($program, $movie_detail);
  ?>
  <?php //get_template_part('templates/content', get_post_type() != 'post' ? get_post_type() : get_post_format()); ?>
<?php endwhile; ?>
<?php $reversed_program = array_reverse($program); ?>
<?php //piklist::pre($reversed_program) ?>

<div class="ui container">
  <div class="ui four column grid stackable">
    <?php foreach ($reversed_program as $key): ?>
      <div class="column">
        <article <?php post_class(); ?>>
          <header>
            <a href="<?= $key['link']; ?>">
              <img src="<?= $key['image'][0] ?>" alt="" class="ui image"/>
            </a>
            <h2 class="entry-title"><a href="<?= $key['link']; ?>" class="title-link"><?= $key['title']; ?></a></h2>
            <h4><?= $key['tagline'] ?></h4>
          </header>
          <br>
          <div class="entry-summary">
            <?= $key['description']; ?>
          </div>
        </article>
      </div>
    <?php endforeach; ?>
  </div>
  <?php the_posts_navigation(); ?>
  <br>
</div>
<br>
