var cartFetched = false;
// Load event is being fired twice, not sure why
window.addEventListener('load', function (evt) {
    if (! cartFetched) {
        fetchCartData();
    }

    cartFetched = true;
});

var menuSidebar = document.getElementsByClassName('sidebar-right');
var menusidebarNav = document.getElementById('sidebar_toggle_btn');
var cartButton = document.getElementById('cart-button');
var menuSidebarclose = document.getElementById('sidebar_close_icon');
var menuSidebarOverlay = document.getElementsByClassName('sidebar_overlay');
var sideCartItemsContainer = document.getElementsByClassName('cart-product-item')[0];
var sideCartItemTemplate = document.getElementsByClassName('side-cart-item-template hidden')[0];

function appendToSideCart(newElement) {
    sideCartItemsContainer.appendChild(newElement);
}

menusidebarNav.onclick = function () {
    toggleCartSidebar();
};

cartButton.onclick = function () {
    toggleCartSidebar();
};

menuSidebarclose.onclick = function () {
    toggleCartSidebar();
};

menuSidebarOverlay[0].onclick = function () {
    toggleCartSidebar();
};

function toggleCartSidebar() {
    menuSidebar[0].classList.toggle("sidebar-open");
    menuSidebarOverlay[0].classList.toggle("sidebar_overlay_active");
}
