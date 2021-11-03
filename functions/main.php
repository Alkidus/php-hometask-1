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
