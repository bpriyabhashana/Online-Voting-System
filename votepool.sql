create database votepool;
	use votepool;

	create table admin(
		id int(10)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL
	);

	create table election(
		type varchar(50) NOT NULL PRIMARY KEY,
		startDate date NOT NULL,
		endDate date NOT NULL
	);

	create table inspector(
		nic varchar(20) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		pollingDistrict varchar(30) NOT NULL
	);

	create table voters(
		nic varchar(20) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		electrolDistrict varchar(20) NOT NULL,
		pollingDivision varchar(20) NOT NULL,
		pollingDistrict varchar(20) NOT NULL,
		photo varchar(200) NOT NULL,
		approveStatus int(1),
		votedStatus int(1)
	);

	create table party(
		id int(10)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(50) NOT NULL,
		logo varchar(200) NOT NULL,
		votes int(10) NOT NULL
	);

	create table candidate(
		candidateNumber int(10) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		province varchar(20) NOT NULL,
		electrolDistrict varchar(20) NOT NULL,
		partyId int(10) NOT NULL,
		photo varchar(200) NOT NULL
	);

	create table seats(
		electrolDistrict varchar(20) NOT NULL PRIMARY KEY,
		province varchar(20) NOT NULL,
		count int(3) NOT NULL
	);