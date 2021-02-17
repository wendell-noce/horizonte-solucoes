import $ from "jquery";
import { Component } from "../util/component"; // Import to inherit from the Component class

export const DOMSearchForm = new Component();

// Get the DOM elements of this component
const domSearchForm = $("._dom-search-form");

/**
 * Search end event
 *
 * @param { query, matchedElements }
 * 'query' searched query
 * 'matchedElements' matched elements count.
 */
DOMSearchForm.onSearchEnd = undefined;

// On Load
DOMSearchForm.pageLoaded = () => {
	if (domSearchForm.length) {
		const form = domSearchForm.find("form");

		form.submit(function (e) {
			e.preventDefault();

			const searchTarget = domSearchForm.data("search-target");
			const searchTargetElement = $(searchTarget);
			const queryElements = domSearchForm
				.data("query-elements")
				.split(",");

			const removedClass = domSearchForm.data("removed-class");
			const query = form.find("input[name=query]").val();
			const lowerCaseQuery = query.toLowerCase();
			let matchedElements = 0;

			searchTargetElement.each(function (_, item) {
				const matches = queryElements.map((elementToMatch) => {
					return $(item)
						.find(elementToMatch)
						.text()
						.toLowerCase()
						.match(lowerCaseQuery);
				});

				if (matches.some((match) => match)) {
					$(item).removeClass(removedClass);
					matchedElements++;
				} else {
					$(item).addClass(removedClass);
				}
			});

			if (typeof DOMSearchForm.onSearchEnd !== "undefined") {
				DOMSearchForm.onSearchEnd({ query, matchedElements });
			}
		});
	}
};
