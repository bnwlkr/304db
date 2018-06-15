--SCHEMA

CREATE TABLE Agent(id INT PRIMARY KEY,name CHAR(20),email CHAR(30));

CREATE TABLE Exchange(name CHAR(20) PRIMARY KEY, website CHAR(20));

CREATE TABLE Commodity(name CHAR(20) PRIMARY KEY);


CREATE TABLE Traded_On(commodity_name CHAR(20),
exchange_name CHAR(20),
PRIMARY KEY (commodity_name, exchange_name),
FOREIGN KEY (commodity_name) REFERENCES Commodity(name),
FOREIGN KEY (exchange_name) REFERENCES Exchange(name)
);


CREATE TABLE Metric(
id INT PRIMARY KEY,
commodity_name CHAR(20),
exchange_name CHAR(20),
FOREIGN KEY (commodity_name, exchange_name) REFERENCES Traded_On (commodity_name, exchange_name)
    ON DELETE CASCADE
);

CREATE TABLE Price (metric_id INT PRIMARY KEY,
buy INT,
sell INT,
FOREIGN KEY (metric_id) REFERENCES Metric(id)
    ON DELETE CASCADE
);
