import $ from "jquery";
import { Component } from "../util/component"; // Import to inherit from the Component class
import { win } from "../util/globals";

export const FaqCards = new Component();

// Get the DOM elements of this component
const faqCards = $("._faq-cards");

// On Load
FaqCards.pageLoaded = () => {
	if (faqCards.length) {
		faqCards.find(".scroll-action").click(function (e) {
			e.preventDefault();

			const href = $(this).attr("href");
			const [, hash] = href.split("#");
			const targetElement = document.getElementById(hash);

			if (targetElement) {
				targetElement.scrollIntoView({
					behavior: "smooth",
				});
			} else {
				window.location.href = href;
			}
		});
	}
};
