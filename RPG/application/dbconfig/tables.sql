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

CREATE TABLE users(
                      user_name VARCHAR(60) PRIMARY KEY,
                      password VARCHAR(60),
                      register_date DATE DEFAULT CURRENT_TIMESTAMP,
                      last_connection DATE  DEFAULT CURRENT_TIMESTAMP,
                      last_disconnection DATE  DEFAULT CURRENT_TIMESTAMP,
                      type_user VARCHAR(10)
);


CREATE TABLE races(
                      races_name VARCHAR(60) PRIMARY KEY,
                      description text,
                      multiply_hp INT,
                      multiply_attack INT,
                      multiply_defence INT,
                      multiply_accuracy INT
);


CREATE TABLE classes(
                        class_name VARCHAR(60) PRIMARY KEY,
                        description text,
                        multiply_hp INT,
                        multiply_attack INT,
                        multiply_defence INT,
                        multiply_accuracy INT
);


CREATE TABLE characters(
                           char_name VARCHAR(60) UNIQUE,
                           description text,
                           sex VARCHAR(60),
                           xp INT,
                           lvl INT,
                           max_hp INT,
                           attack INT,
                           defense INT,
                           accuracy INT,
                           gold BIGINT,
                           class_name VARCHAR(60) REFERENCES classes (class_name),
                           races VARCHAR(60) REFERENCES races (races_name),
                           user_name VARCHAR(60) REFERENCES users (user_name) UNIQUE,
                           PRIMARY KEY (char_name, user_name)
);


CREATE TABLE items(
                      item_name VARCHAR(60) PRIMARY KEY,
                      description text,
                      restore_hp INT,
                      attack_increase INT,
                      defence_increase INT,
                      accuracy_increase INT,
                      price INT,
                      img VARCHAR(60)
);


CREATE TABLE monsters(
                         monster_name VARCHAR(60) PRIMARY KEY,
                         description text,
                         hp INT,
                         attack INT,
                         defence INT,
                         accuracy INT,
                         gold INT,
                         xp_give INT
);


CREATE TABLE quests(
                       quest_name VARCHAR(60) PRIMARY KEY,
                       description text,
                       item_reward VARCHAR(60) REFERENCES items(item_name),
                       quantity_item INT,
                       gold_reward INT,
                       monster_name VARCHAR(60) REFERENCES monsters(monster_name),
                       quantity_monster INT,
                       xp_reward INT,
                       repeatable BOOLEAN
);


CREATE TABLE done(
                     quest_name VARCHAR(60) REFERENCES quests (quest_name),
                     char_name VARCHAR(60) REFERENCES characters (char_name),
                     user_name VARCHAR(60) REFERENCES characters (user_name),
                     PRIMARY KEY (quest_name, char_name, user_name)
);


CREATE TABLE equipment(
                          char_name VARCHAR(60) REFERENCES characters (char_name),
                          item_name VARCHAR(60) REFERENCES items (item_name),
                          user_name VARCHAR(60) REFERENCES users (user_name),
                          PRIMARY KEY (char_name, item_name, user_name)
);


CREATE TABLE inventory(
                          quantity INT,
                          char_name VARCHAR(60) REFERENCES characters (char_name),
                          item_name VARCHAR(60) REFERENCES items (item_name),
                          user_name VARCHAR(60) REFERENCES users (user_name),
                          PRIMARY KEY (char_name, item_name, user_name)
);


CREATE TABLE recipes(
                        item_R VARCHAR(60) REFERENCES items (item_name),
                        item_1 VARCHAR(60) REFERENCES items (item_name),
                        item_2 VARCHAR(60) REFERENCES items (item_name),
                        PRIMARY KEY (item_R, item_1, item_2)
);

INSERT INTO users (user_name, password, type_user) VALUES('admin','1234', 'admin');
INSERT INTO users (user_name, password, type_user) VALUES('gmora','1234', 'player');

INSERT INTO races VALUES ('pandaren', 'Panda', 5, 1, 4, 2);

INSERT INTO classes VALUES ('rogue', 'Kill', 1, 5, 2, 3);

INSERT INTO characters VALUES ('bk203esd', 'Player 1 = bk203esd', 'male', 0, 100, 999, 999, 999, 999, 99999, 'rogue', 'pandaren', 'gmora');

INSERT INTO items (item_name, description, price, img) VALUES ('Rod', 'Only a rod', 7, '/RPG/ufiles/rod.png');

INSERT INTO items (item_name, description, price, img) VALUES ('Iron', 'Gray metal', 10, '/RPG/ufiles/iron.png');

INSERT INTO items (item_name, description, attack_increase, defence_increase, accuracy_increase, price, img) VALUES ('Sword', 'Can cut', 10, 0, 4, 20, '/RPG/ufiles/sword.png');

INSERT INTO items (item_name, description, restore_hp, price, img) VALUES ('potion', 'Can heal some HP', 25, 12, '/RPG/ufiles/potion.png');

INSERT INTO monsters VALUES ('Treeguy', 'Kawaii Tree', 25, 2, 3, 3, 1, 5);

INSERT INTO quests VALUES ('Hunting paper', 'Kill 25 Treeguys', 'potion', 5, 43, 'Treeguy', 25, 150, true);

INSERT INTO inventory VALUES (10, 'bk203esd', 'Rod', 'gmora');

INSERT INTO inventory VALUES (2, 'bk203esd', 'Iron', 'gmora');

INSERT INTO equipment VALUES ('bk203esd', 'Sword', 'gmora');
