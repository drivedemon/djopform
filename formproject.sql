-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2019 at 09:42 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `donate`
--

CREATE TABLE `donate` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `reference` text NOT NULL,
  `other` text NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `network_activity`
--

CREATE TABLE `network_activity` (
  `id` int(11) NOT NULL,
  `activity_name` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `network_activity`
--

INSERT INTO `network_activity` (`id`, `activity_name`, `other`) VALUES
(1, 'ด้านการศึกษาสามัญ', ''),
(2, 'ด้านการเรียนวิชาชีพหรือฝึกอาชีพ', ''),
(3, 'ด้านการจ้างงาน', ''),
(4, 'ด้านการฝึกงาน', ''),
(5, 'ด้านการแก้ไข บำบัด ฟื้นฟู', ''),
(6, 'ด้านที่อยู่อาศัย', ''),
(7, 'ด้านสุขภาพกาย', ''),
(8, 'ด้านสุขภาพจิต', ''),
(9, 'ด้านการติดตามหลังปอย/ติดตามตามม.๘๖', ''),
(10, 'ด้านป้องกันการกระทำผิดกฎหมาย', ''),
(11, 'ด้านการสงเคราะห์ช่วยเหลือ', ''),
(12, 'อื่นๆโปรดระบุ', '');

-- --------------------------------------------------------

--
-- Table structure for table `network_detail`
--

CREATE TABLE `network_detail` (
  `id` int(11) NOT NULL,
  `year` text,
  `month` text,
  `user_id` text,
  `network_name` text,
  `address` text,
  `history` text,
  `date_activity` date DEFAULT NULL,
  `network_type` text,
  `network_activity` text,
  `valuation` text,
  `status_juvenile` text,
  `problem` text,
  `network_role_description` text,
  `recording_agreement` text,
  `ministry` text,
  `institution` text,
  `network_result` text,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `network_detail`
--

INSERT INTO `network_detail` (`id`, `year`, `month`, `user_id`, `network_name`, `address`, `history`, `date_activity`, `network_type`, `network_activity`, `valuation`, `status_juvenile`, `problem`, `network_role_description`, `recording_agreement`, `ministry`, `institution`, `network_result`, `create_date`, `update_date`) VALUES
(15, '2560', 'มีนาคม', '91', 'มูลนิธิ องค์กรเอกชน(NGO)', '95/24 หมู่ที่ 6 ซอยกระทุ่มล้ม18 ถนน พุทธมณฑลสาย 4 ตำบล กระทุ่มล้ม อำเภอ สามพราน นครปฐม 73220', '1', '2018-03-19', 'a:3:{i:0;s:1:\"2\";i:1;a:1:{i:0;s:2:\"15\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:4:{i:0;s:1:\"2\";i:1;s:1:\"3\";i:2;s:1:\"4\";i:3;s:1:\"5\";}i:1;s:0:\"\";}', 'a:1:{i:0;a:5:{i:0;s:1:\"1\";s:6:\"amount\";s:1:\"1\";s:9:\"reference\";a:1:{i:0;s:1:\"2\";}s:5:\"other\";s:0:\"\";s:18:\"evaluation_details\";s:7:\"kjkkkkj\";}}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'jjjjjjj', NULL, 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"23\";i:2;s:0:\"\";}', 'a:2:{i:0;s:57:\"ศูยย์ฝึกฯนครราชสีมา\";i:1;s:45:\"ศูนย์ฝึกราชบุรี\";}', '2', '2019-02-05 15:12:56', '2019-04-03 10:09:37'),
(75, '2558', 'กันยายน', '2', 'cvcv', 'vcvccvvcvcvcvะะะะ', '1', '2019-03-04', 'a:3:{i:0;s:1:\"1\";i:1;a:1:{i:0;s:1:\"1\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:5:{i:0;s:1:\"1\";s:6:\"amount\";s:1:\"2\";s:9:\"reference\";a:1:{i:0;s:1:\"2\";}s:5:\"other\";s:0:\"\";s:18:\"evaluation_details\";s:11:\"sadasdsasda\";}i:1;a:5:{i:0;s:1:\"4\";s:9:\"residence\";a:2:{s:9:\"child_num\";s:1:\"6\";s:5:\"value\";s:1:\"6\";}s:9:\"reference\";a:1:{i:0;s:1:\"4\";}s:8:\"other7_4\";s:0:\"\";s:18:\"evaluation_details\";s:11:\"ddsdsdsdsds\";}}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'asdsasaddas', 'เอกสาร2301192019.pdf', 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"16\";i:2;s:0:\"\";}', 'a:1:{i:0;s:6:\"asdsad\";}', '1', '2019-03-12 15:08:12', '2019-04-09 13:51:41'),
(77, '2558', 'กันยายน', '2', 'Test Co. ltd', 'ooooooooooooooooooooooooooooldddsaพพพ', '1', '2019-03-05', 'a:3:{i:0;s:1:\"2\";i:1;a:1:{i:0;s:2:\"12\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:2:{i:0;s:1:\"2\";i:1;s:1:\"9\";}i:1;s:0:\"\";}', 'a:1:{i:0;a:6:{i:0;s:1:\"3\";s:8:\"material\";a:3:{s:13:\"material_name\";s:4:\"oaoq\";s:6:\"amount\";s:2:\"12\";s:5:\"value\";s:2:\"12\";}s:16:\"banned_materials\";a:2:{s:6:\"amount\";s:4:\"6576\";s:5:\"value\";s:4:\"6576\";}s:9:\"reference\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}s:8:\"other7_3\";s:0:\"\";s:18:\"evaluation_details\";s:6:\"qw3wqw\";}}', 'a:2:{i:0;a:1:{i:0;s:1:\"6\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}i:1;s:0:\"\";}', 'fdddddddddddd', NULL, NULL, NULL, NULL, '2019-03-13 09:56:12', '2019-04-09 13:51:07'),
(82, '2558', 'กันยายน', '2', 'CDG co.ltd', 'alsdkasldkasipduadhjjakdjkajkajkdasadjkadsass', '1', '2019-03-20', 'a:3:{i:0;s:1:\"2\";i:1;a:1:{i:0;s:2:\"17\";}i:2;s:6:\"ffffff\";}', 'a:2:{i:0;a:4:{i:0;s:1:\"1\";i:1;s:1:\"7\";i:2;s:1:\"8\";i:3;s:2:\"12\";}i:1;s:6:\"uuuuuu\";}', 'a:3:{i:0;a:5:{i:0;s:1:\"1\";s:6:\"amount\";s:2:\"12\";s:9:\"reference\";a:4:{i:0;s:1:\"2\";i:1;s:1:\"4\";i:2;s:1:\"5\";i:3;s:1:\"6\";}s:5:\"other\";s:4:\"wwww\";s:18:\"evaluation_details\";s:6:\"qqqqqq\";}i:1;a:5:{i:0;s:1:\"2\";s:8:\"lecturer\";a:4:{s:6:\"amount\";s:2:\"23\";s:5:\"value\";s:2:\"23\";s:4:\"time\";s:2:\"23\";s:9:\"child_num\";s:2:\"23\";}s:9:\"reference\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"2\";}s:8:\"other7_2\";s:0:\"\";s:18:\"evaluation_details\";s:10:\"rtrttrtrtr\";}i:2;a:2:{i:0;s:1:\"5\";s:7:\"statute\";a:5:{s:9:\"child_num\";s:3:\"111\";s:4:\"time\";s:1:\"2\";s:5:\"value\";s:3:\"111\";s:9:\"reference\";a:1:{i:0;s:1:\"1\";}s:10:\"other7_5_2\";s:0:\"\";}}}', 'a:2:{i:0;a:2:{i:0;s:1:\"3\";i:1;s:1:\"6\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:2:{i:0;s:1:\"1\";i:1;s:1:\"4\";}i:1;s:0:\"\";}', 'gfggfgffggffgfg', NULL, NULL, NULL, NULL, '2019-03-21 11:46:50', '2019-04-10 11:05:22'),
(83, '2558', 'เมษายน', '2', 'test4.Co ltd', 'dssssssssssssssssss', '1', '2019-04-03', 'a:3:{i:0;s:1:\"1\";i:1;a:1:{i:0;s:1:\"1\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:1:{i:0;a:2:{i:0;s:1:\"5\";s:7:\"release\";a:6:{s:11:\"center_name\";s:6:\"tr3430\";s:9:\"child_num\";s:1:\"1\";s:4:\"time\";s:1:\"1\";s:5:\"value\";s:4:\"2222\";s:9:\"reference\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"7\";}s:10:\"other7_5_1\";s:0:\"\";}}}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"7\";}i:1;s:0:\"\";}', 'ssssss', 'attachment_2019_76.pdf', NULL, NULL, NULL, '2019-04-03 10:11:18', '2019-04-10 11:01:38'),
(84, '2558', 'มกราคม', '2', 'CDGS Co.ltd', 'testtest', '3', '2019-04-03', 'a:3:{i:0;s:1:\"1\";i:1;a:1:{i:0;s:1:\"1\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:8:{i:0;s:1:\"3\";s:16:\"banned_materials\";a:2:{s:6:\"amount\";s:4:\"6576\";s:5:\"value\";s:4:\"6576\";}s:16:\"medical_services\";a:2:{s:9:\"child_num\";s:2:\"88\";s:5:\"value\";s:2:\"88\";}s:11:\"obj_medical\";a:3:{s:6:\"object\";s:15:\"sfsddsvdsvdsvsd\";s:9:\"child_num\";s:2:\"12\";s:5:\"value\";s:2:\"12\";}s:5:\"other\";a:3:{s:5:\"other\";s:6:\"qwqwqw\";s:9:\"child_num\";s:2:\"23\";s:5:\"value\";s:2:\"23\";}s:9:\"reference\";a:2:{i:0;s:1:\"2\";i:1;s:1:\"4\";}s:8:\"other7_3\";s:0:\"\";s:18:\"evaluation_details\";s:6:\"qw3wqw\";}i:1;a:3:{i:0;s:1:\"5\";s:7:\"release\";a:6:{s:11:\"center_name\";s:6:\"tr1036\";s:9:\"child_num\";s:2:\"32\";s:4:\"time\";s:1:\"1\";s:5:\"value\";s:2:\"32\";s:9:\"reference\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"6\";}s:10:\"other7_5_1\";s:6:\"wejwej\";}s:7:\"statute\";a:5:{s:9:\"child_num\";s:3:\"111\";s:4:\"time\";s:1:\"3\";s:5:\"value\";s:3:\"166\";s:9:\"reference\";a:2:{i:0;s:1:\"7\";i:1;s:1:\"6\";}s:10:\"other7_5_2\";s:24:\"หกหกหหกห\";}}}', 'a:2:{i:0;a:2:{i:0;s:1:\"7\";i:1;s:1:\"8\";}i:1;s:7:\"ssssssd\";}', 'a:2:{i:0;a:3:{i:0;s:1:\"3\";i:1;s:1:\"7\";i:2;s:2:\"10\";}i:1;s:5:\"aaaaa\";}', 'asaasssasasasaas', 'attachment_2019_64804.pdf', 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"36\";i:2;s:7:\"wewwwww\";}', 'a:3:{i:0;s:7:\"sssssss\";i:1;s:9:\"zzzzzzzzz\";i:2;s:6:\"aaaaaa\";}', '1', '2019-04-03 10:12:32', '2019-04-11 08:42:39'),
(85, '2558', 'ธันวาคม', '2', 'test 77777', 'assassasasaas', '2', '2019-04-01', 'a:3:{i:0;s:1:\"1\";i:1;a:1:{i:0;s:1:\"1\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', NULL, 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', 'test7777', NULL, 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"32\";i:2;s:0:\"\";}', 'a:1:{i:0;s:4:\"aaaa\";}', '1', '2019-04-11 09:45:33', '2019-04-11 09:45:53'),
(86, '2558', 'มกราคม', '111', 'admin', 'admin', '1', '2019-04-01', 'a:3:{i:0;s:1:\"1\";i:1;a:1:{i:0;s:1:\"1\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-04-11 10:55:29', '2019-04-11 10:55:29'),
(87, '2558', 'ธันวาคม', '999', 'superadmin', 'superadmin', '1', '2019-04-18', 'a:3:{i:0;s:1:\"2\";i:1;a:1:{i:0;s:2:\"12\";}i:2;s:0:\"\";}', 'a:2:{i:0;a:1:{i:0;s:1:\"1\";}i:1;s:0:\"\";}', NULL, NULL, NULL, NULL, NULL, 'a:3:{i:0;s:1:\"1\";i:1;s:2:\"19\";i:2;s:0:\"\";}', 'a:2:{i:0;s:5:\"sssss\";i:1;s:5:\"aaaaa\";}', '3', '2019-04-18 16:03:57', '2019-05-16 09:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `network_result`
--

CREATE TABLE `network_result` (
  `id` int(11) NOT NULL,
  `result_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `network_result`
--

INSERT INTO `network_result` (`id`, `result_name`) VALUES
(1, 'บรรลุวัตถุประสงค์ของการดำเนินงาน'),
(2, 'บรรลุวัตถุประสงค์ของการดำเนินงานแต่ไม่ครบทุกวัตถุปะสงค์'),
(3, 'ผลการดำเนินงานไม่เป็นไปตามวัตถุประสงค์');

-- --------------------------------------------------------

--
-- Table structure for table `network_type`
--

CREATE TABLE `network_type` (
  `type_id` int(1) NOT NULL,
  `type_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `network_type`
--

INSERT INTO `network_type` (`type_id`, `type_name`) VALUES
(1, 'ภาครัฐ'),
(2, 'ภาคเอกชน');

-- --------------------------------------------------------

--
-- Table structure for table `network_type_detail`
--

CREATE TABLE `network_type_detail` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `network_type_detail`
--

INSERT INTO `network_type_detail` (`id`, `name`, `other`) VALUES
(1, 'อปท.', ''),
(2, 'กพยจ.', ''),
(3, 'ยุติธรรมชุมชน.', ''),
(4, 'ยุติธรรมจังหวัด.', ''),
(5, 'กระทรวงศึกษาธิการ.', ''),
(6, 'กระทรวงแรงงาน.', ''),
(7, 'กระทรวงยุติธรรม.', ''),
(8, 'กระทรวงมหาดไทย(ไม่รวมอปท).', ''),
(9, 'กระทรวงพัฒนาสังคมและความมั่นคงของมนุษย์.', ''),
(10, 'กระทรวงสาธารณสุข.', ''),
(11, 'หน่วยงานทางศาสนา.', ''),
(12, 'บุคคล', ''),
(13, 'กรมการสงเคราะห์', ''),
(14, 'สถานประกอบการ/ห้างร้าน', ''),
(15, 'มูลนิธิ องค์กรเอกชน (NGO)', ''),
(16, 'อื่นๆโปรดระบุ', '');

-- --------------------------------------------------------

--
-- Table structure for table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation`
--

INSERT INTO `operation` (`id`, `name`, `other`) VALUES
(1, 'ข้อตกลงความร่วมมือในการให้ความช่วยเหลือเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชน กระทรวงยุติธรรม ระหว่าง กระทรวงยุติธรรม กับ 1.สำนักนายกรัฐมนตรี     2.กระทรวงเกษตรและสหกรณ์ 3.กระทรวงแรงงานและสวัสดิการสังคม 4.กระทรวงศึกษาธิการ 5.กระทรวงสาธารณสุข 6.องค์การยูนิเซฟประจำประเทศไทย 7.มูลนิธิส่งเสริมการพัฒนาบุคคล (เมอร์ซี่)', ''),
(2, 'ข้อตกลงความร่วมมือในการให้ความช่วยเหลือเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชน และศูนย์ฝึกและอบรมเด็กและเยาวชน กรมพินิจและคุ้มครองเด็กและเยาวชน กระทรวงยุติธรรมระหว่างกระทรวงยุติธรรมกับกระทรวงศึกษาธิการ ระหว่าง กระทรวงยุติธรรม กับ 1.กระทรวงศึกษาธิการ 2.ชมรมผู้สื่อข่าวในการพิทักษ์สิทธิเด็กและเยาวชนในกระบวนการยุติธรรม', ''),
(3, 'ข้อตกลงว่าด้วยความร่วมมือในการส่งเสริมศักยภาพผู้กระทำผิดและบูรณการแผนงานที่เกี่ยวข้อง ระหว่าง กระทรวงยุติธรรม กับ กรุงเทพมหานคร', ''),
(4, 'ข้อตกลงว่าด้วยความร่วมมือในการช่วยเหลือและเตรียมความพร้อมผู้กระทำผิดและผู้ถูกคุมความประพฤติที่เป็นเด็ก เยาวชน และผู้ใหญ่ในกระบวนการยุติธรรม เพื่อคืนคนดีสู่สังคมระหว่างคอมมูนิต้า อินคอนโทรกับกระทรวงยุติธรรม ระหว่าง กระทรวงยุติธรรม  กับ คอมมูนิต้าอินคอนโทร', ''),
(5, 'ข้อตกลงความร่วมมือในการปกป้องคุ้มครองเด็กติดผู้ต้องขัง ผู้ถูกควบคุม และเด็กซึ่งคลอดในระหว่างที่มารดาถูกคุมขังอยู่ในเรือนจำ สังกัดกรมราชทัณฑ์ หรือถูกควบคุมอยู่ในสถานที่ควบคุม สังกัดกรมพินิจและคุ้มครองเด็กและเยาวชน ระหว่างกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์ และกระทรวงยุติธรรม ระหว่าง กระทรวงยุติธรรม กับกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์', ''),
(6, 'บันทึกข้อตกลงความร่วมมือโดยที่การทำสมาธิเป็นการสร้างและสะสมพลังจิต ซึ่งจะก่อให้เกิดผลดีนานัปการต่อผู้ปฏิบัติโดยสม่ำเสมอ ระหว่าง กระทรวงยุติธรรม กับมูลนิธิสถาบันพลังจิตตานุภาพ หลวงพ่อวิริยังค์ สิรินธโร', ''),
(7, 'บันทึกข้อตกลงความร่วมมือ ระหว่าง กระทรวงยุติธรรม บริษัท ซีพี ออลล์ จำกัด (มหาชน) และวิทยาลัยเทคโนโลยีปัญญาภิวัฒน์', ''),
(8, 'บันทึกข้อตกลงความร่วมมือ เรื่อง โรงเรียนยุติธรรมอุปถัมภ์ ระหว่าง กระทรวงยุติธรรม กับ 1.กระทรวงศึกษาธิการ 2.กระทรวงมหาดไทย 3.กรุงเทพมหานคร', ''),
(9, 'ข้อตกลงว่าด้วยการประสานความร่วมมือด้านการพัฒนาระบบการดูแลผู้ป่วยและระบบข้อมูลการบำบัดฟื้นฟูผู้เสพ/ผู้ติดยาเสพติดของประเทศ ระหว่าง กระทรวงยุติธรรม กับ 1.กระทรวงสาธารณสุข 2.สำนักงานคณะกรรมการป้องกันและปราบปรามยาเสพติด', ''),
(10, 'ข้อตกลงความร่วมมือในการให้ความช่วยเหลือเด็กและเยาวชน ในสถานพินิจและคุ้มครองเด็กและเยาวชน กรมพินิจและคุ้มครองเด็กและเยาวชนกระทรวงยุติธรรม ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชนกระทรวงยุติธรรม กับ คณะสังคมสงเคราะห์ศาสตร์ มหาวิทยาลัย ธรรมศาสตร์', ''),
(11, 'ข้อตกลงความร่วมมือระหว่างกระทรวงวัฒนธรรมและกระทรวงยุติธรรมในการช่วยเหลือเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชน กรมพินิจและคุ้มครองเด็กและเยาวชน กระทรวงยุติธรรม ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ 1.กรมพัฒนาสังคมและสวัสดิการ 2.คณะทำงานด้านเด็ก 3.ชมรมผู้สื่อข่าวในการพิทักษ์สิทธิเด็กและเยาวชนในกระบวนการยุติธรรม', ''),
(12, 'ข้อตกลงความร่วมมือระหว่างองค์กรเครือข่ายความร่วมมือในการช่วยเหลือเด็กและเยาวชนในกระบวนการยุติธรรม ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ 1.ศาลเยาวชนและครอบครัวกลาง 2.กรมพัฒนาสังคมและสวัสดิการ 3.กรมคุมประพฤติ 4.มูลนิธิดวงประทีป 5.มูลนิธิป้องกันและปราบปรามยาเสพติด 6.มูลนิธิบ้านนกขมิ้น 7.มูลนิธิส่งเสริมการพัฒนาบุคคล 8.มูลนิธิสร้างสรรค์เด็ก', ''),
(13, 'ข้อตกลงความร่วมมือ สัญญาว่าจะให้การสนับสนุนค่าใช้จ่ายในการประกันความเสียหายตามโครงการ “ประกันความเสียหายที่เกิดจากการทำงานของเด็กและเยาวชน” ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับสมาคมชาวไทยเชื้อสายจีน', ''),
(14, 'ข้อตกลงความร่วมมือการให้ความช่วยเหลือบรรเทาทุกข์ในกระบวนการยุติธรรมให้แก่ประชาชน ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ มูลนิธิปวีณาหงสกุลเพื่อเด็กและสตรี', ''),
(15, 'บันทึกข้อตกลงความร่วมมือในการดำเนินงานโครงการนำร่องระบบเทคโนโลยีสารสนเทศกระบวนการยุติธรรมต้นแบบ ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ1.กรมการปกครอง 2.กรมคุมประพฤติ 3.กรมราชทัณฑ์ 4.สำนักงานกิจการยุติธรรม 5.สำนักงาน ป.ป.ส. 6.สำนักงานตำรวจแห่งชาติ 7.สำนักงานอัยการสูงสุด', ''),
(16, 'บันทึกข้อตกลงความร่วมมือการดูแลสุขภาวะเด็กและเยาวชนในศูนย์ฝึกและอบรมเด็กและเยาวชนแบบองค์รวม ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ1. มูลนิธิสาธารณสุขแห่งชาติ 2.ม.ธรรมศาสตร์ 3.สำนักงานกองทุนสนับสนุนการสร้างเสริมสุขภาพ', ''),
(17, 'บันทึกข้อตกลงว่าด้วยการประสานความร่วมมือในการดำเนินงานระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน และกรมสุขภาพจิต ด้านการช่วยเหลือ บำบัด แก้ไข ฟื้นฟูเด็กและเยาวชนในกระบวนการยุติธรรม ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับกรมสุขภาพจิต', ''),
(18, 'ข้อตกลงว่าด้วยความร่วมมือในการพัฒนาฝีมือแรงงานให้แก่เด็กและเยาวชนระหว่างกรมพัฒนาฝีมือแรงงานกับกรมพินิจและคุ้มครองเด็กและเยาวชน ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับกรมพัฒนาฝีมือแรงงาน', ''),
(19, 'บันทึกข้อตกลงความร่วมมือเพื่อพัฒนาการจัดการอาชีวศึกษาและขยายโอกาสทางการศึกษา ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับสำนักงานคณะกรรมการการอาชีวศึกษา', ''),
(20, 'บันทึกข้อตกลงว่าด้วยร่วมมือในการใช้ระบบผัดฟ้องทางไกลผ่านทางจอภาพ ระหว่างศาล กรมพินิจและคุ้มครองเด็กและเยาวชน กับศาลเยาวชนและครอบครัวกลาง', ''),
(21, 'บันทึกข้อตกลงความร่วมมือการดำเนินงาน “สร้างสรรค์และส่งเสริมโอกาสเพื่อคุณภาพชีวิตของเด็กและเยาวชน” ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับมูลนิธิหัวใจอาสา', ''),
(22, 'โครงการ “ให้โอกาสสร้างคน” หรือ “Young Table – Tennis Way Of Change” ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ สำนักงานโครงการส่วนพระองค์ พระเจ้า  หลานเธอ พระองค์เจ้าพัชรกิติยาภา', ''),
(23, 'บันทึกข้อตกลงความร่วมมือสนับสนุนทางวิชาการเพื่อการพิทักษ์คุ้มครองสิทธิมนุษยชนด้านเด็ก เยาวชน และครอบครัว ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับคณะมนุษยศาสตร์และสังคมศาสตร์ มหาวิทยาลัยสงขลา นครินทร์ วิทยาเขตปัตตานี', ''),
(24, 'บันทึกข้อตกลงความร่วมมือในการป้องกันปัญหาพฤติกรรมและการกระทำความผิดของเด็กและเยาวชน ระหว่างกรมพินิจและคุ้มครองเด็กและเยาวชน กับ สำนักงานคณะกรรมการการศึกษาขั้นพื้นฐาน กระทรวงศึกษาธิการ', ''),
(25, 'บันทึกข้อตกลงความร่วมมือจัดการศึกษาสายอาชีพระยะสั้น ระหว่างสถานพินิจและคุ้มราองเด็กและเยาวชนกรุงเทพมหานครกับวิทยาลัยอาชีวศึกษาเอี่ยมลออ ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับวิทยาลัยอาชีวศึกษาเอี่ยมละออ', ''),
(26, 'บันทึกข้อตกลงว่าด้วยความร่วมมือการจัดการศึกษาสำหรับเด็กและเยาวชนในสถานพินิจและคุ้มครองเด็กและเยาวชนและศูนย์ฝึกและอบรมเด็กและเยาวชน ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับสำนักงานส่งเสริมการศึกษานอกระบบและการศึกษาตามอัธยาศัย', ''),
(27, 'บันทึกข้อตกลงการผลิตช่างชำนาญงานพิเศษด้านเทคนิค ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับวิทยาลัยเทคโนโลยีชื่นชม ไทย – เยอรมัน สระบุรี', ''),
(28, 'บันทึกข้อตกลงว่าด้วยความร่วมมือการจัดการศึกษาสำหรับเด็กและเยาวชน ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับมหาวิทยาลัยรามคำแหง', ''),
(29, 'บันทึกข้อตกลงว่าด้วยความร่วมมือการจัดการศึกษาสำหรับเด็กและเยาวชน ระหว่าง มหาวิทยาลัยเทคโนโลยีราชมงคลรัตนโกสินทร์ กับ กรมพินิจและคุ้มครองเด็กและเยาวชน', ''),
(30, 'บันทึกข้อตกลงความร่วมมือระหว่าง สโมสรกีฬาบีบีจี กับ กรมพินิจฯ', ''),
(31, 'บันทึกข้อตกลงความร่วมมือเพื่อสนับสนุนการแก้ไขบำบัดฟื้นฟูและพัฒนาเด็กและเยาวชนที่เข้าสู่กระบวนการยุติธรรมผ่านการใช้กีฬาและการเล่น ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับมูลนิธิ ไร้ท์ ทู เพลย์ ประจำประเทศไทย', ''),
(32, 'บันทึกข้อตกลงความร่วมมือโครงการพัฒนาทักษะการประกอบอาชีพบาริสต้า ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับ1.มูลนิธิปั้นเด็กดี 2.วิทยาลัยอาชีวศึกษาเพชรบุรี      3.ร้านอินเนอร์ คาเฟ่ 4.ร้านกาแฟชาวดอย สาขามหาวิทยาลัยศิลปกร จ.นครปฐม', ''),
(33, 'บันทึกข้อตกลงความร่วมมือจัดทำโครงการฝึกอบรมทักษะกีฬาเทเบิลเทนนิส ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับสโมสรกีฬาบีบีจี', ''),
(34, 'บันทึกข้อตกลงความร่วมมือ โครงการพัฒนาอาชีพสำหรับเด็กและเยาวชน ระยะที่ 2 ระหว่าง กรมพินิจและคุ้มครองเด็กและเยาวชน กับองค์การแพลน อินเตอร์เนชั่นแนล ประเทศไทย', ''),
(35, 'ไม่มีที่กล่าวไปข้างต้น', ''),
(36, 'เกี่ยวข้องกับบันทึกข้อตกลงที่นอกเหนือจากที่กล่าวข้างต้น ระบุ', '');

-- --------------------------------------------------------

--
-- Table structure for table `operation_history`
--

CREATE TABLE `operation_history` (
  `id` int(11) NOT NULL,
  `history` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `operation_history`
--

INSERT INTO `operation_history` (`id`, `history`) VALUES
(1, 'เคยมีการดำเนินงานร่วมกับหน่วยงานอื่นแล้ว'),
(2, 'มีการประสานงานแล้วแต่ยังไม่มีการดำเนินงานร่วมกัน'),
(3, 'ยังไม่เคยดำเนินงานร่วมกันมาก่อน');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `id` int(11) NOT NULL,
  `problem_name` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`id`, `problem_name`, `other`) VALUES
(1, 'เด็ก/เยาวชนยากจน', ''),
(2, 'เด็ก/เยาวชนต่างชาติ', ''),
(3, 'เด็ก/เยาวชนเร่ร่อน/ไม่มีที่อยู่อาศัย', ''),
(4, 'เด็ก/เยาวชนพิการ', ''),
(5, 'เด็ก/เยาวชนตั้งครรภ์', ''),
(6, 'เด็ก/เยาวชนที่ได้รับผลกระทบจากการใช้ความรุนแรง', ''),
(7, 'เด็ก/เยาวชนที่มีปัญหาสุขภาพกาย', ''),
(8, 'เด็ก/เยาวชนที่มีปัญหาสุขภาพจิต', ''),
(9, 'เด็ก/เยาวชนกลุ่มเสี่ยง', ''),
(10, 'อื่นๆโปรดระบุ', '');

-- --------------------------------------------------------

--
-- Table structure for table `recording_agreement`
--

CREATE TABLE `recording_agreement` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recording_agreement`
--

INSERT INTO `recording_agreement` (`id`, `name`) VALUES
(1, 'ไม่มี'),
(2, 'มี');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `name`) VALUES
(1, 'รูปภาพ'),
(2, 'หนังสือประเมินราคา'),
(3, 'ใบเซ็นชื่อวิทยากร'),
(4, 'ใบเสร็จรับเงิน'),
(5, 'หนังสือตอบขอบคุณ'),
(6, 'อื่นๆโปรดระบุ'),
(7, 'แบบรายงานการติดตามฯ');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status_juvenile`
--

CREATE TABLE `status_juvenile` (
  `id` int(11) NOT NULL,
  `status_name` text NOT NULL,
  `other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_juvenile`
--

INSERT INTO `status_juvenile` (`id`, `status_name`, `other`) VALUES
(1, 'เด็ก/เยาวชนในสถานแรกรับ', ''),
(2, 'เด็ก/เยาวชนในศูนย์ฝึกและอบนม', ''),
(3, 'เด็ก/เยาวชนตาม ม.๘๖', ''),
(4, 'เด็ก/เยาวชนที่ได้รับการปล่อยตัวชั่วคราว', ''),
(5, 'เด็ก/เยาวชนที่ได้รับการปล่อยตัว', ''),
(6, 'เด็ก/เยาวชนในสถานศึกษา', ''),
(7, 'เด็ก/เยาวชนระยะเตรียมความพร้อมก่อนปล่อยตัว', ''),
(8, 'อื่นๆโปรดระบุ', '');

-- --------------------------------------------------------

--
-- Table structure for table `succor`
--

CREATE TABLE `succor` (
  `id` int(11) NOT NULL,
  `reside` text NOT NULL,
  `medical` text NOT NULL,
  `foster family` text NOT NULL,
  `foster parents` text NOT NULL,
  `employment` text NOT NULL,
  `guarantee` text NOT NULL,
  `apprentice` text NOT NULL,
  `continue study` text NOT NULL,
  `bursary` text NOT NULL,
  `other4` text NOT NULL,
  `reference` text NOT NULL,
  `other` text NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission_group` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `name`, `permission_group`, `username`, `password`) VALUES
(2, 'ผู้ตรวจราชการ', 3, 'ins101', '1234'),
(3, 'ศฝฯ หญิงบ้านปรานี', 5, 'tr1031', '1234'),
(4, 'ศฝฯ ชายบ้านกรุณา', 5, 'tr1032', '$2y$04$gD49GjKeE7ET/ifge3uKsuEaN4gpL8BCGppDFFKsCn/MSRzmdxSli'),
(5, 'ศฝฯ ชายบ้านมุทิตา', 5, 'tr1033', '$2y$04$2utN2patQGkh/tus3V4keeUd02WS4Ql192b1PvtjngKsa4fLwhm1S'),
(6, 'ศฝฯ ชายบ้านอุเบกขา', 5, 'tr1034', '$2y$04$Xg/y2JKG1zUjZuLCdxHgDuHpFab1dqQBNxkz/j8h5/n6Yt9xT.c..'),
(7, 'ศฝฯ ชายสิรินธร', 5, 'tr1035', '$2y$04$K/nowcpJtdEo5uX..zWmLeXn.ytw72gvJ90Z4wfVx/7DGdaitDmBm'),
(8, 'ศฝฯ กาญจนาภิเษก', 5, 'tr1036', '$2y$04$yk8IDNm57.Gw6.Bqe644PewLl7T8T3iFjHEgmN/W2jgROIWxuDkru'),
(9, 'ศฝฯ พระนครศรีอยุธยา', 5, 'tr1430', '$2y$04$Gs3IM4PRPgOGJyjBe6AL.O7uYe0Vy0QLtzDJnxZc4TSVh08I6uQlu'),
(10, 'สพฯ ชายบ้านเมตตา', 2, 'sp1021', '$2y$04$Bl2LjH6bs8k/lDybQ9wz5erwj7HQgmpFdohczwLkIDukQsIPrViIu'),
(11, 'สพฯ หญิงบ้านปรานี', 2, 'sp1022', '$2y$04$f5iyyoz0cCsdYkfId/uub.UPpPEgAy80XSGXyGIt86tzKIH99xCJ2'),
(12, 'สพฯ กรุงเทพมหานคร', 2, 'sp1010', '$2y$04$rfHTuq8wdNPpfzlK9CEi9O0Rx8iPOGytJ7L07DIoABijxO8DVUUeO'),
(13, 'สพฯ สมุทรปราการ', 2, 'sp1110', '$2y$04$kSL7DEZdnAuspaLPEHWUxue6Dg8n7z4IIHQcCj3b7cncVyIMMMfFy'),
(14, 'สพฯ นนทบุรี', 2, 'sp1210', '$2y$04$qMk4Buh/q66KgIPxaW1UxON9mYuVDPSmhCqiSIEIy5zQPhBMXDrV2'),
(15, 'สพฯ ปทุมธานี', 2, 'sp1310', '$2y$04$XfaYa0xX38U7yAB.M7JwquVAj3YdN0q.5ihln2/LviwpfXFvey/du'),
(16, 'สพฯ ฉะเชิงเทรา', 2, 'sp2410', '$2y$04$Xzz1BVg1aTiShlu3Clo/Z.Ga63LwcjLLw.hdPxPNjPliVJa6.BvVq'),
(17, 'สพฯ นครนายก', 2, 'sp2610', '$2y$04$/AdCi0858BvTXuaP/WwkeeJ43SMYA3E5DLG4P9Azt3F0.9qYoC1C2'),
(18, 'สพฯ ชลบุรี', 2, 'sp2010', '$2y$04$kYehy31FZ08D59VN.ELFheayprSi/Pl7/IM4Sy7TBeXd2RaJ2D7aq'),
(19, 'ศฝฯ บ้านบึง', 5, 'tr2030', '$2y$04$6rmajXmWBCnU9npSEJtTvuzWqCQ8l1uVB2BLNp2iMqF2ig5ud5PfW'),
(20, 'สพฯ ระยอง', 2, 'sp2110', '$2y$04$Oa89SXhkNgIw8fDHWwLY7OBl42gnrLzc3.ohzVpLMiTqxmZQFeZqa'),
(21, 'ศฝฯ ระยอง', 5, 'tr2130', '$2y$04$bW2ZahTsVUmSBDXcdPtQL.16JaplcsrkB29pXnSdx9dfU0deZ2vbK'),
(22, 'สพฯ จันทบุรี', 2, 'sp2210', '$2y$04$W8d9Easid61AKtjWqIEEUOLVLawFeviQv/QkBY0qtoWnfKoJVIbIa'),
(23, 'สพฯ ตราด', 2, 'sp2310', '$2y$04$mlGG7p59K2S4XsRjIShwYO.GAOOvC3bicblGUB7krIEZx98IgwcIu'),
(24, 'สพฯ ปราจีนบุรี', 2, 'sp2510', '$2y$04$bIJTkTQFmrZ/U47lu.OuBubo33Yn8EMk8m.PyJKfO1qrAKGnzf7Qu'),
(25, 'สพฯ สระแก้ว', 2, 'sp2710', '$2y$04$3R/mCMXj3cx7Wp6vwIMMhuvjwwB3QrGoNTwm7NajeLm61y6qZaNbu'),
(26, 'ศฝฯ ราชบุรี', 5, 'tr7030', '$2y$04$ltBUiUx5oJSJXd9MX33MlO16g/b50l.AbEmq9WSK/zZBYnl6utN/S'),
(27, 'สพฯ ราชบุรี', 2, 'sp7010', '$2y$04$mLacPZ5CPnT3vw.5TAx/iuMdI1KFhXLMgaShpwkgnGH6/fLJZ4.zO'),
(28, 'สพฯ กาญจนบุรี', 2, 'sp7110', '$2y$04$Ou76SPiIgS2rdyBOk3i5rO29XA/k2vI29QFglVFV/CzYv3JgEaUI6'),
(29, 'สพฯ สุพรรณบุรี', 2, 'sp7210', '$2y$04$u9UerHZv./5ACpvAyYPzJeF4ixyD1BNo/R15TwDUviKZ88i3vOFaS'),
(30, 'สพฯ นครปฐม', 2, 'sp7310', '$2y$04$4ZnUs1UX02zkko26nwFUxehk2ko50Mf.c6T8vWFL4c9tdksKghnwC'),
(31, 'สพฯ สมุทรสาคร', 2, 'sp7410', '$2y$04$Jvh.bVEEkZUY790ucnqQn.EPd/AOcqo2dx7rI8BGkrXP0VLcfnoTy'),
(32, 'สพฯ สมุทรสงคราม', 2, 'sp7510', '$2y$04$Uuc2Cqk5In/R0eYc0OcQGOhiXfc9Cv.sWq23NYAdpzsvhFvFNxwxW'),
(33, 'สพฯ เพชรบุรี', 2, 'sp7610', '$2y$04$24VPuHwEgIMthdjBkSn4r.aL5lxGSv71CA6gw.9m6060D.LY3wBoW'),
(34, 'สพฯ ประจวบคีรีขันธ์', 2, 'sp7710', '$2y$04$MM5NupzowN7zHUHM/SAD5O8LvUrO/oB/zp3GoUvQN/Lk9viCNH3Hu'),
(35, 'ศฝฯ นครราชสีมา', 5, 'tr3030', '$2y$04$Gpbg5aeOp9e8EVRzOto3.uVsZ9Mpi0msgHamAw2NlCYxVlaMTbuAW'),
(36, 'สพฯ สระบุรี', 2, 'sp1910', '$2y$04$dFXqbTAeIUklRSjEz6/rSOfpWLFPHiKUYSSpapNsmwdNDslH9pN66'),
(37, 'สพฯ นครราชสีมา', 2, 'sp3010', '$2y$04$ji7gnEXBRAOcfMyGBwV/aeGrm8Yh8d0PPCGGShwi53ki9KgT/QMy6'),
(38, 'สพฯ บุรีรัมย์', 2, 'sp3110', '$2y$04$jZcTkXycwMYqnLXk2uMj.edZV3cJb2XpDTqZthq.To09yjFi5aGgq'),
(39, 'สพฯ สุรินทร์', 2, 'sp3210', '$2y$04$3HKZjVYB4YYQBzsiCIYx3.weQETswsptxdcdolGgFB1mJxdSiDF12'),
(40, 'สพฯ ชัยภูมิ', 2, 'sp3610', '$2y$04$TmKN1JQeTvwdWUcTneJIhe0B8.N.CTZNtykv8gig3w9k5bIy.Gh6m'),
(41, 'ศฝฯ ขอนแก่น', 5, 'tr4030', '$2y$04$fJqVa3OOACnZSYWFYoDSZOuqNOPG/LcFzWKdTaTi56zfzXSnu2aYu'),
(42, 'สพฯ หนองบัวลำภู', 2, 'sp3910', '$2y$04$IdE3oqRDYOIhpOuhAWsymO38jEP5shPvZhWnhAMWtBwRB20hRM5RO'),
(43, 'สพฯ ขอนแก่น', 2, 'sp4010', '$2y$04$5/Ta/iabPb2wiIIv3/b22ueD4oZ9LXHfRMKi9QaZ0tYHi52DP3BXC'),
(44, 'สพฯ อุดรธานี', 2, 'sp4110', '$2y$04$RxXYDvlqpUUCRyFnJWAZ5ePprALBQPR3z4gz1TOMkxYGuih.B5e7m'),
(45, 'สพฯ เลย', 2, 'sp4210', '$2y$04$ugTklDc9ddkC4E78ciBBs..ThaMtuwfwKrvJ0XEg6QBDvyYDUcE3a'),
(46, 'สพฯ หนองคาย', 2, 'sp4310', '$2y$04$57qrJqFUjHRUM3OWZrAEVeYa9r9Pk38xqpE6v0o1eDaF2vnsKiGvG'),
(47, 'สพฯ มหาสารคาม', 2, 'sp4410', '$2y$04$P76giF..JDlJRW8HIA.UqeF1qh1RPxMZsL23YRiPuMAdPYVHRVLL6'),
(48, 'สพฯ ร้อยเอ็ด', 2, 'sp4510', '$2y$04$qqA3KOIH3Uso4.xbkUB91.bFh2tCCLBlg6jydyfBemu2LKCAYqbyq'),
(49, 'สพฯ กาฬสินธุ์', 2, 'sp4610', '$2y$04$e3p4McgAfNg34z3sUpk/D.LMVTs5ooFBe/M7E5hDlk4Axd02KXJyK'),
(50, 'สพฯ สกลนคร', 2, 'sp4710', '$2y$04$8WJegslqmxhCgOX.151VmOD8zdU8lzEvUmHXr86lXCDOs4Nqrr4ki'),
(51, 'สพฯ บึงกาฬ', 2, 'sp3810', '$2y$04$Ks.u0uscgaDK4q0y0OTUBebT2N.Ku49zkySzo7p/gNe0fNGKyXWMC'),
(52, 'ศฝฯ อุบลราชธานี', 5, 'tr3430', '$2y$04$e9EleL6CI/2o.qTlkxyKROLvaXXz2nj5dxbQYNzach6IMMaEL7OXK'),
(53, 'สพฯ ศรีสะเกษ', 2, 'sp3310', '$2y$04$JMRAa6SPbHgbgnMYRwnvou7aR1lBfu.YNShMzVSqWk4siJOCC9Khe'),
(54, 'สพฯ อุบลราชธานี', 2, 'sp3410', '$2y$04$gIICc0NBBRHcMgGjEvHaAuLREi5YpREiCqAYTJpOHu5yySToKyLna'),
(55, 'สพฯ ยโสธร', 2, 'sp3510', '$2y$04$C8lf7.PFTp88N5yozYXdiuGT501ZycsczTw9qeIvj8LvgrWSsJEkW'),
(56, 'สพฯ อำนาจเจริญ', 2, 'sp3710', '$2y$04$ZlWAeQQZY59j3XSG8Q6bUOhh3Aown8VxbipbbzzvNBApmOyQkNvYu'),
(57, 'สพฯ นครพนม', 2, 'sp4810', '$2y$04$JLd/E/O8BBu5BM/0vEmHlOEQG2eGGaFos69FrX398DvOPgSRP61A.'),
(58, 'สพฯ มุกดาหาร', 2, 'sp4910', '$2y$04$5KdDEMsazZOl.2Ziso5mSud8c3qDtsYGnl6JYOZGcR9w/ckYzCqoG'),
(59, 'ศฝฯ นครสวรรค์', 5, 'tr6030', '$2y$04$RrLVAcLvWem/9a3FNOR.KeCa0j7.Une4tadIGbD7tEeHgDiqQK.CK'),
(60, 'สพฯ พระนครศรีอยุธยา', 2, 'sp1410', '$2y$04$PwB3OsDcOkdAR8kszZB3Ue6/6I3ekGA2hqwa8GslffrtU64.81S5.'),
(61, 'สพฯ อ่างทอง', 2, 'sp1510', '$2y$04$nHwATdhCezc/crfQ2Wz/jO79K5mGy.eA4UiKtOBUl8U4N1Z.Tjac2'),
(62, 'สพฯ ลพบุรี', 2, 'sp1610', '$2y$04$r72XTJ7y3HutQ5TL7UB5I.VgGe1vjdqQbg/87NDoNWOy6smHYy9gW'),
(63, 'สพฯ สิงห์บุรี', 2, 'sp1710', '$2y$04$G1QVQWSA9Y/ImHDhAsTV.e0vA8N47RbEsj3yKzJeTwmp8PW1BYCNO'),
(64, 'สพฯ ชัยนาท', 2, 'sp1810', '$2y$04$4f0a5MrWpcYGcjLHA3lQIul3eAayZySzfC4jJzDZ7a.8yV2xG/iOe'),
(65, 'สพฯ นครสวรรค์', 2, 'sp6010', '$2y$04$RHK2dVPqZjVGihL5junDkeAhrF4wz/mBIzu1mBpg/Ytz3aXe3aiLu'),
(66, 'สพฯ อุทัยธานี', 2, 'sp6110', '$2y$04$7kr.nX9uHuWIsG7JMfjLzuyyl..nvktE9DmKl4Dp/F7PoMV0r0Q1.'),
(67, 'สพฯ กำแพงเพชร', 2, 'sp6210', '$2y$04$GnfhgQlQr9juMvCxTFnYm.YIbeb9DNiZbpZoEDub/RDMRek9gmM3G'),
(68, 'สพฯ ตาก', 2, 'sp6310', '$2y$04$lvY6TUUg8rZr.ArH3n70VOAp6Ms5akKl9cO4FhSfAeNMEsnzUxeR6'),
(69, 'สพฯ สุโขทัย', 2, 'sp6410', '$2y$04$RUu5PKaCuY88IOTOtyhFHuHhxmwU6oVtseCdeAaqgH8hBuD3TptBi'),
(70, 'สพฯ พิษณุโลก', 2, 'sp6510', '$2y$04$8JHMNRLPOA5Y8hYpgW8K9uRsSSI2VqEhoB/t4fp5F.I8xOhONi5pG'),
(71, 'สพฯ พิจิตร', 2, 'sp6610', '$2y$04$FKhN2MBMlY6MX1fGqEC5rOs1u.WSM36oDZvHe/y3lU1lc2inn1NUe'),
(72, 'สพฯ เพชรบูรณ์', 2, 'sp6710', '$2y$04$aNpK2LDzl5KYFW1w/ydmQ.KKoptRBKWWQppIeEECBtVP7oC20jS7u'),
(73, 'ศฝฯ เชียงใหม่', 5, 'tr5030', '$2y$04$ejoe2hEL1TE6IJJiN06GmubvPwddxjb3QzohQgm3dErMKKmM6jbYi'),
(74, 'สพฯ เชียงใหม่', 2, 'sp5010', '$2y$04$EnAM5SxJMx9Tj6Q3XMmteeBs1psljk0UwVYpkH0NRGNptWgkdgnLa'),
(75, 'สพฯ ลำพูน', 2, 'sp5110', '$2y$04$VjX.04pAX/gMt/urvYJdQOD1PsnUSv5f7PtTYQuCmFAiBKcd6DlIK'),
(76, 'สพฯ ลำปาง', 2, 'sp5210', '$2y$04$hg/NP7JezT4wpq.Ag9d3.e/zj7k9YYSUjBOX4Q6aYg7SM6AThaZ9e'),
(77, 'สพฯ อุตรดิตถ์', 2, 'sp5310', '$2y$04$btpH..S6ZoAR6eMXsj5zb.MtvkG/1W9HmW6T61cgoqefC.GbLbLfK'),
(78, 'สพฯ แพร่', 2, 'sp5410', '$2y$04$YECxh8OJccCqokAWGoBgRu25xeJL6LoZiiDhPzqMvSMnRuyOhYkxG'),
(79, 'สพฯ น่าน', 2, 'sp5510', '$2y$04$RXiab1j2f7IMyALCGMkuCOmoZmsbY1xRp/YcGv9A0b5rbQd3Z6qgK'),
(80, 'สพฯ พะเยา', 2, 'sp5610', '$2y$04$3T8xSmiBLGhychY0H5bpbOq3mQT81bZ02nw0YbU/bzF3yJxzzLyj6'),
(81, 'สพฯ เชียงราย', 2, 'sp5710', '$2y$04$9PTJsSm01Yl6jHG0xXaa9udk.7Fy1RlkEh.ktl1reFbFMllkDrwoa'),
(82, 'สพฯ แม่ฮ่องสอน', 2, 'sp5810', '$2y$04$OAPooGHmet01BzHrJfODk.9gmbLZNWVK33QA9/GNt832kGoeA8L4y'),
(83, 'ศฝฯ สุราษฎร์ธานี', 5, 'tr8430', '$2y$04$sFc5k2DH8wbm0gnljj5J..ExA5D95ZXRD02nBQhYedYumMe1IJ/VS'),
(84, 'สพฯ นครศรีธรรมราช', 2, 'sp8010', '$2y$04$3tSnDokfvBV32JSO3.U1tuxNokP6GkTR6De1DPgD.tTWzun2zmIqG'),
(85, 'สพฯ กระบี่', 2, 'sp8110', '$2y$04$2/Abw.N9ke7VmzSnP238Cu5nu5n8WM41WJ5v6YfTKp0qV4eNLkC.W'),
(86, 'สพฯ พังงา', 2, 'sp8210', '$2y$04$0fKGDu./dMx4nbkxdKVNkeNs1Z4PVH52QycKNjucIHsu1Ey2bAd32'),
(87, 'สพฯ ภูเก็ต', 2, 'sp8310', '$2y$04$5mmKDr8F3ewsoazN8lWdVuZrOzpITi31/1iIQIrQphvLe9Wbclk.6'),
(88, 'สพฯ สุราษฎร์ธานี', 2, 'sp8410', '$2y$04$HuaqT2n79iUsxQH4guWhI.g4Y78YwY7jK5XxzinTsCqDCvwvhHbvy'),
(89, 'สพฯ ระนอง', 2, 'sp8510', '$2y$04$6qFciDGzV3x4ulLPekCJge4C4eOnOclQpzQoD2aSgCrrbbD5VzNaq'),
(90, 'สพฯ ชุมพร', 2, 'sp8610', '$2y$04$NVLg5np1sRPNTLE6xC5Vxeg.lR7CoSfvg0VCHrVLIiD2LBoPcende'),
(91, 'ศฝฯ สงขลา', 5, 'tr9030', '$2y$04$h3yIZBJqTrusP0w6TL1ksO9KmK5hjKogkJUHc8llCvwuLw7zQGeOy'),
(92, 'สพฯ สงขลา', 2, 'sp9010', '$2y$04$xmXt1nalljgUPzB0I/qXNO/CGsImm7STVfY/2J.6q2jErp2ZggTSO'),
(93, 'สพฯ สตูล', 2, 'sp9110', '$2y$04$pe1KPKl3c50vfeqQr7mFyuiCajmlY4bWNkp3FBapwufnbVVuX1pj.'),
(94, 'สพฯ ตรัง', 2, 'sp9210', '$2y$04$/RlK1R7cmgUqS4v0Dl.7yuBGZJaFhh33WBH7.t0T/Z70yM7m4OtB6'),
(95, 'สพฯ พัทลุง', 2, 'sp9310', '$2y$04$0w5jwHecdHALsRptUTt1WO3LI9TCLxzQNqTJGRwFQX21FnRQXUAtu'),
(96, 'สพฯ ปัตตานี', 2, 'sp9410', '$2y$04$HUsTQ5Lf7O7NRwq/0tZAEeKV0.h6j9qGbHutH/krDEbJrYkfBbW6i'),
(97, 'สพฯ ยะลา', 2, 'sp9510', '$2y$04$hZkm7wllnfuj8uTE33zAruw5pEdqr/vioPgysjk5Ox.BdM7IuEv0G'),
(98, 'สพฯ นราธิวาส', 2, 'sp9610', '$2y$04$yq8rdONzSEpJA97aQlVBu.5D6Wml71W6yQKxPgqZFtZ8HDAncX4jG'),
(99, 'อธิบดี', 3, 'djop001', '$2y$04$6l1wdk8UUAy8yi.s0PPTPOuNy/9PiEBg8kb9c8lbguuHixBFUf596'),
(100, 'รองอธิบดี 1', 3, 'djop002', '$2y$04$6tiKD6PRT3wKVSjUWIwQ.ejykPyU2Qv5g8IVHcxvOzsAYDmeWLeX2'),
(101, 'รองอธิบดี 2', 3, 'djop003', '$2y$04$eP386AYZpSYWCihruN5WUOi9aVT3K5.9QH8008.wLWKOWxAYdSHW2'),
(102, 'รองอธิบดี 3', 3, 'djop004', '$2y$04$iMmv0ukPyCddDidMov9kEOd2K50GIeQ7AUsTfmatKmjZbvDN6eBKq'),
(103, 'ผู้ตรวจ 1', 3, 'djop005', '$2y$04$BmxmMo4ODNglyBZNzSyIzOnfKLL9V0eYg9kVt2sWiml2kDAJO3pj.'),
(104, 'ผู้ตรวจ 2', 3, 'djop006', '$2y$04$Nk1eVyh2noIitiGBuf7CbehOk2oXjaDphDPCnaPitNhava2h5WiLe'),
(105, 'ผู้ตรวจ 3', 3, 'djop007', '$2y$04$mmLVZDMaNiUjO7TUF12SHe9LuboGjHna/97wHUJ1m4mBSbiPilcU2'),
(106, 'ผู้ตรวจ 4', 3, 'djop008', '$2y$04$UhkLwIsUj1AOWsxzrUh2ueUJbPhmZ35WX/xNOqslCEW2XpNkSX9qi'),
(107, 'ผู้ตรวจ 5', 3, 'djop009', '$2y$04$L0zmM3cQy5O0ieiYXKKWF.q0hxaNmoWbqDq6xlRRU9MPD7ZphQhlu'),
(108, 'ผู้ตรวจ 6', 3, 'djop010', '$2y$04$0lHZ9WDnRP92GkVBxjj2hOBt2o57rrZvaNjluSN7PR3EEOuseBTym'),
(110, 'ศูนย์เทคโนโลยีสารสนเทศ', 4, 'jjs201', '$2y$04$i6WRHelsl1MmCpMw/XPdp.tCpK0H/5yxcq.OW58UNAJZ1bdMgT7EW'),
(111, 'admin', 4, 'jjs101', '$2y$10$tzyC2Zm.HvukmpR1.KzEW.adgoujqBoDf7jgwuF/nvt4R9HUXTgyi'),
(999, 'superadmin', 999, 'superadmin', '$2y$10$1wiKgaJeLkWroMSTrIcu/edkCSTEXnyiCMVWz.2yFTuVLbu8jhU0O');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network_activity`
--
ALTER TABLE `network_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network_detail`
--
ALTER TABLE `network_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network_result`
--
ALTER TABLE `network_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `network_type`
--
ALTER TABLE `network_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `network_type_detail`
--
ALTER TABLE `network_type_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_history`
--
ALTER TABLE `operation_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recording_agreement`
--
ALTER TABLE `recording_agreement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_juvenile`
--
ALTER TABLE `status_juvenile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `succor`
--
ALTER TABLE `succor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `network_detail`
--
ALTER TABLE `network_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
