<?php
class Recherche {
    private $contactDAO;

    public function __construct(ContactDAO $contactDAO) {
        $this->contactDAO = $contactDAO;
    }

    public function recherche() {
        $tableauContact = $this->contactDAO->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $information= $_POST["recherche"];

            $resultatRecherche = [];

            foreach ($tableauContact as $contact) {
                if (stripos($contact['nom'], $information) !== false || //stripos est utilisé pour trouver une sous-chaîne
                    stripos($contact['prenom'], $information) !== false ||
                    stripos($contact['email'], $information) !== false ||
                    stripos($contact['telephone'], $information) !== false) {

                    $resultatRecherche[] = $contact;
                }
            }

            // Retourner les résultats de la recherche
            return $resultatRecherche;
        }
        else {
            return $tableauContact;
        }
    }
}
?>
