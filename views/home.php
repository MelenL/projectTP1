<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Contacts</title>
    <!-- Ajoutez ici vos liens CSS ou styles pour la mise en forme -->
</head>
<body>
    <h1>Liste des Contacts</h1>
    <a href="add_contact.php">Ajouter un contact</a>


        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Pr�nom</th>
                    <th>Email</th>
                    <th>T�l�phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td><?php echo ???; ?></td>
                        <td><?php echo ???; ?></td>
                        <td><?php echo ???; ?></td>
                        <td><?php echo ???; ?></td>
                        <td>
                            <a href="voir_contact.php?id=<?php echo echo ???; ?>">Voir</a>
                            <a href="modifier_contact.php?id=<?php echo ???; ?>">Modifier</a>
                            <a href="supprimer_contact.php?id=<?php echo ???; ?>">Supprimer</a>
                        </td>
                    </tr>
            
            </tbody>
        </table>

        <p>Aucun contact trouv�.</p>

</body>
</html>

