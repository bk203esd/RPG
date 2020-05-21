DROP TABLE IF EXISTS recipes;
DROP TABLE IF EXISTS inventory;
DROP TABLE IF EXISTS equipment;
DROP TABLE IF EXISTS done;
DROP TABLE IF EXISTS quests;
DROP TABLE IF EXISTS monsters;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS characters;
DROP TABLE IF EXISTS classes;
DROP TABLE IF EXISTS races;
DROP TABLE IF EXISTS users;

CREATE TABLE users
(
    user_name VARCHAR(60),
    email     VARCHAR(100),
    PRIMARY KEY (user_name)
);


CREATE TABLE races
(
    race_name         VARCHAR(60),
    description       text,
    multiply_hp       INT,
    multiply_attack   INT,
    multiply_defense  INT,
    multiply_accuracy INT,
    PRIMARY KEY (race_name)
);


CREATE TABLE classes
(
    clas_name         VARCHAR(60),
    description       text,
    multiply_hp       INT,
    multiply_attack   INT,
    multiply_defense  INT,
    multiply_accuracy INT,
    PRIMARY KEY (clas_name)
);


CREATE TABLE characters
(
    char_name   VARCHAR(60),
    description text,
    xp          INT,
    lvl         INT,
    max_hp      INT,
    attack      INT,
    defense     INT,
    accuracy    INT,
    gold        BIGINT,
    clas_name   VARCHAR(60) REFERENCES classes (clas_name),
    race_name   VARCHAR(60) REFERENCES races (race_name),
    user_name   VARCHAR(60) REFERENCES users (user_name),
    PRIMARY KEY (char_name)
);


CREATE TABLE items
(
    item_name         VARCHAR(60),
    description       text,
    attack_increase   INT,
    defense_increase  INT,
    accuracy_increase INT,
    price             INT,
    PRIMARY KEY (item_name)
);


CREATE TABLE monsters
(
    monster_name VARCHAR(60),
    description  text,
    hp           INT,
    attack       INT,
    defense      INT,
    accuracy     INT,
    gold         INT,
    xp_give      INT,
    PRIMARY KEY (monster_name)
);


CREATE TABLE quests
(
    quest_name   VARCHAR(60),
    description  text,
    item_reward  VARCHAR(60) REFERENCES items (item_name),
    gold_reward  INT,
    monster_name VARCHAR(60) REFERENCES monsters (monster_name),
    xp_reward    INT,
    repeatable   BOOLEAN,
    PRIMARY KEY (quest_name)
);


CREATE TABLE done
(
    quest_name VARCHAR(60) REFERENCES quests (quest_name),
    char_name  VARCHAR(60) REFERENCES characters (char_name),
    user_name  VARCHAR(60) REFERENCES users (user_name),
    PRIMARY KEY (quest_name, char_name, user_name)
);


CREATE TABLE equipment
(
    char_name VARCHAR(60) REFERENCES characters (char_name),
    item_name VARCHAR(60) REFERENCES items (item_name),
    user_name VARCHAR(60) REFERENCES users (user_name),
    PRIMARY KEY (char_name, item_name, user_name)
);


CREATE TABLE inventory
(
    quantity  INT,
    char_name VARCHAR(60) REFERENCES characters (char_name),
    item_name VARCHAR(60) REFERENCES items (item_name),
    user_name VARCHAR(60) REFERENCES users (user_name),
    PRIMARY KEY (char_name, item_name, user_name)
);


CREATE TABLE recipes
(
    item_R VARCHAR(60) REFERENCES items (item_name),
    item_1 VARCHAR(60) REFERENCES items (item_name),
    item_2 VARCHAR(60) REFERENCES items (item_name),
    PRIMARY KEY (item_R, item_1, item_2)
);

INSERT INTO users (user_name, email)
VALUES ('bk203esd', 'bk203esd@gmail.com');

INSERT INTO races (race_name, description, multiply_hp, multiply_attack, multiply_defense, multiply_accuracy)
VALUES ('Humano', 'Viven en la superficie', 1, 1, 1, 1);

INSERT INTO classes (clas_name, description, multiply_hp, multiply_attack, multiply_defense, multiply_accuracy)
VALUES ('Shura', 'Monje', 1, 1, 1, 1);

INSERT INTO characters (char_name, description, xp, lvl, max_hp, attack, defense, accuracy, gold, clas_name, race_name,
                        user_name)
VALUES ('Freya', 'Monje de bk203esd', 500, 15, 500, 25, 25, 25, 200, 'Shura', 'Humano', 'bk203esd');

INSERT INTO monsters (monster_name, description, hp, attack, defense, accuracy, gold, xp_give)
VALUES ('Dragón', 'Ser mitologico escupefuego', 1000, 100, 100, 100, 500, 1000);

INSERT INTO items (item_name, description, attack_increase, defense_increase, accuracy_increase, price)
VALUES ('Casco', 'Cubre la cabeza', 1, 1, 1, 1);

INSERT INTO quests (quest_name, description, item_reward, gold_reward, monster_name, xp_reward, repeatable)
VALUES ('Dragonicidio', 'Mata al dragón malvado', 'Casco', 500, 'Dragón', 5000, true);
