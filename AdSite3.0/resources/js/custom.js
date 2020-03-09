// importing sweet alert library
import * as Swal from "sweetalert2";


//Functions for ads management
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    //Function to open the create advertisement modal
    $('#openCreateModal').on('click', function (e) {
        e.stopPropagation();
        $('#createModal').modal('show');


    });

//Function to save the advertisement with the data in the create modal
    $('#saveButton').on("click", function (e) {
        var title = $('#title').val();
        var items = $('#items').val();
        var body = $('#body').val();
        var price = $('#price').val();
        var valid = 0;
        if ($('#validCheck').is(':checked')) {
            valid = 1;
        }
        else valid=0;
        $(this).attr("disabled",true);

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


                },
                complete: function(){
                    $(this).attr("disabled",false);
                }
            });
            e.stopImmediatePropagation();

    });

    //Function to delete an ad based on id
    $('.deleteAd').click(function (e) {
        if (!confirm("Are you sure you want to delete this advertisement?")) {
            return false;
        }
        e.preventDefault();

        var id = $(this).data("id");
        var url = e.target;
        $(this).attr("disabled",true);
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
            },
            complete: function()
            {
                $(this).attr("disabled",false);
            }

        });
        return false;


    });
    //Function to edit modal based on id
    $('.openEditModal').click(function () {
        $('#editModal').modal('show');
        var data = jQuery.parseJSON($(this).attr('data-edit'));

        $('#titleedit').attr('value',data.title);
        $('#bodyedit').attr('value',data.body);
        $('#itemsedit').attr('value',data.item.name);
        $('#priceedit').attr('value',data.item.price);
        $('#editID').attr('value',data.id);
        $('#publishAd').attr('value',data.valid);
      if(data.valid==1)
        {
            $('#publishAd').prop('checked',true);
        }
        else {$('#publishAd').prop('checked',false);

      }
        $('#updateButton').click(function (){
            var title= $('#titleedit').val();
            var body= $('#bodyedit').val();
            var items= $('#itemsedit').val();
            var price= $('#priceedit').val();
            var id= data.id;
            var valid;
            if($('#publishAd').prop('checked'))
            {
            valid=1;
            }
            else { valid=0;

            }
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
    //Function to purchase an ad by setting the user_id value to the user that click the purchase ad button from the ad creator user_id
    $('.purchaseAd').click(function(){
        var data = jQuery.parseJSON($(this).attr('data-edit'));

        var id = data.id;
       var users = jQuery.parseJSON($(this).attr('data-user'));
        var buyer = users.id;
        $(this).attr("disabled",true);
        $.ajax ({
            url: "ads/buy/"+id,
            type: "POST",
            data: {

                type: 1,
              user_id:buyer,
            },
            cache: false,
            success: function (dataResult) {
               console.log(dataResult);
                Swal.fire({
                    title: 'Item bought!',
                    text: 'Your new item has been added to your collection successfully. Clicking ok will redirect you to your items.',
                    icon: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location = '/myitems';
                    }
                });


            },
            complete: function(){
                $(this).attr("disabled",false);
            }

        });

    });





});
