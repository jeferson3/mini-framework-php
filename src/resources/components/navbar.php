<nav class="navbar">
    <ul class="row navbar-ul">
        <li style="margin: 0 10px">
            <a href="<?= $url ?>">Home</a>
        </li>
        <?php if (auth()): ?>
        <div style="margin-left: auto; display: flex">
            <li class="dropdown">
                <a class="dropdown-button" href="#">Profile</a>
                <ul class="navbar-ul dropdown-menu">
                    <li class="dropdown-item">
                        <a class="dropdown-link" href="<?= $url.'/admin/dashboard' ?>">Dashboard</a>
                    </li>
                    <li class="dropdown-item">
                        <a class="dropdown-link" id="logout" href="#">LogOut</a>
                        <form style="display: none" id="formLogOut" action="<?= '/auth/logout' ?>" method="post"></form>
                    </li>
                </ul>
            </li>
        </div>
        <?php else: ?>
        <div style="margin-left: auto; display: flex">
            <li>
                <a href="<?= $url.'/auth/login' ?>">Login</a>
            </li>
            <li style="margin: 0 10px">
                <a href="<?= $url.'/auth/register' ?>">Register</a>
            </li>
        </div>
        <?php endif ?>
    </ul>
</nav>