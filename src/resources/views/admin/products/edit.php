<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/head.php" ?>

<div style="padding-top: 50px; margin: 0 10px">

    <h1>Products</h1>
    <a href="<?= route('products') ?>">List</a>

    <div class="column" style="width: 500px; margin: 0 auto">
        <form action="<?= route('products.update', $product->id) ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="update">
            <div class="column">
                <label for="nome" class="required">Nome:</label>
                <input type="text" name="name" id="nome" value="<?= isset($_SESSION['old_value']['name']) ? old('name') :
                    $product->name ?>" required>
            </div>
            <div class="column" style="margin: 20px 0">
                <label for="price" class="required">Preço:</label>
                <input type="text" name="price" id="price"
                       value="<?= isset($_SESSION['old_value']['price']) ? old('price') :
                           number_format($product->price, 2, ',','.') ?>" required>
            </div>
            <div class="column">
                <label for="description" class="required">Descrição:</label>
                <textarea name="description" id="description" rows="5" required><?= isset($_SESSION['old_value']['description']) ?
                        old('description') : $product->description ?></textarea>
            </div>
            <div style="margin: 10px; text-align: right">
                <button type="submit">Save</button>
            </div>
        </form>
        <?= \App\traits\Error::get() ?>
    </div>
</div>


<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/footer.php" ?>
