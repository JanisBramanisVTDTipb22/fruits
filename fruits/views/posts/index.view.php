<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>

    <h1> Fruits </h1>
    <ul>
        <?php foreach ($posts as $post) { ?>
            <li>
            <a href="/show?id=<?= $post["id"] ?>"> <?= htmlspecialchars($post["title"])?> 
            <form class="deleteform" method="POST" action="/delete">
            <button class="test" name="id" value="<?= $post["id"] ?>">Delete</button>
            </form>
            </li>
        <?php } ?>

    </ul>
<?php 
require "views/components/footer.php";
?>