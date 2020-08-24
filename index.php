
<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>CMS</title>
</head>

<body>
    <div class="container">
        <h4>WEBSITE PREVIEW</h4>

        <ol>
            <?php
            foreach ($articles as $article) {
            ?>
            <li><a href="article.php?id=<?php echo $article['article_id'];?>"><?php echo $article['article_title'];?></a>- 
            <small><?php echo date('l jS', $article['article_timestamp'])?></small></li>
            <?php } ?>
        </ol>

        <br>
        <h3><a href="admin">Admin Panel</a></h3>
    </div>

</body>

</html>