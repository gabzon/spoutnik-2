<?php

$director = array('director');

$args = array(
    'orderby'           => 'name',
    'order'             => 'ASC',
    'hide_empty'        => true,
);

$list = '';
$cats = get_terms($director, $args);
$groups = array();

if( $cats && is_array( $cats ) ) {
    foreach( $cats as $cat ) {
        $first_letter = strtoupper( $cat->name[0] );
        $groups[ $first_letter ][] = $cat;
    }

    if( !empty( $groups ) ) {{
        $index_row .='<div class="topindex"><h3>';
        foreach ($groups as $letter => $cats) {
            $index_row .= '<a href="#' . $letter . '" title="' . $letter . '" style="text-decoration:underline">' . apply_filters( 'the_title', $letter ) . '</a> ';
        }
        $index_row .='</h3></div><br class="clear" />';}
        $list .= '<div class="ui four column grid stackable">';
        foreach( $groups as $letter => $cats ) {
            $list .= '<div class="column">';
            $list .= '<ul class="index" style="list-style-type: none; padding:0; margin:0;">';
            $list .= '<li><a name="' . $letter . '"></a><h5><a href="#cats_top" title="back to top" style="color:black">' . apply_filters( 'the_title', $letter ) . '</a></h5>';
            $list .= '<ul class="links" style="list-style-type: none; padding:0; margin:0;">';
            // echo '<pre>';
            // print_r($cats);
            // echo '</pre>';
            foreach( $cats as $cat ) {
                $term_link = get_term_link( $cat );
                //$url = get_category_link( $cat->term_id );
                $name = apply_filters( 'the_title', $cat->description );
                $list .= '<li><a title="' . $name . '" href="' . $term_link . '" style="color:black;" target="_blank">' . $name . '</a></li>';
            } 		 $list .= '</ul></li>';
            $list .= '</ul>';
            $list .= '</div>';
        }
        $list .= '</div>';
    }
} else $list .= '<p>Sorry, but no artists were found</p>';

?>

<div class="ui container">
    <div class="artist-list">
        <?php print $list; ?>
    </div>
</div>
