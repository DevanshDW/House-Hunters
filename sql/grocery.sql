-- File: grocery.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a grocery store property value table

DROP TABLE IF EXISTS grocerystore;

CREATE TABLE grocerystore(
value INT PRIMARY KEY,
isgrocery VARCHAR(28) NOT NULL
);

ALTER TABLE grocerystore OWNER TO group10_admin;

INSERT INTO grocerystore (value, isgrocery) VALUES (1, 'None');

INSERT INTO grocerystore (value, isgrocery) VALUES (2, 'Grocery Stores Nearby');

INSERT INTO grocerystore (value, isgrocery) VALUES (4, 'Supermarket/Malls Nearby');