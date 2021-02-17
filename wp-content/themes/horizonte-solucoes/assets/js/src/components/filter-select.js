import $ from "jquery";
import { Component } from "../util/component"; // Import to inherit from the Component class

export const FilterSelect = new Component();

// Get the DOM elements of this component
const filterSelect = $("._filter-select");

// On Load
FilterSelect.pageLoaded = () => {
	if (filterSelect.length) {
		const filterTarget = filterSelect.data("filter-target");
		const removedClass = filterSelect.data("removed-class");

		document.addEventListener("click", function (event) {
			const clickOnSelect = filterSelect[0].contains(event.target);

			if (clickOnSelect) {
				filterSelect.toggleClass("active");
			} else {
				filterSelect.removeClass("active");
			}
		});

		filterSelect.find("button").click(function (e) {
			e.preventDefault();

			const value = $(this).val().toLowerCase();

			if ($(".search-result-message").length) {
				$(".search-result-message").remove();
			}

			filterSelect.find(".value").text($(this).text());

			if (value === "*") {
				return $(filterTarget).removeClass(removedClass);
			}

			$(filterTarget).each(function (_, item) {
				const match = $(item).data("filter").toLowerCase().match(value);

				if (match) {
					$(item).removeClass(removedClass);
				} else {
					$(item).addClass(removedClass);
				}
			});
		});
	}
};
