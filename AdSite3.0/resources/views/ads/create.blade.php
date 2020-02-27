

    <div class="row mt-5">
        <div class="col-sm-8 offset-sm-2">
            <form action="{{route('ads.store')}}" method = "post">
                @csrf
                <div class="form-group">
                    <label for="title">Ad title:</label>
                    <input type="text" name = "title" id = "title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="items">Items:</label>
                    <input type="text" name = "items" id = "items" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="body">Description:</label>
                    <input type="text" name = "body" id = "body" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Price:</label>
                    <input type="text" name = "price" id = "price" class="form-control" required>
                </div>

              <button type = "submit" class = "w3-green w3-button">Submit</button>

            </form>

        </div>
    </div>

