create table users(
  id int not null AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) not null,
  password varchar(100) not null,
  email varchar(100) not null
);