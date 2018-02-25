// Pre order datetime
var preOrderDateElement = document.getElementById('date-picker');
var preOrderDateTime = null;
window.addEventListener('load', function() {
    new Pikaday({
        field: document.getElementById('date-picker'),
        onSelect: function() {
            setPreOrderDate(this);
        }
    });
});

var preOrderTimeElement = document.getElementById('pre-order-time');
preOrderTimeElement.addEventListener('change', function() {
    updateOrderButtonText();
});

// Bring change for
var radioButtons = document.getElementsByName('payment_method');
Array.from(radioButtons).forEach(function(radioButton) {
    radioButton.addEventListener('click', function() {
        selectedPaymentMethod = this.value;

        // COD
        if (this.value == 1) {
            document.getElementById('bring-change-container').style.display = 'block';
            return;
        }

        // PayPal/Credit Card
        if (this.value == 2) {
            initializeBraintree();
        }

        document.getElementById('bring-change-container').style.display = 'none';
    });
});

// Place order
var placeOrderBtn = document.getElementById('place-order');
var selectedPaymentMethod = 1;
placeOrderBtn.addEventListener("click", function(evt) {
    evt.preventDefault();

    // COD
    if (selectedPaymentMethod == 1) {
        placeOrderBy(selectedPaymentMethod, '');
    }
});

function placeOrderBy(selectedPaymentMethod, braintreePaymentNonce) {
    var selectedAddress = document.querySelector('input[name=address]:checked')
    if (! selectedAddress) {
        showNotice('error', 'Please select delivery address');
        return;
    }

    placeOrderBtn.disabled = true;
    var notes = document.getElementById('notes').value;

    var bringChangeFor = null;
    var bringChangeForElement = document.querySelector('input[name=bring_change_for]:checked');
    if (selectedPaymentMethod == 1 && bringChangeForElement) {
        bringChangeFor = bringChangeForElement.value;
    }

    axios.post(placeOrderUrl, {
        address_id: selectedAddress.value,
        pre_order_time: preOrderDateTime,
        notes: notes,
        payment_type: selectedPaymentMethod,
        bring_change_for: bringChangeFor,
        braintree_payment_nonce: braintreePaymentNonce,
    }, {
        transformResponse: [function (data) {
            placeOrderBtn.disabled = false;
            return data;
        }],
        responseType: 'json'
    })
    .then(function (response) {
        if (response.data.status) {
            window.location = thankYouPageUrl;
            return;
        }

        var message = response.data.message ? response.data.message : 'Error occurred';
        showNotice('error', message);
    })
    .catch(function (error) {
        console.log(error);
    });
}

function initializeBraintree() {
    braintree.dropin.create({
        authorization: clientToken,
        container: '#braintree-payment-box',
        paypal: {
            flow: 'vault'
        }
    }, function (createErr, instance) {
        placeOrderBtn.addEventListener('click', function (evt) {
            evt.preventDefault();

            if (selectedPaymentMethod == 2) {
                instance.requestPaymentMethod(function (err, payload) {
                    placeOrderBy(2, payload.nonce);
                });
            }
        });
    });
}

function setPreOrderDate(dateObj) {
    var date = dateObj.getDate();
    var dd = date.getDate();
    var mm = date.getMonth() + 1; //January is 0!
    var yyyy = date.getFullYear();

    if (dd < 10) {
        dd = '0' + dd;
    }

    if (mm < 10) {
        mm = '0' + mm;
    }

    preOrderDateElement.value = yyyy + '-' + mm + '-' + dd;

    updateOrderButtonText();
}

function updateOrderButtonText() {
    var preOrderDate = preOrderDateElement.value;
    var preOrderTime = preOrderTimeElement.value;

    if (preOrderDate != '' && preOrderTime != '') {
        preOrderDateTime = preOrderDate + ' ' + preOrderTime;

        placeOrderBtn.innerHTML = 'Place Pre Order';
        return;
    }

    preOrderDateTime = null;
    placeOrderBtn.innerHTML = 'Place Order';
}