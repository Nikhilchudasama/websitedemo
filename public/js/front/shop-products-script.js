countryOfOriginSelect = document.getElementById('country-of-origin');
flavorSelect = document.getElementById('flavor');
yearMadeSelect = document.getElementById('year-made');

function filterUpdates(filters) {
    // Reset values
    countryOfOriginSelect.value = '';
    flavorSelect.value = '';
    yearMadeSelect.value = '';

    for (index in filters.countryOfOrigins) {
        var el = document.createElement("option");
        el.value = index;
        el.textContent = filters.countryOfOrigins[index];
        countryOfOriginSelect.appendChild(el);
    };

    for (index in filters.flavors) {
        var el = document.createElement("option");
        el.value = index;
        el.textContent = filters.flavors[index];
        flavorSelect.appendChild(el);
    };

    for (index in filters.yearMade) {
        var el = document.createElement("option");
        el.value = el.textContent = filters.yearMade[index];
        yearMadeSelect.appendChild(el);
    };
}

countryOfOriginSelect.addEventListener('change', function (evt) {
    if (evt.target.value) {
        Array.from(items).forEach(function (item) {
            if (item.dataset.countryOfOriginId == evt.target.value) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    }
});

flavorSelect.addEventListener('change', function (evt) {
    if (evt.target.value) {
        Array.from(items).forEach(function (item) {
            if (item.dataset.flavorId == evt.target.value) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    }
});

yearMadeSelect.addEventListener('change', function (evt) {
    if (evt.target.value) {
        Array.from(items).forEach(function (item) {
            if (item.dataset.yearMade == evt.target.value) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    }
});