/*Create all the needed tables and columns*/
CREATE TABLE User_Account (
    User_ID serial,
    Character_ID int,
    User_Name varchar(255) NOT NULL,
    User_Password varchar(255) NOT NULL,
    PRIMARY KEY (User_ID)
);
CREATE TABLE Player_Character (
    Character_ID serial,
    User_ID int,
    Character_Name varchar(255) NOT NULL,
    Character_Description varchar(255) NOT NULL,
    Character_Stats varchar(255) NOT NULL,
	PRIMARY KEY (Character_ID),
    FOREIGN KEY (User_ID) REFERENCES User_Account(User_ID)
);
ALTER TABLE User_Account
ADD FOREIGN KEY (Character_ID) REFERENCES Player_Character(Character_ID);

CREATE TABLE Encounters (
	Encounter_ID SERIAL,
    Encounter_Name varchar(255) NOT NULL,
  	Encounter_Type varchar(255) NOT NULL,
    Encounter_Description varchar(255) NOT NULL,
    Encounter_Rewards varchar(255) NOT NULL,
    Encounter_Result varchar(255) NOT NULL,
    PRIMARY KEY (Encounter_ID)
);
CREATE TABLE NPCS (
    NPC_ID SERIAL,
    NPC_Name varchar(255) NOT NULL,
    NPC_Description varchar(255) NOT NULL,
    NPC_Stats varchar(255) NOT NULL, 
    PRIMARY KEY (NPC_ID)
);
CREATE TABLE Monsters (
    Monster_ID SERIAL,
    Monster_Name varchar(255) NOT NULL,
    Monster_Description varchar(255) NOT NULL,
    Monster_Stats varchar(255) NOT NULL,
    Monster_Loot varchar(255) NOT NULL,
    PRIMARY KEY (Monster_ID)
);
CREATE TABLE Items (
    Item_ID SERIAL,
    Item_Name varchar(255) NOT NULL,
    Item_Description varchar(255) NOT NULL,
    Item_Effect varchar(255) NOT NULL, 
    Item_Price int NOT NULL,
    PRIMARY KEY (Item_ID)
);
