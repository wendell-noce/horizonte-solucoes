import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class
import { win } from '../util/globals';

export const FloatingCta = new Component();

// Get the DOM elements of this component
const floatingCta = $('._floating-cta');

// Logic variables
let isShown			= false;
let offsetToShow	= win.innerHeight() * .75;

// On scroll
FloatingCta.pageScrolled = scrollPos => {

	if(floatingCta.length) {
		// Show or hide button accordingly to scroll position
		if ( scrollPos > offsetToShow && !isShown ) {
			isShown = !isShown;
			floatingCta.addClass('is-shown');

		} else if(scrollPos <= offsetToShow && isShown) {
			isShown = !isShown;
			floatingCta.removeClass('is-shown');
		}
	}
}

// On resize
FloatingCta.windowResized = (winWidth, winHeight) => {
	if(floatingCta.length) {

		// Updates the offset
		offsetToShow = win.innerHeight() * .75;
	}
}