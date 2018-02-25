var cartButton = document.getElementById('cart-button');
var container = document.getElementsByClassName('product-list-item')[0];

// Accordian for product categories
var productCategories = document.querySelectorAll('#item-categories > li');
Array.from(productCategories).forEach(function(productCategory) {
    productCategory.addEventListener("click", function(event) {
        if (event.target.tagName == 'svg' || event.target.tagName == 'path') {
            event.preventDefault();

            var productType = this.getElementsByClassName("product-type")[0];

            if (productType) {
                accordion(productType, 'hidden');
            }
        }
    });
});

// Accordian for Filters tab
var productFilterDropdownBtn = document.getElementsByClassName('slide-toggle-btn');
var itemFilters = document.getElementsByClassName('product-filter-content')[0];
productFilterDropdownBtn[0].addEventListener("click", function() {
    accordion(itemFilters, 'hidden');
});

// Price slider
var priceSlider = document.getElementById('price-slider');
var minPrice = 0;
var maxPrice = 10;
var priceFilter = noUiSlider.create(priceSlider, {
    start: [ minPrice, maxPrice ],
    connect: true,
    range: {
        'min': minPrice,
        'max': maxPrice
    }
});

var limitFieldMin = document.getElementsByClassName('from-price')[0];
var limitFieldMax = document.getElementsByClassName('to-price')[0];
priceFilter.on('set', function( values, handle ) {
    (handle ? limitFieldMax : limitFieldMin).innerHTML = 'RM' + values[handle];
    filterItems(values, handle);
});

var items = container.getElementsByClassName('product-item-element');
function filterItems(values, handle) {
    var minPrice = +values[0];
    var maxPrice = +values[1];

    Array.from(items).forEach(function(item) {
        if (item.dataset.price < minPrice || item.dataset.price > maxPrice) {
            item.classList.add('hidden');
        } else {
            item.classList.remove('hidden');
        }
    });
}

// Categories
var categoryButton = document.getElementsByClassName('categories-toggle-btn')[0];
var itemCategories = document.getElementById('item-categories');
categoryButton.addEventListener("click", function() {
    accordion(itemCategories, 'hidden-sm-down');
});

// Fetch items
window.addEventListener('load', function (){
    fetchItems();
});

var loader = document.getElementById('loader');
var moreItems = document.getElementById('more-items');
function fetchItems() {
    loader.classList.remove('hidden');

    axios.get(fetchUrl)
    .then(function (response) {
        loader.classList.add('hidden');

        // No items found
        if (response.data.items.length < 1) {
            displayEmptyMessage();
            return;
        }

        priceFilterUpdates(response.data.filters);

        if (type == 'product') {
            filterUpdates(response.data.filters);
        }

        setItems(response.data.items);

        // Load More button
        if (response.data.hasMore) {
            moreItems.classList.remove('hidden');
            moreItems.dataset.nextUrl = response.data.nextUrl;
        }
    })
    .catch(function (error) {
        console.log(error);
    });
}

function displayEmptyMessage() {
    var paragraph = document.createElement("p")
    paragraph.classList.add('text-center');
    paragraph.classList.add('col');
    var node = document.createTextNode("No items found");
    paragraph.appendChild(node);
    container.appendChild(paragraph);
}

function priceFilterUpdates(filters) {
    if (priceSlider.hasAttribute('disabled')) {
        minPrice = +filters.minPrice;
        maxPrice =  +filters.maxPrice;
        priceSlider.removeAttribute('disabled');
    }

    // https://stackoverflow.com/a/1133814/3113599
    minPrice = minPrice > +filters.minPrice ? +filters.minPrice : minPrice;
    maxPrice =  maxPrice < +filters.maxPrice ? +filters.maxPrice : maxPrice;
    if (minPrice == maxPrice) {
        maxPrice += 0.01;
    }

    priceFilter.updateOptions({
        start: [ minPrice, maxPrice ],
		range: {
			'min': minPrice,
			'max': maxPrice
		}
	});
}

// Load More button
moreItems.addEventListener('click', function(evt) {
    evt.preventDefault();
    fetchUrl = moreItems.dataset.nextUrl;
    fetchItems();
    moreItems.classList.add('hidden');
});

function setItems(items) {
    var templateElement = document.getElementsByClassName('product-item-element hidden')[0];

    for (var index in items) {
        item = items[index];

        newElement = templateElement.cloneNode(true);
        newElement.classList.remove("hidden");
        newElement.dataset.price = item.price;
        container.appendChild(newElement);

        imgElement = newElement.getElementsByClassName('item-image')[0];
        imgElement.src = item.image;
        imgElement.alt = item.name;

        nameElement = newElement.getElementsByClassName('item-name')[0];
        nameElement.innerHTML = item.name;

        priceElement = newElement.getElementsByClassName('item-price')[0];
        priceElement.innerHTML = 'RM' + item.price;

        addToCartElement = newElement.getElementsByClassName('add-to-cart')[0];
        viewPageLink = newElement.getElementsByClassName('view-item-page')[0];

        if (type == 'accessory') {
            addToCartElement.dataset.itemId = item.accessory_merchant_id;
            viewPageLink.href = "/shop-accessories/" + item.accessory_category_slug + "/" + item.accessory_slug;
        } else {
            addToCartElement.dataset.itemId = item.merchant_product_id;
            viewPageLink.href = "/shop/" + item.product_category_slug + "/" + item.product_type_slug + "/" + item.product_slug;
            newElement.dataset.countryOfOriginId = item.country_of_origin_id;
            newElement.dataset.flavorId = item.flavor_id;
            newElement.dataset.yearMade = item.year_made;
        }
    }
}