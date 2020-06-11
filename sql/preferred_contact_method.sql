-- File: preferred_contact_method.sql
-- Author: Devansh Patel
-- Date: October 18th, 2019
-- Description: SQL file to create persons value-only table

DROP TABLE IF EXISTS preferred_contact_method;

CREATE TABLE preferred_contact_method ( 
	value char(1) NOT NULL,
	method varchar(12) NOT NULL
);

ALTER TABLE preferred_contact_method OWNER TO group10_admin; 

INSERT INTO preferred_contact_method ( 
	value, 
	method 
)
	VALUES
	(
		'e', 'E-mail'
	),
	(
		'p', 'Phone'
	),
	(
		'l', 'Letter Mail'
	);