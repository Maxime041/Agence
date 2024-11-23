<?php
    class VehiculeMdl extends ModelGenerique{
        

        public function upadateStatut(int $id, int $statut) : void
        {
            $query = "UPDATE vehicule SEt statut_dispo = :statutDispo WHERE id_vehicule = :id";

            $this->executeReq($query, ["statutDispo"=> $statut ,"id"=> $id ]);
        }
        public function editVehicule(Vehicule $v)
        {
            $query = "UPDATE vehicule SET 
                        marque = :marque, 
                        modele = :modele, 
                        matricule = :matricule, 
                        prix_journalier = :prixJournalier, 
                        type_vehicule = :typeVehicule, 
                        statut_dispo = :statutDispo 
                      WHERE id_vehicule = :id";
            
            $tab = [
                "marque" => $v->getMarque(),
                "modele" => $v->getModele(),
                "matricule" => $v->getMatricule(),
                "prixJournalier" => $v->getPrixJournalier(),
                "typeVehicule" => $v->getTypeVehicule(),
                "statutDispo" => $v->getStatutDispo(),
                "id" => $v->getIdVehicule()
            ];
        
            $this->executeReq($query, $tab);
        
            header("location: ?action=gestionVehicule");
            exit;
        }
        

        public function delete(int $id){
            $query = "DELETE FROM vehicule WHERE id_vehicule = :id";
    
            $this->executeReq($query, ["id" => $id]);
        }

        public function ajouterVehicule(Vehicule $v) 
        {
            $query = "INSERT INTO vehicule VALUES(NULL, :marque, :modele, :matricule, :prixJournalier, :typeVehicule, :statutDispo, :photo)";

            $this->executeReq($query, [
                "marque" => $v->getMarque(),
                "modele" => $v->getModele(),
                "matricule"=> $v->getMatricule(),
                "prixJournalier"  => $v->getPrixJournalier(),
                "typeVehicule"=> $v->getTypeVehicule(),
                "statutDispo"=> $v->getStatutDispo(),
                "photo"   => $v->getPhoto()
            ]);

            header("location: ?action=gestionVehicule");
            exit;
        }

        public function vehicule(int $id){
    
            $res = $this->executeReq("SELECT * FROM vehicule WHERE id_vehicule = :id", ["id" => $id]);
    
            extract($res->fetch());
    
            return new Vehicule($id, $marque, $modele, $matricule, $prix_journalier, $type_vehicule, $statut_dispo, $photo);
        }


        public function getVehiculesDispo(){
        
    
            $res = $this->executeReq("SELECT * FROM vehicule WHERE statut_dispo = 1");
    
            $tab = [];
            
            while($c = $res->fetch()){
                extract($c);
    
                $tab[] = new Vehicule($id_vehicule, $marque, $modele, $matricule, $prix_journalier, $type_vehicule, $statut_dispo, $photo);
            }
            
            return $tab;
        }
        
        public function getVehicules(){
        
    
            $res = $this->executeReq("SELECT * FROM vehicule");
    
            $tab = [];
            
            while($c = $res->fetch()){
                extract($c);
    
                $tab[] = new Vehicule($id_vehicule, $marque, $modele, $matricule, $prix_journalier, $type_vehicule, $statut_dispo, $photo);
            }
            
            return $tab;
        }

    }

?>