-- MYSQL User and table creation
-- =============================

CREATE DATABASE BCBB;
CREATE USER 'USERNAME'@'%' IDENTIFIED WITH mysql_native_password BY 'PASSWORD00--';
GRANT ALL ON BCBB.* TO 'USERNAME';


USE BCBB;

-- MYSQL Table struture
-- =====================

-- Users
CREATE TABLE users (
user_id       INT(8) NOT NULL AUTO_INCREMENT,
user_name     VARCHAR(30) NOT NULL,       -- For display name, login name
user_pass     VARCHAR(255) NOT NULL,      -- For Password
user_fname    VARCHAR(64) NOT NULL,       -- For First Name
user_lname    VARCHAR(64) NOT NULL,       -- For Last Name
user_email    VARCHAR(255) NOT NULL,      -- For Email
user_sign     VARCHAR(255),               -- For Signature
user_image    BLOB,                       -- For user avatar
user_gravatar VARCHAR(255),
user_imageform  BOOLEAN NOT NULL DEFAULT 0,  -- 0 for local 1 for gravatar
user_online   BOOLEAN NOT NULL DEFAULT 0,    -- For show if online
user_date     DATETIME NOT NULL,             -- For date of subscription
user_level    INT(8) NOT NULL DEFAULT 1,     -- For if we add premission (user, modo, admin)
user_token    VARCHAR(255),
user_token2   VARCHAR(255),
user_datebirthday  DATETIME,
user_datelastlog   DATETIME,
user_secquest  VARCHAR(255),  
user_secansw   VARCHAR(255),  
user_active    BOOLEAN NOT NULL DEFAULT 1,
UNIQUE INDEX user_name_unique (user_name),
UNIQUE INDEX user_email_unique (user_email),
PRIMARY KEY (user_id)
) ENGINE=InnoDB CHARACTER SET utf8;

-- Boards
CREATE TABLE boards (
board_id           INT(8) NOT NULL AUTO_INCREMENT,
board_name    	    VARCHAR(255) NOT NULL,
board_description  VARCHAR(255) NOT NULL,
board_image        VARCHAR(255) NOT NULL,
UNIQUE INDEX board_name_unique (board_name),
PRIMARY KEY (board_id)
) ENGINE=InnoDB CHARACTER SET utf8;

-- Topics
CREATE TABLE topics (
topic_id          INT(8) NOT NULL AUTO_INCREMENT,
topic_subject     VARCHAR(255) NOT NULL,
topic_image       VARCHAR(255),
topic_date        DATETIME NOT NULL,
topic_date_upd    DATETIME,
topic_board       INT(8) NOT NULL,
topic_by          INT(8) NOT NULL,
PRIMARY KEY (topic_id)
) ENGINE=InnoDB CHARACTER SET utf8;

-- Message
CREATE TABLE posts (
post_id           INT(8) NOT NULL AUTO_INCREMENT,
post_content      TEXT NOT NULL,
post_date         DATETIME NOT NULL,
post_date_update  DATETIME,
post_deleted	   BOOLEAN NOT NULL DEFAULT 0,
post_topic        INT(8) NOT NULL,
post_by     	   INT(8) NOT NULL,
post_pin	   BOOLEAN NOT NULL DEFAULT 0,
PRIMARY KEY (post_id)
) ENGINE=InnoDB CHARACTER SET utf8;



-- Private message for future fonction
CREATE TABLE pvmsg (
pvmsg_id           INT(8) NOT NULL AUTO_INCREMENT,
pvmsg_subject 	   VARCHAR(64) NOT NULL,
pvmsg_content      TEXT NOT NULL,
pvmsg_from         INT(8) NOT NULL,
pvmsg_to           INT(8) NOT NULL,
pvmsg_read 	   BOOLEAN NOT NULL DEFAULT 0,
PRIMARY KEY (pvmsg_id)
) ENGINE=InnoDB CHARACTER SET utf8;


-- link the topics to the categories first
ALTER TABLE topics ADD FOREIGN KEY(topic_board) REFERENCES boards(board_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- link the topics to the user who creates one.
ALTER TABLE topics ADD FOREIGN KEY(topic_by) REFERENCES users(user_id) ON DELETE RESTRICT ON UPDATE CASCADE;

-- Link the posts to the topics:
ALTER TABLE posts ADD FOREIGN KEY(post_topic) REFERENCES topics(topic_id) ON DELETE CASCADE ON UPDATE CASCADE;

-- And finally, link each post to the user who made it:
ALTER TABLE posts ADD FOREIGN KEY(post_by) REFERENCES users(user_id) ON DELETE RESTRICT ON UPDATE CASCADE;



-- for private message future fonction ????
ALTER TABLE pvmsg ADD FOREIGN KEY(pvmsg_from) REFERENCES users(user_id) ON DELETE NO ACTION ON UPDATE CASCADE;
ALTER TABLE pvmsg ADD FOREIGN KEY(pvmsg_to) REFERENCES users(user_id) ON DELETE NO ACTION ON UPDATE CASCADE;


