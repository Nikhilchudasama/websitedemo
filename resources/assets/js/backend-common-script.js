// Delete record
var deleteIcons = document.querySelectorAll("tbody tr td form span.delete-data");

Array.from(deleteIcons).forEach(function (deleteIcon) {
    deleteIcon.onclick = function () {
        if (confirm('Are you sure?')) {
            var url = deleteIcon.parentElement.action;

            axios.delete(url).then(function (response) {
                if (response['data'] == null || response['data'] == '') {
                    var tr = deleteIcon.parentElement.parentElement.parentElement;
                    tr.parentElement.removeChild(tr);

                    showNotice("success", "Item deleted", 'success');
                } else {
                    showNotice("error", response['data'], 'success');
                }
            }).catch(function (error) {
                console.log(error);
            });
        }
    };
});