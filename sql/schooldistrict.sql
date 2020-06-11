-- File: schooldistrict.sql
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Description: SQL file to create a school district property value table

DROP TABLE IF EXISTS schooldistrict;

CREATE TABLE schooldistrict(
value INT PRIMARY KEY,
isschool VARCHAR(25) NOT NULL
);

ALTER TABLE schooldistrict OWNER TO group10_admin;

INSERT INTO schooldistrict (value, isschool) VALUES (1, 'None');

INSERT INTO schooldistrict (value, isschool) VALUES (2, 'Community Centre');

INSERT INTO schooldistrict (value, isschool) VALUES (4, 'Near School Bus Route');

INSERT INTO schooldistrict (value, isschool) VALUES (8, 'Kindergarten / Daycare');

INSERT INTO schooldistrict (value, isschool) VALUES (16, 'Elementary School');

INSERT INTO schooldistrict (value, isschool) VALUES (32, 'Secondary School');

INSERT INTO schooldistrict (value, isschool) VALUES (64, 'Post-Secondary School');