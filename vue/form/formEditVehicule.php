<div class="container mt-4">
    <h1 class="text-center text-primary mb-4">Modifier Véhicule</h1>

    <div class="d-flex justify-content-center">
        <form action="" method="POST" enctype="multipart/form-data" class="w-75 p-4 border rounded shadow-sm bg-white" id="vehiculeForm">
            
            <div class="mb-3">
                <label for="marque" class="form-label">Marque :</label>
                <input type="text" value="<?= $vehiculeToUpdate->getMarque() ?>" id="marque" name="marque" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="modele" class="form-label">Modèle :</label>
                <input type="text" value="<?= $vehiculeToUpdate->getModele() ?>" id="modele" name="modele" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="matricule" class="form-label">Matricule :</label>
                <input type="text" value="<?= $vehiculeToUpdate->getMatricule() ?>" id="matricule" name="matricule" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="prix_journalier" class="form-label">Prix Journalier :</label>
                <input type="number" value="<?= $vehiculeToUpdate->getPrixJournalier() ?>" id="prix_journalier" name="prix_journalier" class="form-control" min="100" max="350" required>
            </div>

            <div class="mb-3">
                <label for="type_vehicule" class="form-label">Type de Véhicule :</label>
                <input type="text" value="<?= $vehiculeToUpdate->getTypeVehicule() ?>" id="type_vehicule" name="type_vehicule" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="statut_dispo" class="form-label">Statut Disponibilité :</label>
                <select id="statut_dispo" name="statut_dispo" class="form-select" required>
                    <option value="1" <?= $vehiculeToUpdate->getStatutDispo() == 1 ? 'selected' : '' ?>>Disponible</option>
                    <option value="0" <?= $vehiculeToUpdate->getStatutDispo() == 0 ? 'selected' : '' ?>>Indisponible</option>
                </select>
            </div>

            <!-- Photo (Commenté) -->
            <!-- <div class="mb-3">
                <label for="photo" class="form-label">Photo :</label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
            </div> -->

            <button type="submit" name="editVeh" class="btn btn-primary w-100 mt-3">Enregistrer</button>
        </form>
    </div>
</div>
<br>
<script src="public/js/reservationVehicule.js"></script>


