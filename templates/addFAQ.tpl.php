<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/add-faq-page.css">
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

<?php function drawSubmitForm() {  ?> 
    <form action="../actions/FAQaction.php" method="post">
        <div class="input-group">
            <input type="text" id="name" required name="area">
            <label for="area"><ion-icon class="icons" name="title"></ion-icon>Area</label>
        </div>
        <div class="input-group">
            <textarea id="message" style="resize:none;" placeholder="Question" rows="8" required name="Question"></textarea>
        </div>
        <div class="input-group">
            <textarea id="message" style="resize:none;" placeholder="Common answer" rows="8" required name="Answer"></textarea>
        </div>
        <button type="submit" class="btn">SUBMIT</button>
    </form>
    </body>
    </html>
<?php } ?> 
