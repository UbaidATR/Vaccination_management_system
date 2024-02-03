create database vaccinations_system;

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
ALTER TABLE parents
ADD COLUMN password VARCHAR(100) ;

CREATE TABLE appointments (
   appointment_id INT PRIMARY KEY AUTO_INCREMENT,
    parent_id INT NOT NULL,
    hospital_id INT NOT NULL,
    vaccination_id INT NOT NULL,
    date DATETIME NOT NULL,
    booked_by VARCHAR(255) NOT NULL,
    booked_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_id) REFERENCES parents(parent_id),
	FOREIGN KEY (hospital_id) REFERENCES hospital(hospital_id),
	FOREIGN KEY (vaccination_id) REFERENCES vaccination(vaccination_id)
);


INSERT INTO vaccination (vaccination_name) VALUES ('corona'), ('influnza'), ('polio');
INSERT INTO vaccination (vaccination_name) VALUES ('Whooping Cough'), ('Tetanus'), ('Rubella'), ('RSV '), ('Rotavirus'), ('Pneumococcal'), ('Hepatitis B.'), ('Tuberculosis.'), ('Typhoid.'), ('Varicella.');
-- Insert into vaccine_status table

INSERT INTO vaccine_status (status_name) VALUES ('Not Vaccinated'), ('Vaccinated'), ('Missed');

INSERT INTO `vaccinations_system`.`hospital` (`hospital_id`, `user_name`, `user_password`, `hospital_location`, `hospital_number`, `number_of_departments`, `user_image`, `user_email`, `status`)
VALUES 
('1', 'agha khan hospital', 'agha', 'defence', '2003432', '120', 'agha.png', 'aghakhan@gmail.com', 'active'),
('2', 'Bahria Hospital', 'Bahria', 'Bahria Town Karachi, Karachi, Karachi City, Sindh', '2002033432', '920', 'bahria.png', 'bahria@gmail.com', 'active'),
('3', 'zainab Hospital', 'zainab', 'Town Karachi, Karachi, Karachi City, Sindh', '200073432', '920', 'zainab.png', 'zainab@gmail.com', 'active'),
('4', 'Indus Hospital', 'Indus', 'Korangi, Karachi, Sindh', '2020112233', '1200', 'indus.png', 'indus_hospital@gmail.com', 'active'),
('5', 'City Hospital', 'City', 'Clifton, Karachi, Sindh', '2020334455', '800', 'city.png', 'city_hospital@gmail.com', 'active'),
('6', 'Liaquat National Hospital', 'Liaquat', 'Stadium Road, Karachi, Sindh', '2020556677', '1500', 'liaquat.png', 'liaquat_hospital@gmail.com', 'active'),
('7', 'Jinnah Hospital', 'Jinnah', 'Gulshan-e-Iqbal, Karachi, Sindh', '2020778899', '1000', 'jinnah.png', 'jinnah_hospital@gmail.com', 'active'),
('8', 'Patel Hospital', 'Patel', 'Gulshan-e-Iqbal, Karachi, Sindh', '2021122233', '600', 'patel.png', 'patel_hospital@gmail.com', 'active'),
('9', 'Ziauddin Hospital', 'Ziauddin', 'North Nazimabad, Karachi, Sindh', '2021344455', '850', 'ziauddin.png', 'ziauddin_hospital@gmail.com', 'active'),
('10', 'Tabba Heart Institute', 'Tabba', 'Gulshan-e-Iqbal, Karachi, Sindh', '2021566677', '450', 'tabba.png', 'tabba_hospital@gmail.com', 'active'),
('11', 'Holy Family Hospital', 'HolyFamily', 'Saddar, Karachi, Sindh', '2021788899', '700', 'holyfamily.png', 'holyfamily_hospital@gmail.com', 'active'),
('12', 'National Institute of Cardiovascular Diseases', 'NICVD', 'Korangi, Karachi, Sindh', '2021900011', '500', 'nicvd.png', 'nicvd_hospital@gmail.com', 'active');


INSERT INTO `vaccinations_system`.`parents` (`parent_id`, `hospital_id`, `kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`, `status_id`, `password`)
VALUES 
('1', '1', 'saad', 'khan', '2001-12-02', 'male', '0986765', 'saad@gmail.com', '2', '2', '123'),
('2', '2', 'yosuf', 'ahad ', '2002-2-05', 'male', '34523765', 'ahad@gmail.com', '2', '3', '123'),
('3', '3', 'asad', 'hamid ', '2006-7-05', 'male', '092333765', 'asad@gmail.com', '1', '1', '123'),
('4', '1', 'John', 'Doe', '2005-08-15', 'male', '1234567890', 'john@example.com', '1', '2', '123'),
('5', '1', 'hiba', 'ahmed', '2005-8-15', 'female', '123567890', 'hiba@example.com', '1', '2', '123'),
('6', '1', 'aliza', 'zahid', '2002-02-05', 'female', '34523465', 'aliza@gmail.com', '2', '3', '123'),
('7', '1', 'Alice', 'Smith', '2003-01-15', 'female', '12345678', 'alice.smith@email.com', '2', '3', '123'),
('8', '1', 'yosuf', 'ahad', '2002-02-05', 'male', '3452765', 'ahad@gmail.com', '1', '3', '123'),
('9', '1', 'Ella', 'Johnson', '2004-03-10', 'female', '5678123', 'ella.johnson@email.com', '5', '2', '123'),
('10', '2', 'Samuel', 'Brown', '2003-08-22', 'male', '9876543', 'samuel.brown@email.com', '8', '1', '123'),
('11', '1', 'Sophia', 'Clark', '2005-01-15', 'female', '2345678', 'sophia.clark@email.com', '12', '3', '123'),
('12', '2', 'Daniel', 'Miller', '2002-11-20', 'male', '8765432', 'daniel.miller@email.com', '3', '1', '123'),
('13', '1', 'Ava', 'Wilson', '2004-06-18', 'female', '7654321', 'ava.wilson@email.com', '7', '2', '123'),
('14', '2', 'Oliver', 'Davis', '2000-09-05', 'male', '5432167', 'oliver.davis@email.com', '10', '3', '123'),
('15', '1', 'Mia', 'Smith', '2003-12-30', 'female', '9876543', 'mia.smith@email.com', '2', '1', '123'),
('16', '2', 'Liam', 'Jones', '2001-04-18', 'male', '1234567', 'liam.jones@email.com', '9', '2', '123'),
('17', '1', 'Emma', 'Taylor', '2005-07-25', 'female', '8765432', 'emma.taylor@email.com', '13', '1', '123');

INSERT INTO `vaccinations_system`.`parents` (
    `hospital_id`, `kid_name`, `father_name`, `date_of_birth`, `gender`, `cnic_no`, `email`, `vaccination_id`, `status_id`
)
VALUES 
('3', 'Sophie', 'Smith', '2004-03-15', 'female', '12345678', 'sophie.smith@email.com', '5', '2'),
('4', 'Lucas', 'Johnson', '2002-06-20', 'male', '87654321', 'lucas.johnson@email.com', '1', '2'),
('5', 'Isabella', 'Brown', '2005-09-10', 'female', '23456789', 'isabella.brown@email.com', '3', '1'),
('6', 'Mason', 'Miller', '2003-12-25', 'male', '98765432', 'mason.miller@email.com', '4', '2'),
('7', 'Olivia', 'Wilson', '2001-08-05', 'female', '34567890', 'olivia.wilson@email.com', '5', '1'),
('8', 'Ethan', 'Jones', '2004-02-12', 'male', '56789012', 'ethan.jones@email.com', '2', '3'),
('9', 'Emma', 'Taylor', '2000-05-30', 'female', '67890123', 'emma.taylor@email.com', '1', '2'),
('4', 'Aiden', 'Harris', '2003-07-15', 'male', '34562178', 'aiden.harris@email.com', '2', '3'),
('5', 'Aria', 'Martin', '2001-11-20', 'female', '87653421', 'aria.martin@email.com', '6', '1'),
('6', 'Elijah', 'Clark', '2004-05-10', 'male', '23459789', 'elijah.clark@email.com', '8', '2'),
('7', 'Mia', 'Jones', '2002-12-25', 'female', '98765432', 'mia.jones@email.com', '10', '3'),
('8', 'Logan', 'Miller', '2000-08-05', 'male', '34567890', 'logan.miller@email.com', '9', '1'),
('9', 'Scarlett', 'Wilson', '2003-02-12', 'female', '56789012', 'scarlett.wilson@email.com', '7', '2'),
('10', 'Carter', 'Brown', '2005-05-30', 'male', '67890123', 'carter.brown@email.com', '11', '3'),
('11', 'Chloe', 'Taylor', '2002-10-18', 'female', '78901234', 'chloe.taylor@email.com', '13', '1'),
('10', 'Noah', 'Davis', '2002-10-18', 'male', '78901234', 'noah.davis@email.com', '4', '1'),
('11', 'Ava', 'Clark', '2005-04-22', 'female', '89012345', 'ava.clark@email.com', '3', '3');

alter table appointments add column status varchar(255) not null default('pending') ;
create table admin(
id int primary key auto_increment,
name varchar(50) not null,
profile_image varchar(1000),
About varchar(500),
Company varchar(50),
country varchar(50),
address varchar(100),
phone int(220) not null,
email varchar(25) not null unique,
password varchar(20),
job_title varchar(50) NOT NULL 
);
INSERT INTO `vaccinations_system`.`admin` (`name`, `profile_image`, `About`, `Company`, `country`, `address`, `phone`, `email`, `password`, `job_title`) VALUES ('admin', 'R1.jpg', 'Lorem ipsum', 'IT', 'pakistan', 'karachi', '03923893', 'obaidatr@gmail.com', '123', 'Admin');
