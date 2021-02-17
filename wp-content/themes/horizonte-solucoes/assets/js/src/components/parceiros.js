import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class

/*
 * Import external lib to use sliders
 */
import { Swiper, Navigation, Pagination, Autoplay } from 'swiper/js/swiper.esm.js';
Swiper.use([Autoplay]);

export const Clientes = new Component();

// Get the DOM elements of this component
const clientes = $('._parceiros');

// On Load
Clientes.pageLoaded = () => {
    if(clientes.length) {
		// Code here...

		let swiper = new Swiper('.swiper-cilentes', {
			autoHeight: true,
			spaceBetween: 10,
			slidesPerView: 1,
			autoplay: {
				delay: 2000,
			},
			breakpoints: {
				992: {
				  slidesPerView: 5,
				},
			  }
		  });
	}
}