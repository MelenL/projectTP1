<?php
class ViewContactController {


    public function __construct() {
    }

    public function viewContact($contactId) {
        global $pdo;
        $contactDAO = new ContactDAO($pdo);
        return $contactDAO->getById($contactId) ?? false;

    }
}
?>

