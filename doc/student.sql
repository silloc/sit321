-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 18 日 10:31
-- 服务器版本: 5.5.38
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `student`
--

-- --------------------------------------------------------

--
-- 表的结构 `evaluate`
--

CREATE TABLE IF NOT EXISTS `evaluate` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `su_id` int(4) NOT NULL,
  `tu_id` int(4) NOT NULL,
  `evalue` varchar(299) COLLATE gb2312_bin NOT NULL,
  `times` varchar(25) COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `evaluate`
--

INSERT INTO `evaluate` (`id`, `su_id`, `tu_id`, `evalue`, `times`) VALUES
(1, 3, 2, '好啊好啊这个学生', '2013-04-19'),
(3, 12, 2, '老师对学生的评价', '2017-04-18');

-- --------------------------------------------------------

--
-- 表的结构 `grade`
--

CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `gname` varchar(200) COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `grade`
--

INSERT INTO `grade` (`id`, `gname`) VALUES
(1, '1-101'),
(2, '1-101'),
(3, '1-102'),
(4, '1-103'),
(5, '1-104'),
(6, '1-105'),
(7, '1-106'),
(8, '1-107'),
(9, '1-108'),
(10, '1-109'),
(11, '1-110'),
(12, '1-110'),
(13, '1-110'),
(14, '1-110'),
(15, '1-110'),
(16, '1-111'),
(17, '1-111'),
(18, '1-109'),
(19, '1-114'),
(20, '1-113'),
(21, '1-111'),
(22, '1-116'),
(23, '1-117');

-- --------------------------------------------------------

--
-- 表的结构 `health`
--

CREATE TABLE IF NOT EXISTS `health` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `height` varchar(10) COLLATE gb2312_bin NOT NULL,
  `weight` varchar(10) COLLATE gb2312_bin NOT NULL,
  `bust` varchar(10) COLLATE gb2312_bin NOT NULL,
  `vc` varchar(10) COLLATE gb2312_bin NOT NULL,
  `vision_left` varchar(10) COLLATE gb2312_bin NOT NULL,
  `vision_right` varchar(18) COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `health`
--

INSERT INTO `health` (`id`, `user_id`, `height`, `weight`, `bust`, `vc`, `vision_left`, `vision_right`) VALUES
(1, 3, '175', '65', '110', '4600', '5.0', '5.1'),
(6, 8, '', '', '', '', '', ''),
(7, 12, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `home`
--

CREATE TABLE IF NOT EXISTS `home` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `title` varchar(80) COLLATE gb2312_bin NOT NULL,
  `name` varchar(80) COLLATE gb2312_bin NOT NULL,
  `work` varchar(200) COLLATE gb2312_bin NOT NULL,
  `telephone` varchar(25) COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `home`
--

INSERT INTO `home` (`id`, `user_id`, `title`, `name`, `work`, `telephone`) VALUES
(1, 3, '父子', '爱到疯', '阿达', '111111'),
(2, 3, '母子', '阿斗', '阿发但是', '111111');

-- --------------------------------------------------------

--
-- 表的结构 `plugin_classes_01`
--

CREATE TABLE IF NOT EXISTS `plugin_classes_01` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kch` varchar(20) COLLATE gb2312_bin DEFAULT NULL COMMENT '课程号',
  `kxh` varchar(10) COLLATE gb2312_bin DEFAULT NULL COMMENT '课序号',
  `kcm` varchar(80) COLLATE gb2312_bin DEFAULT NULL COMMENT '程名课',
  `ywkcm` varchar(150) COLLATE gb2312_bin DEFAULT NULL COMMENT '文英课程名',
  `xf` varchar(12) COLLATE gb2312_bin DEFAULT NULL COMMENT '分学',
  `kcsx` varchar(20) COLLATE gb2312_bin DEFAULT NULL COMMENT '课程属性',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `plugin_classes_01`
--

INSERT INTO `plugin_classes_01` (`id`, `kch`, `kxh`, `kcm`, `ywkcm`, `xf`, `kcsx`) VALUES
(1, '020301', '1', '国家英语4级', 'CET4', '0', '任选'),
(2, '0800200', '01', '高速信息公路与因特网', 'international', '2', '必选');

-- --------------------------------------------------------

--
-- 表的结构 `plugin_classes_02`
--

CREATE TABLE IF NOT EXISTS `plugin_classes_02` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `weeks` int(4) DEFAULT NULL COMMENT '周',
  `section` int(4) DEFAULT NULL COMMENT '节',
  `course` varchar(50) COLLATE gb2312_bin DEFAULT NULL COMMENT '程课名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `plugin_classes_02`
--

INSERT INTO `plugin_classes_02` (`id`, `weeks`, `section`, `course`) VALUES
(1, 1, 1, '嵌入式'),
(4, 2, 1, '大学英语'),
(5, 3, 2, '体育');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(8) COLLATE gb2312_bin NOT NULL,
  `role_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin COMMENT='权限表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `role_name`, `role_id`) VALUES
(1, 'Admin', 0),
(2, 'Lecturer', 1),
(3, 'Student', 2);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `studentcode` varchar(50) COLLATE gb2312_bin NOT NULL,
  `studentno` varchar(50) COLLATE gb2312_bin NOT NULL,
  `name` varchar(80) COLLATE gb2312_bin NOT NULL,
  `grade` int(4) NOT NULL,
  `telehpon` bigint(25) NOT NULL DEFAULT '0',
  `homeadd` varchar(200) COLLATE gb2312_bin NOT NULL,
  `postaladdress` varchar(200) COLLATE gb2312_bin NOT NULL,
  `address` varchar(200) COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `user_id`, `studentcode`, `studentno`, `name`, `grade`, `telehpon`, `homeadd`, `postaladdress`, `address`) VALUES
(1, 3, '123121231111', 'xs', '小王', 4, 0, '家庭住址1', '通讯地址2', '现住地址3'),
(5, 8, '', 'xs1000', '', 0, 0, '', '', ''),
(6, 12, '', 'xs10002', '王小命', 1, 0, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL,
  `name` varchar(200) COLLATE gb2312_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`, `name`) VALUES
(1, 2, '王五'),
(4, 11, ''),
(5, 13, '');

-- --------------------------------------------------------

--
-- 表的结构 `tforc`
--

CREATE TABLE IF NOT EXISTS `tforc` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tid` int(4) NOT NULL,
  `cid` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `tforc`
--

INSERT INTO `tforc` (`id`, `tid`, `cid`) VALUES
(1, 2, 1),
(2, 2, 3),
(3, 2, 4),
(4, 2, 5),
(5, 2, 6),
(6, 11, 1),
(7, 2, 14);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) COLLATE gb2312_bin NOT NULL,
  `password` varchar(200) COLLATE gb2312_bin NOT NULL,
  `role_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gb2312 COLLATE=gb2312_bin AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'js100', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'xs', 'e10adc3949ba59abbe56e057f20f883e', 2),
(8, 'xs1000', 'e10adc3949ba59abbe56e057f20f883e', 2),
(11, 'js10000', 'e10adc3949ba59abbe56e057f20f883e', 1),
(12, 'xs10002', 'e10adc3949ba59abbe56e057f20f883e', 2),
(13, 'js10002', 'e10adc3949ba59abbe56e057f20f883e', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
