CREATE TABLE IF NOT EXISTS users(
    userid INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(255) NOT NULL,
    
    password VARCHAR(100) NOT NULL
);