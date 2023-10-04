<?php
class DeleteContactController
{
    public function __construct()
    {
    }

    public function deleteContact($contactId)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            global $pdo;
            $contactDAO = new ContactDAO($pdo);
            // Utilisation de ContactDAO pour supprimer le contact
            $contactDAO->deleteById($contactId);

        }
    }


}
?>