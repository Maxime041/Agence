<?php

    class Commentaire
    {
        private $id_comment;
        private $commentaire;
        private $datecommentaire;
        private $note;
        private $id_vehicule;
        private $id_personne;

        // Constructeur
        public function __construct($id_comment, $commentaire, $datecommentaire, $note, $id_vehicule, $id_personne)
        {
            $this->id_comment = $id_comment;
            $this->commentaire = $commentaire;
            $this->datecommentaire = $datecommentaire;
            $this->note = $note;
            $this->id_vehicule = $id_vehicule;
            $this->id_personne = $id_personne;
        }

        // Accesseurs
        public function getIdComment() { return $this->id_comment; }
        public function getCommentaire() { return $this->commentaire; }
        public function getDateCommentaire() { return $this->datecommentaire; }
        public function getNote() { return $this->note; }
        public function getIdVehicule() { return $this->id_vehicule; }
        public function getIdPersonne() { return $this->id_personne; }

        // Mutateurs
        public function setIdComment($id_comment) { $this->id_comment = $id_comment; }
        public function setCommentaire($commentaire) { $this->commentaire = $commentaire; }
        public function setDateCommentaire($datecommentaire) { $this->datecommentaire = $datecommentaire; }
        public function setNote($note) { $this->note = $note; }
        public function setIdVehicule($id_vehicule) { $this->id_vehicule = $id_vehicule; }
        public function setIdPersonne($id_personne) { $this->id_personne = $id_personne; }
    }

?>
