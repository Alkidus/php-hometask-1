<?php
session_start();
$page = $_GET['page'] ?? 'home';

require_once './functions/forms.php';
require_once './routes.php';

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
function IsLogin($URL)
{
    $isActive = 'class="nav-link active aria-current=\"page\""';
    if ($URL == '/index.php?page=login') echo $isActive;
    else echo 'class="nav-link"';
}
function IsRegister($URL)
{
    $isActive = 'class="nav-link active aria-current=\"page\""';
    if ($URL == '/index.php?page=register') echo $isActive;
    else echo 'class="nav-link"';
}

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
