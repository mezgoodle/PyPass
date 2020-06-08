<?php 
    require './db.php';

    $data = $_POST;
    if (isset($data['do_save'])) {
        # save here
        $errors = array();
        if (trim($data['passname']) == '') {
            $errors[] = 'Enter passwords name!';
        }
        if ($data['password'] == '') {
            $errors[] = 'Enter password!';
        }

        if (empty($errors)) {
            # all is good
            $password = R::dispense('passwords');
            $password->name = $data['passname'];
            $password->username = $_SESSION['logged_user']->login;
            $password->password = $data['password'];
            R::store($password);
            echo '<div style="color: green;">Your password has been saved!</div>';
        } else {
            echo '<div style="color: red;">'.array_shift($errors).'</div>';
        }
    }
    if (isset($_SESSION['logged_user'])) {
        $passwords = R::find('passwords', 'username = ?', array($_SESSION['logged_user']->login));
        ?>
<?php require_once './templates/header.php'; ?>
<div class="container-fluid">
    <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search for passwords by name">
    <table class="table" id="myTable">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Password name</th>
        <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
    <?php
        for ($i=1; $i <= count($passwords); $i++) { ?>
        <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td><?php echo $passwords[$i]->name; ?></td>
        <td><?php echo $passwords[$i]->password; ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
</div>
<hr>
<div class="container">
    <form action="/passwords.php" method="post">
        <div class="form-group">
            <label for="passname">Password name</label>
            <input type="text" class="form-control" id="passname" name="passname" value="<?php echo @$data['passname']; ?>">
        </div>
        <div class="form-group">
            <label for="password">Your password</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo @$data['password']; ?>">
        </div>
        <button type="submit" name="do_save" class="btn btn-primary">Save</button>
    </form>
</div>
<div class="container text-center">
    <a class="btn btn-secondary" href="/generator.html" target="_blank" role="button">Password generator</a>
</div>
<script src="./libs/search.js"></script>
<?php require_once './templates/footer.php'; ?>
<?php } else { header('Location: /login.php'); } ?>
