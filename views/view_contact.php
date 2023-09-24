<?php
        include_once '../controllers/ViewContactController.php'; 
        include_once '../classes/dao/ContactDAO.php'; 
        require_once '../classes/models/ContactModel.php'; 
        require_once '../config/config.php';

        $id= $_GET['id'];

        $contactDAO = new ContactDAO($pdo);

        $viewContactController = new ViewContactController($contactDAO);

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
    <h1>Détails du Contact</h1>
    <a href="../views/home.php">Retour à la liste des contacts</a>
    <?php if ($contact) : ?>
        <p><strong>Nom :</strong> <?php echo $contact['nom']; ?></p>
        <p><strong>Prénom :</strong> <?php echo $contact['prenom']; ?></p>
        <p><strong>Email :</strong> <?php echo $contact['email']; ?></p>
        <p><strong>Téléphone :</strong> <?php echo $contact['telephone']; ?></p>
    <?php else : ?>    
        <p>Le contact n'a pas été trouvé.</p>
    <?php endif; ?>
</body>
</html>

