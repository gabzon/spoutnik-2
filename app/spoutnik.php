<?php


function display_order_alphabeticaly($termchildren, $tax_name){
    $orderArray = [];
    $taxonomy_name = $tax_name;
    foreach ($termchildren as $child) {
        $term = get_term_by( 'id', $child, $taxonomy_name );
        $orderArray[$term->name]['name'] = $term->name;
        $orderArray[$term->name]['id'] = $term->term_id;
        $orderArray[$term->name]['link'] = get_term_link( $child, $taxonomy_name );
    }
    //setlocale(LC_ALL, 'fr_FR');
    sort($orderArray);
    echo '<ul class="archives-links">';
    foreach ($orderArray as $key) {
        echo '<li><a href=" '. $key['link'] .' " target="_blank">' . $key['name'] . '</a></li>';
    }
    echo '</ul>';
}
