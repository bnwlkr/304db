--SCHEMA

CREATE TABLE User(
id INT PRIMARY KEY AUTO_INCREMENT,
name CHAR(20),
email CHAR(20) UNIQUE,
password BINARY(64)
);

CREATE TABLE Exchange(name CHAR(20) PRIMARY KEY, website CHAR(20));

CREATE TABLE Commodity(name CHAR(20) PRIMARY KEY);


CREATE TABLE Traded_On(
commodity_name CHAR(20),
exchange_name CHAR(20),
fees DOUBLE,
PRIMARY KEY (commodity_name, exchange_name),
FOREIGN KEY (commodity_name) REFERENCES Commodity(name),
FOREIGN KEY (exchange_name) REFERENCES Exchange(name)
);

CREATE TABLE Account(
user_id INT,
exchange_name CHAR(20),
commodity_name CHAR(20),
value DOUBLE,
PRIMARY KEY (user_id, exchange_name, commodity_name),
FOREIGN KEY (user_id) REFERENCES User(id)
    ON DELETE CASCADE,
FOREIGN KEY (exchange_name) REFERENCES Exchange(name),
FOREIGN KEY (commodity_name) REFERENCES Commodity(name)
);

CREATE TABLE Trade (
timestamp TIMESTAMP PRIMARY KEY ON UPDATE CURRENT_TIMESTAMP,
user_id INT,
exchange_name CHAR(20),
from_commodity_name CHAR(20),
to_commodity_name CHAR(20),
from_value DOUBLE,
to_value DOUBLE,
FOREIGN KEY (user_id) REFERENCES User(id)
    ON DELETE CASCADE,
FOREIGN KEY (exchange_name) REFERENCES Exchange(name),
FOREIGN KEY (to_commodity_name) REFERENCES Commodity(name),
FOREIGN KEY (from_commodity_name) REFERENCES Commodity(name)
);


CREATE TABLE Metric(
id INT PRIMARY KEY,
commodity_name CHAR(20),
exchange_name CHAR(20),
bid INT,
ask INT,
volume INT,
FOREIGN KEY (commodity_name, exchange_name) REFERENCES Traded_On (commodity_name, exchange_name)
    ON DELETE CASCADE
);


--TRIGGERS

