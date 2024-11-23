<?php
session_start();

include "classes/Commentaire.php";
include "classes/Personne.php";
include "classes/Reservation.php";
include "classes/Vehicule.php";

include "controller/PersonneCtl.php";
include "controller/VehiculeCtl.php";
include "controller/ReservationCtl.php";
include "controller/CommentaireCtl.php";

include "model/ModelGenerique.php";
include "model/PersonneMdl.php";
include "model/VehiculeMdl.php";
include "model/ReservationMdl.php";
include "model/CommentaireMdl.php";

include "vue/header.php";
$PersonneCtl = new PersonneCtl();
$VehiculeCtl = new VehiculeCtl();
$reservationCtl = new ReservationCtl();
$commentaireCtl = new CommentaireCtl();

$PersonneCtl->userActions();
$VehiculeCtl->userActions();
$reservationCtl->userActions();
$commentaireCtl->userActions();


if( !isset($_GET['action']) ){
    include "vue/signUp.php";
}
include "vue/footer.php";
