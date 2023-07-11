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
        duration DOUBLE PRECISION NOT NULL,
        objectif INT NOT NULL
    );

    CREATE TABLE diet_non_dispo(id SERIAL PRIMARY KEY, diet_id INT, FOREIGN KEY(diet_id) REFERENCES diet(id));

    CREATE VIEW v_diet_dispo AS SELECT * FROM diet WHERE id NOT IN (select diet_id from diet_non_dispo);

    INSERT INTO Diet(duration , objectif) VALUES( 2 , 1 ) , ( 4 , 1 ) , ( 6 , -1 );

    CREATE TABLE Food(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    );

    CREATE TABLE food_non_dispo(food_id INT);

    CREATE VIEW v_food_dispo AS SELECT * FROM food WHERE id NOT IN (select food_id FROM food_non_dispo);

    INSERT INTO Food(name) VALUES ('Akoho') , ('Coca') , ('Ronono') , ('Rano') , ('Omby');

    CREATE TABLE Parametre(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL
    );

    CREATE TABLE parametre_non_dispo (id SERIAL PRIMARY KEY, parametre_id INT);

    CREATE VIEW v_parametre AS SELECT * FROM parametre WHERE id NOT IN (select parametre_id FROM parametre_non_dispo);

    INSERT INTO Parametre(name) VALUES ( 'Diabete' ) , ( 'Tensionnaire' ) , ('No gluten') , ('goutte');

    CREATE TABLE ListFood(
        diet_id INT NOT NULL, -- FK
        food_id INT NOT NULL -- FK
    );

    INSERT INTO ListFood VALUES ( 1 , 1 ) , ( 1 , 2 ) , ( 1 , 3 ) , ( 2 , 4 ) , ( 2 , 2 ) , ( 3 , 3 ) , ( 3 , 5 );

    CREATE TABLE Restriction(
        food_id INT NOT NULL, -- FK
        parameter_id INT NOT NULL -- FK
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

CREATE TABLE code(
    id SERIAL PRIMARY KEY,
    code INT NOT NULL,
    valeur DOUBLE PRECISION NOT NULL
);

CREATE TABLE usedCode(
    code_id INT ,
    FOREIGN KEY(code_id) REFERENCES code(id)
);

CREATE TABLE usableCode(
    code_id INT ,
    FOREIGN KEY(code_id) REFERENCES code(id)
);

CREATE TABLE requestedCode(
    code_id INT ,
    FOREIGN KEY(code_id) REFERENCES code(id)
);