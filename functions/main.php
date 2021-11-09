<?php
session_start();
$page = $_GET['page'] ?? 'home';

require_once './functions/forms.php';
require_once './routes.php';
require_once './functions/db.php';

function clearString($str)
{
    return trim(htmlentities($str));
}

function dump($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function redirect($page)
{
    header('Location: index.php?page=' . $page);
    die();
}

function setMessage($text, $type = 'success')
{
    $_SESSION['flash'] = compact('text', 'type');
}

function showMessage()
{
    if (isset($_SESSION['flash'])) {
        extract($_SESSION['flash']);
        echo "<div class='alert alert-$type'>$text</div>";
        unset($_SESSION['flash']);
    }
}
// function IsLogin($URL)
// {
//     $isActive = 'class="nav-link active aria-current=\"page\""';
//     if ($URL == '/index.php?page=login') echo $isActive;
//     else echo 'class="nav-link"';
// }
// function IsRegister($URL)
// {
//     $isActive = 'class="nav-link active aria-current=\"page\""';
//     if ($URL == '/index.php?page=register') echo $isActive;
//     else echo 'class="nav-link"';
// }

function CreateMenu($URL, $Array)
{
    foreach ($Array as $key => $value) {
        if ($URL == '/index.php?page=' . $value && $value != '/')
            echo '<li class="nav-item"><a class="nav-link active aria-current=\"page\"" href=index.php?page=' . $value . '>' . $key . '</a></li>';
        elseif ($URL != '/index.php?page=' . $value && $value != '/')
            echo '<li class="nav-item"><a class="nav-link" href=index.php?page=' . $value . '>' . $key . '</a></li>';
        elseif ($URL == '/' && $value == '/')
            echo '<li class="nav-item"><a class="nav-link active aria-current=\"page\"" href=' . $value . '>' . $key . '</a></li>';
        else echo '<li class="nav-item"><a class="nav-link" href=' . $value . '>' . $key . '</a></li>';
    }
}

function GetEmailLogin($email)
{
    $_SESSION['login'] = $email;
}

function LogOut()
{
    $_SESSION['login'] = array();
    session_destroy();
}

function SetEmailToNavbar()
{
    if (isset($_SESSION['login'])) {
        echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ' . $_SESSION['login'] . '
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="?is_exit=1">Logout</a></li>
          </ul>
        </li>';
        if (isset($_GET["is_exit"])) {
            if ($_GET["is_exit"] == 1) {
                LogOut();
                redirect('home');
            }
        }
    } else
        echo '<li class="nav-item">
            <a class="nav-link" href="index.php?page=login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=register">Register</a>
          </li>';
}

function setEmail($email)
{
    $_SESSION['email'] = $email;
}
function showEmail()
{
    if (isset($_SESSION['email'])) {
        echo $_SESSION['email'];
        unset($_SESSION['flash']);
    } else
        echo '';
}

function getCategories(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM categories');
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

if(isset($_POST['add-category'])){
    $name = clearString($_POST['name'] ?? null);
    $description = clearString($_POST['description'] ?? null);
    if(empty($name)){
        setMessage('Name is required', 'danger');
        redirect('add-category');
    }
    //$pdo->query('INSERT INTO categories(name, description) VALUES("'.$name.'", "'.$description.'")');
    $stmt = $pdo->prepare('INSERT INTO categories(name, description) VALUES(?, ?)');
    $stmt->execute([$name, $description]);
    redirect('categories');
}

if(isset($_POST['delete-category'])){
    $id = $_POST['id'];
    // $pdo->query('DELETE FROM categories WHERE id=' . $id);
    $stmt = $pdo->prepare('DELETE FROM categories WHERE id=?');
    $stmt->execute([$id]);
    redirect('categories');
}

function getCategory($id){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM categories WHERE id=?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

if(isset($_POST['edit-category'])){
    $name = clearString($_POST['name'] ?? null);
    $description = clearString($_POST['description'] ?? null);
    $id = clearString($_POST['id'] ?? null);
    if(empty($name)){
        setMessage('Name is required', 'danger');
        redirect('edit-category');
    }
    $stmt = $pdo->prepare('UPDATE categories SET name=:n, description=:d WHERE id=:id');
    $stmt->execute([
        'id'=>$id,
        'n'=>$name,
        'd'=>$description
    ]);
    redirect('categories');

}

function getArticles(){
    global $pdo;
    $stmt = $pdo->query('SELECT * FROM articles');
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

if(isset($_POST['add-article'])){
    $file = $_FILES['file'];
    //dump($file);
    move_uploaded_file($file['tmp_name'], 'uploads/'.$file['name']);
}

// Array
// (
//     [name] => 2021-09-26 (3).png
//     [type] => image/png
//     [tmp_name] => C:\OpenServer\userdata\temp\upload\php2746.tmp
//     [error] => 0
//     [size] => 198110
// )


// $p = mysqli_connect();
// $result = mysqli_query($p, 'SELECT * FROM categories');

// $p =  new mysqli();
// $result = $p -> query($p, 'SELECT * FROM categories');

// $p = new PDO('mysql:');
// $result = $p -> query($p, 'SELECT * FROM categories');