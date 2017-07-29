-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 �?07 �?28 �?09:43
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `kuyu`
--

-- --------------------------------------------------------

--
-- 表的结构 `table_admin_account`
--

CREATE TABLE IF NOT EXISTS `table_admin_account` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '账号id',
  `admin_user` varchar(255) NOT NULL COMMENT '用户名',
  `admin_pass` varchar(255) NOT NULL COMMENT '密码',
  `admin_phone` varchar(60) NOT NULL COMMENT '电话',
  `admin_state` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '登录状态;0->未登录,1->已登录',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员账号表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `table_admin_account`
--

INSERT INTO `table_admin_account` (`admin_id`, `admin_user`, `admin_pass`, `admin_phone`, `admin_state`) VALUES
(1, 'admin', 'adminkuyu', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `table_sub_exa`
--

CREATE TABLE IF NOT EXISTS `table_sub_exa` (
  `exa_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录ID',
  `sub_id` int(11) NOT NULL COMMENT '提交人ID',
  `exa_type` enum('sup') NOT NULL COMMENT '审核类型',
  `sub_create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '提交时间',
  `admin_id` int(11) NOT NULL COMMENT '审核人ID',
  `exa_update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '处理时间',
  `exa_state` tinyint(4) NOT NULL COMMENT '审核状态',
  PRIMARY KEY (`exa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='提交审核表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `table_sup_info`
--

CREATE TABLE IF NOT EXISTS `table_sup_info` (
  `sup_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '供应商编号',
  `sup_name` varchar(255) NOT NULL COMMENT '供应商名称',
  `sup_cont` varchar(60) NOT NULL COMMENT '负责人',
  `sup_phone` varchar(60) NOT NULL COMMENT '负责人电话',
  `sup_addr` varchar(255) NOT NULL COMMENT '地址',
  `sup_legal` varchar(60) NOT NULL COMMENT '法人姓名',
  `sup_legal_sn` varchar(60) NOT NULL COMMENT '法人身份证号',
  `sup_legal_img` varchar(255) NOT NULL COMMENT ' 法人身份证电子版',
  `sup_lice_sn` varchar(60) NOT NULL COMMENT '营业执照注册号',
  `sup_lice_img` varchar(255) NOT NULL COMMENT '营业执照电子版',
  `sup_lice_addr` varchar(255) NOT NULL COMMENT '营业执照所在地',
  `sup_add_date` date NOT NULL COMMENT '成立日期',
  `sup_term_start` date NOT NULL COMMENT '营业期限(开始)',
  `sup_term_end` date NOT NULL COMMENT '营业期限(结束)',
  `sup_cap` int(10) NOT NULL COMMENT '注册资本(万元)',
  `sup_scope` varchar(255) NOT NULL COMMENT '经营范围',
  `sup_comp_loca` varchar(255) NOT NULL COMMENT '公司所在地',
  `sup_comp_addr` varchar(255) NOT NULL COMMENT '公司详细地址',
  `sup_comp_phone` varchar(60) NOT NULL COMMENT ' 公司电话',
  `sup_sos_name` varchar(60) NOT NULL COMMENT '紧急联系人',
  `sup_sos_phone` varchar(60) NOT NULL COMMENT '紧急联系电话',
  PRIMARY KEY (`sup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='供应商信息表' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
