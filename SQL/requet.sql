CREATE DATABASE tour_maroc;

CREATE TABLE utilisateurs (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    mot_de_passe TEXT NOT NULL,
    img text,
    bio text not null,
    points INT DEFAULT 0,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE fans (
PRIMARY KEY (id)
) INHERITS (utilisateurs);

CREATE TABLE admin (
PRIMARY KEY (id)
) INHERITS (utilisateurs);

CREATE TABLE equipes (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) UNIQUE NOT NULL,
    pays VARCHAR(50),
    date_creation DATE
);

CREATE TABLE cyclistes (
    id SERIAL PRIMARY KEY,
    equipe_id INT REFERENCES equipes(id) ON DELETE SET NULL,
    nationalite VARCHAR(50),
    historique TEXT,
    points INT DEFAULT 0
)INHERITS (utilisateurs);


CREATE TABLE categories (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) UNIQUE NOT NULL
);

 CREATE TYPE  diff
   AS
   ENUM('facile', 'Medium', 'diffucile');


CREATE TABLE etapes (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    lieu_depart VARCHAR(255) NOT NULL,
    lieu_arrivee VARCHAR(255) NOT NULL,
    distance_km DECIMAL(5,2) NOT NULL,
    date_depart DATE NOT NULL,
    date_arrive DATE NOT NULL,
    categorie_id INT REFERENCES categories(id) ON DELETE SET NULL, 
    difficulte  diff
);

CREATE TABLE resultats_etapes (
    id SERIAL PRIMARY KEY,
    cycliste_id INT REFERENCES cyclistes(id) ON DELETE CASCADE,
    etape_id INT REFERENCES etapes(id) ON DELETE CASCADE,
    temps_total INTERVAL NOT NULL,
    distance_km DECIMAL(6,2) NOT NULL,
    vitesse_moy DECIMAL(5,2),
    points INT DEFAULT 0,
    classement INT NOT NULL,
    UNIQUE (cycliste_id, etape_id)
);


CREATE TABLE favoris_fans (
    fan_id INT REFERENCES fans(id) ON DELETE CASCADE,
    cycliste_id INT REFERENCES cyclistes(id) ON DELETE CASCADE,
    PRIMARY KEY (fan_id, cycliste_id)
);

CREATE TABLE likes (
    id SERIAL PRIMARY KEY,
    fan_id INT REFERENCES fans(id) ON DELETE CASCADE,
    etape_id INT REFERENCES etapes(id) ON DELETE CASCADE,
    UNIQUE (fan_id, etape_id)
);

CREATE TABLE commentaires (
    id SERIAL PRIMARY KEY,
    fan_id INT REFERENCES fans(id) ON DELETE CASCADE,
    etape_id INT REFERENCES etapes(id) ON DELETE CASCADE,
    contenu TEXT NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE signalements (
    id_signalements SERIAL PRIMARY KEY,
    fan_id INT REFERENCES fans(id) ON DELETE SET NULL,
    etape_id INT REFERENCES etapes(id) ON DELETE CASCADE,
    description TEXT NOT NULL,
    date_signalement TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_archived BOOLEAN
);

CREATE TABLE notifications (
    id_notification SERIAL PRIMARY KEY,
    fan_id INT REFERENCES fans(id) ON DELETE CASCADE,
    etape_id INT REFERENCES etapes(id) ON DELETE CASCADE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE inscriptions (
    fan_id INT REFERENCES fans(id) ON DELETE CASCADE,
    etape_id INT REFERENCES etapes(id) ON DELETE CASCADE,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

