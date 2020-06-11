-- File: salutations.sql
-- Author: Devansh Patel
-- Date: October 18th, 2019
-- Description: SQL file to create salutation value-only table

DROP TABLE IF EXISTS salutations;

CREATE TABLE salutations ( 
	salutations varchar(15) NOT NULL
);

ALTER TABLE salutations OWNER TO group10_admin; 

INSERT INTO salutations (salutations) VALUES ('Salutations');

INSERT INTO salutations (salutations) VALUES ('Hello');

INSERT INTO salutations (salutations) VALUES ('Greetings');

INSERT INTO salutations (Salutations) VALUES ('Welcome back');

INSERT INTO salutations (salutations) VALUES ('Good day');