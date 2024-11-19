-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 01:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dreamy`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_tbl`
--

CREATE TABLE `address_tbl` (
  `user_Id` varchar(8) NOT NULL,
  `address_Name` varchar(150) NOT NULL,
  `address_Number` varchar(12) NOT NULL,
  `address_Lane` varchar(50) NOT NULL,
  `address_Town` varchar(50) NOT NULL,
  `address_District` varchar(25) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_tbl`
--

INSERT INTO `address_tbl` (`user_Id`, `address_Name`, `address_Number`, `address_Lane`, `address_Town`, `address_District`, `d_status`) VALUES
('EMP0001', 'Wedasingha', '57/3', 'Dewannada Road', 'Piliyandala', 'Colombo', 0),
('USR0001', 'wedasingha', '12/1', 'dewananda para', 'Piliyandala', 'Kegalle', 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_tbl`
--

CREATE TABLE `delivery_tbl` (
  `delivery_Id` varchar(8) NOT NULL,
  `order_done` int(1) NOT NULL,
  `order_payment` int(1) NOT NULL,
  `order_conform` int(1) NOT NULL,
  `order_store` int(1) NOT NULL,
  `order_transport` int(1) NOT NULL,
  `order_deliverd` int(1) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_tbl`
--

INSERT INTO `delivery_tbl` (`delivery_Id`, `order_done`, `order_payment`, `order_conform`, `order_store`, `order_transport`, `order_deliverd`, `d_status`) VALUES
('DLR0001', 1, 1, 0, 0, 0, 0, 0),
('DLR0002', 1, 0, 0, 0, 0, 0, 0),
('DLR0003', 1, 1, 0, 0, 0, 0, 0),
('DLR0004', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ebook_tbl`
--

CREATE TABLE `ebook_tbl` (
  `id` varchar(8) NOT NULL,
  `name` varchar(200) NOT NULL,
  `doc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook_tbl`
--

INSERT INTO `ebook_tbl` (`id`, `name`, `doc`) VALUES
('PRD0003', 'MD', 'upload/E-BOOK/PRD0003_Untitled.pdf');

-- --------------------------------------------------------

CREATE TABLE `password_tbl` (
  `id` varchar(8) NOT NULL,
  `old_pwd` varchar(100) NOT NULL,
  `new_pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook_tbl`
--

INSERT INTO `password_tbl` (`id`, `old_pwd`, `new_pwd`) VALUES
('0', '0','0');


--
-- Table structure for table `employer_tbl`
--

CREATE TABLE `employer_tbl` (
  `emp_Id` varchar(10) NOT NULL,
  `emp_FirstName` varchar(50) NOT NULL,
  `emp_SecondName` varchar(50) NOT NULL,
  `emp_Gender` varchar(6) NOT NULL,
  `emp_Nic` varchar(12) NOT NULL,
  `emp_Birthday` date NOT NULL,
  `emp_Image` varchar(250) NOT NULL,
  `emp_Address` varchar(250) NOT NULL,
  `emp_Phone` int(10) NOT NULL,
  `emp_Email` varchar(100) NOT NULL,
  `emp_JobTitle` varchar(20) NOT NULL,
  `emp_JobType` varchar(20) NOT NULL,
  `emp_JobLevel` varchar(20) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_tbl`
--

INSERT INTO `employer_tbl` (`emp_Id`, `emp_FirstName`, `emp_SecondName`, `emp_Gender`, `emp_Nic`, `emp_Birthday`, `emp_Image`, `emp_Address`, `emp_Phone`, `emp_Email`, `emp_JobTitle`, `emp_JobType`, `emp_JobLevel`, `d_status`) VALUES
('EMP0001', 'sachith', 'wedasingha', 'Male', '970573046v', '2022-02-14', 'upload/employer/EMP0001_IMG_20191103_234241.jpg', '0', 710458089, 'sachith@gmail.com', 'Admin', 'Full Time', 'Senior', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tbl`
--

CREATE TABLE `feedback_tbl` (
  `feedback_id` varchar(8) NOT NULL,
  `user_id` varchar(8) NOT NULL,
  `product_id` varchar(8) NOT NULL,
  `count` int(1) NOT NULL,
  `respons` varchar(500) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_tbl`
--

INSERT INTO `feedback_tbl` (`feedback_id`, `user_id`, `product_id`, `count`, `respons`, `d_status`) VALUES
('FED0001', 'USR0001', 'PRD0001', 5, 'good', 0),
('FED0002', 'USR0001', 'PRD0001', 5, 'qwe', 0),
('FED0003', 'USR0001', 'PRD0002', 5, '', 0),
('FED0004', 'USR0001', 'PRD0002', 3, '', 0),
('FED0005', 'USR0001', 'PRD0002', 0, '', 0),
('FED0006', 'EMP0001', 'PRD0003', 5, '', 0),
('FED0007', 'USR0001', 'PRD0003', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `user_id` char(10) NOT NULL,
  `login_email` varchar(100) NOT NULL,
  `login_pwd` varchar(100) NOT NULL,
  `login_role` varchar(20) NOT NULL,
  `login_status` varchar(32) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`user_id`, `login_email`, `login_pwd`, `login_role`, `login_status`, `d_status`) VALUES
('EMP0001', 'sachith@gmail.com', '202cb962ac59075b964b07152d234b70', 'Admin', '1', 0),
('SUP0001', '1sachithwedasingha@gmail.com', '0192cde0308ce14e9ebf589a997fcb90', 'Supplier', '1', 0),
('SUP0003', 'sachith97sw@gmail.com', '82521d6f6ba30492b9b480e2f81e3d9a', 'Supplier', '1', 0),
('USR0001', 'sachithwedasingha@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mt_tbl`
--

CREATE TABLE `mt_tbl` (
  `rt_Id` varchar(8) NOT NULL,
  `A` int(10) NOT NULL,
  `B` int(10) NOT NULL,
  `C` int(10) NOT NULL,
  `D` int(10) NOT NULL,
  `E` int(10) NOT NULL,
  `F` int(10) NOT NULL,
  `G` int(10) NOT NULL,
  `H` int(10) NOT NULL,
  `I` int(10) NOT NULL,
  `J` int(10) NOT NULL,
  `K` int(10) NOT NULL,
  `L` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mt_tbl`
--

INSERT INTO `mt_tbl` (`rt_Id`, `A`, `B`, `C`, `D`, `E`, `F`, `G`, `H`, `I`, `J`, `K`, `L`) VALUES
('MTR0001', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 900),
('MTR0002', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 900);

-- --------------------------------------------------------

--
-- Table structure for table `order_item_tbl`
--

CREATE TABLE `order_item_tbl` (
  `id` varchar(8) NOT NULL,
  `order_Id` varchar(8) NOT NULL,
  `product_Id` varchar(8) NOT NULL,
  `quantity` int(3) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item_tbl`
--

INSERT INTO `order_item_tbl` (`id`, `order_Id`, `product_Id`, `quantity`, `d_status`) VALUES
('OI0001', 'ORD0001', 'PRD0002', 1, 0),
('OI0002', 'ORD0001', 'PRD0003', 1, 0),
('OI0003', 'ORD0002', 'PRD0002', 1, 0),
('OI0004', 'ORD0003', 'PRD0002', 1, 0),
('OI0005', 'ORD0003', 'PRD0001', 1, 0),
('OI0006', 'ORD0004', 'PRD0003', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_Id` varchar(8) NOT NULL,
  `temp_Id` varchar(8) NOT NULL,
  `user_Id` varchar(8) NOT NULL,
  `order_date` date NOT NULL,
  `address` varchar(400) NOT NULL,
  `order_price` int(10) NOT NULL,
  `dilevery_Id` varchar(8) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_Id`, `temp_Id`, `user_Id`, `order_date`, `address`, `order_price`, `dilevery_Id`, `d_status`) VALUES
('ORD0001', '495', 'EMP0001', '2022-12-31', 'Wedasingha, 57/3, Dewannada Road, Piliyandala, Colombo', 650, 'DLR0001', 0),
('ORD0002', '947', 'USR0001', '2022-12-31', 'wedasingha, 12/1, dewananda para, Piliyandala, Kegalle', 50, 'DLR0002', 0),
('ORD0003', '749', 'USR0001', '2022-12-31', 'wedasingha, 12/1, dewananda para, Piliyandala, Kegalle', 200, 'DLR0003', 0),
('ORD0004', '972', 'USR0001', '2023-01-14', 'wedasingha, 12/1, dewananda para, Piliyandala, Kegalle', 600, 'DLR0004', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_Id` char(10) NOT NULL,
  `product_Name` varchar(30) NOT NULL,
  `product_Details` varchar(200) NOT NULL,
  `product_Price` float NOT NULL,
  `procut_Image` varchar(250) NOT NULL,
  `product_Category` varchar(50) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_Id`, `product_Name`, `product_Details`, `product_Price`, `procut_Image`, `product_Category`, `d_status`) VALUES
('PRD0001', 'CR Book 120P', 'Atlas Cr book single rools', 150, 'upload/products/PRD0001_childrenP014.jpg', 'Books / Writing', 0),
('PRD0002', 'Signature Pens', 'Any color signature pens', 50, 'upload/products/PRD0002_satin-pen-hq.webp', 'Writing items', 0),
('PRD0003', 'Madolduwa', 'Martin Wikramasingha', 600, 'upload/products/PRD0003_13572653.jpg', 'Reading books', 0),
('PRD0004', 'Harry Potter', 'J. K. Rowling', 5000, 'upload/products/PRD0004_9781408855652.jpg', 'Reading books', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reorderreq_tbl`
--

CREATE TABLE `reorderreq_tbl` (
  `req_Id` varchar(8) NOT NULL,
  `sup_Id` varchar(8) NOT NULL,
  `product_Id` varchar(8) NOT NULL,
  `qty` int(5) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reorder_tbl`
--

CREATE TABLE `reorder_tbl` (
  `product_Id` varchar(8) NOT NULL,
  `sup_Id` varchar(8) NOT NULL,
  `reorder_level` int(8) NOT NULL,
  `expier_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reorder_tbl`
--

INSERT INTO `reorder_tbl` (`product_Id`, `sup_Id`, `reorder_level`, `expier_date`) VALUES
('PRD0001', 'SUP0001', 18, '0000-00-00'),
('PRD0002', 'SUP0001', 10, '0000-00-00'),
('PRD0003', 'SUP0003', 5, '0000-00-00'),
('PRD0004', 'SUP0003', 10, '2023-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `store_tbl`
--

CREATE TABLE `store_tbl` (
  `product_Id` char(10) NOT NULL,
  `product_Quantity` int(6) NOT NULL,
  `product_QuantityWH` int(6) NOT NULL,
  `product_Sec` int(3) NOT NULL,
  `product_Rpw` int(3) NOT NULL,
  `product_Col` int(3) NOT NULL,
  `product_Lev` int(3) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_tbl`
--

INSERT INTO `store_tbl` (`product_Id`, `product_Quantity`, `product_QuantityWH`, `product_Sec`, `product_Rpw`, `product_Col`, `product_Lev`, `d_status`) VALUES
('PRD0001', 99, 15, 1, 1, 1, 1, 0),
('PRD0002', 197, 15, 1, 1, 1, 2, 0),
('PRD0003', 18, 10, 1, 1, 1, 1, 0),
('PRD0004', 20, 8, 3, 3, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_tbl`
--

CREATE TABLE `supplier_tbl` (
  `sup_Id` varchar(10) NOT NULL,
  `sup_Name` varchar(50) NOT NULL,
  `sup_br` varchar(12) NOT NULL,
  `emp_Address` varchar(250) NOT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `service` varchar(20) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_tbl`
--

INSERT INTO `supplier_tbl` (`sup_Id`, `sup_Name`, `sup_br`, `emp_Address`, `phone`, `email`, `type`, `service`, `d_status`) VALUES
('SUP0001', 'AAAA', '123456', 'Dewananda Road', 710458089, '1sachithwedasingha@gmail.com', 'Forin', 'Products', 0),
('SUP0003', 'BBB', '123456', 'Dewananda Road', 178523695, 'sachith97sw@gmail.com', 'Forin', 'Products', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` char(10) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` char(10) NOT NULL,
  `user_nic` char(11) NOT NULL,
  `user_status` varchar(32) NOT NULL,
  `d_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_nic`, `user_status`, `d_status`) VALUES
('USR0001', 'sachith', 'sachithwedasingha@gmail.com', '0710458089', '970573046V', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_tbl`
--
ALTER TABLE `address_tbl`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indexes for table `delivery_tbl`
--
ALTER TABLE `delivery_tbl`
  ADD PRIMARY KEY (`delivery_Id`);

--
-- Indexes for table `ebook_tbl`
--
ALTER TABLE `ebook_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_tbl`
--
ALTER TABLE `employer_tbl`
  ADD PRIMARY KEY (`emp_Id`);

--
-- Indexes for table `feedback_tbl`
--
ALTER TABLE `feedback_tbl`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `mt_tbl`
--
ALTER TABLE `mt_tbl`
  ADD PRIMARY KEY (`rt_Id`);

--
-- Indexes for table `order_item_tbl`
--
ALTER TABLE `order_item_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_Id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `reorderreq_tbl`
--
ALTER TABLE `reorderreq_tbl`
  ADD PRIMARY KEY (`req_Id`);

--
-- Indexes for table `reorder_tbl`
--
ALTER TABLE `reorder_tbl`
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `store_tbl`
--
ALTER TABLE `store_tbl`
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `supplier_tbl`
--
ALTER TABLE `supplier_tbl`
  ADD PRIMARY KEY (`sup_Id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
