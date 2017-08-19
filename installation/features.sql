CREATE TABLE photos
	( photo_id 		INT NOT NULL AUTO_INCREMENT,
	  user_id		INT NOT NULL,
	  link			TEXT,
	  photo_filename  VARCHAR(64),
	  small_source	VARCHAR(64),
	  medium_source VARCHAR(64),
	  big_source	VARCHAR(64),
	  photo_title	VARCHAR(64),
	  other_details TEXT,
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  PRIMARY KEY(photo_id)
	);
CREATE TABLE post_photos
	( post_id 		INT NOT NULL,
	  photo_id		INT NOT NULL,
	  FOREIGN KEY(post_id) REFERENCES posts(post_id),
	  FOREIGN KEY(photo_id) REFERENCES photos(photo_id),
	  CONSTRAINT id PRIMARY KEY(post_id, photo_id)
	);
CREATE TABLE videos 
	( video_id		INT NOT NULL AUTO_INCREMENT,
	  user_id		INT NOT NULL,
	  link			TEXT,
	  video_title	VARCHAR(64),
	  video_format	VARCHAR(9),
	  length		INT NOT NULL,
	  other_details TEXT,
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  PRIMARY KEY(video_id)
	);
CREATE TABLE post_videos
	( post_id 		INT NOT NULL,
	  video_id		INT NOT NULL,
	  FOREIGN KEY(post_id) REFERENCES posts(post_id),
	  FOREIGN KEY(video_id) REFERENCES videos(video_id),
	  CONSTRAINT id PRIMARY KEY(post_id, video_id) 
	);
CREATE TABLE music
	( track_id 		INT NOT NULL AUTO_INCREMENT,
	  user_id 		INT NOT NULL,
	  link			TEXT,
	  artist_name	VARCHAR(64),
	  track_name	VARCHAR(64),
	  track_format	VARCHAR(9),
	  other_details TEXT,
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  PRIMARY KEY(track_id)
	);
CREATE TABLE post_music
	( post_id 		INT NOT NULL,
	  music_id		INT NOT NULL,
	  FOREIGN KEY(post_id) REFERENCES posts(post_id),
	  FOREIGN KEY(music_id) REFERENCES music(track_id),
	  CONSTRAINT id PRIMARY KEY(post_id, music_id) 
	);
CREATE TABLE documents 
	( document_id	INT NOT NULL AUTO_INCREMENT,
	  user_id		INT NOT NULL,
	  document_format VARCHAR(9),
	  link			TEXT,
	  document_title VARCHAR(64),
	  size			INT NOT NULL,
	  other_details TEXT,
	  FOREIGN KEY(user_id) REFERENCES users(id),
	  PRIMARY KEY(document_id)
	);
CREATE TABLE post_documents
	( post_id 		INT NOT NULL,
	  document_id	INT NOT NULL,
	  FOREIGN KEY(post_id) REFERENCES posts(post_id),
	  FOREIGN KEY(document_id) REFERENCES documents(document_id),
	  CONSTRAINT id PRIMARY KEY(post_id, document_id) 
	);