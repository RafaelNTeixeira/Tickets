<?php 
    declare(strict_types = 1); 
    require_once('../database/csrf.class.php');
?>

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../javascript/login-register-script.js" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/login-register-page.css">
    <title>Tickets</title>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2>
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header>
    <div class="welcome-message">
        <h1>Welcome Page</h1>
        <h2>Sign in to continue acess</h2>
    </div>
    <?php } ?>
    
    <?php function drawLoginForm() { ?>
    <div class="wrapper">
        <div class="form-box login">
            <h2>Login</h2>
            <form action="../actions/action_login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type='text' required name='email'>
                    <label>Email</label>
                </div> 
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required name="password">
                    <label>Password</label>
                </div> 
                <button type="submit" class="btn" >Login</button>
                <div class="login-register">
                    <p>Don't have an account?<a href="#" class="register-link"> Register</a></p>
                </div>
            </form>  
        </div>
        <?php } ?>

        <?php function drawRegisterForm() { ?> 
        <div class="form-box register">
            <h2>Register</h2>
           
            <form action="../actions/action_register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type='text' required name='name'>
                    <label>First and last name</label>
                </div> 
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="username">
                    <label>Username</label>
                </div> 
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" required name="email">
                    <label>Email</label>
                </div> 
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" required name="password">
                    <label>Password</label>
                </div> 
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account? <a href="#" class="login-link"> Log In</a></p>
                </div>
            </form>
            
        </div>
    </div>
</body>
</html>
<?php } ?>