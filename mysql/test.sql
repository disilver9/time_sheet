create database testdb;
use testdb;


/*======================= CREATING TABLES ===================================================*/

 CREATE TABLE user (
    id int auto_increment not null,
    username VARCHAR(32),
    first_name VARCHAR(32),
    last_name VARCHAR(32),
    address VARCHAR(32),
    password VARCHAR(400),
    PRIMARY KEY(id)
  );
  
   CREATE TABLE client (
    id int auto_increment not null,
    client_name VARCHAR(32),
    managers_name VARCHAR(32),
    position VARCHAR(32),
    PRIMARY KEY(id)
  );
  
   CREATE TABLE sheet (
    id int auto_increment not null,
    title VARCHAR(32),
    client VARCHAR(32),
    employee VARCHAR(32),
    comments VARCHAR(32),
    date1 VARCHAR(32),
    end1 VARCHAR(32),
    start VARCHAR(32),
    total VARCHAR(32),
    PRIMARY KEY(id)
  );



INSERT INTO user (username,first_name,last_name,address,password)
values ('Administrator','Donald','Trump','32 wakanda drive','p@ssw0rD');

INSERT INTO user (username, first_name ,last_name,address,password)
values ('donaldtrump@trump.com','Barrack','Obama','32 wakanda drive','p@ssw0rD');

INSERT INTO client (client_name,managers_name,position)
values ('Isratech','Christopher Tucker','ceo');
INSERT INTO client (client_name,managers_name,position)
values ('NWC','Zachary Hayleys','Executive Director');
INSERT INTO client (client_name,managers_name,position)
values ('Smart mobile','Dahlia Hollywell','Marketing Executive');

DELIMITER //
CREATE PROCEDURE all_users()
BEGIN
  SELECT * FROM user;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE all_clients()
BEGIN
  SELECT * FROM client;
END //
DELIMITER ;