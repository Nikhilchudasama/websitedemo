var cartcounter = document.getElementsByClassName('cart-count')[0];
var cartTotals = document.getElementsByClassName('cart-total');
var cartItemsContainers = document.getElementsByClassName('cart-items-container');

function fetchCartData() {
    axios.get(fetchCartDataUrl)
        .then(function (response) {
            cartUpdates(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
}

function cartUpdates(response) {
    Array.from(cartItemsContainers).forEach(function (cartItemsContainer) {
        cartItemsContainer.innerHTML = '';
    });

    setCartItems(response.items);

    // Update cart item counter at the top
    cartcounter.innerHTML = response.items.length;

    updateSidebarCartTotals(response.payable);

    if (typeof mainCartItemsContainer !== 'undefined') {
        setCartTotals(response);
    }
}

function updateSidebarCartTotals(amount) {
    Array.from(cartTotals).forEach(function (cartTotal) {
        cartTotal.innerHTML = 'RM' + amount;
    });
}

function setCartItems(items) {
    for (var index in items) {
        item = items[index];

        sideCartItemElement = sideCartItemTemplate.cloneNode(true);
        processedCartItemElement = processElement(sideCartItemElement, item, index);
        appendToSideCart(processedCartItemElement);

        if (typeof mainCartItemsContainer !== 'undefined') {
            mainCartItemElement = mainCartItemTemplate.cloneNode(true);
            mainCartItemElement = processElement(mainCartItemElement, item, index);
            mainCartItemElement = processMainCartItemElement(mainCartItemElement, item);
            appendToMainCart(mainCartItemElement);
        }
    }
}

// Prepare cloned element with cart item data
function processElement(newElement, item, index) {
    newElement.classList.remove("hidden");

    imgElement = newElement.getElementsByClassName('item-image')[0];
    imgElement.src = item.image;
    imgElement.alt = item.name;

    nameElement = newElement.getElementsByClassName('item-name')[0];
    nameElement.innerHTML = item.name;

    priceElement = newElement.getElementsByClassName('item-price')[0];
    priceElement.innerHTML = item.price;

    quantityElement = newElement.getElementsByClassName('item-quantity')[0];
    if (quantityElement.nodeName == 'INPUT') {
        quantityElement.value = item.quantity;
    } else {
        quantityElement.innerHTML = item.quantity;
    }

    incrementQuantityElement = newElement.getElementsByClassName('increment-quantity')[0];
    incrementQuantityElement.dataset.cartIndexId = index;

    decrementQuantityElement = newElement.getElementsByClassName('decrement-quantity')[0];
    decrementQuantityElement.dataset.cartIndexId = index;

    removeFromCartElement = newElement.getElementsByClassName('remove-item')[0];
    removeFromCartElement.dataset.cartIndexId = index;

    return newElement;
}

Array.from(cartItemsContainers).forEach(function (cartItemsContainer) {
    // Remove item from the cart
    delegate(cartItemsContainer, "click", "a.remove-item", function (event) {
        event.preventDefault();

        var clickedElement = getIconParent(event.target);

        axios.post(removeCartItemUrl, {
            cartItemIndex: clickedElement.dataset.cartIndexId
        })
            .then(function (response) {
                cartUpdates(response.data);
            })
            .catch(function (error) {

            });
    });

    // Increment item quantity
    delegate(cartItemsContainer, "click", "span.increment-quantity", function (event) {
        event.preventDefault();

        axios.post(incrementItemQuantityUrl, {
            cartItemIndex: event.target.dataset.cartIndexId
        })
            .then(function (response) {
                cartUpdates(response.data);
            })
            .catch(function (error) {

            });
    });

    // Decrement item quantity
    delegate(cartItemsContainer, "click", "span.decrement-quantity", function (event) {
        event.preventDefault();

        axios.post(decrementItemQuantityUrl, {
            cartItemIndex: event.target.dataset.cartIndexId
        })
            .then(function (response) {
                cartUpdates(response.data);
            })
            .catch(function (error) {

            });
    });
});
