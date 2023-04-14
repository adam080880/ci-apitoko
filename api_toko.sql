create table member (
	id int not null auto_increment,
	nama varchar(255) not null,
	email varchar(255) not null,
	password text not null,
	primary key(id)
);

CREATE table member_token (
id INT NOT NULL AUTO_INCREMENT,
member_id INT NOT NULL,
auth_key VARCHAR(255) NOT NULL,
FOREIGN KEY (member_id) REFERENCES member(id) on update cascade on delete no action,
PRIMARY KEY(id)
);

CREATE table produk (
id INT NOT NULL AUTO_INCREMENT,
kodeproduk VARCHAR(255) NOT NULL,
namaproduk VARCHAR(255) NOT NULL,
hargaproduk INT NOT NULL,
PRIMARY KEY(id)
);


select * from member;
select * from member_token;

delete from member_token;