<?php
declare(strict_types=1);

error_log('getUserWithEmail function started.');

class User
{
  public int $user_id;
  public string $name;
  public string $password;
  public string $email;
  public string $username;
  public string $user_access;
  public ?int $department_id;

  public function __construct(int $user_id, string $name, string $password, string $username, string $user_access, string $email, ?int $department_id)
  {
    $this->user_id = $user_id;
    $this->name = $name;
    $this->password = $password;
    $this->username = $username;
    $this->user_access = $user_access;
    $this->email = $email;
    $this->department_id = $department_id;
  }

  function name()
  {
    return $this->name;
  }

  public static function getUserWithEmail(PDO $db, string $email): ?User
  {
    if($email == "" || $email == null){
      $error_msg = "Could not find user with email: " . $email;
      error_log($error_msg);
      return null;
    }

    $stmt = $db->prepare('SELECT * FROM User WHERE lower(email) = ?');
    $stmt->execute(array(strtolower($email)));

    $user = $stmt->fetch();

    error_log('Logging a test message');

    if ($user) {
      return new User(
        intval($user['user_id']),
        $user['name'],
        $user['password'],
        $user['username'],
        $user['user_access'],
        $user['email'],
        intval($user['department_id'])
      );
    } else {
      $error_msg = "Could not find user with email: " . $email;
      error_log($error_msg);
      return null;
    }
  }

  public static function getUserWithUserId(PDO $db, int $user_id): ?User
  {
    $stmt = $db->prepare('SELECT user_id, name, password, username, user_access, email, department_id FROM User WHERE user_id = ?');
    $stmt->execute(array($user_id));

    $user = $stmt->fetch();

    if ($user) {
      return new User(
        intval($user['user_id']),
        $user['name'],
        $user['password'],
        $user['username'],
        $user['user_access'],
        $user['email'],
        intval($user['department_id'])
      );
    } else {
      $error_msg = "Could not find user";
      error_log($error_msg);
      return null;
    }
  }

  public static function getUserNameById(PDO $db, int $userId): string
{
    $stmt = $db->prepare('SELECT username FROM User WHERE user_id = ?');
    $stmt->execute([$userId]);

    $userData = $stmt->fetch();

    if ($userData) {
        return $userData['username'];
    }

    return 'Unknown User';
}




  public static function getUserRoleById(PDO $db, int $user_id): string
  {
    $stmt = $db->prepare('SELECT user_access FROM User WHERE user_id = ?');
    $stmt->execute([$user_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_access = $result['user_access'];
    
    return $user_access;
  }

  public static function getUserDepartmentById(PDO $db, int $user_id): ?string
  {
    $stmt = $db->prepare("Select department_name 
                          from department as d
                          inner join User as u on u.department_id=d.id
                          where u.user_id = ?;
                          ");
    $stmt->execute([$user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $department_name = $result['department_name'];
    
    return $department_name;
  }

  public static function getClients(PDO $db) : array 
  {
    $stmt = $db->prepare("
      SELECT *
      FROM User
      WHERE user_access = 'Client'
    "); 
    $clients = array();
    $stmt->execute();
    $clientData = $stmt->fetchAll();

    foreach ($clientData as $row) {
        $clients[] = new User(
          intval($row['user_id']),
          $row['name'],
          $row['password'],
          $row['username'],
          $row['user_access'],
          $row['email'],
          $row['department_id']
        );
    }
    return $clients; 
  }

  public static function getAgents(PDO $db) : array 
  {
    $stmt = $db->prepare("
      SELECT *
      FROM User
      WHERE user_access = 'Agent'
    "); 
    $agents = array();
    $stmt->execute();
    $agentData = $stmt->fetchAll();

    foreach ($agentData as $row) {
        $agents[] = new User(
          intval($row['user_id']),
          $row['name'],
          $row['password'],
          $row['username'],
          $row['user_access'],
          $row['email'],
          intval($row['department_id'])
        );
    }
    return $agents; 
  }

  public static function updateUser(PDO $db, User $user): ?User
  {
      try{
        $initialStmt = 'UPDATE User SET name = :name, username = :username';

        if(!$user->user_access == null || !$user->user_access == ""){
          $initialStmt .= ', user_access = :user_access';
        }

        $initialStmt .= ', email = :email, department_id = :department_id';

        if($user->password != "" && strlen($user->password) > 0){
          $initialStmt .= ", password = :password";
        }

        $initialStmt .= " WHERE user_id = :user_id ;";
        $stmt = $db->prepare($initialStmt);
        
        $stmt->bindParam(':name', $user->name, PDO::PARAM_STR);
        $stmt->bindParam(':username', $user->username, PDO::PARAM_STR);
        if(!$user->user_access == null || !$user->user_access == ""){
          $stmt->bindParam(':user_access', $user->user_access, PDO::PARAM_STR);
        }
        $stmt->bindParam(':email', $user->email, PDO::PARAM_STR);
        $stmt->bindParam(':department_id', $user->department_id, PDO::PARAM_INT);
        if($user->password != "" && strlen($user->password) > 0){
          $stmt->bindParam(':password', $user->password, PDO::PARAM_STR);
        }
        $stmt->bindParam(':user_id', $user->user_id, PDO::PARAM_INT);

        $stmt->execute();
           
        return User::getUserWithUserId($db, $user->user_id);
        
      } catch(PDOException $e){
          echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
  }

  public static function insertUser(PDO $db, User $user)
    {
        try {
            $stmt = $db->prepare('
            INSERT INTO User(name, password, username, user_access, email, department_id)
            VALUES (?,?,?,?,?,?)
          ');

            $stmt->execute([$user->name, $user->password, $user->username, $user->user_access, $user->email, $user->department_id]);

        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

  function deleteUserById(PDO $db, int $user_id)
  {
    try {
        $stmt = $db->prepare('
        DELETE FROM User
        WHERE user_id = ?
      ');

        $stmt->execute([$user_id]);

        //Depois de apagar o User, apaga os seus tickets tbm
        if($stmt->rowCount() > 0){
          Ticket::DeleteTicketsByUserId($db, $user_id);
        }

    } catch (PDOException $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
  }

}

