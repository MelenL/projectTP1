<?php
        include_once '../controllers/EditContactController.php'; 
        include_once '../classes/dao/ContactDAO.php'; 
        require_once '../classes/models/ContactModel.php'; 
        require_once '../config/config.php';

        $id= $_GET['id'];

        $contactDAO = new ContactDAO($pdo);

        $prenom = $contactDAO->getById($id)['prenom'] ?? ""; //Dans le cas où c'est null.
        $nom = $contactDAO->getById($id)['nom'] ?? "";
        $email = $contactDAO->getById($id)['email'] ?? "";
        $telephone = $contactDAO->getById($id)['telephone'] ?? "";

        $contactDAO = new ContactDAO($pdo);

        $editContactController = new EditContactController($contactDAO);

        $editContactController->editContact($id)
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Modifier un Contact</h1>
    <a href="../views/home.php">Retour à la liste des contacts</a>
    <?php if ($contactDAO->getById($id)) : ?>
        <form action="edit_contact.php?id=<?php echo $_GET['id']; ?>" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo $telephone; ?>"><br>

            <input type="submit" value="Modifier">
        </form>
    <?php else : ?>
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>
       

</body>
</html>

