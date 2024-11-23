<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription / Connexion</title>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-primary mb-4">Inscription / Connexion</h2>

        <div class="row">
            <div class="col-lg-6 mb-4">
                <h3 class="text-center text-secondary mb-3">Inscription</h3>
                <form action="" method="POST" onsubmit="return validateForm(event)" class="p-4 border rounded shadow-sm bg-white">
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
                        <label for="tel" class="form-label">Téléphone :</label>
                        <input type="text" id="tel" name="tel" class="form-control" maxlength="20" required>
                    </div>

                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de Passe :</label>
                        <input type="password" id="mdp" name="mdp" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-outline-success w-100 mt-3" name="signup" >S'inscrire</button>
                </form>
            </div>

            <div class="col-lg-6">
                <h3 class="text-center text-secondary mb-3">Connexion</h3>
                <form action="" method="POST"  class="p-4 border rounded shadow-sm bg-white">
                    <div class="mb-3">
                        <label for="login" class="form-label">Login :</label>
                        <input type="text" id="login" name="login" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="mdp" class="form-label">Mot de Passe :</label>
                        <input type="password" id="mdp" name="mdp" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-outline-success w-100 mt-3" name="signin">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="public/js/signUp.js"></script>
</html>
