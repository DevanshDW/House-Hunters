-- File: airconditioning.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a heating / AC property value table

DROP TABLE IF EXISTS airconditioning;

CREATE TABLE airconditioning(
value INT PRIMARY KEY,
acunits VARCHAR(25) NOT NULL
);

ALTER TABLE airconditioning OWNER TO group10_admin;

INSERT INTO airconditioning (value, acunits) VALUES (1, 'None');

INSERT INTO airconditioning (value, acunits) VALUES (2, 'Standalone Unit');

INSERT INTO airconditioning (value, acunits) VALUES (4, 'Multiple AC Units');

INSERT INTO airconditioning (value, acunits) VALUES (8, 'Furnace System');