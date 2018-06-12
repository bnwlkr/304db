--SCHEMA

CREATE TABLE Agent(
        id INT PRIMARY KEY,
        name CHAR(20),
        email CHAR(30)
);


CREATE TABLE Exchange(
        name CHAR(20) PRIMARY KEY, website CHAR(20)
);

CREATE TABLE Commodity(
        name CHAR(20) PRIMARY KEY
);

CREATE TABLE Coin(
        commodity_name CHAR(20) PRIMARY KEY,
        FOREIGN KEY (commodity_name) REFERENCES Commodity(name)
);

CREATE TABLE Stock(
        commodity_name CHAR(20) PRIMARY KEY,
        FOREIGN KEY (commodity_name) REFERENCES Commodity(name)
);

CREATE TABLE Traded_On(
        commodity_name CHAR(20),
        exchange_name CHAR(20),
        PRIMARY KEY (commodity_name, exchange_name),
        FOREIGN KEY (commodity_name) REFERENCES Commodity(name),
        FOREIGN KEY (exchange_name) REFERENCES Exchange(name)
);


--TRIGGERS

/* not working, but important for the ISA hierarchy. Will figure out.
CREATE TRIGGER Commodity.Create
    BEFORE INSERT OR UPDATE OF commodity_name ON Coin
    INSERT into Commodity values (commodity_name);
*/


--DUMMY-DATA










