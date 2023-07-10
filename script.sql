CREATE TABLE users(
    user_id SERIAL PRIMARY KEY,
    user_name VARCHAR(80) NOT NULL,
    email VARCHER(80) NOT NULL,
    passwrd VARCHAR(30) NOT NULL,
    user_type INT NOT NULL
);   

INSERT INTO users(user_name, passwrd, user_type) VALUES 
    ('Diana', '123', 1),
    ('Diane', '123', 0);

-- back office

CREATE TABLE parametre(
    parametre_id SERIAL PRIMARY KEY,
    param_name VARCHAR(40)
);

CREATE TABLE detail_regime(
    detail_regime_id SERIAL PRIMARY KEY,
    parametre_id INT,
    param_value INT,
    FOREIGN KEY(parametre_id) REFERENCES parametre(parametre_id)
);

CREATE TABLE unite_activite(
    unite_activite_id SERIAL PRIMARY KEY,
    unite_name VARCHAR(20) NOT NULL
);

INSERT INTO unite_activite VALUES(1,'minute(s)'),(2,'seconde(s)'),(3,'répétition(s)');

CREATE TABLE activite(
    activite_id SERIAL PRIMARY KEY,
    activite_name VARCHAR(100)
);

CREATE TABLE detail_activite(
    detail_activite_id SERIAL PRIMARY KEY,
    activite_id INT,
    unite_id INT,
    detail_name VARCHAR(80),
    rep DOUBLE PRECISION,
    FOREIGN KEY(activite_id) REFERENCES activite(activite_id),
    FOREIGN KEY(unite_activite_id) REFERENCES unite_activite(unite_activite_id)
);

CREATE TABLE regime(
    regime_id SERIAL PRIMARY KEY,
    type_regime INT,
    gender INT,
    weigth_per_week DOUBLE PRECISION,
    price_per_week DOUBLE PRECISION,
    detail_regime INT,
    activite_id INT,
    FOREIGN KEY(activite_id) REFERENCES activite(activite_id),
    FOREIGN KEY(detail_regime) REFERENCES detail_regime(detail_regime_id)
);


-- front office

CREATE TABLE restriction(
    restriction_id SERIAL PRIMARY KEY,
    user_id INT,
    parametre_id INT,
    param_value INT,
    FOREIGN KEY(parametre_id) REFERENCES parametre(parametre_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);


CREATE TABLE completion(
    completion_id SERIAL PRIMARY KEY,
    user_id INT,
    gender INT NOT NULL,
    objectif INT NOT NULL,
    heigth DOUBLE PRECISION,
    weigth DOUBLE PRECISION,
    restriction INT,
    FOREIGN KEY(restriction) REFERENCES restriction(restriction_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);
