CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `client_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `city_address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `inspec_day` DATE NULL,
  `inspec_exdayrt` DATE NULL,
  `inspec_dayrt` DATE NULL,
  `inspec_dayrcv` DATE NULL,
  `inspecrcver` varchar(255) NOT NULL,
  `rtinspec_rcver` varchar(255) NOT NULL,
  `rtinspec_dayrcv` DATE NULL,
  `day_of_job` DATE NULL,
  `lead_tech` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `cost` int(255) NOT NULL,
  `payed` int(255) NOT NULL,
  `jorcver` varchar(255) NOT NULL,
  `jo_dayrcv` DATE NULL,
  `jo_day` DATE NULL,
  `jo_exdayrt` DATE NULL,
  `jo_dayrt` DATE NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

----------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_uid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--------------------------------------------------

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `tax` int(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--------------------------------------------------
CREATE TABLE `bait_stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `client_id` int(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `date1` DATE NULL,
  `status2` varchar(255) NOT NULL,
  `date2` DATE NULL,
  `status3` varchar(255) NOT NULL,
  `date3` DATE NULL,
  `status4` varchar(255) NOT NULL,
  `date4` DATE NULL,
  `status5` varchar(255) NOT NULL,
  `date5` DATE NULL,
  `status6` varchar(255) NOT NULL,
  `date6` DATE NULL,
  `status7` varchar(255) NOT NULL,
  `date7` DATE NULL,
  `status8` varchar(255) NOT NULL,
  `date8` DATE NULL,
  `status9` varchar(255) NOT NULL,
  `date9` DATE NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--------------------------------------------------
CREATE TABLE `inspecimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `imgfile_name` varchar(255) NOT NULL,
  `uploaded_on` DATE NULL,
  `client_id` int(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--------------------------------------------------
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `imgfile_name` varchar(255) NOT NULL,
  `uploaded_on` DATE NULL,
  `client_id` int(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--------------------------------------------------
CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--------------------------------------------------
INSERT INTO `users` (`id`, `user_uid`, `username`, `first_name`, `last_name`, `email`, `tel`, `userpassword`, `status`, `created_at`) VALUES
(1, 1088889100, 'admin', 'Admin', 'User', 'adminemail@email.com', '', '90a2379a5379f94b1c11a6521e79be38', 'Offline now', '2021-03-18 03:05:33');