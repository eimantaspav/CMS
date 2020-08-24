<?php
session_start();
include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css" />
        <title>CMS</title>
    </head>

    <body>
        <div class="container">
            <h4>ADMIN CONTROL PANEL</h4>



            <ol>
                <li><a href="add.php">Add Article</a></li>
                <li><a href="delete.php">Delete Article</a></li>
                <li><a href="logout.php">Logout</a></li>

            </ol>
            <a href="../index.php">&larr; View Website</a>
        </div>

    </body>

    </html>
<?php



} else {
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        if (empty($username) or empty($password)) {
            $error = 'All field are required';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");
            $query->bindValue(1, $username);
            $query->bindValue(2, $password);
            $query->execute();

            $num = $query->rowCount();
            if ($num == 1) {

                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                $error = 'Incorrect details';
            }
        }
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css" />
        <title>CMS</title>
    </head>

    <body>
        <div class="container">

            <?php if (isset($error)) { ?>
                <small style="color: #aa0000;"> <?php echo $error; ?></small>

            <?php } ?>
            <br>
            <br>
            <form action="index.php" method="post" autocomplete="off">
                <input type="text" name="username" placeholder="username">
                <input type="password" name="password" placeholder="password">
                <input type="submit" value="Login">


            </form>
            
            <h4>Username: admin Password: password</h4>

            <a href="../index.php">&larr; View Website</a>

        </div>

    </body>

    </html>
<?php
}
?>