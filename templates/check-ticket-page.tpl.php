<?php declare(strict_types = 1); ?>
<script src="../javascript/ticketList.js"></script>

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/check-ticket-page.css">
    <title>Document</title>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2> 
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/profile-page.php">Profile</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header>
<?php } ?> 

<?php function drawHeaderAdmin() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/check-ticket-page.css">
    <title>Document</title>
    <style>
        .navigation a:nth-child(4) {
            position: relative;
            font-size: 1.1em;
            color: white;
            text-decoration: none;
            font-weight: 500;
            margin-left: 40px;
        }
    </style>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2> 
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/management-page.php">Management</a>
            <a href="../pages/profile-page.php">Profile</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header>
<?php } ?> 

<?php function drawSubmitButton() { ?> 
    <div class="box">
        <a href="../pages/submit-ticket-page.php">
            <div class="btn btn-content">
                <span>NEW TICKET</span>
            </div>
        </a>
    </div>
<?php } ?> 

<?php function drawTickets(array $tickets) { ?>
    <div class="tickets-list">
    <ul class="tickets">
        <?php foreach ($tickets as $ticket) { ?> 
            <li class="ticket">
                <h2 class="ticket-status">Status: <?=$ticket->ticket_status?></h2>
                <h3>Responsible Department: <?=$ticket->assigned_department_id?> </h3>
                <div class="ticket-content">
                    <p>
                        <?=$ticket->title?>
                    </p>
                </div>
            </li>
        <?php } ?>
    </ul>
    </div>
</body>
</html>
<?php } ?> 
            
<?php function drawTicketsAgentAdmin(array $tickets) { ?>
    <div class="tickets-list">
        <ul class="tickets">
            <?php foreach ($tickets as $ticket) { ?> 
            <li class="ticket">
                <h2 class="ticket-status">Status: <?=$ticket->ticket_status?></h2>
                <h3>Responsible Department: <?=$ticket->assigned_department_id?> </h3>
                <div class="ticket-content">
                    <p> 
                        <?=$ticket->title?>
                    </p>
                </div>
                <div class="box-3">
                    <a href="../pages/respond-ticket-page.php?ticket_id=<?=$ticket->id?>">
                        <div class="btn btn-three">
                            <span>R E S P O N D</span>
                        </div>
                    </a>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>
<?php } ?> 