<?php
        include_once '../controllers/DeleteContactController.php'; 
        include_once '../classes/dao/ContactDAO.php'; 
        require_once '../classes/models/ContactModel.php'; 
        require_once '../config/config.php';

        $id= $_GET['id'];

        $contactDAO = new ContactDAO($pdo);

        $prenom = $contactDAO->getById($id)['prenom'];
        $nom = $contactDAO->getById($id)['nom'];

        $deleteContactController = new DeleteContactController($contactDAO);

        $deleteContactController->deleteContact($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Supprimer un Contact</h1>
    <a href="../views/home.php">Retour à la liste des contacts</a>


        <p>Voulez-vous vraiment supprimer le contact "<?php echo $prenom; ?> <?php echo $nom; ?>" ?</p>
        <form action="delete_contact.php?id=<?php echo $_GET['id']; ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>

        <p> Le contact n'a pas été trouvé. </p>
</body>
</html>

