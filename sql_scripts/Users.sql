create table Users(
	users_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    users_name varchar(60) NOT NULL,
    users_surname varchar(60) NOT NULL,
    users_email varchar(255) NOT NULL,
    users_password varchar(30) NOT NULL,
    users_num_almuerzos INT NOT NULL,
    users_login_date DATE,
    users_login_hour TIME
);