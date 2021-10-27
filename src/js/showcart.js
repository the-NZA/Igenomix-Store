function makeActive(headerCart, headerOverlay) {
	document.body.style.overflow = "hidden"; // Prevent scrolling
	headerCart.classList.add("header__cart--active");
	headerOverlay.classList.add("header__overlay--active")
}

function makeUnactive(headerCart, headerOverlay) {
	// Remove active class otherwise
	headerCart.classList.remove("header__cart--active");
	headerOverlay.classList.remove("header__overlay--active")
	document.body.style.overflow = ""; // Turn scrolling on
}

function HandleShowCartButton() {
	const header = document.querySelector(".header");
	const showcartButton = header.querySelector(".showcart__btn");
	const headerCart = header.querySelector(".header__cart");
	const headerOverlay = header.querySelector(".header__overlay");
	const closecartButton = header.querySelector(".asidecart__close");

	// Show or close mini cart
	showcartButton.addEventListener("click", function (e) {
		e.preventDefault();

		if (!headerCart.classList.contains("header__cart--active")) {
			// If not shown add active class
			makeActive(headerCart, headerOverlay);
		} else {
			// remove active class otherwise
			makeUnactive(headerCart, headerOverlay);
		}
	});

	// Close by clicking close cart button
	closecartButton.addEventListener("click", function (e) {
		e.preventDefault();
		makeUnactive(headerCart, headerOverlay);
	});

	// Close on click or mouse scroll under overlay
	headerOverlay.addEventListener("click", function (e) {
		e.preventDefault();
		makeUnactive(headerCart, headerOverlay);
	});

	headerOverlay.addEventListener("wheel", function (e) {
		e.preventDefault();
		makeUnactive(headerCart, headerOverlay);
	});

	headerOverlay.addEventListener("touchmove", function (e) {
		e.preventDefault();
		makeUnactive(headerCart, headerOverlay);
	});
}

export default HandleShowCartButton;