<?php
require 'db.php';
?>

<?php if (isset($_SESSION['logged_user'])) : ?>
    logged!<br>
    Hello, <?php echo $_SESSION['logged_user']->login; ?>
    <hr>
    <a href="/logout.php">Logout</a>
<?php else : ?>
    <a href="/login.php">Login</a><br>
    <a href="/signup.php">Sign up</a>
<?php endif; ?>