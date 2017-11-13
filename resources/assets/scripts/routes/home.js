export default {
  init() {
    // JavaScript to be fired on the home page
    $('.slick').slick({
      dots: true,
      speed: 900,
      infinite: true,
      slidesToShow: 1,
      autoplay: true,
      adaptiveHeight: false,
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
