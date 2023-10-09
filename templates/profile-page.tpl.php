<?php declare(strict_types = 1); 

?>

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/profile-page.css">
    <title>Document</title>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2> 
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/check-ticket-page.php">Tickets</a>
            <a href="../pagesS/about-page.php">About</a>
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
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/profile-page.css">
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
            <a href="../pages/check-ticket-page.php">Tickets</a>
            <a href="../pages/management-page.php">Management</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header>
<?php } ?> 

<?php function drawEditProfileButton() { ?> 
    <div class="box">
        <a href="../pages/edit-profile-page.php">
            <div class="btn btn-content">
                <span>EDIT PROFILE</span>
            </div>
        </a>
    </div>
<?php } ?>

<?php function drawCards(User $user) { ?> 
    <div class="container">
        <div class="card">
            <div class="card-inner">
                <div class="front">
                    <h2><?php echo $user->name ?></h2>
                    <p><?php echo $user->username ?></p>
                    <ion-icon class="icon-slide" name="swap-horizontal-outline"></ion-icon>
                </div>
                <div class="slide">
                    <ion-icon class="icon-leaf" name="leaf-outline"></ion-icon>
                    <h1><?php echo htmlspecialchars($user->name) ?></h1>
                    <p>Current Tickets user. Here's your current website info:</p>

                    <h2>Role</h2>
                    <p><?php echo $user->user_access ?></p>

                    <h2>Email</h2>
                    <p><?php echo $user->email ?></p>
                    </div>
                </div>
            </div>
            
        </div>
       
    </div>
</body>
</html>
<?php } ?> 