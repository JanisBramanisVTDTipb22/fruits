<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>
    <h1> Edit a Fruit </h1>
    <form method="POST">
        <input name="id" value="<?= $post["id"] ?>" type="hidden"/>
        <label>Title:
            <input name="title" value="<?= $post["title"] ?? "" ?>"/>
            <?php if (isset($errors["title"])) { ?>
                <p class="invalid-data"> <?= $errors["title"] ?> </p>
            <?php } ?>
        </label>
        <label>Calories:
        <input name="calories" value="<?= $post["calories"] ?? "" ?>"/>
            <?php if (isset($errors["calories"])) { ?>
                <p class="invalid-data"> <?= $errors["calories"] ?> </p>
            <?php } ?>
        </label>
        <button>Edit</button>
    </form>
<?php
require "views/components/footer.php";  
?>