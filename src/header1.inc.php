<header>
    <?php
    //session_start();
   session_start();
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
</header>