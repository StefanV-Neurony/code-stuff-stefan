
<div class="row mt-5">
    <div class="col-sm-8 offset-sm-2">

        <div class="form-group">
            <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}"></div>
        <div class="form-group">
            <label for="title">Ad title:</label>
            <input type="text" class="form-control"  name = "title" class="form-control" value="" required >
        </div>
        <div class="form-group">
            <label for="items">Items:</label>
            <input type="text" class="form-control"  name = "items" class="form-control" value="" required >
        </div>
        <div class="form-group">
            <label for="body">Description:</label>
            <input type="text" class="form-control"  name = "body" class="form-control" value="" required >
        </div>
        <div class="form-group">
            <label for="">Price:</label>
            <input type="text" class="form-control"  name = "price" class="form-control" value="" required >
        </div>


        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="validCheck">
            <label class="form-check-label" for="validCheck">

            </label>
        </div>


        <button  type = "submit" class = "w3-green w3-button" id="updateButton" >Update</button>





    </div>
</div>

