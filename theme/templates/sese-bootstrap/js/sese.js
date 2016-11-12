(function() {
  'use strict';
  jQuery(document).ready(function() {
    /* Lazily Load the Homepage Carousel Images */
    jQuery("#homepage-carousel").on("slide.bs.carousel", function(ev) {
      var lazy = jQuery(ev.relatedTarget).find("img[data-src]");
      lazy.attr("src", lazy.data("src"));
      lazy.removeAttr("data-src");
    });
  });

})();
