-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 08:33 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `journal_name` varchar(255) NOT NULL,
  `periodical_name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dayP` varchar(255) NOT NULL,
  `monthP` varchar(255) NOT NULL,
  `yearP` varchar(255) NOT NULL,
  `pages` varchar(255) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `short_title` varchar(255) NOT NULL,
  `standard_num` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `dayACC` varchar(255) NOT NULL,
  `monthACC` varchar(255) NOT NULL,
  `yearACC` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `doi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `title`, `journal_name`, `periodical_name`, `city`, `dayP`, `monthP`, `yearP`, `pages`, `editor`, `publisher`, `edition`, `volume`, `issue`, `short_title`, `standard_num`, `comment`, `medium`, `dayACC`, `monthACC`, `yearACC`, `url`, `doi`) VALUES
(1, 'Kitty', 'Covid', '', '', '', '1', 'january', '1999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'Kitty', 'Covid', '', '', '', '1', 'january', '1999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Kitty', 'Covid', '', '', '', '1', 'january', '1999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 'Kitty', 'Covid', '', '', '', '1', 'january', '1999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `issn` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_directory` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `ref_type` varchar(100) NOT NULL,
  `paperID` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `title`, `description`, `url`, `issn`, `isbn`, `file_name`, `file_directory`, `date_create`, `ref_type`, `paperID`) VALUES
(1, 0, 'upload', 'Analyzing Complex Sentence Development', 'Analyzing Complex Sentence Development', '', '', '', 'Analyzing Complex Sentence Development.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', '0000-00-00 00:00:00', '', ''),
(2, 0, 'upload', 'Experience Teaching Emerging Information Technologies', 'Experience Teaching Emerging Information Technologies', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '0000-00-00 00:00:00', '', ''),
(3, 1, 'upload', 'Analyzing Complex Sentence Development 1 / 15', 'Analyzing Complex Sentence Development', '', '', '', 'Analyzing Complex Sentence Development.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', '0000-00-00 00:00:00', '', ''),
(4, 2, 'upload', 'Physical Science Teacher Skills in a Conceptual Explanation', 'Physical Science Teacher Skills in a Conceptual ExplanationPhysical Science Teacher Skills in a Conceptual Explanation', '', '', '', 'Physical Science Teacher Skills in a Conceptual Explanation.pdf', '../uploads/Physical Science Teacher Skills in a Conceptual Explanation.pdf', '0000-00-00 00:00:00', '', ''),
(5, 1, 'upload', 'Experience Teaching Emerging Information Technologies', 'Experience Teaching Emerging Information Technologies', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '0000-00-00 00:00:00', '', ''),
(6, 1, 'upload', 'Physical Science Teacher Skills in a Conceptual Explanation', 'Physical Science Teacher Skills in\na Conceptual Explanation', '', '', '', 'Physical Science Teacher Skills in a Conceptual Explanation.pdf', '../uploads/Physical Science Teacher Skills in a Conceptual Explanation.pdf', '2020-11-27 16:34:41', '', ''),
(7, 1, 'upload', 'Experience Teaching Emerging', 'Experience Teaching Emerging', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '2020-11-27 16:43:21', '', ''),
(8, 1, 'upload', 'Experience Teaching Emerging Information Technologies', 'Experience Teaching Emerging Information Technologies', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '2020-11-27 16:44:30', '', ''),
(9, 1, 'upload', 'Abstract This paper discusses', 'Abstract\nThis paper discusses our experiences teaching a doctoral-level course in emerging information technologies. The concept of emerging technologies is put into context by describing the technology life cycle.\nThe emerging information', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '2020-11-27 16:48:59', '', ''),
(10, 1, 'upload', 'The rapid digitization of our world', 'The rapid digitization of our world', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '2020-11-27 16:55:22', '', ''),
(11, 1, 'upload', 'Given the pervasiveness of many of these technologies and the rapid', 'Given the pervasiveness of many of these technologies and the rapid', '', '', '', 'Experience Teaching Emerging Information Technologies.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', '2020-11-27 16:56:53', '-', ''),
(12, 1, 'upload', 'Physical Science Teacher Skills in a Conceptual Explanation', 'Physical Science Teacher Skills in\na Conceptual Explanation', '', '', '', 'Physical Science Teacher Skills in a Conceptual Explanation.pdf', '../uploads/Physical Science Teacher Skills in a Conceptual Explanation.pdf', '2020-11-27 16:58:34', '-', '-'),
(13, 1, 'upload', 'In this follow-up study, 973 members of the American School Counselor', 'Keywords: technology, school counseling, trends', 'https://www.tandfonline.com/doi/full/10.1080/1358684X.2020.1777533', 'EJ123456', '123456789', 'Technology Trends in School Counseling.pdf', '../uploads/Technology Trends in School Counseling.pdf', '2020-11-27 21:18:37', '-', '-'),
(14, 1, 'search', 'A Distance Learning Enzyme Assay and Kinetics Laboratory in the Time of COVID-19', 'This article describes a straightforward approach to deliver an enzyme assay and kinetics laboratory via online delivery methods in the time of COVID-19.', 'http://dx.doi.org/10.1002/bmb.21364', 'ISSN-1470-8175', '', '-', '-', '2020-11-27 21:28:27', '-', 'EJ1270062');

-- --------------------------------------------------------

--
-- Table structure for table `search`
--

CREATE TABLE `search` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_directory` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `search`
--

INSERT INTO `search` (`id`, `file_name`, `file_directory`, `title`, `description`, `url`, `keyword`, `date_create`, `last_update`, `user_id`) VALUES
(2, '5admin1610351099.pdf', '../uploads/Rank-Shift of Compound Complex Sentence.pdf', 'การวิเคราะห์อันดับในการแปลประโยคความรวมความซ้อน', 'รูปแบบการจัดอันดับการแปลประโยคความรวมความซ้อน คือ ประโยคใจความเดียว ประโยคใจความรวม ประโยคใจความซ้อน และประโยคความรวมความซ้อน \n1. ประโยคใจความรวม ประกอบไปด้วยประโยคที่มีใจความสมบูรณ์ตั้งแต่สองประโยคขึ้นไป โดยมี for, and, nor, but, or ,yet, so เป็นตัวเชื่อมแต่ละประโยคเข้าด้วยกัน \nตัวอย่างประโยคใจความรวม He left, and I never saw him again. จากตัวอย่างนี้สามารถแยกเป็นประโยคที่มีใจความสมบูรณ์ออกเป็นสองประโยค คือ He left และ I never saw him again โดยมี and เป็นคำเชื่อมสองประโยคเข้าด้วยกัน\n2. ประโยคใจความซ้อน ประกอบไปด้วยประโยคที่มีใจความสมบูรณ์หนึ่งประโยค และประโยคที่มีใจความไม่สมบูรณ์หนึ่งประโยคหรือมากกว่าหนึ่งประโยคขึ้นไป\nตัวอย่างประโยคใจความซ้อน Juan and Maria went to the movies after they finished studying. จากตัวอย่างสามารถแยกเป็นประโยคที่มีใจความสมบูรณ์ คือ Juan and Maria went to the movies และประโยคที่มีใจความไม่สมบูรณ์ คือ after they finished studying \n3. ประโยคความรวมความซ้อน ประกอบไปด้วยประโยคที่มีใจความสมบูรณ์ตั้งแต่สองประโยคขึ้นไป โดยมี for, and, nor, but, or ,yet, so เป็นคำเชื่อมอยู่ในประโยคตั้งแต่หนึ่งคำขึ้นไป และมีประโยคใจความไม่สมบูรณ์หนึ่งประโยคหรือมากกว่าหนึ่งประโยคขึ้นไป\nตัวอย่างประโยคความรวมความซ้อน Marie reads novels and Megan reads poetry, but Heather reads magazines because novels and poetry are too difficult.', 'http://www.mdpi.com/journal/education', 'Compound Complex Sentence โควิด', '2021-01-11 14:44:59', '2021-03-26 12:53:12', 5),
(5, 'Physical Science Teacher Skills in a Conceptual Explanation.pdf', '../uploads/Education and the COVID-19 pandemic.pdf', 'Education and the COVID‑19', 'The COVID-19 pandemic is a huge challenge to education systems. This Viewpoint ofers guidance to teachers, institutional heads, and ofcials on addressing the crisis.\nWhat preparations should institutions make in the short time available and how do they\naddress students’ needs by level and feld of study? Reassuring students and parents is a\nvital element of institutional response. In ramping up capacity to teach remotely, schools\nand colleges should take advantage of asynchronous learning, which works best in digital\nformats. As well as the normal classroom subjects, teaching should include varied assignments and work that puts COVID-19 in a global and historical context. When constructing\ncurricula, designing student assessment frst helps teachers to focus. Finally, this Viewpoint\nsuggests fexible ways to repair the damage to students’ learning trajectories once the pandemic is over and gives a list of resources', '', '', '2021-01-11 15:08:27', '2021-03-24 11:10:24', 1),
(7, '1testing1610353163.pdf', '../uploads/Physical Science Teacher Skills in a Conceptual Explanation.pdf', 'Physical Science Teacher', 'There is a long history of philosophical inquiry into the concept of explanation in science,\nand this work has some implications for the ways in which science teachers, particularly in the\nphysical sciences (physics and chemistry), explain ideas to students. Recent work has outlined\na constructivist approach to developing, delivering, and refining explanations focused on enhancing\nstudent’s understanding of the powerful concepts of science. This paper reviews the history of\nconcepts of explanation in science and in science teaching, and reports research findings that describe\nsome ways in which science teachers have been observed to explain ideas in Year 11 Physics classrooms\nin Australia and Canada.', 'http://www.mdpi.com/journal/education', 'Physical', '2021-01-11 15:19:23', '2021-03-24 11:00:23', 1),
(13, '5admin1613627126.pdf', '../uploads/Technology Trends in School Counseling.pdf', 'Technology Trends in School Counseling', 'In this follow-up study 973 members of the American School Counselor Association(ASCA) were surveyed regarding their use of technology in day-to-day counseling\nactivities. School counselor use of technology for student planning purposes has\nincreased over time, while its use in responsive services has not changed significantly.\nCounselors now answer email and respond to non-urgent messages outside of work\nhours less frequently. The authors discuss implications for the future role of technology\nin school counseling.', '', 'technology, school counseling, trends', '2021-02-18 12:45:26', '2021-03-26 01:44:29', 5),
(14, '1testing1614789299.pdf', '../uploads/Education and the COVID-19 pandemic.pdf', 'Education and the COVID‑19 pandemic', 'The last 50 years have seen huge growth worldwide in the provision of education', 'https://doi.org/10.1007/s11125-020-09464-3', 'COVID-19 · pandemic · crisis', '2021-03-03 23:34:59', '2021-03-24 11:00:50', 1),
(15, '1testing1615476849.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', 'Emerging Information', 'This paper discusses our experiences teaching a doctoral-level course in emerging information technologies. The concept of emerging technologies is put into context by describing the technology life cycle.\nThe emerging information technologies of current interest – Artificial Intelligence and related area', '', 'Experience', '2021-03-11 22:34:09', '2021-03-24 01:12:03', 1),
(17, '5admin1615866588.', '', 'การสร้างโมเดลข้อความด้วย RNN', 'งานวิจัยเกี่ยวกับการสร้างโมเดลทำนายคำด้วย RNN', '', 'RNN, language modeling', '2021-03-16 10:49:48', '2021-03-16 10:49:48', 5),
(21, '1testing1616037878.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Complex Sentence', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.\nThis Book Chapter is brought to you for free and open access by the Communication Disorders at\nDigitalCommons@SHU. It has been accepted for inclusion in Communication', 'https://digitalcommons.sacredheart.edu/speech_fac?utm_source=digitalcommons.sacredheart.edu%2Fspeech_fac%2F57&utm_medium=PDF&utm_campaign=PDFCoverPages', '', '2021-03-18 10:24:38', '2021-03-23 22:25:54', 1),
(24, '8wissuta1616341409.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence Development', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.\nThis Book Chapter is brought to you for free and open access by the Communication Disorders at\nDigitalCommons@SHU. It has been accepted for inclusion in Communication Disorders Fac', '', '', '2021-03-21 22:43:29', '2021-03-21 22:46:02', 8),
(25, '21sawaddee1616390317.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence Development', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.\nThis Book Chapter is brought to you for free and open access by the Communication Disorders at\nDigitalCommons@SHU. It has been accepted for inclusion in Communication Disorders Facul', '', '', '2021-03-22 12:18:37', '2021-03-22 12:18:50', 21),
(27, '22sawaddee1616400911.pdf', '../uploads/Rank-Shift of Compound Complex Sentence.pdf', 'Compound Complex Sentence Translation', 'The focus of the research is to describe the rank-shift of compound complex sentence translation in Harry Potter\nand the Orde of the Phoenix novel translation by Listiana Srisanti and also to describe the accuracy of those\ntranslation. This research belongs to qualitative descriptive research which document and informants are being\nthe main sources data. The research findings are as follow. First, the form of rank-shift in the translation of\ncompound complex sentences are: simple sentence, compound sentence, complex sentence and compound\ncomplex sentence. Second, the accuracy of translation is classified into three, namely: very accurate translation,\naccurate translation and inaccurate translation with percentage 31 sentences (62%) belong to very accurate\ntranslation, 16 sentences (32%) belong to accurate translation and 3 sentences (6%) belong to inaccurate\ntranslation.', '', '', '2021-03-22 15:15:11', '2021-03-22 15:15:24', 22),
(28, '24sawaddee1616403432.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence Development', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.\nThis Book Chapter is brought to you for free and open access by the Communication Disorders at\nDigitalCommons@SHU. It has been accepted for inclusion in Communication Disorders Faculty Publications by an\nauthorized administrator of DigitalCommons@SHU. For more information, please contact', 'https://digitalcommons.sacredheart.edu/speech_fac?utm_source=digitalcommons.sacredheart.edu%2Fspeech_fac%2F57&utm_medium=PDF&utm_campaign=PDFCoverPages', '', '2021-03-22 15:57:12', '2021-03-22 15:57:12', 24),
(29, '24sawaddee1616403446.pdf', '../uploads/Education and the COVID-19 pandemic.pdf', 'Education and the COVID‑19 pandemic', 'The COVID-19 pandemic is a huge challenge to education systems. This Viewpoint ofers guidance to teachers, institutional heads, and ofcials on addressing the crisis.\nWhat preparations should institutions make in the short time available and how do they\naddress students’ needs by level and feld of study? Reassuring students and parents is a\nvital element of institutional response. In ramping up capacity to teach remotely, schools\nand colleges should take advantage of asynchronous learning, which works best in digital\nformats. As well as the normal classroom subjects, teaching should include varied assignments and work that puts COVID-19 in a global and historical context. When constructing\ncurricula, designing student assessment frst helps teachers to focus. Finally, this Viewpoint\nsuggests fexible ways to repair the damage to', '', '', '2021-03-22 15:57:26', '2021-03-22 15:58:42', 24),
(30, '24sawaddee1616403470.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', 'Experience Teaching Emerging Information Technologies', 'This paper discusses our experiences teaching a doctoral-level course in emerging information technologies. The concept of emerging technologies is put into context by describing the technology life cycle.\nThe emerging information technologies of current interest – Artificial Intelligence and related areas,\nCollective Human-Computer Intelligence, Blockchain, Quantum Computing, Cybersecurity, Biometrics,\nand Internet Platform Businesses – are described and the distinctions among them explained. We conclude that teaching emerging information technologies is an area rich with opportunity for growth.', '', '', '2021-03-22 15:57:50', '2021-03-22 15:57:50', 24),
(31, '24sawaddee1616403496.pdf', '../uploads/Interim Guidance for COVID-19 Prevention and Control in Schools.pdf', 'Interim Guidance for COVID-19', 'COVID-19\nPREVENTION AND\nCONTROL IN\nSCHOOLS', '', '', '2021-03-22 15:58:16', '2021-03-22 16:03:12', 24),
(32, '24sawaddee1616403569.pdf', '../uploads/Physical Science Teacher Skills in a Conceptual Explanation.pdf', 'Physical Science Teacher Skills', 'There is a long history of philosophical inquiry into the concept of explanation in science,\nand this work has some implications for the ways in which science teachers, particularly in the\nphysical sciences (physics and chemistry), explain ideas to students. Recent work has outlined\na constructivist approach to developing, delivering, and refining explanations focused on enhancing\nstudent’s understanding of the powerful concepts of science. This paper reviews the history of\nconcepts of explanation in science and in science teaching, and reports research findings that describe\nsome ways in which science teachers have been observed to explain ideas in Year 11 Physics classrooms\nin Australia and Canada.', '', '', '2021-03-22 15:59:29', '2021-03-22 15:59:29', 24),
(33, '24sawaddee1616403593.pdf', '../uploads/Rank-Shift of Compound Complex Sentence.pdf', 'การแยกประโยค', 'The focus of the research is to describe the rank-shift of compound complex sentence translation in Harry Potter\nand the Orde of the Phoenix novel translation by Listiana Srisanti and also to describe the accuracy of those\ntranslation. This research belongs to qualitative descriptive research which document and informants are being\nthe main sources data. The research findings are as follow. First, the form of rank-shift in the translation of\ncompound complex sentences are: simple sentence, compound sentence, complex sentence and compound\ncomplex sentence. Second, the accuracy of translation is classified into three, namely: very accurate translation,\naccurate translation and inaccurate translation with percentage 31 sentences (62%) belong to very accurate\ntranslation, 1', '', '', '2021-03-22 15:59:53', '2021-03-22 16:03:35', 24),
(34, '28sawaddee1616418884.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence Development', '', '', '', '2021-03-22 20:14:44', '2021-03-22 20:14:44', 28),
(35, '29sawaddee1616419126.pdf', '../uploads/Rank-Shift of Compound Complex Sentence.pdf', 'Rank-Shift', 'The focus of the research is to describe the rank-shift of compound complex sentence translation in Harry Potter\nand the Orde of the Phoenix novel translation by Listiana Srisanti and also to describe the accuracy of those\ntranslation. This research belongs to qualitative descriptive research which document and informants are being\nthe main sources data. The research findings are as follow. First, the form of rank-shift in the translation of\ncompound complex sentences are: simple sentence, compound sentence, complex sentence and compound\ncomplex sentence. Second, the accuracy of translation is classified into three, namely: very accurate translation,\naccurate translation and inaccurate translation with percentage 31 sentences (62%) belong to very accurate\ntranslation, 16 sentences (32%) belong to accurate translation and 3 sentences (6%) belong to inaccurate\ntranslation.', '', '', '2021-03-22 20:18:46', '2021-03-22 20:19:22', 29),
(36, '29hello1616419233.pdf', '../uploads/Education and the COVID-19 pandemic.pdf', 'Education and the COVID‑19 pandemic', 'Education and the COVID‑19 pandemic', 'COVID‑19', 'https://doi.org/10.1007/s11125-020-09464-3', '2021-03-22 20:20:33', '2021-03-22 20:21:09', 29),
(37, '33sawaddee1616423917.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.\nThis Book Chapter is brought to you for free and open access by the Communication Disorders at\nDigitalCommons@SHU. It has been accepted for inclusion in Communication Disorders Fac', 'https://digitalcommons.sacredheart.edu/speech_fac?utm_source=digitalcommons.sacredheart.edu%2Fspeech_fac%2F57&utm_medium=PDF&utm_campaign=PDFCoverPages', '', '2021-03-22 21:38:37', '2021-03-22 21:39:28', 33),
(38, '34sawaddee1616424341.pdf', '../uploads/Technology Trends in School Counseling.pdf', 'Technology Trends in School Counseling', 'In this follow-up study, 973 members of the American School Counselor Association\n(ASCA) were surveyed regarding their use of technology in day-to-day counseling\nactivities. School counselor use of technology for student planning purposes has\nincreased over time, while its use in responsive services has not changed significantly.\nCounselors now answer email and respond to non-urgent messages outside of work\nhours less frequently. The authors discuss implications for the future role of technology\nin school counseling.', '', 'Keywords: technology, school counseling, trends', '2021-03-22 21:45:41', '2021-03-22 21:46:06', 34),
(39, '35hello1616424535.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence Development', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.\nThis Book Chapter is brought to you for free and open access by the Communication Disorders at\nDigitalCommons@SHU. It has been accepted for inclusion in Communication Disorders Faculty Publications by an\nauthorized administrator of DigitalCommons@SHU. For', 'https://digitalcommons.sacredheart.edu/speech_fac?utm_source=digitalcommons.sacredheart.edu%2Fspeech_fac%2F57&utm_medium=PDF&utm_campaign=PDFCoverPages', '', '2021-03-22 21:48:55', '2021-03-22 21:49:52', 35),
(49, '40hello1616610712.pdf', '../uploads/Analyzing Complex Sentence Development.pdf', 'Analyzing Complex Sentence Development', 'Recommended Citation\nPaul, R. (1981). Analyzing complex sentence development. In Jon F. Miller (Ed.). Assessing language\nproduction in children: Experimental procedures (pp. 36-71). Baltimore: University Park Press.', 'https://digitalcommons.sacredheart.edu/speech_fac', '', '2021-03-25 01:31:52', '2021-03-25 01:32:11', 40),
(50, '1testing1616676698.pdf', '../uploads/Technology Trends in School Counseling.pdf', 'school counseling', 'Technology Trends in School Counseling\nSchool counselors are increasingly encouraged by professional organizations to be informed about technology and to use software and other technological aids', '', '', '2021-03-25 19:51:38', '2021-03-25 19:52:57', 1),
(51, '1testing1616676802.pdf', '../uploads/Experience Teaching Emerging Information Technologies.pdf', 'University of North Florida', 'Our focus is on emerging and disruptive information technologies (not, for example, genetic engineering\nor additive manufacturing). We cover selected technologies based on faculty background and interests\nand potential industry collaboration. Currently, these include (1) Artificial Intelligence, Machine Learning, Deep Learning, and Neural Networks and their application, (2) Collective Human-Computer Intelligence (Malone 2018), (3) Quantum Computing (for exponential scaling in performance on important\napplications), (4) Cybersecurity and Biometrics, (5) Internet platform businesses, and (6) Blockchain (a\ndistributed ledger) and its application.', '', '', '2021-03-25 19:53:22', '2021-03-25 19:53:22', 1),
(52, '1testing1616677068.pdf', '../uploads/Interim Guidance for COVID-19 Prevention and Control in Schools.pdf', 'SCHOOL ADMINISTRATORS, TEACHERS AND STAFF', 'How can the spread of COVID-19 be\nslowed down or prevented?\nAs with other respiratory infections like the flu or the\ncommon cold, public health measures are critical to\nslow the spread of illnesses. Public health measures are\neveryday preventive actions that include:', '', '', '2021-03-25 19:57:48', '2021-03-25 19:57:48', 1),
(60, '5admin1616728853.pdf', '../uploads/Education and the COVID-19 pandemic.pdf', 'Education and the COVID‑19 pandemic', 'The COVID-19 pandemic is a huge challenge to education systems. This Viewpoint ofers guidance to teachers, institutional heads, and ofcials on addressing the crisis.\nWhat preparations should institutions make in the short time available and how do they\naddress students’ needs by level and feld of study? Reassuring students and parents is a\nvital element of institutional response. In ramping up capacity to teach remotely, schools\nand colleges should take advantage of asynchronous learning, which works best in digital\nformats. As well as the normal classroom subjects, teaching should include varied assignments and work that puts COVID-19 in a global and historical context. When constructing\ncurricula, designing student assessment frst helps teachers to focus. Finally, this Viewpoint\nsuggests fexible ways to repair the damage to students’ learning trajectories once the pandemic is over and gives a list of resources.', 'https://doi.org/10.1007/s11125-020-09464-3', 'โควิด', '2021-03-26 10:20:53', '2021-03-26 11:59:31', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'testing', 'testing@gmail.com', '96e79218965eb72c92a549dd5a330112'),
(5, 'admin', 'admin@gmail.com', '4e7ba977484556e382e03b4c69334ce1'),
(6, 'admin2', 'admin2@gmail.com', 'e3ceb5881a0a1fdaad01296d7554868d'),
(7, 'soonklang_t', 'soonklang_t@su.ac.th', '25d55ad283aa400af464c76d713c07ad'),
(8, 'wissuta', 'wissuta@hotmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2'),
(36, 'sawaddee', 'sawaddee@hotmail.com', '1bbd886460827015e5d605ed44252251'),
(40, 'hello', 'hello@hotmail.com', '1bbd886460827015e5d605ed44252251');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search`
--
ALTER TABLE `search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `search`
--
ALTER TABLE `search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
