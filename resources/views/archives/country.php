<?php

$cycle = array('country');

$args = array(
    'orderby'           => 'count',
    'order'             => 'DESC',
    'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);
?>
<div class="ui four column grid">
    <?php  foreach ($cats as $cat) : ?>
        <div class="column">
            <a href="<?= get_term_link($cat->term_id); ?>" style="margin-top:10px;font-family:'Suisse Intl','sans-serif'; color:black;" class="country" target="_blank"><?= $cat->name; ?> (<?= $cat->count; ?>)</a>
        </div>
    <?php endforeach; ?>
</div>
