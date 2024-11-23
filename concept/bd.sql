CREATE TABLE vehicule(
   id_vehicule INT AUTO_INCREMENT,
   marque VARCHAR(25),
   modele VARCHAR(25),
   matricule VARCHAR(25),
   prix_journalier DECIMAL(7,2),
   type_vehicule VARCHAR(25),
   statut_dispo int(1) DEFAULT 1,
   photo VARCHAR(100),
   PRIMARY KEY(id_vehicule),
   UNIQUE(matricule)
)ENGINE=InnoDB;

CREATE TABLE personne(
   id_personne INT AUTO_INCREMENT,
   civilite VARCHAR(25),
   prenom VARCHAR(25),
   nom VARCHAR(25),
   login VARCHAR(25),
   email VARCHAR(50),
   role VARCHAR(15) DEFAULT "CLIENT",
   date_inscription DATETIME DEFAULT CURRENT_TIMESTAMP,
   tel VARCHAR(20),
   mdp VARCHAR(100),
   PRIMARY KEY(id_personne),
   UNIQUE(login),
   UNIQUE(tel)
)ENGINE=InnoDB;

CREATE TABLE commentaire(
   id_comment INT AUTO_INCREMENT,
   commentaire TEXT,
   datecommenataire DATETIME DEFAULT CURRENT_TIMESTAMP,
   note INT,
   id_vehicule INT NOT NULL,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_comment),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id_vehicule),
   FOREIGN KEY(id_personne) REFERENCES personne(id_personne)
)ENGINE=InnoDB;

CREATE TABLE reservation(
   id_reservation INT AUTO_INCREMENT,
   date_reservation DATETIME DEFAULT CURRENT_TIMESTAMP,
   date_debut DATE,
   date_fin DATE,
   id_vehicule INT NOT NULL,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_reservation),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id_vehicule),
   FOREIGN KEY(id_personne) REFERENCES personne(id_personne)
)ENGINE=InnoDB;
