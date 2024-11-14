CREATE DATABASE adrarquiz;
USE adrarquiz;

CREATE TABLE users(
   id_user INT PRIMARY KEY AUTO_INCREMENT,
   firstname_user VARCHAR(50),
   lastname_user VARCHAR(50),
   email_user VARCHAR(50),
   password_user VARCHAR(100),
   roles_user VARCHAR(100),
   avatar_user VARCHAR(255)
);

CREATE TABLE questions(
   id_question INT PRIMARY KEY AUTO_INCREMENT,
   title_question VARCHAR(100),
   description_question VARCHAR(255),
   img_question VARCHAR(255),
   multiple INT
);

CREATE TABLE categorys(
   id_category INT PRIMARY KEY AUTO_INCREMENT,
   title_category VARCHAR(50)
);

CREATE TABLE answers(
   id_answer INT PRIMARY KEY AUTO_INCREMENT,
   text_answer VARCHAR(100),
   valid_answer BOOLEAN,
   answer_point INT,
   id_question INT NOT NULL,
   FOREIGN KEY(id_question) REFERENCES questions(id_question)
);

CREATE TABLE quizs(
   id_quiz INT PRIMARY KEY AUTO_INCREMENT,
   title_quiz VARCHAR(255),
   description_quiz TEXT,
   img_quiz VARCHAR(255)
);

CREATE TABLE playeds(
   id_played INT PRIMARY KEY AUTO_INCREMENT,
   sucessfull_played BOOLEAN,
   create_at_played DATETIME,
   id_user INT NOT NULL,
   id_quiz INT NOT NULL,
   id_question INT NOT NULL,
   FOREIGN KEY(id_user) REFERENCES users(id_user),
   FOREIGN KEY(id_quiz) REFERENCES quizs(id_quiz),
   FOREIGN KEY(id_question) REFERENCES questions(id_question)
);

CREATE TABLE to_qualify(
   id_category INT,
   id_quiz INT,
   PRIMARY KEY AUTO_INCREMENT(id_category, id_quiz),
   FOREIGN KEY(id_category) REFERENCES categorys(id_category),
   FOREIGN KEY(id_quiz) REFERENCES quizs(id_quiz)
);

CREATE TABLE to_contain(
   id_question INT,
   id_quiz INT,
   PRIMARY KEY AUTO_INCREMENT(id_question, id_quiz),
   FOREIGN KEY(id_question) REFERENCES questions(id_question),
   FOREIGN KEY(id_quiz) REFERENCES quizs(id_quiz)
);

CREATE TABLE to_answer(
   id_answer INT,
   id_played INT,
   PRIMARY KEY AUTO_INCREMENT(id_answer, id_played),
   FOREIGN KEY(id_answer) REFERENCES answers(id_answer),
   FOREIGN KEY(id_played) REFERENCES playeds(id_played)
);