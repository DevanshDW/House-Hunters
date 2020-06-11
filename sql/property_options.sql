-- File: property_options.sql
-- Author: Devansh Patel
-- Date: October 18th, 2019
-- Description: SQL file to create a property_options property value table

DROP TABLE IF EXISTS property_options;

CREATE TABLE property_option(
value INT PRIMARY KEY,
property VARCHAR(30) NOT NULL
);

ALTER TABLE property_options OWNER TO group10_admin;

INSERT INTO property_options (value, property) VALUES (1, 'Exterior Parking');

INSERT INTO property_options (value, property) VALUES (2, 'Garage');

INSERT INTO property_options (value, property) VALUES (4, 'AC / Heating');

INSERT INTO property_options (value, property) VALUES (8, 'Pool');

INSERT INTO property_options (value, property) VALUES (16, 'Acreage');

INSERT INTO property_options (value, property) VALUES (32, 'Waterfront');

INSERT INTO property_options (value, property) VALUES (64, 'Public Transit');

INSERT INTO property_options (value, property) VALUES (128, 'Grocery Stores');

INSERT INTO property_options (value, property) VALUES (256, 'School District');