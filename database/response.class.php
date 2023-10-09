<?php

  declare(strict_types = 1);
  require_once ('connection.db.php');


  class Response {
    public int $id;
    public int $sender_id;
    public int $recipient_id;
    public string $sender_content;
    public string $date_sent;
    public string $answer;

    public function __construct(int $id, int $sender_id, int $recipient_id, string $sender_content, string $date_sent, string $answer) {
        $this->id = $id;
        $this->sender_id = $sender_id;
        $this->recipient_id = $recipient_id;
        $this->sender_content = $sender_content;
        $this->date_sent = $date_sent;
        $this->answer = $answer;
    }


    public static function getAllResponsesByID(PDO $db, int $uid): array {
        $stmt = $db->prepare('
            SELECT id, sender_id, recipient_id, sender_content, date_sent, answer
            FROM Responses
            WHERE sender_id = :uid'
        );
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $stmt->execute();
    
        $responses = array();
        while ($responseData = $stmt->fetch()) {
            $response = new Response(
                intval($responseData['id']),
                intval($responseData['sender_id']),
                intval($responseData['recipient_id']),
                $responseData['sender_content'],
                $responseData['date_sent'],
                $responseData['answer']
            );
            $responses[] = $response;
        }
    
        return $responses;
    }

    public static function getAllResponsesByRecipientID(PDO $db, int $uid): array {
        $stmt = $db->prepare('
            SELECT id, sender_id, recipient_id, sender_content, date_sent, answer
            FROM Responses
            WHERE recipient_id = :uid'
        );
        $stmt->bindParam(':uid', $uid, PDO::PARAM_INT);
        $stmt->execute();
    
        $responses = array();
        while ($responseData = $stmt->fetch()) {
            $response = new Response(
                intval($responseData['id']),
                intval($responseData['sender_id']),
                intval($responseData['recipient_id']),
                $responseData['sender_content'],
                $responseData['date_sent'],
                $responseData['answer']
            );
            $responses[] = $response;
        }
    
        return $responses;
    }
    
}
