drop database if exists hourglassLogIn;
create database hourglassLogIn;
use hourglassLogIn;

CREATE TABLE `user` (
  `name` VARCHAR(30) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(300) NOT NULL,
PRIMARY KEY(`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--  password has to be varchar 300 due to hashing!


