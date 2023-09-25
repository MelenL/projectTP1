<?php

    require_once '../controllers/HomeController.php';
    require_once '../controllers/Recherche.php';
    include_once '../classes/dao/ContactDAO.php'; 
    require_once '../classes/models/ContactModel.php'; 
    require_once '../config/config.php'; 

    $contactDAO = new ContactDAO($pdo);

    $contacts = new HomeController($contactDAO); 

    $recherche = new Recherche($contactDAO);

    //$tableauContact = $contacts->index(); //Liste de tout les contacts **NON-UTILE, remplacer par RESULTATRECHERCHE**

    $resultatRecherche = $recherche->recherche(); //Liste des résultat de la recherche
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
    <div class="container">
        <h1 class="display-6 border-bottom border-dark mb-3">Liste des Contacts</h1>

        <form class="mb-3" action="home.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" id="recherche" name="recherche" placeholder="Rechercher un contact" value="<?php echo isset($_POST['recherche']) ? $_POST['recherche'] : ''; ?>">
                <button class="btn btn-dark" type="submit">Rechercher</button>
            </div>
        </form>

        <div class="card mb-3">
            <?php if (!empty($resultatRecherche)) : ?>
                <table class="table">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>  
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-light">
                        <?php foreach ($resultatRecherche as $contact) : ?>
                            <tr>
                                <td><?php echo $contact['nom']; ?></td>
                                <td><?php echo $contact['prenom']; ?></td>
                                <td><?php echo $contact['email']; ?></td>
                                <td><?php echo $contact['telephone']; ?></td>
                                <td>
                                    <a href="view_contact.php?id=<?php echo $contact['id']; ?>" class="btn btn-success">Voir</a>
                                    <a href="edit_contact.php?id=<?php echo $contact['id']; ?>" class="btn btn-warning">Modifier</a>
                                    <a href="delete_contact.php?id=<?php echo $contact['id']; ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else : ?>
                    <p class="alert alert-warning">Aucun contact trouvé.</p>
                <?php endif; ?>
            </div>
        <a href="add_contact.php" class="btn btn-primary">Ajouter un contact</a>
    <div class="container">
</body>
</html>
