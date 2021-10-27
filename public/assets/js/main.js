document.addEventListener('DOMContentLoaded', init);
const MENU_OVERLAY_SELECTOR = '.menu-overlay';
const MENU_SELECTOR = '#menu';
const CLOSE_MENU_SELECTOR = '.close';
const OPEN_MENU_SELECTOR = '.menu-btn__popup';
const CSS_VAR_SLIDING_NAV = '--navbar-sliding-left';

function init() {
	document
		.querySelector(CLOSE_MENU_SELECTOR)
		.addEventListener('click', closePopUp);
	document
		.querySelectorAll(OPEN_MENU_SELECTOR)
		.forEach((menu) => menu.addEventListener('click', handlePopUp));
	document
		.querySelector(MENU_OVERLAY_SELECTOR)
		.addEventListener('click', closePopUp); // clicking outside the menu which is the black color overlay closes the menu

	document
		.querySelectorAll('header>nav>ul>li')
		.forEach((navItem) => navItem.addEventListener('mouseover', handleSliding));

	function closePopUp(e) {
		e.preventDefault();
		document.querySelector(MENU_SELECTOR).classList.add('slideOut');

		setTimeout(() => {
			document.querySelector(MENU_OVERLAY_SELECTOR).classList.remove('active');
			document.querySelector(MENU_SELECTOR).classList.remove('slideOut');
		}, 247);
	}

	function handlePopUp(e) {
		e.preventDefault();
		document.querySelector(MENU_OVERLAY_SELECTOR).classList.add('active');
		document.querySelector(MENU_SELECTOR).classList.add('slideIn');
	}

	function handleSliding(e) {
		e.preventDefault();
		const { left: distanceToMove, model } = e.target.dataset;
		if (distanceToMove || typeof distanceToMove !== 'undefined') {
			document
				.querySelector(':root')
				.style.setProperty(CSS_VAR_SLIDING_NAV, `${parseInt(distanceToMove)}%`);
		}
	}
}
