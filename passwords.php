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
            echo '<div style="color: green;">Your password has been saved!</div><hr>';
        } else {
            echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
        }
    }
    if (isset($_SESSION['logged_user'])) {
        $passwords = R::find('passwords', 'username = ?', array($_SESSION['logged_user']->login));
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="myTable">
  <tr class="header">
    <th style="width:60%;">Password name</th>
    <th style="width:40%;">Password</th>
  </tr>
  <?php 
    foreach ($passwords as $password) { ?>
        <td><?php echo $password->name; ?></td>
      <td><?php echo $password->password; ?></td>
    <?php } ?>
</table>
<form action="/passwords.php" method="post">
    <p>
        <label for="passname">Password name</label>
        <input type="text" name="passname" id="passname" value="<?php echo @$data['passname']; ?>">
    </p>
    <p>
        <label for="password">Your password</label>
        <input type="password" name="password" id="password" value="<?php echo @$data['password']; ?>">
    </p>
    <p><button type="submit" name="do_save">Save</button></p>
</form>
</body>
</html>
<?php } else { header('Location: /login.php'); } ?>
<script src="./libs/search.js"></script>