-- MariaDB Script
-- Sat May 25 12:07:14 2024
-- Model: New Model    Version: 1.0
-- MariaDB Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dbtaxi
-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `dbtaxi` DEFAULT CHARACTER SET utf8 ;
USE `dbtaxi` ;

-- -----------------------------------------------------
-- Table `dbtaxi`.`admin_de_postos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtaxi`.`admin_de_postos` (
  `id_admin_postos` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `localizacao_cidade` VARCHAR(45) NOT NULL,
  `num_tel_adm_postos` INT NOT NULL,
  PRIMARY KEY (`id_admin_postos`)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `dbtaxi`.`posto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtaxi`.`posto` (
  `id_posto` INT NOT NULL AUTO_INCREMENT,
  `localizacao_cidade` VARCHAR(60) NOT NULL,
  `num_tel_posto` INT NOT NULL,
  `localizacao_bairro` VARCHAR(100) NOT NULL,
  `admin_de_postos_id_admin_postos` INT NOT NULL,
  PRIMARY KEY (`id_posto`),
  UNIQUE INDEX `numTel_UNIQUE` (`num_tel_posto` ASC),
  INDEX `fk_posto_admin_de_postos1_idx` (`admin_de_postos_id_admin_postos` ASC),
  CONSTRAINT `fk_posto_admin_de_postos1`
    FOREIGN KEY (`admin_de_postos_id_admin_postos`)
    REFERENCES `dbtaxi`.`admin_de_postos` (`id_admin_postos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `dbtaxi`.`taxista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtaxi`.`taxista` (
  `id_taxista` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `placa_carro` VARCHAR(7) NOT NULL,
  `num_tel_taxista` INT NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `posto_id_posto` INT NOT NULL,
  PRIMARY KEY (`id_taxista`),
  UNIQUE INDEX `placa_carro_UNIQUE` (`placa_carro` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_taxista_posto1_idx` (`posto_id_posto` ASC),
  CONSTRAINT `fk_taxista_posto1`
    FOREIGN KEY (`posto_id_posto`)
    REFERENCES `dbtaxi`.`posto` (`id_posto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `dbtaxi`.`admin_posto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbtaxi`.`admin_posto` (
  `id_admin` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `num_tel_admin` INT NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `bairro_localizacao` VARCHAR(45) NOT NULL,
  `cidade_localizacao` VARCHAR(45) NOT NULL,
  `posto_id_posto` INT NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `numero_UNIQUE` (`num_tel_admin` ASC),
  INDEX `fk_admin_posto_posto_idx` (`posto_id_posto` ASC),
  CONSTRAINT `fk_admin_posto_posto`
    FOREIGN KEY (`posto_id_posto`)
    REFERENCES `dbtaxi`.`posto` (`id_posto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

insert into 