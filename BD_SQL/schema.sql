CREATE DATABASE IF NOT EXISTS systeme_Tp;


-- Création de la table utilisateurs
CREATE TABLE utilisateurs (
 id INT AUTO_INCREMENT PRIMARY KEY,
 nom VARCHAR(100) NOT NULL,
 prenom VARCHAR(100) NOT NULL,
 email VARCHAR(150) UNIQUE NOT NULL,
 role ENUM('admin', 'etudiant') NOT NULL,
 mot_de_passe VARCHAR(255) NOT NULL,
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- Création de la table classes
CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    pension FLOAT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
-- Création de la table etudiants
CREATE TABLE etudiants (
    id INT PRIMARY KEY, -- Référence à utilisateurs.id
    matricule VARCHAR(50) UNIQUE NOT NULL,
    classe_id INT,
    email_parent VARCHAR(150) NOT NULL,
    statut_financier ENUM('insolvable', 'solvable') DEFAULT 'insolvable',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (classe_id) REFERENCES classes(id) ON DELETE SET NULL,
    FOREIGN KEY (id) REFERENCES utilisateurs(id) ON DELETE CASCADE
);
-- Création de la table paiements
CREATE TABLE paiements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    montant FLOAT NOT NULL,
    date_versement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE
);
-- Création de la table cours
CREATE TABLE cours (
     id INT AUTO_INCREMENT PRIMARY KEY,
     nom VARCHAR(100) NOT NULL,
     classe_id INT NOT NULL,
     credit INT NOT NULL,
     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
     FOREIGN KEY (classe_id) REFERENCES classes(id) ON DELETE CASCADE
);
-- Création de la table notes
CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    etudiant_id INT NOT NULL,
    cours_id INT NOT NULL,
    type_note ENUM('CC', 'TP', 'Exam', 'Rattrapage') NOT NULL,
    valeur FLOAT NOT NULL,
    annee_scolaire VARCHAR(9) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (etudiant_id) REFERENCES etudiants(id) ON DELETE CASCADE,
    FOREIGN KEY (cours_id) REFERENCES cours(id) ON DELETE CASCADE
);