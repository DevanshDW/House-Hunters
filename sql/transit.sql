-- File: transit.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a public transit property value table

DROP TABLE IF EXISTS publictransit;

CREATE TABLE publictransit(
value INT PRIMARY KEY,
istransit VARCHAR(20) NOT NULL
);

ALTER TABLE publictransit OWNER TO group10_admin;

INSERT INTO publictransit (value, istransit) VALUES (1, 'None');

INSERT INTO publictransit (value, istransit) VALUES (2, 'Bus Routes Nearby');

INSERT INTO publictransit (value, istransit) VALUES (4, 'Subway/Train Nearby');