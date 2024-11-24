<?php

class PersonneCtl{

    public function userActions(){

        $personneMdl = new PersonneMdl();
        $commentaireMdl = new CommentaireMdl();
        $reserverMdl = new ReservationMdl();

        if(isset($_GET['action'])){
            $action = $_GET['action'];

            if( !$this->isConnected() && !in_array($_GET['action'], ['reservation', 'commentaire']) )
            {
                header('location: .');  
                exit;
            }
            
            switch($action){
                case "logout": 
                    session_destroy();
                    header("location: .");
                    exit;

                case "gestionUtilisateur":

                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }
                    $users = $personneMdl->getUsers();
    
           
                    include "vue/gestionUtilisateur.php";
                    break;

                case "deleteUser": 
                        
                    $id = $_GET['id'];

                    $commentaireMdl->delete("id_personne",$id);
                    $reserverMdl->delete("id_personne", $id);
                    $personneMdl->delete($id);
        
                    header('location: ?action=gestionUtilisateur');
                    exit;

                case "formUser": 
                        
                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }
                    if (isset($_POST["addUser"])) 
                    {
                        extract($_POST);

                        $p = new Personne(0,$civilite, $prenom, $nom, $login, $email, $role, null, $tel, $mdp);

                        $personneMdl->inserer($p);

                        header('location: ?action=gestionUtilisateur');
                    }
                 
                    include "vue/form/formUser.php";
                    break;

                case "editUser":

                    if( !$this->isAdmin())
                    {
                        session_destroy();
                        header('location: .');
                        exit;
                    }
                    $id = $_GET['id'];
                    
                    $userToUpdate = $personneMdl->personne($id) ;
                    $flag = false;
    
                    if(isset($_POST['editUser']))
                    {      
                        if( !$this->isAdmin())
                        {
                            header('location: .');
                            exit;
                        } 

                        $userToUpdate->setCivilite($_POST["civilite"]);
                        $userToUpdate->setPrenom($_POST["prenom"]);
                        $userToUpdate->setNom($_POST["nom"]);
                        $userToUpdate->setLogin($_POST["login"]);
                        $userToUpdate->setEmail($_POST["email"]);
                        $userToUpdate->setRole($_POST["role"]);
                        $userToUpdate->setTel($_POST["tel"]);

                        if($_POST["mdp"] != "")
                        {
                            $userToUpdate->setMdp($_POST["mdp"]);
                            $flag = true;
                        }
                        
                        $personneMdl->editUser($userToUpdate, $flag);
                        header('location: ?action=gestionUtilisateur');
                    }
    
                    include "vue/form/formEditUtilisateur.php";
                    break;
            }


        }else if( isset($_POST['signup']) )
        {
            extract($_POST);

            $p = new Personne(0,$civilite, $prenom, $nom, $login, $email, "CLIENT", null, $tel, $mdp);

            $personneMdl->inserer($p);
            
        }else if( isset($_POST['signin']) )
        {
            extract($_POST);

            $personneMdl->login($login, $mdp);

            header("location: ?action=mesReservation");
            exit;
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