<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un Contact</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Supprimer un Contact</h1>
    <a href="index.php">Retour à la liste des contacts</a>


        <p>Voulez-vous vraiment supprimer le contact "<?php echo "???"; ?> <?php echo ""; ?>" ?</p>
        <form action="supprimer_contact.php?id=<?php echo ""; ?>" method="post">
            <input type="submit" value="Oui, Supprimer">
        </form>
   
        <p>Le contact n'a pas été trouvé.</p>

        <?php
        include_once '../controllers/DeleteContactController.php'; 
        include_once '../classes/dao/ContactDAO.php'; 
        require_once '../classes/models/ContactModel.php'; 
        require_once '../config/config.php';
        


        //Mettre le contact visé par la suprression est récupérer son ID

        $id= "???";

        $deleteContactController = new DeleteContactController($contactDAO);

        $deleteContactController->deleteContact($id);
        ?>


</body>
</html>

