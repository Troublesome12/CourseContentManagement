//Deleting File
$(".file-delete").click(function() {
    var id = $(this).data("id");
    var token = $(this).data("token");
    swal({
            title: "Are you sure to delete the file?",
            text: "You will not be able to recover this file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function() { //on click yes
            $.ajax({
                url: '/file/' + id,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                }
            }).done(function() {
                window.location.reload();
            });
        }
    );
    return false;
});

$("#file-input").on('change', function(event) {
    var file = event.target.files[0];

    if(!file.type.match('image/jpeg')
        && !file.type.match('image/jpg')
        && !file.type.match('image/png')
        && !file.type.match('application/pdf')) {

        $(this).addClass('error');
        $('#file-error').removeClass('hidden');
        $("#file-input").val(''); //the tricky part is to "empty" the input file here I reset the form.
        return;
    }
});

$('#file-input').on('focus', function(event) {
    if($(this).hasClass('error')){
        $(this).removeClass('error');
        $('#file-error').addClass('hidden');
    }
});