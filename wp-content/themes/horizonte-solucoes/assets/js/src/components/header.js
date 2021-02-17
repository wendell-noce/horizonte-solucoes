import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class
import { body } from '../util/globals';

// Exports the component to be used in other files
export const Header = new Component();

// Get the DOM elements of this component
const header   = $('._header');
let offsetToActivate	= 42; //px

let isLogged   = false;
if( $('body').hasClass('logged-in') ){
	offsetToActivate = offsetToActivate + 32;
}

// Logic variables
let isActive			= false;

// On load
Header.pageLoaded = () => {
    // Set scroll as fixed if needed
    if( header.offset().top > offsetToActivate ) {  
        header.addClass( 'active' );
	}
}

// On scroll
Header.pageScrolled = scrollPos => {

    // Set the menu as fixed when scrolling the page
    if ( scrollPos > offsetToActivate && !isActive ) {
    	isActive = true;
    	header.addClass('active');

    } else if(scrollPos <= offsetToActivate && isActive) {
      	isActive = false;
      	header.removeClass('active');
    }
}