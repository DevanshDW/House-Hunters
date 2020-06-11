-- File: provinces.sql
-- Author: Devansh Patel
-- Date: October 18th, 2019
-- Description: SQL file to create province value-only table

DROP TABLE IF EXISTS provinces;

CREATE TABLE provinces ( 
	province_abbrev char(2) NOT NULL,
	--province_name varchar(20) NOT NULL
);

ALTER TABLE provinces OWNER TO group10_admin; 

INSERT INTO provinces ( 
	province_abbrev--, 
	--province_name 
)
	VALUES
	(
		'ON'--, 'Ontario'
	),
	(
		'QC'--, 'Quebec'
	);
	(
		'MB'--, 'Manitoba'
	),
	(
		'SK'--, 'Saskatchewan'
	);
	(
		'AB'--, 'Alberta'
	),
	(
		'BC'--, 'British Columbia'
	),
	(
		'NB'--, 'New Brunswick'
	),
	(
		'NL'--, 'Newfoundland & Labrador'
	);
	(
		'NS'--, 'Nova Scotia'
	);
	(
		'PE'--, 'Prince Edward Island'
	);
	(
		'NT'--, 'Northwest Territories'
	);
	(
		'NU'--, 'Nunavut'
	);
	(
		'YT'--, 'Yukon'
	);