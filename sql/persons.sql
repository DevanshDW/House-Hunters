-- CREATE database group10_db;
-- use group10_db;

/*DROP TABLE IF EXISTS users CASCADE;*/

DROP TABLE IF EXISTS persons CASCADE;

CREATE TABLE persons (
	user_id varchar(20) PRIMARY KEY, 
	salutation varchar(15) NOT NULL,
	first_name varchar(128) NOT NULL,
	last_name varchar(128) NOT NULL,
	street_address1 varchar(128) NOT NULL,
	street_address2 varchar(128) NOT NULL,
	city varchar(64) NOT NULL,
 	province char(2) NOT NULL, 
	postal_code char(6) NOT NULL,
	primary_phone_number varchar(15) NOT NULL,
	secondary_phone_number varchar(15) NOT NULL,
	fax_number varchar(15) NOT NULL,
	preferred_contact_method char(1) NOT NULL
);

ALTER TABLE persons OWNER TO bayerk;


