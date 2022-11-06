-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.5-10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2022-01-20 20:21:17
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for art_of_hair
DROP DATABASE IF EXISTS `art_of_hair`;
CREATE DATABASE IF NOT EXISTS `art_of_hair` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `art_of_hair`;


-- Dumping structure for table art_of_hair.tb_area
DROP TABLE IF EXISTS `tb_area`;
CREATE TABLE IF NOT EXISTS `tb_area` (
  `area_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_area: ~4 rows (approximately)
DELETE FROM `tb_area`;
/*!40000 ALTER TABLE `tb_area` DISABLE KEYS */;
INSERT INTO `tb_area` (`area_id`, `area_name`, `added_by`, `entry_time`) VALUES
	(1, 'Agrabad', 'Admin', '2021-05-28 12:27:47'),
	(2, 'New Market', 'Admin', '2021-05-28 12:30:17'),
	(3, 'GEC', 'Admin', '2021-05-28 12:30:27'),
	(4, 'Muradpur', 'Admin', '2021-05-28 12:30:38'),
	(5, 'Chawkbazar', 'Admin', '2021-05-28 12:30:49');
/*!40000 ALTER TABLE `tb_area` ENABLE KEYS */;


-- Dumping structure for table art_of_hair.tb_customer_booking
DROP TABLE IF EXISTS `tb_customer_booking`;
CREATE TABLE IF NOT EXISTS `tb_customer_booking` (
  `booking_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_no` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_price` double DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `trx_id` varchar(255) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `payment_acc_number` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `booking_verification_code` int(11) DEFAULT NULL,
  `booking_verify_status` int(11) DEFAULT '0',
  `owner_username` varchar(255) DEFAULT NULL,
  `customer_username` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_customer_booking: ~0 rows (approximately)
DELETE FROM `tb_customer_booking`;
/*!40000 ALTER TABLE `tb_customer_booking` DISABLE KEYS */;
INSERT INTO `tb_customer_booking` (`booking_id`, `customer_name`, `gender`, `customer_email`, `customer_phone`, `customer_address`, `shop_id`, `shop_no`, `shop_name`, `shop_address`, `service_id`, `service_name`, `service_price`, `paid_amount`, `trx_id`, `paid_by`, `payment_acc_number`, `payment_date`, `booking_verification_code`, `booking_verify_status`, `owner_username`, `customer_username`, `entry_time`) VALUES
	(1, 'Rifat Rahman', 'Male', 'rifat@gmail.com', '01854215447', 'Agrabad', 1, '1', 'Manzar Barber', 'Agrabad, oppsite of Akhtaruzzaman Center', 1, 'Blowcut', 450, 100, '8DG7ZQ5RT3', 'Bkash', '01854215447', '2021-12-17', 208404, 0, 'Ayan', 'Rifat', '2021-12-17 07:04:47');
/*!40000 ALTER TABLE `tb_customer_booking` ENABLE KEYS */;


-- Dumping structure for table art_of_hair.tb_shop
DROP TABLE IF EXISTS `tb_shop`;
CREATE TABLE IF NOT EXISTS `tb_shop` (
  `shop_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `shop_no` varchar(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_type` varchar(255) DEFAULT NULL,
  `shop_address` varchar(255) DEFAULT NULL,
  `shop_address_details` varchar(255) DEFAULT NULL,
  `about_shop` varchar(255) DEFAULT NULL,
  `shop_available` varchar(255) DEFAULT NULL,
  `shop_image` varchar(255) DEFAULT NULL,
  `bkash_merchant_number` varchar(255) DEFAULT NULL,
  `nagad_merchant_number` varchar(255) DEFAULT NULL,
  `shop_verification_code` int(11) DEFAULT NULL,
  `shop_verify_status` int(11) DEFAULT '0',
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`shop_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_shop: ~2 rows (approximately)
DELETE FROM `tb_shop`;
/*!40000 ALTER TABLE `tb_shop` DISABLE KEYS */;
INSERT INTO `tb_shop` (`shop_id`, `name`, `email`, `phone`, `address`, `shop_no`, `shop_name`, `shop_type`, `shop_address`, `shop_address_details`, `about_shop`, `shop_available`, `shop_image`, `bkash_merchant_number`, `nagad_merchant_number`, `shop_verification_code`, `shop_verify_status`, `added_by`, `entry_time`) VALUES
	(1, 'Ayan Khan', 'ayankhan@gmail.com', '01865421547', 'Agrabad', '1', 'Manzar Barber', 'Haircut & Hair Care', 'Agrabad', 'Agrabad, oppsite of Akhtaruzzaman Center', 'The quality present in a thing or person that gives intense pleasure or deep satisfaction to the mind, whether arising from sensory manifestations (as shape, color, sound, etc.), a meaningful design or pattern, or something else (as a personality in which', 'Sat - Wed, 10:00 AM - 8:00 PM', 'shop_images/b88d38a3adc55cfe6a80a47d65ec043d6.jpg', '01865421547', '01865421548', 336054, 1, 'Ayan', '2021-05-28 12:01:36'),
	(2, 'Ayan Khan', 'ayankhan@gmail.com', '01865421547', 'Agrabad', '2', 'Touchdown Barber', 'Haircut & Hair Care', 'New Market', 'New Market, opposite of biponi bitan, B.A Tower, 3rd floor', 'The quality present in a thing or person that gives intense pleasure or deep satisfaction to the mind, whether arising from sensory manifestations (as shape, color, sound, etc.), a meaningful design or pattern, or something else (as a personality in which', 'Sat - Wed, 10:00 AM - 8:00 PM', 'shop_images/db04ebca5642f59f9e393a9cf36621e715.jpg', '01865421547', '01865421548', 352104, 1, 'Ayan', '2021-05-28 12:04:37');
/*!40000 ALTER TABLE `tb_shop` ENABLE KEYS */;


-- Dumping structure for table art_of_hair.tb_shop_payment
DROP TABLE IF EXISTS `tb_shop_payment`;
CREATE TABLE IF NOT EXISTS `tb_shop_payment` (
  `payment_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `owner_name` varchar(255) DEFAULT NULL,
  `owner_phone` varchar(255) DEFAULT NULL,
  `owner_address` varchar(255) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL,
  `shop_no` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_address_details` varchar(255) DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `Trx_ID` varchar(255) DEFAULT NULL,
  `payment_ss_img` varchar(255) DEFAULT NULL,
  `paid_by` varchar(255) DEFAULT NULL,
  `payment_acc_number` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `payment_verification_code` int(11) DEFAULT NULL,
  `payment_verify_status` int(11) DEFAULT '0',
  `payment_added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_shop_payment: ~2 rows (approximately)
DELETE FROM `tb_shop_payment`;
/*!40000 ALTER TABLE `tb_shop_payment` DISABLE KEYS */;
INSERT INTO `tb_shop_payment` (`payment_id`, `owner_name`, `owner_phone`, `owner_address`, `shop_id`, `shop_no`, `shop_name`, `shop_address_details`, `paid_amount`, `Trx_ID`, `payment_ss_img`, `paid_by`, `payment_acc_number`, `payment_date`, `payment_verification_code`, `payment_verify_status`, `payment_added_by`, `entry_time`) VALUES
	(1, 'Ayan Khan', '01865421547', 'Agrabad', 1, '1', 'Manzar Barber', 'Agrabad, oppsite of Akhtaruzzaman Center', 500, '8DG4CR738Z', 'payment_ss_images/875afe0f6cfb683d17401bc61d6ec1d4bkash_payment.jpg', 'Bkash', '01865421547', '2021-12-15', 275558, 1, 'Ayan', '2021-05-28 16:13:11'),
	(2, 'Ayan Khan', '01865421547', 'Agrabad', 2, '2', 'Touchdown Barber', 'New Market, opposite of biponi bitan, B.A Tower, 3rd floor', 500, '8DG4CR79DX', 'payment_ss_images/f93f0eed67016d8603d6fca1fe27f9ddbkash_payment.jpg', 'Bkash', '01865421547', '2021-12-29', 793534, 1, 'Ayan', '2021-05-28 16:14:16');
/*!40000 ALTER TABLE `tb_shop_payment` ENABLE KEYS */;


-- Dumping structure for table art_of_hair.tb_shop_review
DROP TABLE IF EXISTS `tb_shop_review`;
CREATE TABLE IF NOT EXISTS `tb_shop_review` (
  `review_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shop_id` int(11) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_code` int(11) DEFAULT NULL,
  `rating_value` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `shop_owner` varchar(255) DEFAULT NULL,
  `reviewed_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_shop_review: ~0 rows (approximately)
DELETE FROM `tb_shop_review`;
/*!40000 ALTER TABLE `tb_shop_review` DISABLE KEYS */;
INSERT INTO `tb_shop_review` (`review_id`, `shop_id`, `shop_name`, `shop_code`, `rating_value`, `comment`, `shop_owner`, `reviewed_by`, `entry_time`) VALUES
	(1, 1, 'Manzar Barber', 336054, 4, 'Their service is very much good.', 'Ayan', 'Rifat', '2021-12-17 11:31:56');
/*!40000 ALTER TABLE `tb_shop_review` ENABLE KEYS */;


-- Dumping structure for table art_of_hair.tb_shop_service
DROP TABLE IF EXISTS `tb_shop_service`;
CREATE TABLE IF NOT EXISTS `tb_shop_service` (
  `service_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `shop_id` int(255) DEFAULT NULL,
  `shop_no` varchar(255) DEFAULT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
  `shop_type` varchar(255) DEFAULT NULL,
  `shop_address_details` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `service_price` double DEFAULT NULL,
  `service_image` varchar(255) DEFAULT NULL,
  `service_type` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_shop_service: ~3 rows (approximately)
DELETE FROM `tb_shop_service`;
/*!40000 ALTER TABLE `tb_shop_service` DISABLE KEYS */;
INSERT INTO `tb_shop_service` (`service_id`, `name`, `phone`, `shop_id`, `shop_no`, `shop_name`, `shop_type`, `shop_address_details`, `service_name`, `service_price`, `service_image`, `service_type`, `added_by`, `entry_time`) VALUES
	(1, 'Ayan Khan', '01874515488', 1, '1', 'Manzar Barber', 'Hair & Beauty Salon', 'Agrabad, oppsite of Akhtaruzzaman Center', 'Blowcut', 450, 'service_images/0b2c36c0ac36c66e4d80163e2509e3544.jpg', 'Haircut', 'Ayan', '2021-05-28 16:07:47'),
	(2, 'Ayan Khan', '01874515488', 1, '1', 'Manzar Barber', 'Hair & Beauty Salon', 'Agrabad, oppsite of Akhtaruzzaman Center', 'Pompadour', 650, 'service_images/814a2ca1c8ac805e56e1b3d0012660ea1.jpg', 'Haircut', 'Ayan', '2021-05-28 16:08:29'),
	(4, 'Ayan Khan', '01874515488', 1, '1', 'Manzar Barber', 'Hair & Beauty Salon', 'Agrabad, oppsite of Akhtaruzzaman Center', 'Curly ', 350, 'service_images/befac92d686e02e2c66027eab4ad40f6haircut.jpeg', 'Haircut', 'Ayan', '2021-05-28 16:10:21');
/*!40000 ALTER TABLE `tb_shop_service` ENABLE KEYS */;


-- Dumping structure for table art_of_hair.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `entry_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table art_of_hair.tb_user: ~4 rows (approximately)
DELETE FROM `tb_user`;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` (`user_id`, `name`, `email`, `phone`, `address`, `user_name`, `password`, `user_type`, `entry_time`) VALUES
	(1, 'Ayan Khan', 'ayankhan@gmail.com', '01874548566', 'Agrabad', 'Ayan', '12345', 'Shop Owner', '2021-05-08 17:20:46'),
	(2, 'Rifat Rahman', 'rifat@gmail.com', '01854215447', 'Agrabad', 'Rifat', '12345', 'Customer', '2021-05-08 17:22:35'),
	(3, 'Md Sajid', 'sajid@gmail.com', '01862542566', 'Agrabad', 'Admin', '12345', 'Admin', '2021-05-08 17:22:35'),
	(4, 'asdf', 'asdf@gmail.com', 'asdf', 'asdf', 'asdf', '12345', 'Company Owner', '2021-12-30 10:57:20');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
