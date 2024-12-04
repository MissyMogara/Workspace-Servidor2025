<header>

    <?php
    if (isset($_SESSION["admin-user"])) {
        echo '
        <h1>Dashboard</h1>
        <nav>
            <ul>
            <li><a href="index.php?action=logout">Logout</a></li>
            </ul>
        </nav>
        ';
    } else {
        echo '<h1>
        Noticias ChatGPT
    </h1>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?action=loginAdmin">Logging Admin</a>
        </ul>
    </nav>';
    }
    ?>
</header>