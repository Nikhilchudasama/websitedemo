var customerAddresses = {};
var areas = [];
var dialog = '';

window.addEventListener('load', function () {
    axios.get(fetchCustomerAddressesUrl)
        .then(function (response) {
            areas = response.data.areas;
            putAddresses(response.data.addresses);
            putAreas(areas);
        })
        .catch(function (error) {
            console.log(error);
        });
});

var mainEl = document.getElementById('addresses-container');
function initializeDialog() {
    var dialogEl = document.getElementById('address-modal');
    dialog = new window.A11yDialog(dialogEl, mainEl);
    dialog.on('show', addressUpdate);
}

function putAddresses(addresses) {
    var templateElement = document.getElementsByClassName('address-container hidden')[0];

    Array.from(addresses).forEach(function (address, index) {
        if (address.id in customerAddresses) {
            newElement = document.getElementsByClassName('address-container-' + address.id)[0];
            var editAddress = true;
        } else {
            newElement = templateElement.cloneNode(true);
            newElement.classList.remove("hidden");
            newElement.classList.add('address-container-' + address.id);
            var editAddress = false;
        }

        customerAddresses[address.id] = address;

        var labelElement = newElement.getElementsByClassName('label')[0];
        labelElement.innerHTML = address.fullAddress;

        // Following steps are not required if address is just updated
        if (editAddress) {
            return;
        }

        labelElement.htmlFor = 'address-' + address.id;

        var radioElement = newElement.getElementsByClassName('radio')[0];
        radioElement.id = 'address-' + address.id;
        radioElement.value = address.id;
        if (index == 0) {
            radioElement.checked = true;
        }

        newElement.getElementsByClassName('edit-address')[0].dataset.addressId = address.id;
        newElement.getElementsByClassName('delete-address')[0].dataset.addressId = address.id;

        templateElement.parentNode.insertBefore(newElement, templateElement);
    });

    initializeDialog();
}

function putAreas(areas) {
    AddressAreaElement = document.getElementById('place');

    Array.from(areas).forEach(function (area) {
        var el = document.createElement("option");
        el.value = area.id;
        el.textContent = area.name;
        AddressAreaElement.appendChild(el);
    });
}

function addressUpdate(dialogEl, event) {
    addressForm.reset();
    var dialogTitle = document.getElementById('dialog-title');
    var formMethodElement = document.getElementById('form-method');
    var clickedBtn = event.target;

    if (clickedBtn.classList.contains('edit-address')) {
        var addressId = clickedBtn.dataset.addressId;
        dialogTitle.innerHTML = 'Edit Address';
        addressForm.action = addressForm.dataset.editUrl + '/' + addressId;
        formMethodElement.disabled = false;

        document.getElementById('line1').value = customerAddresses[addressId].line1;
        document.getElementById('line2').value = customerAddresses[addressId].line2;
        document.getElementById('place').value = customerAddresses[addressId].place;
        document.getElementById('pin').value = customerAddresses[addressId].pin;

        return;
    }

    dialogTitle.innerHTML = 'Add Address';
    formMethodElement.disabled = true;
    addressForm.action = addressForm.dataset.addUrl;
}

var addressForm = document.getElementById('address-form');
addressForm.addEventListener('submit', function (evt) {
    evt.preventDefault();

    ajaxSubmit(addressForm, function (response) {
        if (response.data.hasOwnProperty('success') && response.data.success == true) {
            putAddresses(response.data.address);
            showNotice('success', 'Address updated successfully');
            dialog.hide();
            return;
        }

        showNotice('error', response.data.message);
    }, '');
});

delegate(mainEl, "click", "a.delete-address", function (event) {
    event.preventDefault();

    if (confirm('are you sure?')) {
        var addressId = event.target.dataset.addressId;

        axios.delete(deleteCustomerAddressesUrl + addressId)
            .then(function (response) {
                delete customerAddresses[addressId];

                var addressElement = document.getElementsByClassName('address-container-' + addressId)[0];
                addressElement.parentNode.removeChild(addressElement);

                showNotice('success', 'Address deleted successfully');
            })
            .catch(function (error) {

            });
    }
});
