
<div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">

        <div class="form-group">
            {{csrf_field()}}
        <div class="form-group">
            <label for="title">Ad title:</label>
            <input type="hidden" id="editID" value="">
            <input type="text" class="form-control"  id = "titleedit" class="form-control" value="" required >
        </div>
        <div class="form-group">
            <label for="items">Items:</label>
            <input type="text" class="form-control"  id = "itemsedit" class="form-control" value="" required >
        </div>
        <div class="form-group">
            <label for="body">Description:</label>
            <input type="text" class="form-control"  id = "bodyedit" class="form-control" value="" required >
        </div>
        <div class="form-group">
            <label for="">Price:</label>
            <input type="text" class="form-control"  id = "priceedit" class="form-control" value="" required >
        </div>

            Would you like to make this ad available/unavailable?
        <div class="form-check">

            <input class="form-check-input" type="checkbox" value="" id="validCheck">
            <label class="form-check-label" for="validCheck">

            </label>
        </div>


        <button  type = "submit" class = "w3-green w3-button" id="updateButton" >Update</button>





    </div>
</div>

