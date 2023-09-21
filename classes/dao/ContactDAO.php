<?php
class ContactDAO {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Méthode pour insérer un nouveau contact dans la base de données
    public function create(ContactModel $contact) {
        
    }

    // Méthode pour récupérer un contact par son ID
    public function getById($id) {
       
    }

    // Méthode pour récupérer la liste de tous les contacts
    public function getAll() {
       
    }

    // Méthode pour mettre à jour un contact
    public function update(ContactModel $contact) {
       
    }

    // Méthode pour supprimer un contact par son ID
    public function deleteById($id) {
       
    }
}
?>
