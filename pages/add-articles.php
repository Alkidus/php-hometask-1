<!-- h1.text-center(Add category) -->
<h1 class="text-center">Add new article</h1>

<?php showMessage() ?>
<form action="index.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" name="name" id="name" class="form-control">

</div>
<div class="form-group mt-3">
<label for="description">Text:</label>
<input type="text" name="text" id="text" class="form-control">

</div>

</div>
<div class="form-group mt-3">
<label for="file">Image:</label>
<input type="file" name="file" id="file" class="form-control">

</div>
<button class="btn btn-primary mt-3" name="add-article">
    Save
</button>
</form>