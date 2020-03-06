import * as Swal from "sweetalert2";

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#openCreateModal').on('click', function (e) {
        e.stopPropagation();
        $('#createModal').modal('show');


    });


    $('#saveButton').on("click", function (e) {
        var title = $('#title').val();
        var items = $('#items').val();
        var body = $('#body').val();
        var price = $('#price').val();
        var valid = 0;
        if ($('#validCheck').is(':checked')) {
            valid = 1;
        }



            $.ajax({

                url: "ads/store",
                type: "POST",
                data: {

                    type: 1,
                    title: title,
                    items: items,
                    body: body,
                    price: price,
                    valid: valid,
                },
                cache: false,
                success: function (dataResult) {
                    $('#createModal').modal('hide');
                    Swal.fire({
                        title: 'Ad Created!',
                        text: 'Your advertisement has created successfully. Click ok will redirect you to your ads.',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location = '/myads';
                        }
                    });


                }
            });
            e.stopImmediatePropagation();

    });

    $('.deleteAd').click(function (e) {
        if (!confirm("Are you sure you want to delete this advertisement?")) {
            return false;
        }
        e.preventDefault();

        var id = $(this).data("id");
        var url = e.target;

        $.ajax({
            url: '/delete/' + id,
            type: 'DELETE',
            data: {
                id: id
            },
            success: function (response) {

                Swal.fire({
                    title: 'Deleted!',
                    text: 'Your advertisement has been deleted, clicking ok will redirect you to the main page',
                    icon: 'success',
                }).then((result) => {
                    if (result.value) {
                        location.reload(true);
                    }
                });
            }

        });
        return false;


    });
    $('.openEditModal').click(function () {
        $('#editModal').modal('show');
        var data = jQuery.parseJSON($(this).attr('data-edit'));
        console.log(data);
        $('#titleedit').attr('value',data.title);
        $('#bodyedit').attr('value',data.body);
        $('#itemsedit').attr('value',data.item.name);
        $('#priceedit').attr('value',data.item.price);
        $('#editID').attr('value',data.id);
        $('#validCheck').attr('value',data.valid);


        $('#updateButton').click(function (){
            var title= $('#titleedit').val();
            var body= $('#bodyedit').val();
            var items= $('#itemsedit').val();
            var price= $('#priceedit').val();
            var id= data.id;
            var valid= 1;

            $.ajax ({
                url: "ads/update/"+id,
                type: "POST",
                data: {

                    type: 1,
                    title: title,
                    items: items,
                    body: body,
                    price: price,
                    valid: valid,
                },
                cache: false,
                success: function (dataResult) {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        title: 'Ad edited!',
                        text: 'Your advertisement has been edited successfully. Click ok will redirect you to your ads.',
                        icon: 'success',
                    }).then((result) => {
                        if (result.value) {
                            window.location = '/myads';
                        }
                    });


                }

            });








        });
    });
    $('.purchaseAd').click(function(){
        var data = jQuery.parseJSON($(this).attr('data-edit'));
var id =data.id;



        var valid=0;
        $.ajax ({
            url: "ads/update/"+id,
            type: "POST",
            data: {

                type: 1,
                valid:valid,

            },
            cache: false,
            success: function (dataResult) {

                Swal.fire({
                    title: 'Ad bought!',
                    text: 'bravo coaie',
                    icon: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location = '/home';
                    }
                }

                )


            }

        });

    });





});
