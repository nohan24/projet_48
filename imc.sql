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