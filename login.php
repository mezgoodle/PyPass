<?php
    require 'db.php';

    $data = $_POST;
    if (isset($data['do_login'])) {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if ($user) {
            # user find
            if (password_verify($data['password'], $user->password)) {
                # login
                $_SESSION['logged_user'] = $user;
                header('Location: /passwords.php');
            } else {
                $errors[] = 'Password is incorrect';
            }
        } else {
            $errors[] = 'User with this name is not found';
        }
        if (!empty($errors)) {
            echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }
    }
?>

<?php require_once './templates/header.php'; ?>
<div class="container">
    <form action="/login.php" method="post">
        <div class="form-group">
            <label for="username">Your name</label>
            <input type="text" class="form-control" id="username" name="login" value="<?php echo @$data['login']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Your password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo @$data['password']; ?>">
        </div>
        <button type="submit" name="do_login" class="btn btn-primary">Sign up</button>
    </form>
</div>
<?php require_once './templates/footer.php'; ?>
