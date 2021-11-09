<!-- h1.text-center(Add category) -->
<h1 class="text-center">Add new category</h1>

<?php showMessage() ?>
<form action="index.php" method="POST">
<div class="form-group">
<label for="name">Name:</label>
<input type="text" name="name" id="name" class="form-control">

</div>
<div class="form-group mt-3">
<label for="description">Name:</label>
<input type="text" name="description" id="description" class="form-control">

</div>
<button class="btn btn-primary mt-3" name="add-category">
    Save
</button>
</form>