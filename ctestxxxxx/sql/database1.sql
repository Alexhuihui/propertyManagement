drop database if exists prpbase;
create database prpbase;
use prpbase;

CREATE TABLE prp_gender
(
	genderid bigint auto_increment PRIMARY KEY,
	gender varchar(16) NOT NULL
);

CREATE TABLE prp_owner
(
	ownerid bigint auto_increment PRIMARY KEY,
	time bigint not null,
	telnum varchar(32) NOT NULL,
	passwd varchar(32) NOT NULL,
	username varchar(32),
	profession varchar(32),
	genderid bigint DEFAULT 1,
	acreage varchar(32),
	population varchar(32),
	location varchar(256),
	unique(telnum)
);

CREATE TABLE prp_charge
(
	chargeid bigint auto_increment PRIMARY KEY,
	ownerid bigint NOT NULL,
	chargetime bigint not null,
	charge varchar(32),
	remark varchar(256),
	foreign key(ownerid) references prp_owner(ownerid) on delete cascade
);

CREATE TABLE prp_manager
{
	managerid bigint auto_increment PRIMARY KEY,
	managername varchar(32) NOT NULL,
	managerpass varchar(32) NOT NULL
};

insert into prp_gender values (NULL, 'UNKNOWN');
insert into prp_gender values (NULL, 'MALE');
insert into prp_gender values (NULL, 'FEMALE');
insert into prp_manager values (NULL, 'super', '123456');