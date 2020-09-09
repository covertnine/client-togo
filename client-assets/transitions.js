(function (e, t) {
	"use strict";
	var n = e.History = e.History || {},
		r = e.jQuery;
	if (typeof n.Adapter != "undefined") throw new Error("History.js Adapter has already been loaded...");
	n.Adapter = {
		bind: function (e, t, n) {
			r(e).bind(t, n)
		},
		trigger: function (e, t, n) {
			r(e).trigger(t, n)
		},
		extractEventData: function (e, n, r) {
			var i = n && n.originalEvent && n.originalEvent[e] || r && r[e] || t;
			return i
		},
		onDomLoad: function (e) {
			r(e)
		}
	}, typeof n.init != "undefined" && n.init()
})(window);



(function (window, undefined) {
	var $wrap = jQuery("#smoothwrapper");

	$wrap.on("click", ".nav-link", function (event) {
		event.preventDefault();

		if (window.location === this.href) {
			return;
		}

		var pageTitle = this.title ? this.title : this.textContent;
		pageTitle =
			this.getAttribute("rel") === "home" ? pageTitle : pageTitle;

		History.pushState(null, pageTitle, this.href);
	});

	// change page content
	History.Adapter.bind(window, "statechange", function () {
		var state = History.getState();

		$.get(state.url, function (res) {
			$.each($(res), function (index, elem) {
				if ($wrap.selector !== "#" + elem.id) {
					return;
				}
				$wrap.html($(elem).html());
			});
		});
	});

	// record pageviews on Google Analytics if applicable
	// $wrap
	// 	.html($(elem).html())
	// 	.promise()
	// 	.done(function (res) {
	// 		// Make sure the new content is added, and the 'ga()' method is available.
	// 		if (typeof ga === "function" && res.length !== 0) {
	// 			//   ga("set", {
	// 			//     page: window.location.pathname,
	// 			//     title: state.title
	// 			//   });
	// 			//   ga("send", "pageview");
	// 		}
	// 	});
})(window);
