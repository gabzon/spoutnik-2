<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    @php
    do_action('get_header');
    $theme_options = get_option('my_theme_settings');
    $colorpicker = $theme_options['colorpicker'];
    @endphp
    @include('partials.sidebar-menu')
    <div class="pusher">
      @include('partials.header')
      <div class="wrap" role="document">
        <div class="content">
          <main class="main main-wrapper" style="background:{{ $colorpicker }}">
            <div class="gray-shadow">
                @yield('content')
            </div>
          </main>

          @if (App\display_sidebar())
            <aside class="sidebar">
              @include('partials.sidebar')
            </aside>
          @endif

        </div>
      </div>
    </div>

    @php(do_action('get_footer'))
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/semantic-ui/2.2.13/semantic.min.js"></script>
    @php(wp_footer())
  </body>
</html>
