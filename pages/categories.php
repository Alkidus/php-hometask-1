<h1 class='text-center'>Categories</h1>
<!-- a.btn-primary -->
<a href="index.php?page=add-category" class="btn btn-primary">Create new category</a>
<?php
// $stmt = $pdo->query('SELECT * FROM categories');
// $result = $stmt->fetchAll(PDO::FETCH_OBJ);
// $result = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
// $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
// dump($result);

$categories = getCategories();
//dump($categories);
?>
<!-- table.table>(thead>tr>th*4)+tbody>tr>td*4 -->
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?= $category->id ?></td>
                <td><?= $category->name ?></td>
                <td><?= $category->description ?></td>
                <td>
                    <div class="d-flex justify-contend-end">

                        <a href="index.php?page=edit-category&id=<?= $category->id ?>" class="btn btn-warning me-2">Edit</a>

                        <form action="index.php" method="post">
                            <input type="hidden" name="id" value="<?= $category->id ?>">
                            <button class="btn btn-danger" name="delete-category">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>