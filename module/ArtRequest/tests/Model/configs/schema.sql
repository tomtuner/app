
-----------------------------------------------------------------------
-- art_request
-----------------------------------------------------------------------

DROP TABLE IF EXISTS art_request;

CREATE TABLE art_request
(
	art_request_id INTEGER NOT NULL PRIMARY KEY,
	is_started INTEGER(1) DEFAULT 0 NOT NULL,
	is_completed INTEGER(1) DEFAULT 0 NOT NULL,
	is_archived INTEGER(1) DEFAULT 0 NOT NULL,
	is_request_confirmed INTEGER(1) DEFAULT 0 NOT NULL,
	start_date TIMESTAMP,
	completion_date TIMESTAMP,
	due_date TIMESTAMP NOT NULL,
	art_requestor_id INTEGER NOT NULL,
	art_request_type_id INTEGER NOT NULL,
	event_id INTEGER NOT NULL
);

CREATE INDEX art_request_art_request_type_id ON art_request (art_request_type_id);

CREATE INDEX art_request_art_requestor_type_id ON art_request (art_requestor_id);

CREATE INDEX art_request_event_event_id ON art_request (event_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_requestor_id) REFERENCES art_requestor (art_requestor_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_type_id) REFERENCES art_request_type (art_request_type_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (event_id) REFERENCES event (event_id)

-----------------------------------------------------------------------
-- art_request_art_status
-----------------------------------------------------------------------

DROP TABLE IF EXISTS art_request_art_status;

CREATE TABLE art_request_art_status
(
	user_id INTEGER NOT NULL,
	art_request_id INTEGER NOT NULL,
	PRIMARY KEY (user_id,art_request_id)
);

CREATE INDEX art_request_id ON art_request_art_status (art_request_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (user_id) REFERENCES user (user_id)

-----------------------------------------------------------------------
-- art_request_comment
-----------------------------------------------------------------------

DROP TABLE IF EXISTS art_request_comment;

CREATE TABLE art_request_comment
(
	art_request_comment_id INTEGER NOT NULL PRIMARY KEY,
	art_request_id INTEGER NOT NULL,
	comment_text LONGBLOB NOT NULL,
	comment_date TIMESTAMP NOT NULL,
	user_id INTEGER NOT NULL
);

CREATE INDEX art_request_comment_user_id ON art_request_comment (user_id);

CREATE INDEX art_request_comment_art_request_id ON art_request_comment (art_request_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (user_id) REFERENCES user (user_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-----------------------------------------------------------------------
-- art_request_document
-----------------------------------------------------------------------

DROP TABLE IF EXISTS art_request_document;

CREATE TABLE art_request_document
(
	art_request_document_id INTEGER NOT NULL PRIMARY KEY,
	art_request_id INTEGER NOT NULL,
	file_name VARCHAR(100) NOT NULL,
	file_description VARCHAR(500) NOT NULL,
	extension_type VARCHAR(3) NOT NULL
);

CREATE INDEX art_request_document_art_request_id ON art_request_document (art_request_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-----------------------------------------------------------------------
-- art_request_type
-----------------------------------------------------------------------

DROP TABLE IF EXISTS art_request_type;

CREATE TABLE art_request_type
(
	art_request_type_id INTEGER NOT NULL PRIMARY KEY,
	art_request_type_name VARCHAR(50) NOT NULL
);

-----------------------------------------------------------------------
-- art_requestor
-----------------------------------------------------------------------

DROP TABLE IF EXISTS art_requestor;

CREATE TABLE art_requestor
(
	art_requestor_id INTEGER NOT NULL PRIMARY KEY,
	dce_name VARCHAR(50) NOT NULL,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	email_address VARCHAR(50) NOT NULL,
	phone_number VARCHAR(12) NOT NULL,
	UNIQUE (dce_name)
);

-----------------------------------------------------------------------
-- banner_location
-----------------------------------------------------------------------

DROP TABLE IF EXISTS banner_location;

CREATE TABLE banner_location
(
	banner_location_id INTEGER NOT NULL PRIMARY KEY,
	banner_location_name VARCHAR(100) NOT NULL
);

-----------------------------------------------------------------------
-- banner_request
-----------------------------------------------------------------------

DROP TABLE IF EXISTS banner_request;

CREATE TABLE banner_request
(
	banner_request_id INTEGER NOT NULL PRIMARY KEY,
	art_request_id INTEGER NOT NULL,
	banner_width INTEGER NOT NULL,
	banner_length INTEGER NOT NULL,
	banner_location_id INTEGER NOT NULL
);

CREATE INDEX banner_request_art_request_id ON banner_request (art_request_id);

CREATE INDEX banner_request_banner_location_id ON banner_request (banner_location_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (banner_location_id) REFERENCES banner_location (banner_location_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-----------------------------------------------------------------------
-- event
-----------------------------------------------------------------------

DROP TABLE IF EXISTS event;

CREATE TABLE event
(
	event_id INTEGER NOT NULL PRIMARY KEY,
	event_name VARCHAR(100) NOT NULL,
	event_description LONGBLOB NOT NULL,
	event_location VARCHAR(100) NOT NULL,
	event_sponsor_name VARCHAR(100) NOT NULL,
	event_start_time TIMESTAMP NOT NULL,
	event_end_time TIMESTAMP NOT NULL
);

-----------------------------------------------------------------------
-- event_price
-----------------------------------------------------------------------

DROP TABLE IF EXISTS event_price;

CREATE TABLE event_price
(
	event_price_type_id INTEGER NOT NULL,
	event_id INTEGER NOT NULL,
	PRIMARY KEY (event_price_type_id,event_id)
);

CREATE INDEX event_id ON event_price (event_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (event_id) REFERENCES event (event_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (event_price_type_id) REFERENCES event_price_type (event_price_type_id)

-----------------------------------------------------------------------
-- event_price_type
-----------------------------------------------------------------------

DROP TABLE IF EXISTS event_price_type;

CREATE TABLE event_price_type
(
	event_price_type_id INTEGER NOT NULL PRIMARY KEY,
	event_price_type_name VARCHAR(50) NOT NULL
);

-----------------------------------------------------------------------
-- flyer_art_request
-----------------------------------------------------------------------

DROP TABLE IF EXISTS flyer_art_request;

CREATE TABLE flyer_art_request
(
	flyer_art_request_id INTEGER NOT NULL PRIMARY KEY,
	flyer_size_id INTEGER NOT NULL,
	flyer_format_id INTEGER(10) NOT NULL,
	art_request_id INTEGER NOT NULL
);

CREATE INDEX flyer_art_request_art_request_id ON flyer_art_request (art_request_id);

CREATE INDEX flyer_art_request_flyer_format_id ON flyer_art_request (flyer_format_id);

CREATE INDEX flyer_art_request_flyer_size_id ON flyer_art_request (flyer_size_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (flyer_size_id) REFERENCES flyer_size (flyer_size_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (flyer_format_id) REFERENCES flyer_format (flyer_format_id)

-----------------------------------------------------------------------
-- flyer_format
-----------------------------------------------------------------------

DROP TABLE IF EXISTS flyer_format;

CREATE TABLE flyer_format
(
	flyer_format_id INTEGER NOT NULL PRIMARY KEY,
	flyer_format_type VARCHAR(20) NOT NULL
);

-----------------------------------------------------------------------
-- flyer_size
-----------------------------------------------------------------------

DROP TABLE IF EXISTS flyer_size;

CREATE TABLE flyer_size
(
	flyer_size_id INTEGER NOT NULL PRIMARY KEY,
	flyer_size_type VARCHAR(10) NOT NULL
);

-----------------------------------------------------------------------
-- logo_art_request
-----------------------------------------------------------------------

DROP TABLE IF EXISTS logo_art_request;

CREATE TABLE logo_art_request
(
	logo_art_request_id INTEGER NOT NULL PRIMARY KEY,
	description_text LONGBLOB NOT NULL,
	art_request_id INTEGER NOT NULL
);

CREATE INDEX logo_art_request_art_request_id ON logo_art_request (art_request_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-----------------------------------------------------------------------
-- other_art_request
-----------------------------------------------------------------------

DROP TABLE IF EXISTS other_art_request;

CREATE TABLE other_art_request
(
	other_art_request_id INTEGER NOT NULL PRIMARY KEY,
	description_text LONGBLOB NOT NULL,
	art_request_id INTEGER NOT NULL
);

CREATE INDEX other_art_request_art_request_id ON other_art_request (art_request_id);

-- SQLite does not support foreign keys; this is just for reference
-- FOREIGN KEY (art_request_id) REFERENCES art_request (art_request_id)

-----------------------------------------------------------------------
-- user
-----------------------------------------------------------------------

DROP TABLE IF EXISTS user;

CREATE TABLE user
(
	user_id INTEGER NOT NULL PRIMARY KEY,
	user_first_name VARCHAR(50) NOT NULL,
	user_last_name VARCHAR(50) NOT NULL,
	user_dce_name VARCHAR(10) NOT NULL
);
