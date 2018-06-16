--SCHEMA

CREATE TABLE User(id INT PRIMARY KEY,name CHAR(20),email CHAR(20));

CREATE TABLE Exchange(name CHAR(20) PRIMARY KEY, website CHAR(20));

CREATE TABLE Commodity(name CHAR(20) PRIMARY KEY);


CREATE TABLE Traded_On(
commodity_name CHAR(20),
exchange_name CHAR(20),
PRIMARY KEY (commodity_name, exchange_name),
FOREIGN KEY (commodity_name) REFERENCES Commodity(name),
FOREIGN KEY (exchange_name) REFERENCES Exchange(name)
);

CREATE TABLE Account(
user_id INT,
exchange_name CHAR(20),
value DOUBLE,
PRIMARY KEY (user_id, exchange_name),
FOREIGN KEY (user_id) REFERENCES User(id),
FOREIGN KEY (exchange_name) REFERENCES Exchange(name)
);

CREATE TABLE Trade (
timestamp INT PRIMARY KEY,
user_id INT,
exchange_name CHAR(20),
commodity_name CHAR(20),
value DOUBLE,
bought BOOL,
FOREIGN KEY (user_id) REFERENCES User(id)
    ON DELETE CASCADE,
FOREIGN KEY (exchange_name) REFERENCES Exchange(name),
FOREIGN KEY (commodity_name) REFERENCES Commodity(name)
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

CREATE TABLE Price (metric_id INT PRIMARY KEY,
buy INT,
sell INT,
FOREIGN KEY (metric_id) REFERENCES Metric(id)
    ON DELETE CASCADE
);
