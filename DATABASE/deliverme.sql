-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 05:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliverme`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admindm@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `area_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `city_id`, `area_name`) VALUES
(148, 46, 'Zindabazar'),
(149, 46, 'Ambarkhana');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `order_id` int(50) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `order_id`, `food_id`, `quantity`, `price`) VALUES
(1, 1, 5, 1, 279),
(2, 2, 2, 1, 269),
(3, 2, 6, 2, 30),
(4, 3, 2, 2, 269),
(5, 3, 6, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(47, 'Dhaka'),
(46, 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `delivery_man_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `nid` varchar(20) NOT NULL,
  `phone` int(18) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_man`
--

INSERT INTO `delivery_man` (`delivery_man_id`, `name`, `username`, `password`, `address`, `nid`, `phone`, `status`) VALUES
(2, 'Syed Ahsan Sirat', 'sirat95', '12345', 'Bhadeswar', '1995123412341234', 1754195079, '');

-- --------------------------------------------------------

--
-- Table structure for table `deliver_info`
--

CREATE TABLE `deliver_info` (
  `deliver_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL,
  `deliver_status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `product_code` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `image_link` varchar(300) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`product_code`, `restaurant_id`, `product_name`, `product_price`, `image_link`, `details`) VALUES
(2, 3, 'Veggie Burger', '269', 'VEGGIE Burger.png', ' It is burger.'),
(3, 3, 'CHICKEN Rizo RICE MEAL', '199', 'CHICKEN-Rizo-RICE-MEAL.png', 'Chicken Rice bowl.'),
(4, 3, 'Mushroom Rice with Chicken', '279', 'Mushroom-Rice-With-Chicken.png', 'Mushroom Rice with Chicken'),
(5, 3, 'Spicy Thai Chicken Rice', '279', 'Spicy-Thai-Chicken-Rice.png', 'Spicy Thai Chicken Rice'),
(6, 3, 'Pepsi (500 ML)', '30', 'Pepsi.jpg', 'Pepsi 500ml in glass.'),
(7, 3, '2 Pcs Hot & Crispy Chicken', '265', '2-Pcs-HC-Chicken.png', '2 Piece Hot & Crispy Chicken'),
(8, 4, 'Burger', '75', 'maxresdefault.jpg', 'Fulkoli Burger'),
(9, 4, 'Vegan Chocolate Cake', '250', 'vegan-chocolate-cake.jpg', '1 piece Vegan Chocolate Cake.'),
(10, 4, 'Mini Burger', '50', 'Mini-burger fulkoli1.jpg', 'This is mini burger.'),
(11, 5, 'coffee normal', '50', 'coffee drink 1.jpg', 'This is normal coffee'),
(12, 8, 'Platter set 1', '244', 'demons cave 2.jpg', 'This platter contain bbq chicken.'),
(13, 8, 'Biriyani Platter', '180', 'demons cave1.jpg', 'Biriyani Platter with 1 bottle of cold drink.');

-- --------------------------------------------------------

--
-- Table structure for table `orderlist`
--

CREATE TABLE `orderlist` (
  `order_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderlist`
--

INSERT INTO `orderlist` (`order_id`, `user_id`, `date`, `status`, `address`) VALUES
(1, 1, '2018-09-17 10:00:31', 'delivered', '16 park street'),
(2, 1, '2018-09-17 15:10:20', 'delivered', 'Moushumi 66/a , Aghpara ,Mirabazar, Sylhet'),
(3, 1, '2018-09-17 15:24:57', 'delivered', 'North East University Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` int(18) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`restaurant_id`, `restaurant_name`, `address`, `phone`, `website`, `area_id`) VALUES
(3, 'KFC', 'Besides City Center Market', 1740465647, 'www.kfc.com.bd', 148),
(4, 'Fulkoli', 'Ambarkhana Point', 1740465647, 'www.fulkoli.com', 149),
(5, 'Bonoful', 'Ambarkhana Point', 1, 'www.bonoful.com', 149),
(6, 'Eatopia', 'Baruthkhana', 121, 'www.eatopia.com', 148),
(7, 'Spicy', 'Zindabazar point', 109, 'www.spicyrestaurant.com', 148),
(8, 'Demons Cave', 'Baruthkhana', 123, 'www.demonscave.com', 148);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone_number` int(18) NOT NULL,
  `image_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `email`, `password`, `address`, `phone_number`, `image_link`) VALUES
(1, 'pksakib', 'Sakib Chowdhury', 'pksakib@gmail.com', '12345', 'Moushumi 66/a , Aghpara ,Mirabazar, Sylhet', 1740465647, 'cv pic.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `city_id_fk` (`city_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `food_id_fk` (`food_id`),
  ADD KEY `order_id_fk` (`order_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD UNIQUE KEY `city_name` (`city_name`);

--
-- Indexes for table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`delivery_man_id`);

--
-- Indexes for table `deliver_info`
--
ALTER TABLE `deliver_info`
  ADD PRIMARY KEY (`deliver_id`),
  ADD KEY `cart_id_fk` (`cart_id`),
  ADD KEY `delivery_man_id_fk` (`delivery_man_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`product_code`),
  ADD KEY `restaurant_id_fk` (`restaurant_id`);

--
-- Indexes for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `u_id_fk` (`user_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`restaurant_id`),
  ADD KEY `area_id_fk` (`area_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `delivery_man_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliver_info`
--
ALTER TABLE `deliver_info`
  MODIFY `deliver_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `product_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `order_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `city_id_fk` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `food_id_fk` FOREIGN KEY (`food_id`) REFERENCES `food` (`product_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orderlist` (`order_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `deliver_info`
--
ALTER TABLE `deliver_info`
  ADD CONSTRAINT `cart_id_fk` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `delivery_man_id_fk` FOREIGN KEY (`delivery_man_id`) REFERENCES `delivery_man` (`delivery_man_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `restaurant_id_fk` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`restaurant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `u_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `area_id_fk` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
