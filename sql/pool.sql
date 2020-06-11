-- File: pool.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a pool property value table

DROP TABLE IF EXISTS pool;

CREATE TABLE pool(
value INT PRIMARY KEY,
pools VARCHAR(26) NOT NULL
);

ALTER TABLE pool OWNER TO group10_admin;

INSERT INTO pool (value, pools) VALUES (1, 'No Pool');

INSERT INTO pool (value, pools) VALUES (2, 'Public Pool Nearby');

INSERT INTO pool (value, pools) VALUES (4, 'Above-Ground Pool');

INSERT INTO pool (value, pools) VALUES (8, 'Rectangular Inground Pool');

INSERT INTO pool (value, pools) VALUES (16, 'Custom Luxury Pool');