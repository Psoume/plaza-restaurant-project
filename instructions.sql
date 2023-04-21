CREATE DATABASE plaza; 

CREATE TABLE plaza.Allergen (
    idAllergen int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    icon varchar(50) NOT NULL,
    PRIMARY KEY (idAllergen));

CREATE TABLE plaza.Course (
    idCourse int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    PRIMARY KEY (idCourse)
);

CREATE TABLE plaza.Menu (
    idMenu int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    price int,
    isAvailable Boolean,
    description varchar(255),
    PRIMARY KEY (idMenu)
);

CREATE TABLE plaza.Admin (
    idAdmin int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    firstName varchar(50) NOT NULL,
    password varchar(255),
    mail varchar(50),
    PRIMARY KEY (idAdmin)
);

CREATE TABLE plaza.Dish (
    idDish int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    price int NOT NULL,
    description varchar(255),
    isAvailable Bool,
    idCourse int NOT NULL,
    idMenu int,
    PRIMARY KEY (idDish),
    FOREIGN KEY (idCourse) REFERENCES Course(idCourse),
    FOREIGN KEY (idMenu) REFERENCES Menu(idMenu)
);

CREATE TABLE plaza.Presents(
idDish int, 
idAllergen int,
FOREIGN KEY (idDish) REFERENCES Dish(idDish),
FOREIGN KEY (idAllergen) REFERENCES Allergen(idAllergen)
);

INSERT INTO plaza.Allergen (name, icon) VALUES
('Lactose', 'lactose_icon.png'),
('Gluten', 'gluten_icon.png'),
('Noix', 'nuts_icon.png'),
('Soja', 'soy_icon.png'),
('Moutarde', 'mustard_icon.png'),

INSERT INTO plaza.Course (name) VALUES
('Entrée'),
('Plat'),
('Dessert'),
('Boisson');

INSERT INTO plaza.Menu (name, price, isAvailable, description) VALUES
('Menu du jour', 25, true, 'Entrée, plat et dessert au choix'),
('Menu végétarien', 20, true, 'Entrée, plat et dessert végétariens au choix'),
('Menu enfant', 12, true, 'Plat et dessert pour les enfants de moins de 12 ans');

INSERT INTO plaza.Admin (name, firstName, password, mail) VALUES
('Vinel', 'Lorraine', '123', 'lorraine@orange.fr');

INSERT INTO plaza.Dish (name, price, description, isAvailable,idCourse, idMenu) VALUES
('Salade de chèvre chaud', 8, 'Salade verte, toasts de chèvre chaud, vinaigrette',1, 1, 1),
("Soupe à l'oignon", 6, "Soupe d'oignons gratinée au fromage",1, 1, 1),
('Steak frites', 15, 'Steak haché de bœuf, frites maison',1, 2, 1),
('Lasagnes', 14, 'Lasagnes à la bolognaise, salade verte',1, 2, 1),
('Mousse au chocolat', 5, 'Mousse légère au chocolat noir',1, 3, 1),
('Tarte aux pommes', 4, 'Tarte aux pommes maison, glace vanille',1, 3, 1),
('Salade niçoise', 9, 'Salade niçoise avec thon, oeuf dur, olives',1, 1, 2);

INSERT INTO plaza.Dish (name, price, description, idCourse, idMenu) VALUES
('Ratatouille', 12, 'Ratatouille de légumes provençaux', 2, 2),
('Tiramisu', 6, 'Tiramisu au café, biscuits imbibés', 3, 2),
('Pâtes à la carbonara', 11, 'Pâtes fraîches, sauce carbonara', 2, 3),
('Glace vanille', 3, 'Glace vanille maison', 3, 3);

INSERT INTO plaza.Presents (idDish, idAllergen) VALUES
(1, 1),
(2, 2),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(7, 3);

INSERT INTO plaza.Presents (idDish, idAllergen) VALUES
(8, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 2),
(11, 1);