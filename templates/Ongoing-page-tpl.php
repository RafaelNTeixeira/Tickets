<?php declare(strict_types = 1); ?>


<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/ongoing-page.css">
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

<?php function drawResponseTickets(PDO $db, array $responses) { ?>
    <div class="tickets-list">
        <ul class="tickets">
            <?php foreach ($responses as $response) { ?> 
                <li class="ticket">
                <form id="Answer form" method="post" action="../actions/Ongoing-action.php">
                    <input type="hidden" name="response_id" value="<?=$response->id?>">
                    <input type="hidden" name="recipient_id" value="<?=$response->recipient_id?>">
                    <input type="hidden" name="sender_id" value="<?=$response->sender_id?>">
                    <h2 class="ticket-status">Ticket by: <?=User::getUserNameById($db, $response->sender_id)?></h2>
                    <input type="hidden" name="body" value="<?=$response->answer?>">
                    <h3>Ticket response: <?=$response->answer?></h3>
                    <input type="hidden" name="date" value="<?=$response->date_sent?>">
                    <h4>First Submition Date: <?=$response->date_sent?></h4> 
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