-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2024 at 08:23 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `itemName`, `price`, `image`, `quantity`, `catName`, `email`, `total_price`) VALUES
(0, 'Golden Fries', '6', 'fries.jpg', 1, 'Appetizer', 'test121@gmail.com', '5.99');

-- --------------------------------------------------------

--
-- Table structure for table `menucategory`
--

CREATE TABLE `menucategory` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menucategory`
--

INSERT INTO `menucategory` (`catId`, `catName`, `dateCreated`) VALUES
(1, 'Appetizer', '2024-09-21 13:01:55'),
(2, 'Burger', '2024-09-21 03:01:55'),
(3, 'Pizza', '2024-09-21 13:01:55'),
(4, 'Beverage', '2024-09-21 13:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` enum('Available','Unavailable','','') NOT NULL DEFAULT 'Available',
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedDate` datetime NOT NULL,
  `is_popular` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`itemId`, `itemName`, `catName`, `price`, `status`, `description`, `image`, `dateCreated`, `updatedDate`, `is_popular`) VALUES
(1, 'Spicy Samosas', 'Appetizer', '4.99', 'Available', 'Crispy and spiced Samosas filled with flavorful potatoes and peas.', 'samosa.avif', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(2, 'Golden Fries', 'Appetizer', '5.99', 'Available', 'Crispy, golden fries sprinkled with sea salt and served with a zesty dip.', 'fries.jpg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(3, 'Veggie Supreme Pizza', 'Pizza', '9.99', 'Available', 'A colorful pizza loaded with fresh vegetables and drizzled with pesto.', 'veggie-pizza.jpg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(4, 'Shrimp Delight Pizza', 'Pizza', '14.99', 'Available', 'Topped with succulent shrimp, tangy sauce, and fresh herbs for a burst of flavor.', 'prawn-pizza.jpg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(5, 'Classic Cheese Pizza', 'Pizza', '9.99', 'Unavailable', 'Indulge in our classic cheese pizza, with a blend of mozzarella and herbs.', 'cheese-pizza.jpg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(6, 'BBQ Chicken Pizza', 'Pizza', '12.99', 'Available', 'Savor smoky BBQ flavors with grilled chicken and a blend of cheeses.', 'bbq-pizza.jpg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(7, 'Firebird Chicken Burger', 'Burger', '18.99', 'Available', 'A crispy fried chicken breast served with fresh lettuce and spicy mayo.', 'firebird-burger.jpeg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(8, 'Hybrid Chicken Burger', 'Burger', '16.99', 'Available', 'A crunchy chicken burger topped with melted cheddar and tangy sauce.', 'hybrid-burger.jpeg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(9, 'BBQ Burger', 'Burger', '17.99', 'Available', 'A hearty chicken patty char-grilled to perfection, topped with BBQ sauce.', 'bbq-burger.jpeg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(10, 'Crispy Chicken Burger', 'Burger', '17.99', 'Unavailable', 'Crispy fried chicken with melted cheddar and spicy mayo.', 'crispy-burger.jpeg', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(11, 'Strawberry Mocktail', 'Beverage', '3.99', 'Available', 'A refreshing blend of strawberries and mint, perfect for a hot day.', 'strawberry-drink.png', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(12, 'Citrus Splash Sizzler', 'Beverage', '2.99', 'Available', 'A zesty blend of fresh oranges and sparkling water, invigorating and refreshing.', 'orange-drink.png', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(13, 'Tropical Mojito', 'Beverage', '5.99', 'Available', 'A tropical twist with dragon fruit and a hint of mint for a refreshing drink.', 'dragon-fruit-drink.png', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(14, 'Watermelon Bliss Smoothie', 'Beverage', '3.49', 'Available', 'A cool blend of watermelon and lime, perfect for summer days.', 'watermelon-drink.png', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0),
(15, 'Garlic Bread Delight', 'Appetizer', '2.99', 'Available', 'Warm, buttery garlic bread, perfect for sharing.', 'garlic-bread.avif', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 1),
(16, 'Spicy Chicken Wings', 'Appetizer', '5.99', 'Available', 'Juicy chicken wings tossed in your choice of spicy sauce.', 'chicken-wing.avif', '2024-09-21 17:55:34', '2024-09-21 23:40:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pmode` enum('Cash','Card','Takeaway','') NOT NULL DEFAULT 'Cash',
  `payment_status` enum('Pending','Successful','Rejected','') NOT NULL DEFAULT 'Pending',
  `sub_total` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` enum('Pending','Completed','Cancelled','Processing','On the way') NOT NULL DEFAULT 'Pending',
  `cancel_reason` varchar(255) DEFAULT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `firstName`, `lastName`, `phone`, `address`, `pmode`, `payment_status`, `sub_total`, `grand_total`, `order_date`, `order_status`, `cancel_reason`, `note`) VALUES
(59, 'test121@gmail.com', 'test121', 'Bhatt', '9999999999', 'sydney', 'Takeaway', 'Pending', '830.00', '830.00', '2024-09-23 02:37:29', 'On the way', NULL, 'delivery fast'),
(60, 'test122@gmail.com', 'test', '122', '1222222222', 'Melbourne', 'Takeaway', 'Pending', '3200.00', '3200.00', '2024-09-23 02:47:58', 'Completed', NULL, 'please delivery fast in 10 min'),
(61, 'test122@gmail.com', 'test', 'foryou', '666666666', 'Melbourne', 'Takeaway', 'Pending', '128.00', '128.00', '2024-09-23 03:20:24', 'Pending', NULL, 'excited'),
(62, 'test121@gmail.com', 'friend1', 'singh', '444444444', 'Sydney, Australia', 'Takeaway', 'Pending', '1700.00', '1700.00', '2024-09-23 03:26:57', 'Completed', NULL, 'for my friend');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `itemName`, `image`, `quantity`, `price`, `total_price`) VALUES
(134, 59, 'Garlic Bread', 'garlic-bread.avif', 1, '350', '350.00'),
(135, 59, 'Chicken Wing', 'chicken-wing.avif', 1, '480', '480.00'),
(136, 60, 'BBQ Chicken Burger', 'bbq-burger.jpeg', 1, '1900', '1900.00'),
(137, 60, 'Garlic Bread', 'garlic-bread.avif', 2, '350', '700.00'),
(138, 60, 'Samosa', 'samosa.avif', 5, '120', '600.00'),
(139, 61, 'Citrus Splash Sizzler', 'orange-drink.png', 5, '3', '15.00'),
(140, 61, 'Spicy Chicken Wings', 'chicken-wing.avif', 2, '6', '12.00'),
(141, 61, 'Strawberry Mocktail', 'strawberry-drink.png', 5, '4', '20.00'),
(142, 61, 'Shrimp Delight Pizza', 'prawn-pizza.jpg', 3, '15', '45.00'),
(143, 61, 'Golden Fries', 'fries.jpg', 6, '6', '36.00'),
(144, 62, 'Prawn Pizza', 'prawn-piza.jpg', 1, '1200', '1200.00'),
(145, 62, 'Chicken Wing', 'chicken-wing.avif', 1, '480', '480.00'),
(146, 62, 'Hybrid Chicken Burger', 'hybrid-burger.jpeg', 1, '17', '17.00'),
(147, 62, 'Garlic Bread Delight', 'garlic-bread.avif', 1, '3', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `noOfGuests` int(50) NOT NULL,
  `reservedTime` time NOT NULL,
  `reservedDate` date NOT NULL,
  `reservedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','On Process','Completed','Cancelled') NOT NULL DEFAULT 'Pending',
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`email`, `name`, `contact`, `noOfGuests`, `reservedTime`, `reservedDate`, `reservedAt`, `status`, `reservation_id`) VALUES
('test@gmail.com', 'test', '1234567890', 6, '00:00:11', '2024-09-19', '2024-09-23 03:55:37', 'Pending', 18);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text DEFAULT NULL,
  `review_date` date DEFAULT current_timestamp(),
  `status` enum('approved','pending','rejected') DEFAULT 'pending',
  `response` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `email`, `order_id`, `rating`, `review_text`, `review_date`, `status`, `response`) VALUES
(1, 'test122@gmail.com', 60, 4, 'very nice but little bit salty', '2024-09-23', 'pending', NULL),
(33, 'test121@gmail.com', 62, 5, 'wow super fast delivery', '2024-09-23', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstName`, `lastName`, `contact`, `password`, `dateCreated`, `profile_image`) VALUES
('test121@gmail.com', 'test121', 'bhat', '9999999999', 'test121', '2024-09-23 02:35:59', 'default.jpg'),
('test122@gmail.com', 'test', '122', '1222222222', 'test122', '2024-09-23 02:46:28', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menucategory`
--
ALTER TABLE `menucategory`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `itemId` (`itemName`) USING BTREE;

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `email` (`email`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menucategory`
--
ALTER TABLE `menucategory`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
