-- File: garage.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a garage property value table

DROP TABLE IF EXISTS garage;

CREATE TABLE garage(
value INT PRIMARY KEY,
parkingspace VARCHAR(28) NOT NULL
);

ALTER TABLE garage OWNER TO group10_admin;

INSERT INTO garage (value, parkingspace) VALUES (1, 'No Covered Parking');

INSERT INTO garage (value, parkingspace) VALUES (2, 'Shared Underground Parking');

INSERT INTO garage (value, parkingspace) VALUES (4, '1 Door Private Garage');

INSERT INTO garage (value, parkingspace) VALUES (8, '2 Door Private Garage');

INSERT INTO garage (value, parkingspace) VALUES (16, 'Large Private Garage');