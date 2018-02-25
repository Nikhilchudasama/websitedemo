var orderCancelDialog = '';
window.addEventListener('load', function () {
    fetchItems();

    var mainEl = document.getElementById('merchant-orders-container');

    // Order details dialog
    var detailsEl = document.getElementById('view-order-modal');
    orderDetailsDialog = new window.A11yDialog(detailsEl, mainEl);

    // Order cancellation dialog
    var dialogEl = document.getElementById('order-cancel-modal');
    orderCancelDialog = new window.A11yDialog(dialogEl, mainEl);
    orderCancelDialog.on('hide', resetSelectValues);
});

var container = document.getElementsByClassName('merchant-orders')[0];
var orderLoader = document.getElementById('order-loader').parentNode.parentNode;
var moreItems = document.getElementById('more-items');
var totalOrders = document.getElementById('total-orders');
function fetchItems() {
    orderLoader.classList.remove('hidden');

    axios.get(fetchUrl)
    .then(function (response) {
        orderLoader.classList.add('hidden');

        // No items found
        if (response.data.items.length < 1) {
            displayEmptyMessage();
            return;
        }

        setItems(response.data.items);

        totalOrders.innerHTML = response.data.total;

        // Load More button
        if (response.data.hasMore) {
            moreItems.classList.remove('hidden');
            moreItems.dataset.nextUrl = response.data.nextPageUrl;
        }
    })
    .catch(function (error) {
        console.log(error);
    });
}

function displayEmptyMessage() {
    var tableRow = document.createElement("tr")
    var tableCell = document.createElement("td")
    tableCell.colSpan = 7;
    var node = document.createTextNode("No items found");
    tableCell.appendChild(node);
    tableRow.appendChild(tableCell);
    container.appendChild(tableRow);
}

// Load More button
moreItems.addEventListener('click', function(evt) {
    evt.preventDefault();
    fetchUrl = moreItems.dataset.nextUrl;
    fetchItems();
    moreItems.classList.add('hidden');
});

function setItems(items) {
    var templateElement = document.getElementsByClassName('order-item-template hidden')[0];

    for (var index in items) {
        item = items[index];

        newElement = templateElement.cloneNode(true);
        newElement.classList.remove("hidden");
        container.insertBefore(newElement, templateElement);

        idElement = newElement.getElementsByClassName('order-id')[0];
        idElement.innerHTML = item.id;

        customerElement = newElement.getElementsByClassName('customer')[0];
        customerElement.innerHTML = item.customer;

        amountElement = newElement.getElementsByClassName('amount')[0];
        amountElement.innerHTML = item.amount;

        paymentTypeElement = newElement.getElementsByClassName('payment-type')[0];
        paymentTypeElement.innerHTML = item.payment_type;

        currentStatusElement = newElement.getElementsByClassName('current-status')[0];
        currentStatusElement.value = item.current_status;
        currentStatusElement.classList.add('order-' + item.id);
        currentStatusElement.dataset.orderId = item.id;
        currentStatusElement.dataset.currentStatus = item.current_status;

        dateElement = newElement.getElementsByClassName('date')[0];
        dateElement.innerHTML = item.date;

        viewOrderElement = newElement.getElementsByClassName('order-info')[0];
        viewOrderElement.dataset.orderId = item.id;
    }
}

var reasonSelect = document.getElementById('order-cancellation-reason');
delegate(container, "change", "select.current-status", function(event) {
    event.preventDefault();

    var selectElement = event.target;

    if (selectElement.value == 4) {
        reasonSelect.dataset.orderId = selectElement.dataset.orderId,
        reasonSelect.dataset.oldStatus = selectElement.dataset.currentStatus;

        orderCancelDialog.show();
        return;
    }

    updateOrderStatus(selectElement, reasonId = '');
});

reasonSelect.addEventListener('change', function() {
    var selectElement = document.querySelector('select.order-' + this.dataset.orderId);
    updateOrderStatus(selectElement, this.value);
    orderCancelDialog.hide();
});

function resetSelectValues() {
    if (reasonSelect.value) {
        reasonSelect.value = '';
        return;
    }

    var selectElement = document.querySelector('select.order-' + reasonSelect.dataset.orderId);
    selectElement.value = selectElement.dataset.currentStatus;
}

function updateOrderStatus(selectElement, reasonId) {
    var newStatus = selectElement.value;

    axios.post(statusUpdateUrl, {
        order_id: selectElement.dataset.orderId,
        old_status: selectElement.dataset.currentStatus,
        new_status: newStatus,
        reason_id: reasonId,
    })
    .then(function (response) {
        selectElement.dataset.currentStatus = newStatus;

        showNotice('success', 'Order status updated successfully');
    })
    .catch(function (error) {
        showNotice('error', 'Error occurred. Please try again.');
    });
}

// Order info
delegate(container, "click", "td.order-info", function(event) {
    var clickedElement = getIconParent(event.target);
    getOrderDetails(clickedElement.dataset.orderId);
    orderDetailsDialog.show();
});
