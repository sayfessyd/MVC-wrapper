 INSERT INTO users (mobile_id, first_name, last_name, user_name, password, email, gravatar_hash, gender, date_of_birth, country, city, follow)
VALUES ('+21650465281','Saifeddine','Essid','saifmusic','ae2b1fca515949e5d54fb22b8ed95575','mail.sayf@yahoo.com','78d84cbb1f855352537f6e73ba2c0988','male','1994-06-24','Tunisia','Menzel Bourguiba','2'); 
 INSERT INTO users (mobile_id, first_name, last_name, user_name, password, email, gravatar_hash, gender, date_of_birth, country, city, follow)
VALUES ('+21697880481','Moncef','Essid','moncef102','ae2b1fca515949e5d54fb22b8ed95575','moncef102@gmail.com','205e460b479e2e5b48aec07710c08d50','male','1985-11-11','Tunisia','Tunis','2'); 
 INSERT INTO users (mobile_id, first_name, last_name, user_name, password, email, gravatar_hash, gender, date_of_birth, country, city, follow)
VALUES ('+21629358818','Achref','Essid','achref101','ae2b1fca515949e5d54fb22b8ed95575','achref101@gmail.com','205e460b479e2e5b48aec07710c08d50','male','1979-08-06','Canada','Montreal','2'); 

 INSERT INTO waves (user_id, reference, affected_name, date_registered, wave_details, followers, posted)
VALUES ('1','01','@saifmusic','2014-08-15 00:07:20','personal page','2','1');
 INSERT INTO waves (user_id, reference, affected_name, date_registered, wave_details, followers, posted)
VALUES ('2','01','@moncef102','2014-08-15 00:10:20','personal page','2','1');
 INSERT INTO waves (user_id, reference, affected_name, date_registered, wave_details, followers, posted)
VALUES ('3','01','@achref101','2014-08-15 00:11:00','personal page','2','1');

 INSERT INTO posts (user_id, wave_id, title, content, date_sent, other_details, blocks, likes, reposted)
VALUES ('1','1','Hello!','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec mattis metus. In placerat, dolor et hendrerit imperdiet, nulla erat convallis urna, mattis facilisis augue diam suscipit mauris. Vestibulum quis placerat augue. Maecenas tempor risus eget est posuere, et mattis massa rutrum.','2014-08-15 00:19:00','no photos','0','100','20');
 INSERT INTO posts (user_id, wave_id, title, content, date_sent, other_details, blocks, likes, reposted)
VALUES ('2','2','Good Morning!','Praesent in dictum mi, ut euismod erat. Cras ac leo sed ipsum tincidunt fringilla. Quisque sit amet varius metus. Praesent lacinia varius faucibus. Donec vel bibendum lorem. In hac habitasse platea dictumst. Duis vulputate leo vel tortor convallis pretium. Pellentesque mi velit, lacinia vitae facilisis rhoncus, dictum a odio.','2014-08-15 00:24:55','no photos','0','80','14');
 INSERT INTO posts (user_id, wave_id, title, content, date_sent, other_details, blocks, likes, reposted)
VALUES ('3','3','Hi!','Curabitur quis faucibus sapien. In sit amet velit erat. Vivamus ac fringilla lorem. Aliquam ut fringilla mi, a gravida diam. Aliquam ac lorem odio. Maecenas arcu ante, consequat eget sem eget, bibendum ullamcorper augue. Ut adipiscing est in elementum sodales. Donec malesuada sodales nibh eget cursus. Vestibulum pharetra posuere semper. Duis eleifend metus leo, non consequat leo suscipit sed.','2014-08-15 00:24:50','no photos','1','20','5');
