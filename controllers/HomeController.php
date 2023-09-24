<?php
class HomeController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

     public function index() {
        // Récupérer la liste de tous les contacts depuis le modèle
        $tableauContact = $this->contactDAO->getAll();

        return $tableauContact;
    }
}
?>
