import $ from 'jquery';
import { Component } from '../util/component'; // Import to inherit from the Component class

// Exports the component to be used in other files
export const MobileMenu = new Component();

// Get the DOM elements of this component
const menuToggle = $('#openMenu');

// Control Variables
let showMenu = false;

// Called in the index.js on load the page
MobileMenu.pageLoaded = () => {
    // Show mobile navigation 
    menuToggle.click(event => {
		toggleMenu();
    });
}

// Show or hide the mobile navigation
function toggleMenu() {
    showMenu = !showMenu;
    
    menuToggle.attr('aria-expanded', showMenu);
}