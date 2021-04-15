<?php include $_SERVER["DOCUMENT_ROOT"] . "/src/resources/views/layouts/app/head.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/src/resources/components/navbar.php" ?>

<div class="container-center">
    <div style="width: 300px">
        <form action="<?= route('login.post') ?>" method="post">
            <div class="column" style="margin: 10px">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" value="<?= old('email') ?>" required>
            </div>
            <div class="column" style="margin: 10px">
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" required>
            </div>
            <div style="text-align: center; margin: 10px">
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
    <?php \App\traits\Error::get(); ?>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/src/resources/views/layouts/app/footer.php" ?>
