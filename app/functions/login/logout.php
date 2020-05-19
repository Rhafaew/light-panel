<?php

if (isset($_GET['logout']) and isset($_SESSION['nick'])):

    unset($_SESSION['nick']);
    header("Location: " . LinkLogin);
    exit;
endif;
