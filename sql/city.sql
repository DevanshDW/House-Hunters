-- File: city.sql
-- Author: Devansh Patel
-- Date: October 18th, 2019
-- Description: SQL file to create city property/value table

DROP TABLE IF EXISTS city;

CREATE TABLE city(
	value SMALLINT PRIMARY KEY,
	property VARCHAR(30) NOT NULL
);

ALTER TABLE city OWNER TO group10_admin;

INSERT INTO city (value, property) VALUES (1, 'Ajax');

INSERT INTO city (value, property) VALUES (2, 'Brooklin');

INSERT INTO city (value, property) VALUES (4, 'Bowmanville');

INSERT INTO city (value, property) VALUES (8, 'Oshawa');

INSERT INTO city (value, property) VALUES (16, 'Pickering');

INSERT INTO city (value, property) VALUES (32, 'Port Perry');

INSERT INTO city (value, property) VALUES (64, 'Whitby');

INSERT INTO city (value, property) VALUES (128, 'Scarborough');

INSERT INTO city (value, property) VALUES (256, 'Toronto');

INSERT INTO city (value, property) VALUES (512, 'Mississauga');

INSERT INTO city (value, property) VALUES (1024, 'Etobicoke');

INSERT INTO city (value, property) VALUES (2048, 'York');