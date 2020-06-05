<?php
require 'db.php';
?>

<?php if (isset($_SESSION['logged_user'])) : ?>
    logged!
    <hr>
    <a href="/logout.php">Logout</a>
<?php else : ?>
    <a href="/login.php">Login</a><br>
    <a href="/signup.php">Sign up</a>
<?php endif; ?>