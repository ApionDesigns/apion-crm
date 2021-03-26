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
  `quotation` varchar(255) NOT NULL,
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
  `tel` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
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
CREATE TABLE `joimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `imgfile_name` varchar(255) NOT NULL,
  `uploaded_on` DATE NULL,
  `client_id` int(255) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;