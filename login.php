<?php
    require "db.php";

    $data = $_POST;
    if (isset($data['do_login'])) {
        $errors = array();
        $user = R::findOne('users', 'login = ?', array($data['login']));
        if ($user) {
            # user find
            if (password_verify($data['password'], $user->password)) {
                # login
                 $_SESSION['logged_user'] = $user->login;
                 echo '<div style="color: green;">You are successfully logged in!</div><hr>';
            } else {
                $errors[] = 'Password is incorrect';
            }
        } else {
            $errors[] = 'User with this name is not found';
        }
        if (!empty($errors)) {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<form action="/login.php" method="post">
    <p>
        <label for="username">Your name</label>
        <input type="text" name="login" id="username" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
        <label for="password">Your password</label>
        <input type="password" name="password" id="password" value="<?php echo @$data['password']; ?>">
    </p>
    <p><button type="submit" name="do_login">Login</button></p>
</form>