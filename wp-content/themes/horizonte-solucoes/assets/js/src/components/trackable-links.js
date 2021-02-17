import { Component } from "../util/component"; // Import to inherit from the Component class

export const TrackableLinks = new Component();

// Get the DOM elements of this component
const trackableLinks = $("#trackable-links");

trackableLinks.getUrlParameters = () => {
	const [, parameters] = window.location.href.split("?");
	return parameters;
};

TrackableLinks.pageLoaded = () => {
	if (trackableLinks.length) {
		const urlParameters = trackableLinks.getUrlParameters();

		if (urlParameters) {
			const links = trackableLinks.data("links").map((l) => l.link);
			links.forEach((address) => {
				const $linkDOMElements = $(`a[href*="${address}"]`);

				$linkDOMElements.each(function (_, link) {
					const href = $(link).attr("href");
					const divider = href.indexOf("?") > -1 ? "&" : "?"; // Checks if link already have get variables

					$(link).attr("href", href + divider + urlParameters);
				});
			});
		}
	}
};
