# データベースを作成しておく
# 	データベース名：fruits
# 	文字コード　　：utf8_bin

# DROP DATABASE fruits;
# DROP USER 'fruits'@'localhost';

# ユーザーの作成
# 	ユーザー名：fruits
# 	パスワード：pass

CREATE USER 'fruits'@'localhost';

SET PASSWORD FOR 'fruits'@'localhost'=PASSWORD('pass');

GRANT USAGE ON *.* TO 'fruits'@'localhost' IDENTIFIED BY 'pass' WITH MAX_QUERIES_PER_HOUR 0
 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 
GRANT ALL PRIVILEGES ON fruits.* TO 'fruits'@'localhost' WITH GRANT OPTION;

#DROP TABLE syohin;
#DROP TABLE uriage;

# テーブルの作成

CREATE TABLE syohin (
 scd INT PRIMARY KEY,
 sname VARCHAR(30),
 stanka INT DEFAULT 0,
 simage VARCHAR(30)
);

INSERT INTO syohin VALUES (1,'ばなな',300,'banana.jpg');
INSERT INTO syohin VALUES (2,'パイン',600,'pain.jpg');
INSERT INTO syohin VALUES (3,'レモン',160,'lemon.jpg');


CREATE TABLE uriage (
 uriageid INT AUTO_INCREMENT PRIMARY KEY,
 date DATETIME,
 scd INT,
 sname VARCHAR(30),
 suryo INT DEFAULT 0,
 tanka INT DEFAULT 0,
 kingaku INT DEFAULT 0,
 pay VARCHAR(10),
 namae VARCHAR(30),
 email VARCHAR(30),
 tel VARCHAR(15),
 zip VARCHAR(8),
 addr VARCHAR(100),
 memo VARCHAR(200)
);

