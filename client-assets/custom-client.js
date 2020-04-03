jQuery(document).ready(function() {
  (function($) {
    if (jQuery("body.home").length) {
      $("body").on(
        "click",
        ".nav-link[href^='/#'], .scroll-me a[href^='/#'], .dropdown-item[href^='/#']",
        function(event) {
          event.preventDefault();

          //what link was clicked
          var sectionLink = $(event.target).attr("href");
          var anchorID = sectionLink.substr(1);

          // scroll to that part of the page
          gsap.to(window, {
            duration: 2,
            scrollTo: { y: anchorID, offsetY: 55 },
            ease: Power2.easeOut
          });

          $(".navbar-collapse").toggleClass("show");
        }
      );
    } //end seeing if they're on the home page.
  })(jQuery);
});

// add scenes for home scrolling nav links if user is on homepage
if (jQuery("body.home").length) {
  // init controller
  var controller = new ScrollMagic.Controller({
    globalSceneOptions: {
      duration: "100%",
      triggerHook: 0.5
    }
  });

  //set up array of links in nav linking to on-page anchors
  var navLinks = [];

  jQuery(
    ".nav-link[href^='/#'], .scroll-me a[href^='/#'], .dropdown-item[href^='/#']"
  ).each(function() {
    // get all link IDs and put them in array from header and direct clicked scroll links
    navLinks.push(jQuery(this).attr("href"));
  });

  //loop through those links and add a scene for each that links up properly
  var setSceneNum = navLinks.length;

  for (var i = 0; i < setSceneNum; i++) {
    var anchorID = navLinks[i].substr(1);
    var classLabel = navLinks[i].substr(2);

    new ScrollMagic.Scene({
      triggerElement: anchorID
    })
      .setClassToggle(".c9-" + classLabel, "nav-highlight") // add class toggle
      .addTo(controller);
  }
}
