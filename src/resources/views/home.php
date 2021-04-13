<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/head.php" ?>

<div class="container-center">
    <h1>Admin Dashboard</h1>
    <ul>
        <li>
            <a href="<?= route('products') ?>">My products</a>
        </li>
    </ul>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/footer.php" ?>
