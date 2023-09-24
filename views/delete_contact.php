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
    <div class="container">
        <h1 class="display-6 display-6 border-bottom border-dark mb-3">Supprimer un Contact</h1>
        <div class="card mb-3 bg-light">
            <?php if ($contactDAO->getById($id)) : ?>
                <p class="form-control">Voulez-vous vraiment supprimer le contact "<strong><?php echo $prenom; ?> <?php echo $nom; ?>" ?</strong></p>
                <form class="mb-3"action="delete_contact.php?id=<?php echo $_GET['id']; ?>" method="post">
                    <input type="submit" value="Oui, Supprimer" class="btn btn-danger">
                </form>
            <?php else : ?>
                <p class="alert alert-warning"> Le contact n'a pas été trouvé. </p>
            <?php endif; ?>
        </div>  
        <a href="../views/home.php" class="btn btn-primary">Retour à la liste des contacts</a>
    </div>
</body>
</html>

