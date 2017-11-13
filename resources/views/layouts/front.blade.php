<!doctype html>
<html @php(language_attributes())>
@include('partials.head')
<body @php(body_class())>
  @php(do_action('get_header'))
  @php
  do_action('get_header');
  $theme_options = get_option('my_theme_settings');
  $colorpicker = $theme_options['colorpicker'];
  @endphp

  @include('partials.sidebar-menu')
  <div class="pusher">
      @include('partials.header-front')
      <div class="wrap" role="document">
        @include('partials.slider')
        <div class="content">
          <main class="main main-wrapper" style="background:{{ $colorpicker }}">
            @yield('content')
          </main>
          @if (App\display_sidebar())
            <aside class="sidebar">
              @include('partials.sidebar')
            </aside>
          @endif
        </div><!-- /.content -->
      </div><!-- /.wrap -->
  </div>


  @php(do_action('get_footer'))
  @include('partials.footer')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
  @php(wp_footer())
</body>
</html>
