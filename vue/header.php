<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
    <title>Agence</title>
</head>
<body>

    <header class="bg-secondary p-4 mb-3">
    
        <?php if( isset($_SESSION['user']) ): ?>
            <?php if( unserialize($_SESSION['user'])->getRole() == "ADMIN" ): ?>
                <!-- ADMIN -->
                <a href="?action=gestionVehicule" class="btn btn-info">Gestion des Véhicules</a>
                <a href="?action=gestionReservation" class="btn btn-info">Gestion des Réservations</a>
                <a href="?action=gestionUtilisateur" class="btn btn-info">Gestion des Utilisateurs</a>
            <?php endif; ?>
            <!-- CLIENT -->
            
            <a href="?action=mesReservation" class="btn btn-success">Mes réservation</a>
            <a href="?action=logout" class="btn btn-danger" style="float: right;">Logout</a>
        <?php endif; ?>
        <a href="?action=reservation" class="btn btn-success">Réservation de véhicules</a>
        <p hidden><?= isset($_SESSION["user"]) ? unserialize($_SESSION["user"])->getPrenom() : '' ?></p>

    </header>

    <main class="container-fluid">