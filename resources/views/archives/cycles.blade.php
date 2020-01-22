@php
$cycle = array('cycle');

$args = array(
'orderby' => 'name',
'order' => 'ASC',
'hide_empty' => true,
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

{{-- <ul class="archives-links">
  @foreach ($termchildren as $child_id)
  @php
  $term = get_term_by( 'id', $child_id, $taxonomy_name );
  @endphp
  <li><a href="{{ esc_url(get_term_link( $child_id, $taxonomy_name )) }}" target="_blank">{{ $term->name }}</a></li>
  @endforeach
</ul>
@endif --}}

@if ( $cat->slug === 'cycles-focus' )
@php
$term_id = $cat->term_id;
$taxonomy_name = 'cycle';
$termchildren = get_term_children( $term_id, $taxonomy_name );
//$list_of_childs = array_reverse($termchildren);
@endphp
<h3>Cycles ponctuels</h3>
@php( display_order_alphabeticaly($termchildren, 'cycle') )
{{-- <ul class="archives-links">
  @foreach ($list_of_childs as $child_id)
  @php
  $term = get_term_by( 'id', $child_id, $taxonomy_name );
  @endphp
  <li><a href="{{ esc_url(get_term_link( $child_id, $taxonomy_name )) }}" target="_blank">{{ $term->name }}</a></li>
  @endforeach
</ul> --}}
@endif

@if ($cat->slug === 'evenements')
@php
$term_id = $cat->term_id;
$taxonomy_name = 'cycle';
$termchildren = get_term_children( $term_id, $taxonomy_name );
display_order_alphabeticaly($termchildren, 'cycle');
@endphp
<h3>Événements</h3>
{{-- <ul class="archives-links">
  @foreach ($list_of_childs as $child_id)
  @php
  $term = get_term_by( 'id', $child_id, $taxonomy_name );
  @endphp
  <li><a href="{{ esc_url(get_term_link( $child_id, $taxonomy_name )) }}" target="_blank">{{ $term->name }}</a></li>
  @endforeach
</ul> --}}
@endif


@endforeach
