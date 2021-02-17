import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class
import { body } from '../util/globals';

export const VideoLightbox = new Component();

// Get the DOM elements of this component
const videoLightbox = $('._video-lightbox');

// Components Variables
let player = null;

// On Load
VideoLightbox.pageLoaded = () => {

	videoLightbox.each((index, el) => {
		const lightbox			= $(el);
		const lightboxId		= lightbox.attr('id');
		const videoId			= lightbox.data('video-id');
		const closeButton		= lightbox.find('.btn-close');
		let wasNeverOpen		= true;

		// Get buttons that open this lightbox
		const openTrigger	= $(`[open-lightbox="${lightboxId}"]`);

		// Handle the ligtbox open
		openTrigger.click(event => {
			event.preventDefault();

			// Open vide lightbox
			showLightbox(lightbox);

			if(wasNeverOpen) {
				// Builds video iframe
				buildsYouTubeIframe(videoId, `${lightboxId}-iframe`);

				wasNeverOpen = !wasNeverOpen;
			}
		});

		closeButton.click(event => {
			event.preventDefault();

			try {
				// Stop video, if playing
				player.stopVideo();
			} catch (err) {
				console.log(err);
			}

			// Dismiss lighbox
			closeLightbox(lightbox);
		});
	});
}

/**
 * Shows a video lightbox
 * @param {jQuery} lightbox The lightbox jQuery reference
 */
function showLightbox(lightbox) {
	lightbox.show();

	// Lock page scroll
	body.addClass('scroll-locked');
}

/**
 * Hides a video lightbox
 * @param {jQuery} lightbox The lightbox jQuery reference
 */
function closeLightbox(lightbox) {
	lightbox.hide();

	// Lock page scroll
	body.removeClass('scroll-locked');
}

/**
 * Import the YouTube API scripts
 */
function importYouTubeApi() {
	const tag = document.createElement('script');
	tag.src = 'https://www.youtube.com/player_api';

	// Adds the script call in the first <script> tag in the doc
	const firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}

/**
 * Builds video iframe using YouTube API
 */
function buildsYouTubeIframe(videoId, containerId) {

	// YouTube API is already available
	if(typeof YT !== 'undefined') {
		buildPlayer();
	}

	// Else, need to import YouTube API
	else {
		// Inject YouTube API scripts
		importYouTubeApi();

		// Keep trying until API is ready
		let interval = setInterval(() => {
			if(typeof YT !== 'undefined') {
				buildPlayer();
				clearInterval(interval);
			}
		}, 800);
	}

	// Create player with settings
	function buildPlayer() {
		player = new YT.Player(containerId, {
			height: '360',
			width: '640',
			videoId: videoId,
			playerVars: {
				autoplay: 1,
				rel: 0
			},
			events: {
				'onReady': () => {
					player.playVideo();
				}
			}
		});
	}
}