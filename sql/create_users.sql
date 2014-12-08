-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` ( 
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) UNIQUE NOT NULL,
  `FirstName` varchar(20),
  `LastName` varchar(20),
  `Password` char(41),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

