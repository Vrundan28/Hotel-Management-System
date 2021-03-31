-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 05:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelmanagement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `numofrooms` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `type`, `numofrooms`, `capacity`, `checkindate`, `checkoutdate`) VALUES
(42, 'Vrundan', 'King_suite', 15, 2, '2021-03-16', '2021-03-18'),
(43, 'Vrundan', 'King_suite', 3, 2, '2021-03-11', '2021-03-17'),
(44, 'Vrundan', 'King_suite', 17, 2, '2021-03-11', '2021-03-15'),
(45, 'vrundan', 'Premium_room', 4, 2, '2021-03-10', '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `numofrooms` int(10) NOT NULL,
  `capacity` int(10) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `username`, `phone_number`, `type`, `numofrooms`, `capacity`, `check_in_date`, `check_out_date`) VALUES
(55, 'Vrundan', 'Vrundan28', '1234567890', 'King_suite', 15, 2, '2021-03-16', '2021-03-18'),
(56, 'Vrundan', 'Vrundan28', '1234567890', 'King_suite', 3, 2, '2021-03-11', '2021-03-17'),
(57, 'Vrundan', 'Vrundan28', '1234567890', 'King_suite', 17, 2, '2021-03-11', '2021-03-15'),
(58, 'vrundan', 'Vrundan', '9687642782', 'Premium_room', 4, 2, '2021-03-10', '2021-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `facility` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `facility`, `description`, `image_url`) VALUES
(1, 'Wifi', 'Free access to unlimited hi-speed wifi.', 'images/wifi.jpg'),
(2, 'Restaurant', 'A multicuisine restaurant assisted by a world class chef.', 'images/restaurant_1.jpg'),
(3, 'Room Service', '24 hours room service.', 'images/room_service1.jpg'),
(4, 'Gym', 'Stay in shape by visiting the gym', 'images/gym.jpg\r\n'),
(5, 'Spa', 'Spa featuring body treatments and scrubs', 'images/spa_1.jpg'),
(6, 'Professional Meeting Facilities', 'Business center with work stations and private meeting rooms', 'images/conference_room.jpg'),
(7, 'Swimming Pool', 'Enjoy a refreshing swim in the outdoor swimming pool.', 'images/swimming_pool1.jpg'),
(8, 'Game Room', 'Enjoy a good time indoors with playstation and indoor games.', 'images/ps_room.jpg'),
(9, 'Outdoor Sports Arena', 'Nothing better than a good time playing sports outdoors.', 'images/cricket_net.jpg'),
(10, 'Jogging Track', 'A jogging tract for all fitness enthusiasts.', 'images/jogging_tract.jpg'),
(11, 'Kids Play Area', 'A variety of activities for kids to enjoy.', 'images/kids_playarea1.jpg'),
(12, 'Laundry', 'A best in town laundry and dry cleaning service available 24 hours.', 'images/laundary.jpg'),
(13, 'Blue bottle cafe', 'A terrace garden cafe with a view as good as soothing music playing alongside delicious food.', 'images/bluebottlecafe.jpg'),
(14, 'Wedding', 'The Grand Ballroom is the perfect venue in the city to make your wedding functions memorable.', 'images/wedding.jpg'),
(15, 'Bar', 'A bar with all the varieties and available from 7 in the evening to 4 in the early morning.', 'images/bar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `url` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `url`) VALUES
(1, 'Air Hockey', 'images/air_hockey.jpg'),
(2, 'Cricket Nets', 'images/cricket_net.jpg'),
(3, 'Pool Table', 'images/pool_table1.jpg'),
(4, 'Kids Play Area', 'images/kids_playarea.jpg'),
(5, 'Open Air Stage', 'images/open_air_stage.jpg'),
(6, 'Auditorium', 'images/auditorium.jpg'),
(7, 'Spa Area', 'images/spa_1.jpg'),
(8, 'Drive Way', 'images/drive_way.jpg'),
(9, 'Swimming Pool', 'images/swimming_pool1.jpg'),
(10, 'Wedding', 'images/wedding_1.jpg'),
(11, 'Event', 'images/event_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `occupancy`
--

CREATE TABLE `occupancy` (
  `id` int(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `available_2` int(10) NOT NULL,
  `available_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `occupancy`
--

INSERT INTO `occupancy` (`id`, `type`, `available_2`, `available_3`) VALUES
(1, 'Deluxe_room', 10, 10),
(2, 'Premium_room', 10, 10),
(3, 'King_suite', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `typeofroom`
--

CREATE TABLE `typeofroom` (
  `id` int(10) NOT NULL,
  `price_2` int(10) NOT NULL,
  `price_3` int(10) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofroom`
--

INSERT INTO `typeofroom` (`id`, `price_2`, `price_3`, `type`) VALUES
(1, 5000, 7000, 'Deluxe_room'),
(2, 7000, 9000, 'Premium_room'),
(3, 10000, -1, 'King_suite');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone_number` varchar(12) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Name`, `Email`, `Address`, `Phone_number`, `Username`, `Password`) VALUES
(7, 'vrundan', 'vrundanshah@gmail.com', 'b-55 society near company old padra road vadodara', '9687642782', 'Vrundan', '54321'),
(8, 'dhruval', 'dhruval@gmail.com', 'b-55 near tube company old padra road vadodara', '1234567890', 'Dhruval11', '9876'),
(13, 'Vrundan', 'vrundan@gmail.com', 'VrundanShahM', '1234567890', 'Vrundan28', '5252');

-- --------------------------------------------------------

--
-- Table structure for table `wedding`
--

CREATE TABLE `wedding` (
  `id` int(11) NOT NULL,
  `guest_count` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wedding`
--

INSERT INTO `wedding` (`id`, `guest_count`, `days`, `price`) VALUES
(1, 150, 4, 1000000),
(2, 200, 6, 1500000),
(3, 300, 5, 2200000),
(4, 250, 1, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupancy`
--
ALTER TABLE `occupancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofroom`
--
ALTER TABLE `typeofroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `wedding`
--
ALTER TABLE `wedding`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `occupancy`
--
ALTER TABLE `occupancy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `typeofroom`
--
ALTER TABLE `typeofroom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wedding`
--
ALTER TABLE `wedding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
