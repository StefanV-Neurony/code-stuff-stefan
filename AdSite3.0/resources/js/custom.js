// importing sweet alert library
import * as Swal from "sweetalert2";

//Functions for ads management
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Function to open create modal
    $(document).on('click', '#openCreateModal', function (e) {
        e.stopPropagation();
        $('#createModal').modal('show');
    });
    $(document).on('click', '.deleteAd', function (e) {
        $(this).attr("disabled", true);
        if (!confirm("Are you sure you want to delete this advertisement?")) {
            return false;
        }
        e.preventDefault();
        var id = $(this).data("id");
        var url = e.target;
        $.ajax({
            url: 'delete/' + id,
            type: 'DELETE',
            success: function (data) {
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your advertisement has been deleted, clicking ok will redirect you to the main page',
                    icon: 'success',
                }).then((result) => {
                    if (result.value) {
                        location.reload(true);
                    }
                });
            },
            complete: function () {
                $(this).attr("disabled", false);
            },
        });
        return false;
    });

    //Function to edit modal based on id
    $(document).on('click', '.openEditModal', function (e) {
        $('#editModal').modal('show');
        var data = $.parseJSON($(this).attr('data-edit'));
        console.log(data);
        $('#editTitle').attr('value', data.title);
        $('#editBody').attr('value', data.body);
        $('#editName').attr('value', data.item.name);
        $('#editPrice').attr('value', data.item.price);
        $('#publishAd').attr('value', data.valid);

        if (data.valid === 1) {
            $('#publishAd').prop('checked', true);
        } else {
            $('#publishAd').prop('checked', false);
        }

        $('.editForm').submit(function (e) {
            e.preventDefault();
            let id = data.id;
            let formdata= $(this).serializeArray();
            if ($('#editedPublish').is(':checked')) {
                formdata.push({name: 'valid', value: 1});
            } else {
                formdata.push({name: 'valid', value: 0});
            }
            console.log(formdata);
            $.ajax({
                url: "update/" + id,
                type: "POST",
                data: formdata,
                cache: false,
                success: function (dataResult) {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        title: 'Ad edited!',
                        text: 'Your advertisement has been edited successfully. Click ok will redirect you to your ads.',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'mine';
                        }
                    });
                },
            });
        });
        e.stopImmediatePropagation();
    });
    $('#createForm').submit(function (e) {
        e.preventDefault();
        var formdata = $(this).serializeArray();
        console.log(formdata);
        var valid = 0;
        if ($('#publishAd').is(':checked')) {
            formdata.push({name: 'valid', value: 1});
        } else {
            formdata.push({name: 'valid', value: 0});
        }
        $.ajax({
            url: 'store',
            type: "POST",
            data: formdata,
            cache: false,
            success: function (data) {
                console.log(data);
                $('#createModal').modal('hide');
                Swal.fire({
                    title: 'Ad Created!',
                    text: 'Your advertisement has created successfully. Click ok will redirect you to your ads.',
                    icon: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location = '/ads/mine';
                    }
                });
            },
            complete: function () {
                $(this).attr("disabled", false);
            },
            error: function (xhr, status, error) {
                var errormessage = xhr.status + " :" + xhr.statusText;
                alert('Error -' + errormessage);
            },
        });
        e.stopImmediatePropagation();
    });
    $(document).on('click','.purchaseItem', function(e) {
        $(this).attr("disabled", true);
        var data = jQuery.parseJSON($(this).attr('data-edit'));
        var id = data.id;
        var users = jQuery.parseJSON($(this).attr('data-user'));
        var bought_by = users.name;
        $.ajax({
            url: "ads/buy/" + id,
            type:'POST',
            data: bought_by,
            success: function(data) {

            }
        });
    });
});
