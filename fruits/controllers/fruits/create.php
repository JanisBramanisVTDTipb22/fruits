<?php
require "Validator.php";
require "Database.php";
$config = require("./config.php");
$db = new Database($config);



//if ($_SERVER["REQUEST_METHOD"] == "POST" && trim($_POST["title"]) != "" && $_POST["category-id"] <= 3 && strlen($_POST["title"]) <= 255) {
    // dd("Pos");
    <?php
    require "Database.php";
    require "Validator.php"; // Make sure to include the Validator class
    
    $config = require "config.php";
    $db = new Database($config);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
    
        if (!Validator::string($_POST["fruit"], 1, 50)) {
            $errors["fruit"] = "Fruit must be between 1 and 50 characters.";
        }
    
        if (!Validator::number($_POST["calories"], 1, 255)) {
            $errors["calories"] = "Too many calories.";
        }
    
        // Check if there are any errors
        if (empty($errors)) {
            $query = "INSERT INTO fruits (title, calories) 
                      VALUES (:title, :calories)";
            $params = [
                ":title" => $_POST["fruit"], // Corrected to $_POST["fruit"] instead of $_POST["title"]
                ":calories" => $_POST["calories"]
            ];
    
            $db->execute($query, $params);
            header("Location: /");
            die(); // Stop further execution
        } else {
            // Handle errors (e.g., display error messages to the user)
            // You can use $errors array to display error messages in your form
        }
    }
    
    // If it's not a POST request or there are validation errors, continue to display the form
    

$title = "Create stuff";
require "views/posts/create.view.php";