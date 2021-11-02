<h1 class="text-center">Contact Us</h1>

<?php showMessage() ?>
<form action="index.php?page=contacts" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="message">Your message:</label>
        <textarea name="message" id="message" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary mt-3" name="manager">Send</button>
</form>