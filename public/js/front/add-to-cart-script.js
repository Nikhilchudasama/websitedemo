var container = document.getElementsByClassName('product-list-item')[0];
delegate(container, "click", "a.add-to-cart", function(event) {
    event.preventDefault();

    var clickedElement = getIconParent(event.target);

    var postData = {
        'merchantProductId': clickedElement.dataset.itemId
    };

    if (type == 'accessory') {
        var postData = {
            'accessoryMerchantId': clickedElement.dataset.itemId
        }
    }

    axios.post(postUrl, postData)
    .then(function (response) {
        cartUpdates(response.data);

        cartButton.classList.remove('hidden');
        showNotice('success', 'Item added to cart');
    })
    .catch(function (error) {

    });
});