export default {
  init() {

    $('.menu-computer-btn').on('click',function(){
        $('#sidebar-computer-menu').sidebar('toggle');
    });

    $('.menu-mobile-btn').on('click',function(){
        $('#sidebar-mobile-menu').sidebar('toggle');
    });

    $('.ui.accordion').accordion({'duration':100});

    $('.movie-trailer.ui.embed').embed();

    $('#main-menu-front-page.ui.sticky').sticky({context: '.main-wrapper'});

    $('#archive-tab.menu .item').tab();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
