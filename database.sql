drop database if exists news_poster;

create database news_poster;

use news_poster;

create table posts(
	id int primary key auto_increment,
	post_time timestamp default CURRENT_TIMESTAMP,
	edit_time datetime,
	title nvarchar(255),
	body text,
	url nvarchar(255) comment 'A url that the post can be associated with.'
);

/*Create trigger to update the edit_time on any edits of posts.*/
create trigger post_update before update on posts
for each row
  SET new.edit_time = NOW();