<?php
    class ReservationMdl extends ModelGenerique{
        

        public function editReservation(Reservation $r)
        {
            $query = "UPDATE reservation SET date_debut = :date_debut, date_fin = :date_fin WHERE id_reservation = :id_reservation";

            
            $tab = [
                "date_debut" => $r->getDateDebut(),
                "date_fin" => $r->getDateFin(),
                "id_reservation" => $r->getIdReservation()
            ];
        
            $this->executeReq($query, $tab);
        
            header("location: ?action=mesReservation");
            exit;
        }
        public function reservation(int $id){
    
            $res = $this->executeReq("SELECT * FROM reservation WHERE id_reservation = :id", ["id" => $id]);
    
            extract($res->fetch());
    
            return new Reservation($id, $date_reservation, $date_debut, $date_fin, $id_vehicule, $id_personne);
        }
        public function delete(string $action, int $id)
        {
            $query = "";
            switch ($action){ 

                case "id_reservation":
                    $query = "DELETE FROM reservation WHERE id_reservation = :id";
                    break;
                case "id_personne":
                    $query = "DELETE FROM reservation WHERE id_personne = :id";
                    break;
                case "id_vehicule":
                    $query = "DELETE FROM reservation WHERE id_vehicule = :id";
                    break;
            }
            $this->executeReq($query, ["id" => $id]);      
        }


        public function deleteViaIdPersonne(int $id)
        {
            $query = "DELETE FROM reservation WHERE id = :id_vehicule";
    
            $this->executeReq($query, ["id_vehicule" => $id]);
        }
        
        public function ajoutReservation(Reservation $r) 
        {
            $query = "INSERT INTO reservation VALUES(NULL, now(), :dateDebut, :dateFin, :idVehicule, :idPersonne)";

            $this->executeReq($query, [
                "dateDebut" => $r->getDateDebut(),
                "dateFin" => $r->getDateFin(),
                "idVehicule"=> $r->getIdVehicule(),
                "idPersonne"  => $r->getIdPersonne()
            ]);
        }

        
        public function getReservationsDetails() 
        {
            
            $query = "SELECT r.id_reservation, p.prenom, p.nom, v.id_vehicule, v.marque, v.modele, v.matricule, v.photo, r.date_reservation, r.date_debut, r.date_fin 
            FROM reservation r 
            JOIN personne p ON r.id_personne = p.id_personne 
            JOIN vehicule v ON r.id_vehicule = v.id_vehicule";
  

            $res = $this->executeReq($query);
        
            $tab = [];
        
            while ($c = $res->fetch()) 
            {
                extract($c);
                $tab[] = [
                    'id_reservation' => $id_reservation,
                    'id_vehicule' => $id_vehicule,
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'marque' => $marque,
                    'modele' => $modele,
                    'matricule' => $matricule,
                    'photo' => $photo,
                    'date_reservation' => $date_reservation,
                    'date_debut' => $date_debut,
                    'date_fin' => $date_fin
                ];
            }
        
            return $tab; 
        }
        

        public function getVehiculeReserver($id)
        {
            $query = "SELECT v.*, r.id_reservation, r.date_reservation, r.date_debut, r.date_fin 
                FROM vehicule v 
                JOIN reservation r ON v.id_vehicule = r.id_vehicule 
                WHERE r.id_personne = :id_personne";
        
            $res = $this->executeReq($query, ["id_personne" => $id]);
        
            $tab = [];
        
            while ($c = $res->fetch()) {
                extract($c);
        
                $tab[] = [
                    "id_vehicule" => $id_vehicule,
                    "id_reservation" => $id_reservation,
                    "marque"=> $marque,
                    "modele"=> $modele,
                    "matricule"=> $matricule,
                    "prix_journalier"=> $prix_journalier,
                    "type_vehicule"=> $type_vehicule,
                    "statut_dispo"=> $statut_dispo,
                    "photo"=> $photo,
                    "date_reservation" => $date_reservation,
                    "date_debut" => $date_debut,
                    "date_fin" => $date_fin
                ];
            }
        
            return $tab;
        }
        
    }

?>