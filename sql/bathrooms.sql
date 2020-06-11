-- File: bathrooms.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a bathroom property value table

DROP TABLE IF EXISTS bathrooms;

CREATE TABLE bathrooms(
value INT PRIMARY KEY,
rooms VARCHAR(35) NOT NULL
);

ALTER TABLE bathrooms OWNER TO group10_admin;

INSERT INTO bathrooms (value, rooms) VALUES (1, '0, with Septic System Installed');

INSERT INTO bathrooms (value, rooms) VALUES (2, 'Outhouses Only');

INSERT INTO bathrooms (value, rooms) VALUES (4, '1/2 Bathroom');

INSERT INTO bathrooms (value, rooms) VALUES (8, '1 Full Bathroom');

INSERT INTO bathrooms (value, rooms) VALUES (16, '2 Bathrooms');

INSERT INTO bathrooms (value, rooms) VALUES (32, '3 Bathrooms');

INSERT INTO bathrooms (value, rooms) VALUES (64, '4 Bathrooms');

INSERT INTO bathrooms (value, rooms) VALUES (128, '5 Bathrooms');

INSERT INTO bathrooms (value, rooms) VALUES (256, '6 Bathrooms');

INSERT INTO bathrooms (value, rooms) VALUES (512, '7+ Bathrooms');