<?php


$program = array('program');

$args = array(
    'orderby'           => 'name',
    'order'             => 'DESC',
    'hide_empty'        => true
);

$cats = get_terms($program, $args);
//piklist::pre($cats);
?>
<ul class="archives-links">
        <?php foreach ($cats as $cat): ?>
            <li>
                <a href="<?= esc_url( get_term_link($cat) ); ?>" target="_blank">
                    <?= $cat->description; ?>
                </a>
            </li>
        <?php endforeach; ?>
</ul>
