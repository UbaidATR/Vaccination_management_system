create database vaccinations_system;
drop database vaccinations_system;
use vaccinations_system;
CREATE TABLE Hospital (
    hospital_id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100) unique,
	user_password VARCHAR(100),
    hospital_location VARCHAR(100),
    hospital_number INT,
    number_of_departments INT,
    user_image VARCHAR(100) unique
);
ALTER TABLE Hospital
ADD COLUMN user_email VARCHAR(100) unique;
ALTER TABLE hospital ADD COLUMN status varchar(50) default('pending') NOT NULL ;
ALTER TABLE hospital ADD COLUMN created_at Timestamp null Default current_timestamp;
CREATE TABLE vaccination (
    vaccination_id INT AUTO_INCREMENT PRIMARY KEY,
    vaccination_name VARCHAR(100)
  
);

CREATE TABLE vaccine_status (
    status_id INT AUTO_INCREMENT PRIMARY KEY,
    status_name VARCHAR(100)
  
);
CREATE TABLE Parents (
    parent_id INT AUTO_INCREMENT PRIMARY KEY,
    hospital_id INT,
    child_name VARCHAR(100),
    father_name VARCHAR(100),
	date_of_birth INT ,
    gender VARCHAR(100),
    cnic_no INT(100),
    email VARCHAR(100),
	vaccination_id INT,
    status_id INT,
    created_at Timestamp null Default current_timestamp,
    FOREIGN KEY (hospital_id) REFERENCES Hospital(hospital_id) ON DELETE CASCADE,
    FOREIGN KEY (vaccination_id) REFERENCES vaccination(vaccination_id) ON DELETE CASCADE, 
    FOREIGN KEY (status_id) REFERENCES vaccine_status(status_id) ON DELETE CASCADE 
);

ALTER TABLE `vaccinations_system`.`parents`
CHANGE COLUMN `date_of_birth` `date_of_birth` DATE;
ALTER TABLE parents MODIFY COLUMN cnic_no BIGINT;
ALTER TABLE Parents CHANGE COLUMN child_name kid_name VARCHAR(100);



CREATE TABLE appointments (
   appointment_id INT PRIMARY KEY AUTO_INCREMENT,
    parent_id INT NOT NULL,
    hospital_id INT NOT NULL,
    vaccination_id INT NOT NULL,
    date date NOT NULL default current_timestamp,
    booked_by VARCHAR(255) NOT NULL,
    booked_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    status varchar(20) not null default('pending'),
    FOREIGN KEY (parent_id) REFERENCES parents(parent_id) ON DELETE CASCADE,
	FOREIGN KEY (hospital_id) REFERENCES hospital(hospital_id) ON DELETE CASCADE,
	FOREIGN KEY (vaccination_id) REFERENCES vaccination(vaccination_id) ON DELETE CASCADE
);

INSERT INTO hospital (user_name) VALUES ('Ziauddin'),('Abbasi'),('Agha Khan'),('Safi');


INSERT INTO vaccination (vaccination_name) VALUES ('corona'), ('influnza'), ('polio');

-- Insert into vaccine_status table
INSERT INTO vaccine_status (status_name) VALUES ('Not Vaccinated'), ('Vaccinated'), ('Missed');



INSERT INTO `vaccinations_system`.`parents` (`parent_id`, `hospital_id`, `kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`,`status_id`)
 VALUES ('1', '2', 'saad', 'khan', '2001-12-02', 'male', '0986765', 'saad@gmail.com', '2','2');
  
INSERT INTO `vaccinations_system`.`parents` (`parent_id`, `hospital_id`, `kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`,`status_id`)
 VALUES (2, '1', 'yosuf', 'ahad ', '2002-2-05', 'male', '34523765', 'ahad@gmail.com', '2','3');
 INSERT INTO `vaccinations_system`.`parents` ( `hospital_id`, `kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`, `status_id`)
 VALUES ( '3', 'asad', 'hamid ', '2006-7-05', 'male', '092333765', 'asad@gmail.com', '1', '1');
 
 INSERT INTO `vaccinations_system`.`parents` ( `hospital_id`, `kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`, `status_id`)
VALUES ( '1', 'John', 'Doe', '2005-08-15', 'male', '1234567890', 'john@example.com', '1', '2');

create table admin(
id int primary key auto_increment,
name varchar(50) not null,
profile_image varchar(1000),
About varchar(500),
Company varchar(50),
country varchar(50),
address varchar(100),
phone int(11) not null,
email varchar(25) not null unique,
password varchar(20),
job_title varchar(50) NOT NULL 
);
INSERT INTO `vaccinations_system`.`admin` (`name`, `profile_image`, `About`, `Company`, `country`, `address`, `phone`, `email`, `password`, `job_title`) VALUES ('Obaid', 'R1.jpg', 'Lorem ipsum', 'IT', 'pakistan', 'karachi', '03165923893', 'obaidatr@gmail.com', '123', 'Admin');