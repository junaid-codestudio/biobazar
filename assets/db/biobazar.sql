-- CREATE DATABASE biobazar;

CREATE TABLE email_subscriptions (
	email_id BIGINT auto_increment NOT NULL,
	email varchar(500) NOT NULL,
	created_at DATETIME DEFAULT current_timestamp() NOT NULL,
	updated_at DATETIME DEFAULT current_timestamp() on update current_timestamp() NOT NULL,
	deleted_at DATETIME NULL,
	CONSTRAINT email_subscriptions_pk PRIMARY KEY (email_id),
	CONSTRAINT email_subscriptions_un UNIQUE KEY (email),
	email_verified INT DEFAULT 0 NOT NULL,
	email_verified_at DATETIME NULL
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
CREATE INDEX email_subscriptions_deleted_at_IDX USING BTREE ON email_subscriptions (deleted_at);

CREATE TABLE users ( 
	user_id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(500) NOT NULL,
	password TEXT NOT NULL,
	status INT DEFAULT 1 NOT NULL,
	created_at DATETIME DEFAULT current_timestamp() NOT NULL,
	PRIMARY KEY (user_id)
)
ENGINE = InnoDB;
