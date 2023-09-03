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
AUTO_INCREMENT = 4
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
AUTO_INCREMENT = 6
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
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`servico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_servico` DATETIME NOT NULL,
  `descricao` VARCHAR(50) NOT NULL,
  `id_cliente` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servico_cliente_idx` (`id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_servico_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `db_petshop`.`cliente` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`funcionario_servico_assoc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`funcionario_servico_assoc` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_funcionario` INT NULL DEFAULT NULL,
  `id_servico` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_assoc_func_idx` (`id_funcionario` ASC) VISIBLE,
  INDEX `fk_assoc_func_serv_idx` (`id_servico` ASC) VISIBLE,
  CONSTRAINT `fk_assoc_func`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `db_petshop`.`funcionario` (`id`),
  CONSTRAINT `fk_assoc_func_serv`
    FOREIGN KEY (`id_servico`)
    REFERENCES `db_petshop`.`servico` (`id`))
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
-- Table `db_petshop`.`venda_produto_servico_assoc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`venda_produto_servico_assoc` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_produto` INT NULL DEFAULT NULL,
  `id_servico` INT NULL DEFAULT NULL,
  `id_cliente` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produto_venda_assoc_idx` (`id_produto` ASC) VISIBLE,
  INDEX `fk_cliente_venda_assoc_idx` (`id_cliente` ASC) VISIBLE,
  INDEX `fk_servico_venda_assoc_idx` (`id_servico` ASC) VISIBLE,
  CONSTRAINT `fk_cliente_venda_assoc`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `db_petshop`.`cliente` (`id`),
  CONSTRAINT `fk_produto_venda_assoc`
    FOREIGN KEY (`id_produto`)
    REFERENCES `db_petshop`.`produto` (`id`),
  CONSTRAINT `fk_servico_venda_assoc`
    FOREIGN KEY (`id_servico`)
    REFERENCES `db_petshop`.`servico` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `db_petshop`.`venda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_petshop`.`venda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `data_venda` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_produto_servico` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_venda_produto_servico_idx` (`id_produto_servico` ASC) VISIBLE,
  CONSTRAINT `fk_venda_produto_servico`
    FOREIGN KEY (`id_produto_servico`)
    REFERENCES `db_petshop`.`venda_produto_servico_assoc` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
