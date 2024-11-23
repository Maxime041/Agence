<div class="container mt-4">
    <h1 class="text-center text-primary mb-4">Modifier un utilisateur</h1>
    <div class="d-flex justify-content-center">
        <form action="" method="POST" class="w-75 shadow p-4 rounded bg-white">
            

            <div class="mb-3">
                <label for="civilite" class="form-label">Civilité :</label>
                <select id="civilite" name="civilite" class="form-select" required>
                    <option value="Mr" <?= $userToUpdate->getCivilite() == 'Mr' ? 'selected' : '' ?>>Mr</option>
                    <option value="Mme" <?= $userToUpdate->getCivilite() == 'Mme' ? 'selected' : '' ?>>Mme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" value="<?= $userToUpdate->getPrenom() ?>" id="prenom" name="prenom" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" value="<?= $userToUpdate->getNom() ?>" id="nom" name="nom" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="login" class="form-label">Login :</label>
                <input type="text" value="<?= $userToUpdate->getLogin() ?>" id="login" name="login" class="form-control" maxlength="25" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" value="<?= $userToUpdate->getEmail() ?>" id="email" name="email" class="form-control" maxlength="50" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <select id="role" name="role" class="form-select">
                    <option value="CLIENT" <?= $userToUpdate->getRole() == 'CLIENT' ? 'selected' : '' ?>>Client</option>
                    <option value="ADMIN" <?= $userToUpdate->getRole() == 'ADMIN' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label">Téléphone :</label>
                <input type="text" value="<?= $userToUpdate->getTel() ?>" id="tel" name="tel" class="form-control" maxlength="20" required>
            </div>

            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de Passe :</label>
                <input type="password" id="mdp" name="mdp" class="form-control" placeholder="Remplir pour modifier le mot de passe">
            </div>

            <button type="submit" name="editUser" class="btn btn-primary w-100 mt-3">Enregistrer</button>
        </form>
    </div>
</div>
<br>
