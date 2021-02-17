import $ from "jquery";
import { Component } from "../util/component"; // Import to inherit from the Component class

export const FilterButtons = new Component();

// Get the DOM elements of this component
const filterButtons = $("._filter-buttons");

/**
 * Filter end event
 *
 * @param { filter, matchedElements }
 * 'filter' selected filter
 * 'matchedElements' matched elements count.
 */
FilterButtons.onFilterEnd = undefined;

// On Load
FilterButtons.pageLoaded = () => {
	if (filterButtons.length) {
		const filterTarget = filterButtons.data("filter-target");
		const removedClass = filterButtons.data("removed-class");
		const activeButtonClass = filterButtons.data("active-button-class");

		filterButtons.find("button").click(function (e) {
			e.preventDefault();

			let matchedElements = 0;

			if ($(this).hasClass(activeButtonClass)) {
				return;
			}

			filterButtons.find("button").removeClass(activeButtonClass);
			$(this).addClass(activeButtonClass);

			const filter = $(this).val().toLowerCase();

			if (filter === "*") {
				return $(filterTarget).removeClass(removedClass);
			}

			$(filterTarget).each(function (_, item) {
				const match = $(item)
					.data("filter")
					.toLowerCase()
					.match(filter);

				if (match) {
					$(item).removeClass(removedClass);
					matchedElements++;
				} else {
					$(item).addClass(removedClass);
				}
			});

			if (typeof FilterButtons.onFilterEnd !== "undefined") {
				FilterButtons.onFilterEnd({ filter, matchedElements });
			}
		});
	}
};
