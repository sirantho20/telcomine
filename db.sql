SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `sub_contractors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sub_contractors` ;

CREATE TABLE IF NOT EXISTS `sub_contractors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `contractor_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mains_power_meter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mains_power_meter` ;

CREATE TABLE IF NOT EXISTS `mains_power_meter` (
  `serial_number` VARCHAR(45) NOT NULL,
  `account_number` VARCHAR(45) NULL,
  `meter_type` VARCHAR(2) NULL COMMENT 'po - postpaid' /* comment truncated */ /*pr - prepaid*/,
  `kwh_readings` VARCHAR(45) NULL,
  PRIMARY KEY (`serial_number`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `generators`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `generators` ;

CREATE TABLE IF NOT EXISTS `generators` (
  `generator_id` VARCHAR(45) NOT NULL,
  `serial_number` VARCHAR(45) NULL,
  `model_number` VARCHAR(45) NULL,
  `manufacturer_name` VARCHAR(45) NULL,
  `manufacture_date` DATE NULL,
  `supplier_name` VARCHAR(45) NULL,
  `date_of_purchase` DATE NULL,
  `date_of_first_use` DATE NULL,
  `kva_capacity` INT NULL,
  `current_run_hours` DOUBLE NULL,
  `last_serviced_date` DATE NULL,
  `engine_make` VARCHAR(45) NULL,
  `engine_model` VARCHAR(45) NULL,
  `fuel_tank_capacity` DOUBLE NULL,
  UNIQUE INDEX `generator_id_UNIQUE` (`generator_id` ASC),
  PRIMARY KEY (`generator_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `site_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `site_details` ;

CREATE TABLE IF NOT EXISTS `site_details` (
  `site_id` VARCHAR(45) NOT NULL,
  `client_site_id` VARCHAR(45) NULL,
  `site_name` VARCHAR(45) NOT NULL,
  `region` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `latitude` VARCHAR(45) NULL,
  `longitude` VARCHAR(45) NULL,
  `site_class` VARCHAR(45) NULL,
  `category1` VARCHAR(45) NULL,
  `category2` VARCHAR(45) NULL,
  `maintenance_contractor` INT NULL,
  `mains_meter` VARCHAR(45) NULL,
  `generator` VARCHAR(45) NULL,
  UNIQUE INDEX `site_id_UNIQUE` (`site_id` ASC),
  INDEX `site_sub_contractor_idx` (`maintenance_contractor` ASC),
  INDEX `site_mains_meter_idx` (`mains_meter` ASC),
  INDEX `site_generator_idx` (`generator` ASC),
  PRIMARY KEY (`site_id`),
  CONSTRAINT `site_sub_contractor`
    FOREIGN KEY (`maintenance_contractor`)
    REFERENCES `sub_contractors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `site_mains_meter`
    FOREIGN KEY (`mains_meter`)
    REFERENCES `mains_power_meter` (`serial_number`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `site_generator`
    FOREIGN KEY (`generator`)
    REFERENCES `generators` (`generator_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fuel_supplier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fuel_supplier` ;

CREATE TABLE IF NOT EXISTS `fuel_supplier` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `supplier_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fuel_delivery`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fuel_delivery` ;

CREATE TABLE IF NOT EXISTS `fuel_delivery` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `site_id` VARCHAR(45) NOT NULL,
  `delivery_date` DATE NOT NULL,
  `field_engineer` VARCHAR(45) NOT NULL,
  `fuel_company` VARCHAR(45) NOT NULL,
  `quantity_before` FLOAT NOT NULL,
  `quantity_added` FLOAT NOT NULL,
  `quantity_after` FLOAT NOT NULL,
  `driver_name` VARCHAR(45) NOT NULL,
  `mains_meter_reading` FLOAT NULL,
  `comments` TEXT NULL,
  `fuel_supplier` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fuel_delivery_site_details_idx` (`site_id` ASC),
  INDEX `fuel_delivery_supplier_idx` (`fuel_supplier` ASC),
  CONSTRAINT `fuel_delivery_site_details`
    FOREIGN KEY (`site_id`)
    REFERENCES `site_details` (`site_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fuel_delivery_supplier`
    FOREIGN KEY (`fuel_supplier`)
    REFERENCES `fuel_supplier` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fuel_power_readings`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fuel_power_readings` ;

CREATE TABLE IF NOT EXISTS `fuel_power_readings` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `reading_date` DATE NOT NULL,
  `site_id` INT NOT NULL,
  `reading_by` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE TABLE IF NOT EXISTS `users` (
  `username` VARCHAR(45) NOT NULL,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checklist_categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checklist_categories` ;

CREATE TABLE IF NOT EXISTS `checklist_categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `checklist_fields`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `checklist_fields` ;

CREATE TABLE IF NOT EXISTS `checklist_fields` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `field_name` VARCHAR(45) NOT NULL,
  `field_description` VARCHAR(45) NOT NULL,
  `field_category` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `field_checklist_category_idx` (`field_category` ASC),
  CONSTRAINT `field_checklist_category`
    FOREIGN KEY (`field_category`)
    REFERENCES `checklist_categories` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pm_checklist`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pm_checklist` ;

CREATE TABLE IF NOT EXISTS `pm_checklist` (
  `id` INT NULL AUTO_INCREMENT,
  `field` INT NOT NULL,
  `site_id` VARCHAR(45) NULL,
  `check_flag` CHAR NOT NULL,
  `check_date` DATE NOT NULL,
  `checked_by` VARCHAR(45) NULL,
  `check_entry_by` VARCHAR(45) NULL,
  `check_entry_date` DATE NULL,
  `comment` TEXT NULL,
  `verified_date` DATETIME NULL,
  `verified_by` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
