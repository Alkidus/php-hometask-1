<h1 class="text-center">Login</h1>

<?php showMessage() ?>
<form action="index.php?page=login" method="post">

    <div class="form-group mt-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password" class="form-control">
    </div>

    <button class="btn btn-primary mt-3" name="user">Send</button>
</form>