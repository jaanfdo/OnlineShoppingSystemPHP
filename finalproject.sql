-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2016 at 05:15 AM
-- Server version: 5.7.11-log
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `InvoiceID` int(11) NOT NULL,
  `InvoiceDate` varchar(45) DEFAULT NULL,
  `UName` varchar(45) DEFAULT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `CartID` varchar(45) DEFAULT NULL,
  `Items` varchar(45) DEFAULT NULL,
  `Quantity` varchar(45) DEFAULT NULL,
  `Amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`InvoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`InvoiceID`, `InvoiceDate`, `UName`, `FirstName`, `Address`, `CartID`, `Items`, `Quantity`, `Amount`) VALUES
(1000, '2016-10-24', 'JanithSrimal', 'Janith', '337/2 central pitipana, Negombo', '10', '5', '5', '15000'),
(1001, '2016-10-25', 'JanithSrimal', 'Janith', '337/2 central pitipana, Negombo', '11', '2', '2', '2000'),
(1002, '2016-10-26', 'JanithSrimal', 'Janith', '337/2 central pitipana, Negombo', '12', '1', '1', '500'),
(1003, '2016-10-27', 'JanithSrimal', 'Janith', '337/2 central pitipana, Negombo', '13', '2', '3', '3500'),
(1004, '2016-10-28', 'JanithSrimal', 'Janith', '337/2 central pitipana, Negombo', '14', '4', '4', '20000'),
(1005, '2016-10-29', 'JaanFdo', 'Jaan', '102 main rd, Negombo', '15', '2', '2', '4500'),
(1006, '2016-11-09', 'janithsrimal', 'janith', '337/2 central pitipana, Negombo.', '17', '1', '1', '2200'),
(1007, '2016-11-15', 'janithsrimal', 'janith', '337/2 central pitipana, Negombo.', '18', '2', '1', '1100'),
(1008, '2016-11-22', 'admin', 'admin', '337  main rd colombo', '19', '6', '1', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE IF NOT EXISTS `productdetails` (
  `Category` varchar(45) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Color` varchar(45) NOT NULL,
  `Size` varchar(45) NOT NULL,
  `NeckLine` varchar(45) DEFAULT 'null',
  `Fits` varchar(45) DEFAULT 'null',
  PRIMARY KEY (`Category`,`Brand`,`Color`,`Size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`Category`, `Brand`, `Color`, `Size`, `NeckLine`, `Fits`) VALUES
('Denim', 'Diesel', 'Blue', '28', NULL, 'Slim Fit'),
('Denim', 'Levis', 'Black', '30', NULL, 'Skinny Fit'),
('Shirt', 'American Eagle', 'Blue', 'Medium', NULL, 'Skinny Fit'),
('Shirt', 'Tommy Hilfiger', 'Blue', 'Large', NULL, 'Regular Fit'),
('Short', 'Adidas', 'Brown', '34', NULL, 'Regular Fit'),
('Short', 'Puma', 'Blue', '32', NULL, 'Skinny Fit'),
('Tshirt', 'Hollister', 'White', 'Large', 'Crew Neck', 'Skinny Fit'),
('Tshirt', 'Super Dry', 'Blue', 'Medium', 'V Neck', 'Skinny Fit');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `PID` int(11) NOT NULL,
  `PName` varchar(45) NOT NULL,
  `Category` varchar(45) DEFAULT NULL,
  `Brand` varchar(45) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Size` varchar(45) NOT NULL,
  `NeckLine` varchar(45) DEFAULT NULL,
  `Fits` varchar(45) DEFAULT NULL,
  `Quantity` varchar(45) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `Picture` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PID`,`PName`,`Size`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`PID`, `PName`, `Category`, `Brand`, `Color`, `Size`, `NeckLine`, `Fits`, `Quantity`, `Price`, `Picture`) VALUES
(100, 'Levis Slim Fit Denim', 'Denim', 'Levis', 'Blue', '32', '', 'Slim Fits', '70', '3200', 'Products/Denim1.jpg'),
(101, 'Levis Slim Fit Black Denim', 'Denim', 'Levis', 'Black', '32', '', 'Slim Fits', '20', '2200', 'Products/Denim2.jpg'),
(102, 'Polo Slim Fit Blue Denim', 'Denim', 'Polo', 'Blue', '32', '', 'Slim Fits', '30', '2200', 'Products/Denim3.jpg'),
(103, 'Polo Slim Fit Grey Denim', 'Denim', 'Polo', 'Grey', '32', '', 'Skinny Fits', '60', '2200', 'Products/Denim4.jpg'),
(104, 'Puma Print White TShirt', 'Tshirt', 'Puma', 'White', 'L', 'Crew Neck', 'Muscle Fit', '70', '1200', 'Products/TShirt1.jpg'),
(105, 'Hollister White Tshirt', 'Tshirt', 'Hollister', 'White', 'M', 'Crew Neck', 'Muscle Fit', '15', '1100', 'Products/Tshirt2.jpg'),
(106, 'Super Dry Tattoo White Tshirt', 'Tshirt', 'Super Dry', 'White', 'M', 'Crew Neck', 'Slim Fit', '5', '1100', 'Products/Tshirt3.jpg'),
(107, 'Adidas Print Logo White Tshirt', 'Tshirt', 'Adidas', 'White', 'L', 'Crew Neck', 'Muscle Fit', '10', '1100', 'Products/Tshirt4.jpg'),
(108, 'Tommy Hilfiger  Muscle Stripe Blue Tshirt', 'Tshirt', 'Tommy Hilfiger', 'Blue', 'M', 'Crew Neck', 'Slim Fit', '55', '1100', 'Products/Tshirt5.jpg'),
(109, 'Abercrombie Long Line Check Print Grey Tshirt', 'Tshirt', 'Abercrombie', 'Grey', 'M', 'Crew Neck', 'Muscle Fit', '90', '1100', 'Products/Tshirt6.jpg'),
(110, 'Puma Print Black Tshirt', 'Tshirt', 'Puma', 'Black', 'M', 'Crew Neck', 'Muscle Fit', '25', '1100', 'Products/Tshirt7.jpg'),
(111, 'American Eagle Doted Black Tshirt', 'Tshirt', 'American Eagle', 'Black', 'L', 'Crew Neck', 'Slim Fit', '20', '1100', 'Products/Tshirt8.jpg'),
(112, 'Tommy Hilfiger Blue Short', 'Short', 'Tommy Hilfiger', 'Black', 'L', NULL, 'Regular Fit', '40', '1600', 'Products/Short1.jpg'),
(113, 'Levis Blue Short', 'Short', 'Levis', 'Black', 'L', NULL, 'Skinny Fit Fit', '15', '1600', 'Products/Short2.jpg'),
(114, 'Nike Blue Short', 'Short', 'Nike', 'White', 'L', NULL, 'Regular Fit', '65', '1600', 'Products/Short3.jpg'),
(115, 'Nike Black Short', 'Short', 'Nike', 'Blue', 'L', NULL, 'Regular Fit', '20', '1600', 'Products/Short4.jpg'),
(116, 'Levis Blue Short', 'Short', 'Levis', 'Black', 'L', NULL, 'Regular Fit', '30', '1600', 'Products/Short5.jpg'),
(117, 'Tommy Hilfiger Brown Short', 'Short', 'Tommy Hilfiger', 'Blue', 'L', NULL, 'Regular Fit', '45', '1600', 'Products/Short6.jpg'),
(118, 'Abercrombie Black Design Shirt', 'Shirt', 'Abercrombie', 'Black', 'L', NULL, 'Regular Fit Fit', '25', '2000', 'Products/Shirt2.jpg'),
(119, 'American Eagle Black Doted Shirt', 'Shirt', 'American Eagle', 'Black', 'L', NULL, 'Slim Fit', '80', '2000', 'Products/Shirt6.jpg'),
(120, 'American Eagle Black Shirt', 'Shirt', 'American Eagle', 'Black', 'L', NULL, 'Slim Fit', '75', '2000', 'Products/Shirt1.jpg'),
(121, 'American Eagle White Shirt', 'Shirt', 'American Eagle', 'WHite', 'L', NULL, 'Slim Fit Fit', '40', '2000', 'Products/Shirt3.jpg'),
(122, 'Tommy Hilfiger Blue Stripe Shirt', 'Shirt', 'Tommy Hilfiger', 'Blue', 'L', NULL, 'Slim Fit', '55', '2000', 'Products/Shirt5.jpg'),
(123, 'Tommy Hilfiger Short Sleeve Blue Shirt', 'Shirt', 'Tommy Hilfiger', 'Blue', 'L', NULL, 'Slim Fit', '50', '1500', 'Products/Shirt4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `UName` varchar(50) DEFAULT NULL,
  `Pass` varchar(45) DEFAULT NULL,
  `Email` varchar(45) NOT NULL,
  `TelephoneNo` int(11) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `UserLevel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`FirstName`, `LastName`, `UName`, `Pass`, `Email`, `TelephoneNo`, `Address`, `UserLevel`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 112226952, '337  main rd colombo', 'admin'),
('janith', 'srimal', 'janithsrimal', 'janithsrimal', 'janithsrimal@gmail.com', 779712628, '337/2 central pitipana, Negombo.', 'user'),
('ravindu', 'fernando', 'owner', 'owner', 'ravindu@123@gmail.com', 773265984, '154/2B delgashandiya, Katana,', 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `CartID` int(11) NOT NULL,
  `CartDate` varchar(45) DEFAULT NULL,
  `PID` int(11) NOT NULL,
  `PName` varchar(45) DEFAULT NULL,
  `Size` varchar(45) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Amount` double DEFAULT NULL,
  PRIMARY KEY (`CartID`,`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`CartID`, `CartDate`, `PID`, `PName`, `Size`, `Quantity`, `Price`, `Amount`) VALUES
(10, '2016-10-24', 100, 'Levis Slim Fit Denim', '32', 2, 2200, 4400),
(10, '2016-10-24', 101, 'Levis Slim Fit Black Denim', '32', 1, 2000, 2000),
(10, '2016-10-24', 102, 'Polo Slim Fit Blue Denim', '32', 1, 1000, 1000),
(10, '2016-10-24', 103, 'Polo Slim Fit Grey Denim', '32', 1, 2300, 2300),
(11, '2016-10-25', 105, 'Hollister White Tshirt', 'M', 1, 1500, 1500),
(11, '2016-10-25', 106, 'Super Dry Tattoo White Tshirt', 'M', 2, 2200, 4400),
(12, '2016-10-26', 107, 'Adidas Print Logo White Tshirt', 'L', 1, 3000, 3000),
(13, '2016-10-27', 108, 'Tommy Hilfiger  Muscle Stripe Blue Tshirt', 'M', 2, 1200, 2400),
(14, '2016-10-28', 109, 'Abercrombie Long Line Check Print Grey Tshirt', 'M', 1, 2200, 2200),
(14, '2016-10-28', 116, 'Levis Blue Short', 'L', 1, 1700, 1700),
(15, '2016-11-02', 118, 'Abercrombie Black Design Shirt', 'L', 1, 2000, 2000),
(15, '2016-11-02', 121, 'American Eagle White Shirt', 'L', 1, 2200, 2200),
(16, '2016-11-04', 116, 'Levis Blue Short', 'L', 1, 1700, 1700),
(17, '2016-11-09', 101, 'Levis Slim Fit Black Denim', '32', 1, 2200, 2200),
(18, '2016-11-15', 107, 'Adidas Print Logo White Tshirt', 'L', 1, 1100, 1100),
(19, '2016-11-22', 106, 'Super Dry Tattoo White Tshirt', 'M', 1, 1100, 1100);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
