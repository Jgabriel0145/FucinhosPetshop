-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_petshop
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_petshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_petshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `db_petshop` ;

-- -----------------------------------------------------
-- Table `db_petshop`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL DEFAULT NULL,
  `cpf` CHAR(11) NULL DEFAULT NULL,
  `telefone` CHAR(11) NULL DEFAULT NULL,
  `data_nascimento` DATE NULL DEFAULT NULL,
  `endereco` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`animal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NULL DEFAULT NULL,
  `raca` VARCHAR(45) NULL DEFAULT NULL,
  `peso` DOUBLE NOT NULL,
  `porte` ENUM('P', 'M', 'G') NOT NULL,
  `id_cliente` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_animal_cliente_idx` (`id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_animal_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `db_petshop`.`cliente` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`carrinho_temporario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`carrinho_temporario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_venda` ENUM('P', 'S') NULL DEFAULT NULL,
  `id_servico` INT NULL DEFAULT NULL,
  `quantidade_servico` INT NULL DEFAULT NULL,
  `valor_un_servico` DOUBLE NULL DEFAULT NULL,
  `id_produto` INT NULL DEFAULT NULL,
  `quantidade_produto` INT NULL DEFAULT NULL,
  `valor_un_produto` DOUBLE NULL DEFAULT NULL,
  `valor_total` DOUBLE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`funcionario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `admin` TINYINT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  `preco` DOUBLE NOT NULL,
  `estoque` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  `valor_pequeno_porte` DOUBLE NOT NULL,
  `valor_medio_porte` DOUBLE NOT NULL,
  `valor_grande_porte` DOUBLE NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;



-- -----------------------------------------------------
-- Table `db_petshop`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`venda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_venda` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `valor_total_venda` DOUBLE NULL DEFAULT NULL,
  `id_cliente` INT NULL DEFAULT NULL,
  `id_funcionario` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venda_cliente_idx` (`id_cliente` ASC) VISIBLE,
  INDEX `fk_venda_funcionario_idx` (`id_funcionario` ASC) VISIBLE,
  CONSTRAINT `fk_venda_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `db_petshop`.`cliente` (`id`),
  CONSTRAINT `fk_venda_funcionario`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `db_petshop`.`funcionario` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`venda_itens_produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`venda_itens_produto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_produto` INT NULL DEFAULT NULL,
  `quantidade_produto` INT NULL DEFAULT NULL,
  `total_venda` DOUBLE NULL DEFAULT NULL,
  `id_venda` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venda_itens_produto_idx` (`id_produto` ASC) VISIBLE,
  INDEX `fk_venda_itens_produto_venda_idx` (`id_venda` ASC) VISIBLE,
  CONSTRAINT `fk_venda_itens_produto_p`
    FOREIGN KEY (`id_produto`)
    REFERENCES `db_petshop`.`produto` (`id`),
  CONSTRAINT `fk_venda_itens_produto_venda`
    FOREIGN KEY (`id_venda`)
    REFERENCES `db_petshop`.`venda` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`venda_itens_servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`venda_itens_servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_servico` INT NULL DEFAULT NULL,
  `quantidade_servico` INT NULL DEFAULT NULL,
  `valor_total` DOUBLE NULL DEFAULT NULL,
  `id_venda` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venda_itens_servico_idx` (`id_servico` ASC) VISIBLE,
  INDEX `fk_venda_itens_servico_venda_idx` (`id_venda` ASC) VISIBLE,
  CONSTRAINT `fk_venda_itens_servico_s`
    FOREIGN KEY (`id_servico`)
    REFERENCES `db_petshop`.`servico` (`id`),
  CONSTRAINT `fk_venda_itens_servico_venda`
    FOREIGN KEY (`id_venda`)
    REFERENCES `db_petshop`.`venda` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




/*CREATE OR REPLACE VIEW `view_servico` AS SELECT s.id as id_servico, s.descricao as descricao_servico, s.data_servico, s.id_cliente, 
f.id as funcionario_id, f.nome as funcionario, f.cpf as cpf_funcionario, f.email as email_funcionario, f.senha as senha_funcionario, f.admin as admin_funcionario,
c.nome as cliente, c.cpf as cpf_cliente, c.telefone as telefone_cliente, c.data_nascimento as data_nascimento_cliente, c.endereco as endereco_cliente
FROM funcionario_servico_assoc fsa
JOIN funcionario f ON (fsa.id_funcionario = f.id)
JOIN servico s ON (fsa.id_servico = s.id)
JOIN cliente c ON (s.id_cliente = c.id);*/

INSERT INTO funcionario (nome, cpf, email, senha, admin) VALUES ('admin', '11111111111', 'admin@gmail.com', SHA1('admin'), 1);
