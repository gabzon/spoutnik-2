<style media="screen">
#main-menu-front-page.large {
  height: 120px !important;
}

#main-menu-front-page.large img{
  width: 900px;
}
#main-menu-front-page.large .item{
  /*display:none;*/
}

#main-menu-front-page.small {
  padding-top:-15px;
  height: 60px;
}

#main-menu-front-page.small img{
  width: 400px;
  margin-top:-20px !important;
}

#main-menu-front-page #menu-image {
  left: 0;
  width: 100%;
  margin: 0px auto;
  text-align: center;
}

@media only screen and (min-width : 120px) and (max-width : 1020px) {
  #main-menu-front-page.large, #main-menu-front-page.small {
    height: 50px !important;
  }
  #main-menu-front-page.large img{
    width: 320px;
  }
  #main-menu-front-page.small img{
    width: 250px;
    margin-top:-20px;
  }
  .sidebar.icon{
    font-size:1.5rem;
    margin-top:-5px;
  }
  .search.icon{
    color:white !important;
    font-size:1.4rem;
  }
}
</style>

<div class="ui fluid text menu fixed grid large" id="main-menu-front-page" style="background:black">
  <div class="mobile only row">
    <div class="item">
      @include('partials.searchform')
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-white-nameless.svg" width="45" style="margin-top:5px;" /> -->
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logotype_anime_spoutnik_cinema.gif" width="45" style="margin-top:5px;" /> -->
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="100" style="margin-top:-5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-mobile-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;"> <i class="sidebar icon"></i></a>
    </div>
  </div>
  <div class="tablet only row">
    <div class="item">
      <?php get_template_part('templates/searchform'); ?>
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <!-- <img src="<?php //echo get_stylesheet_directory_uri(); ?>/assets/images/logotype_anime_spoutnik_cinema.gif" width="45" style="margin-top:5px;" /> -->
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" width="200" style="margin-top:5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-computer-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;"> <i class="sidebar icon"></i></a>
    </div>
  </div>
  <div class="computer only row">
    <div class="item">
      <?php get_template_part('templates/searchform'); ?>
    </div>
    <a href="<?= esc_url(home_url('/')); ?>" id="menu-image">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo-spoutnik-2017.svg" style="margin-top:-5px;" />
    </a>
    <div class="ui item right aligned">
      <a class="menu-computer-btn right aligned" style="color:white; position:relative;text-align:right;cursor: pointer;"><i class="sidebar icon" style="font-size: 1.8rem; margin-top:-5px;"></i></a>
    </div>
  </div>
</div>

<script type="text/javascript">
jQuery(document).on("scroll", function() {
  if(jQuery(document).scrollTop() > 500) {
    jQuery("#main-menu-front-page").removeClass("large").addClass("small");
  } else {
    jQuery("#main-menu-front-page").removeClass("small").addClass("large");
  }
});
</script>
