<?php
require "Validator.php";
require "Database.php";
$config = require "./config.php";
$db = new Database($config);

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate title
    if (!Validator::string($_POST["title"], 1, 50)) {
        $errors["title"] = "Invalid title or too long";
    }

    // Validate calories
    if (!Validator::number($_POST["calories"], 1, 100)) {
        $errors["calories"] = "Invalid number of calories";
    }

    // If there are no validation errors, proceed with the update
    if (empty($errors)) {
        $query = "UPDATE fruits
                  SET title = :title, calories = :calories
                  WHERE id = :id";

        $params = [
            ":title" => $_POST["title"],
            ":calories" => $_POST["calories"],
            ":id" => $_POST["id"],
        ];

        $db->execute($query, $params);

        // Redirect to the index page after successful update
        header("Location: /");
        exit; // Stop further execution
    }
}

// If the request method is GET, fetch the fruit data for editing
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $query = "SELECT * FROM fruits WHERE id = :id";
    $params = [":id" => $_GET["id"]];
    $post = $db->execute($query, $params)->fetch();
    $title = "Edit Fruit";
    require "views/posts/edit.view.php";
} else {
    // Redirect to the index page if no fruit ID is provided or if the request method is not GET
    header("Location: /");
    exit; // Stop further execution
}
?>
<ul>
    <?php foreach ($posts as $post) { ?>
        <li>
            <a href="edit.php?id=<?= $post["id"] ?>"> <?= htmlspecialchars($post["title"])?> </a>
            (<?= $post["calories"] ?> calories)
            <form class="deleteform" method="POST" action="/">
                <button class="test" name="id" value="<?= $post["id"] ?>">Delete</button>
            </form>
        </li>
    <?php } ?>
</ul>

