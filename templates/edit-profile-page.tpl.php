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
    <link rel="stylesheet" href="../styles/edit-profile-page.css">
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

<?php function drawEditForm(){  ?> 
    <form action="../actions/edit-profile-action.php" method="post">
        <div class="input-box">
            <span class="icon"><ion-icon name="person"></ion-icon><label> Username</label></span>
            <input type="text" required name="username">
        </div> 
        <div class="input-box">
            <span class="icon"><ion-icon name="mail"></ion-icon><label> Email</label></span>
            <input type="email" required name="email">
        </div> 
        <div class="input-box">
            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon><label> Password</label></span>
            <input type="password" required name="password">
        </div> 
        <button type="submit" class="btn">Finish</button>
    </form>
    </body>
    </html>
<?php } ?> 