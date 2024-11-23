<?php
    class CommentaireMdl extends ModelGenerique
    {

        public function getCommentairesParVehicule($idVehicule)
        {
            $query = "SELECT c.commentaire, c.note, c.datecommenataire, p.prenom, p.nom
                    FROM commentaire c
                    JOIN personne p ON c.id_personne = p.id_personne
                    WHERE c.id_vehicule = :id_vehicule
                    ORDER BY c.datecommenataire DESC";
            return $this->executeReq($query, ["id_vehicule" => $idVehicule])->fetchAll();
        }

        public function ajoutCommentaire(Commentaire $c){
            $query = "INSERT INTO commentaire VALUES(NULL, :commentaire, now(), :note, :id_vehicule, :id_personne)";

            $this->executeReq($query, [
                "commentaire" => $c->getCommentaire(),
                "note" => $c->getNote(),
                "id_vehicule"=> $c->getIdVehicule(),
                "id_personne"  => $c->getIdPersonne()
            ]); 
        }

        public function getNoteMoyenne($idVehicule)
        {
            $query = "SELECT AVG(note) AS note_moyenne FROM commentaire WHERE id_vehicule = :id_vehicule";
            $result = $this->executeReq($query, ["id_vehicule" => $idVehicule])->fetch();
            return $result['note_moyenne'] ? $result['note_moyenne'] : null; 
        }

        public function delete(string $action, int $id)
        {
            $query = "";
            switch ($action){ 

                case "id_personne":
                    $query = "DELETE FROM commentaire WHERE id_personne = :id";
                    break;
                case "id_vehicule":
                    $query = "DELETE FROM commentaire WHERE id_vehicule = :id";
                    break;
            }
            
            $this->executeReq($query, ["id" => $id]);
        }

        
    }

?>