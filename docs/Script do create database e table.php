create database Cadastro;

use Cadastro;

Create table registro_usuarios (
ID Int UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
login Varchar(30),
senha Varchar(40),
Primary Key (ID)) ENGINE = MyISAM;