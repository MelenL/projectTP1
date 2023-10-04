<?php

require_once('/Applications/MAMP/htdocs/projectTP1/classes/dao/ContactDAO.php');
require_once('/Applications/MAMP/htdocs/projectTP1/classes/models/ContactModel.php');
include('/Applications/MAMP/htdocs/projectTP1/config/config.php');
class EditContactController {

    public function __construct() {
    }

    public function editContact($contactId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];


            // Création de l'instance ContactModel
            $nouveauContact = new ContactModel($contactId,$nom, $prenom, $email, $telephone);

            // Utilisation de ContactDAO pour ajouter le contact
            global $pdo;
            $contactDAO = new ContactDAO($pdo);
            $contactDAO->update($nouveauContact);
            header('Location: ../views/home.php');
            exit();

        }
    }

    
}

?>

