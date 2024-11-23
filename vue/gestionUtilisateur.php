

<h1 class="text-center">Gestion Utilisateurs</h1>

<a href="?action=formUser" class="btn btn-outline-success">Ajouter un utilisateur</a>
<br><br>

<table class="table table-striped  shadow  rounded bg-white">
        <tr class="table-dark">
            <th>Civilite</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Login</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date inscription</th>
            <th>téléphone</th>
            <th>Mot de passe</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td> <?= $user->getCivilite() ?> </td>
                <td> <?= $user->getPrenom() ?> </td>
                <td> <?= $user->getNom() ?> </td>
                <td> <?= $user->getLogin() ?> </td>
                <td> <?= $user->getEmail() ?> </td>
                <td> <?= $user->getRole() ?> </td>
                <td> <?= $user->getDateInscription() ?> </td>
                <td> <?= $user->getTel() ?> </td>
                <td><?= substr($user->getMdp(), 0,  15) ?>...</td>
                <td>
                    <a href="?action=editUser&id=<?= $user->getIdPersonne() ?>" class="btn btn-outline-success">Modifier</a>
                    <a href="?action=deleteUser&id=<?= $user->getIdPersonne() ?>" class="btn btn-outline-danger delete-btn" 
                       data-id="<?= $user->getIdPersonne() ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>


<script src="public/js/gestionUtilisateur.js"></script>
