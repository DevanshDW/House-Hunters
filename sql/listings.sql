-- File: listings.sql
-- Author: Kyle Bayer
-- Author: Devansh Patel
-- Date: October 30th, 2019
-- Updated: November 8th, 2019
-- Description: SQL file to store property listings

DROP TABLE IF EXISTS listings;

CREATE TABLE listings ( 
    listing_id SERIAL PRIMARY KEY,
	user_id varchar(20) NOT NULL REFERENCES users (user_id),
	address varchar(100) NOT NULL,
    status char(1) NOT NULL,
    price numeric NOT NULL,
    headline varchar(100) NOT NULL,
    description varchar(1000) NOT NULL,
    postal_code char(6) NOT NULL,
    images smallint NOT NULL DEFAULT 0,
    city integer NOT NULL,
	airconditioning integer NOT NULL DEFAULT 0,
    acreage integer NOT NULL DEFAULT 0,
    bathrooms integer NOT NULL,
    bedrooms integer NOT NULL,
    garage integer NOT NULL DEFAULT 0,
    grocery integer NOT NULL DEFAULT 0,
    heating integer NOT NULL DEFAULT 0,
	parking integer NOT NULL DEFAULT 0,
	pool integer NOT NULL DEFAULT 0,
    property_options integer NOT NULL,
	schooldistrict integer NOT NULL DEFAULT 0,
    transit integer NOT NULL DEFAULT 0,
    waterfront integer NOT NULL DEFAULT 0
);

--ALTER TABLE listings OWNER TO group10_admin;