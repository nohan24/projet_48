CREATE TABLE code(
    code_id INT PRIMARY KEY,
    code INT NOT NULL,
    value DOUBLE PRECISION NOT NULL
);

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