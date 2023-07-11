CREATE TABLE users(
    user_id SERIAL PRIMARY KEY,
    user_name VARCHAR(80) NOT NULL,
    email VARCHAR(60) NOT NULL,
    passwrd VARCHAR(30) NOT NULL,
    user_type INT NOT NULL
);   

INSERT INTO users VALUES(default,"Administrateur","nutrivit-admin@gmail.com","projet48",1);

-- back office

CREATE TABLE unite_activite(
    unite_activite_id SERIAL PRIMARY KEY,
    unite_name VARCHAR(20) NOT NULL
);

INSERT INTO unite_activite VALUES(1,'minute(s)'),(2,'seconde(s)'),(3,'répétition(s)');

CREATE TABLE activite(
    activite_id SERIAL PRIMARY KEY,
    activite_name VARCHAR(100)
);

ALTER TABLE activite ENGINE = InnoDB;
ALTER TABLE unite_activite ENGINE = InnoDB;
ALTER TABLE users ENGINE = InnoDB;

CREATE TABLE detail_activite(
    detail_activite_id SERIAL PRIMARY KEY,
    activite_id INT,
    unite_activite_id INT,
    detail_name VARCHAR(80),
    rep DOUBLE PRECISION,
    FOREIGN KEY(activite_id) REFERENCES activite(activite_id),
    FOREIGN KEY(unite_activite_id) REFERENCES unite_activite(unite_activite_id)
);

CREATE TABLE activite_non_dispo(id SERIAL PRIMARY KEY, activite_id INT,  FOREIGN KEY(activite_id) REFERENCES activite(activite_id));

CREATE VIEW v_activie_dispo AS SELECT * FROM activite WHERE activite_id NOT IN (select activite_id from activite_non_dispo);

CREATE TABLE Diet(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80),
    gender INT,
    duration DOUBLE PRECISION NOT NULL,
    objectif INT NOT NULL,
    prix DOUBLE PRECISION, 
    pour_viande DOUBLE PRECISION,
    pour_poisson DOUBLE PRECISION,
    pour_volaille DOUBLE PRECISION,
    path_img VARCHAR(255) default 'default-img.jpg'
);

    CREATE TABLE diet_non_dispo(id SERIAL PRIMARY KEY, diet_id INT, FOREIGN KEY(diet_id) REFERENCES diet(id));

    CREATE VIEW v_diet_dispo AS SELECT * FROM diet WHERE id NOT IN (select diet_id from diet_non_dispo);

    CREATE TABLE Food(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    );

    CREATE TABLE food_non_dispo(food_id INT);

    CREATE VIEW v_food_dispo AS SELECT * FROM food WHERE id NOT IN (select food_id FROM food_non_dispo);
   
    CREATE TABLE Parametre(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    );

    CREATE TABLE parametre_non_dispo (id SERIAL PRIMARY KEY, parametre_id INT);

    CREATE VIEW v_parametre AS SELECT * FROM parametre WHERE id NOT IN (select parametre_id FROM parametre_non_dispo);

    INSERT INTO Parametre(name) VALUES ( 'Diabete' ) , ( 'Tensionnaire' ) , ('No gluten') , ('goutte');

    CREATE TABLE ListFood(
        diet_id INT NOT NULL, 
        food_id INT NOT NULL,
        FOREIGN KEY(diet_id) REFERENCES diet(id),
        FOREIGN KEY(food_id) REFERENCES food(id)
    );

    CREATE TABLE listActivite(
        diet_id INT NOT NULL,
        activite_id INT NOT NULL,
        FOREIGN KEY(diet_id) REFERENCES diet(id),
        FOREIGN KEY(activite_id) REFERENCES activite(activite_id)
    );


    CREATE TABLE Restriction(
        food_id INT NOT NULL, 
        parameter_id INT NOT NULL 
    );

    INSERT INTO Restriction VALUES ( 5 , 4 ) , ( 2 , 1 ) ;

    ALTER TABLE ListFood
ADD CONSTRAINT fk_diet FOREIGN KEY (diet_id) REFERENCES Diet (id),
ADD CONSTRAINT fk_food FOREIGN KEY (food_id) REFERENCES Food (id);

ALTER TABLE Restriction
ADD CONSTRAINT fk_food_restriction FOREIGN KEY (food_id) REFERENCES Food (id),
ADD CONSTRAINT fk_parameter FOREIGN KEY (parameter_id) REFERENCES Parametre (id);


create view v_detail as (select d.*,unite_name from detail_activite d join unite_activite u on d.unite_activite_id=u.unite_activite_id);

-- front office

CREATE TABLE completion(
    completion_id SERIAL PRIMARY KEY,
    user_id INT,
    gender INT NOT NULL,
    dtn DATE,
    objectif INT NOT NULL,
    heigth DOUBLE PRECISION,
    weigth DOUBLE PRECISION,
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);

CREATE TABLE user_restriction(
    id SERIAL PRIMARY KEY,
    user_id INT,
    parametre_id INT,
    param_value INT,
    FOREIGN KEY (parametre_id) REFERENCES parametre (id),
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);

-- suite sql

CREATE TABLE code(code_id INT(4) PRIMARY KEY, value DOUBLE PRECISION);


CREATE TABLE usedCode(code_id INT);

CREATE TABLE requestedCode(code_id INT, user_id INT);

INSERT INTO requestedCode VALUES(1234, 10);

CREATE TABLE vola(user_id INT, montant DOUBLE PRECISION default 0);

CREATE VIEW v_request AS SELECT r.*,u.email,c.value FROM requestedCode r JOIN users u ON r.user_id = u.user_id JOIN code c on r.code_id=c.code_id;

CREATE TABLE historique_achat(
    id SERIAL PRIMARY KEY,
    user_id INT,
    diet_id INT,
    date_achat DATE
);

INSERT INTO code VALUES(1234,1000),(3455,5000),(2345,5600);


CREATE TABLE IMC_map(
    id SERIAL PRIMARY KEY,
    designation VARCHAR(50)
);

INSERT INTO IMC_map(designation) VALUES 
('insuffisant') , ('normal') , ('surpoids') , ('obese') , ('obese_severe');

CREATE TABLE IMC_category(
    id SERIAL PRIMARY KEY,
    designation VARCHAR(20)
);

INSERT INTO IMC_category(designation) VALUES('mineur') , ('majeur');

CREATE TABLE IMC(
    imc_id  SERIAL PRIMARY KEY,
    imc_category_id INT NOT NULL, -- mineur : 0 , majeur : 1
    imc_map_id INT NOT NULL,
    min DOUBLE PRECISION NOT NULL,
    max DOUBLE PRECISION 
);

INSERT INTO IMC( imc_category_id , imc_map_id , min , max )
    VALUES ( 1 , 1 , 0 , 18.4) ,
    ( 1 , 2 , 18.5 , 24.9) , ( 1 , 3 , 25 , 29.9) ,
    ( 1 , 4 , 30 , 39.9) , ( 1 , 5 , 40 , NULL) ,
    ( 2 , 1 , 0 , 14.9) ,
    ( 2 , 2 , 15 , 22.9) , ( 2 , 3 , 23 , 28.9) ,
    ( 2 , 4 , 29 , 39.9) , ( 2 , 5 , 40 , NULL) ;

CREATE TABLE user_IMC(
    user_id INT NOT NULL,
    imc_id INT NOT NULL, -- Alaina avy any anaty model
    value DOUBLE PRECISION NOT NULL -- calculena anaty model
);

INSERT INTO COMPLETION VALUES(null , 1 , 1 , '2003-04-19' , 1 , 169 , 60) ,
(null , 2 , 0 , '2004-12-16' , 1 , 167 , 60) , (null , 3 , 1 , '2003-05-16' , 1 , 168 , 60);