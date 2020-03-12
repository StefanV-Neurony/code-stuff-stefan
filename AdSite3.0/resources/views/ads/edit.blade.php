<!-- Starting of ajax contact form -->
<div class="container">
    <h2>Edit Advertisement</h2>
</div>
<form class="editForm" method="POST">
    <!-- Starting of successful form message -->
    <div class="row">
        <div class="col-12">

            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                Your advertisement was  edited successfully
            </div>
        </div>
    </div>
    <!-- Ending of successful form message -->

    <!-- Element of the ajax contact form -->
    <div class="row">
        <div class="col-md-6 form-group">
            <input  name="title" type="text" id="editTitle" class="form-control" placeholder="Title" >
        </div>
        <div class="col-md-6 form-group">
            <input name="name" type="text" id="editName" class="form-control" placeholder="Items" >
        </div>
        <div class="col-md-6 form-group">
            <input name="price" id="editPrice" type="text" class="form-control" placeholder="Price" >
        </div>
        <div class="col-12 form-group">
            <input  name="body" class="form-control" id="editBody" type="text" placeholder="Description">
        </div>
        <div class="col-12 form-group">
            <label>Would you like to make this Ad available?</label>
            <p><input type="checkbox" id="editedPublish" value=""></p></div>
        <div class="col-12">
            <button name="update" id="updateButton" class="btn btn-success">Edit Advertisement</button>
        </div>
    </div>
</form>
