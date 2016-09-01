-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for sar
CREATE DATABASE IF NOT EXISTS `sar` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `sar`;


-- Dumping structure for table sar.composition
CREATE TABLE IF NOT EXISTS `composition` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'For Id Composition',
  `maintitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `year` int(4) NOT NULL,
  `master_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sar.composition: 11 rows
DELETE FROM `composition`;
/*!40000 ALTER TABLE `composition` DISABLE KEYS */;
INSERT INTO `composition` (`id`, `maintitle`, `title`, `year`, `master_id`) VALUES
	(10, 'องค์ประกอบที่ F2', 'การวิจัย', 0, 3),
	(9, 'องค์ประกอบที่ F1', 'การผลิตบัณฑิต', 0, 3),
	(14, 'องค์ประกอบที่ C1', 'การกำกับมาตรฐาน', 0, 3),
	(11, 'องค์ประกอบที่ F3', 'การบริการวิชาการ', 0, 3),
	(12, 'องค์ประกอบที่ F4', 'การทำนุบำรุงศิลปะและวัฒนธรรม', 0, 3),
	(13, 'องค์ประกอบที่ F5', 'การบริหารจัดการ', 0, 3),
	(15, 'องค์ประกอบที่ C2', 'บัณฑิต', 0, 3),
	(16, 'องค์ประกอบที่ C3', 'นักศึกษา', 0, 3),
	(17, 'องค์ประกอบที่ C4', 'อาจารย์', 0, 3),
	(18, 'องค์ประกอบที่ C5 ', 'หลักสูตร การเรียนการสอน การประเมินผู้เรียน', 0, 3),
	(19, 'องค์ประกอบที่ C6', 'สิ่งสนับสนุนการเรียนรู้', 0, 3);
/*!40000 ALTER TABLE `composition` ENABLE KEYS */;


-- Dumping structure for table sar.control_sar
CREATE TABLE IF NOT EXISTS `control_sar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `master_sar_id` int(3) NOT NULL,
  `university` int(1) NOT NULL,
  `faculty` int(1) NOT NULL,
  `major` int(1) NOT NULL,
  `ref` int(1) NOT NULL,
  `C_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `U_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table sar.control_sar: ~0 rows (approximately)
DELETE FROM `control_sar`;
/*!40000 ALTER TABLE `control_sar` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_sar` ENABLE KEYS */;


-- Dumping structure for table sar.document
CREATE TABLE IF NOT EXISTS `document` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `master_id` int(11) NOT NULL DEFAULT '0',
  `create` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `docname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `link_path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `type` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `full_path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  KEY `id` (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table sar.document: ~2 rows (approximately)
DELETE FROM `document`;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`doc_id`, `user_id`, `master_id`, `create`, `docname`, `link_path`, `size`, `type`, `full_path`) VALUES
	(117, 12, 3, '2016-05-02 17:00:25', 'Doc1', 'http://localhost/SAR/upload/479a65187bf52d38a8e692f0708f10fa.pdf', '691.64', 'FILE', 'C:/xampp/htdocs/SAR/upload/479a65187bf52d38a8e692f0708f10fa.pdf'),
	(118, 12, 3, '2016-05-02 17:03:05', 'เอกสาร2', 'http://localhost/SAR/upload/e084935107a7783332c47aae4af2d502.pdf', '691.64', 'FILE', 'C:/xampp/htdocs/SAR/upload/e084935107a7783332c47aae4af2d502.pdf');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;


-- Dumping structure for table sar.doc_syn_indicator
CREATE TABLE IF NOT EXISTS `doc_syn_indicator` (
  `doc_syn_id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) DEFAULT '0',
  `docname` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `link_path` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `subindicator_id` int(11) DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`doc_syn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table sar.doc_syn_indicator: ~2 rows (approximately)
DELETE FROM `doc_syn_indicator`;
/*!40000 ALTER TABLE `doc_syn_indicator` DISABLE KEYS */;
INSERT INTO `doc_syn_indicator` (`doc_syn_id`, `doc_id`, `docname`, `link_path`, `order`, `subindicator_id`, `master_id`, `user_id`) VALUES
	(59, 117, 'Doc1', 'http://localhost/SAR/upload/479a65187bf52d38a8e692f0708f10fa.pdf', 0, 75, 3, 12),
	(60, 118, 'เอกสาร2', 'http://localhost/SAR/upload/e084935107a7783332c47aae4af2d502.pdf', 0, 75, 3, 12);
/*!40000 ALTER TABLE `doc_syn_indicator` ENABLE KEYS */;


-- Dumping structure for table sar.indicator
CREATE TABLE IF NOT EXISTS `indicator` (
  `indicator_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_num` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indicator_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `indicator_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `data_use` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `citeria` int(1) NOT NULL,
  `composition_id` int(5) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `lv3` int(1) NOT NULL DEFAULT '0',
  `lv2` int(1) NOT NULL DEFAULT '0',
  `lv1` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`indicator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sar.indicator: 47 rows
DELETE FROM `indicator`;
/*!40000 ALTER TABLE `indicator` DISABLE KEYS */;
INSERT INTO `indicator` (`indicator_id`, `indicator_num`, `indicator_title`, `indicator_type`, `year`, `data_use`, `citeria`, `composition_id`, `detail`, `lv3`, `lv2`, `lv1`) VALUES
	(19, 'aaa', 'aaa', 'aaa', 2558, '2', 0, 1, '<p>aaaa</p>\r\n', 0, 0, 0),
	(18, 'ทดสอบ2', 'ทดสอบ2', 'ทดสอบ2', 2558, '2', 0, 1, '<p>หกดฟหกดฟกด</p>\r\n', 0, 0, 0),
	(14, '1.5', 'การบริการนักศึกษาระดับปริญญาตรี', 'กระบวนการ', 2558, '3', 2, 1, '<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 1</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 2</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 3</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 4</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>1 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>2 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>3 - 4 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>5 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>6 ข้อ</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0, 0),
	(4, 'asdgasdf', 'asdgasdf', 'asdgasdf', 2558, '1', 0, 3, '<p>aasdgasdfasdf</p>\r\n', 1, 1, 1),
	(5, 'sdfsdf', 'gsdfsdfg', 'sdhsdfgsd', 2558, '1', 0, 4, '<p>fhsdfgsdfhsdfgsdfg</p>\r\n', 1, 0, 1),
	(6, 'sdfhsdfg', 'sdfhsdf', 'gsdfsfdgsdfgsd', 2558, '1', 0, 4, '<p>fgsdfgsdfgsdfg</p>\r\n', 1, 0, 1),
	(7, 'asdgasdfas', 'asdfasdf', 'asdfasdfasfdasdfasdfasdf', 2558, '1', 0, 4, '<p>asdfasdfasdf</p>\r\n', 1, 0, 1),
	(8, 'asdfasdf', 'asdfasdf', 'asdfasdfasdf', 2558, '1', 0, 5, '<p>asdfasdfasdfasdf</p>\r\n', 1, 0, 0),
	(9, '1.2', 'อาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก', 'ปัจจัยนำเข้า', 2558, '1', 2, 1, '<p><strong>เกณฑ์การประเมิน</strong></p>\r\n\r\n<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกเป็นคะแนนระหว่าง 0 &ndash; 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. เกณฑ์เฉพาะสถาบันกลุ่ม ข และ ค2</p>\r\n\r\n<p>ค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 40 ขึ้นไป&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สูตรการคำนวณ</strong></p>\r\n\r\n<p>1. คำนวณค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก ตามสูตร</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก&nbsp; x&nbsp; 100</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะทั้งหมด</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงค่าร้อยละที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;คะแนนที่ได้ =&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ร้อยละอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x&nbsp; 5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ร้อยละอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>หมายเหตุ :</p>\r\n\r\n<p>1. คุณวุฒิปริญญาเอกพิจารณาจากระดับคุณวุฒิที่ได้รับหรือเทียบเท่าตามหลักเกณฑ์การพิจารณาคุณวุฒิของกระทรวงศึกษาธิการ กรณีที่มีการปรับวุฒิการศึกษาให้มีหลักฐานการสำเร็จการศึกษาภายในรอบปีการศึกษานั้น ทั้งนี้ อาจใช้คุณวุฒิอื่นเทียบเท่าคุณวุฒิปริญญาเอกได้สำหรับกรณี ที่ บางสาขาวิชาชีพมี คุณวุฒิอื่นที่เหมาะสมกว่า ทั้งนี้ต้องได้รับความเห็นชอบจากคณะกรรมการการอุดมศึกษา</p>\r\n\r\n<p>2. การนับจำนวนอาจารย์ประจำให้นับตามปีการศึกษาและนับทั้งที่ปฏิบัติงานจริงและลาศึกษาต่อในกรณีที่มีอาจารย์บรรจุใหม่ให้คำนวณตามเกณฑ์อาจารย์ประจำที่ระบุในคำชี้แจงเกี่ยวกับการนับจำนวนอาจารย์ประจำและนักวิจัย</p>\r\n', 0, 1, 1),
	(10, 'ฟหกเฟหกเ', 'ฟหกเฟหกด', 'ฟหกดฟหกด', 2558, '1', 1, 7, '<p>ฟหกฟหกเฟหกดฟหกด</p>\r\n', 1, 0, 0),
	(11, 'asdgasd', 'asgd', 'sadg', 2558, '1', 0, 8, '<p>asdg</p>\r\n', 1, 0, 0),
	(12, '1.3', 'อาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ', 'ปัจจัยนำเข้า', 2558, '2', 2, 1, '<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการเป็นคะแนนระหว่าง 0-5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. เกณฑ์เฉพาะสถาบันกลุ่ม ข และ ค2</p>\r\n\r\n<p>ค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งผู้ช่วยศาสตราจารย์ รองศาสตราจารย์ และศาสตราจารย์รวมกัน ที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 60 ขึ้นไป</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>สูตรการคำนวณ</p>\r\n\r\n<p>1. คำนวณค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ ตามสูตร</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ &nbsp;&nbsp;x&nbsp; 100</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะทั้งหมด</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงค่าร้อยละที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>คะแนนที่ได้ =&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;x &nbsp;5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการที่กำหนดให้</p>\r\n', 0, 0, 0),
	(13, '1.4', 'จำนวนนักศึกษาเต็มเวลาเทียบเท่าต่อจำนวนอาจารย์ประจำ', 'ปัจจัยนำเข้า', 2558, '1', 2, 1, '<p>คำนวณหาค่าความแตกต่างระหว่างจำนวนนักศึกษาเต็มเวลาต่ออาจารย์ประจำกับเกณฑ์มาตรฐานและนำมาเทียบกับค่าความต่างทั้งด้านสูงกว่าหรือต่ำกว่าที่กำหนดเป็นคะแนน 0 และ 5 คะแนน และใช้การเทียบบัญญัติไตรยางศ์ดังนี้</p>\r\n\r\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานไม่เกินร้อยละ 10 กำหนดเป็นคะแนน 5</p>\r\n\r\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานตั้งแต่ร้อยละ 20 กำหนดเป็นคะแนน 0</p>\r\n\r\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานตั้งแต่ร้อยละ 10.01 และไม่เกินร้อยละ 20</p>\r\n\r\n<p>ให้นำมาเทียบบัญญัติไตรยางศ์ตามสูตรเพื่อเป็นคะแนนของหลักสูตรนั้นๆ</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 0, 0),
	(15, '1.6', 'กิจกรรมนักศึกษาระดับปริญญาตรี', 'กระบวนการ', 2558, '1', 2, 1, '<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 1</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 2</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 3</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 4</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>1 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>2 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>3 - 4 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>5 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>6 ข้อ</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0, 0),
	(16, '2.3', 'ผลงานทางวิชาการของอาจารย์ประจำและนักวิจัย', 'ผลลัพธ์', 2558, '1', 0, 2, '<p>โดยการแปลงค่าร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยเป็นคะแนนระหว่าง 0-5 เกณฑ์แบ่งกลุ่มตามสาขาวิชาดังนี้</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์และเทคโนโลยี</strong></p>\r\n\r\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 30 ขึ้นไป</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์สุขภาพ</strong></p>\r\n\r\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 30 ขึ้นไป</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชามนุษยศาสตร์และสังคมศาสตร์</strong></p>\r\n\r\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 20 ขึ้นไป</p>\r\n\r\n<p><strong>สูตรการคํานวณ</strong></p>\r\n\r\n<p>1. คํานวณค่าร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัยตามสูตร&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย&nbsp; x&nbsp; 100</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนอาจารย์ประจําและนักวิจัยทั้งหมด</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงค่าร้อยละที่คํานวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>คะแนนที่ได้ =&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย&nbsp; &nbsp;&nbsp;&nbsp;x&nbsp; 5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ที่กำหนดให้เป็นคะแนนเต็ม 5&nbsp;</p>\r\n', 1, 0, 0),
	(17, '13', 'ทดสอบ 1', 'ฟฟฟ', 2558, '1', 0, 1, '<p>ฟกหดฟดหก</p>\r\n', 1, 0, 0),
	(2, '2.1', 'ระบบและกลไกการบริหารและพัฒนางานวิจัยหรืองานสร้างสรรค์', 'กระบวนการ', 2558, '1', 1, 2, '<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 1</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 2</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 3</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 4</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>1 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>2 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>3 - 4 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>5 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>6 ข้อ</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1, 1),
	(3, '2.2', 'เงินสนับสนุนงานวิจัยและงานสร้างสรรค์', 'ปัจจัยนำเข้า', 2558, '1', 2, 2, '<p>โดยการแปลงจำนวนเงินต่อจำนวนอาจารย์ประจำและนักวิจัยประจําเป็นคะแนนระหว่าง 0 - 5</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์และเทคโนโลยี</strong></p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 60,000 บาทขึ้นไปต่อคน</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์สุขภาพ</strong></p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 50,000 บาทขึ้นไปต่อคน</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชามนุษยศาสตร์และสังคมศาสตร์</strong></p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 25,000 บาทขึ้นไปต่อคน</p>\r\n\r\n<p><strong>สูตรการคำนวณ</strong></p>\r\n\r\n<p>1. คำนวณจำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันต่อจำนวนอาจารย์ประจำและนักวิจัย</p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยฯ = &nbsp; &nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ จากภายในและภายนอก</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; จำนวนอาจารย์ประจำและนักวิจัย</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงจำนวนเงินที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>คะแนนที่ได้ = &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ จากภายในและภายนอก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;x&nbsp; 5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ ที่กำหนดให้เป็นคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สรุปคะแนนที่ได้ในระดับคณะ</strong></p>\r\n\r\n<p>คะแนนที่ได้ในระดับคณะ = ค่าเฉลี่ยของคะแนนที่ได้ของทุกกลุ่มสาขาวิชาในคณะ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>หมายเหตุ</strong></p>\r\n\r\n<p>1. จำนวนอาจารย์และนักวิจัยให้นับตามปีการศึกษา และนับเฉพาะที่ปฏิบัติงานจริง ไม่นับรวมผู้ลาศึกษาต่อ</p>\r\n\r\n<p>2. ให้นับจำนวนเงินที่มีการลงนามในสัญญารับทุนในปีการศึกษาหรือปีงบประมาณหรือปีปฏิทินนั้นๆ ไม่ใช่จำนวนเงินที่เบิกจ่ายจริง</p>\r\n\r\n<p>3. กรณีที่มีหลักฐานการแบ่งสัดส่วนเงินสนับสนุนงานวิจัยซึ่งอาจเป็นหลักฐานจากแหล่งทุนหรือหลักฐานจากการตกลงร่วมกันของสถาบันที่ร่วมโครงการ ให้แบ่งสัดสวนเงินตามหลักฐานที่ปรากฏ กรณีที่ไม่มีหลักฐาน ให้แบ่งเงินตามสัดส่วนผู้ร่วมวิจัยของแต่ละคณะ</p>\r\n\r\n<p>4. การนับจำนวนเงินสนับสนุนโครงการวิจัย สามารถนับเงินโครงการวิจัยสถาบันที่ได้ลงนามในสัญญารับทุนโดยอาจารย์ประจำหรือนักวิจัย แต่ไม่สามารถนับเงินโครงการวิจัยสถาบันที่บุคลากรสายสนับสนุนที่ไม่ใช่นักวิจัยเป็นผู้ดำเนินการ</p>\r\n', 1, 1, 1),
	(1, '1.1', 'ผลการบริหารจัดการหลักสูตรโดยรวม', 'ผลลัพธ์', 2558, '1', 2, 1, '<p><strong>เกณฑ์การประเมิน</strong></p>\r\n\r\n<p>ค่าเฉลี่ยของคะแนนประเมินทุกหลักสูตรที่คณะรับผิดชอบ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สูตรการคำนวณ</strong></p>\r\n\r\n<p>คะแนนที่ได้ =&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลรวมของค่าคะแนนประเมินของทุกหลักสูตร</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนหลักสูตรทั้งหมดที่คณะรับผิดชอบ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>หมายเหตุ : หลักสูตรที่ได้รับการรับรองโดยระบบอื่นๆ ตามที่คณะกรรมการประกันคุณภาพภายในระดับอุดมศึกษาเห็นชอบ ไม่ต้องนำคะแนนการประเมินของหลักสูตรนั้นมาคำนวณในตัวบ่งชี้นี้แต่ต้องรายงานผลการรับรองตามระบบนั้นๆ ในตัวบ่งชี้ให้ถูกต้อง</p>\r\n', 0, 1, 1),
	(20, 'asdf', 'asdfsdf', 'asdasdf', 2558, '2', 1, 1, '<p>adgasdgsd</p>\r\n', 0, 0, 0),
	(21, '1.1', '1.1 ผลการบริหารจัดการหลักสูตรโดยรวม', 'ผลลัพธ์', 2558, '1', 2, 9, '<p>ะแนนที่ได้ =&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลรวมของค่าคะแนนประเมินของทุกหลักสูตร</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนหลักสูตรทั้งหมดที่คณะรับผิดชอบ</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>หมายเหตุ : หลักสูตรที่ได้รับการรับรองโดยระบบอื่นๆ ตามที่คณะกรรมการประกันคุณภาพภายในระดับอุดมศึกษาเห็นชอบ ไม่ต้องนำคะแนนการประเมินของหลักสูตรนั้นมาคำนวณในตัวบ่งชี้นี้แต่ต้องรายงานผลการรับรองตามระบบนั้นๆ ในตัวบ่งชี้ให้ถูกต้อง</p>\n', 0, 1, 0),
	(22, '1.2', '1.2 อาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก', 'ปัจจัยนำเข้า', 2558, '1', 2, 9, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกเป็นคะแนนระหว่าง 0 &ndash; 5</p>\n\n<p>&nbsp;</p>\n\n<p>1. เกณฑ์เฉพาะสถาบันกลุ่ม ข และ ค2</p>\n\n<p>ค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 40 ขึ้นไป&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><strong>สูตรการคำนวณ</strong></p>\n\n<p>1. คำนวณค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก ตามสูตร</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก&nbsp; x&nbsp; 100</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะทั้งหมด</p>\n\n<p>&nbsp;</p>\n\n<p>2. แปลงค่าร้อยละที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;คะแนนที่ได้ =&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ร้อยละอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x&nbsp; 5</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ร้อยละอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 &nbsp;&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>หมายเหตุ :</p>\n\n<p>1. คุณวุฒิปริญญาเอกพิจารณาจากระดับคุณวุฒิที่ได้รับหรือเทียบเท่าตามหลักเกณฑ์การพิจารณาคุณวุฒิของกระทรวงศึกษาธิการ กรณีที่มีการปรับวุฒิการศึกษาให้มีหลักฐานการสำเร็จการศึกษาภายในรอบปีการศึกษานั้น ทั้งนี้ อาจใช้คุณวุฒิอื่นเทียบเท่าคุณวุฒิปริญญาเอกได้สำหรับกรณี ที่ บางสาขาวิชาชีพมี คุณวุฒิอื่นที่เหมาะสมกว่า ทั้งนี้ต้องได้รับความเห็นชอบจากคณะกรรมการการอุดมศึกษา</p>\n\n<p>2. การนับจำนวนอาจารย์ประจำให้นับตามปีการศึกษาและนับทั้งที่ปฏิบัติงานจริงและลาศึกษาต่อในกรณีที่มีอาจารย์บรรจุใหม่ให้คำนวณตามเกณฑ์อาจารย์ประจำที่ระบุในคำชี้แจงเกี่ยวกับการนับจำนวนอาจารย์ประจำและนักวิจัย</p>\n', 0, 1, 0),
	(23, '1.3', '1.3 อาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ', 'ปัจจัยนำเข้า', 2558, '1', 2, 9, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการเป็นคะแนนระหว่าง 0-5</p>\n\n<p>&nbsp;</p>\n\n<p>1. เกณฑ์เฉพาะสถาบันกลุ่ม ข และ ค2</p>\n\n<p>ค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งผู้ช่วยศาสตราจารย์ รองศาสตราจารย์ และศาสตราจารย์รวมกัน ที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 60 ขึ้นไป</p>\n\n<p>&nbsp;</p>\n\n<p>สูตรการคำนวณ</p>\n\n<p>1. คำนวณค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ ตามสูตร</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ &nbsp;&nbsp;x&nbsp; 100</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะทั้งหมด</p>\n\n<p>&nbsp;</p>\n\n<p>2. แปลงค่าร้อยละที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\n\n<p>&nbsp;</p>\n\n<p>คะแนนที่ได้ =&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;x &nbsp;5</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการที่กำหนดให้</p>\n', 0, 1, 0),
	(24, '1.4', '1.4 จำนวนนักศึกษาเต็มเวลาเทียบเท่าต่อจำนวนอาจารย์ประจำ', 'ปัจจัยนำเข้า', 2558, '1', 2, 9, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<p>คำนวณหาค่าความแตกต่างระหว่างจำนวนนักศึกษาเต็มเวลาต่ออาจารย์ประจำกับเกณฑ์มาตรฐานและนำมาเทียบกับค่าความต่างทั้งด้านสูงกว่าหรือต่ำกว่าที่กำหนดเป็นคะแนน 0 และ 5 คะแนน และใช้การเทียบบัญญัติไตรยางศ์ดังนี้</p>\n\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานไม่เกินร้อยละ 10 กำหนดเป็นคะแนน 5</p>\n\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานตั้งแต่ร้อยละ 20 กำหนดเป็นคะแนน 0</p>\n\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานตั้งแต่ร้อยละ 10.01 และไม่เกินร้อยละ 20</p>\n\n<p>ให้นำมาเทียบบัญญัติไตรยางศ์ตามสูตรเพื่อเป็นคะแนนของหลักสูตรนั้นๆ</p>\n', 0, 1, 0),
	(25, '1.5', '1.5 การบริการนักศึกษาระดับปริญญาตรี', 'กระบวนการ', 2558, '1', 1, 9, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:31px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:31px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:31px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:31px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:31px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(26, '1.6', '1.6 กิจกรรมนักศึกษาระดับปริญญาตรี', 'กระบวนการ', 2558, '1', 1, 9, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(27, '2.1', '2.1 ระบบและกลไกการบริหารและพัฒนางานวิจัยหรืองานสร้างสรรค์', 'กระบวนการ', 2558, '1', 1, 10, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 ข้อ</p>\n\n			<p>&nbsp;</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(28, '2.2', '2.2 เงินสนับสนุนงานวิจัยและงานสร้างสรรค์', 'ปัจจัยนำเข้า', 2558, '1', 2, 10, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<p>โดยการแปลงจำนวนเงินต่อจำนวนอาจารย์ประจำและนักวิจัยประจําเป็นคะแนนระหว่าง 0 - 5</p>\n\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์และเทคโนโลยี</strong></p>\n\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 60,000 บาทขึ้นไปต่อคน</p>\n\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์สุขภาพ</strong></p>\n\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 50,000 บาทขึ้นไปต่อคน</p>\n\n<p><strong>กลุ่มสาขาวิชามนุษยศาสตร์และสังคมศาสตร์</strong></p>\n\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 25,000 บาทขึ้นไปต่อคน</p>\n\n<p><strong>สูตรการคำนวณ</strong></p>\n\n<p>1. คำนวณจำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันต่อจำนวนอาจารย์ประจำและนักวิจัย</p>\n\n<p>จำนวนเงินสนับสนุนงานวิจัยฯ = &nbsp; &nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ จากภายในและภายนอก</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; จำนวนอาจารย์ประจำและนักวิจัย</p>\n\n<p>&nbsp;</p>\n\n<p>2. แปลงจำนวนเงินที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\n\n<p>&nbsp;</p>\n\n<p>คะแนนที่ได้ = &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ จากภายในและภายนอก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;x&nbsp; 5</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ ที่กำหนดให้เป็นคะแนนเต็ม 5</p>\n\n<p>&nbsp;</p>\n\n<p><strong>สรุปคะแนนที่ได้ในระดับคณะ</strong></p>\n\n<p>คะแนนที่ได้ในระดับคณะ = ค่าเฉลี่ยของคะแนนที่ได้ของทุกกลุ่มสาขาวิชาในคณะ</p>\n\n<p>&nbsp;</p>\n\n<p><strong>หมายเหตุ</strong></p>\n\n<p>1. จำนวนอาจารย์และนักวิจัยให้นับตามปีการศึกษา และนับเฉพาะที่ปฏิบัติงานจริง ไม่นับรวมผู้ลาศึกษาต่อ</p>\n\n<p>2. ให้นับจำนวนเงินที่มีการลงนามในสัญญารับทุนในปีการศึกษาหรือปีงบประมาณหรือปีปฏิทินนั้นๆ ไม่ใช่จำนวนเงินที่เบิกจ่ายจริง</p>\n\n<p>3. กรณีที่มีหลักฐานการแบ่งสัดส่วนเงินสนับสนุนงานวิจัยซึ่งอาจเป็นหลักฐานจากแหล่งทุนหรือหลักฐานจากการตกลงร่วมกันของสถาบันที่ร่วมโครงการ ให้แบ่งสัดสวนเงินตามหลักฐานที่ปรากฏ กรณีที่ไม่มีหลักฐาน ให้แบ่งเงินตามสัดส่วนผู้ร่วมวิจัยของแต่ละคณะ</p>\n\n<p>4. การนับจำนวนเงินสนับสนุนโครงการวิจัย สามารถนับเงินโครงการวิจัยสถาบันที่ได้ลงนามในสัญญารับทุนโดยอาจารย์ประจำหรือนักวิจัย แต่ไม่สามารถนับเงินโครงการวิจัยสถาบันที่บุคลากรสายสนับสนุนที่ไม่ใช่นักวิจัยเป็นผู้ดำเนินการ</p>\n', 0, 1, 0),
	(29, '2.3', '2.3 ผลงานทางวิชาการของอาจารย์ประจำและนักวิจัย', 'ผลลัพธ์', 2558, '1', 2, 10, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<p>โดยการแปลงค่าร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยเป็นคะแนนระหว่าง 0-5 เกณฑ์แบ่งกลุ่มตามสาขาวิชาดังนี้</p>\n\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์และเทคโนโลยี</strong></p>\n\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 30 ขึ้นไป</p>\n\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์สุขภาพ</strong></p>\n\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 30 ขึ้นไป</p>\n\n<p><strong>กลุ่มสาขาวิชามนุษยศาสตร์และสังคมศาสตร์</strong></p>\n\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 20 ขึ้นไป</p>\n\n<p><strong>สูตรการคํานวณ</strong></p>\n\n<p>1. คํานวณค่าร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัยตามสูตร&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย&nbsp; x&nbsp; 100</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนอาจารย์ประจําและนักวิจัยทั้งหมด</p>\n\n<p>&nbsp;</p>\n\n<p>2. แปลงค่าร้อยละที่คํานวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\n\n<p>คะแนนที่ได้ =&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย&nbsp; &nbsp;&nbsp;&nbsp;x&nbsp; 5</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย</p>\n\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ที่กำหนดให้เป็นคะแนนเต็ม 5 &nbsp;&nbsp;</p>\n', 0, 1, 0),
	(30, '3.1', '3.1 การบริการวิชาการแก่สังคม', 'กระบวนการ', 2558, '1', 1, 11, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(31, '4.1', '4.1 ระบบและกลไกการทำนุบำรุงศิลปะและวัฒนธรรม', 'กระบวนการ', 2558, '1', 1, 12, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 - 7 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(32, '5.1', '5.1 การบริหารของคณะเพื่อการกำกับติดตามผลลัพธ์ตามพันธกิจ กลุ่มสถาบันและเอกลักษณ์ของคณะ', 'กระบวนการ', 2558, '1', 1, 13, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 &ndash; 6 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>7 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(33, '5.2', '5.2 ระบบกำกับการประกันคุณภาพหลักสูตรและคณะ', 'กระบวนการ', 2558, '1', 1, 13, '<p><strong>เกณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3-4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 0, 1, 0),
	(34, '1.1 ', 'การบริหารจัดการหลักสูตรตาม เกณฑ์มาตรฐานหลักสูตรที่กำหนด โดย สกอ.', 'กระบวนการ', 2558, '1', 1, 14, '<p>ผลการบริหารจัดการหลักสูตรตามเกณฑ์มาตรฐานหลักสูตร</p>\n\n<p>ปริญญาตรี เกณฑ์ 4 ข้อ (1,2,11,12)</p>\n\n<p>บัณฑิตศึกษา เกณฑ์ 12 ข้อ</p>\n', 1, 1, 0),
	(35, '2.1', '2.1 คุณภาพบัณฑิตตามกรอบมาตรฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ', 'ผลลัพธ์', 2558, '1', 1, 15, '<p>ใช้ค่าเฉลี่ยของคะแนนประเมินบัณฑิต (คะแนนเต็ม 5)</p>\n', 1, 1, 0),
	(36, '2.2', '2.2 (ปริญญาตรี) ร้อยละของบัณฑิตปริญญาตรีที่ได้งานทำหรือประกอบอาชีพอิสระภายใน 1 ปี', 'ผลลัพธ์', 2558, '1', 1, 15, '<p>โดยการแปลงค่าร้อยละของบัณฑิตปริญญาตรีที่ได้งานทำหรือประกอบอาชีพอิสระภายใน 1 ปี เป็นคะแนนระหว่าง 0 &ndash; 5 กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 100</p>\n', 1, 1, 0),
	(37, '3.1', '3.1 การรับนักศึกษา', 'กระบวนการ', 2558, '1', 1, 16, '<p><strong>กณฑ์การประเมิน</strong></p>\n\n<table border="1" cellpadding="0" cellspacing="0">\n	<tbody>\n		<tr>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 1</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 2</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 3</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 4</p>\n			</td>\n			<td style="height:28px; width:128px">\n			<p>คะแนน 5</p>\n			</td>\n		</tr>\n		<tr>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>1 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>2 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>3 - 4 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>5 ข้อ</p>\n			</td>\n			<td style="width:128px">\n			<p>มีการดำเนินการ</p>\n\n			<p>6 ข้อ</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n', 1, 1, 0),
	(38, '3.2', '3.2 การส่งเสริมและพัฒนานักศึกษา', 'กระบวนการ', 2558, '1', 1, 16, '', 1, 1, 0),
	(39, '3.3', '3.3 ผลที่เกิดกับนักศึกษา', 'กระบวนการ', 2558, '1', 1, 16, '', 1, 1, 0),
	(40, '4.1', '4.1 การบริหารและพัฒนาอาจารย์', 'กระบวนการ', 2558, '1', 1, 17, '', 1, 1, 0),
	(41, '4.2', '4.2 คุณภาพอาจารย์', 'ปัจจัยนำเข้า', 2558, '1', 1, 17, '<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำหลักสูตรที่มีคุณวุฒิปริญญาเอกเป็นคะแนนระหว่าง 0 &ndash; 5</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>หลักสูตรระดับปริญญาตรี&nbsp;</strong>&nbsp;&nbsp;</p>\n\n<p>ค่าร้อยละของอาจารย์ประจำหลักสูตรที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 20 ขึ้นไป</p>\n\n<p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; หลักสูตรระดับปริญญาโท</strong>&nbsp;</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ค่าร้อยละของอาจารย์ประจำหลักสูตรที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 60 ขึ้นไป</p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>หลักสูตรระดับปริญญาเอก</strong></p>\n\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ค่าร้อยละของอาจารย์ประจำหลักสูตรที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 100 &nbsp;</p>\n', 1, 1, 0),
	(42, '4.3', '4.3 ผลที่เกิดกับอาจารย์', 'ผลลัพธ์', 2558, '1', 1, 17, '', 1, 1, 0),
	(43, '5.1', '5.1 สาระของรายวิชาในหลักสูตร', 'กระบวนการ', 2558, '1', 1, 18, '', 1, 1, 0),
	(44, '5.2', ' 5.2 การวางระบบผู้สอนและกระบวนการจัดการเรียนการสอน', 'กระบวนการ', 2558, '1', 1, 18, '', 1, 1, 0),
	(45, '5.3', '5.3 การประเมินผู้เรียน : ปีการศึกษา ', 'กระบวนการ', 2558, '1', 1, 18, '', 1, 1, 0),
	(46, '5.4', '5.4 ผลการดำเนินงานหลักสูตรตามกรอบมาตรฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ ', 'ผลลัพธ์', 2558, '1', 1, 18, '<p>มีการดำเนินงานน้อยกว่าร้อยละ 80 ของตัวบ่งชี้ผลการดำเนินงานที่ระบุไว้ในแต่ละปี มีค่าคะแนนเท่ากับ 0</p>\n\n<p>มีการดำเนินงานร้อยละ 80 ของตัวบ่งชี้ผลการดำเนินงานที่ระบุไว้ในแต่ละปี มีค่าคะแนนเท่ากับ 3.50</p>\n\n<p>มีการดำเนินงานร้อยละ 80.01-89.99 ของตัวบ่งชี้ผลการดำเนินงานที่ระบุไว้ในแต่ละปี มีค่าคะแนนเท่ากับ 4.00</p>\n\n<p>มีการดำเนินงานร้อยละ 90.00-94.99 ของตัวบ่งชี้ผลการดำเนินงานที่ระบุไว้ในแต่ละปี มีค่าคะแนนเท่ากับ 4.50</p>\n\n<p>มีการดำเนินงานร้อยละ 95.00-99.99 ของตัวบ่งชี้ผลการดำเนินงานที่ระบุไว้ในแต่ละปี มีค่าคะแนนเท่ากับ 4.75</p>\n\n<p>มีการดำเนินงานร้อยละ 100 ของตัวบ่งชี้ผลการดำเนินงานที่ระบุไว้ในแต่ละปี มีค่าคะแนนเท่ากับ 5</p>\n', 1, 1, 0),
	(47, '6.1', '6.1 สิ่งสนับสนุนการเรียนรู้', 'กระบวนการ', 2558, '1', 1, 19, '', 1, 1, 1);
/*!40000 ALTER TABLE `indicator` ENABLE KEYS */;


-- Dumping structure for table sar.map_user_to_ref
CREATE TABLE IF NOT EXISTS `map_user_to_ref` (
  `user_id` int(11) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table sar.map_user_to_ref: ~85 rows (approximately)
DELETE FROM `map_user_to_ref`;
/*!40000 ALTER TABLE `map_user_to_ref` DISABLE KEYS */;
INSERT INTO `map_user_to_ref` (`user_id`, `ref_id`) VALUES
	(3, 6),
	(4, 6),
	(5, 6),
	(6, 6),
	(8, 6),
	(9, 6),
	(10, 6),
	(11, 6),
	(53, 6),
	(12, 6),
	(13, 6),
	(14, 6),
	(50, 6),
	(54, 6),
	(7, 5),
	(7, 6),
	(55, 5),
	(55, 6),
	(3, 3),
	(4, 3),
	(5, 3),
	(6, 3),
	(7, 3),
	(8, 3),
	(9, 3),
	(10, 3),
	(11, 3),
	(53, 3),
	(12, 3),
	(13, 3),
	(14, 3),
	(50, 3),
	(54, 3),
	(55, 3),
	(73, 3),
	(73, 6),
	(73, 9),
	(73, 11),
	(1, 3),
	(1, 5),
	(1, 7),
	(3, 7),
	(4, 7),
	(5, 7),
	(6, 7),
	(7, 7),
	(8, 7),
	(9, 7),
	(10, 7),
	(11, 7),
	(67, 7),
	(68, 7),
	(69, 7),
	(72, 7),
	(73, 7),
	(12, 7),
	(13, 7),
	(14, 7),
	(50, 7),
	(55, 7),
	(1, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(50, 2),
	(55, 2),
	(74, 2),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(72, 1),
	(73, 1),
	(2, 1),
	(2, 2),
	(2, 3),
	(2, 4);
/*!40000 ALTER TABLE `map_user_to_ref` ENABLE KEYS */;


-- Dumping structure for table sar.master_sar
CREATE TABLE IF NOT EXISTS `master_sar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) COLLATE utf8_bin NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `institution` int(1) NOT NULL DEFAULT '0',
  `faculty` int(1) NOT NULL DEFAULT '0',
  `department` int(1) NOT NULL DEFAULT '0',
  `ref` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table sar.master_sar: ~1 rows (approximately)
DELETE FROM `master_sar`;
/*!40000 ALTER TABLE `master_sar` DISABLE KEYS */;
INSERT INTO `master_sar` (`id`, `desc`, `c_date`, `institution`, `faculty`, `department`, `ref`) VALUES
	(3, 'ปีการศึกษา 2559', '2016-05-02 10:49:58', 1, 1, 1, 1);
/*!40000 ALTER TABLE `master_sar` ENABLE KEYS */;


-- Dumping structure for table sar.ref
CREATE TABLE IF NOT EXISTS `ref` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`ref_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table sar.ref: ~6 rows (approximately)
DELETE FROM `ref`;
/*!40000 ALTER TABLE `ref` DISABLE KEYS */;
INSERT INTO `ref` (`ref_id`, `username`, `password`, `status`, `detail`) VALUES
	(1, 'President', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'ผศ.ดร เรืองเดช วงหล้า'),
	(2, 'Ref1', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'คณบดีคณะวิทยาศาสตร์'),
	(3, 'Ref2', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'อธิการบดีมหาวิทยาลัยราชภัฏอุตรดิตถ์'),
	(4, 'Ref3', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'ผู้ทรงคุณวุฒิภายนอก'),
	(12, 'Ref4', '827ccb0eea8a706c4c34a16891f84e7b', -1, '12345'),
	(13, 'ref5', '827ccb0eea8a706c4c34a16891f84e7b', -1, '23');
/*!40000 ALTER TABLE `ref` ENABLE KEYS */;


-- Dumping structure for table sar.resultuser
CREATE TABLE IF NOT EXISTS `resultuser` (
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL,
  `score_user` double DEFAULT '0',
  `comment_user` text NOT NULL,
  `score_ref` double DEFAULT '0',
  `comment_ref` text NOT NULL,
  PRIMARY KEY (`user_id`,`indicator_id`),
  UNIQUE KEY `result_id` (`result_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Dumping data for table sar.resultuser: 4 rows
DELETE FROM `resultuser`;
/*!40000 ALTER TABLE `resultuser` DISABLE KEYS */;
INSERT INTO `resultuser` (`result_id`, `user_id`, `indicator_id`, `ref_id`, `score_user`, `comment_user`, `score_ref`, `comment_ref`) VALUES
	(32, 1, 47, 2, 0, '', 5, ''),
	(30, 2, 22, 2, 0, '', 5, ''),
	(31, 13, 34, 2, 0, '', 5, ''),
	(29, 12, 34, 0, 5, 'เขียนกรอบการประเมิน\r\nฟหกดฟหกด\r\nฟหกดฟหกด\r\nฟหกดฟหกด\r\nฟหกดฟหกด', 0, '');
/*!40000 ALTER TABLE `resultuser` ENABLE KEYS */;


-- Dumping structure for table sar.subindicator
CREATE TABLE IF NOT EXISTS `subindicator` (
  `subindicator_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subindicator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table sar.subindicator: 141 rows
DELETE FROM `subindicator`;
/*!40000 ALTER TABLE `subindicator` DISABLE KEYS */;
INSERT INTO `subindicator` (`subindicator_id`, `indicator_id`, `detail`) VALUES
	(23, 2, '<p>มีการพัฒนาสมรรถนะอาจารย์และนักวิจัย มีการสร้างขวัญและกำลังใจตลอดจนยกย่องอาจารย์และนักวิจัยที่มีผลงานวิจัยหรืองานสร้างสรรค์ดีเด่น</p>\r\n'),
	(22, 2, '<p>จัดสรรงบประมาณเพื่อสนับสนุนการเผยแพรผลงานวิจัยหรืองานสร้างสรรค์ ในการประชุมวิชาการหรือการตีพิมพ์ในวารสารระดับชาติหรือนานาชาติ</p>\r\n'),
	(21, 2, '<p>จัดสรรงบประมาณ เพื่อเป็นทุนวิจัยหรืองานสร้างสรรค์</p>\r\n'),
	(17, 15, '<p>ประเมินความสำเร็จตามวัตถุประสงค์ของแผนการจัดกิจกรรมพัฒนานักศึกษา</p>\r\n'),
	(18, 15, '<p>นำผลการประเมินไปปรับปรุงแผนหรือปรับปรุงการจัดกิจกรรมเพื่อพัฒนานักศึกษา</p>\r\n'),
	(19, 2, '<p>มีระบบสารสนเทศเพื่อการบริหารงานวิจัยที่สามารถนำไปใช้ประโยชน์ในการบริหารงานวิจัยหรืองานสร้างสรรค์</p>\r\n'),
	(20, 2, '<p>สนับสนุนพันธกิจด้านการวิจัยหรืองานสร้างสรรค์ในประเด็นต่อไปนี้</p>\r\n\r\n<p>- ห้องปฏิบัติการหรือห้องปฏิบัติงานสร้างสรรค์ หรือหน่วยวิจัย หรือศูนย์เครื่องมือ หรือศูนย์ให้คำปรึกษาและสนับสนุนการวิจัยหรืองานสร้างสรรค์</p>\r\n\r\n<p>- ห้องสมุดหรือแหล่งค้นคว้าข้อมูลสนับสนุนการวิจัยหรืองานสร้างสรรค์</p>\r\n\r\n<p>- สิ่งอำนวยความสะดวกหรือการรักษาความปลอดภัยในการวิจัยหรือการผลิตงานสร้างสรรค์เช่น ระบบเทคโนโลยีสารสนเทศ ระบบรักษาความปลอดภัยในห้องปฏิบัติการ</p>\r\n\r\n<p>- กิจกรรมวิชาการที่ส่งเสริมงานวิจัยหรืองานสร้างสรรค์ เช่น การจัดประชุมวิชาการ การจัดแสดงงานสร้างสรรค์ การจัดให้มีศาสตราจารย์อาคันตุกะหรือศาสตราจารย์รับเชิญ (visiting professor)</p>\r\n'),
	(15, 15, '<p>จัดกิจกรรมให้ความรู้และทักษะการประกันคุณภาพแก่นักศึกษา</p>\r\n'),
	(16, 15, '<p>ทุกกิจกรรมที่ดำเนินการ มีการประเมินผลความสำเร็จตามวัตถุประสงค์ของกิจกรรมและนำผลการประเมินมาปรับปรุงการดำเนินงานครั้งต่อไป</p>\r\n'),
	(10, 14, '<p>ประเมินคุณภาพของการจัดกิจกรรมและการจัดบริการในข้อ 1-3 ทุกข้อไม่ต่ำกว่า 3.51 จากคะแนนเต็ม 5</p>\r\n'),
	(11, 14, '<p>นำผลการประเมินจากข้อ 4 มาปรับปรุงพัฒนาการให้บริการและการให้ข้อมูล เพื่อส่งให้ผลการประเมินสูงขึ้นหรือเป็นไปตามความคาดหวังของนักศึกษา</p>\r\n'),
	(12, 14, '<p>ให้ข้อมูลและความรู้ที่เป็นประโยชน์ในการประกอบอาชีพแก่ศิษย์เก่า</p>\r\n'),
	(13, 15, '<p>จัดทำแผนการจัดกิจกรรมพัฒนานักศึกษาในภาพรวมของคณะโดยให้นักศึกษามีส่วนร่วมในการจัดทำแผนและการจัดกิจกรรม</p>\r\n'),
	(14, 15, '<p>ในแผนการจัดกิจกรรมพัฒนานักศึกษา ให้ดำเนินกิจกรรมที่ ส่งเสริมคุณลักษณะบัณฑิตตามมาตรฐานผลการเรียนรู้ตามกรอบมาตรฐานคุณวุฒิแห่งชาติ 5 ประการ ให้ครบถ้วน ประกอบด้วย</p>\r\n\r\n<p>(1) คุณธรรม จริยธรรม</p>\r\n\r\n<p>(2) ความรู้</p>\r\n\r\n<p>(3) ทักษะทางปัญญา</p>\r\n\r\n<p>(4) ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</p>\r\n\r\n<p>(5) ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสารและการใช้เทคโนโลยีสารสนเทศ</p>\r\n'),
	(9, 14, '<p>จัดกิจกรรมเตรียมความพร้อมเพื่อการทำงานเมื่อสำเร็จการศึกษาแก่นักศึกษา</p>\r\n'),
	(8, 14, '<p>มีการให้ข้อมูลของหน่วยงานที่ให้บริการ กิจกรรมพิเศษนอกหลักสูตร แหล่งงานทั้งเต็มเวลาและนอกเวลาแก่นักศึกษา</p>\r\n'),
	(5, 9, '<p>อาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก</p>\r\n'),
	(6, 12, '<p>อาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ</p>\r\n'),
	(7, 14, '<p>จัดบริการให้คำปรึกษาทางวิชาการ และการใช้ชีวิตแก่นักศึกษาในคณะ</p>\r\n'),
	(1, 4, '<p>asdgasdgasdg</p>\r\n'),
	(2, 1, '<p>ผลการบริหารจัดการหลักสูตรโดยรวม</p>\r\n'),
	(3, 5, '<p>ฟหกเฟหกฟหกดฟหกฟหกเฟหกเฟหกเasdgasdgasdg</p>\n'),
	(4, 11, '<p>gasdgasdgasdfasdgasdfsadgasdgasg</p>\r\n'),
	(24, 2, '<p>มีระบบและกลไกเพื่อช่วยในการคุ้มครองสิทธิ์ของงานวิจัยหรืองานสร้างสรรค์ ที่นำไปใช้ประโยชน์และดำเนินการตามระบบที่กำหนด</p>\r\n'),
	(25, 21, '<p>ผลการบริหารจัดการหลักสูตรโดยรวม</p>\n'),
	(26, 22, '<p>อาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก</p>\n'),
	(27, 23, '<p>อาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ</p>\n'),
	(28, 25, '<p>จัดบริการให้คำปรึกษาทางวิชาการ และการใช้ชีวิตแก่นักศึกษาในคณะ</p>\n'),
	(29, 25, '<p>มีการให้ข้อมูลของหน่วยงานที่ให้บริการ กิจกรรมพิเศษนอกหลักสูตร แหล่งงานทั้งเต็มเวลาและนอกเวลาแก่นักศึกษา</p>\n'),
	(30, 25, '<p>จัดกิจกรรมเตรียมความพร้อมเพื่อการทำงานเมื่อสำเร็จการศึกษาแก่นักศึกษา</p>\n'),
	(31, 25, '<p>ประเมินคุณภาพของการจัดกิจกรรมและการจัดบริการในข้อ 1-3 ทุกข้อไม่ต่ำกว่า 3.51 จากคะแนนเต็ม 5</p>\n'),
	(32, 25, '<p>นำผลการประเมินจากข้อ 4 มาปรับปรุงพัฒนาการให้บริการและการให้ข้อมูล เพื่อส่งให้ผลการประเมินสูงขึ้นหรือเป็นไปตามความคาดหวังของนักศึกษา</p>\n'),
	(33, 25, '<p>ให้ข้อมูลและความรู้ที่เป็นประโยชน์ในการประกอบอาชีพแก่ศิษย์เก่า</p>\n'),
	(34, 26, '<p>จัดทำแผนการจัดกิจกรรมพัฒนานักศึกษาในภาพรวมของคณะโดยให้นักศึกษามีส่วนร่วมในการจัดทำแผนและการจัดกิจกรรม</p>\n'),
	(35, 26, '<p>ในแผนการจัดกิจกรรมพัฒนานักศึกษา ให้ดำเนินกิจกรรมที่ ส่งเสริมคุณลักษณะบัณฑิตตามมาตรฐานผลการเรียนรู้ตามกรอบมาตรฐานคุณวุฒิแห่งชาติ 5 ประการ ให้ครบถ้วน ประกอบด้วย</p>\n\n<p>(1) คุณธรรม จริยธรรม</p>\n\n<p>(2) ความรู้</p>\n\n<p>(3) ทักษะทางปัญญา</p>\n\n<p>(4) ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</p>\n\n<p>(5) ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสารและการใช้เทคโนโลยีสารสนเทศ</p>\n'),
	(36, 26, '<p>จัดกิจกรรมให้ความรู้และทักษะการประกันคุณภาพแก่นักศึกษา</p>\n'),
	(37, 26, '<p>ทุกกิจกรรมที่ดำเนินการ มีการประเมินผลความสำเร็จตามวัตถุประสงค์ของกิจกรรมและนำผลการประเมินมาปรับปรุงการดำเนินงานครั้งต่อไป</p>\n'),
	(38, 26, '<p>ประเมินความสำเร็จตามวัตถุประสงค์ของแผนการจัดกิจกรรมพัฒนานักศึกษา</p>\n'),
	(39, 26, '<p>นำผลการประเมินไปปรับปรุงแผนหรือปรับปรุงการจัดกิจกรรมเพื่อพัฒนานักศึกษา</p>\n'),
	(40, 24, '<p>จำนวนนักศึกษาเต็มเวลาเทียบเท่าต่อจำนวนอาจารย์ประจำ</p>\n'),
	(41, 27, '<p>มีระบบสารสนเทศเพื่อการบริหารงานวิจัยที่สามารถนำไปใช้ประโยชน์ในการบริหารงานวิจัยหรืองานสร้างสรรค์</p>\n'),
	(42, 27, '<p>สนับสนุนพันธกิจด้านการวิจัยหรืองานสร้างสรรค์ในประเด็นต่อไปนี้</p>\n\n<p>- ห้องปฏิบัติการหรือห้องปฏิบัติงานสร้างสรรค์ หรือหน่วยวิจัย หรือศูนย์เครื่องมือ หรือศูนย์ให้คำปรึกษาและสนับสนุนการวิจัยหรืองานสร้างสรรค์</p>\n\n<p>- ห้องสมุดหรือแหล่งค้นคว้าข้อมูลสนับสนุนการวิจัยหรืองานสร้างสรรค์</p>\n\n<p>- สิ่งอำนวยความสะดวกหรือการรักษาความปลอดภัยในการวิจัยหรือการผลิตงานสร้างสรรค์เช่น ระบบเทคโนโลยีสารสนเทศ ระบบรักษาความปลอดภัยในห้องปฏิบัติการ</p>\n\n<p>- กิจกรรมวิชาการที่ส่งเสริมงานวิจัยหรืองานสร้างสรรค์ เช่น การจัดประชุมวิชาการ การจัดแสดงงานสร้างสรรค์ การจัดให้มีศาสตราจารย์อาคันตุกะหรือศาสตราจารย์รับเชิญ (visiting professor)</p>\n'),
	(43, 27, '<p>จัดสรรงบประมาณ เพื่อเป็นทุนวิจัยหรืองานสร้างสรรค์</p>\n'),
	(44, 27, '<p>จัดสรรงบประมาณเพื่อสนับสนุนการเผยแพรผลงานวิจัยหรืองานสร้างสรรค์ ในการประชุมวิชาการหรือการตีพิมพ์ในวารสารระดับชาติหรือนานาชาติ</p>\n'),
	(45, 27, '<p>มีการพัฒนาสมรรถนะอาจารย์และนักวิจัย มีการสร้างขวัญและกำลังใจตลอดจนยกย่องอาจารย์และนักวิจัยที่มีผลงานวิจัยหรืองานสร้างสรรค์ดีเด่น</p>\n'),
	(46, 27, '<p>มีระบบและกลไกเพื่อช่วยในการคุ้มครองสิทธิ์ของงานวิจัยหรืองานสร้างสรรค์ ที่นำไปใช้ประโยชน์และดำเนินการตามระบบที่กำหนด</p>\n'),
	(47, 28, '<p>เงินสนับสนุนงานวิจัยและงานสร้างสรรค์</p>\n'),
	(48, 29, '<p>ผลงานทางวิชาการของอาจารย์ประจำและนักวิจัย</p>\n'),
	(49, 30, '<p>จัดทำแผนการบริการวิชาการประจำปีที่สอดคล้องกับความต้องการของสังคมและกำหนดตัวบ่งชี้วัดความสำเร็จในระดับแผนและโครงการบริการวิชาการแก่สังคมและเสนอกรรมการประจำคณะเพื่อพิจารณาอนุมัติ</p>\n'),
	(50, 30, '<p>โครงการบริการวิชาการแก่สังคมตามแผน มีการจัดทำแผนการใช้ประโยชน์จากการบริการวิชาการเพื่อให้เกิดผลต่อการพัฒนานักศึกษา ชุมชน หรือสังคม</p>\n'),
	(51, 30, '<p>โครงการบริการวิชาการแก่สังคมในข้อ 1 อย่างน้อยต้องมีโครงการที่บริการแบบให้เปล่า</p>\n'),
	(52, 30, '<p>ประเมินความสำเร็จตามตัวบ่งชี้ของแผนและโครงการบริการวิชาการแก่สังคมในข้อ 1 และนำเสนอกรรมการประจำคณะเพื่อพิจารณา</p>\n'),
	(53, 30, '<p>นำผลการประเมินตามข้อ 4 มาปรับปรุงแผนหรือพัฒนาการให้บริการวิชาการสังคม</p>\n'),
	(54, 30, '<p>คณะมีส่วนร่วมในการบริการวิชาการแก่สังคมในระดับสถาบัน</p>\n'),
	(55, 31, '<p>กำหนดผู้รับผิดชอบในการทำนุบำรุงศิลปะและวัฒนธรรม</p>\n'),
	(56, 31, '<p>จัดทำแผนด้านทำนุบำรุงศิลปะและวัฒนธรรม และกำหนดตัวบ่งชี้วัดความสำเร็จตามวัตถุประสงค์ของแผน รวมทั้งจัดสรรงบประมาณเพื่อให้สามารถดำเนินการได้ตามแผน</p>\n'),
	(57, 31, '<p>กำกับติดตามให้มีการดำเนินงานตามแผนด้านทำนุบำรุงศิลปะและวัฒนธรรม</p>\n'),
	(58, 31, '<p>ประเมินความสำเร็จตามตัวบ่งชี้ที่วัดความสำเร็จตามวัตถุประสงค์ของแผนด้านทำนุบำรุงศิลปะและวัฒนธรรม</p>\n'),
	(59, 31, '<p>นำผลการประเมินไปปรับปรุงแผนหรือกิจกรรมด้านทำนุบำรุงศิลปะและวัฒนธรรม</p>\n'),
	(60, 31, '<p>เผยแพร่กิจกรรมหรือการบริการด้านทำนุบำรุงศิลปะและวัฒนธรรมต่อสาธารณชน</p>\n'),
	(61, 31, '<p>กำหนดหรือสร้างมาตรฐานด้านศิลปะและวัฒนธรรมซึ่งเป็นที่ยอมรับในระดับชาติ</p>\n'),
	(62, 32, '<p>พัฒนาแผนกลยุทธ์จากผลการวิเคราะห์ SWOT โดยเชื่อมโยงกับวิสัยทัศน์ของคณะและให้สอดคล้องกับวิสัยทัศน์ของคณะ สถาบัน รวมทั้งสอดคล้องกับกลุ่มสถาบันและเอกลักษณ์ของคณะ และพัฒนาไปสู่แผนกลยุทธ์ทางการเงินและแผนปฏิบัติการประจำปีตามกรอบเวลาเพื่อให้บรรลุผลตามตัวบ่งชี้และเป้าหมายของแผนกลยุทธ์และเสนอผู้บริหารระดับสถาบันเพื่อพิจารณาอนุมัติ (ปีงบประมาณ 2558)</p>\n'),
	(63, 32, '<p>ดำเนินการวิเคราะห์ข้อมูลทางการเงินที่ประกอบไปด้วยต้นทุนต่อหน่วยในแต่ละหลักสูตร สัดส่วนค่าใช้จ่ายเพื่อพัฒนานักศึกษา อาจารย์ บุคลากร การจัดการเรียนการสอนอย่างต่อเนื่อง เพื่อวิเคราะห์ความคุ้มค่าของการบริหารหลักสูตร ประสิทธิภาพ ประสิทธิผลในการผลิตบัณฑิต และโอกาสในการแข่งขัน (ปีงบประมาณ 2558)</p>\n'),
	(64, 32, '<p>ดำเนินงานตามแผนบริหารความเสี่ยง ที่เป็นผลจากการวิเคราะห์และระบุปัจจัยเสี่ยงที่เกิดจากปัจจัยภายนอก หรือปัจจัยที่ไม่สามารถควบคุมได้ที่ส่งผลต่อการดำเนินงานตามพันธกิจของคณะและให้ระดับความเสี่ยงลดลงจากเดิม (ปีการศึกษา)</p>\n'),
	(65, 32, '<p>บริหารงานด้วยหลักธรรมาภิบาลอย่างครบถ้วนทั้ง 10 ประการที่อธิบายการดำเนินงานอย่างชัดเจน (ปีการศึกษา)</p>\n'),
	(66, 32, '<p>ค้นหาแนวปฏิบัติที่ดีจากความรู้ทั้งที่มีอยู่ในตัวบุคคล ทักษะของผู้มีประสบการณ์ตรง และแหล่งเรียนรู้อื่นๆ ตามประเด็นความรู้อย่างน้อยครอบคลุมพันธกิจด้านการผลิตบัณฑิตและด้านการวิจัยจัดเก็บอย่างเป็นระบบโดยเผยแพร่ออกมาเป็นลายลักษณ์อักษรและนำมาปรับใช้ในการปฏิบัติงานจริง (ปีการศึกษา)</p>\n'),
	(67, 32, '<p>การกำกับติดตามผลการดำเนินงานตามแผนการบริหารและแผนพัฒนาบุคลากรสายวิชาการและสายสนับสนุน (ปีการศึกษา)</p>\n'),
	(68, 32, '<p>ดำเนินงานด้านการประกันคุณภาพการศึกษาภายในตามระบบและกลไกที่เหมาะสมและสอดคล้องกับพันธกิจและพัฒนาการของคณะที่ได้ปรับให้การดำเนินงานด้านการประกันคุณภาพเป็นส่วนหนึ่งของการบริหารงานคณะตามปกติที่ประกอบด้วย การควบคุมคุณภาพ การตรวจสอบคุณภาพ และการประเมินคุณภาพ (ปีการศึกษา)</p>\n'),
	(69, 33, '<p>มีระบบและกลไกในการกำกับการดำเนินการประกันคุณภาพหลักสูตรให้เป็นไปตามองค์ประกอบการประกันคุณภาพหลักสูตร</p>\n'),
	(70, 33, '<p>มีคณะกรรมการกำกับ ติดตามการดำเนินงานให้เป็นไปตามระบบที่กำหนดในข้อ 1 และรายงานผลการติดตามให้กรรมการประจำคณะเพื่อพิจารณาทุกภาคการศึกษา</p>\n'),
	(71, 33, '<p>มีการจัดสรรทรัพยากรเพื่อสนับสนุนการดำเนินงานของหลักสูตรให้เกิดผลตามองค์ประกอบการประกันคุณภาพหลักสูตร</p>\n'),
	(72, 33, '<p>มีการประเมินคุณภาพหลักสูตรตามกำหนดเวลาทุกหลักสูตร และรายงานผลการประเมินให้กรรมการประจำคณะเพื่อพิจารณา</p>\n'),
	(73, 33, '<p>นำผลการประเมินและข้อเสนอแนะจากกรรมการประจำคณะมาปรับปรุงหลักสูตรให้มีคุณภาพดีขึ้นอย่างต่อเนื่อง</p>\n'),
	(74, 33, '<p>มีผลการประเมินคุณภาพทุกหลักสูตรผ่านองค์ประกอบที่ 1 การกำกับมาตรฐาน</p>\n'),
	(75, 34, '<p>จำนวนอาจารย์ประจำหลักสูตร</p>\n'),
	(76, 34, '<p>คุณสมบัติของอาจารย์ประจำหลักสูตร</p>\n'),
	(77, 34, '<p>คุณสมบัติของอาจารย์ผู้รับผิดชอบหลักสูตร</p>\n'),
	(78, 34, '<p>คุณสมบัติของอาจารย์ผู้สอน</p>\n'),
	(79, 34, '<p>คุณสมบัติของอาจารย์ที่ปรึกษาวิทยานิพนธ์หลักและอาจารย์ที่ปรึกษาการค้นคว้าอิสระ</p>\n'),
	(80, 34, '<p>คุณสมบัติของอาจารย์ที่ปรึกษาวิทยานิพนธ์ร่วม&nbsp;(ถ้ามี)</p>\n'),
	(81, 34, '<p>คุณสมบัติของอาจารย์ผู้สอบวิทยานิพนธ์&nbsp;</p>\n'),
	(82, 34, '<p>การตีพิมพ์เผยแพร่ผลงานของผู้สำเร็จการศึกษา</p>\n'),
	(83, 34, '<p>ภาระงานอาจารย์ที่ปรึกษาวิทยานิพนธ์และการค้นคว้าอิสระในระดับบัณฑิตศึกษา&nbsp;</p>\n'),
	(84, 34, '<p>อาจารย์ที่ปรึกษาวิทยานิพนธ์และการค้นคว้าอิสระในระดับบัณฑิตศึกษามีผลงานวิจัยอย่างต่อเนื่องและสม่ำเสมอ</p>\n'),
	(85, 34, '<p>การปรับปรุงหลักสูตรตามรอบระยะเวลาที่กำหนด&nbsp;</p>\n'),
	(86, 34, '<p>การดำเนินงานให้เป็นไปตามตัวบ่งชี้ผลการดำเนินงานเพื่อการประกันคุณภาพหลักสูตรและการเรียนการสอนตามกรอบมาตรฐานคุณวุฒิะดับอุดมศึกษาแห่งชาติ&nbsp;</p>\n'),
	(87, 35, '<p>คุณภาพบัณฑิตตามกรอบมาตรฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ&nbsp;</p>\n'),
	(88, 36, '<p>บัณฑิตปริญญาตรีที่ได้งานทำหรือประกอบอาชีพอิสระภายใน 1 ปี</p>\n'),
	(89, 37, '<p>มีระบบ มีกลไก</p>\n'),
	(90, 37, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(91, 37, '<p>มีการประเมินกระบวนการ</p>\n'),
	(92, 37, '<p>มีการปรับปรุง/พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(93, 37, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม</p>\n'),
	(94, 37, '<p>มีแนวทางปฏิบัติที่ดีโดยมีหลักฐานเชิงประจักษ์ยืนยันและกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน&nbsp;</p>\n'),
	(95, 38, '<p>มีระบบ มีกลไก</p>\n'),
	(96, 38, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(97, 38, '<p>มีการประเมินกระบวนการ</p>\n'),
	(98, 38, '<p>มีการปรับปรุง/พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(99, 38, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม</p>\n'),
	(100, 38, '<p>มีแนวทางปฏิบัติที่ดีโดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน&nbsp;</p>\n'),
	(101, 39, '<p>มีการรายงานผลการดำเนินงานครบทุกเรื่องตามคำอธิบายในตัวบ่งชี้</p>\n'),
	(102, 39, '<p>มีแนวโน้มผลการดำเนินงานที่ดีขึ้นในทุกเรื่อง</p>\n'),
	(103, 39, '<p>มีผลการดำเนินงานที่โดดเด่นเทียบเคียงกับหลักสูตรนั้นในสถาบันกลุ่มเดียวกันโดยมีหลักฐานเชิงประจักษ์ยืนยันและกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายว่าเป็นผลการดำเนินงานที่โดดเด่นอย่างแท้จริง</p>\n'),
	(104, 40, '<p>มีระบบ มีกลไก</p>\n'),
	(105, 40, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(106, 40, '<p>มีการประเมินกระบวนการ&nbsp;</p>\n'),
	(107, 40, '<p>มีการปรับปรุง/พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(108, 40, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม</p>\n'),
	(109, 40, '<p>มีแนวทางปฏิบัติที่ดีโดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน&nbsp;</p>\n'),
	(110, 41, '<p>อาจารย์ประจำหลักสูตรที่มีคุณวุฒิปริญญาเอก&nbsp;</p>\n'),
	(111, 41, '<p>อาจารย์ประจำหลักสูตรที่ดำรงตำแหน่งทางวิชาการ</p>\n'),
	(112, 41, '<p>ผลงานทางวิชาการของอาจารย์ประจำหลักสูตร</p>\n'),
	(113, 41, '<p>จำนวนบทความของอาจารย์ประจำหลักสูตรปริญญาเอกที่ได้รับการอ้างอิงในฐานข้อมูล TCI&nbsp; และ Scopus ต่อจำนวนอาจารย์ประจำหลักสูตร&nbsp;</p>\n'),
	(114, 42, '<p>มีการรายงานผลการดำเนินงานครบทุกเรื่องตามคำอธิบายในตัวบ่งชี้</p>\n'),
	(115, 42, '<p>มีแนวโน้มผลการดำเนินงานที่ดีขึ้นในทุกเรื่อง</p>\n'),
	(116, 42, '<p>มีผลการดำเนินงานที่โดดเด่นเทียบเคียงกับหลักสูตรนั้นในสถาบันกลุ่มเดียวกัน โดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายว่าเป็นผลการดำเนินงานที่โดดเด่นอย่างแท้จริง</p>\n'),
	(117, 43, '<p>มีระบบ มีกลไก</p>\n'),
	(118, 43, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(119, 43, '<p>มีการประเมินกระบวนการ</p>\n'),
	(120, 43, '<p>มีการปรับปรุง/&nbsp;พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(121, 43, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม</p>\n'),
	(122, 43, '<p>มีแนวทางปฏิบัติที่ดีโดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน</p>\n'),
	(123, 47, '<p>มีระบบ มีกลไก</p>\n'),
	(124, 47, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(125, 47, '<p>มีการประเมินกระบวนการ</p>\n'),
	(126, 47, '<p>มีการปรับปรุง/พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(127, 47, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม</p>\n'),
	(128, 47, '<p>มีแนวทางปฏิบัติที่ดี &nbsp;โดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน&nbsp;</p>\n'),
	(129, 46, '<p>ผลการดำเนินงานหลักสูตรตามกรอบมาตรฐานคุณวุฒิระดับอุดมศึกษาแห่งชาติ</p>\n'),
	(130, 45, '<p>มีระบบ มีกลไก</p>\n'),
	(131, 45, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(132, 45, '<p>มีการประเมินกระบวนการ</p>\n'),
	(133, 45, '<p>มีการปรับปรุง/พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(134, 45, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม&nbsp;</p>\n'),
	(135, 45, '<p>มีแนวทางปฏิบัติที่ดี โดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน&nbsp;</p>\n'),
	(136, 44, '<p>มีระบบ มีกลไก</p>\n'),
	(137, 44, '<p>มีการนำระบบกลไกไปสู่การปฎิบัติ/ดำเนินงาน</p>\n'),
	(138, 44, '<p>มีการประเมินกระบวนการ</p>\n'),
	(139, 44, '<p>มีการปรับปรุง/พัฒนา/กระบวนการจากผลการประเมิน</p>\n'),
	(140, 44, '<p>มีผลจากการปรับปรุงเห็นชัดเจนเป็นรูปธรรม</p>\n'),
	(141, 44, '<p>มีแนวทางปฏิบัติที่ดีโดยมีหลักฐานเชิงประจักษ์ยืนยัน และกรรมการผู้ตรวจประเมินสามารถให้เหตุผลอธิบายการเป็นแนวปฏิบัติที่ดีได้ชัดเจน&nbsp;</p>\n');
/*!40000 ALTER TABLE `subindicator` ENABLE KEYS */;


-- Dumping structure for table sar.subindicator_doc
CREATE TABLE IF NOT EXISTS `subindicator_doc` (
  `subindicator_doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `subindicator_id` int(11) NOT NULL,
  `document` text COLLATE utf8_bin,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`subindicator_id`),
  UNIQUE KEY `subindicator_doc_id` (`subindicator_doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table sar.subindicator_doc: ~0 rows (approximately)
DELETE FROM `subindicator_doc`;
/*!40000 ALTER TABLE `subindicator_doc` DISABLE KEYS */;
/*!40000 ALTER TABLE `subindicator_doc` ENABLE KEYS */;


-- Dumping structure for table sar.user
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `user_ref` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- Dumping data for table sar.user: ~27 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`, `username`, `password`, `detail`, `level`, `status`, `user_ref`) VALUES
	(1, 'URU', '827ccb0eea8a706c4c34a16891f84e7b', 'มหาวิทยาลัยราชภัฏอุตรดิตถ์', 1, 0, 0),
	(2, 'Kasat', 'e6454aceee1ef888a2ce5fce1a0d6dc2', 'คณะเกษตรศาสตร์', 2, 0, 1),
	(3, 'Karu', 'd953750fe8517bc7f5a4d3dc54b99bd4', 'คณะครุศาสตร์', 2, 0, 1),
	(4, 'Sci', '827ccb0eea8a706c4c34a16891f84e7b', 'คณะวิทยาศาสตร์และเทคโนโลยี', 2, 0, 1),
	(5, 'Huso', '4bf6a8e730335ea7962f32b7c391796f', 'คณะมนุษศาสตรและสังคมศาสตร์', 2, 0, 1),
	(6, 'Teno', 'c787ef1210bd3c7da7d817923817d7d3', 'คณะเทคโนโลยีอุตสาหกรรม', 2, 0, 1),
	(7, 'Mana', 'c787ef1210bd3c7da7d817923817d7d3', 'คณะวิทยาการจัดการ', 2, 0, 1),
	(8, 'inter', '0cc175b9c0f1b6a831c399e269772661', 'วิทยาลัยนานาชาติ', 2, 0, 1),
	(9, 'Gradu', '47bce5c74f589f4867dbd57e9ca9f808', 'บัณฑิตวิทยาลัย', 2, 0, 1),
	(10, 'Nan', 'd3ed3780764ed37d711e70dfbe0d38d2', 'วิทยาเขตน่าน', 2, 0, 1),
	(11, 'Pare', 'c787ef1210bd3c7da7d817923817d7d3', 'วิทยาเขตแพร่', 2, 0, 1),
	(12, 'Math', '827ccb0eea8a706c4c34a16891f84e7b', 'คณิตศาสตร์', 3, 0, 4),
	(13, 'Comsci', '827ccb0eea8a706c4c34a16891f84e7b', 'วิทยาการคอมพิวเตอร์', 3, 0, 4),
	(14, 'IT', '4124bc0a9335c27f086f24ba207a4912', 'เทคโนโลยีสารสนเทศ', 3, 0, 4),
	(50, 'stat', '81dc9bdb52d04dc20036dbd8313ed055', 'สถิติ', 3, 0, 4),
	(53, 'Other', '6311ae17c1ee52b36e68aaf4ad066387', 'Other', 2, -1, 1),
	(54, 'Otheraa', '80e57f96f973086932d148e365367af1', 'Other หลักสูตร', 3, -1, 7),
	(55, 'User', 'b068931cc450442b63f5b3d276ea4297', 'คนใช้', 3, 0, 11),
	(62, 'asdfasdg', '7e6a6a87bf3ffb29a6dd9f14afdc3b88', 'asdg', 2, -1, 1),
	(65, 'level1', '43d3810c065f4bf3550fac648d605fcb', 'level1', 1, -1, 1),
	(66, 'asdf', '912ec803b2ce49e4a541068d495ab570', 'asdgasdg', 1, -1, 1),
	(67, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'คณะวิทยาศาสตร์ 2', 2, 0, 1),
	(68, 'ssss', '8f60c8102d29fcd525162d02eed4566b', 'ssss', 2, 0, 1),
	(69, 'aaaaa', '594f803b380a41396ed63dca39503542', 'aaaaa', 2, 0, 1),
	(72, 'aaaa', '594f803b380a41396ed63dca39503542', 'aaaa', 2, 0, 1),
	(73, 'asdgasdgads', 'fb5dcf588a536f20d7aa9764a26e3fc6', 'asdgasdg', 2, 0, 1),
	(74, 'Nites', '827ccb0eea8a706c4c34a16891f84e7b', 'นิเทศศาสตร์', 3, 0, 7);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for view sar.user_ref
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_ref` (
	`user_id` INT(11) NOT NULL,
	`username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`detail` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`level` INT(11) NOT NULL,
	`status` INT(11) NOT NULL,
	`user_ref` INT(11) NOT NULL,
	`parrent_detail` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view sar.user_ref
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_ref`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `user_ref` AS select users.*, parent.detail as parrent_detail
  from user as users
  join user as parent on parent.user_id = users.user_ref 
  union
  select user2.*,user2.detail as parrent_detail from user as user2 where user2.user_ref=0
  order by user_id asc ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
