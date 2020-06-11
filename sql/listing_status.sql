-- File: listing_status.sql
-- Author: Devansh Patel
-- Date: October 18th, 2019
-- Description: SQL file to create a listing status property/value table

DROP TABLE IF EXISTS listing_status;

CREATE TABLE listing_status(
value CHAR(1) PRIMARY KEY,
property VARCHAR(8) NOT NULL
);

ALTER TABLE listing_status OWNER TO group10_admin;

INSERT INTO listing_status(value, property) VALUES ('o', 'Open');

INSERT INTO listing_status(value, property) VALUES ('c', 'Closed');

INSERT INTO listing_status(value, property) VALUES ('f', 'For Sale');

INSERT INTO listing_status(value, property) VALUES ('s', 'Sold');

INSERT INTO listing_status(value, property) VALUES ('h', 'Hidden');