<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/head.php" ?>
<?php
//dd($_SESSION['old_value'])
?>
<div style="padding-top: 50px; margin: 0 10px">

    <h1>Products</h1>
    <a href="<?= route('products.index') ?>">List</a>
    <div class="column" style="width: 500px; margin: 0 auto">

        <form action="<?= route('products.store') ?>" method="post" enctype="multipart/form-data">
            <div class="column">
                <label for="nome" class="required">Nome:</label>
                <input type="text" name="name" id="nome" value="<?= old('name') ?>" required>
            </div>
            <div class="column" style="margin: 20px 0">
                <label for="price" class="required">Preço:</label>
                <input type="text" name="price" id="price" value="<?= old('price') ?>" required>
            </div>
            <div class="column">
                <label for="description" class="required">Descrição:</label>
                <textarea name="description" id="description" rows="5" required><?= old('description') ?></textarea>
            </div>
            <div style="margin: 10px; text-align: right">
                <button type="submit">Save</button>
            </div>
        </form>
        <?php \App\traits\Error::get(); ?>
    </div>
</div>


<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/footer.php" ?>
