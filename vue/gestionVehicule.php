<h1 class="text-center">Gestion Véhicule</h1>

<a href="?action=formVehicule" class="btn btn-outline-success mb-3">Ajouter un véhicule</a>



<table class="table table-striped shadow rounded bg-white" >
    <tr class="table-dark">
        <th>Marque</th>
        <th>Modèle</th>
        <th>Matricule</th>
        <th>Prix Journalier</th>
        <th>Type Véhicule</th>
        <th>Statut Disponibilité</th>
        <th>Photo</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($vehicules as $vehicule): ?>
        <tr>
            <td><?= $vehicule->getMarque() ?></td>
            <td><?= $vehicule->getModele() ?></td>
            <td><?= $vehicule->getMatricule() ?></td>
            <td><?= $vehicule->getPrixJournalier() ?></td>
            <td><?= $vehicule->getTypeVehicule() ?></td>
            <td><?= $vehicule->getStatutDispo() == 1 ? 'Disponible' : 'Indisponible' ?></td>
            <td><img src="<?= $vehicule->getPhoto() ?>" alt="Photo véhicule" width="100" /></td>
            <td>
                <a href="?action=editVehicule&id=<?= $vehicule->getIdVehicule() ?>" class="btn btn-outline-success">Modifier</a>
                <a href="?action=deleteVehicule&id=<?= $vehicule->getIdVehicule() ?>" 
                   class="btn btn-outline-danger delete-btn" 
                   data-id="<?= $vehicule->getIdVehicule() ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<script src="public/js/gestionVehicule.js"></script>
<script src="public/js/filtreRecherceVehicule.js"></script>
