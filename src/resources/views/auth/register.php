<?php include $_SERVER["DOCUMENT_ROOT"] . "/src/resources/views/layouts/app/head.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/src/resources/components/navbar.php" ?>

<div class="container-center">
    <div style="width: 500px">
        <form action="<?= route('register.post') ?>" method="post">
            <div class="column">
                <label for="name" class="required">Nome: </label>
                <input type="text" name="name" id="name" required value="<?= old('name')?>">
            </div>
            <div class="column">
                <label for="email" class="required">Email: </label>
                <input type="email" name="email" id="email" required value="<?= old('email')?>">
            </div>
            <div class="row">
                <div class="column">
                    <label for="password" class="required">Senha: </label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="column">
                    <label for="repeat-password" class="required">Repetir senha: </label>
                    <input type="password" name="repeat-password" id="repeat-password" required>
                </div>
            </div>
            <div class="row align-center justify-start" style="margin: 10px">
                <input type="checkbox" name="terms" id="terms" required>
                <label for="terms">Accept <a href="#">terms</a> and <a href="#">conditions</a></label>
            </div>
            <div style="text-align: center; margin: 30px 0">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    <?php \App\traits\Error::get(); ?>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/src/resources/views/layouts/app/footer.php" ?>
