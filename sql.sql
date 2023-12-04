CREATE table admin(
	user_id int not null auto_increment,
	first_name varchar (255),
	last_name varchar (255),
	username varchar (255),
	password varchar (255),
    primary key (user_id)
);
CREATE table website_content(
	ID int not null auto_increment,
	first_name varchar (255),
	last_name varchar (255),
	email varchar (255),
	phnNumber varchar (255),
    primary key (ID)
);
INSERT into website_content(first_name, last_name, email, phnNumber)
VALUES
    ('Person', '1', 'persona@email.com', '123456789'),
    ('Person', '2', 'personb@yahoo.com', '123456789'),
    ('Person', '3', 'personc@icloud.com', '123456789'),
    ('Person', '4', 'persond@email.com', '123456789')
    
 