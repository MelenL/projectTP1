<?php

class AddContactController {
    public function __construct() {
    }

    public function addContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];
            $telephone = $_POST['telephone'];

            

            // Création de l'instance ContactModel
            global $pdo;
            $contactDAO = new ContactDAO($pdo);            
            $nouveauContact = new ContactModel(null,$nom, $prenom, $email, $telephone);
            //$contact = new models/ContactModel(null,$nom, $prenom, $email, $telephone);
            // Utilisation de ContactDAO pour ajouter le contact
            $contactDAO->create($nouveauContact);

            header('Location: ../views/home.php');
            exit();

        }
    }
}
?>
