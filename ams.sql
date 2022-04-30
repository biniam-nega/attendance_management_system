-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Nov 27, 2020 at 07:04 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `ams`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `password`
-- 

CREATE TABLE `password` (
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `password`
-- 

INSERT INTO `password` (`pass`) VALUES 
('Biniamincontrol1234');

-- --------------------------------------------------------

-- 
-- Table structure for table `students`
-- 

CREATE TABLE `students` (
  `ID` int(11) NOT NULL auto_increment,
  `student_id` varchar(6) NOT NULL,
  `stud_first_name` varchar(20) NOT NULL,
  `stud_last_name` varchar(20) NOT NULL,
  `section` int(2) NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `students`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `working_days`
-- 

CREATE TABLE `working_days` (
  `stud_id` int(11) NOT NULL,
  `day2_status` varchar(3) NOT NULL,
  `day3_status` varchar(3) NOT NULL,
  `day4_status` varchar(3) NOT NULL,
  `day5_status` varchar(3) NOT NULL,
  `day6_status` varchar(3) NOT NULL,
  `day9_status` varchar(3) NOT NULL,
  `day10_status` varchar(3) NOT NULL,
  `day11_status` varchar(3) NOT NULL,
  `day12_status` varchar(3) NOT NULL,
  `day13_status` varchar(3) NOT NULL,
  `day16_status` varchar(3) NOT NULL,
  `day17_status` varchar(3) NOT NULL,
  `day18_status` varchar(3) NOT NULL,
  `day19_status` varchar(3) NOT NULL,
  `day20_status` varchar(3) NOT NULL,
  `day23_status` varchar(3) NOT NULL,
  `day24_status` varchar(3) NOT NULL,
  `day25_status` varchar(3) NOT NULL,
  `day26_status` varchar(3) NOT NULL,
  `day27_status` varchar(3) NOT NULL,
  `day30_status` varchar(3) NOT NULL,
  `day31_status` varchar(3) NOT NULL,
  `day32_status` varchar(3) NOT NULL,
  `day33_status` varchar(3) NOT NULL,
  `day34_status` varchar(3) NOT NULL,
  `day37_status` varchar(3) NOT NULL,
  `day38_status` varchar(3) NOT NULL,
  `day39_status` varchar(3) NOT NULL,
  `day40_status` varchar(3) NOT NULL,
  `day41_status` varchar(3) NOT NULL,
  `day44_status` varchar(3) NOT NULL,
  `day45_status` varchar(3) NOT NULL,
  `day46_status` varchar(3) NOT NULL,
  `day47_status` varchar(3) NOT NULL,
  `day48_status` varchar(3) NOT NULL,
  `day51_status` varchar(3) NOT NULL,
  `day52_status` varchar(3) NOT NULL,
  `day53_status` varchar(3) NOT NULL,
  `day54_status` varchar(3) NOT NULL,
  `day55_status` varchar(3) NOT NULL,
  `day58_status` varchar(3) NOT NULL,
  `day59_status` varchar(3) NOT NULL,
  `day60_status` varchar(3) NOT NULL,
  `day61_status` varchar(3) NOT NULL,
  `day62_status` varchar(3) NOT NULL,
  `day65_status` varchar(3) NOT NULL,
  `day66_status` varchar(3) NOT NULL,
  `day67_status` varchar(3) NOT NULL,
  `day68_status` varchar(3) NOT NULL,
  `day69_status` varchar(3) NOT NULL,
  `day72_status` varchar(3) NOT NULL,
  `day73_status` varchar(3) NOT NULL,
  `day74_status` varchar(3) NOT NULL,
  `day75_status` varchar(3) NOT NULL,
  `day76_status` varchar(3) NOT NULL,
  `day79_status` varchar(3) NOT NULL,
  `day80_status` varchar(3) NOT NULL,
  `day81_status` varchar(3) NOT NULL,
  `day82_status` varchar(3) NOT NULL,
  `day83_status` varchar(3) NOT NULL,
  `day86_status` varchar(3) NOT NULL,
  `day87_status` varchar(3) NOT NULL,
  `day88_status` varchar(3) NOT NULL,
  `day89_status` varchar(3) NOT NULL,
  `day90_status` varchar(3) NOT NULL,
  `day93_status` varchar(3) NOT NULL,
  PRIMARY KEY  (`stud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `working_days`
-- 

