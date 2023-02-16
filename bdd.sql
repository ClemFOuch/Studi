BEGIN TRANSACTION;

CREATE TABLE post(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT(65000) NOT NULL,
    price INT NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE category (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE post_category (
    post_id INT UNSIGNED NOT NULL,
    category_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (post_id, category_id),
    CONSTRAINT fk_post
        FOREIGN KEY (post_id)
        REFERENCES post (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    CONSTRAINT fk_category
        FOREIGN KEY (category_id)
        REFERENCES category (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
)

CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    login VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    usersurname VARCHAR(255) NOT NULL,
    usersociety VARCHAR(255) NOT NULL,
    role VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE contact (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    usersurname VARCHAR(255) NOT NULL,
    usersociety VARCHAR(255) NOT NULL,
    object VARCHAR(255) NOT NULL,
    message TEXT(65000) NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE commande (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT(65000) NOT NULL,
    price INT NOT NULL,
    PRIMARY KEY (id)
)

CREATE TABLE users_command (
    users_id INT UNSIGNED NOT NULL,
    command_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (users_id, command_id),
    CONSTRAINT fk_users
        FOREIGN KEY (users_id)
        REFERENCES users (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT,
    CONSTRAINT fk_command
        FOREIGN KEY (command_id)
        REFERENCES command (id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT
)

COMMIT TRANSACTION;

