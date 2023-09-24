<?php
    include_once '../controllers/AddContactController.php'; 
    include_once '../classes/dao/ContactDAO.php'; 
    require_once '../classes/models/ContactModel.php'; 
    require_once '../config/config.php';
    


    $contactDAO = new ContactDAO($pdo);

    $addContactController = new AddContactController($contactDAO);

    $addContactController->addContact();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h1 class="display-6 mb-3 border-bottom border-dark">Ajouter un Contact</h1>
        <div class="form-group mb-3">
            <div class="card bg-light">
                <div class="card-body">
                    <form action="add_contact.php" method="post" class="form">
                        <label for="nom"><strong>Nom :</strong></label>
                        <input type="text" id="nom" name="nom" required class="form-control"><br>

                        <label for="prenom"><strong>Prénom :</strong></label>
                        <input type="text" id="prenom" name="prenom" required class="form-control"><br>

                        <label for="email"><strong>Email :</strong></label>
                        <input type="email" id="email" name="email" class="form-control"><br>

                        <label for="telephone"><strong>Téléphone :<strong></label>
                        <input type="text" id="telephone" name="telephone" class="form-control"><br>

                        <input type="submit" value="Ajouter" class="btn btn-success" class="form-control">
                    </form>
                </div>
            </div>
        </div>
    <a href="../views/home.php" class="btn btn-secondary">Retour à la liste des contacts</a>
</div>
</body>
</html>
