-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



-- Table structure for table `areas`

CREATE TABLE `areas` (
  `area_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `area` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Dumping data for table `areas`


INSERT INTO `areas` (`area_id`, `prog_id`, `area`) VALUES
(1, 1, 'Ada95 Parser'),
(2, 1, 'Ada95 Lexer'),
(3, 1, 'Ada95 IDE'),
(4, 2, 'Logon'),
(5, 2, 'Start'),
(6, 2, 'DB Maintenance'),
(7, 2, 'Search'),
(8, 2, 'Insert New'),
(9, 2, 'Search Results'),
(10, 2, 'Add Edit Areas'),
(11, 2, 'Add Employees'),
(12, 2, 'Add Programs'),
(13, 2, 'View Bugs'),
(14, 3, 'Lexer'),
(15, 3, 'Parser'),
(16, 3, 'Code Generator'),
(17, 3, 'Linker'),
(18, 4, 'Lexer'),
(19, 4, 'Parser'),
(20, 4, 'Code Generator'),
(21, 4, 'Linker'),
(22, 5, 'Lexer'),
(23, 5, 'Parser'),
(24, 5, 'Code Generator'),
(25, 5, 'Linker'),
(26, 5, 'IDE'),
(27, 6, 'Lexer'),
(28, 6, 'Parser'),
(29, 6, 'Code Generator'),
(30, 6, 'Linker'),
(31, 6, 'IDE'),
(32, 7, 'Editor'),
(33, 7, 'Spell Checker'),
(34, 7, 'Dynodraw'),
(35, 7, 'Formulator'),
(36, 2, 'Export');

-- --------------------------------------------------------
-- Table structure for table `attachment`

CREATE TABLE `attachment` (
  `attach_id` int(11) NOT NULL,
  `bug` int(11) NOT NULL,
  `file_name` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `attachment`

INSERT INTO `attachment` (`attach_id`, `bug`, `file_name`) VALUES
(1018, 1031, 'abc.docx'),
(1019, 1032, 'abc.docx'),
(1020, 1033, 'abc.pdf'),
(1021, 1034, 'fileb.txt');

-- --------------------------------------------------------
-- Table structure for table `bug`

CREATE TABLE `bug` (
  `bug_id` int(10) NOT NULL,
  `Program` int(20) NOT NULL,
  `Report_type` varchar(20) NOT NULL,
  `Severity` varchar(10) NOT NULL,
  `Problem_Summary` text,
  `Reproducable` varchar(4) DEFAULT NULL,
  `Problem` varchar(100) DEFAULT NULL,
  `Suggested_Fix` varchar(50) DEFAULT NULL,
  `Reported_By` int(10) NOT NULL,
  `Report_Date` date NOT NULL,
  `Functional_Area` int(20) DEFAULT NULL,
  `Assigned_To` int(10) DEFAULT NULL,
  `Comments` text,
  `Status_bug` varchar(10) DEFAULT NULL,
  `Priority` varchar(35) DEFAULT NULL,
  `Resolution` varchar(10) DEFAULT NULL,
  `Resolution_Version` int(10) DEFAULT NULL,
  `Resolved_By` int(10) DEFAULT NULL,
  `Resolve_Date` date DEFAULT NULL,
  `Tested_By` int(10) DEFAULT NULL,
  `Test_Date` date DEFAULT NULL,
  `Deferred` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `bug`

INSERT INTO `bug` (`bug_id`, `Program`, `Report_type`, `Severity`, `Problem_Summary`, `Reproducable`, `Problem`, `Suggested_Fix`, `Reported_By`, `Report_Date`, `Functional_Area`, `Assigned_To`, `Comments`, `Status_bug`, `Priority`, `Resolution`, `Resolution_Version`, `Resolved_By`, `Resolve_Date`, `Tested_By`, `Test_Date`, `Deferred`) VALUES
(1000, 1, '0', 'Minor', 'abc', 'Yes', 'd', NULL, 1000, '2020-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1001, 1, '0', 'Minor', 'Test', 'Yes', 'Testing', NULL, 1001, '2020-04-18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1002, 1, '0', 'Minor', 'dd', 'Yes', 'ss', NULL, 1001, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1028, 1, '0', 'Minor', '', 'Yes', '', NULL, 1000, '0000-00-00', 1, 1000, '', 'Open', 'Fix immediately', 'Pending', 1, 1000, '0000-00-00', 1000, '0000-00-00', 'YES'),
(1029, 1, '0', 'Minor', '', 'Yes', '', NULL, 1000, '0000-00-00', 1, 1000, '', 'Open', 'Fix immediately', 'Pending', 1, 1000, '0000-00-00', 1000, '0000-00-00', 'YES'),
(1034, 1, '0', 'Minor', '', 'Yes', '', NULL, 1000, '0000-00-00', 1, 1000, '', 'Open', 'Fix immediately', 'Pending', 1, 1000, '0000-00-00', 1000, '0000-00-00', 'YES'),
(1035, 1, 'Coding Error', 'Minor', '', 'Yes', '', NULL, 1000, '0000-00-00', 1, 1000, '', 'Open', 'Fix immediately', 'Pending', 1, 1000, '0000-00-00', 1000, '0000-00-00', 'YES'),

-- --------------------------------------------------------
-- Table structure for table `employees`

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `employees`

INSERT INTO `employees` (`emp_id`, `name`, `username`, `password`, `userlevel`) VALUES
(1000, Peter', 'peter', '1234', 3),
(1001, 'Hulk', 'Hulk', '1234', 1),
(1002, 'Bob', 'smithbob', '1234', 3),
(1003, 'Sue', 'jonessue', '1234', 2),
(1004, 'Habib', 'smithhabib', '1234', 2),
(1005, 'Yoshi', 'jonesyoshi', '1234', 3),
(1006, 'Francois', 'smithfrancois', '1234', 2),
(1007, 'Becky', 'jonesbecky', '1234', 1),
(1008, 'Felix', 'smithfelix', '1234', 2);

-- --------------------------------------------------------
-- Table structure for table `programs`

CREATE TABLE `programs` (
  `prog_id` int(11) NOT NULL,
  `program` varchar(32) NOT NULL,
  `program_release` varchar(32) NOT NULL,
  `program_version` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`prog_id`, `program`, `program_release`, `program_version`) VALUES
(1, 'Ada95 Coder', '1', '1'),
(2, 'Bughound', '1', '1'),
(3, 'COBOL Coder', '1', '1'),
(4, 'COBOL Coder', '2', '1'),
(5, 'COBOL Coder', '1', '2'),
(6, 'Pascal Coder', '1', '1'),
(7, 'Word Writer 2019', '1', '1');

-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `foreign_key` (`prog_id`);

-- Indexes for table `attachment`
--
ALTER TABLE `attachment`
  ADD PRIMARY KEY (`attach_id`),
  ADD KEY `bug` (`bug`);

-- Indexes for table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`bug_id`),
  ADD KEY `Program` (`Program`),
  ADD KEY `Assigned_To` (`Assigned_To`),
  ADD KEY `Reported_By` (`Reported_By`),
  ADD KEY `Resolved_By` (`Resolved_By`),
  ADD KEY `Tested_By` (`Tested_By`),
  ADD KEY `Functional_Area` (`Functional_Area`);

-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`prog_id`);

-- AUTO_INCREMENT for dumped tables
--

-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

-- AUTO_INCREMENT for table `attachment`
--
ALTER TABLE `attachment`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1040;

-- AUTO_INCREMENT for table `bug`
--
ALTER TABLE `bug`
  MODIFY `bug_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;

-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


ALTER TABLE `areas`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`prog_id`) REFERENCES `programs` (`prog_id`);

-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `attachment_ibfk_1` FOREIGN KEY (`bug`) REFERENCES `bug` (`bug_id`);

-- Constraints for table `bug`
--
ALTER TABLE `bug`
  ADD CONSTRAINT `bug_ibfk_1` FOREIGN KEY (`Program`) REFERENCES `programs` (`prog_id`),
  ADD CONSTRAINT `bug_ibfk_2` FOREIGN KEY (`Assigned_To`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bug_ibfk_3` FOREIGN KEY (`Reported_By`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bug_ibfk_4` FOREIGN KEY (`Resolved_By`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bug_ibfk_5` FOREIGN KEY (`Tested_By`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bug_ibfk_6` FOREIGN KEY (`Functional_Area`) REFERENCES `areas` (`area_id`),
  ADD CONSTRAINT `bug_ibfk_7` FOREIGN KEY (`Functional_Area`) REFERENCES `areas` (`area_id`);
COMMIT;

