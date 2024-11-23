<h1 class="text-center">Mes reservation</h1>

<br>
<table class="table table-striped shadow rounded bg-white">
        <tr class="table-dark">
            <th>Marque</th>
            <th>Modèle</th>
            <th>Matricule</th>
            <th>Prix Journalier</th>
            <th>Type Véhicule</th>
            <th>Date réservation</th>
            <th>Date début</th>
            <th>Date fin</th>
            <th>Photo</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($vehicules as $data): ?>
            <tr>
                <td> <?= $data["marque"] ?> </td>
                <td> <?= $data["modele"] ?> </td>
                <td> <?= $data["matricule"] ?> </td>
                <td> <?= $data["prix_journalier"] ?> </td>
                <td> <?= $data["type_vehicule"] ?> </td>
                <td> <?= $data["date_reservation"] ?> </td>
                <td> <?= $data["date_debut"] ?> </td>
                <td> <?= $data["date_fin"] ?> </td>
                <td> <img src="<?= $data["photo"] ?>" alt="Photo véhicule" width="100" /> </td>
                <td>
                <a href="?action=ajoutCommentaire&id=<?= $data["id_vehicule"] ?>" class="btn btn-outline-info">Ajouter Commentaire</a>
                    <a href="?action=editReservation&id_reservation=<?= $data["id_reservation"] ?>" class="btn btn-outline-success edit-btn" date-debut="<?= $data["date_debut"] ?>">Modifier</a>
                    <a href="?action=annulerReservation&id_reservation=<?= $data["id_reservation"] ?>&id_vehicule=<?= $data["id_vehicule"] ?>" class="btn btn-outline-danger delete-btn" date-debut="<?= $data["date_debut"] ?>">Annuler</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>
<script src="public/js/mesReservation.js"></script>
