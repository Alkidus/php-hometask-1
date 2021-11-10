<h1 class="text-center">Edit category</h1>
<?php $category = getCategory($_GET['id']) ?>

<?php showMessage() ?>
<form action="index.php" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $category->name ?>">

    </div>
    <div class="form-group mt-3">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" class="form-control" value="<?= $category->description ?>">

    </div>
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <button class="btn btn-primary mt-3" name="edit-category">Save</button>
</form>