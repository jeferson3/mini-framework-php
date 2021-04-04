<script type="application/javascript" src="<?= $url.'/src/resources/assets/app.js' ?>"></script>
<?php if (isset($_SESSION['flash'])): ?>
    <script type="text/javascript">
        let flash = <?= \App\traits\Flash::load() ?>;
        alert(flash.message);
    </script>
<?php endif; ?>
</body>
</html>

