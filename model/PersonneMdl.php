<?php
    class PersonneMdl extends ModelGenerique{
        
        public function editUser(Personne $p, bool $flag)
        {
            if($flag)
            {
                $query = "UPDATE personne SET civilite = :civilite, prenom = :prenom, nom = :nom, login = :login, email = :email, role = :role,tel = :tel, mdp = :mdp WHERE id_personne = :id";
    
                $tab = [
                    "civilite" => $p->getCivilite(),
                    "prenom" => $p->getPrenom(),
                    "nom" => $p->getNom(),
                    "login" => $p->getLogin(),
                    "email" => $p->getEmail(),
                    "role" => $p->getRole(),
                    "tel"=> $p->getTel(),
                    "mdp" => password_hash($p->getMdp(), PASSWORD_DEFAULT),
                    "id" => $p->getIdPersonne()
                ];
            }
            else
            {
                $query = "UPDATE personne SET civilite = :civilite, prenom = :prenom, nom = :nom, login = :login, email = :email, role = :role, tel = :tel WHERE id_personne = :id";

                $tab = [
                    "civilite" => $p->getCivilite(),
                    "prenom" => $p->getPrenom(),
                    "nom" => $p->getNom(),
                    "login" => $p->getLogin(),
                    "email" => $p->getEmail(),
                    "role" => $p->getRole(),
                    "tel"=> $p->getTel(),
                    "id" => $p->getIdPersonne()
                ];
            }
        
            $this->executeReq($query, $tab);
        
            header("location: ?action=gestionUtilisateur");
            exit;
        }

        public function delete(int $id){
            $query = "DELETE FROM personne WHERE id_personne = :id";
    
            $this->executeReq($query, ["id" => $id]);
        }

        public function personne(int $id)
        {
    
            $res = $this->executeReq("SELECT * FROM personne WHERE id_personne = :id", ["id" => $id]);
    
            extract($res->fetch());
    
            return new Personne($id, $civilite, $prenom, $nom, $login, $email, $role, $date_inscription, $tel, $mdp);
        }
        

        public function getUsers(){
        
    
            $res = $this->executeReq("SELECT * FROM personne");
    
            $tab = [];
            
            while($c = $res->fetch()){
                extract($c);

                $tab[] = new Personne($id_personne, $civilite, $prenom, $nom, $login, $email, $role, $date_inscription, $tel, $mdp);
            }
            
            return $tab;
        }

        public function inserer(Personne $p){
            $query = "INSERT INTO personne VALUES(NULL, :civilite, :prenom, :nom, :login, :email, :role, now(), :tel, :mdp)";

            $this->executeReq($query, [
                "civilite" => $p->getCivilite(),
                "prenom" => $p->getPrenom(),
                "nom"=> $p->getNom(),
                "login"  => $p->getLogin(),
                "email"=> $p->getEmail(),
                "role"=> $p->getRole(),
                "tel"=> $p->getTel(),
                "mdp"   => password_hash($p->getMdp(), PASSWORD_DEFAULT)
            ]);

            
        }

        public function login(string $login, string $mdp){
            $query = "SELECT * FROM personne WHERE login = ?";

            $stmt = $this->pdo->prepare($query);

            $stmt->execute([$login]);

            //SI LOGIN EST TROUVE DANS BD
            if($stmt->rowCount() != 0){
                $res = $stmt->fetch();
                //TEST SUR MDP
                if( password_verify($mdp, $res['mdp']) ){
                    extract($res);

                    $p = new Personne($id_personne, $civilite, $prenom, $nom, $login, $email, $role, $date_inscription, $tel, $mdp);

                    //SESSION
                    $_SESSION['user'] = serialize($p);

                    return $_SESSION['user'];
                }
            }
            
        }
    }

?>