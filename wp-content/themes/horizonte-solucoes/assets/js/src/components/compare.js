import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class

export const Compare = new Component();

// Get the DOM elements of this component
const compare = $('._compare');
const cards   = compare.find('.cards');

// On Load
Compare.pageLoaded = () => {
    if(compare.length) {

		// Show only first card on Desktop
		cards.find('.card').first().show();

		//  Get Box Compare links;
		let links = cards.find('.links a');

		// Event triggered on link click
		links.on( 'click',  (event) => {
			event.preventDefault();

			// Get the clicked link
			let clicked = $(event.currentTarget);

			// Get the target of clicked link
			let cardId = clicked.attr('href').split('#');

			// Hide all cards
			cards.find('.card').hide();

			// Find the selected card
			cards.find('.card[data-box="'+ cardId[1] +'"]').show();

			// Remove "active" class on all links
			links.removeClass('active');

			// Set the "active" class in clicked link
			clicked.addClass('active');
		})
	}
}

// On Window resize
Compare.windowResized = ( winWidth , winHeight ) => {

	// Check window width
	if( winWidth > 1200 ) {
		// Hide all cards
		cards.find('.card').hide();

		// Show only first card on Desktop
		cards.find('.card').first().show();
	} else {
		// Remove style attr on mobile links
		cards.find('.card').removeAttr('style');
	}

}