<h1 class="text-center">Add article</h1>

<?php showMessage() ?>
<form action="index.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="category">Category:</label>
        <select name="category" id="category" class="form-control">
            <option value="0">Select Category</option>
            <?php foreach (getCategories() as $category) : ?>
                <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="text">Text:</label>
        <textarea name="text" id="text" class="form-control"></textarea>
    </div>

    <div class="form-group mt-3">
        <label for="file">Image:</label>
        <input type="file" name="file" id="file" class="form-control">
    </div>

    <button class="btn btn-primary mt-3" name="add-article">Save</button>
</form>

<script>
    $('#text').summernote();
</script>