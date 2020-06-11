-- File: heating.sql
-- Author: Devansh Patel
-- Date: November 8th, 2019
-- Description: SQL file to create a heating / AC property value table

DROP TABLE IF EXISTS heating;

CREATE TABLE heating(
value INT PRIMARY KEY,
heatingtype VARCHAR(25) NOT NULL
);

INSERT INTO heating (value, heatingtype) VALUES (1, 'Wood burning Fireplace');

INSERT INTO heating (value, heatingtype) VALUES (2, 'Gas Fireplace');

INSERT INTO heating (value, heatingtype) VALUES (4, 'Electric Fireplace');

INSERT INTO heating (value, heatingtype) VALUES (8, 'Gas Furnace');

INSERT INTO heating (value, heatingtype) VALUES (16, 'Electric Furnace');

INSERT INTO heating (value, heatingtype) VALUES (32, 'Geothermal Heating');

INSERT INTO heating (value, heatingtype) VALUES (64, 'Other');