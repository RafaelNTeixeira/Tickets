<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/faq-page.css">
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


<?php
function drawFAQs(PDO $db, array $FAQs) {
    ?>
    <div class="tickets-list">
        <ul class="tickets">
            <?php foreach ($FAQs as $FAQ) { ?> 
                <li class="ticket">
                    <h3><?php echo $FAQ->area; ?></h3>
                    <h4><strong>Question:</strong> <?php echo $FAQ->question; ?></h4>
                    <p><strong>Response:</strong> <?php echo $FAQ->response; ?></p>
                </li>
            <?php } ?>
        </ul>
    </div>
    <?php
}
?>

<?php function drawFAQsAgentAdmin(PDO $db, array $FAQs) { ?>
    <div class="tickets-list">
        <ul class="tickets">
        <div class="buttons">
            <button class="btn" onclick="window.location.href='../pages/addFAQ-page.php'">Add FAQ</button>
            <?php foreach ($FAQs as $FAQ) { ?> 
                <li class="ticket">
                    <h3><?php echo $FAQ->area; ?></h3>
                    <h4><strong>Question:</strong> <?php echo $FAQ->question; ?></h4>
                    <h4><strong>Response:</strong> <?php echo $FAQ->response; ?></p>
                </li>
            <?php } ?>
        </ul>
    </div>
</body>
</html>
<?php } ?>

<?php
