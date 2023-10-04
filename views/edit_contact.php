<?php

require_once('/Applications/MAMP/htdocs/projectTP1/controllers/EditContactController.php');
include '../config/config.php';

$id = $_GET['id'];
global $pdo;
$contactDAO = new ContactDAO($pdo);

$prenom = $contactDAO->getById($id)['prenom'] ?? ""; //Dans le cas où c'est null.
$nom = $contactDAO->getById($id)['nom'] ?? "";
$email = $contactDAO->getById($id)['email'] ?? "";
$telephone = $contactDAO->getById($id)['telephone'] ?? "";

$editContactController = new EditContactController();
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
    <div class="container">
        <h1 class="display-6 mb-3 border-bottom border-dark">Modifier un Contact</h1>
        <div class="form-group mb-3">
            <div class="card bg-light">
                <div class="card-body">
                    <?php if ($contactDAO->getById($id)): ?>
                        <form action="edit_contact.php?id=<?php echo $_GET['id']; ?>" method="post" class="form">
                            <div class="form-group">
                                <label for="nom"><strong>Nom :</strong></label>
                                <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required
                                    class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label for="prenom"><strong>Prénom :</strong></label>
                                <input type="text" id="prenom" name="prenom" value="<?php echo $prenom; ?>" required
                                    class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label for="email"><strong>Email :</strong></label>
                                <input type="email" id="email" name="email" value="<?php echo $email; ?>"
                                    class="form-control"><br>
                            </div>

                            <div class="form-group">
                                <label for="telephone"><strong>Téléphone :</strong></label>
                                <input type="text" id="telephone" name="telephone" value="<?php echo $telephone; ?>"
                                    class="form-control"><br>
                            </div>
                            <input type="submit" value="Modifier" class="btn btn-success" href="../views/home.php">

                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <p class="alert alert-warning">Le contact n'a pas été trouvé.</p>
        <?php endif; ?>
        <a href="../views/home.php" class="btn btn-secondary">Retour à la liste des contacts</a>
        <div class="container">


</body>

</html>