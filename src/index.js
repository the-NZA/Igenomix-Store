import HandleShowCartButton from "./js/showcart.js";
import HandleMobmenuButton from "./js/showmobmenu.js";

import "./css/index.css"; // Import styles

window.addEventListener("DOMContentLoaded", function () {
	HandleShowCartButton();	// Show and hide mini cart by clicking showcart button
	HandleMobmenuButton(); 	// Show and hide mobile menu by clicking mobmenu button
});
