<?php

class ReservationCtl {

    public function userActions() {

        $vehiculeMdl = new VehiculeMdl();
        $reserverMdl = new ReservationMdl();

        if (isset($_GET['action'])) 
        {
            $action = $_GET['action'];

            if( !$this->isConnected() && !in_array($_GET['action'], ['reservation', 'commentaire']) )
            {
                header('location: .');  
                exit;
            }
            
            switch ($action) {

                case "gestionReservation":

                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }
                    $reservations = $reserverMdl->getReservationsDetails();
                    include "vue/gestionReservation.php";
                    break;
                case "reservation":
                    
                    $vehicules = $vehiculeMdl->getVehiculesDispo();
                    
                    $commentaireMdl = new CommentaireMdl();
                    
                    $vehiculesAvecNotes = [];
                    foreach ($vehicules as $vehicule) 
                    {
                        $noteMoyenne = $commentaireMdl->getNoteMoyenne($vehicule->getIdVehicule());
                        $vehiculesAvecNotes[] = [
                            'vehicule' => $vehicule,
                            'note_moyenne' => $noteMoyenne
                        ];
                    }
                    
                    include "vue/reservationVehicule.php";
                    break;
                
                case "ReserverVehicule":

                    $id = $_GET["id"];
                    
                    if(isset($_POST['reserver']))
                    {               
                        extract($_POST);

                        $r = new Reservation(null, null, $date_debut, $date_fin, $id, unserialize($_SESSION["user"])->getIdPersonne());

                        $reserverMdl->ajoutReservation($r);
                        $vehiculeMdl->upadateStatut($id, 0);
                        header("location: ?action=reservation");
                    }

                    include "vue/form/formReservationVehicule.php";
                    break;

                case "mesReservation":

                    $vehicules = $reserverMdl->getVehiculeReserver(unserialize($_SESSION["user"])->getIdPersonne());
                    include "vue/mesReservation.php";
                    break;

                case "annulerReservation":

                    $id_reservation = $_GET["id_reservation"];
                    $id_vehicule = $_GET['id_vehicule'];

                    $reserverMdl->delete("id_reservation", $id_reservation);
                    $vehiculeMdl->upadateStatut($id_vehicule, 1);
                    header('location: ?action=mesReservation');
                    exit;
                
                case "cancelReservation":

                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }
                    $id_reservation = $_GET["id_reservation"];
                    $id_vehicule = $_GET['id_vehicule'];
                    $reserverMdl->delete("id_reservation", $id_reservation);

                    $vehiculeMdl->upadateStatut($id_vehicule, 1);
                    header('location: ?action=gestionReservation');
                    exit;

                case "editReservation":
                    
                    $id_reservation = $_GET["id_reservation"];
                    $reservationToUpdate = $reserverMdl->reservation($id_reservation) ;

                    if(isset($_POST['editRes']))
                    {               
                        $reservationToUpdate->setDateDebut($_POST['date_debut']);
                        $reservationToUpdate->setDateFin($_POST['date_fin']);

                        $reserverMdl->editReservation($reservationToUpdate);
                    }

             
                    include "vue/form/formEditReservation.php";

            }
        }
    }

    function isConnected(){
        return isset($_SESSION['user']) ? true : false;
    }

    function isAdmin(){
        return $this->isConnected() && 
                        unserialize($_SESSION['user'])->getRole() == "ADMIN" 
                        ? true 
                        : false;
    }

}
