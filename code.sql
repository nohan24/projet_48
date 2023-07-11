CREATE TABLE code(
    code_id SERIAL PRIMARY KEY,
    code INT(4) NOT NULL,
    value DOUBLE PRECISION NOT NULL
);

INSERT INTO code(code , value) VALUES (1000 , 1000) ,
(1001 , 2000) , (1011 , 5000) ,  (1111 , 9000) ,
(1201 , 10000) , (1979 , 67000) ,(2000 , 2000) , 
(2075 , 28000) , (1999 , 73000) , (0541 , 33000) , 
(4655 , 48000) , (0010 , 3000) , (1010 , 4000) , 
(0110 , 7000) , (2011 , 6000) ;  

CREATE TABLE usedCode(
    code_id INT ,
    FOREIGN KEY(code_id) REFERENCES code(code_id)
);

CREATE TABLE requestedCode(
    code_id INT ,
    user_id INT ,
    state INT NOT NULL,
    FOREIGN KEY(code_id) REFERENCES code(code_id),
    FOREIGN KEY(user_id) REFERENCES users(user_id)
);