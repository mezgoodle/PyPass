<?php
    require "db.php";

    $data = $_POST;
    if (isset($data['do_signup'])) {
        # register here
        $errors = array();
        if (trim($data['login']) == '') {
            $errors[] = 'Enter name!';
        }
        if ($data['password'] == '') {
            $errors[] = 'Enter password!';
        }
        if ($data['password_2'] != $data['password']) {
            $errors[] = 'Second password is not match!';
        }
        if (R::count('users', "login = ?", array($data['login'])) > 0) {
            $errors[] = 'User with this name has already registered';
        }

        if (empty($errors)) {
            # all is good
            $user = R::dispense('users');
            $user->login = $data['login'];
            $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
            R::store($user);
            echo '<div style="color: green;">You successfully are registered!</div><hr>';
        } else {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
?>

<form action="/signup.php" method="post">
    <p>
        <label for="username">Your name</label>
        <input type="text" name="login" id="username" value="<?php echo @$data['login']; ?>">
    </p>
    <p>
        <label for="password">Your password</label>
        <input type="password" name="password" id="password" value="<?php echo @$data['password']; ?>">
    </p>
    <p>
        <label for="password_2">Your password again</label>
        <input type="password" name="password_2" id="password_2" value="<?php echo @$data['password_2']; ?>">
    </p>
    <p><button type="submit" name="do_signup">Sign up</button></p>
</form>