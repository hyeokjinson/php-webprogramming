create database phpdb;
grant all privileges on phpdb.* to php@localhost identified by '1234' with grant option;
grant all privileges on phpdb.* to php@'%' identified by '1234' with grant option;
flush privileges;