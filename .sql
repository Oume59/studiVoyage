-- CRÉATION DES ROLES 
CREATE TABLE `Role` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `role` varchar(55) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- CRÉATION DES UTILISATEURS
CREATE TABLE `User` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(55) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `token` varchar(255) DEFAULT NULL,
    `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
    `update_time` timestamp NULL DEFAULT current_timestamp(),
    `last_login` timestamp NULL DEFAULT current_timestamp(),
    `is_banned` tinyint(1) DEFAULT 0,
    `is_verified` tinyint(1) DEFAULT 0,
    `id_role` int(11) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`),
    KEY `id_role` (`id_role`),
    CONSTRAINT `User_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `Role` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 69 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- CRÉATION DES DESTINATIONS (LES CROISIERES)
CREATE TABLE Destinations (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pays VARCHAR(55) NOT NULL
);

-- CRÉATION DES CIRCUITS
CREATE TABLE Circuits (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pays VARCHAR(55) NOT NULL,
    ville VARCHAR(55) NOT NULL,
    prix INT(8) NOT NULL,
    description TEXT NOT NULL,
    img VARCHAR(255),
    duree INT(11) NOT NULL
);

-- CRÉATION DES SEJOURS
CREATE TABLE Sejours (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pays VARCHAR(55) NOT NULL,
    ville VARCHAR(55) NOT NULL,
    prix INT(8) NOT NULL,
    description TEXT NOT NULL,
    img VARCHAR(255),
    duree INT(11) NOT NULL
);

-- CRÉATION DES CROISIERES 
CREATE TABLE Croisieres (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    destination_id INT(11) NOT NULL,
    jours INT(3) NOT NULL,
    prix INT(8) NOT NULL,
    description TEXT NOT NULL,
    img VARCHAR(255),
    duree INT(11) NOT NULL,
    FOREIGN KEY (destination_id) REFERENCES Destinations(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- CRÉATION DES PROMOTIONS
CREATE TABLE Promotions (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pays VARCHAR(55) NOT NULL,
    ville VARCHAR(55) NOT NULL,
    prix INT(8) NOT NULL,
    description TEXT NOT NULL,
    img VARCHAR(255),
    duree INT(11) NOT NULL
);

-- CRÉATION DES OFFRES DE DERNIERE MINUTE
CREATE TABLE DerniereMinutes (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pays VARCHAR(55) NOT NULL,
    ville VARCHAR(55) NOT NULL,
    prix INT(8) NOT NULL,
    description TEXT NOT NULL,
    img VARCHAR(255),
    duree INT(11) NOT NULL
);
