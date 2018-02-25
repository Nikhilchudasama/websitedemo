// Commons
function showNotice(type, message) {
    var alertifyFunctions = {
        'success': alertify.success,
        'error': alertify.error,
        'info': alertify.message,
        'warning': alertify.warning
    };

    alertifyFunctions[type](message, 10);
}

// Alertify
window.addEventListener('load', function () {
    alertify.set('notifier','position', 'top-right');
});

// Axios
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var token = document.head.querySelector('meta[name="csrf-token"]');
axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

// https://stackoverflow.com/a/30880807/3113599
function delegate(el, evt, sel, handler) {
    el.addEventListener(evt, function(event) {
        var t = event.target;
        while (t && t !== this) {
            if (t.matches(sel)) {
                handler.call(t, event);
            }
            t = t.parentNode;
        }
    });
}

function getIconParent(clickedElement) {
    if (clickedElement.tagName == 'path') {
        return clickedElement.parentNode.parentNode;
    }

    if (clickedElement.tagName == 'svg') {
        return clickedElement.parentNode;
    }

    return clickedElement;
}

// Order modal
function displayOrderDetails(dialogEl, event) {
    getOrderDetails(event.target.dataset.orderId);
}

function getOrderDetails(orderId) {
    axios.get(orderDetailsUrl + '/' + orderId)
    .then(function (response) {
        if (! response.data.hasOwnProperty('orderData')) {
            showNotice('error', 'Error occurred');
            return;
        }

        putOrderDetails(response.data.orderData);

        document.getElementById('loader').classList.add('hidden');
    })
    .catch(function (error) {
        console.log(error);
    });
}

function putOrderDetails(orderData) {
    orderDetailsElement = document.getElementById('order-details');

    orderDetailsElement.getElementsByClassName('id')[0].innerHTML = orderData.id;
    orderDetailsElement.getElementsByClassName('date')[0].innerHTML = orderData.date;
    orderDetailsElement.getElementsByClassName('status')[0].innerHTML = orderData.current_status;
    orderDetailsElement.getElementsByClassName('amount')[0].innerHTML = 'RM' + orderData.payable;
    orderDetailsElement.getElementsByClassName('payment-type')[0].innerHTML = orderData.payment_type;
    orderDetailsElement.getElementsByClassName('address')[0].innerHTML = orderData.address;

    setOrderItems(orderDetailsElement, orderData.items);

    setTotals(orderDetailsElement, orderData);

    orderDetailsElement.classList.remove('hidden');
}

function setOrderItems(orderDetailsElement, orderItems) {
    var itemsContainer = orderDetailsElement.getElementsByClassName('items-container')[0];

    // Remove existing items, if any.
    var elements = itemsContainer.getElementsByClassName('order-item-template');
    while (elements.length > 0){
        elements[0].parentNode.removeChild(elements[0]);
    }

    var orderItemTemplate = orderDetailsElement.getElementsByClassName('order-item-template hidden')[0];

    Array.from(orderItems).forEach(function(item) {
        orderItem = orderItemTemplate.cloneNode(true);
        orderItem.classList.remove('hidden');
        orderItem.getElementsByClassName('product')[0].innerHTML = item.product;
        orderItem.getElementsByClassName('price')[0].innerHTML = item.price;
        orderItem.getElementsByClassName('quantity')[0].innerHTML = item.quantity;
        orderItem.getElementsByClassName('item-total')[0].innerHTML = item.total;

        itemsContainer.prepend(orderItem);
    })
}

function setTotals(orderDetailsElement, orderData) {
    orderDetailsElement.getElementsByClassName('subtotal')[0].innerHTML = orderData.subtotal;
    var deliveryChargesElement = orderDetailsElement.getElementsByClassName('delivery-charges')[0];
    deliveryChargesElement.innerHTML = orderData.delivery_charges;

    var netTotalElement = orderDetailsElement.getElementsByClassName('net-total')[0];
    netTotalElement.innerHTML = orderData.net_total;

    orderDetailsElement.getElementsByClassName('gst')[0].innerHTML = orderData.gst;

    var totalElement = orderDetailsElement.getElementsByClassName('total')[0];
    totalElement.innerHTML = orderData.total;

    var roundOffElement = orderDetailsElement.getElementsByClassName('round-off')[0];
    roundOffElement.innerHTML = orderData.round_off;

    orderDetailsElement.getElementsByClassName('payable')[0].innerHTML = orderData.payable;

    if (orderData.delivery_charges > 0) {
        toggleCartTotalVisibility(deliveryChargesElement, true);
        toggleCartTotalVisibility(netTotalElement, true);
    } else {
        toggleCartTotalVisibility(deliveryChargesElement, false);
        toggleCartTotalVisibility(netTotalElement, false);
    }

    if (orderData.round_off != 0) {
        toggleCartTotalVisibility(totalElement, true);
        toggleCartTotalVisibility(roundOffElement, true);
    } else {
        toggleCartTotalVisibility(totalElement, false);
        toggleCartTotalVisibility(roundOffElement, false);
    }
}

function toggleCartTotalVisibility(element, show) {
    if (show) {
        element.parentNode.parentNode.classList.remove('hidden');
        return;
    }

    element.parentNode.parentNode.classList.add('hidden');
}
