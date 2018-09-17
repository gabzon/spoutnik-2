@php
$cycle = array('distribution');

$args = array(
  'orderby'           => 'name',
  'order'             => 'ASC',
  'hide_empty'        => true,
);

$cats = get_terms($cycle, $args);
@endphp

@php
  //piklist::pre($cats)
@endphp

<ul class="archives-links">
  @foreach ($cats as $cat)
    <li><a href="{{ get_term_link($cat->term_id,'distribution') }}" target="_blank">{{ $cat->name }}</a></li>
  @endforeach
</ul>
