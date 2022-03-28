CREATE TABLE IF NOT EXISTS `details` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `college_name` varchar(50) NOT NULL,
 `department` varchar(50) NOT NULL,
 `stream` varchar(50) NOT NULL,
 `cut_off`int(11) NOT NULL,
 `caste` varchar(50) NOT NULL,
 `seats_available`int(11) NOT NULL,
 `seats_booked`int(11) NOT NULL,
 
 PRIMARY KEY (`id`)
 );