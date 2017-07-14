create database votepool;
	use votepool;

	create table admin(
		id int(10)  NOT NULL AUTO_INCREMENT PRIMARY KEY,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL
	);

	create table election(
		type varchar(50) NOT NULL,
		eday date NOT NULL,
		startTime time NOT NULL,
		endTime time NOT NULL
	);

	create table districtInspector(
		id varchar(20) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		electrolDistrict varchar(20) NOT NULL
	);

	create table divisionInspector(
		id varchar(20) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		electrolDistrict varchar(20) NOT NULL
	);

	create table stationInspector(
		id varchar(20) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		password varchar(50) NOT NULL,
		electrolDistrict varchar(20) NOT NULL
	);

	create table voters(
		nic varchar(20) NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		electrolDistrictId varchar(20) NOT NULL,
		pollingDivision varchar(20) NOT NULL,
		pollingDistrict varchar(20) NOT NULL,
		photo varchar(200) NOT NULL,
		approveStatus int(1),
		votedStatus int(1)
	);

	create table party(
		partyId varchar(20)  NOT NULL PRIMARY KEY,
		name varchar(50) NOT NULL,
		logo varchar(200) NOT NULL,
		votes int(10) 
	);

	create table candidate(
		no int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		candidateNumber int(10) NOT NULL,
		name varchar(50) NOT NULL,
		province varchar(20) NOT NULL,
		electrolDistrictId varchar(20) NOT NULL,
		partyId varchar(20) NOT NULL,
		photo varchar(200) NOT NULL,
		votes int(10) 
	);

	create table seats(
		electrolDistrictId varchar(20) NOT NULL PRIMARY KEY,
		electrolDistrict varchar(20) NOT NULL,
		province varchar(20) NOT NULL,
		count int(3) NOT NULL
	);

	create table area(
		pollingDivision varchar(20) NOT NULL PRIMARY KEY,
		electrolDistrictId varchar(20) NOT NULL
	);


	ALTER TABLE voters ADD FOREIGN KEY (electrolDistrictId) REFERENCES seats(electrolDistrictId);
	ALTER TABLE voters ADD FOREIGN KEY (pollingDivision) REFERENCES area(pollingDivision);
	ALTER TABLE candidate ADD FOREIGN KEY (partyId) REFERENCES party(partyId);
	ALTER TABLE candidate ADD FOREIGN KEY (electrolDistrictId) REFERENCES seats(electrolDistrictId);
	ALTER TABLE area ADD FOREIGN KEY (electrolDistrictId) REFERENCES seats(electrolDistrictId);
	




	

	INSERT INTO seats (electrolDistrictId,electrolDistrict,province,count)
	VALUES
	('AMP','Ampara','Eastern',7),
	('ANU','Anuradhapura','North Central',9),
	('BAD','Badulla','Uva',8),
	('BAT','Batticaloa','Eastern',5),
	('COL','Colombo','Western',19),
	('GAL','Galle','Southern',10),
	('GAM','Gampaha','Western',18),
	('HAM','Hambantota','Southern',7),
	('JAF','Jafna','Northern',7),
	('KAL','Kalutara','Western',10),
	('KAN','Kandy','Central',12),
	('KEG','Kegalla','Sabaragamuwa',9),
	('KUR','Kurunegala','North Western',15),
	('MTL','Matale','Central',5),
	('MTR','Matara','Southern',8),
	('MON','Monaragala','Uva',5),
	('NUW','Nuwara Eliya','Central',8),
	('POL','Polonnaruwa','North Central',5),
	('PUT','Puttalam','North Western',8),
	('RAT','Ratnapura','Sabaragamuwa',11),
	('TRI','Trincomalee','Eastern',4),
	('VAN','Vanni','Northern',6);



	INSERT INTO area (pollingDivision,electrolDistrictId)
	VALUES
	('Colombo North','COL'),
	('Colombo Central','COL'),
	('Borella','COL'),
	('Colombo East','COL'),
	('Colombo West','COL'),
	('Dehiwela','COL'),
	('Ratmalana','COL'),
	('Kolonnawa','COL'),
	('Kotte','COL'),
	('Kaduwela','COL'),
	('Avissawella','COL'),
	('Homagama','COL'),
	('Maharagama','COL'),
	('Kesbewa ','COL'),
	('Moratuwa','COL'),
	('Wattala','GAM'),
	('Negombo','GAM'),
	('Katana','GAM'),
	('Divulapitiya','GAM'),
	('Mirigama','GAM'),
	('Minuwangoda','GAM'),
	('Attanagalla','GAM'),
	('Gampaha','GAM'),
	('Ja-ela','GAM'),
	('Mahara','GAM'),
	('Dompe','GAM'),
	('Biyagama ','GAM'),
	('Kelaniya','GAM'),
	('Panadura','KAL'),
	('Kalutara','KAL'),
	('Bandaragama','KAL'),
	('Horana','KAL'),
	('Bulathsinhala','KAL'),
	('Matugama','KAL'),
	('Beruwela','KAL'),
	('Agalawatte','KAL'),
	('Galagedara','KAN'),
	('Harispattuwa','KAN'),
	('Patha-dumbara','KAN'),
	('Uda-dumbara','KAN'),
	('Teldeniya','KAN'),
	('Kundasale','KAN'),
	('Hewaheta','KAN'),
	('Senkadagala','KAN'),
	('Mahanuwara','KAN'),
	('Yatinuwara','KAN'),
	('Udunuwara','KAN'),
	('Gampola ','KAN'),
	('Nawalapitiya','KAN'),
	('Dambulla','MTL'),
	('Laggala','MTL'),
	('Matale ','MTL'),
	('Rattota','MTL'),
	('Nuwara Eliya-Maskeliya','NUW'),
	('Walapane','NUW'),
	('Hanguranketa ','NUW'),
	('Kotmale','NUW'),
	('Balapitiya','GAl'),
	('Ambalangoda','GAl'),
	('Karandeniya','GAl'),
	('Bentara-Elpitiya','GAl'),
	('Hiniduma','GAl'),
	('Baddegama','GAl'),
	('Ratgama','GAl'),
	('Galle','GAl'),
	('Akmeemana ','GAl'),
	('Habaraduwa','GAl'),
	('Deniyaya','MTR'),
	('Hakmana','MTR'),
	('Akuressa','MTR'),
	('Kamburupitiya','MTR'),
	('Devinuwara','MTR'),
	('Matara ','MTR'),
	('Weligama','MTR'),
	('Mulkirigala','HAM'),
	('Beliatta','HAM'),
	('Tangalle ','HAM'),
	('Tissamaharama','HAM'),
	('Kayts','JAF'),
	('Vaddukkodai','JAF'),
	('Kankesanturai','JAF'),
	('Manipay','JAF'),
	('Kopay','JAF'),
	('Udupiddy','JAF'),
	('Point Pedro','JAF'),
	('havakachcheri','JAF'),
	('Nallur','JAF'),
	('Jaffna ','JAF'),
	('Kilinochchi','JAF'),
	('Mannar','VAN'),
	('Vavuniya ','VAN'),
	('Mullaitivu','VAN'),
	('Kalkudah','BAT'),
	('Batticaloa ','BAT'),
	('Padiruppu','BAT'),
	('Ampara','AMP'),
	('Sammanturai','AMP'),
	('Potuvil ','AMP'),
	('Kalmunai','AMP'),
	('Seruwila','TRI'),
	('Trincomalee ','TRI'),
	('Mutur','TRI'),
	('Galgamuwa','KUR'),
	('Nikaweratiya','KUR'),
	('Yapahuwa','KUR'),
	('Hiriyala','KUR'),
	('Wariyapola','KUR'),
	('Panduwasnuwara','KUR'),
	('Bingiriya','KUR'),
	('Katugampola','KUR'),
	('Kuliyapitiya','KUR'),
	('Dambadeniya','KUR'),
	('Polgahawela','KUR'),
	('Kurunegala','KUR'),
	('Mawathagama','KUR'),
	('Dodangaslanda','KUR'),
	('Puttalam','PUT'),
	('Anamaduwa','PUT'),
	('Chilaw','PUT'),
	('Nattandiya ','PUT'),
	('Wennappuwa','PUT'),
	('Horowupotana','ANU'),
	('Anuradhapura-east','ANU'),
	('Anuradhapura-west','ANU'),
	('Kalawewa','ANU'),
	('Mihintale ','ANU'),
	('Kekirawa','ANU'),
	('Minneriya','POL'),
	('Medirigiriya ','POL'),
	('Polonnaruwa','POL'),
	('Mahiyangane','BAD'),
	('Wiyaluwa','BAD'),
	('Passara','BAD'),
	('Badulla','BAD'),
	('Hali-ela','BAD'),
	('Uva-paranagama','BAD'),
	('Welimada','BAD'),
	('Bandarawela ','BAD'),
	('Haputale','BAD'),
	('Bibile','MON'),
	('Moneragala ','MON'),
	('Wellawaya','MON'),
	('Eheliyagoda','RAT'),
	('Ratnapura','RAT'),
	('Pelmadulla','RAT'),
	('Balangoda','RAT'),
	('Rakwana','RAT'),
	('Nivitigala','RAT'),
	('Kalawana ','RAT'),
	('Kolonna','RAT'),
	('Dedigama','KEG'),
	('Galigamuwa','KEG'),
	('Kegalle','KEG'),
	('Rambukkana','KEG'),
	('Mawanella','KEG'),
	('Aranayake','KEG'),
	('Yatiyantota','KEG'),
	('Ruwanwella ','KEG'),
	('Deraniyagala','KEG');




INSERT INTO admin (id,name,password)
	VALUES
	('test','test','test');
	

INSERT INTO election (type, eday, startTime, endTime) 
		VALUES
		('pes','2017/12/2','12:15 AM','1:15 PM');