/**
 * The Clean Guys — site.js
 * Lightweight client-side enhancements.
 * No dependencies, vanilla JS, runs on DOMContentLoaded.
 */
(function () {
	'use strict';

	function ready(fn) {
		if (document.readyState !== 'loading') { fn(); }
		else { document.addEventListener('DOMContentLoaded', fn); }
	}

	ready(function () {
		// External link safety: any <a target="_blank"> gets rel="noopener noreferrer"
		document.querySelectorAll('a[target="_blank"]').forEach(function (link) {
			if (!link.rel.includes('noopener')) {
				link.rel = (link.rel + ' noopener noreferrer').trim();
			}
		});

		// Smooth-scroll for in-page anchors
		document.querySelectorAll('a[href^="#"]').forEach(function (link) {
			link.addEventListener('click', function (e) {
				const id = link.getAttribute('href');
				if (id.length <= 1) return;
				const target = document.querySelector(id);
				if (target) {
					e.preventDefault();
					target.scrollIntoView({ behavior: 'smooth', block: 'start' });
				}
			});
		});
	});
})();
