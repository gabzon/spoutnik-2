@php
$cycle = array('cycle');

$args = array(
  'orderby'           => 'name',
  'order'             => 'ASC',
  'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);

@endphp

@foreach ($cats as $cat)
  @if ( $cat->slug === 'cycles-reguliers' )
    @php
    $term_id = $cat->term_id;
    $taxonomy_name = 'cycle';
    $termchildren = get_term_children( $term_id, $taxonomy_name );
    @endphp
    <h3>Cycles réguliers</h3>
    @php
    display_order_alphabeticaly($termchildren, 'cycle');
    @endphp

  @endif

  @if ( $cat->slug === 'cycles-focus' )
    @php
    $term_id = $cat->term_id;
    $taxonomy_name = 'cycle';
    $termchildren = get_term_children( $term_id, $taxonomy_name );
    @endphp
    <h3>Cycles ponctuels</h3>
    @php( display_order_alphabeticaly($termchildren, 'cycle') )
  @endif
@endforeach
