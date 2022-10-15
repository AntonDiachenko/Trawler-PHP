-- drop DATABASE projectstore;
create database projectstore;

use projectstore;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- some data for table `items`

INSERT INTO `items` (`id`, `name`, `price`) VALUES
(1, 'Reel Anthrazite', 49),
(2, 'Reel Black', 34),
(3, 'Reel Blue', 43),
(4, 'Reel Gold', 37),
(5, 'Reel Purple', 38),
(6, 'Reel Red', 42),
(7, 'Reel Silver', 47),
(8, 'Reel Yellow', 48),
(9, 'Bass Pro', 29),
(10, 'Berkley', 19),
(11, 'Bomber', 21),
(12, 'Reef Runner', 15),
(13, 'Rumble Bug', 19),
(14, 'Skitter Pop', 18),
(15, 'Storm', 15),
(16, 'Strike King', 17);



-- Table structure for table `users`


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `level` int(10) NOT NULL  DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

-- admin:1  , admin2: 2,  user: 3, block :0


-- some data for table `users`


INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `city`, `address`, `level`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1111111111', 'Montreal', '111 Admin st', 1),
(2, 'peppa1', 'peppa1@gmail.com', '57f231b1ec41dc6641270cb09a56f897', '1234567890', 'Montreal', '111 Cochon st', 3),
(3, 'peppa2', 'peppa2@gmail.com', '57f231b1ec41dc6641270cb09a56f897', '0987654321', 'Toronto', '222 Green st', 3),
(4, 'peppa3', 'peppa3@gmail.com', '57f231b1ec41dc6641270cb09a56f897', '1212121212', 'Toronto', '333 Yellow st', 3),
(5, 'admin2', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '1111111111', 'Montreal', '111 Admin st', 2),
(6, 'admin2', 'admin2', '21232f297a57a5a743894a0e4a801fc3', '1111111111', 'Montreal', '111 Admin st', 2);


/* INSERT INTO `users` (`usertype`, `name`, `email`, `password`, `phone`, `city`, `address`) VALUES ('admin', 'admin5', 'admin5', 'admin5', '1111111111', 'Montreal', '111 Admin st'); */



-- Table structure for table `users_items`


CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status_cart` enum('Added to cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- some data for table `users_items`


INSERT INTO `users_items` (`id`, `user_id`, `item_id`, `status_cart`) VALUES
(7, 3, 3, 'Added to cart'),
(8, 3, 4, 'Added to cart'),
(9, 3, 5, 'Added to cart'),
(10, 3, 11, 'Added to cart'),
(11, 1, 9, 'Added to cart'),
(12, 1, 2, 'Added to cart'),
(13, 1, 8, 'Added to cart');


-- Table structure for table `fav_items`

CREATE TABLE `fav_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `list_name` VARCHAR(255),
  `status_cart` enum('Added to cart','Confirmed') NOT NULL,
  `status_fav` enum('Added to favourites','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `fav_items` (`id`, `user_id`, `item_id`, `list_name`, `status_cart`,`status_fav`) VALUES
(1, 2, 3, '', '', 'Added to favourites'),
(2, 3, 2, '', '', 'Added to favourites'),
(3, 2, 1, '', '', 'Added to favourites');



--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

-- Indexes for table `fav_items`
ALTER TABLE `fav_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);  

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

-- AUTO_INCREMENT for table `fav_items`
ALTER TABLE `fav_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for table `users_items`
--
ALTER TABLE `users_items`
  ADD CONSTRAINT `users_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

-- Constraints for table `users_items`
ALTER TABLE `fav_items`
  ADD CONSTRAINT `fav_items_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fav_items_fk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

-- Assign deafult value 'admin' to the admin in table users
update users set usertype="admin" where id=1;
 
