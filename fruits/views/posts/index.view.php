<?php 
require "views/components/head.php";
require "views/components/navbar.php";
?>

<h1> Fruits </h1>
<ul>
    <?php foreach ($posts as $post) { ?>
        <li>
            <a href="/show?id=<?= $post["id"] ?>"> <?= htmlspecialchars($post["title"])?> </a>
            (<?= $post["calories"] ?> calories)
            <form class="deleteform" method="POST" action="/delete">
                <input type="hidden" name="calories" value="<?= $post["calories"] ?>">
                <input type="hidden" name="id" value="<?= $post["id"] ?>">
                <button class="test" name="delete" type="submit">Delete</button>
            </form>
        </li>
    <?php } ?>
</ul>

<?php 
require "views/components/footer.php";
?>
