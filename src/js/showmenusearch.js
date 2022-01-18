function HandleShowMenuSearchButton() {
	const header = document.querySelector('.header');
	const menusearchBtn = header.querySelector('.menusearch__btn');
	const menusearchForm = header.querySelector('.menusearch__form');

	menusearchBtn.addEventListener("click", function (e) {
		e.preventDefault();

		menusearchForm.classList.toggle("menusearch__form--active");
	})
}

export default HandleShowMenuSearchButton;