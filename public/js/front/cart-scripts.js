var mainCartItemsContainer = document.getElementsByClassName('main-cart-items-container')[0];
var mainCartItemTemplate = document.getElementsByClassName('main-cart-item-template hidden')[0];

function processMainCartItemElement(newElement, item) {
    priceTotalElement = newElement.getElementsByClassName('item-price-total')[0];
    priceTotalElement.innerHTML = parseFloat(item.price * item.quantity).toFixed(2);

    return newElement;
}

function appendToMainCart(newElement) {
    mainCartItemsContainer.appendChild(newElement);
}

function setCartTotals(response) {
    var subtotalElement = document.getElementsByClassName('subtotal')[0];
    subtotalElement.innerHTML = response.subtotal;

    var discountElement = document.getElementsByClassName('discount')[0];
    discountElement.innerHTML = response.discount;

    var discountPercentageElement = document.getElementsByClassName('discount-percentage')[0];
    discountPercentageElement.innerHTML = '(' + response.discount_percentage + '%)';

    if (parseFloat(response.discount_percentage) > 0) {
        discountPercentageElement.classList.remove('hidden');
    } else {
        discountPercentageElement.classList.add('hidden');
    }

    var shippingElement = document.getElementsByClassName('shipping-charges')[0];
    shippingElement.innerHTML = response.shipping_charges;

    var netTotalElement = document.getElementsByClassName('net-total')[0];
    netTotalElement.innerHTML = response.net_total;

    var taxElement = document.getElementsByClassName('tax')[0];
    taxElement.innerHTML = response.tax;

    var totalElement = document.getElementsByClassName('total')[0];
    totalElement.innerHTML = response.total;

    var roundOffElement = document.getElementsByClassName('round-off')[0];
    roundOffElement.innerHTML = response.round_off;

    toggleCartTotalVisibility(shippingElement, parseFloat(response.shipping_charges) > 0);
    toggleCartTotalVisibility(discountElement, parseFloat(response.discount) > 0);

    if (parseFloat(response.subtotal) != parseFloat(response.net_total)) {
        toggleCartTotalVisibility(netTotalElement, true);
    } else {
        toggleCartTotalVisibility(netTotalElement, false);
    }

    if (response.round_off != 0) {
        toggleCartTotalVisibility(totalElement, true);
        toggleCartTotalVisibility(roundOffElement, true);
    } else {
        toggleCartTotalVisibility(totalElement, false);
        toggleCartTotalVisibility(roundOffElement, false);
    }

    var payableElement = document.getElementsByClassName('payable')[0];
    payableElement.innerHTML = response.payable;
}

function toggleCartTotalVisibility(element, show) {
    if (show) {
        element.parentNode.parentNode.classList.remove('hidden');
    } else {
        element.parentNode.parentNode.classList.add('hidden');
    }
}

var applyCouponButton = document.getElementById('apply-coupon');
applyCouponButton.addEventListener('click', function() {
    var couponCode = document.getElementById('coupon-code').value;
    applyCouponButton.disabled = true;

    axios.post(applyCouponUrl, {
        couponCode: couponCode
    })
    .then(function (response) {
        messaageType = 'error';

        if (response.data.status) {
            updateSidebarCartTotals(response.data.cart.payable);
            setCartTotals(response.data.cart);
            messaageType = 'success';
        }

        showNotice(messaageType, response.data.message);
        applyCouponButton.disabled = false;
    })
    .catch(function (error) {
        showNotice('error', 'Error occurred');
    });
});
