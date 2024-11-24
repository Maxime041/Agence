<h1 class="text-center">Réservation de vehicule</h1>

<br>
<div class="mb-3">
    <input type="text" id="maRecherche" class="form-control" placeholder="Rechercher par marque, modèle ou type...">
</div>
<table class="table table-striped shadow rounded bg-white" id="tableau">
    <tr class="table-dark">
        <th>Marque</th>
        <th>Modèle</th>
        <th>Matricule</th>
        <th>Prix Journalier</th>
        <th>Type Véhicule</th>
        <th>Note Moyenne</th> 
        <th>Photo</th>
        <th>Actions</th>
    </tr>
        <?php foreach ($vehiculesAvecNotes as $data): ?>
            <tr>
                <td><?= $data['vehicule']->getMarque() ?></td>
                <td><?= $data['vehicule']->getModele() ?></td>
                <td><?= $data['vehicule']->getMatricule() ?></td>
                <td><?= $data['vehicule']->getPrixJournalier() ?></td>
                <td><?= $data['vehicule']->getTypeVehicule() ?></td>
                <td>
                    <?php if ($data['note_moyenne'] !== null): ?>
                        <?php 
                        $note = round($data['note_moyenne']);
                        for ($i = 1; $i <= 5; $i++) 
                        {
                            if ($i <= $note) 
                            {
                                echo '&#9733;'; // Étoile pleine
                            } else {
                                echo '&#9734;'; // Étoile vide
                            }
                        }
                        ?>
                    <?php else: ?>
                        Pas de note
                    <?php endif; ?>
                </td>
                <td><img src="<?= $data['vehicule']->getPhoto() ?>" alt="Photo véhicule" width="100"></td>
                <td>
                <?php if( isset($_SESSION['user']) ): ?>
                    <a href="?action=ReserverVehicule&id=<?= $data['vehicule']->getIdVehicule() ?>" class="btn btn-outline-success">Louer</a>
                <?php endif; ?>
                    <a href="?action=commentaire&id=<?= $data['vehicule']->getIdVehicule() ?>" class="btn btn-outline-success">Commentaires</a>
                </td>
            </tr>
        <?php endforeach; ?>
</table>
<script src="public/js/filtreRecherceVehicule.js"></script>