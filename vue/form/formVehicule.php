<div class="container mt-4">
    <h1 class="text-center text-primary mb-4">Ajouter Véhicule</h1>

    <div class="d-flex justify-content-center">
        <form action="" method="POST" enctype="multipart/form-data" class="w-75 shadow p-4 rounded bg-white" id="vehiculeForm">
            <div class="mb-3">
                <label for="marque" class="form-label">Marque :</label>
                <input type="text" id="marque" name="marque" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="modele" class="form-label">Modèle :</label>
                <input type="text" id="modele" name="modele" class="form-control" maxlength="25" required>
             </div>

            <div class="mb-3">
                <label for="matricule" class="form-label">Matricule :</label>
                <input type="text" id="matricule" name="matricule" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="prix_journalier" class="form-label">Prix Journalier :</label>
                <input type="number" id="prix_journalier" name="prix_journalier" class="form-control" min="100" max="350" required>
            </div>

            <div class="mb-3">
                <label for="type_vehicule" class="form-label">Type de Véhicule :</label>
                <input type="text" id="type_vehicule" name="type_vehicule" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="statut_dispo" class="form-label">Statut Disponibilité :</label>
                <select id="statut_dispo" name="statut_dispo" class="form-select" required>
                    <option value="1">Disponible</option>
                    <option value="0">Indisponible</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo :</label>
                <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" name="saveVeh" class="btn btn-primary w-100 mt-3">Enregistrer</button>
        </form>
    </div>
</div>
<br>
<script src="public/js/gestionVehiculeAdd.js"></script>
