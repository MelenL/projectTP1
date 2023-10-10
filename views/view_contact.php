<?php
        include_once '../controllers/ViewContactController.php'; 
        include_once '../classes/dao/ContactDAO.php'; 
        require_once '../classes/models/ContactModel.php'; 
        require_once '../config/config.php';

        $id= $_GET['id'];
        global $pdo;
        $contactDAO = new ContactDAO($pdo);

        $viewContactController = new ViewContactController();

        $contact = $viewContactController->viewContact($id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détails du Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="display-6 display-6 border-bottom border-dark mb-3">Détails du Contact</h1>
        <div class="card mb-3 bg-light">
        <?php if ($contact) : ?>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nom :</strong> <?php echo $contact['nom']; ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Prénom :</strong> <?php echo $contact['prenom']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Email :</strong> <?php echo $contact['email']; ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Téléphone :</strong> <?php echo $contact['telephone']; ?></p>
                </div>
            </div>
        <?php else : ?>     
                <p class="alert alert-warning">Le contact n'a pas été trouvé.</p>
            <?php endif; ?>
        </div>    
        <a href="../views/home.php" class="btn btn-secondary">Retour à la liste des contacts</a>
    <div class="container">
</body>
</html>

