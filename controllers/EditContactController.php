<?php
class EditContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
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
            $this->contactDAO->update($nouveauContact);

        }
    }

    
}

?>

