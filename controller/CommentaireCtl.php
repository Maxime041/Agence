<?php

class CommentaireCtl {

    public function userActions() {

        $commentaireMdl = new CommentaireMdl();

        if (isset($_GET['action'])) 
        {
            $action = $_GET['action'];

            if( !$this->isConnected() && !in_array($_GET['action'], ['reservation', 'commentaire']) )
            {
                header('location: .');  
                exit;
            }

            switch ($action) {
                case "ajoutCommentaire":
                    $id = $_GET['id']; 
                    if (isset($_POST["addCom"])) 
                    {
                        extract($_POST);

                        $c = new Commentaire(null, $commentaire, null, $note, $id, unserialize($_SESSION["user"])->getIdPersonne());

                        $commentaireMdl->ajoutCommentaire($c);

                        header("location: ?action=mesReservation");
                    }
                   
                    $commentaires = $commentaireMdl->getCommentairesParVehicule($id);
                   
                    include "vue/form/formCommentaire.php";
                    break;

                case "commentaire":
                
                    $id = $_GET['id']; 
                    
                    $commentaires = $commentaireMdl->getCommentairesParVehicule($id);
                    
                    include "vue/ConsultCommentaire.php";
                    break;
            }
        }
    }

    function isConnected(){
        return isset($_SESSION['user']) ? true : false;
    }

}
