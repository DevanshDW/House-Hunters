-- CREATE database group10_db;
-- use group10_db;

/*DROP TABLE IF EXISTS users CASCADE;*/

CREATE TABLE users (
	user_id varchar(20) PRIMARY KEY, 
	password varchar(32) NOT NULL,
	user_type varchar(2) NOT NULL,
	email_address varchar(256) NOT NULL,
	enrol_date date NOT NULL,
	last_access date NOT NULL
);

/*
User types

s - Admin
a - Agent
c - Client
p - Pending agent
d - Disabled

*/

/* ALTER TABLE users OWNER TO group10_admin; */

-- Inserts 4 users into the users table testadmin, testagent, testclient, testpending
INSERT INTO users (
	user_id, 
	password, 
	user_type, 
	email_address, 
	enrol_date, 
	last_access
)
	VALUES
	(
		'jdoe', md5('password'), 'c', 'jdoe@dcmail.ca',  '2018-1-1', CURRENT_TIMESTAMP
	),
	(
		'testadmin', md5('supersecure'), 's', 'testadmin@test.ca', '2019-09-20', CURRENT_TIMESTAMP
	),
	(
		'testagent', md5('supersecure'), 'a', 'testagent@test.ca', '2019-09-20', CURRENT_TIMESTAMP
	),
	(
		'testclient', md5('supersecure'), 'c', 'testclient@test.ca', '2019-09-20', CURRENT_TIMESTAMP
	),
	(
		'testpending', md5('supersecure'), 'p', 'testclient@test.ca', '2019-09-20', CURRENT_TIMESTAMP
	);