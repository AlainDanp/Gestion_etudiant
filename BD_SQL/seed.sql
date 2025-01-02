-- Insertion des utilisateurs (admins et étudiants)
INSERT INTO utilisateurs (nom, prenom, email, role, mot_de_passe) VALUES
    ('Admin', 'Principal', 'admin@etablissement.com', 'admin', MD5('admin123')),
    ('John', 'Doe', 'johndoe@example.com', 'etudiant', MD5('etudiant123')),
    ('Jane', 'Smith', 'janesmith@example.com', 'etudiant', MD5('etudiant123')),
    ('Jpso', 'Piere', 'alain@example.com', 'etudiant', ('etudiant123'));

-- Insertion des classes
INSERT INTO classes (nom, pension) VALUES
   ('6ème', 300.00),
   ('5ème', 350.00),
   ('Terminale', 500.00);

-- Insertion des étudiants
INSERT INTO etudiants (id, matricule, classe_id, email_parent, statut_financier) VALUES
     (2, 'ETU001', 1, 'parent1@example.com', 'insolvable'),
     (3, 'ETU002', 2, 'parent2@example.com', 'solvable');

-- Insertion des paiements
INSERT INTO paiements (etudiant_id, montant, date_versement) VALUES
      (2, 150.00, NOW()),
      (3, 350.00, NOW());

-- Insertion des cours
INSERT INTO cours (nom, classe_id, credit) VALUES
    ('Mathématiques', 1, 5),
    ('Physique', 1, 4),
    ('Chimie', 2, 4),
    ('Anglais', 3, 3);

-- Insertion des notes
INSERT INTO notes (etudiant_id, cours_id, type_note, valeur, annee_scolaire) VALUES
      (2, 1, 'CC', 15, '2023/2024'),
      (2, 1, 'Exam', 14, '2023/2024'),
      (3, 2, 'TP', 12, '2023/2024'),
      (3, 2, 'Exam', 16, '2023/2024');