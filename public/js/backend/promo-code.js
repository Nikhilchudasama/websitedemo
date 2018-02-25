window.addEventListener('load', function (evt) {
    var genrateButton = document.getElementById('generate-random');

    genrateButton.onclick = function () {
        var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        var pass = "";

        for (var x = 0; x < 20; x++) {
            var i = Math.floor(Math.random() * chars.length);
            pass += chars.charAt(i);
        }

        document.getElementById('code').value = pass;
    };
});