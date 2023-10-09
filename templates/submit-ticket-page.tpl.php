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
    <link rel="stylesheet" href="../styles/submit-ticket-page.css">
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
    <form action="../actions/submit_ticket_action.php" method="post">
        <div class="input-group">
            <input type="text" id="name" required name="title">
            <label for="topic"><ion-icon class="icons" name="title"></ion-icon>Topic</label>
        </div>
        <div class="input-group">
            <label for="problem-areas"></label>
            <select name="assigned_department_id">
                <option value="default" selected>- Pick the area of the corresponding issue -</option>
                <option value="1">Sales</option>
                <option value="2">Marketing</option>
                <option value="3">Support</option>
                <option value="4">Finance</option>
                <option value="5">Operations</option>
                <option value="6">Others</option>
            </select>
        </div>
        <div class="input-group">
            <textarea id="message" style="resize:none;" placeholder="Describe your problem" rows="8" required name="body"></textarea>
        </div>
        <button type="submit" class="btn">SUBMIT</button>
    </form>
    </body>
    </html>
<?php } ?> 
