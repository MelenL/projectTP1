<?php

    require_once '../controllers/HomeController.php';
    include_once '../classes/dao/ContactDAO.php'; 
    require_once '../classes/models/ContactModel.php'; 
    require_once '../config/config.php'; 

    $contactDAO = new ContactDAO($pdo);

    $contacts = new HomeController($contactDAO); 

    $tableauContact = $contacts->index(); //Liste de tout les contacts
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Liste des Contacts</h1>
    <a href="add_contact.php">Ajouter un contact</a>
    <?php if (!empty($tableauContact)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>  
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tableauContact as $contact) : ?>
                    <tr>
                        <td><?php echo $contact['nom']; ?></td>
                        <td><?php echo $contact['prenom']; ?></td>
                        <td><?php echo $contact['email']; ?></td>
                        <td><?php echo $contact['telephone']; ?></td>
                        <td>
                            <a href="view_contact.php?id=<?php echo $contact['id']; ?>">Voir</a>
                            <a href="edit_contact.php?id=<?php echo $contact['id']; ?>">Modifier</a>
                            <a href="delete_contact.php?id=<?php echo $contact['id']; ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        <?php else : ?>
            <p>Aucun contact trouvé.</p>
        <?php endif; ?>

        

</body>
</html>
