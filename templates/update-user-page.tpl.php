<?php declare(strict_types = 1); ?>
<script src="../javascript/update-user.js"></script>
<?php function drawHeader() { ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" defer></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js" defer></script>
    <link rel="stylesheet" href="../styles/update-user-page.css">
    <title>Document</title>
</head>
<body>
    <header> 
        <h2 class="logo">User Update</h2> 
        <nav class="navigation">
            <a href="../index.php">Home</a>
            <a href="../pages/check-ticket-page.php">Tickets</a>
            <a href="../pages/profile-page.php">Profile</a>
            <a href="../pages/about-page.php">About</a>
        </nav>
    </header>
<?php } ?> 

<?php  function drawSubmitUserForm(User $user, array $list, int $admin_id) {  ?> 
    <form class="form">
        <div class="input-group">
            <input type="text" id="name" required name="name" value="<?php echo htmlspecialchars($user->name, ENT_QUOTES) ?>">
            <label for="name"><ion-icon class="icons" name="name"></ion-icon>Name</label>
        </div>
        <div class="input-group">
            <input type="text" id="email" required name="email" value="<?php echo $user->email ?>">
            <label for="email"><ion-icon class="icons" name="email"></ion-icon>Email</label>
        </div>
        <div class="input-group">
            <input type="text" id="username" required name="username" value="<?php echo $user->username ?>">
            <label for="username"><ion-icon class="icons" name="username"></ion-icon>Username</label>
        </div>
        <div class="input-group">
            <input type="text" id="password" name="password">
            <label for="password"><ion-icon class="icons" name="password"></ion-icon> New Password</label>
        </div>
        <?php 
        if($user->user_access == "Admin" || $admin_id != 0){
        ?>
            <div class="input-group">
                <label for="user-access"></label>
                <select name="user_access" id="user_access" onChange="checkForUserAccess()">
                    <option disabled>- Pick the User Access -</option>
                    <option value="Admin" <?= ( $user->user_access == "Admin" ? 'selected="selected"' : '' ) ?>>Admin</option>
                    <option value="Agent" <?= ( $user->user_access == "Agent" ? 'selected="selected"' : '' ) ?>>Agent</option>
                    <option value="Client" <?= ( $user->user_access == "Client" ? 'selected="selected"' : '' ) ?>>Client</option>
                </select>
            </div>

            <div class="input-group">
                <label for="department_id"></label>
                <select name="department_id" id="department_id">
                    <option disabled>- Pick the department -</option>
                    <?php 
                        foreach ($list as $department){ ?>
                            <option value="<?php echo $department->id ?>" <?= ($user->department_id == $department->id ? 'selected="selected"' : '' ) ?>><?= $department->department_name ?></option>
                    <?php } ?>
                    <option value="7" <?= ( $user->department_id == null ? 'selected="selected"' : '' ) ?>>None</option>
                </select>
            </div>
        <?php   
        }
        ?>
        <div class="input-group">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->user_id ?>">
        </div>
        <div class="input-group">
                <input type="hidden" id="check_user_access" name="check_user_access" value="<?php echo $user->user_access ?>">
        </div>
        <div class="input-group">
                <input type="hidden" id="admin_id" name="admin_id" value="<?php echo $admin_id ?>">
        </div>
        
        <button type="submit" class="btn">UPDATE</button>
    </form>
    </body>
    </html>
<?php } ?> 
