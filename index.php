<?php require_once './functions/main.php' ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>PHP Project</title>
</head>

<body class="body">
  <?php $url = $_SERVER["REQUEST_URI"]; ?>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark main-nav">
    <div class="container">
      <a class="navbar-brand" href="/">PHP project</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse w-100">
        <ul class="nav navbar-nav w-100">
          <?php CreateMenu($url, $menu) ?>
        </ul>
        <ul class="nav navbar-nav w-100 justify-content-end">
          <li class="nav-item">
            <a <?php IsLogin($url) ?> href="index.php?page=login">Login</a>
          </li>
          <li class="nav-item">
            <a <?php IsRegister($url) ?> href="index.php?page=register">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <!-- Main Content -->
    <?php
    $page = $_GET['page'] ?? 'home';
    if (file_exists('./pages/' . $page . '.php')) {
      include './pages/' . $page . '.php';
    } else {
      echo '<h1>Page not found</h1>';
    }


    ?>
  </main>


  <footer class="bg-dark text-secondary text-center mt-auto py-3">
    <p class="m-0">Copyright &copy; <?= date('Y') ?></p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>