
<div class="container mt-4">
    <h1 class="text-center text-primary mb-4">Ajouter Utilisateur</h1>

    <div class="d-flex justify-content-center">
        <form action="" method="POST" onsubmit="return validateForm(event)" class="w-75 shadow p-4 rounded bg-white">
            <div class="mb-3">
                <label for="civilite" class="form-label">Civilité :</label>
                <select id="civilite" name="civilite" class="form-select" required>
                    <option value="Mr">Mr</option>
                    <option value="Mme">Mme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="login" class="form-label">Login :</label>
                <input type="text" id="login" name="login" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" id="email" name="email" class="form-control" maxlength="50" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <select id="role" name="role" class="form-select">
                    <option value="CLIENT">Client</option>
                    <option value="ADMIN">Admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone :</label>
                <input type="text" id="tel" name="tel" class="form-control" maxlength="20" required>
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de Passe :</label>
                <input type="password" id="mdp" name="mdp" class="form-control" required>
            </div>

            <button type="submit" name="addUser" class="btn btn-primary w-100 mt-3">Enregistrer</button>
        </form>
    </div>
</div>
<br>
<script src="public/js/signUp.js"></script>

