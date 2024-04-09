<?php

require "Database.php";
$config = require "config.php";

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $params = [];
    if($id == "all")
    {
        $query = "SELECT * FROM fruits";
    }else if(is_numeric($id))
    {
        $id = $_GET["id"];
        $query = "SELECT * FROM fruits WHERE id=:id";
        $params = [":id" => $id];
    }else if($id != "meow")
    {
        if($id == "")
        {
            $query = "SELECT * FROM fruits"; 
        }else
        {
            echo "Not found " . $id;
            $query = "SELECT * FROM fruits"; 
        }
    }else
    {
        $query = "SELECT * FROM fruits"; 
    }
}

if(isset($_GET["category_name"]))
{
    if($_GET["category_name"] == "show_all" || $_GET["category_name"] == ""){
        $categories = $_GET["categroy_name"];
        $params = [];
        $query = "SELECT * FROM posts";
    }else{
        $categories = $_GET["cat_name"];
        $params = [];
        $query = "SELECT * FROM posts WHERE category_id = :category_name";
        $params = [":category_name" => $categories];
    }
};


if(isset($query) || isset($params) ){
    $db = new DataBase($config);
    $posts = $db->execute($query, $params)->fetchALL();
}else{
    $query = "SELECT * FROM fruits"; 
    $params = [];
    $db = new DataBase($config);
    $posts = $db->execute($query, $params)->fetchALL();
}


$title = "NO!";
require "views/posts/index.view.php";
?>  