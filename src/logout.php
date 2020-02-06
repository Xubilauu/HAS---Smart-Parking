<?php
    session_start();
    $_SESSION["logado"] != 0;
    session_destroy();
    header("Location: index.php");
?>