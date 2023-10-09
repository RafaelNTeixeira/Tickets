<?php declare(strict_types = 1); ?>

<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/management-page.css">
    <script src="../javascript/update-agent-client.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header> 
        <h2 class="logo">Tickets</h2> 
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/profile-page.php">Profile</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header>
<?php } ?> 



<?php function drawClients(array $clients) {?>
    <div class="clients-list">
        <h1>C L I E N T S</h1>
        <div class="clients-scrollview">
        <ul class="clients">
            <?php foreach ($clients as $client) { ?>
            <li class="client">
                <h2 class="client-name">Name: <?=$client->name?> </h2>
                <h3 class="client-email">Email <?=$client->email?> </h3>
                <div class="box">
                    <div class="btn btn-content">
                        <?php $admin_id = intval($_SESSION["id"]) ?>
                        <span class="btn-update" onclick="goToUpdate(<?= $client->user_id ?>, <?= $admin_id ?>)">UPDATE</span>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
        </div>
    </div>
<?php } ?>



<?php function drawAgents(array $agents) {?>
    <div class="agents-list">
        <h1>A G E N T S</h1>
        <div class="agent-scrollview">
            <ul class="agents">
                <?php foreach ($agents as $agent) {?>
                <li class="agent">
                    <h2 class="agent-name">Name: <?=$agent->name?></h2>
                    <h3 class="agent-email">Email <?=$agent->email?></h3>
                    
                    <div class="box">
                    <div class="btn btn-content">
                        <?php $admin_id = intval($_SESSION["id"]) ?>
                        <span class="btn-update" onclick="goToUpdate(<?= $agent->user_id ?>, <?= $admin_id ?>)">UPDATE</span>
                    </div>
                </div>
                </li>
                <?php } ?>
            </ul>
            <form id="update-agent-form" method="post" action="../actions/update-agent.php">
                
        </form>
        </div>
    </div> 
</body>
</html>
<?php } ?>

