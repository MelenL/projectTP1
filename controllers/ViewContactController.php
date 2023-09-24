<?php
class ViewContactController {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function viewContact($contactId) {
        $contact = $this->contactDAO->getById($contactId);

        return $contact ?? false; //On retourne un contact sinon faux.
    }
}
?>

