-- File: bedrooms.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a bedrooms property value table

DROP TABLE IF EXISTS bedrooms;

CREATE TABLE bedrooms(
value INT PRIMARY KEY,
rooms VARCHAR(20) NOT NULL
);

ALTER TABLE bedrooms OWNER TO group10_admin;

INSERT INTO bedrooms (value, rooms) VALUES (1, 'Bachelor / Studio');

INSERT INTO bedrooms (value, rooms) VALUES (2, '1 Bedroom');

INSERT INTO bedrooms (value, rooms) VALUES (4, '2 Bedrooms');

INSERT INTO bedrooms (value, rooms) VALUES (8, '3 Bedrooms');

INSERT INTO bedrooms (value, rooms) VALUES (16, '4 Bedrooms');

INSERT INTO bedrooms (value, rooms) VALUES (32, '5 Bedrooms');

INSERT INTO bedrooms (value, rooms) VALUES (64, '6 Bedrooms');

INSERT INTO bedrooms (value, rooms) VALUES (128, '7+ Bedrooms');