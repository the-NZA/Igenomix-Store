function detectChildren() {
	const minicartFooter = document.querySelector(".asidecart__footer");
	const minicartBody = document.querySelector(".widget_shopping_cart");
	const list = minicartBody.querySelector(".asidecart__cartlist");

	console.log(list);

	list.addEventListener("DOMSubtreeModified", function (e) {
		console.log(e);
	});
	$("body").on('DOMSubtreeModified', ".asidecart__cartlist", function () {
		alert('changed');
	});
}

export default detectChildren;