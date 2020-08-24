<?php
session_start();

include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
        $query->bindValue(1, $id);
        $query->execute();

        header('Location: delete.php');
    }
    $articles = $article->fetch_all();
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
           <h4>DELETE AN ARTICLE</h4>

           <p>The selected article will be instantly deleted.</p>


            <form action="delete.php" method="get">
                <select onchange="this.form.submit();" name="id">
                <option>DELETE ARTICLE </option>
                    <?php foreach ($articles as $article) { ?>
                        <option value="<?php echo $article['article_id']; ?>">
                        <?php echo $article['article_title']; ?></option>
                    <?php } ?>

                </select>
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