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
            echo '<div style="color: green;">You successfully are registered!</div>';
        } else {
            echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }
    }
?>
<?php require_once './templates/header.php'; ?>
<div class="container">
    <form action="/signup.php" method="post">
        <div class="form-group">
            <label for="username">Your name</label>
            <input type="text" class="form-control" id="username" name="login" value="<?php echo @$data['login']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Your password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo @$data['password']; ?>">
        </div>
        <div class="form-group">
            <label for="password_2">Your password again</label>
            <input type="password" class="form-control" id="password_2" name="password_2" value="<?php echo @$data['password_2']; ?>">
        </div>
        <button type="submit" name="do_signup" class="btn btn-primary">Sign up</button>
    </form>
</div>  
<?php require_once './templates/footer.php'; ?>
