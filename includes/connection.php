<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=cms', 'root', 'mysql');
} catch (PDOException $e) {
    exit('Database error.');
}

?>
