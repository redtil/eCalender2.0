create table users(
  id int not null AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(100) not null,
  password varchar(100) not null,
  email varchar(100) not null
);

create table tasks(
  id int not null AUTO_INCREMENT PRIMARY KEY,
  task text not null,
  userid int not null,
  startTime time not null,
  endTime time not null
);