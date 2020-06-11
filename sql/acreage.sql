-- File: acreage.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create an acreage property value table

DROP TABLE IF EXISTS acreage;

CREATE TABLE acreage(
value INT PRIMARY KEY,
acres VARCHAR(26) NOT NULL
);

ALTER TABLE acreage OWNER TO group10_admin;

INSERT INTO acreage (value, acres) VALUES (1, 'No Land');

INSERT INTO acreage (value, acres) VALUES (2, '1+ Acres');

INSERT INTO acreage (value, acres) VALUES (4, '2+ Acres');

INSERT INTO acreage (value, acres) VALUES (8, '5+ Acres');

INSERT INTO acreage (value, acres) VALUES (16, '10+ Acres');

INSERT INTO acreage (value, acres) VALUES (32, '50+ Acres');