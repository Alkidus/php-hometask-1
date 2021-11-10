<h1 class='text-center'>Articles</h1>
<!-- a.btn-primary -->
<a href="index.php?page=add-articles" class="btn btn-primary">New artecles</a>
<?php
// $stmt = $pdo->query('SELECT * FROM categories');
// $result = $stmt->fetchAll(PDO::FETCH_OBJ);
// $result = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
// $result = $stmt->fetchAll(PDO::FETCH_COLUMN);
// dump($result);

$articles = getArticles();
//dump($categories);
?>
<?php showMessage() ?>
<!-- table.table>(thead>tr>th*4)+tbody>tr>td*4 -->
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Img</th>
            <th>Name</th>
            <th>Category</th>
            <th>Text</th>
            <th>Data</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td><?= $article->id ?></td>
                <td><img src="<?= $article->img ?>" alt="" style="width: 100px"></td>
                <td><?= $article->name ?></td>
                <td><?= getCategory($article->category_id)->name ?></td>

                <td><?= html_entity_decode($article->text) ?></td>
                <td><?= date('d.m.Y', strtotime($article->created_at)) ?></td>
                <td>
                    <div class="d-flex justify-content-end">
                        <a href="index.php?page=edit-article&id=<?= $article->id ?>" class="btn btn-warning me-2">Edit</a>

                        <form action="index.php" method="post">
                            <input type="hidden" name="id" value="<?= $article->id ?>">
                            <button class="btn btn-danger" name="delete-article">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>