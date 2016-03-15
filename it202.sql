drop table if exists clients;
create table clients
  (
    clientId INT(11) auto_increment primary key,
    clientName varchar(32)not null,
    clientPW   varchar(64)not null,
    activeSession varchar(128)not null,
    firstLogin datetime,
    lastLogin  datetime
  );
drop table if exists userprofiles;
create table userprofiles
(
  clientName varchar(25)not null primary key,
  team1 varchar(25),
  team2 varchar(25),
  team3 varchar(25)
 
	
);

drop table if exists LeagueInfo;
create table LeagueInfo
  (
     League varchar(30),
     LeagueRating INT(11),
     Country varchar(30),
     TopTeam varchar(30)
   );
drop table if exists teams;
create table teams
   (
     TeamName varchar(30)not null primary key,
     Country varchar(30),
     TopScorer varchar(30),
     NumberofTitles INT(11)
    );
 
