<?php
require "Database.php";
$config = require "config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"] ?? "";
    $calories = $_POST["calories"] ?? "";

    $query = "INSERT INTO fruits (title, calories) VALUES (:title, :calories)";
    $params = [":title" => $title, ":calories" => $calories];

    $db = new Database($config);
    $db->execute($query, $params);
    header("Location: /");
}

$query = "SELECT * FROM fruits"; 
$params = [];
$db = new Database($config);
$posts = $db->execute($query, $params)->fetchAll();

$title = "Fruits";
require "views/posts/index.view.php";
?>