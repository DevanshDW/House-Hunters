-- File: waterfront.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a waterfront property value table

DROP TABLE IF EXISTS waterfront;

CREATE TABLE waterfront(
value INT PRIMARY KEY,
waterpresence VARCHAR(24) NOT NULL
);

ALTER TABLE waterfront OWNER TO group10_admin;

INSERT INTO waterfront (value, waterpresence) VALUES (1, 'No');

INSERT INTO waterfront (value, waterpresence) VALUES (2, 'Distant View');

INSERT INTO waterfront (value, waterpresence) VALUES (4, 'Nearby - Viewless');

INSERT INTO waterfront (value, waterpresence) VALUES (8, 'Neighboring With View');