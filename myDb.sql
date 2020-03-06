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
    Character_Race varchar(255) NOT NULL,
    Character_STR varchar(255) NOT NULL,
    Character_DEX varchar(255) NOT NULL,
    Character_CON varchar(255) NOT NULL,
    Character_INT varchar(255) NOT NULL,
    Character_WIS varchar(255) NOT NULL,
    Character_CHA varchar(255) NOT NULL,
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
    Monster_HP varchar(255) NOT NULL,
    Monster_Attack varchar(255) NOT NULL,
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

/*Insert default and test data into the tables*/
INSERT INTO User_Account (User_Name, User_Password)
VALUES ('John', 'Johnson');
INSERT INTO Player_Character (Character_Name, Character_Description, Character_Race, Character_STR, Character_DEX, Character_CON, Character_INT, Character_WIS,Character_CHA)
VALUES ('Johnny The Swordsman', 'Tall, Handsome, Strong', 'Human', '18', '13', '6', '16', '14', '3');
INSERT INTO Player_Character (Character_Name, Character_Description, Character_Race, Character_STR, Character_DEX, Character_CON, Character_INT, Character_WIS,Character_CHA)
VALUES ('Bob The Blademaster', 'Short, Fat, Bald', 'Orc', '14', '13', '12', '13', '14', '3');
INSERT INTO Player_Character (Character_Name, Character_Description, Character_Race, Character_STR, Character_DEX, Character_CON, Character_INT, Character_WIS,Character_CHA)
VALUES ('Tim The Wizard', 'Tall, Old, Lanky', 'Elf', '18', '5', '12', '16', '14', '16');
INSERT INTO Encounters (Encounter_Name, Encounter_Type, Encounter_Description, Encounter_Rewards, Encounter_Result)
VALUES ('The Swamp', 'Combat', 'An oozing swamp bubbling with ferocious creatures and cretins. A goblin blocks the way.', 
        'An iron dagger, 50 gold pieces.', 'You beat the goblin!');
INSERT INTO NPCS (NPC_Name, NPC_Description, NPC_Stats)
VALUES ('Bob the Blacksmith', 'Muscular, Friendly', '20STR, 12DEX, 11INT, 16CON, 10WIS, 18CHA,');
INSERT INTO Monsters (Monster_Name, Monster_Description, Monster_HP, Monster_Attack, Monster_Loot)
VALUES ('Goblin', 'Small, Green, Evil', '6hp', '1d6', 'Iron Dagger, 50 gold pieces');
INSERT INTO Items (Item_Name, Item_Description, Item_Effect, Item_Price)
VALUES ('Iron Dagger', 'Small dagger of well wrought iron.', '+2 Dmg, +1 Str', '100');
