var $ = jQuery.noConflict();

const docBody			   = document.querySelector('body');
const docHTML			   = document.querySelector('html');
const mini_cart_icon 	   = document.querySelector('#custom_html-2 .textwidget');
const mini_cart_dropdown   = document.getElementById('woocommerce_widget_cart-3');
const searchTrigger 	   = document.getElementById('mobile-search-trigger');
const mobileSearchWrapper  = document.querySelector('.mobile-search-wrapper');
const mobileSearchClose    = document.getElementById('mobile-search-close');
const mobileHeader		   = document.getElementById('mobile-header');
const searchInput 		   = document.querySelector('.mobile-search-wrapper input[name="s"]');
const mobileMenuToggle	   = document.querySelector('.mega-menu-toggle');
const mobileMenuWrapper    = document.getElementById('mega-menu-primary');
const mobileMenuOpenItems  = document.querySelector('.menu-open-items');
const mobileMenuCloseItems = document.querySelector('.menu-close-items');
const mobileLogo 		   = document.querySelector('#mobile-header .mobile-header-logo');

function toggleElementDisplay(el, initialStyle) {
	if ( getComputedStyle(el, null).display == 'none' ) {
		el.style.display = initialStyle;
	} else {
		el.style.display = 'none';
	}
}

mini_cart_icon.addEventListener('mouseover' , (e) => {
	mini_cart_dropdown.classList.add('mini_cart_dropdown');
});

mini_cart_icon.addEventListener('mouseout' , (e) => {
	mini_cart_dropdown.classList.remove('mini_cart_dropdown');
});

searchTrigger.addEventListener('click', (e) => {
	mobileSearchWrapper.style.display = 'block';
	mobileHeader.style.zIndex = '98';	
	searchInput.focus();
});

mobileSearchClose.addEventListener('click', (e) => {
	mobileSearchWrapper.style.display = 'none';
	mobileHeader.style.zIndex = '100';
});

mobileMenuToggle.addEventListener('click', (e) => {
	if ( mobileMenuToggle.classList.contains('mega-menu-open') ) { //close menu
		mobileHeader.classList.remove('mobile-menu-open');
		mobileLogo.style.visibility = 'visible';
	} else {
		mobileHeader.classList.add('mobile-menu-open'); //open menu
		mobileLogo.style.visibility = 'hidden';
	}
	toggleElementDisplay(mobileMenuOpenItems, 'block');
	toggleElementDisplay(mobileMenuCloseItems, 'flex');
	
});

let lastScrollTop = 0;
window.addEventListener('scroll', (e) => {
	if ( !mobileHeader.classList.contains('mobile-menu-open') ) {
		let st = window.pageYOffset;
		if ( st > 0 ) { //if page is not at top
			if ( st > lastScrollTop ) {
				mobileHeader.classList.add('header-up'); //scroll down
				mobileHeader.classList.remove('header-down');
			} else {
				mobileHeader.classList.add('header-down');  //scroll up
				mobileHeader.classList.remove('header-up');
			}
		}				
		
		lastScrollTop = st;
	}
});