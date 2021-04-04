<script type="text/javascript" src="<?= $url.'/src/resources/assets/app.js' ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js"></script>
<?php if (isset($_SESSION['flash'])): ?>
    <script type="text/javascript">
        let flash = <?php \App\traits\Flash::load() ?>;
        alert(flash.message);
    </script>
<?php endif; ?>
<script type="text/javascript">
    let price = $('input#price');
    if(price != null)
    {
        price.maskMoney({thousands: ".", decimal: ","});
    }
</script>
<script type="text/javascript">
    function confirmDeleteProduct(id) {
        let op = confirm("Deseja excluir este item?");

        if (op)
        {
            document.querySelector(`form#${id}`).submit();
        }
    }
</script>
</body>
</html>