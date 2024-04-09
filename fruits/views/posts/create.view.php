<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>

<h1> Create a Fruit </h1>
<form method="POST" action="/">
    <label>Name:
        <input name="title" value="<?= $_POST["title"] ?? "" ?>"/>
        <?php if (isset($errors["title"])) { ?>
            <p class="invalid-data"> <?= $errors["title"] ?> </p>
        <?php } ?>
    </label>
    <br><br>
    <label>Calories:
        <input name="calories" value="<?= $_POST["calories"] ?? "" ?>"/>
        <?php if (isset($errors["calories"])) { ?>
            <p class="invalid-data"> <?= $errors["calories"] ?> </p>
        <?php } ?>
    </label>
    <br><br>
    <button type="submit">Submit</button>
</form>

<?php
require "views/components/footer.php";  
?>
