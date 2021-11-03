<h1 class="text-center">Register</h1>

<?php showMessage() ?>
<form action="index.php?page=register" method="post">

    <div class="form-group mt-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value='<? showEmail() ?>'>
    </div>

    <div class="form-group mt-3">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="text" name="confirmPassword" id="confirmPassword" class="form-control">
    </div>

    <button class="btn btn-primary mt-3" name="newuser">Send</button>
</form>