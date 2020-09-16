// eslint-disable-next-line no-undef
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

jQuery(document).ready(function () {
	(function ($) {
		if (jQuery("body.home").length) {
			$(".c9").on(
				"click",
				".nav-link[href^='/#'], .dropdown-item[href^='/#'], a[href^='/#'], a[href^='#']:not(.btn-nav-search):not(.dropdown-toggle)",
				function (event) {
					event.preventDefault();

					$(".navbar-toggler").attr("aria-expanded", "false").addClass('collapsed');

					//what link was clicked
					var sectionLink = $(event.target).attr("href");
					if (sectionLink.substr(0, 1) === '/') {
						sectionLink = sectionLink.substr(1);
					}

					// scroll to that part of the page
					gsap.to(window, {
						duration: 1.5,
						scrollTo: {
							y: sectionLink,
							offsetY: 55
						},
						ease: "power1.out"
					});

					$(".navbar-collapse").toggleClass("show");
				}
			);
		} //end seeing if they're on the home page.
	})(jQuery);
});

// add scenes for home scrolling nav links if user is on homepage
if (jQuery("body.home").length) {

	//set up array of links in nav linking to on-page anchors
	var navLinks = [];

	jQuery(
		".nav-link[href^='/#'], .dropdown-item[href^='/#'], .nav-link[href^='#']:not(.btn-nav-search):not(.dropdown-toggle), .dropdown-item[href^='#']:not(.dropdown-toggle)"
	).each(function () {
		// get all link IDs and put them in array from header and direct clicked scroll links
		navLinks.push(jQuery(this).attr("href"));
	});

	//loop through those links and add a scene for each that links up properly
	var setSceneNum = navLinks.length;

	gsap.defaults({
		ease: "power1.out"
	});

	for (var i = 0; i < setSceneNum; i++) {

		// test for slashes at beginning of link string
		if (navLinks[i].substr(0, 1) === '/') {
			var anchorID = navLinks[i].substr(1);
			var navItemActive = '[href="/' + anchorID + '"] .nav-highlight';
		} else {
			// eslint-disable-next-line no-redeclare
			var anchorID = navLinks[i];
			// eslint-disable-next-line no-redeclare
			var navItemActive = '[href="' + anchorID + '"] .nav-highlight';
		}

		// console.log("anchorID: " + anchorID + " navItemActive: " + navItemActive);

		let tl = gsap.timeline({
			scrollTrigger: {
				trigger: anchorID,
				toggleActions: "play reset reset reset",
				start: "top 65px",
				end: "bottom 65px"
			}
		});

		tl.to(navItemActive, {
			right: "0%"
		});

	}
}
