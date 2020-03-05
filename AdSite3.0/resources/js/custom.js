import * as Swal from "sweetalert2";

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#openCreateModal').on('click',function (e){
        e.stopPropagation();
        $('#createModal').modal('show');



    });
    $('#closeCreateModal').on('click',function() {
        $('#createModal').modal('hide');
    });

    $('#saveButton').on("click", function (e) {
            var title = $('#title').val();
            var items = $('#items').val();
            var body = $('#body').val();
            var price = $('#price').val();
            var valid = 0;
            if($('#validCheck').is(':checked')){
                 valid=1;
            }
        if (title != "" && items != "" && body != "" && price != "" ) {


                $.ajax({

                    url: "ads/store",
                    type: "POST",
                    data: {

                        type: 1,
                        title: title,
                        items: items,
                        body: body,
                        price: price,
                        valid:valid,
                    },
                    cache: false,
                    success: function (dataResult) {
                        $('#createModal').modal('hide');
                        Swal.fire({
                            title: 'Ad Created!',
                            text: 'Your advertisement has created successfully. Click ok will redirect you to your ads.',
                            icon: 'success',
                        }).then((result)=>{
                                if(result.value){
                                    window.location='/myads';
                                }
                            });


                    }
                });
                e.stopImmediatePropagation();
            } else {
                alert('Please fill all the field !');
            }
        });

    $('.deleteAd').click(function(e) {
        if(!confirm("Are you sure you want to delete this advertisement?"))
        {
            return false;
        }
        e.preventDefault();

        var id = $(this).data("id");
        var url=e.target;

        $.ajax ({
            url: '/delete/'+id,
            type:'DELETE',
            data:{
                id:id
            },
            success:function(response){

                Swal.fire({
                    title:'Deleted!',
                    text:'Your advertisement has been deleted, clicking ok will redirect you to the main page',
                    icon:'success',
                }).then((result)=>{
                    if(result.value){
                        location.reload(true);
                    }
                });
            }

        });
return false;


    });

    $('.openEditModal').click(function(){
        $('.editModal').modal('show');




    });




    });










