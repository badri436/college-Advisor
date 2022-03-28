CREATE TABLE IF NOT EXISTS `student_details` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 `dob` varchar(50) NOT NULL,
 `yop` varchar(50) NOT NULL,
 `cut_off`int(11) NOT NULL,
 `caste` varchar(50) NOT NULL,
 `dept` varchar(100) NOT NULL,
 
 
 PRIMARY KEY (`id`)
 );