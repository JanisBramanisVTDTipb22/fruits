<?php
require "Validator.php";
require "Database.php";
$config = require("./config.php");
$db = new Database($config);



//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
    // dd("Pos");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    if(!Validator::string($_POST["title"], 1, 255)) {
        $errors["title"] = "no title or too long";
    }

    if(!Validator::number($_POST["calories"], 1,  100)) {
        $errors["calories"] = "Too many or too little calories";
    }
    if (empty($errors)) {
    $query =    "UPDATE fruits
                SET title = :title, calories = :calories
                WHERE id = :id";

              $params = [
                  ":title" => $_POST["title"],
                  ":calories" => $_POST["calories"],
                  ":id" => $_POST["id"],
              ];
              $db->execute($query, $params);
              header("Location: /");
              die();
            }
} 
 
$query = "SELECT * FROM fruits WHERE id = :id";
$params = [":id" => $_GET["id"]];
$post = $db->execute($query, $params)->fetch();
$title = "Create a Post";
require "views/posts/edit.view.php";