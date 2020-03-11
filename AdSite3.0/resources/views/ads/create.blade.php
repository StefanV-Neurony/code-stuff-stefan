<!-- Starting of ajax contact form -->
<div class="container">
    <h2>Create Advertisement</h2>
</div>
<form id="createForm" method="post">

    <!-- Starting of successful form message -->
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your advertisement was created successfully
            </div>
        </div>
    </div>
    <!-- Ending of successful form message -->

    <!-- Element of the ajax contact form -->
    <div class="row">
        <div class="col-md-6 form-group">
            <label for="title"></label><input name="title" type="text" id="title" class="form-control" placeholder="Title" >
        </div>
        <div class="col-md-6 form-group">
            <label for="name"></label><input name="name" type="text" id="name" class="form-control" placeholder="Items" >
        </div>
        <div class="col-md-6 form-group">
            <label for="price"></label><input name="price" id="price" type="text" class="form-control" placeholder="Price" >
        </div>
        <div class="col-12 form-group">
            <label for="body"></label><input name="body" class="form-control" id="body" rows="3" placeholder="Description" >
        </div>
        <div class="col-12 form-group">
            <label>Would you like to make this Ad available?</label>
            <p><label for="publishAd"></label><input type="checkbox" id="publishAd" value=""></p></div>
        <div class="col-12">
            <label for="saveButton"></label><button name="create" id="saveButton" class="btn btn-success" value="Create Advertisement"></button>
        </div>
    </div>
</form>
