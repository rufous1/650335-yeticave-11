CREATE DATABASE yeticave
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE yeticave;

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title CHAR(32) NOT NULL,
  character_code CHAR(20) NOT NULL
);

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name CHAR(64) NOT NULL,
  email VARCHAR(128) NOT NULL UNIQUE,
  password CHAR(64) NOT NULL,
  user_contacts_id INT NOT NULL
);

CREATE TABLE lots (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image_lots_id INT NOT NULL,
  first_price INT UNSIGNED NOT NULL,
  date_end TIMESTAMP NOT NULL,
  step TINYINT UNSIGNED NOT NULL,
  user_id INT NOT NULL,
  winner_id INT NOT NULL,
  category_id INT NOT NULL
);

CREATE TABLE bets (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  date_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  bet INT UNSIGNED NOT NULL,
  user_id INT NOT NULL,
  lot_id INT NOT NULL
);

CREATE TABLE user_contacts (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  city VARCHAR(32) NOT NULL,
  address VARCHAR(255) NOT NULL,
  phone TINYINT NOT NULL
);

CREATE TABLE image_lots (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(255) NOT NULL
);

CREATE UNIQUE INDEX user_email ON users(email);
CREATE INDEX lot_search ON lots(title);
CREATE INDEX bet ON bets(bet);

