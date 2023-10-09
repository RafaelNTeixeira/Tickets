<?php declare(strict_types = 1); ?> 

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" width=device-width>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/about-page.css">
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

<?php function drawBoxes() { ?> 
    <div class="box1">
        <div class ="icon-box">
            <ion-icon class="icon-who-are-we" name="aperture-outline"></ion-icon>
        </div>
        <div class="text-box"><h1>Who we are</h1>
            <h2>Providing a tool to the world so that we can help each other through the power of collective knowledge.</h2>
            <p>We are a group of students at FEUP that hope to create a solid and creative website while also aiming to improve our website development skills.</p>
        </div>
    </div>

    <div class="box2">
        <h1>Our core values</h1>
        <div class="row">
            <div class="col">
                <h2><ion-icon class="icons" name="people-outline"></ion-icon>Adopt a customer-first mindset</h2>
                <p>Authentically serve our customers by empowering, listening, and collaborating with our fellow users.</p>
            </div>
            <div class="col">
                <h2><ion-icon class="icons" name="heart-circle-outline"></ion-icon>Transparency</h2>
                <p>Communicate openly and honestly, both inside and outside the company. Encourage transparency from others by being empathetic, reliable, and acting with integrity.</p>
            </div>
            <div class="col">
                <h2><ion-icon class="icons" name="trending-up-outline"></ion-icon>Learn, share, grow</h2>
                <p>Adopt a Growth Mindset. Be curious and eager to learn. Aim for ethical, sustainable, long-term growth, both personally and in the company.</p>
            </div>
        </div>
    </div>

    <div class="box3">
        <h1>Collaborators</h1>
        <div class="row">
            <div class="col">
                <h2><ion-icon class="icons" name="person-outline"></ion-icon>Bruno Duvane</h2>
                <p>up202109244@up.pt</p>
            </div>
            <div class="col">
                <h2><ion-icon class="icons" name="person-outline"></ion-icon>João Duarte</h2>
                <p>up201504089@up.pt</p>
            </div>
            <div class="col">
                <h2><ion-icon class="icons" name="person-outline"></ion-icon>Rafael Teixeira</h2>
                <p>up202108831@up.pt</p>
            </div>
        </div>
    </div>

</body>
</html>
<?php } ?> 