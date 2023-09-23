<?php
class DeleteContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function deleteContact($contactId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Utilisation de ContactDAO pour supprimer le contact
            $this->contactDAO->deleteById($contactId);

        }
    }

       
}
?>

