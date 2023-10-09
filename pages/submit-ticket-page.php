<?php

    declare(strict_types = 1);

    session_start();

    require_once('../templates/submit-ticket-page.tpl.php');

    drawHeader(); 
    drawSubmitForm(); 
?> 