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

-- Dumping database structure for research1
CREATE DATABASE IF NOT EXISTS `research1` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `research1`;


-- Dumping structure for table research1.composition
DROP TABLE IF EXISTS `composition`;
CREATE TABLE IF NOT EXISTS `composition` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'For Id Composition',
  `maintitle` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `principle` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `standard` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `indicate` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `year` int(4) NOT NULL,
  `master_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table research1.composition: 8 rows
DELETE FROM `composition`;
/*!40000 ALTER TABLE `composition` DISABLE KEYS */;
INSERT INTO `composition` (`id`, `maintitle`, `title`, `principle`, `standard`, `indicate`, `year`, `master_id`) VALUES
	(1, '1', 'การผลิตบัณฑิต', '', '', '', 0, 2),
	(2, '2', 'การวิจัย', '', '', '', 0, 2),
	(3, '3', '3.1', '', '', '', 0, 2),
	(4, '1.12', '1.1', '', '', '', 0, 3),
	(5, 'asdfasdf', 'asdfasdfasdf', '', '', '', 0, 3),
	(6, 'ฟฟ', 'ฟฟ', '', '', '', 0, 2),
	(7, 'ฟหกเฟหกเฟ', 'ฟหกเฟหกเฟหกเ', '', '', '', 0, 3),
	(8, 'asd', 'asdf', '', '', '', 0, 2);
/*!40000 ALTER TABLE `composition` ENABLE KEYS */;


-- Dumping structure for table research1.control_sar
DROP TABLE IF EXISTS `control_sar`;
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

-- Dumping data for table research1.control_sar: ~0 rows (approximately)
DELETE FROM `control_sar`;
/*!40000 ALTER TABLE `control_sar` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_sar` ENABLE KEYS */;


-- Dumping structure for table research1.document
DROP TABLE IF EXISTS `document`;
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
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table research1.document: ~22 rows (approximately)
DELETE FROM `document`;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;
INSERT INTO `document` (`doc_id`, `user_id`, `master_id`, `create`, `docname`, `link_path`, `size`, `type`, `full_path`) VALUES
	(91, 69, 2, '2015-09-14 15:34:48', 'adfasdf', 'http://localhost/SAR/upload/cb7a383ba2e06035a8986f62480eff27.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/cb7a383ba2e06035a8986f62480eff27.docx'),
	(92, 69, 2, '2015-09-21 11:17:29', 'จดหมายเวียน', 'http://localhost/SAR/upload/801a8ee3ded73a6a326fc183f97d6c8c.docx', '11.52', 'FILE', 'C:/xampp/htdocs/SAR/upload/801a8ee3ded73a6a326fc183f97d6c8c.docx'),
	(93, 69, 2, '2015-09-22 11:38:02', 'หลักฐาน', 'http://localhost/SAR/upload/b13d9975aa22faf61a78c1df95ad11fd.pdf', '637.37', 'FILE', 'C:/xampp/htdocs/SAR/upload/b13d9975aa22faf61a78c1df95ad11fd.pdf'),
	(94, 69, 2, '2015-09-22 11:38:25', 'หลักฐาน 2', 'http://localhost/SAR/upload/5f24239edda39a4afe3df8e3a2d64fe4.pdf', '637.37', 'FILE', 'C:/xampp/htdocs/SAR/upload/5f24239edda39a4afe3df8e3a2d64fe4.pdf'),
	(95, 69, 2, '2015-09-22 14:34:01', 'ฟกหดฟกด', 'http://localhost/SAR/upload/72da8968012731601522100708cce98f.pdf', '637.37', 'FILE', 'C:/xampp/htdocs/SAR/upload/72da8968012731601522100708cce98f.pdf'),
	(97, 69, 2, '2015-09-22 14:52:37', 'ฟเเฟเฟกหเกหเฟหเฟหกเฟหกดฟหกด', 'http://localhost/SAR/upload/6eeb901de0f8c0214d28402180562d57.docx', '11.52', 'FILE', 'C:/xampp/htdocs/SAR/upload/6eeb901de0f8c0214d28402180562d57.docx'),
	(98, 69, 2, '2015-09-25 13:27:17', 'ทดสอบ Google', 'http://www.googlecom', '0', 'URL', 'http://www.googlecom'),
	(99, 69, 2, '2015-09-25 15:37:28', 'ฟหกเฟหกเฟหกเ', 'http://localhost/SAR/upload/fff81e69447a347def28b343055171fe.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/fff81e69447a347def28b343055171fe.docx'),
	(100, 69, 2, '2015-09-25 22:08:13', 'gaaykhjkglghjk', 'http://localhost/SAR/upload/6c8a8af04eb476667a0fac728f1057c0.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/6c8a8af04eb476667a0fac728f1057c0.docx'),
	(101, 69, 2, '2015-09-25 22:08:22', 'fghsdfgsdfgsdhfdfg', 'http://localhost/SAR/upload/8bd2054830d9041e5ce60113154308ef.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/8bd2054830d9041e5ce60113154308ef.docx'),
	(102, 69, 2, '2015-09-25 22:08:38', 'ahsdgashasdgahasdg', 'http://localhost/SAR/upload/05df522b17fe3f064b6d7fb0ab0313af.doc', '103.5', 'FILE', 'C:/xampp/htdocs/SAR/upload/05df522b17fe3f064b6d7fb0ab0313af.doc'),
	(103, 69, 2, '2015-09-25 22:13:29', 'sadgsdfasgasdf', 'http://localhost/SAR/upload/09156994417c9da21273d980baafc529.doc', '35', 'FILE', 'C:/xampp/htdocs/SAR/upload/09156994417c9da21273d980baafc529.doc'),
	(104, 69, 2, '2015-09-25 22:15:31', 'dfsdfsa', 'http://www.google.com', '0', 'URL', 'http://www.google.com'),
	(105, 4, 3, '2015-09-26 10:30:48', 'aaaa', 'http://localhost/SAR/upload/44e74b78e21741278c0abc18282a75b5.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/44e74b78e21741278c0abc18282a75b5.docx'),
	(106, 4, 3, '2015-09-26 10:35:26', 'sdasdfasdf', 'http://localhost/SAR/upload/ce089bb0a722ffbee4539093449c2c1c.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/ce089bb0a722ffbee4539093449c2c1c.docx'),
	(107, 4, 2, '2015-09-26 10:35:38', 'asdgasgasdgasg', 'http://localhost/SAR/upload/f301c6611099b9a4d256947327028838.doc', '35', 'FILE', 'C:/xampp/htdocs/SAR/upload/f301c6611099b9a4d256947327028838.doc'),
	(108, 4, 3, '2015-09-26 10:36:18', 'asdgasdg', 'http://localhost/SAR/upload/0a6c38d7efb5c17f9a79c504eed97e6c.doc', '35', 'FILE', 'C:/xampp/htdocs/SAR/upload/0a6c38d7efb5c17f9a79c504eed97e6c.doc'),
	(109, 13, 3, '2015-09-26 10:37:36', 'Comsci1', 'http://localhost/SAR/upload/2eb76b117da2f2d8a3496e1c215666bc.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/2eb76b117da2f2d8a3496e1c215666bc.docx'),
	(110, 13, 3, '2015-09-26 10:37:58', 'Comsci2', 'http://localhost/SAR/upload/e7af6d53016fb0c7b0be45eefcd607ba.docx', '70.41', 'FILE', 'C:/xampp/htdocs/SAR/upload/e7af6d53016fb0c7b0be45eefcd607ba.docx'),
	(113, 12, 3, '2015-09-28 16:53:59', 'asdgasdgasdg', 'http://localhost/SAR/upload/5417c28af18653e32b21b9d2fe645bee.jpg', '44.46', 'FILE', 'C:/xampp/htdocs/SAR/upload/5417c28af18653e32b21b9d2fe645bee.jpg'),
	(114, 12, 3, '2015-09-28 16:55:23', 'ฟหกเฟหกเฟหกเ', 'http://www.google.com', '0', 'URL', 'http://www.google.com'),
	(115, 12, 2, '2015-09-28 16:56:37', 'asdgasdgasdgasdg', 'http://localhost/SAR/upload/ed1a14ad39d3d5e51bb4b0feeb7cfcc5.pdf', '575.84', 'FILE', 'C:/xampp/htdocs/SAR/upload/ed1a14ad39d3d5e51bb4b0feeb7cfcc5.pdf');
/*!40000 ALTER TABLE `document` ENABLE KEYS */;


-- Dumping structure for table research1.doc_syn_indicator
DROP TABLE IF EXISTS `doc_syn_indicator`;
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table research1.doc_syn_indicator: ~16 rows (approximately)
DELETE FROM `doc_syn_indicator`;
/*!40000 ALTER TABLE `doc_syn_indicator` DISABLE KEYS */;
INSERT INTO `doc_syn_indicator` (`doc_syn_id`, `doc_id`, `docname`, `link_path`, `order`, `subindicator_id`, `master_id`, `user_id`) VALUES
	(24, 94, 'asdgasdfagdasdgasdf', 'http://localhost/SAR/upload/5f24239edda39a4afe3df8e3a2d64fe4.pdf', 0, 1, 2, 69),
	(25, 98, 'dgsasdgasdg', 'http://www.googlecom', 0, 1, 2, 69),
	(26, 94, 'asdgasdgasdg', 'http://localhost/SAR/upload/5f24239edda39a4afe3df8e3a2d64fe4.pdf', 0, 1, 2, 69),
	(41, 107, 'asdgasdgasdf', 'http://localhost/SAR/upload/f301c6611099b9a4d256947327028838.doc', 0, 5, 2, 12),
	(43, 115, 'ฟหกเฟหกเฟหกเ', 'http://localhost/SAR/upload/ed1a14ad39d3d5e51bb4b0feeb7cfcc5.pdf', 0, 5, 2, 12),
	(44, 104, 'adsgasdgasdg', 'http://www.google.com', 0, 20, 2, 69),
	(45, 104, 'agagasdgasdasdf', 'http://www.google.com', 0, 20, 2, 69),
	(46, 104, 'sdasdfasdfasd', 'http://www.google.com', 0, 20, 2, 69),
	(47, 97, 'adgsasdgdsg', 'http://localhost/SAR/upload/6eeb901de0f8c0214d28402180562d57.docx', 0, 2, 2, 69),
	(48, 107, 'adsgasdgasdfadgasdg', 'http://localhost/SAR/upload/f301c6611099b9a4d256947327028838.doc', 0, 2, 2, 12),
	(49, 115, 'asdgasdfadgasdfasdf', 'http://localhost/SAR/upload/ed1a14ad39d3d5e51bb4b0feeb7cfcc5.pdf', 0, 2, 2, 12),
	(50, 107, 'asfasdf', 'http://localhost/SAR/upload/f301c6611099b9a4d256947327028838.doc', 0, 2, 2, 12),
	(51, 115, 'asdgasdg', 'http://localhost/SAR/upload/ed1a14ad39d3d5e51bb4b0feeb7cfcc5.pdf', 0, 2, 2, 12),
	(52, 115, 'ฟหกเฟหกเ', 'http://localhost/SAR/upload/ed1a14ad39d3d5e51bb4b0feeb7cfcc5.pdf', 0, 2, 2, 12),
	(53, 107, 'เอกสาร 1', 'http://localhost/SAR/upload/f301c6611099b9a4d256947327028838.doc', 0, 18, 2, 12),
	(54, 107, 'adgasdgasdgasdf', 'http://localhost/SAR/upload/f301c6611099b9a4d256947327028838.doc', 0, 3, 3, 1);
/*!40000 ALTER TABLE `doc_syn_indicator` ENABLE KEYS */;


-- Dumping structure for table research1.indicator
DROP TABLE IF EXISTS `indicator`;
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table research1.indicator: 20 rows
DELETE FROM `indicator`;
/*!40000 ALTER TABLE `indicator` DISABLE KEYS */;
INSERT INTO `indicator` (`indicator_id`, `indicator_num`, `indicator_title`, `indicator_type`, `year`, `data_use`, `citeria`, `composition_id`, `detail`, `lv3`, `lv2`, `lv1`) VALUES
	(1, '1.1', 'ผลการบริหารจัดการหลักสูตรโดยรวม', 'ผลลัพธ์', 2558, '1', 2, 1, '<p><strong>เกณฑ์การประเมิน</strong></p>\r\n\r\n<p>ค่าเฉลี่ยของคะแนนประเมินทุกหลักสูตรที่คณะรับผิดชอบ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สูตรการคำนวณ</strong></p>\r\n\r\n<p>คะแนนที่ได้ =&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลรวมของค่าคะแนนประเมินของทุกหลักสูตร</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนหลักสูตรทั้งหมดที่คณะรับผิดชอบ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>หมายเหตุ : หลักสูตรที่ได้รับการรับรองโดยระบบอื่นๆ ตามที่คณะกรรมการประกันคุณภาพภายในระดับอุดมศึกษาเห็นชอบ ไม่ต้องนำคะแนนการประเมินของหลักสูตรนั้นมาคำนวณในตัวบ่งชี้นี้แต่ต้องรายงานผลการรับรองตามระบบนั้นๆ ในตัวบ่งชี้ให้ถูกต้อง</p>\r\n', 0, 1, 1),
	(2, '2.1', 'ระบบและกลไกการบริหารและพัฒนางานวิจัยหรืองานสร้างสรรค์', 'กระบวนการ', 2558, '1', 1, 2, '<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 1</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 2</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 3</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 4</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>1 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>2 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>3 - 4 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>5 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>6 ข้อ</p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1, 1),
	(3, '2.2', 'เงินสนับสนุนงานวิจัยและงานสร้างสรรค์', 'ปัจจัยนำเข้า', 2558, '1', 2, 2, '<p>โดยการแปลงจำนวนเงินต่อจำนวนอาจารย์ประจำและนักวิจัยประจําเป็นคะแนนระหว่าง 0 - 5</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์และเทคโนโลยี</strong></p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 60,000 บาทขึ้นไปต่อคน</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์สุขภาพ</strong></p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 50,000 บาทขึ้นไปต่อคน</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชามนุษยศาสตร์และสังคมศาสตร์</strong></p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันที่ กำหนดให้เป็นคะแนนเต็ม 5 = 25,000 บาทขึ้นไปต่อคน</p>\r\n\r\n<p><strong>สูตรการคำนวณ</strong></p>\r\n\r\n<p>1. คำนวณจำนวนเงินสนับสนุนงานวิจัยหรืองานสร้างสรรค์จากภายในและภายนอกสถาบันต่อจำนวนอาจารย์ประจำและนักวิจัย</p>\r\n\r\n<p>จำนวนเงินสนับสนุนงานวิจัยฯ = &nbsp; &nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ จากภายในและภายนอก</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; จำนวนอาจารย์ประจำและนักวิจัย</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงจำนวนเงินที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>คะแนนที่ได้ = &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ จากภายในและภายนอก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;x&nbsp; 5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนเงินสนับสนุนงานวิจัยฯ ที่กำหนดให้เป็นคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สรุปคะแนนที่ได้ในระดับคณะ</strong></p>\r\n\r\n<p>คะแนนที่ได้ในระดับคณะ = ค่าเฉลี่ยของคะแนนที่ได้ของทุกกลุ่มสาขาวิชาในคณะ</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>หมายเหตุ</strong></p>\r\n\r\n<p>1. จำนวนอาจารย์และนักวิจัยให้นับตามปีการศึกษา และนับเฉพาะที่ปฏิบัติงานจริง ไม่นับรวมผู้ลาศึกษาต่อ</p>\r\n\r\n<p>2. ให้นับจำนวนเงินที่มีการลงนามในสัญญารับทุนในปีการศึกษาหรือปีงบประมาณหรือปีปฏิทินนั้นๆ ไม่ใช่จำนวนเงินที่เบิกจ่ายจริง</p>\r\n\r\n<p>3. กรณีที่มีหลักฐานการแบ่งสัดส่วนเงินสนับสนุนงานวิจัยซึ่งอาจเป็นหลักฐานจากแหล่งทุนหรือหลักฐานจากการตกลงร่วมกันของสถาบันที่ร่วมโครงการ ให้แบ่งสัดสวนเงินตามหลักฐานที่ปรากฏ กรณีที่ไม่มีหลักฐาน ให้แบ่งเงินตามสัดส่วนผู้ร่วมวิจัยของแต่ละคณะ</p>\r\n\r\n<p>4. การนับจำนวนเงินสนับสนุนโครงการวิจัย สามารถนับเงินโครงการวิจัยสถาบันที่ได้ลงนามในสัญญารับทุนโดยอาจารย์ประจำหรือนักวิจัย แต่ไม่สามารถนับเงินโครงการวิจัยสถาบันที่บุคลากรสายสนับสนุนที่ไม่ใช่นักวิจัยเป็นผู้ดำเนินการ</p>\r\n', 1, 1, 1),
	(4, 'asdgasdf', 'asdgasdf', 'asdgasdf', 2558, '1', 0, 3, '<p>aasdgasdfasdf</p>\r\n', 1, 1, 1),
	(5, 'sdfsdf', 'gsdfsdfg', 'sdhsdfgsd', 2558, '1', 0, 4, '<p>fhsdfgsdfhsdfgsdfg</p>\r\n', 0, 0, 1),
	(6, 'sdfhsdfg', 'sdfhsdf', 'gsdfsfdgsdfgsd', 2558, '1', 0, 4, '<p>fgsdfgsdfgsdfg</p>\r\n', 0, 0, 1),
	(7, 'asdgasdfas', 'asdfasdf', 'asdfasdfasfdasdfasdfasdf', 2558, '1', 0, 4, '<p>asdfasdfasdf</p>\r\n', 0, 0, 1),
	(8, 'asdfasdf', 'asdfasdf', 'asdfasdfasdf', 2558, '1', 0, 5, '<p>asdfasdfasdfasdf</p>\r\n', 0, 0, 0),
	(9, '1.2', 'อาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก', 'ปัจจัยนำเข้า', 2558, '1', 2, 1, '<p><strong>เกณฑ์การประเมิน</strong></p>\r\n\r\n<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกเป็นคะแนนระหว่าง 0 &ndash; 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. เกณฑ์เฉพาะสถาบันกลุ่ม ข และ ค2</p>\r\n\r\n<p>ค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 40 ขึ้นไป&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>สูตรการคำนวณ</strong></p>\r\n\r\n<p>1. คำนวณค่าร้อยละของอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก ตามสูตร</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก&nbsp; x&nbsp; 100</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะทั้งหมด</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงค่าร้อยละที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;คะแนนที่ได้ =&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ร้อยละอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; x&nbsp; 5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ร้อยละอาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอกที่กำหนดให้เป็นคะแนนเต็ม 5 &nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>หมายเหตุ :</p>\r\n\r\n<p>1. คุณวุฒิปริญญาเอกพิจารณาจากระดับคุณวุฒิที่ได้รับหรือเทียบเท่าตามหลักเกณฑ์การพิจารณาคุณวุฒิของกระทรวงศึกษาธิการ กรณีที่มีการปรับวุฒิการศึกษาให้มีหลักฐานการสำเร็จการศึกษาภายในรอบปีการศึกษานั้น ทั้งนี้ อาจใช้คุณวุฒิอื่นเทียบเท่าคุณวุฒิปริญญาเอกได้สำหรับกรณี ที่ บางสาขาวิชาชีพมี คุณวุฒิอื่นที่เหมาะสมกว่า ทั้งนี้ต้องได้รับความเห็นชอบจากคณะกรรมการการอุดมศึกษา</p>\r\n\r\n<p>2. การนับจำนวนอาจารย์ประจำให้นับตามปีการศึกษาและนับทั้งที่ปฏิบัติงานจริงและลาศึกษาต่อในกรณีที่มีอาจารย์บรรจุใหม่ให้คำนวณตามเกณฑ์อาจารย์ประจำที่ระบุในคำชี้แจงเกี่ยวกับการนับจำนวนอาจารย์ประจำและนักวิจัย</p>\r\n', 0, 1, 1),
	(10, 'ฟหกเฟหกเ', 'ฟหกเฟหกด', 'ฟหกดฟหกด', 2558, '1', 1, 7, '<p>ฟหกฟหกเฟหกดฟหกด</p>\r\n', 0, 0, 0),
	(11, 'asdgasd', 'asgd', 'sadg', 2558, '1', 0, 8, '<p>asdg</p>\r\n', 1, 0, 0),
	(12, '1.3', 'อาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ', 'ปัจจัยนำเข้า', 2558, '2', 2, 1, '<p>โดยการแปลงค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการเป็นคะแนนระหว่าง 0-5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. เกณฑ์เฉพาะสถาบันกลุ่ม ข และ ค2</p>\r\n\r\n<p>ค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งผู้ช่วยศาสตราจารย์ รองศาสตราจารย์ และศาสตราจารย์รวมกัน ที่กำหนดให้เป็นคะแนนเต็ม 5 = ร้อยละ 60 ขึ้นไป</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>สูตรการคำนวณ</p>\r\n\r\n<p>1. คำนวณค่าร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ ตามสูตร</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ &nbsp;&nbsp;x&nbsp; 100</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; จำนวนอาจารย์ประจำคณะทั้งหมด</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงค่าร้อยละที่คำนวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>คะแนนที่ได้ =&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;x &nbsp;5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ร้อยละของอาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการที่กำหนดให้</p>\r\n', 0, 0, 0),
	(13, '1.4', 'จำนวนนักศึกษาเต็มเวลาเทียบเท่าต่อจำนวนอาจารย์ประจำ', 'ปัจจัยนำเข้า', 2558, '1', 2, 1, '<p>คำนวณหาค่าความแตกต่างระหว่างจำนวนนักศึกษาเต็มเวลาต่ออาจารย์ประจำกับเกณฑ์มาตรฐานและนำมาเทียบกับค่าความต่างทั้งด้านสูงกว่าหรือต่ำกว่าที่กำหนดเป็นคะแนน 0 และ 5 คะแนน และใช้การเทียบบัญญัติไตรยางศ์ดังนี้</p>\r\n\r\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานไม่เกินร้อยละ 10 กำหนดเป็นคะแนน 5</p>\r\n\r\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานตั้งแต่ร้อยละ 20 กำหนดเป็นคะแนน 0</p>\r\n\r\n<p>ค่าความแตกต่างทั้งด้านสูงกว่าหรือต่ำกว่าเกณฑ์มาตรฐานตั้งแต่ร้อยละ 10.01 และไม่เกินร้อยละ 20</p>\r\n\r\n<p>ให้นำมาเทียบบัญญัติไตรยางศ์ตามสูตรเพื่อเป็นคะแนนของหลักสูตรนั้นๆ</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 0, 0),
	(14, '1.5', 'การบริการนักศึกษาระดับปริญญาตรี', 'กระบวนการ', 2558, '3', 2, 1, '<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 1</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 2</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 3</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 4</p>\r\n			</td>\r\n			<td style="height:31px; width:128px">\r\n			<p>คะแนน 5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>1 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>2 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>3 - 4 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>5 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>6 ข้อ</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0, 0),
	(15, '1.6', 'กิจกรรมนักศึกษาระดับปริญญาตรี', 'กระบวนการ', 2558, '1', 2, 1, '<table border="1" cellpadding="0" cellspacing="0">\r\n	<tbody>\r\n		<tr>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 1</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 2</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 3</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 4</p>\r\n			</td>\r\n			<td style="height:28px; width:128px">\r\n			<p>คะแนน 5</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>1 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>2 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>3 - 4 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>5 ข้อ</p>\r\n			</td>\r\n			<td style="width:128px">\r\n			<p>มีการดำเนินการ</p>\r\n\r\n			<p>6 ข้อ</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0, 0),
	(16, '2.3', 'ผลงานทางวิชาการของอาจารย์ประจำและนักวิจัย', 'ผลลัพธ์', 2558, '1', 0, 2, '<p>โดยการแปลงค่าร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยเป็นคะแนนระหว่าง 0-5 เกณฑ์แบ่งกลุ่มตามสาขาวิชาดังนี้</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์และเทคโนโลยี</strong></p>\r\n\r\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 30 ขึ้นไป</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชาวิทยาศาสตร์สุขภาพ</strong></p>\r\n\r\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 30 ขึ้นไป</p>\r\n\r\n<p><strong>กลุ่มสาขาวิชามนุษยศาสตร์และสังคมศาสตร์</strong></p>\r\n\r\n<p>ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจำและนักวิจัยที่กำหนดไว้เป็นคะแนนเต็ม 5 = ร้อยละ 20 ขึ้นไป</p>\r\n\r\n<p><strong>สูตรการคํานวณ</strong></p>\r\n\r\n<p>1. คํานวณค่าร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัยตามสูตร&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย&nbsp; x&nbsp; 100</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;จำนวนอาจารย์ประจําและนักวิจัยทั้งหมด</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>2. แปลงค่าร้อยละที่คํานวณได้ในข้อ 1 เทียบกับคะแนนเต็ม 5</p>\r\n\r\n<p>คะแนนที่ได้ =&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย&nbsp; &nbsp;&nbsp;&nbsp;x&nbsp; 5</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ร้อยละของผลรวมถ่วงน้ำหนักของผลงานทางวิชาการของอาจารย์ประจําและนักวิจัย</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ที่กำหนดให้เป็นคะแนนเต็ม 5&nbsp;</p>\r\n', 1, 0, 0),
	(17, '13', 'ทดสอบ 1', 'ฟฟฟ', 2558, '1', 0, 1, '<p>ฟกหดฟดหก</p>\r\n', 1, 0, 0),
	(18, 'ทดสอบ2', 'ทดสอบ2', 'ทดสอบ2', 2558, '2', 0, 1, '<p>หกดฟหกดฟกด</p>\r\n', 0, 0, 0),
	(19, 'aaa', 'aaa', 'aaa', 2558, '2', 0, 1, '<p>aaaa</p>\r\n', 0, 0, 0),
	(20, 'asdf', 'asdfsdf', 'asdasdf', 2558, '2', 1, 1, '<p>adgasdgsd</p>\r\n', 0, 0, 0);
/*!40000 ALTER TABLE `indicator` ENABLE KEYS */;


-- Dumping structure for table research1.map_user_to_ref
DROP TABLE IF EXISTS `map_user_to_ref`;
CREATE TABLE IF NOT EXISTS `map_user_to_ref` (
  `user_id` int(11) DEFAULT NULL,
  `ref_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table research1.map_user_to_ref: ~83 rows (approximately)
DELETE FROM `map_user_to_ref`;
/*!40000 ALTER TABLE `map_user_to_ref` DISABLE KEYS */;
INSERT INTO `map_user_to_ref` (`user_id`, `ref_id`) VALUES
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(53, 1),
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
	(2, 3),
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
	(66, 7),
	(2, 7),
	(3, 7),
	(4, 7),
	(5, 7),
	(6, 7),
	(7, 7),
	(8, 7),
	(9, 7),
	(10, 7),
	(11, 7),
	(53, 7),
	(12, 7),
	(13, 7),
	(14, 7),
	(50, 7),
	(54, 7),
	(55, 7),
	(73, 3),
	(73, 6),
	(73, 7),
	(73, 9),
	(73, 11),
	(2, 2),
	(3, 2),
	(4, 2),
	(6, 2),
	(7, 2),
	(8, 2),
	(9, 2),
	(69, 2),
	(73, 2),
	(12, 2),
	(13, 2),
	(14, 2),
	(50, 2),
	(1, 3),
	(1, 5),
	(1, 7);
/*!40000 ALTER TABLE `map_user_to_ref` ENABLE KEYS */;


-- Dumping structure for table research1.master_sar
DROP TABLE IF EXISTS `master_sar`;
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

-- Dumping data for table research1.master_sar: ~3 rows (approximately)
DELETE FROM `master_sar`;
/*!40000 ALTER TABLE `master_sar` DISABLE KEYS */;
INSERT INTO `master_sar` (`id`, `desc`, `c_date`, `institution`, `faculty`, `department`, `ref`) VALUES
	(1, 'Hello', '2015-08-30 14:42:33', 0, 0, 0, 0),
	(2, 'ปีการศึกษา 2558', '2015-06-26 12:07:07', 0, 0, 0, 0),
	(3, 'ปีการศึกษา 2559', '2015-10-10 15:09:07', 0, 0, 0, 1);
/*!40000 ALTER TABLE `master_sar` ENABLE KEYS */;


-- Dumping structure for table research1.ref
DROP TABLE IF EXISTS `ref`;
CREATE TABLE IF NOT EXISTS `ref` (
  `ref_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`ref_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Dumping data for table research1.ref: ~8 rows (approximately)
DELETE FROM `ref`;
/*!40000 ALTER TABLE `ref` DISABLE KEYS */;
INSERT INTO `ref` (`ref_id`, `username`, `password`, `status`, `detail`) VALUES
	(1, 'asdf', '912ec803b2ce49e4a541068d495ab570', -1, 'ฟกดฟหกเฟหกเฟหเasgdasdg'),
	(2, 'asdfaadsgasdg', '73496d1c12c670bafc92c4c6b8ddd0c5', 0, '124124124124'),
	(3, 'asdfasdasdg', '1295207f2a56642d5decf82e4af95794', 0, 'ฟกหฟหกเฟหกฟหกฟหกเฟหกเฟหกเฟหกฟหกเฟหกด'),
	(5, 'asdfagsdasdg', '5a6b7d16c906182e30fbfc9af10d149f', 0, 'asdgasdasdgadf'),
	(6, 'gasdasdasdfasdg', 'd707454f359f9fa26538dcfd9da6f799', 0, 'asdgasdgasdfasdf'),
	(7, 'Testset', '827ccb0eea8a706c4c34a16891f84e7b', 0, 'ผศ.ดร เรืองเดช วงหล้า'),
	(9, 'ฟหกเกหฟเ', 'd9b58ac2e2d0875258f4ca67e6587aa8', 0, 'ฟหกเฟกเห'),
	(11, 'asdfasdgasg', 'c787ef1210bd3c7da7d817923817d7d3', 0, 'agasdgdasdgadgs');
/*!40000 ALTER TABLE `ref` ENABLE KEYS */;


-- Dumping structure for table research1.resultuser
DROP TABLE IF EXISTS `resultuser`;
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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- Dumping data for table research1.resultuser: 18 rows
DELETE FROM `resultuser`;
/*!40000 ALTER TABLE `resultuser` DISABLE KEYS */;
INSERT INTO `resultuser` (`result_id`, `user_id`, `indicator_id`, `ref_id`, `score_user`, `comment_user`, `score_ref`, `comment_ref`) VALUES
	(13, 12, 15, 0, 3, 'ใฟาห่กดสฟหาก่สาฟ่หกเสฟหก่ด้สาฟหก้เฟหกดฟหกด', 0, ''),
	(10, 12, 1, 7, 4, 'ทดสอบasdgasgasdg', 1, ''),
	(11, 12, 5, 0, 5, 'asdgasdgasdg', 0, ''),
	(12, 12, 7, 0, 2, 'asdgasdgasdg', 0, ''),
	(14, 12, 12, 0, 5, '0', 0, ''),
	(17, 12, 13, 7, 5, '', 1, 'ไม่มีคะแนนให'),
	(16, 2, 9, 7, 0, '', 3, 'ฟสหาก่สฟหาก่าวฟสหกดฟสหกวเาฟหกเ'),
	(18, 2, 1, 7, 0, '', 2, ''),
	(19, 2, 5, 7, 0, '', 1, ''),
	(20, 2, 3, 7, 0, '', 5, ''),
	(21, 2, 2, 7, 0, '', 5, ''),
	(22, 2, 4, 7, 0, '', 1, ''),
	(23, 12, 9, 0, 5, '', 0, ''),
	(24, 12, 14, 0, 4.1, '', 0, ''),
	(25, 12, 2, 0, 2.34, '', 0, ''),
	(26, 1, 7, 0, 5, 'asdasdfasdf', 0, ''),
	(27, 1, 6, 0, 5, 'asgdasdgasdg', 0, ''),
	(28, 1, 5, 0, 5, 'asgdasdasdf', 0, '');
/*!40000 ALTER TABLE `resultuser` ENABLE KEYS */;


-- Dumping structure for table research1.subindicator
DROP TABLE IF EXISTS `subindicator`;
CREATE TABLE IF NOT EXISTS `subindicator` (
  `subindicator_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subindicator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table research1.subindicator: 24 rows
DELETE FROM `subindicator`;
/*!40000 ALTER TABLE `subindicator` DISABLE KEYS */;
INSERT INTO `subindicator` (`subindicator_id`, `indicator_id`, `detail`) VALUES
	(1, 4, '<p>asdgasdgasdg</p>\r\n'),
	(2, 1, '<p>ผลการบริหารจัดการหลักสูตรโดยรวม</p>\r\n'),
	(3, 5, '<p>ฟหกเฟหกฟหกดฟหกฟหกเฟหกเฟหกเ</p>\r\n'),
	(4, 11, '<p>gasdgasdgasdfasdgasdfsadgasdgasg</p>\r\n'),
	(5, 9, '<p>อาจารย์ประจำคณะที่มีคุณวุฒิปริญญาเอก</p>\r\n'),
	(6, 12, '<p>อาจารย์ประจำคณะที่ดำรงตำแหน่งทางวิชาการ</p>\r\n'),
	(7, 14, '<p>จัดบริการให้คำปรึกษาทางวิชาการ และการใช้ชีวิตแก่นักศึกษาในคณะ</p>\r\n'),
	(8, 14, '<p>มีการให้ข้อมูลของหน่วยงานที่ให้บริการ กิจกรรมพิเศษนอกหลักสูตร แหล่งงานทั้งเต็มเวลาและนอกเวลาแก่นักศึกษา</p>\r\n'),
	(9, 14, '<p>จัดกิจกรรมเตรียมความพร้อมเพื่อการทำงานเมื่อสำเร็จการศึกษาแก่นักศึกษา</p>\r\n'),
	(10, 14, '<p>ประเมินคุณภาพของการจัดกิจกรรมและการจัดบริการในข้อ 1-3 ทุกข้อไม่ต่ำกว่า 3.51 จากคะแนนเต็ม 5</p>\r\n'),
	(11, 14, '<p>นำผลการประเมินจากข้อ 4 มาปรับปรุงพัฒนาการให้บริการและการให้ข้อมูล เพื่อส่งให้ผลการประเมินสูงขึ้นหรือเป็นไปตามความคาดหวังของนักศึกษา</p>\r\n'),
	(12, 14, '<p>ให้ข้อมูลและความรู้ที่เป็นประโยชน์ในการประกอบอาชีพแก่ศิษย์เก่า</p>\r\n'),
	(13, 15, '<p>จัดทำแผนการจัดกิจกรรมพัฒนานักศึกษาในภาพรวมของคณะโดยให้นักศึกษามีส่วนร่วมในการจัดทำแผนและการจัดกิจกรรม</p>\r\n'),
	(14, 15, '<p>ในแผนการจัดกิจกรรมพัฒนานักศึกษา ให้ดำเนินกิจกรรมที่ ส่งเสริมคุณลักษณะบัณฑิตตามมาตรฐานผลการเรียนรู้ตามกรอบมาตรฐานคุณวุฒิแห่งชาติ 5 ประการ ให้ครบถ้วน ประกอบด้วย</p>\r\n\r\n<p>(1) คุณธรรม จริยธรรม</p>\r\n\r\n<p>(2) ความรู้</p>\r\n\r\n<p>(3) ทักษะทางปัญญา</p>\r\n\r\n<p>(4) ทักษะความสัมพันธ์ระหว่างบุคคลและความรับผิดชอบ</p>\r\n\r\n<p>(5) ทักษะการวิเคราะห์เชิงตัวเลข การสื่อสารและการใช้เทคโนโลยีสารสนเทศ</p>\r\n'),
	(15, 15, '<p>จัดกิจกรรมให้ความรู้และทักษะการประกันคุณภาพแก่นักศึกษา</p>\r\n'),
	(16, 15, '<p>ทุกกิจกรรมที่ดำเนินการ มีการประเมินผลความสำเร็จตามวัตถุประสงค์ของกิจกรรมและนำผลการประเมินมาปรับปรุงการดำเนินงานครั้งต่อไป</p>\r\n'),
	(17, 15, '<p>ประเมินความสำเร็จตามวัตถุประสงค์ของแผนการจัดกิจกรรมพัฒนานักศึกษา</p>\r\n'),
	(18, 15, '<p>นำผลการประเมินไปปรับปรุงแผนหรือปรับปรุงการจัดกิจกรรมเพื่อพัฒนานักศึกษา</p>\r\n'),
	(19, 2, '<p>มีระบบสารสนเทศเพื่อการบริหารงานวิจัยที่สามารถนำไปใช้ประโยชน์ในการบริหารงานวิจัยหรืองานสร้างสรรค์</p>\r\n'),
	(20, 2, '<p>สนับสนุนพันธกิจด้านการวิจัยหรืองานสร้างสรรค์ในประเด็นต่อไปนี้</p>\r\n\r\n<p>- ห้องปฏิบัติการหรือห้องปฏิบัติงานสร้างสรรค์ หรือหน่วยวิจัย หรือศูนย์เครื่องมือ หรือศูนย์ให้คำปรึกษาและสนับสนุนการวิจัยหรืองานสร้างสรรค์</p>\r\n\r\n<p>- ห้องสมุดหรือแหล่งค้นคว้าข้อมูลสนับสนุนการวิจัยหรืองานสร้างสรรค์</p>\r\n\r\n<p>- สิ่งอำนวยความสะดวกหรือการรักษาความปลอดภัยในการวิจัยหรือการผลิตงานสร้างสรรค์เช่น ระบบเทคโนโลยีสารสนเทศ ระบบรักษาความปลอดภัยในห้องปฏิบัติการ</p>\r\n\r\n<p>- กิจกรรมวิชาการที่ส่งเสริมงานวิจัยหรืองานสร้างสรรค์ เช่น การจัดประชุมวิชาการ การจัดแสดงงานสร้างสรรค์ การจัดให้มีศาสตราจารย์อาคันตุกะหรือศาสตราจารย์รับเชิญ (visiting professor)</p>\r\n'),
	(21, 2, '<p>จัดสรรงบประมาณ เพื่อเป็นทุนวิจัยหรืองานสร้างสรรค์</p>\r\n'),
	(22, 2, '<p>จัดสรรงบประมาณเพื่อสนับสนุนการเผยแพรผลงานวิจัยหรืองานสร้างสรรค์ ในการประชุมวิชาการหรือการตีพิมพ์ในวารสารระดับชาติหรือนานาชาติ</p>\r\n'),
	(23, 2, '<p>มีการพัฒนาสมรรถนะอาจารย์และนักวิจัย มีการสร้างขวัญและกำลังใจตลอดจนยกย่องอาจารย์และนักวิจัยที่มีผลงานวิจัยหรืองานสร้างสรรค์ดีเด่น</p>\r\n'),
	(24, 2, '<p>มีระบบและกลไกเพื่อช่วยในการคุ้มครองสิทธิ์ของงานวิจัยหรืองานสร้างสรรค์ ที่นำไปใช้ประโยชน์และดำเนินการตามระบบที่กำหนด</p>\r\n');
/*!40000 ALTER TABLE `subindicator` ENABLE KEYS */;


-- Dumping structure for table research1.subindicator_doc
DROP TABLE IF EXISTS `subindicator_doc`;
CREATE TABLE IF NOT EXISTS `subindicator_doc` (
  `subindicator_doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `subindicator_id` int(11) NOT NULL,
  `document` text COLLATE utf8_bin,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`subindicator_id`),
  UNIQUE KEY `subindicator_doc_id` (`subindicator_doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table research1.subindicator_doc: ~31 rows (approximately)
DELETE FROM `subindicator_doc`;
/*!40000 ALTER TABLE `subindicator_doc` DISABLE KEYS */;
INSERT INTO `subindicator_doc` (`subindicator_doc_id`, `user_id`, `indicator_id`, `subindicator_id`, `document`, `create_date`) VALUES
	(1, 1, 1, 2, 'ฤฤฤฤ', '2015-07-16 11:50:25'),
	(31, 1, 5, 3, 'wgasdfasdgasdg', '2015-10-19 21:17:58'),
	(2, 1, 9, 5, 'gGaASasdASD', '2015-07-17 11:37:16'),
	(3, 1, 12, 6, 'asdglasdglaksdjghalksdfasdf\nasdg;asldklgjasd\ngasjdg;asldkgj;asdg\nasdgas;dlgkjasd;laksdjf', '2015-06-30 14:27:04'),
	(4, 1, 14, 7, 'a', '2015-06-30 15:52:55'),
	(5, 1, 14, 8, 'aa', '2015-06-30 15:53:02'),
	(6, 1, 14, 9, 'aa', '2015-06-30 15:50:19'),
	(7, 1, 14, 12, 'gFFDSGASDGASDG', '2015-06-30 16:15:11'),
	(13, 1, 15, 13, 'asdgasdgasdgasdg', '2015-07-20 10:38:08'),
	(14, 1, 15, 14, 'asdfasdf', '2015-07-20 10:38:19'),
	(15, 1, 15, 15, 'asdgasdg', '2015-07-20 10:45:17'),
	(16, 1, 15, 16, 'asdgasdgasdg', '2015-07-20 10:45:22'),
	(17, 1, 15, 17, 'adsgsadgasdg', '2015-07-20 10:45:27'),
	(18, 1, 15, 18, 'adsgasdgasdgasdg', '2015-07-22 11:47:43'),
	(8, 1, 2, 19, 'วสาฟ่กดวฟาก่ดฟวเกาฟ่หกสเฟหา่สดาฟห่กสดฟ่หากดฟ\nหกเฟวหสาก่เฟวหกสา่ดฟหก\nเ่ฟหกวดสา่ฟหกวสฟา่หกด', '2015-07-16 22:18:41'),
	(9, 1, 2, 20, 'BBBBBBBB', '2015-07-16 16:52:52'),
	(10, 1, 2, 21, 'CCCCCCCC', '2015-07-16 16:52:56'),
	(11, 1, 2, 23, 'DDDDDDDDDDDDDDDD', '2015-07-16 16:53:00'),
	(12, 1, 2, 24, 'EEEEEEEEEEEEEEEEEEE', '2015-07-16 16:53:03'),
	(26, 12, 1, 2, 'asdgasdgasdgasdgasdgasdgasdgasdgasdgasdgasdgasdg', '2015-10-02 13:47:22'),
	(24, 12, 9, 5, 'asdgasdgasdasdasdfฟกเฟหกเฟหกเ', '2015-10-02 13:48:27'),
	(27, 12, 15, 13, 'ทดสอบ', '2015-10-10 12:38:19'),
	(28, 12, 15, 14, 'ทดสอบ', '2015-10-10 12:38:22'),
	(29, 12, 15, 15, 'ทดสอบ', '2015-10-10 12:38:25'),
	(30, 12, 15, 18, 'ทดสอบ', '2015-10-10 12:38:30'),
	(22, 69, 4, 1, 'asdgasdgasdgasdg', '2015-08-30 15:17:47'),
	(20, 69, 1, 2, 'adsgasdasdgagหกเฟหกเฟหกเฟหก\nฟหกเฟหกเฟหกเฟเฟหกดฟหกดก', '2015-09-25 15:50:17'),
	(21, 69, 5, 3, 'zdafAasfASF', '2015-08-30 15:10:36'),
	(19, 69, 9, 5, 'ทดสอบ', '2015-07-31 22:42:23'),
	(23, 69, 2, 19, 'agsdgasdfasdfasdfadsgasdgasdg', '2015-09-29 10:58:59'),
	(25, 69, 2, 20, 'asdgasdgasdfagdasdgad', '2015-09-29 10:59:09');
/*!40000 ALTER TABLE `subindicator_doc` ENABLE KEYS */;


-- Dumping structure for table research1.user
DROP TABLE IF EXISTS `user`;
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

-- Dumping data for table research1.user: ~27 rows (approximately)
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


-- Dumping structure for view research1.user_ref
DROP VIEW IF EXISTS `user_ref`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `user_ref` (
	`user_id` INT(11) NOT NULL,
	`username` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`password` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`detail` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`level` INT(11) NOT NULL,
	`status` INT(1) NOT NULL,
	`user_ref` INT(11) NOT NULL,
	`parrent_detail` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


-- Dumping structure for view research1.user_ref
DROP VIEW IF EXISTS `user_ref`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `user_ref`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `user_ref` AS select users.*, parent.detail as parrent_detail
  from user as users
  join user as parent on parent.user_id = users.user_ref ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
