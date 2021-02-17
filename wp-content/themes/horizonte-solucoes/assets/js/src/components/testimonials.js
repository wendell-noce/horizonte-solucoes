import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class

/*
 * Import external lib to use sliders
 */
import { Swiper, Navigation, Pagination } from 'swiper/js/swiper.esm.js';
Swiper.use([Navigation, Pagination]);

export const Testimonials = new Component();

// Get the DOM elements of this component
const testimonials = $('._testimonials');

// On Load
Testimonials.pageLoaded = () => {
    if(testimonials.length) {
		// Code here...

		let play_video = testimonials.find('.play-video');
		play_video.on( 'click', (clicked) => {
			clicked.preventDefault();

			let element = $(clicked.currentTarget);
			let video = element.parent().find('.video-player');
			element.hide()
			video.attr('controls', true);
			video[0].play();
		});


		let swiper = new Swiper('.slide-depoimentos', {
			autoHeight: true,
			spaceBetween: 10,
			pagination: {
			  el: '.swiper-pagination',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			  },
		  });
	}
}