-- File: exteriorparking.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create an exterior parking property value table

DROP TABLE IF EXISTS exteriorparking;

CREATE TABLE exteriorparking(
value INT PRIMARY KEY,
parkingspace VARCHAR(32) NOT NULL
);

ALTER TABLE exteriorparking OWNER TO group10_admin;

INSERT INTO exteriorparking (value, parkingspace) VALUES (1, 'No Exterior Parking');

INSERT INTO exteriorparking (value, parkingspace) VALUES (2, 'Street-Side Parking');

INSERT INTO exteriorparking (value, parkingspace) VALUES (4, '1 Car-Width Drive-Way');

INSERT INTO exteriorparking (value, parkingspace) VALUES (8, '2 Car-Width Drive-Way');

INSERT INTO exteriorparking (value, parkingspace) VALUES (16, 'Large Drive-Way');