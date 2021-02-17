import $ from "jquery";
import { Component } from "../util/component"; // Import to inherit from the Component class
import axios from "axios";

// Exports the component to be used in other files
export const Newsletter = new Component();

// Get the DOM elements of this component
const form = $("#subscribe-form");
const fields = form.find("[name*='input_']");

// Called in the index.js on load the pages
Newsletter.pageLoaded = () => {
	// Handle the form submission
	form.submit((event) => {
		event.preventDefault();

		$(".input-submit .btn").addClass("loading");

		// Get the URL from the form HTML element
		let submissionUrl = form.attr("url");
		let dataValues = { input_values: {} };

		fields.each((index, element) => {
			let field = $(element);
			dataValues.input_values[field.attr("name")] = field.val();
		});

		axios
			.post(submissionUrl, JSON.stringify(dataValues))
			.then(function ({ data }) {
				if (data.status == "200" && data.response.is_valid) {
					// Trigger the Subscribe event
					const subscribeEvent = new Event("subscribe");
					document
						.getElementById("subscribe-form")
						.dispatchEvent(subscribeEvent);

					const confirmation_message = $(
						data.response.confirmation_message
					).text();

					form.find(".confirmation-message")
						.text(confirmation_message)
						.removeClass("d-none");

					fields.val("");
				} else {
					console.log(data);
				}
			})
			.catch(function (error) {
				console.log("error: ", error);
			});
	});
};
