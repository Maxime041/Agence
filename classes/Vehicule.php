<?php

    class Vehicule
    {
        private $id_vehicule;
        private $marque;
        private $modele;
        private $matricule;
        private $prix_journalier;
        private $type_vehicule;
        private $statut_dispo;
        private $photo;

        // Constructeur
        public function __construct($id_vehicule, $marque, $modele, $matricule, $prix_journalier, $type_vehicule, $statut_dispo, $photo)
        {
            $this->id_vehicule = $id_vehicule;
            $this->marque = $marque;
            $this->modele = $modele;
            $this->matricule = $matricule;
            $this->prix_journalier = $prix_journalier;
            $this->type_vehicule = $type_vehicule;
            $this->statut_dispo = $statut_dispo;
            $this->photo = $photo;
        }

        // Accesseurs
        public function getIdVehicule() { return $this->id_vehicule; }
        public function getMarque() { return $this->marque; }
        public function getModele() { return $this->modele; }
        public function getMatricule() { return $this->matricule; }
        public function getPrixJournalier() { return $this->prix_journalier; }
        public function getTypeVehicule() { return $this->type_vehicule; }
        public function getStatutDispo() { return $this->statut_dispo; }
        public function getPhoto() { return $this->photo; }

        // Mutateurs
        public function setIdVehicule($id_vehicule) { $this->id_vehicule = $id_vehicule; }
        public function setMarque($marque) { $this->marque = $marque; }
        public function setModele($modele) { $this->modele = $modele; }
        public function setMatricule($matricule) { $this->matricule = $matricule; }
        public function setPrixJournalier($prix_journalier) { $this->prix_journalier = $prix_journalier; }
        public function setTypeVehicule($type_vehicule) { $this->type_vehicule = $type_vehicule; }
        public function setStatutDispo($statut_dispo) { $this->statut_dispo = $statut_dispo; }
        public function setPhoto($photo) { $this->photo = $photo; }
    }

?>
