<?php declare(strict_types = 1); ?>

<?php function drawHeaderLogin(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="styles/index.css">
    <title>Tickets</title>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2> 
        <nav class="navigation">
            <a href="index.php">Home</a>
            <a href="pages/check-ticket-page.php">Tickets</a>
            <a href="pages/profile-page.php">Profile</a>
            <a href="pages/about-page.php">About</a>
            <a href="pages/login-register-page.php"><button class="signInButton">Login</button></a>
        </nav>
    </header>
<?php } ?>

<?php function drawHeaderLogout(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Tickets</title>
    <style>
        .navigation a:nth-child(5), .navigation a:nth-child(6) {
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
            <a href="index.php">Home</a>
            <a href="pages/check-ticket-page.php">Tickets</a>
            <a href="pages/Ongoing-page.php">Ongoing</a> 
            <a href="pages/FAQ-page.php">FAQ</a> 
            <a href="pages/profile-page.php">Profile</a>
            <a href="pages/about-page.php">About</a>
            <form action = "actions/action_logout.php" method ="post"> 
                <button type="submit" name="logout" class="signInButton">Logout</button>
            </form> 
        </nav>
    </header>
<?php } ?>

<?php function drawHeaderLogoutAgent(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Tickets</title>
    <style>
        .navigation a:nth-child(5), .navigation a:nth-child(6), .navigation a:nth-child(7) {
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
            <a href="index.php">Home</a>
            <a href="pages/check-ticket-page.php">Tickets</a>
            <a href="pages/respond-ticket-page.php">To Solve</a>
            <a href="pagesOngoing-page.php">Ongoing</a>
            <a href="pages/FAQ-page.php">FAQ</a>
            <a href="pages/profile-page.php">Profile</a>
            <a href="pages/about-page.php">About</a>
            <form action = "actions/action_logout.php" method ="post"> 
                <button type="submit" name="logout" class="signInButton">Logout</button>
            </form> 
        </nav>
    </header>
<?php } ?>

<?php function drawHeaderLogoutAdmin(){ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Tickets</title>
    <style>
        .navigation a:nth-child(5),
         .navigation a:nth-child(6),
         .navigation a:nth-child(7),
         .navigation a:nth-child(8) {
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
            <a href="index.php">Home</a>
            <a href="pages/check-ticket-page.php">Tickets</a>
            <a href="pages/respond-ticket-page.php">To Solve</a>
            <a href="pages/Ongoing-page.php">Ongoing</a>
            <a href="pages/FAQ-page.php">FAQ</a>
            <a href="pages/management-page.php">Management</a>
            <a href="pages/profile-page.php">Profile</a>
            <a href="pages/about-page.php">About</a>
            <form action = "actions/action_logout.php" method ="post"> 
                <button type="submit" name="logout" class="signInButton">Logout</button>
            </form> 
        </nav>
    </header>
<?php } ?>

<?php function drawIntro(){ ?>
    <div class="introduction-text">
        <h1>Solve your problems</h1>
        <p>Submit a ticket and our trusted hard working users will try their best to solve your current problem.</p>
        <p>Give it a try!</p>
        <div class="box">
            <a href="pages/check-ticket-page.php">
                <div class="btn btn-content">
                    <span>CHECK TICKETS</span>
                </div>
            </a>
        </div>
    </div>

</body>
</html>
<?php } ?>