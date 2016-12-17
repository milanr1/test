CREATE DATABASE `accounts` CHARACTER SET utf8 COLLATE utf8_slovak_ci;
USE accounts
CREATE TABLE `tb_movements` (
  `id` int AUTO_INCREMENT,
  `bank_acc_id` int  NOT NULL, 
  `type` char(10)  NOT NULL,
  `date_post` date  NOT NULL,
  `date_avail` date  NOT NULL,
  `amount` float(6,2) NOT NULL,
  `name` char(200),
  `memo` char(200),
  `iban` char(25),
  `reference` char(64),
  `currency` char(4),
    PRIMARY KEY (`id`)
);

CREATE TABLE `accounts` (
  `id` int AUTO_INCREMENT,
  `bank_prefix` char(6), 
  `bank_account` char(12)  NOT NULL, 
  `bank_code` char(4)  NOT NULL,
  `iban` char(24) NOT NULL,
  `currency` char(4) NOT NULL,
  `owner` char(100),
    PRIMARY KEY (`id`)
);

INSERT INTO `accounts` (`id`, `bank_prefix`, `bank_account`, `bank_code`, `iban`, `currency`,`owner`) VALUES
(1, NULL, '2619192383', '1100', 'SK3711000000002619192383', 'EUR', 'Milan Remenar'),
(2, NULL, '2611700099', '1100', 'SK4811000000002611700099', 'EUR', 'Ivanka Remenarova'),
(3, '520700', '4202188492', '8360', 'SK7583605207004202188492', 'EUR', 'Milan Remenar');
