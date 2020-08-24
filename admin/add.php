<?php
session_start();

include_once('../includes/connection.php');

if (isset($_SESSION['logged_in'])) {
    if (isset($_POST['title'], $_POST['content'])) {
        $title = $_POST['title'];
        $content = nl2br($_POST['content']);
        if (empty($title) or empty($content)) {
            $error = 'All fields are required!';
        } else {
            $query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES (?, ?, ?)');
            $query->bindValue(1, $title);
            $query->bindValue(2, $content);
            $query->bindValue(3, time());

            $query->execute();
            header('Location: index.php');
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

            <h4>CREATE A NEW ARTICLE</h4>
            <?php if (isset($error)) { ?>
                <small style="color: #aa0000;"> <?php echo $error; ?></small>

            <?php } ?>
            <br>
            <br>
            <form action="add.php" method="post" autocomplete="off">
                <input type="text" name="title" placeholder="Title"><br><br>
                <textarea name="content" placeholder="Content" cols="50" rows="15"></textarea><br><br>
                <input type="submit" value="Add Article">
            </form>
            <br>
            <a href="index.php">&larr; Back</a>

        </div>

    </body>

    </html>



<?php
} else {
    header('Location: index.php');
}
?>