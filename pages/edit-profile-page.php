<?php

    declare(strict_types = 1);

    session_start();

    require_once('../templates/edit-profile-page.tpl.php');

    drawHeader(); 
    drawEditForm();
?> 