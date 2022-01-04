function makeMobmenuActive(mobmenu, headerOverlay) {
	document.body.style.overflow = "hidden"; // prevent scrolling
	mobmenu.classList.add("header__menu--active");
	headerOverlay.classList.add("header__overlay--active");
}

function makeMobmenuUnactive(mobmenu, headerOverlay) {
	// Remove active class otherwise
	// Register on animation end handlers

	if (mobmenu.classList.contains("header__menu--active")) {
		mobmenu.addEventListener("animationend", function (e) {
			mobmenu.classList.remove("header__menu--active", "header__menu--remove");
		}, { once: true });

		headerOverlay.addEventListener("animationend", function (e) {
			headerOverlay.classList.remove("header__overlay--active", "header__overlay--remove");
		}, { once: true });

		// Add classes with remove animations
		mobmenu.classList.add("header__menu--remove");
		headerOverlay.classList.add("header__overlay--remove")

		document.body.style.overflow = ""; // Turn scrolling on
	}
}

function HandleMobmenuButton() {
	const header = document.querySelector(".header");
	const mobmenuButton = header.querySelector(".header__mobmenu");
	const mobmenu = header.querySelector(".header__menu");
	const headerOverlay = header.querySelector(".header__overlay");
	const closemenuButton = header.querySelector(".header__menuclose");

	mobmenuButton.addEventListener("click", function (e) {
		e.preventDefault();

		if (!mobmenu.classList.contains("header__menu--active")) {
			// If not shown then add active class
			makeMobmenuActive(mobmenu, headerOverlay);
		} else {
			// Remove active class otherwise
			makeMobmenuUnactive(mobmenu, headerOverlay);
		}
	});

	// Close by clicking close cart button
	closemenuButton.addEventListener("click", function (e) {
		e.preventDefault();
		makeMobmenuUnactive(mobmenu, headerOverlay);
	});

	// Close on click or mouse scroll under overlay
	headerOverlay.addEventListener("click", function (e) {
		e.preventDefault();
		makeMobmenuUnactive(mobmenu, headerOverlay);
	});

	// Close on scroll 
	headerOverlay.addEventListener("wheel", function (e) {
		e.preventDefault();
		makeMobmenuUnactive(mobmenu, headerOverlay);
	});

	headerOverlay.addEventListener("touchmove", function (e) {
		e.preventDefault();
		makeMobmenuUnactive(mobmenu, headerOverlay);
	});

}

export default HandleMobmenuButton;