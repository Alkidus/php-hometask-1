<h1 class='text-center'>Articles</h1>
<p>hello</p>
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
<!-- table.table>(thead>tr>th*4)+tbody>tr>td*4 -->
<table class="table">
    <thead>
        <tr>
            <th>id</th>
            <th>Img</th>
            <th>Name</th>
            <th>Text</th>
            <th>Data</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td><img src="<?= $article->img ?>" alt="" style="width: 100px"</td>
            <td><?= $article->name ?></td>
            <td><?= $article->text ?></td>
            <td><?= $article->creates_at ?></td>
            <td>
            <div class="d-flex justify-contend-end">

            <a href="index.php?page=edit-articles&id=<?= $article->id ?>" class="btn btn-warning me-2">Edit</a>

            <form action="index.php" method="post">
            <input type="hidden" name="id" value="<?= $article->id ?>">
            <button class="btn btn-danger" name="delete-articles">Delete</button>
            </form>
            </div>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>



