<?php 

declare(strict_types = 1); 

class FAQ {
    public int $ID;
    public string $question;
    public string $response;
    public string $area;

    public function __construct(int $ID, string $question, string $response, string $area) {
        $this->ID = $ID;
        $this->question = $question;
        $this->response = $response;
        $this->area = $area;
    }

    public static function getAllFAQs(PDO $db): array
    {
    $stmt = $db->prepare('
        SELECT ID, question, response, area
        FROM FAQs;'
    );
    $stmt->execute();

    $faqs = array();
    while ($faqData = $stmt->fetch()) {
        $faq = new FAQ(
            intval($faqData['ID']),
            $faqData['question'],
            $faqData['response'],
            $faqData['area']
        );
        $faqs[] = $faq;
    }

    return $faqs;
    }
}

?>