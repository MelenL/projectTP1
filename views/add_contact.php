<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Ajouter un Contact</h1>
    <a href="../views/home.php">Retour à la liste des contacts</a>

    <form action="add_contact.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email"><br>

        <label for="telephone">Téléphone :</label>
        <input type="text" id="telephone" name="telephone"><br>

        <input type="submit" value="Ajouter">
    </form>

    <?php
    include_once '../controllers/AddContactController.php'; 
    include_once '../classes/dao/ContactDAO.php'; 
    require_once '../classes/models/ContactModel.php'; 
    require_once '../config/config.php';
    


    $contactDAO = new ContactDAO($pdo);

    $addContactController = new AddContactController($contactDAO);

    $addContactController->addContact();
    ?>

</body>
</html>
