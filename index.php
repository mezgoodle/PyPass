<?php
require 'db.php';
require_once './templates/header.php';
?>

<?php if (isset($_SESSION['logged_user'])) : ?>
<div class="text-center">
    <h2 class="text-center">Hello, <?php echo $_SESSION['logged_user']->login; ?>!</h2>
    <hr>
    <a class="btn btn-primary btn-lg" href="/logout.php" role="button">Logout</a>
</div>
<?php else : ?>
<div class="container-fluid text-center">
    <a class="btn btn-primary btn-lg" href="/login.php" role="button">Login</a>
    <a class="btn btn-primary btn-lg" href="/signup.php" role="button">Sign up</a>
</div>
<?php 
    endif; 
    require_once './templates/footer.php';
?>