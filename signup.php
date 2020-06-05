<?php
    require "db.php";
?>

<form action="/signup.php" method="post">
    <p>
        <label for="username">Your name</label>
        <input type="text" name="login" id="username">
    </p>
    <p>
        <label for="password">Your password</label>
        <input type="password" name="password" id="password">
    </p>
    <p>
        <label for="password_2">Your password again</label>
        <input type="password" name="password_2" id="password_2">
    </p>
    <p><button type="submit">Sign up</button></p>
</form>