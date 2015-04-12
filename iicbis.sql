-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 11:15 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iicbis`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_student`
--

CREATE TABLE IF NOT EXISTS `alumni_student` (
  `student_id` int(11) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_student`
--

INSERT INTO `alumni_student` (`student_id`, `cdate`) VALUES
(555, '2015-03-17'),
(30486246, '2015-03-08');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
`contract_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `edate` date NOT NULL,
  `tor` varchar(2000) NOT NULL,
  `contract_status` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contract_id`, `student_id`, `bdate`, `edate`, `tor`, `contract_status`) VALUES
(4, 333, '2015-03-10', '2015-05-10', '                      xaa\n                    ', 'ongoing'),
(10, 30486246, '2015-03-06', '2015-05-08', '                      Develop System for CDU                                                          ', 'ongoing'),
(11, 555, '2015-03-05', '2015-07-09', '                                                                Develop System for Partnership Unit                    ', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `fellowship_application`
--

CREATE TABLE IF NOT EXISTS `fellowship_application` (
`application_id` int(11) NOT NULL,
  `application_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `research_title` varchar(500) NOT NULL,
  `sponsor` varchar(500) NOT NULL,
  `sponsor_contact` varchar(500) NOT NULL,
  `applicant_skills` varchar(500) NOT NULL,
  `relevantinformation` varchar(1000) NOT NULL,
  `curriculumvitae` varchar(1000) NOT NULL,
  `introductionletter` varchar(1000) NOT NULL,
  `applicant_coverletter` varchar(1000) NOT NULL,
  `applicant_requirements` varchar(2000) NOT NULL,
  `application_status` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fellowship_application`
--

INSERT INTO `fellowship_application` (`application_id`, `application_date`, `user_id`, `vacancy_id`, `research_title`, `sponsor`, `sponsor_contact`, `applicant_skills`, `relevantinformation`, `curriculumvitae`, `introductionletter`, `applicant_coverletter`, `applicant_requirements`, `application_status`) VALUES
(4, '2015-01-28 09:33:07', 2, 0, 'PHP Web Development', 'fd', '', '                                        dsds      ', 'dsdss                                              \n                      ', '', '', '', '', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `internship_application`
--

CREATE TABLE IF NOT EXISTS `internship_application` (
`application_id` int(11) NOT NULL,
  `vacancy_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `applicant_skills` varchar(1000) NOT NULL,
  `relevantinformation` varchar(2000) DEFAULT NULL,
  `curriculumvitae` varchar(2000) NOT NULL,
  `introductionletter` varchar(2000) DEFAULT NULL,
  `application_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `application_status` varchar(200) NOT NULL,
  `applicant_requirements` varchar(2000) NOT NULL,
  `applicant_coverletter` varchar(2000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `internship_application`
--

INSERT INTO `internship_application` (`application_id`, `vacancy_id`, `user_id`, `applicant_skills`, `relevantinformation`, `curriculumvitae`, `introductionletter`, `application_date`, `application_status`, `applicant_requirements`, `applicant_coverletter`) VALUES
(4, 1, 2, '                                              vsvsvs', '                                              vsvsvs\n                      ', 'http://localhost/IMCBIS/assets/cv/hci_assng.pdf', 'http://localhost/IMCBIS/assets/cv/hci_assng.pdf', '2015-01-26 02:54:38', 'accepted', 'Medical Insuarance', 'http://localhost/IMCBIS/assets/coverletter/courses1.pdf'),
(5, 3, 2, '                       PHP                       ', '                     NOE                         \r\n                      ', 'http://localhost/IMCBIS/assets/cv/Doc1.docx', 'http://localhost/IMCBIS/assets/cv/Doc1.docx', '2015-02-10 12:42:22', 'reject', '', 'http://localhost/IMCBIS/assets/coverletter/Doc1.docx'),
(6, 2, 4, '                                              PHP ,JAVA\r\n', '                                 N/A             \r\n                      ', 'http://localhost/IMCBIS/assets/cv/PREQUALIFICATION_OF_BUILDING_CONTRACTORS_MINOR_WORKS-KITUI_CAMPUS.doc', 'http://localhost/IMCBIS/assets/cv/Griffin_Muteti.pdf', '2015-03-17 09:32:50', 'accepted', '', 'http://localhost/IMCBIS/assets/coverletter/Griffin_Muteti.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
`project_id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `student_id` int(11) NOT NULL,
  `project_category` varchar(200) NOT NULL,
  `project_description` varchar(2000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `student_id`, `project_category`, `project_description`) VALUES
(4, 'fasasdfas', 555, 'asfasfas', 'fasfasfas'),
(5, 'cdu2014 web', 555, 'web', 'web design for cdu');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE IF NOT EXISTS `project_tasks` (
  `project_id` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `tasks` varchar(2000) NOT NULL,
`update_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `project_tasks`
--

INSERT INTO `project_tasks` (`project_id`, `s_date`, `e_date`, `tasks`, `update_id`) VALUES
(4, '2015-03-11', '2015-03-18', ' Tasks', 1),
(4, '2015-03-11', '2015-03-18', ' Tasks', 2),
(4, '2015-03-04', '2015-03-10', ' Tasks', 3),
(4, '2015-03-04', '2015-03-10', ' Tasks', 4),
(5, '2015-03-09', '2015-03-13', 'developed back end', 5),
(5, '2015-03-16', '2015-03-20', 'working on front end\r\n', 6);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE IF NOT EXISTS `student_details` (
  `user_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `student_gender` varchar(10) NOT NULL,
  `student_nationality` varchar(200) NOT NULL,
  `student_dob` date NOT NULL,
  `student_biography` varchar(1000) NOT NULL,
  `student_institution` varchar(200) NOT NULL,
  `student_nextofkin` varchar(200) NOT NULL,
  `student_nextofkincontact` varchar(200) NOT NULL,
  `student_fieldofstudy` varchar(200) NOT NULL,
  `student_email` varchar(200) NOT NULL,
  `student_phone` varchar(200) NOT NULL,
  `student_state` varchar(50) NOT NULL DEFAULT 'applicant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`user_id`, `student_id`, `student_name`, `student_gender`, `student_nationality`, `student_dob`, `student_biography`, `student_institution`, `student_nextofkin`, `student_nextofkincontact`, `student_fieldofstudy`, `student_email`, `student_phone`, `student_state`) VALUES
(4, 555, 'Griffin Muteti Ngei', 'Male', 'Kenya', '0000-00-00', 'am awesome', 'Dezari  Ventures Limited', 'Griffin Muteti', '0702990800', 'Bsc Computer Science', 'griffin@gmail.com', '0702990800', 'alumni'),
(5, 657, 'Shan Kandie', 'Male', 'Kenya', '1990-08-12', 'fsdfs', 'Kenyan', '', '', '', 'shan@gmail.com', '0708989043', 'applicant'),
(2, 30486246, 'Elizabeth Mbinya', 'Female', 'Kenya', '1994-03-18', 'Biography', 'Kenyatta University', 'Grifin Muteti', '0702990800', 'Computer Science', 'griffinmteti31@gmail.com', '070299080', 'alumni');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE IF NOT EXISTS `supervisor` (
  `user_id` int(11) NOT NULL,
`supervisor_id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `sd_unit` varchar(200) NOT NULL,
  `supervisor_email` varchar(200) NOT NULL,
  `supervisor_phone` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`user_id`, `supervisor_id`, `Name`, `sd_unit`, `supervisor_email`, `supervisor_phone`) VALUES
(4, 1, 'Griffin Muteti Ngei', 'Communications', 'griffinmu@gmail.com', '0702990800'),
(4, 2, 'Griffin Muteti Ngei', 'Communications', 'griffinmu@gmail.com', '0702990800');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_allocation`
--

CREATE TABLE IF NOT EXISTS `supervisor_allocation` (
  `supervisor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
`allocation_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `supervisor_allocation`
--

INSERT INTO `supervisor_allocation` (`supervisor_id`, `student_id`, `allocation_id`) VALUES
(2, 30486246, 19),
(1, 0, 20),
(2, 555, 21),
(2, 0, 22);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userid` int(11) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `account_type` varchar(200) NOT NULL DEFAULT 'student',
  `user_avatar` varchar(10000) DEFAULT NULL,
  `username` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `useremail`, `password`, `account_type`, `user_avatar`, `username`) VALUES
(2, 'griffinmteti31@gmail.com', '45edd741812abf42a7b799a6fc558d9c', 'supervisor', 'http://localhost/IMCBIS/assets/img/users/IMG-20140929-WA0012.jpg', 'eliza'),
(3, 'griffinmuteti31@gmail.com', 'bd470ca955d9497bbcb808e59952fffc', 'admin', NULL, 'tets'),
(4, 'griffin@gmail.com', '45edd741812abf42a7b799a6fc558d9c', 'student', 'http://localhost/IMCBIS/assets/img/users/Koala1.jpg', 'Griff'),
(5, 'shan@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53', 'student', 'http://localhost/IMCBIS/assets/img/users/1424772450_785573497_1.jpg', 'shan');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
`vacancy_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `vacancy_title` varchar(200) NOT NULL,
  `vacancy_status` varchar(500) NOT NULL,
  `vacancy_description` varchar(5000) NOT NULL,
  `application_deadline` date NOT NULL,
  `position_startdate` date NOT NULL,
  `position_enddate` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vacancy_id`, `request_id`, `vacancy_title`, `vacancy_status`, `vacancy_description`, `application_deadline`, `position_startdate`, `position_enddate`) VALUES
(1, 1, 'Intern to Develop System for CDU', 'open', '                                                                    \n                                              \nintern required with PHP and Drupal Skills to help CDU develop a system for Intern management\n                      ', '0000-00-00', '2015-02-04', '2015-04-08'),
(2, 2, 'Web Intern', 'open', '                                              \r\n                      student with programming skills', '2015-02-20', '2015-03-02', '2015-06-02'),
(3, 3, 'Web Intern', 'open', '                                              WEB INTERN\r\n                      ', '2015-02-13', '2015-03-05', '2015-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_request`
--

CREATE TABLE IF NOT EXISTS `vacancy_request` (
`request_id` int(11) NOT NULL,
  `request_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_user` int(11) NOT NULL,
  `skills_experience` varchar(2000) NOT NULL,
  `number_students` int(11) NOT NULL,
  `degree_level` int(11) NOT NULL,
  `summary` varchar(2000) NOT NULL,
  `researchtitle_purposeinternship` varchar(500) NOT NULL,
  `cost_center` varchar(2000) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `country` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `tor` varchar(2000) NOT NULL,
  `expectedoutput` varchar(2000) NOT NULL,
  `suggested_ids` varchar(200) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `budget_holder` varchar(200) NOT NULL,
  `email_budget_holder` varchar(200) NOT NULL,
  `request_type` varchar(200) NOT NULL,
  `sd_unit` varchar(200) NOT NULL,
  `request_status` varchar(200) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vacancy_request`
--

INSERT INTO `vacancy_request` (`request_id`, `request_date`, `request_user`, `skills_experience`, `number_students`, `degree_level`, `summary`, `researchtitle_purposeinternship`, `cost_center`, `supervisor_id`, `country`, `region`, `tor`, `expectedoutput`, `suggested_ids`, `start_date`, `end_date`, `budget_holder`, `email_budget_holder`, `request_type`, `sd_unit`, `request_status`) VALUES
(1, '2015-01-17 11:18:17', 4, 'Web programming ,Database management\n                      ', 1, 0, 'Development of CDU SMIS\n                      ', 'Develop the system for CDU\n                      ', 'HKJHHGIUH-FDNJBNKJF-GFNJN', 4, 'Diploma', 'Diploma', 'upload previous data to the new system', 'fully operational system\n                      ', NULL, '2015-01-10', '2015-04-11', 'David Kimutai', 'dvdkimutai@gmail.com', 'fellow', 'Communication', 'processed'),
(2, '2015-02-10 10:36:28', 4, '\r\n                      programming', 2, 0, 'CDU Website\r\n                      ', 'build website\r\n                      ', '83FWEFWE-WECSD-FWDS', 4, 'Diploma', 'Diploma', '\r\n                      BUILD site \r\n', 'working website\r\n                      ', NULL, '2015-03-02', '2015-06-02', 'Griffin Muteti', 'griffinmuteti31@gmail.com', 'intern', 'Communication', 'pending'),
(3, '2015-02-10 12:39:27', 4, '\r\n                      programming', 2, 0, 'web\r\n                      ', '\r\n                      web', 'RFERF-FD', 4, 'Diploma', 'Diploma', '\r\n                      SD', '\r\n                      CS', NULL, '2015-03-05', '2015-05-07', 'Griffin Muteti', 'griffinmuteti31@gmail.com', 'intern', 'Communication', 'pending'),
(4, '2015-03-05 16:16:38', 2, '\r\n                      cdcsdvsdbasdln;lwklenfkljn', 2, 0, 'kln\r\n                      ', 'nlknjknsdj\r\n                      ', 'knkcdnsk', 2, 'Kenya', 'Headquarters', 'cdscsd\r\n                      ', 'cscss\r\n                      ', NULL, '2015-03-05', '2015-04-02', 'dasmdalm', 'masklc@gmail.com', 'fellow', 'Communication', 'pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni_student`
--
ALTER TABLE `alumni_student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
 ADD PRIMARY KEY (`contract_id`), ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `fellowship_application`
--
ALTER TABLE `fellowship_application`
 ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `internship_application`
--
ALTER TABLE `internship_application`
 ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
 ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
 ADD PRIMARY KEY (`student_id`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
 ADD PRIMARY KEY (`supervisor_id`);

--
-- Indexes for table `supervisor_allocation`
--
ALTER TABLE `supervisor_allocation`
 ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userid`), ADD UNIQUE KEY `useremail` (`useremail`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
 ADD PRIMARY KEY (`vacancy_id`), ADD UNIQUE KEY `request_id` (`request_id`);

--
-- Indexes for table `vacancy_request`
--
ALTER TABLE `vacancy_request`
 ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `fellowship_application`
--
ALTER TABLE `fellowship_application`
MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `internship_application`
--
ALTER TABLE `internship_application`
MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supervisor_allocation`
--
ALTER TABLE `supervisor_allocation`
MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
MODIFY `vacancy_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vacancy_request`
--
ALTER TABLE `vacancy_request`
MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_details`
--
ALTER TABLE `student_details`
ADD CONSTRAINT `student_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `vacancy_request` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
