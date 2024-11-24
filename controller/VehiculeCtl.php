<?php

class VehiculeCtl {

    public function userActions() {

        $vehiculeMdl = new VehiculeMdl();
        $commentaireMdl = new CommentaireMdl();
        $reserverMdl = new ReservationMdl();

        if (isset($_GET['action'])) {
            $action = $_GET['action'];

            if( !$this->isConnected() && !in_array($_GET['action'], ['reservation', 'commentaire']) )
            {
                header('location: .');  
                exit;
            }


            switch ($action) {
                
                case "gestionVehicule":
                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }

                    $vehicules = $vehiculeMdl->getVehicules();

                    include "vue/gestionVehicule.php";
                    break;

                case "formVehicule":

                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }
                    
                    if (isset($_POST["saveVeh"])) {
                        extract($_POST);

                        $infoFichier = pathinfo($_FILES["photo"]["name"]);

                   
                        if (in_array($infoFichier["extension"], ["png", "jpg", "jpeg"])) 
                        {
                            $cheminImage = "public/images/" . $_FILES["photo"]["name"];

                            move_uploaded_file($_FILES["photo"]["tmp_name"], $cheminImage);
                        }

              
                        $v = new Vehicule(null, $marque, $modele, $matricule, $prix_journalier, $type_vehicule, $statut_dispo, $cheminImage);

                        $vehiculeMdl->ajouterVehicule($v);
                        header('location: ?action=gestionVehicule');
                    }

                    // Après avoir ajouté un véhicule, on récupère la liste des véhicules à afficher
                    $vehicules = $vehiculeMdl->getVehicules();
                    include "vue/form/formVehicule.php";
                    break;

                case "deleteVehicule": 
                        
                    $id = $_GET['id'];

                    $commentaireMdl->delete("id_vehicule", $id);
                    $reserverMdl->delete("id_vehicule",$id);
                    $vehiculeMdl->delete($id);
    
                    header('location: ?action=gestionVehicule');
                    exit;
                
                case "editVehicule":

                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }

                    $id = $_GET['id'];
                    $vehiculeToUpdate = $vehiculeMdl->vehicule($id);

                    if(isset($_POST['editVeh']))
                    {               
                        $vehiculeToUpdate->setMarque($_POST['marque']);
                        $vehiculeToUpdate->setModele($_POST['modele']);
                        $vehiculeToUpdate->setMatricule($_POST['matricule']);
                        $vehiculeToUpdate->setPrixJournalier($_POST['prix_journalier']);
                        $vehiculeToUpdate->setTypeVehicule($_POST['type_vehicule']);
                        $vehiculeToUpdate->setStatutDispo($_POST['statut_dispo']);

                        $vehiculeMdl->editVehicule($vehiculeToUpdate);
                    }

                    include "vue/form/formEditVehicule.php";
                    break;
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
