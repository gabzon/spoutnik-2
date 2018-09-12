<div class="ui fluid text three item menu fixed grid large" id="main-menu-front-page" style="background:black">

  {{-- Mobile menu --}}
  <div class="mobile only row">
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="200" style="margin-top:5px; margin-left:15px;" />
    </a>
    {{-- <div class="ui item right aligned" style="margin-left:0 !important;">
      <form role="search" method="get" action="{{ esc_url(home_url('/')) }}" class="ml-3" style="padding:0;margin:0">
        <div class="ui transparent icon input" style="color:white; font-size:1.8rem; margin-top:-5px; width: 110px;">
          <input type="text" placeholder="" value="{{ get_search_query() }}" name="s" style="color:white;">
          <i class="search icon"></i>
        </div>
      </form>
    </div> --}}
    <div class="ui item right aligned" style="margin-left:0 !important;">
      <a class="menu-mobile-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;"> <i class="sidebar icon"></i></a>
    </div>
  </div>

  {{-- Table menu --}}
  <div class="tablet only row">
    <div class="item">
      @include('partials.searchform')
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="250" style="margin-top:5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-computer-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;"> <i class="sidebar icon"></i></a>
    </div>
  </div>

  {{-- Computer menu --}}
  <div class="computer only row">
    <div class="item" style="justify-content:flex-start">
      @include('partials.searchform')
    </div>
    <div class="item">
      <a href="<?= esc_url(home_url('/')); ?>" id="menu-image" class="tc mt0 center">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="350"/>
      </a>
    </div>
    <div class="item" style="justify-content:flex-end;">
      <a class="menu-computer-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;margin-right:10px;"><i class="sidebar icon" style="font-size: 1.8rem; margin-top:-5px;text-align:right;"></i></a>
    </div>
  </div>

</div>
