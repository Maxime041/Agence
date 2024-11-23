<div class="container mt-4"></div>
    <h1 class="text-center text-primary mb-4">Location de véhicule</h1>
    <div class="d-flex justify-content-center">
        <form id="reservationForm" action="" method="POST" class="w-75 shadow p-4 rounded bg-white">
            <div class="form-group mt-3">
                <label for="date_debut">Date de Début :</label>
                <input type="date" id="date_debut" name="date_debut" class="form-control" required>
            </div>

            <div class="form-group mt-3">
                <label for="date_fin">Date de Fin :</label>
                <input type="date" id="date_fin" name="date_fin" class="form-control" required>
            </div>

            <button type="submit" name="reserver" class="btn btn-primary mt-2">Enregistrer Réservation</button>
        </form>
    </div>
</div>
<br>
<script src="public/js/reservationVehicule.js"></script>