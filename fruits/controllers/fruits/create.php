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

    if(!Validator::number($_POST["calories"], 1, 255)) {
        $errors["calories"] = "too many calories";
    }
    if (empty($errors)) {


    $query = "INSERT INTO fruits (title, calories) 
              VALUES (:title, :calories;";
              $params = [
                  ":title" => $_POST["title"],
                  ":calories" => $_POST["calories"]
              ];
              $db->execute($query, $params);
              header("Location: /");
              die();
            }
} 

$title = "Create stuff";
require "views/posts/create.view.php";