<?php

  declare(strict_types = 1);
  require_once ('department.db.php');
  require_once ('connection.db.php');

  class Ticket {
    public int $id; 
    public string $title; 
    public string $ticket_status;
    public string $date_creation; 
    public int $user_id;
    public int $assigned_department_id; 
    public int $assigned_agent_id;
    public string $body;
    public string $department_name;

    public function __construct( int $id, string $title, string $ticket_status, string $date_creation, int $user_id,int $assigned_department_id, int $assigned_agent_id, string $body)
    {
        $this->id = $id; 
        $this->title = $title; 
        $this->ticket_status = $ticket_status; 
        $this->user_id = $user_id; 
        $this->date_creation = $date_creation; 
        $this->assigned_department_id = $assigned_department_id; 
        $this->assigned_agent_id = $assigned_agent_id;
        $this->body = $body; 
        $this->department_name = "";
    }

    public static function getTickets(PDO $db, int $count) : array {
    $stmt = $db->prepare('SELECT id, title, ticket_status, date_creation, user_id, assigned_department_id, assigned_agent_id, body FROM Ticket LIMIT ?'); 
    $stmt->execute(array($count)); 
    $tickets = array(); 
    while ($ticket = $stmt->fetch()){
        $ticket = new Ticket(
             intval($ticket['id']),
             $ticket['title'],
             $ticket['ticket_status'],
             $ticket['date_creation'], 
             intval($ticket['user_id']),
             intval($ticket['assigned_department_id']),
             intval($ticket['assigned_agent_id']),
             $ticket['body']
        );
        $department = Department::getDepartmentById($db, intval($ticket->assigned_department_id));
        $ticket->department_name = $department->department_name;
        $tickets[] = $ticket;
    }
    return $tickets;
  }

  public static function getTicketsByStatus(PDO $db, string $status) : array {
    $stmt = $db->prepare('
    SELECT id, title, ticket_status, date_creation, user_id, assigned_department_id, assigned_agent_id, body 
    FROM Ticket 
    WHERE ticket_status = ?'); 
    $stmt->execute(array($status)); 

    $tickets = array(); 
    while ($ticket = $stmt->fetch()){
        $tickets[] = new Ticket(
             intval($ticket['id']),
             $ticket['title'],
             $ticket['ticket_status'],
             $ticket['date_creation'], 
             intval($ticket['user_id']),
             intval($ticket['assigned_department_id']),
             intval($ticket['assigned_agent_id']),
             $ticket['body']
        );
    }
    return $tickets;
  }

  public static function getTicketsByUserId(PDO $db, int $user_id): array
  {
    $stmt = $db->prepare('
    SELECT * 
    FROM Ticket 
    WHERE user_id = ?;');
    $stmt->execute(array($user_id));

    $tickets = array();
    while ($ticket = $stmt->fetch()){
      $ticket = new Ticket(
           intval($ticket['id']),
           $ticket['title'],
           $ticket['ticket_status'],
           $ticket['date_creation'], 
           intval($ticket['user_id']),
           intval($ticket['assigned_department_id']),
           intval($ticket['assigned_agent_id']),
           $ticket['body']
      );
      $department = Department::getDepartmentById($db, intval($ticket->assigned_department_id));
      $ticket->department_name = $department->department_name;
      $tickets[] = $ticket;
  }
    return $tickets;
  }

  public static function getOpenTicketsByDepartmentName(PDO $db, string $department_name): array
{
    $stmt = $db->prepare('
        SELECT t.id, t.title, t.ticket_status, t.date_creation, t.user_id, t.assigned_department_id, t.body
        FROM Ticket AS t
        INNER JOIN Department AS d ON t.assigned_department_id = d.id
        WHERE d.department_name = ? AND t.ticket_status != "Done";'
    );
    $stmt->execute([$department_name]);

    $tickets = array();
    while ($ticketData = $stmt->fetch()) {
        $ticket = new Ticket(
            intval($ticketData['id']),
            $ticketData['title'],
            $ticketData['ticket_status'],
            $ticketData['date_creation'],
            intval($ticketData['user_id']),
            intval($ticketData['assigned_department_id']),
            intval($ticketData['assigned_agent_id']),
            $ticketData['body']
        );
        $ticket->department_name = $department_name;
        $tickets[] = $ticket;
    }

    return $tickets;
}

public static function getAllOpenTickets(PDO $db): array
{
    $stmt = $db->prepare('
        SELECT t.id, t.title, t.ticket_status, t.date_creation, t.user_id, t.assigned_department_id, t.assigned_agent_id, t.body
        FROM Ticket AS t
        WHERE t.ticket_status != "Done";'
    );
    $stmt->execute();

    $tickets = array();
    while ($ticketData = $stmt->fetch()) {
        $ticket = new Ticket(
            intval($ticketData['id']),
            $ticketData['title'],
            $ticketData['ticket_status'],
            $ticketData['date_creation'],
            intval($ticketData['user_id']),
            intval($ticketData['assigned_department_id']),
            intval($ticketData['assigned_agent_id']),
            $ticketData['body']
        );
        $tickets[] = $ticket;
    }

    return $tickets;
}

  static function getTicketById(PDO $db, int $id) : Ticket {
    $stmt = $db->prepare('SELECT * FROM Ticket WHERE id = ?');
    $stmt->execute(array($id));

    $ticket = $stmt->fetch();
 
    $tick = new Ticket(
        intval($ticket['id']),
        $ticket['title'],
        $ticket['ticket_status'],
        $ticket['date_creation'], 
        intval($ticket['user_id']),
        intval($ticket['assigned_department_id']),
        intval($ticket['assigned_agent_id']),
        $ticket['body']
    );
    $department = Department::getDepartmentById($db, intval($tick->assigned_department_id));
    $tick->department_name = $department->department_name;
    return $tick; 
  }

  static function getUserTickets(PDO $db, int $id) : array {
    $stmt = $db->prepare('
      SELECT * 
      FROM Ticket JOIN User USING (user_id)
      WHERE user_id = ? 
      GROUP BY user_id
    '); 
    $stmt->execute(array($id)); 

    $tickets = array(); 

    while ($ticket = $stmt->fetch()) {
      $tickets[] = new Ticket(
           intval($ticket['id']),
           $ticket['title'],
           $ticket['ticket_status'],
           $ticket['date_creation'], 
           intval($ticket['user_id']),
           intval($ticket['assigned_department_id']),
           intval($ticket['assigned_agent_id']),
           $ticket['body']
      );
    }
    return $tickets; 
  }

  function UpdateTicket(PDO $db, Ticket $ticket)
    {
        try{
            $stmt = $db->prepare('
            UPDATE Ticket SET title = ?, ticket_status = ?, date_creation = ?, user_id = ?, assigned_department_id = ?, assigned_agent_id = ?,body = ?
            WHERE id = ?
          ');
    
          $stmt->execute(array($ticket->title, $ticket->ticket_status, $ticket->date_creation, $ticket->user_id,$ticket->assigned_department_id, $ticket->assigned_agent_id, $ticket->body, $ticket->id));
          
        } catch(PDOException $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }

    function DeleteTicketById(PDO $db, int $id)
    {
        try {
            $stmt = $db->prepare('
            DELETE FROM Ticket
            WHERE id = ?
          ');

            $stmt->execute([$id]);

        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }

    static function DeleteTicketsByUserId(PDO $db, int $client_id)
    {
        try {
            $stmt = $db->prepare('
            DELETE FROM Ticket
            WHERE user_id = ?
          ');

            $stmt->execute([$client_id]);

        } catch (PDOException $e) {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    }
}
?>