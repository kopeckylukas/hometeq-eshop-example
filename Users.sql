CREATE TABLE Users
(
  userId        INT(4) AUTO_INCREMENT NOT NULL,
  userType      VARCHAR(1) NOT NULL,
  userFName     VARCHAR(50) NOT NULL,
  userSName     VARCHAR(50) NOT NULL,
  userAddress   VARCHAR(50) NOT NULL,
  userPostCode  VARCHAR(50) NOT NULL,
  userTelNo     VARCHAR(50) NOT NULL,
  userEmail     VARCHAR(50) NOT NULL unique,
  userPassword  VARCHAR(50) NOT NULL,
  CONSTRAINT usr_UsrID_pk PRIMARY KEY (userId)
)ENGINE=INNODB;
