import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class
import { Swiper, Navigation, Autoplay } from 'swiper/js/swiper.esm.js';
Swiper.use([Autoplay, Navigation]);

export const Hero = new Component();

// Get the DOM elements of this component
const hero	= $('._hero');
let title	= hero.find('.title');

// On Load
Hero.pageLoaded = () => {
    if(hero.length) {
		// Transforms the title into an array
		let last_word = title.html().split(' ');

		// Show title with last word on a '<SPAN>'
		title.html( lastWord( last_word ) + '<span>' + last_word.pop() + '</span>' );

		// Join the title words without the last word
		function lastWord(words) {
			let word = ' ';

			for ( let i = 1; i < words.length - 1; i++ ){
				word += words[i]+ ' ';
			}

			return word;
		}

		let swiper = new Swiper('.hero-container', {
			spaceBetween: 10,
			slidesPerView: 1,
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			  }
		  });

	}
}