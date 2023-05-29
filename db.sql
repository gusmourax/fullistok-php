CREATE TABLE produtos (
    id SERIAL PRIMARY KEY,
    descricao VARCHAR(50) UNIQUE NOT NULL,
    estoque_minimo INT NOT NULL,
    estoque_maximo INT NOT NULL
);

INSERT INTO produtos (descricao, estoque_minimo, estoque_maximo) VALUES 
('Banana', 10, 100);