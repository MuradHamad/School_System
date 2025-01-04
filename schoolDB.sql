-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 06:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`) VALUES
(8, 'eighth'),
(11, 'eleventh'),
(5, 'Fifth'),
(1, 'first'),
(4, 'forth'),
(9, 'ninth'),
(2, 'Second'),
(7, 'seventh'),
(6, 'sixth'),
(10, 'tenth'),
(3, 'Third'),
(12, 'twelfth');

-- --------------------------------------------------------

--
-- Table structure for table `grades_subjects`
--

CREATE TABLE `grades_subjects` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades_subjects`
--

INSERT INTO `grades_subjects` (`id`, `grade`, `subject`) VALUES
(2, 1, 1),
(5, 1, 2),
(4, 1, 3),
(20, 1, 4),
(3, 2, 1),
(6, 2, 2),
(22, 2, 4),
(16, 2, 5),
(23, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `grade`, `student_id`, `subject`, `year`, `semester`, `month`, `mark`) VALUES
(1, 1, 1, 2, 2024, 1, 1, 19),
(12, 1, 2, 2, 2024, 1, 1, 19),
(18, 2, 3, 1, 2024, 1, 1, 18),
(19, 2, 3, 2, 2024, 1, 1, 16),
(28, 1, 1, 1, 2024, 1, 1, 16),
(29, 3, 4, 4, 2024, 1, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `name`) VALUES
(1, 'first'),
(2, 'second'),
(3, 'third');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`) VALUES
(1, 'first'),
(2, 'second');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `grade`, `dob`, `gender`) VALUES
(1, 'ali', 'kamal', 1, '2018-05-25', 1),
(2, 'salma', 'abdallah', 1, '2018-08-22', 0),
(3, 'ali', 'mohammad', 2, '2017-07-12', 1),
(4, 'abdallah', 'othman', 3, '2016-06-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`) VALUES
(1, 'math'),
(2, 'science'),
(3, 'geometry'),
(4, 'Arabic'),
(5, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `subject`) VALUES
(1, 'mohammad', 'hasan', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `grades_subjects`
--
ALTER TABLE `grades_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade` (`grade`,`subject`),
  ADD KEY `subject_grades_subjects_fk` (`subject`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`,`subject`,`year`,`semester`,`month`),
  ADD KEY `marks_students_fk` (`student_id`),
  ADD KEY `marks_semester_fk` (`semester`),
  ADD KEY `marks_month_fk` (`month`),
  ADD KEY `grades_marks_fk` (`grade`),
  ADD KEY `marks_subject_fk` (`subject`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_grade_fk` (`grade`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_subjects_fk` (`subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grades_subjects`
--
ALTER TABLE `grades_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades_subjects`
--
ALTER TABLE `grades_subjects`
  ADD CONSTRAINT `grades_grades_subjects_fk` FOREIGN KEY (`grade`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `subject_grades_subjects_fk` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `grades_marks_fk` FOREIGN KEY (`grade`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `marks_subject_fk` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `student_grade_fk` FOREIGN KEY (`grade`) REFERENCES `grades` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_subjects_fk` FOREIGN KEY (`subject`) REFERENCES `subjects` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
