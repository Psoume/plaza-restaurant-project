CREATE DATABASE plaza; 

CREATE TABLE Categories (
    CategorieID int NOT NULL AUTO_INCREMENT,
    NomCategorie varchar(255) NOT NULL,
    PRIMARY KEY (CategorieID),
);

CREATE TABLE Plats (
    PlatID int NOT NULL AUTO_INCREMENT,
    NomPlat varchar(255) NOT NULL,
    CategoriePlat int NOT NULL,
    PRIMARY KEY (PlatID),
    FOREIGN KEY (CategoriePlat) REFERENCES Categorie(CategorieID)
);

CREATE TABLE Images (
    ImageID int NOT NULL AUTO_INCREMENT,
    NomImage varchar(255) NOT NULL,
    EmplacementImage varchar(255) NOT NULL,
    PRIMARY KEY (ImageID)
);

CREATE TABLE Administrateurs (
    AdminID int NOT NULL AUTO_INCREMENT,
    NomAdmin varchar(255) NOT NULL,
    PrenomAdmin varchar(255) NOT NULL,
    MDPAdmin varchar(255),
    PRIMARY KEY (AdminID)
);

INSERT INTO Categories (NomCategorie)
VALUES (Entrées),(Plats),(Desserts); 

INSERT INTO Plats(NomPlat,CategoriePlat)
VALUES (Salade,1),(Moussaka,1),(Pizza,2),(Frites,2),(Tiramisu,3),(Chocolatine,3);

-- INSERT INTO Image

INSERT INTO Administrateurs(NomAdmin, PrenomAdmin)
VALUES (Vinel,Lorraine);
