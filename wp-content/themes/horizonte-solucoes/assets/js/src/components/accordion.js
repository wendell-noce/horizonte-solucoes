import $ from "jquery";
import { Component } from "../util/component"; // Import to inherit from the Component class

export const Accordion = new Component();

// Get the DOM elements of this component
const accordion = $("._accordion");
const triggerElement = accordion.data("trigger-element");
const childrenElement = accordion.data("children-element");

/**
 * Toggle end event
 *
 * @param element - jQuery object target element
 */
Accordion.onToggleEnd = undefined;

Accordion.toggle = (element) => {
	if (!element.hasClass("active")) {
		accordion
			.find(".active")
			.find(triggerElement)
			.attr("aria-expanded", "false");

		accordion.find(".active").removeClass("active");
	}

	element
		.toggleClass("active")
		.find(triggerElement)
		.attr("aria-expanded", function (_, attr) {
			// toggle aria-expanded attribute
			return attr === "true" ? "false" : "true";
		});

	if (typeof Accordion.onToggleEnd !== "undefined") {
		Accordion.onToggleEnd(element);
	}
};

// On Load
Accordion.pageLoaded = () => {
	if (accordion.length) {
		accordion
			.find(childrenElement)
			.find(triggerElement)
			.click(function (e) {
				e.preventDefault();
				const item = $(this).closest(childrenElement);
				Accordion.toggle(item);
			});
	}
};
