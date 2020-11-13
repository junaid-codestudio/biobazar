-- CREATE DATABASE biobazar;

CREATE TABLE email_subscriptions (
	email_id BIGINT auto_increment NOT NULL,
	email varchar(500) NOT NULL,
	created_at DATETIME DEFAULT current_timestamp() NOT NULL,
	updated_at DATETIME DEFAULT current_timestamp() on update current_timestamp() NOT NULL,
	deleted_at DATETIME NULL,
	CONSTRAINT email_subscriptions_pk PRIMARY KEY (email_id),
	CONSTRAINT email_subscriptions_un UNIQUE KEY (email),
	emai_verified 
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
CREATE INDEX email_subscriptions_deleted_at_IDX USING BTREE ON email_subscriptions (deleted_at);
