CREATE DATABASE painelRamais; 

USE painelRamais;

CREATE TABLE ramais( 
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    ramal VARCHAR(4) NOT NULL,
    nome VARCHAR(100) NOT NULL,
    ip VARCHAR(100) NOT NULL,
    `status` VARCHAR(100) NOT NULL
);

USE painelRamais;

INSERT INTO `ramais` (`ramal`, `nome`, `ip`, `status`) VALUES 
('7005', 'Chiquinha', '181.219.125.7', 'indisponivel'),
('7000', 'Chaves', '181.219.125.7', 'ocupado'),
('7001', 'Kiko', '181.219.125.7', 'chamando'),
('7002', 'Godines', '(Unspecified)', 'pausa'),
('7003', 'Nhonho', '(Unspecified)', 'indisponivel'),
