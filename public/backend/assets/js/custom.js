

// for the delete sweet alert

$('.deleteConfirm').on('click', function (event) {
    e.preventDefault();
    var link = $(this).attr("href");
    swal({
        title: 'Are you sure?',
        text: 'This record will be permanantly deleted!',
        icon: 'warning',
        buttons: ["Cancel", "Yes!"],
        dangerMode: true,
    }).then(function(value) {
        if (value) {
            window.location.href = url;
        }
    });

});

