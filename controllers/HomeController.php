<?php

require_once('/Applications/MAMP/htdocs/projectTP1/classes/dao/ContactDAO.php');
include('/Applications/MAMP/htdocs/projectTP1/config/config.php');

class HomeController {

    public function __construct() {
    }

    public function index() {
        global $pdo;
        // Récupérer la liste de tous les contacts depuis le modèle
        $contactDAO = new ContactDAO($pdo); 
        $tableauContact = $contactDAO->getAll(); 
        return $tableauContact;
    }
}
/* cause le pbl de l'affichage x2
$home=new homeController();
$home->index();
include('/Applications/MAMP/htdocs/projectTP1/views/home.php')
*/
?>
