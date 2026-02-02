
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

DROP DATABASE IF EXISTS `iubat_bank`;
CREATE DATABASE IF NOT EXISTS `iubat_bank` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iubat_bank`;

-- login table (application users)
CREATE TABLE `login` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `type` VARCHAR(50) NOT NULL DEFAULT 'user',
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- manager table (staff managers)
CREATE TABLE `manager` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `type` VARCHAR(50) NOT NULL DEFAULT 'manager',
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- otheraccounts (external banks)
CREATE TABLE `otheraccounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `accountno` VARCHAR(32) NOT NULL,
  `bankname` VARCHAR(100) NOT NULL,
  `holdername` VARCHAR(100) NOT NULL,
  `balance` DECIMAL(15,2) NOT NULL DEFAULT 0,
  `date` DATE NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- transaction table
CREATE TABLE `transaction` (
  `transactionId` INT NOT NULL AUTO_INCREMENT,
  `action` VARCHAR(50) NOT NULL,
  `credit` DECIMAL(15,2) DEFAULT NULL,
  `debit` DECIMAL(15,2) DEFAULT NULL,
  `balance` DECIMAL(15,2) DEFAULT NULL,
  `beneld` VARCHAR(255) DEFAULT NULL,
  `other` VARCHAR(255) DEFAULT NULL,
  `userid` INT NOT NULL,
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transactionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- useraccounts (customers) - profile column removed
CREATE TABLE `useraccounts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `national_id` VARCHAR(30) NOT NULL,
  `gender` VARCHAR(16) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phonenumber` VARCHAR(30) NOT NULL,
  `city` VARCHAR(100) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `dob` DATE DEFAULT NULL,
  `accountno` BIGINT NOT NULL,
  `accounttype` VARCHAR(50) NOT NULL,
  `deposit` DECIMAL(15,2) NOT NULL DEFAULT 0,
  `branch` VARCHAR(100) DEFAULT NULL,
  `occupation` VARCHAR(100) DEFAULT NULL,
  `time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- sample data
INSERT INTO `manager` (`email`, `password`, `type`) VALUES
('manager@manager.com', '1234', 'manager');

INSERT INTO `useraccounts` (`name`,`national_id`,`gender`,`email`,`phonenumber`,`city`,`address`,`password`,`dob`,`accountno`,`accounttype`,`deposit`,`branch`,`occupation`) VALUES
('admin','122225656525','Male','admin123@gmail.com','6569556688','Dhaka','33, hihi society','1234','2023-03-08',1679149486,'Saving',1000,'','Business');

COMMIT;
