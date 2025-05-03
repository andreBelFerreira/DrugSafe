-- Criando o banco de dados
CREATE DATABASE DrugSafe

-- 
USE DrugSafe

drop table remedios

-- Criando a tabela de remedios
CREATE TABLE remedios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  descricao TEXT NOT NULL,
  validade DATE NOT NULL,
  quantidade INT NOT NULL
);

ALTER TABLE remedios ADD CONSTRAINT fk_remedio_hospital FOREIGN KEY (hospital_id) REFERENCES hospitais(id);
ALTER TABLE remedios 
ADD COLUMN data_prescricao DATE,
ADD COLUMN dosagem VARCHAR(255),
ADD COLUMN medico_responsavel VARCHAR(255),
ADD COLUMN receita_imagem VARCHAR(255);




-- Criando a tabela de interações do medico
CREATE TABLE `interacoes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `data_interacao` DATE NOT NULL,
  `remedio_id` INT NOT NULL,
  `medico` VARCHAR(255) NOT NULL,
  `descricao` TEXT NOT NULL,
  FOREIGN KEY (`remedio_id`) REFERENCES `remedios`(`id`)
);

-- Criando a tabela de usuario
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criando tabela de hospital
CREATE TABLE hospitais (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  endereco TEXT NOT NULL,
  telefone VARCHAR(50),
  especialidades TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Criando tabela de interação com os remedios do hospital
CREATE TABLE hospitais_medicamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  hospital_id INT NOT NULL,
  medicamento_id INT NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (hospital_id) REFERENCES hospitais(id),
  FOREIGN KEY (medicamento_id) REFERENCES medicamentos_usuarios(id)
);



INSERT INTO hospitais (nome, endereco, telefone, especialidades)
VALUES
('Hospital Albert Einstein', 'Av. Albert Einstein, 627 - Morumbi, São Paulo - SP', '(11) 2151-1233', 'Oncologia, Cardiologia, Neurologia, Transplantes'),

('Hospital Sírio-Libanês', 'Rua Dona Adma Jafet, 91 - Bela Vista, São Paulo - SP', '(11) 3394-0200', 'Oncologia, Cardiologia, Urologia, Cirurgia Geral'),

('Hospital Beneficência Portuguesa', 'Rua Maestro Cardim, 769 - Bela Vista, São Paulo - SP', '(11) 3505-1000', 'Transplantes, Cardiologia, Ortopedia, Neurologia'),

('Hospital das Clínicas da USP', 'Av. Dr. Enéas Carvalho de Aguiar, 255 - Cerqueira César, São Paulo - SP', '(11) 2661-0000', 'Todas especialidades, Hospital Universitário'),

('Hospital Samaritano', 'Rua Conselheiro Brotero, 1486 - Higienópolis, São Paulo - SP', '(11) 3821-5300', 'Ortopedia, Cardiologia, Neurologia'),

('Hospital Alemão Oswaldo Cruz', 'Rua João Julião, 331 - Bela Vista, São Paulo - SP', '(11) 3549-1000', 'Oncologia, Cirurgias Complexas, Cardiologia'),

('Hospital Moinhos de Vento', 'Rua Ramiro Barcelos, 910 - Moinhos de Vento, Porto Alegre - RS', '(51) 3314-3434', 'Oncologia, Cardiologia, Neurologia'),

('Hospital Israelita Albert Sabin', 'Av. Santos Dumont, 2828 - Aldeota, Fortaleza - CE', '(85) 3201-6161', 'Oncologia, Pediatria, Cardiologia'),

('Hospital Mater Dei', 'Av. do Contorno, 9000 - Barro Preto, Belo Horizonte - MG', '(31) 3339-9595', 'Oncologia, Obstetrícia, Cardiologia'),

('Hospital Santa Catarina', 'Av. Paulista, 200 - Bela Vista, São Paulo - SP', '(11) 3016-4133', 'Ortopedia, Cirurgia Geral, Urologia');


drop table DrugSafe.interacoes;
drop table DrugSafe.remedios;
 