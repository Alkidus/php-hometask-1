<h1 class="text-center">Edit article</h1>
<?php $article = getArticle($_GET['id']) ?>
<?php showMessage() ?>
<form action="index.php" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $article->name ?>">
    </div>

    <div class="form-group mt-3">
        <label for="category">Category:</label>
        <select name="category" id="category" class="form-control">
            <?php foreach (getCategories() as $category) : ?>
                <option value="<?= $category->id ?>" <?php if ($category->id == $article->category_id) echo 'selected' ?>><?= $category->name ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="text">Text:</label>
        <textarea name="text" id="text" class="form-control"><?= $article->text ?></textarea>
    </div>

    <div><img src="<?= $article->img ?>" alt="" style="width: 100px"></div>

    <div class="form-group mt-3">
        <label for="file">Image:</label>
        <input type="file" name="file" id="file" class="form-control" value="<?= $article->img ?>">
    </div>

    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <button class="btn btn-primary mt-3" name="edit-article">Save</button>
</form>

<script>
    $('#text').summernote();
</script>