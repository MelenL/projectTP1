<?php
        include_once '../controllers/DeleteContactController.php'; 
        include_once '../classes/dao/ContactDAO.php'; 
        require_once '../classes/models/ContactModel.php'; 
        require_once '../config/config.php';

        $id= $_GET['id'];

        $contactDAO = new ContactDAO($pdo);

        $prenom = $contactDAO->getById($id)['prenom'] ?? ""; //Au cas où c'est nul
        $nom = $contactDAO->getById($id)['nom'] ?? "";

        $deleteContactController = new DeleteContactController($contactDAO);

        $deleteContactController->deleteContact($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <h1>Supprimer un Contact</h1>
    <a href="../views/home.php">Retour à la liste des contacts</a>
    <?php if ($contactDAO->getById($id)) : ?>
        <p>Voulez-vous vraiment supprimer le contact "<?php echo $prenom; ?> <?php echo $nom; ?>" ?</p>
        <form action="delete_contact.php?id=<?php echo $_GET['id']; ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
    <?php else : ?>
        <p> Le contact n'a pas été trouvé. </p>
    <?php endif; ?>

</body>
</html>

