@php
$cycle = array('cycle');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);

//piklist::pre($cats);
foreach( $cats as $cat ) {
    //echo $cat->name .' '. $cat->term_id . ' '. $cat->slug .'<br>';

    if ($cat->slug === 'distribution') {
        $term_id = $cat->term_id;
        $taxonomy_name = 'cycle';
        $termchildren = get_term_children( $term_id, $taxonomy_name );
        display_order_alphabeticaly($termchildren, 'cycle');
    }
}

@endphp
