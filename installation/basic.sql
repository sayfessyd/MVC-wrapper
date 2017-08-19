CREATE TABLE users
	( id			INT NOT NULL AUTO_INCREMENT,
	  mobile_id		VARCHAR(128),
	  first_name	VARCHAR(36),
	  last_name		VARCHAR(36),
	  user_name		VARCHAR(18) NOT NULL,
	  email			VARCHAR(200),
	  password      VARCHAR(64),
	  gravatar_hash VARCHAR(32),
	  photo_profile	VARCHAR(64),
	  gender		VARCHAR(6),
	  date_of_birth	DATE,
	  country		VARCHAR(32),
	  city			VARCHAR(32),
	  follow		INT,
	  confirmed		BOOLEAN,
	  UNIQUE(email),
	  UNIQUE(user_name),
	  PRIMARY KEY(id)
	);
CREATE TABLE users_auth
	( id 			INT NOT NULL AUTO_INCREMENT,
	  hash 			VARCHAR(52) NOT NULL,
	  username 		VARCHAR(18),
	  expire_date 		DATETIME,
	  UNIQUE(hash),
	  PRIMARY KEY(id)
	);
CREATE TABLE waves
	( id			INT NOT NULL AUTO_INCREMENT,
	  user_id		INT,
	  reference		VARCHAR(2),
	  affected_name VARCHAR(64),
	  date_registered DATETIME,
	  wave_details	TEXT,
	  followers		INT,
	  posted		INT,
	  UNIQUE(reference, affected_name),
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  PRIMARY KEY(id)
	);
CREATE TABLE following
	( following_id  INT NOT NULL AUTO_INCREMENT,
	  wave_id		INT NOT NULL,
	  follower_id	INT NOT NULL,
	  from_date		DATETIME,
	  to_date		DATETIME,
	  FOREIGN KEY(wave_id) REFERENCES waves(id),
	  FOREIGN KEY(follower_id) REFERENCES users(id),
	  PRIMARY KEY(following_id)
	);
CREATE TABLE posts
	( post_id		INT NOT NULL AUTO_INCREMENT,
	  user_id		INT NOT NULL,
	  wave_id		INT,
	  title			VARCHAR(128),
	  content		TEXT,
	  date_sent 	DATETIME,
	  other_details TEXT,
	  blocks		INT,
	  likes			INT,
	  reposted		INT,
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  FOREIGN KEY(wave_id) REFERENCES waves(id),
	  PRIMARY KEY(post_id)
	);
CREATE TABLE re_posts
	( re_post_id	INT NOT NULL AUTO_INCREMENT,
	  post_id 		INT NOT NULL,
	  wave_id		INT NOT NULL,
	  date_sent		DATETIME,
	  other_details TEXT,
	  FOREIGN KEY(post_id) REFERENCES posts(post_id),
	  FOREIGN KEY(wave_id) REFERENCES waves(id),
	  PRIMARY KEY(re_post_id)
	);
CREATE TABLE notifications
	( notification_id INT NOT NULL AUTO_INCREMENT,
	  user_id		INT NOT NULL,
	  date_received DATETIME,
	  subject		VARCHAR(128),
	  message		TEXT,
	  other_details TEXT,
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  PRIMARY KEY(notification_id)
	);