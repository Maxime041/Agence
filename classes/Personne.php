<?php

    class Personne
    {
        private $id_personne;
        private $civilite;
        private $prenom;
        private $nom;
        private $login;
        private $email;
        private $role;
        private $dateInscription;
        private $tel;
        private $mdp;

        // Constructeur
        public function __construct($id_personne, $civilite, $prenom, $nom, $login, $email, $role, $dateInscription, $tel, $mdp) 
        {
            $this->id_personne = $id_personne;
            $this->civilite = $civilite;
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->login = $login;
            $this->email = $email;
            $this->role = $role;
            $this->dateInscription = $dateInscription;
            $this->tel = $tel;
            $this->mdp = $mdp;
        }

        // Accesseurs
        public function getIdPersonne() { return $this->id_personne; }
        public function getCivilite() { return $this->civilite; }
        public function getPrenom() { return $this->prenom; }
        public function getNom() { return $this->nom; }
        public function getLogin() { return $this->login; }
        public function getEmail() { return $this->email; }
        public function getRole() { return $this->role; }
        public function getDateInscription() { return $this->dateInscription; }
        public function getTel() { return $this->tel; }
        public function getMdp() { return $this->mdp; }

        // Mutateurs
        public function setIdPersonne($id_personne) { $this->id_personne = $id_personne; }
        public function setCivilite($civilite) { $this->civilite = $civilite; }
        public function setPrenom($prenom) { $this->prenom = $prenom; }
        public function setNom($nom) { $this->nom = $nom; }
        public function setLogin($login) { $this->login = $login; }
        public function setEmail($email) { $this->email = $email; }
        public function setRole($role) { $this->role = $role; }
        public function setDateInscription($dateInscription) { $this->dateInscription = $dateInscription; }
        public function setTel($tel) { $this->tel = $tel; }
        public function setMdp($mdp) { $this->mdp = $mdp; }
    }

?>
