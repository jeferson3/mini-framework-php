<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/head.php" ?>

<div style="padding-top: 50px; margin: 0 10px">
    <div class="column">
        <h1>Products</h1>
        <a href="<?= route('products.create') ?>">New</a>
        <div class="row">
            <table border="1" align="center" width="100%">
                <thead>
                    <tr style="background-color: darkblue; color: white; font-weight: bold">
                        <td align="center" width="5%">COD</td>
                        <td align="center" width="35%">Nome</td>
                        <td align="center" width="40%">Descrição</td>
                        <td align="center" width="10%">Preço</td>
                        <td align="center" width="10%"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product):?>
                        <tr>
                            <td align="center"><?= $product->id ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= substr($product->description, 0, 50).'...' ?></td>
                            <td><?= "R$".number_format($product->price, 2, ",",".") ?></td>
                            <td align="center">
                                <form style="display: none" id="product<?= $product->id ?>"
                                      action="<?= $url.'/admin/products/'.$product->id.'/delete'; ?>" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" style="background-color: darkred; color: white; cursor:pointer; width: 80px">
                                        Delete
                                    </button>
                                </form>
                                <button type="button" onclick="confirmDeleteProduct('product<?= $product->id ?>')"
                                        style="background-color: darkred; color: white; cursor:pointer; width: 80px">
                                    Delete
                                </button>
                                <button  style="width: 80px; background-color: darkcyan; color: white; cursor:pointer;" type="button" onclick="window.location.href = '<?= route('products.show',$product->id) ?>'">
                                    View
                                </button>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"]."/src/resources/views/layouts/admin/footer.php" ?>
