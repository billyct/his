-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 11 月 02 日 16:19
-- 服务器版本: 5.5.16
-- PHP 版本: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `his`
--

-- --------------------------------------------------------

--
-- 表的结构 `t_case`
--

CREATE TABLE IF NOT EXISTS `t_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_talk` text NOT NULL,
  `doctor_talk` text NOT NULL,
  `patient_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `t_case`
--

INSERT INTO `t_case` (`id`, `patient_talk`, `doctor_talk`, `patient_id`, `reg_id`) VALUES
(2, '感冒头疼，流鼻涕', '快用芬必得，治感冒疗效好', 10, 1),
(3, '脚麻了', '快用joomla', 10, 2);

-- --------------------------------------------------------

--
-- 表的结构 `t_case_drug`
--

CREATE TABLE IF NOT EXISTS `t_case_drug` (
  `case_id` int(11) NOT NULL,
  `drug_id` int(11) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_case_drug`
--

INSERT INTO `t_case_drug` (`case_id`, `drug_id`, `sum`) VALUES
(2, 1, 4),
(2, 3, 3),
(2, 5, 6),
(3, 1, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `t_depart`
--

CREATE TABLE IF NOT EXISTS `t_depart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `t_depart`
--

INSERT INTO `t_depart` (`id`, `depart_name`) VALUES
(0, '无科室'),
(3, '骨科'),
(8, '内科'),
(10, '外科'),
(11, '心脏科');

-- --------------------------------------------------------

--
-- 表的结构 `t_drug`
--

CREATE TABLE IF NOT EXISTS `t_drug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `sum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `t_drug`
--

INSERT INTO `t_drug` (`id`, `type`, `name`, `price`, `sum`) VALUES
(1, 1, '中药1', 11, 100),
(2, 1, '中药2', 11, 110),
(3, 2, '西药1', 11, 98),
(4, 2, '西药2', 12, 110),
(5, 3, '中成药1', 11, 104),
(7, 1, '中药3', 13, 110),
(8, 3, '中成药3', 13, 110),
(9, 1, '中药4', 10, 100);

-- --------------------------------------------------------

--
-- 表的结构 `t_drugfin`
--

CREATE TABLE IF NOT EXISTS `t_drugfin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `case_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `t_drugfin`
--

INSERT INTO `t_drugfin` (`id`, `case_id`) VALUES
(1, 2),
(2, 3),
(3, 3),
(4, 3);

-- --------------------------------------------------------

--
-- 表的结构 `t_patient`
--

CREATE TABLE IF NOT EXISTS `t_patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_card` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` int(1) NOT NULL,
  `age` int(5) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `t_patient`
--

INSERT INTO `t_patient` (`id`, `id_card`, `name`, `gender`, `age`, `address`, `phone`) VALUES
(10, '33100319910207237x', '卢仡', 1, 21, '浙江杭州', '111111111');

-- --------------------------------------------------------

--
-- 表的结构 `t_reg`
--

CREATE TABLE IF NOT EXISTS `t_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  `expert_id` int(11) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `flag_reg` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `t_reg`
--

INSERT INTO `t_reg` (`id`, `patient_id`, `flag`, `expert_id`, `depart_id`, `create_at`, `flag_reg`) VALUES
(1, 10, 3, 0, 10, '0000-00-00 00:00:00', 0),
(2, 10, 3, 0, 10, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `real_name` varchar(100) NOT NULL,
  `depart_id` int(11) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `real_name`, `depart_id`, `flag`) VALUES
(0, 'admin', '$1$Qu0.Z0/.$qQbQ43qtqHkoG.wLZlqjW1', '管理员', 0, 0),
(13, 'billyct', '$1$f70.655.$E6hlLlf6xuJAFHnk8rxlT0', '卢仡', 0, 1),
(29, 'fang', '$1$qw2.rs3.$cP0S7WzlKoiYmbrDLALFr0', '方存会', 0, 1),
(30, 'zhao', '$1$Uq2.Np5.$mK3sAybwr1pj6GJ36047U/', '赵宇略', 3, 3),
(31, 'zhou', '$1$wo4.3f5.$N8ucsvF8aWNJejjywnFHD1', '周杰伦', 0, 2),
(32, 'expert', '$1$Yy..B23.$D8ZTkxHmaFwmJDx5N3XUn/', '专家', 0, 1),
(33, 'nurse', '$1$0X0.HP0.$Bol8RjWdJGgamsW7gMwif.', '护士', 0, 2),
(34, 'doctor', '$1$E6..725.$hvDkiMOqhhZG5OQfetQH50', '医生', 10, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
