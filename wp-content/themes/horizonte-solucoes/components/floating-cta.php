<?php
/**
 * Floating Cta
 *
 * A floating button shown when scrolling
 *
 * @param string $wrapper_class Custom CSS classes for button wrapper
 * @param string $button_text Text for the button
 * @param string $button_link URL for the button link
 * @param string $button_class Custom CSS classes for the button
 * @param boolean $is_link_external Defines if should open in a new window
 *
 * @package Horizonte
 */
?>

<div class="_floating-cta d-none d-md-block position-fixed">
	<a href="https://web.whatsapp.com/send?phone=5531991885309&amp;text=Olá.." class="undecorated-link px-3 transition btn btn-whatsapp position-relative" target="_blank">
		<i class="icon icon-whatsapp transition"></i>
		<span class="position-absolute transition bg-navyblue p-3 rounded"> Envie-nos uma mensagem </span>
	</a>
</div>