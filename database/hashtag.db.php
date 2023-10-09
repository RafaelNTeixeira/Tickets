<?php
declare(strict_types=1);

error_log('getUserWithEmail function started.');

class Hashtag
{
  public int $hashtag_id;
  public string $name;

  public function __construct(int $hashtag_id, string $name)
  {
    $this->hashtag_id = $hashtag_id;
    $this->name = $name;
  }

  function name()
  {
    return $this->name;
  }

  static function getAllHashtags(PDO $db) : array {
    $stmt = $db->prepare('SELECT hashtag_id, name FROM Hashtag'); 
    $stmt->execute(array()); 

    $hashtags = array(); 
    while ($hashtag = $stmt->fetch()){
        $hashtags[] = new Hashtag(
             $hashtag['hashtag_id'],
             $hashtag['name']
        );
    }
    return $hashtags;
  }

  static function getTicketHashtags(PDO $db, int $id) : array {
    $stmt = $db->prepare('SELECT *
    FROM Hashtag as h
    INNER JOIN Hashtags_Tickets as ht on ht.hashtag_id=h.hashtag_id
    INNER JOIN Ticket as t on t.id=hu.id
    WHERE t.id = ?
    '); 
    $stmt->execute(array($id)); 

    $hashtags = array(); 
    while ($hashtag = $stmt->fetch()){
        $hashtags[] = new Hashtag(
             $hashtag['hashtag_id'],
             $hashtag['name']
        );
    }
    return $hashtags;
  }

  static function getHashtagTickets(PDO $db, int $hashtag_id) : array {
    $stmt = $db->prepare('SELECT * 
    FROM Ticket as t
    INNER JOIN Hashtags_Tickets as ht on ht.id=t.id
    INNER JOIN Hashtag as h on h.hashtag_id=ht.hashtag_id
    WHERE h.hashtag_id = ?
    '); 
    $stmt->execute(array($hashtag_id)); 

    $tickets = array(); 
    while ($ticket = $stmt->fetch()){
        $tickets[] = new Ticket(
            $ticket['id'],
            $ticket['title'],
            $ticket['ticket_status'],
            $ticket['date_creation'], 
            $ticket['client_id'],
            $ticket['assigned_department_id']
        );
    }
    return $tickets;
  }

  function DeleteHashtagById(PDO $db, int $hashtag_id)
    {
        try {
            $stmt = $db->prepare('
            DELETE FROM Hashtag
            WHERE hashtag_id = ?
          ');

            $stmt->execute([$hashtag_id]);

        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    function InsertHashtag(PDO $db, string $name)
    {
        try {
            $stmt = $db->prepare('
            INSERT INTO Hashtag(name)
            VALUES (?)
          ');

            $stmt->execute([$name]);

        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
  
}
?>