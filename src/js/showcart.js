function makeAsideCartActive(headerCart, headerOverlay) {
	document.body.style.overflow = "hidden"; // Prevent scrolling
	headerCart.classList.add("header__cart--active");
	headerOverlay.classList.add("header__overlay--active")
}

function makeAsideCartUnactive(headerCart, headerOverlay) {
	// Remove active class otherwise
	// Register on animation end handlers
	headerCart.addEventListener("animationend", function (e) {
		headerCart.classList.remove("header__cart--active", "header__cart--remove");
	}, { once: true });

	headerOverlay.addEventListener("animationend", function (e) {
		headerOverlay.classList.remove("header__overlay--active", "header__overlay--remove");
	}, { once: true });

	// Add classes with remove animations
	headerCart.classList.add("header__cart--remove");
	headerOverlay.classList.add("header__overlay--remove")

	document.body.style.overflow = ""; // Turn scrolling on
}

function HandleShowCartButton() {
	const header = document.querySelector(".header");
	const showcartButton = header.querySelector(".showcart__btn");
	const headerCart = header.querySelector(".header__cart");
	// const asidecartFooter = header.querySelector(".asidecart__footer");
	const headerOverlay = header.querySelector(".header__overlay");
	const closecartButton = header.querySelector(".asidecart__close");

	// Show or close mini cart
	showcartButton.addEventListener("click", function (e) {
		e.preventDefault();

		if (!headerCart.classList.contains("header__cart--active")) {
			// If not shown add active class
			makeAsideCartActive(headerCart, headerOverlay);
		} else {
			// remove active class otherwise
			makeAsideCartUnactive(headerCart, headerOverlay);
		}

		// const cartListWrapper = header.querySelector(".asidecart__cartlist");
		// if (cartListWrapper.querySelectorAll(".cartitem").length !== 0) {
		// 	asidecartFooter.classList.add("asidecart__footer--visible");
		// } else {
		// 	asidecartFooter.classList.remove("asidecart__footer--visible");
		// }
	});

	// Close by clicking close cart button
	closecartButton.addEventListener("click", function (e) {
		e.preventDefault();
		makeAsideCartUnactive(headerCart, headerOverlay);
	});

	// Close on click or mouse scroll under overlay
	headerOverlay.addEventListener("click", function (e) {
		e.preventDefault();
		makeAsideCartUnactive(headerCart, headerOverlay);
	});

	// Close on scroll 
	headerOverlay.addEventListener("wheel", function (e) {
		e.preventDefault();
		makeAsideCartUnactive(headerCart, headerOverlay);
	});

	headerOverlay.addEventListener("touchmove", function (e) {
		e.preventDefault();
		makeAsideCartUnactive(headerCart, headerOverlay);
	});
}

export default HandleShowCartButton;