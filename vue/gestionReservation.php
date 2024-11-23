<h1 class="text-center">Gestion de réservation de véhicule</h1>

<br>
<table class="table table-striped shadow rounded bg-white">
        <tr class="table-dark">
            <th>Prénom</th>
            <th>Nom</th>
            <th>Date Réservation</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Matricule</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        <?php foreach ($reservations as $data): ?>
            <tr>
                <td><?= $data['prenom'] ?></td>
                <td><?= $data['nom'] ?></td>
                <td><?= $data['date_reservation'] ?></td>
                <td><?= $data['date_debut'] ?></td>
                <td><?= $data['date_fin'] ?></td>
                <td><?= $data['marque'] ?></td>
                <td><?= $data['modele'] ?></td>
                <td><?= $data['matricule'] ?></td>
                <td><img src="<?= $data['photo'] ?>" alt="Photo véhicule" width="100"></td>
                <td>
                    <a href="?action=commentaire&id=<?=  $data['id_vehicule'] ?>" class="btn btn-outline-success">Commentaires</a>
                    <a href="?action=cancelReservation&id_reservation=<?= $data['id_reservation'] ?>&id_vehicule=<?= $data['id_vehicule'] ?>" class="btn btn-outline-danger delete-btn">Annuler</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>
<script src="public/js/mesReservation.js"></script>