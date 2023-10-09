<?php declare(strict_types = 1); ?>


<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/respond-ticket-page.css">
    <script src="../javascript/answer.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2> 
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/check-ticket-page.php">Tickets</a>
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
    <link rel="stylesheet" href="../styles/respond-ticket-page.css">
    <title>Document</title>
    <style>
        .navigation a:nth-child(5) {
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
            <a href="../pages/check-ticket-page.php">Tickets</a>
            <a href="../pages/management-page.php">Management</a>
            <a href="../pages/profile-page.php">Profile</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header> 
<?php } ?> 

<?php function drawResponseTickets(PDO $db, array $tickets) { ?>
    <div class="tickets-list">
        <ul class="tickets">
            <?php foreach ($tickets as $ticket) { ?> 
                <li class="ticket">
                <form id="Answer form" method="post" action="../actions/answer-action.php">
                    <input type="hidden" name="ticket_id" value="<?=$ticket->id?>">
                    <input type="hidden" name="user_id" value="<?=$ticket->user_id?>">
                    <h2 class="ticket-status">Ticket by: <?=User::getUserNameById($db, $ticket->user_id)?></h2>
                    <input type="hidden" name="body" value="<?=$ticket->body?>">
                    <h3>Ticket content: <?=$ticket->body?></h3>
                    <input type="hidden" name="date" value="<?=$ticket->date_creation?>">
                    <h4>Date submitted: <?=$ticket->date_creation?></h4> 
                    <div class="input-group">
                        <textarea id="message" style="resize:none;" placeholder="Answer here" rows="8" required name="response"></textarea>
                    </div>  
                    <button type="submit">Send</button>
                </form>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>
<?php } ?> 
