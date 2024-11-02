-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 10:14 AM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u626267807_eyecare`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` varchar(50) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `random_id` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city_name`, `random_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'Los Angeles', '659fbac754', '2024-01-11 09:54:15', '2024-01-12 09:55:06'),
(2, '2', 'Atlanta', '659fbae537', '2024-01-11 09:54:45', '2024-01-12 09:55:10'),
(3, '3', 'Norfolk', '659fbb07ce', '2024-01-11 09:55:19', '2024-01-12 09:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `familyhistory`
--

CREATE TABLE `familyhistory` (
  `columnId` bigint(20) UNSIGNED NOT NULL,
  `fieldName` varchar(55) NOT NULL,
  `displayFieldName` varchar(55) NOT NULL,
  `dispStatus` int(1) NOT NULL DEFAULT 1,
  `priority` int(3) NOT NULL,
  `whom` text NOT NULL,
  `familyMedStatus` int(11) NOT NULL DEFAULT 0,
  `randomId` varchar(40) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `familyhistory`
--

INSERT INTO `familyhistory` (`columnId`, `fieldName`, `displayFieldName`, `dispStatus`, `priority`, `whom`, `familyMedStatus`, `randomId`, `createdAt`, `updatedAt`, `updatedBy`) VALUES
(1, 'Blindness', 'Blindness', 1, 1, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:35:18', '2022-10-15 07:30:21', 'admin'),
(2, 'Cataracts', 'Cataracts', 1, 2, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(3, 'Corneal Problems', 'Corneal-Problems', 1, 3, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(4, 'Diabetes', 'Diabetes', 1, 4, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(5, 'Glaucoma', 'Glaucoma', 1, 5, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(6, 'Heart Disease', 'Heart-Disease', 1, 6, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(7, 'Lazy Eye', 'Lazy-Eye', 1, 7, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(8, 'Macular degeneration', 'Macular Degeneration', 1, 8, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:02', '2022-10-15 07:30:21', 'admin'),
(9, 'Retinal Detachment', 'Retinal-Detachment', 1, 9, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 14:43:55', '2022-10-15 07:30:21', 'admin'),
(10, 'others', 'others', 1, 10, 'Father,Mother,Uncle,Aunty', 0, '', '2022-10-04 15:29:31', '2022-10-15 07:30:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `familyhistory1`
--

CREATE TABLE `familyhistory1` (
  `columnId` bigint(20) UNSIGNED NOT NULL,
  `fieldName` varchar(55) NOT NULL,
  `displayFieldName` varchar(55) NOT NULL,
  `dispStatus` int(1) NOT NULL DEFAULT 1,
  `priority` int(3) NOT NULL,
  `whom` text NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `family_eye_history`
--

CREATE TABLE `family_eye_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_Id` varchar(10) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `codeval` varchar(10) NOT NULL,
  `familyMedStatus` varchar(50) NOT NULL,
  `familyMed_Id` varchar(10) NOT NULL,
  `whom` text NOT NULL,
  `randomId` varchar(20) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family_eye_history`
--

INSERT INTO `family_eye_history` (`id`, `patient_Id`, `patient_number`, `codeval`, `familyMedStatus`, `familyMed_Id`, `whom`, `randomId`, `createdAt`, `updatedAt`) VALUES
(1, 'PATIENT1', '1001', '', '0', '1', '', '65a133528c1', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(2, 'PATIENT1', '1001', '', '0', '2', '', '65a133528c2', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(3, 'PATIENT1', '1001', '', '0', '3', '', '65a133528c3', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(4, 'PATIENT1', '1001', '', '1', '4', 'Father', '65a133528c4', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(5, 'PATIENT1', '1001', '', '0', '5', '', '65a133528c5', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(6, 'PATIENT1', '1001', '', '0', '6', '', '65a133528c6', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(7, 'PATIENT1', '1001', '', '1', '7', 'Uncle', '65a133528c7', '0000-00-00 00:00:00', '2024-01-12 12:42:14'),
(8, 'PATIENT1', '1001', '', '0', '8', '', '65a133528c8', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(9, 'PATIENT1', '1001', '', '0', '9', '', '65a133528c9', '0000-00-00 00:00:00', '2024-01-12 12:40:50'),
(10, 'PATIENT1', '1001', '', '', '10', '', '65a133528c10', '0000-00-00 00:00:00', '2024-01-12 12:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `generalhealth`
--

CREATE TABLE `generalhealth` (
  `columnId` bigint(20) UNSIGNED NOT NULL,
  `fieldName` varchar(55) NOT NULL,
  `displayFieldName` varchar(55) NOT NULL,
  `type` text NOT NULL,
  `typevalues` text DEFAULT NULL,
  `randomId` varchar(40) NOT NULL,
  `dispStatus` int(1) NOT NULL DEFAULT 1,
  `priority` int(3) DEFAULT NULL,
  `genHealthStatus` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generalhealth`
--

INSERT INTO `generalhealth` (`columnId`, `fieldName`, `displayFieldName`, `type`, `typevalues`, `randomId`, `dispStatus`, `priority`, `genHealthStatus`, `createdAt`, `updatedAt`, `updatedBy`) VALUES
(1, 'Allergies', 'Allergies', 'None', NULL, '', 1, 1, 0, '2022-10-04 12:01:19', '2022-10-04 07:12:30', 'admin'),
(2, 'Arthritis', 'Arthritis', 'None', NULL, '', 1, 2, 0, '2022-10-04 12:04:13', '2022-10-04 07:12:32', 'admin'),
(3, 'Blood_Lymph', 'Blood/Lymph', 'None', NULL, '', 1, 3, 0, '2022-10-04 12:05:32', '2022-10-04 07:12:35', 'admin'),
(4, 'Broncchitis', 'Broncchitis', 'None', NULL, '', 1, 4, 0, '2022-10-04 12:07:56', '2022-10-04 07:12:37', 'admin'),
(5, 'Cancer', 'Cancer', 'Yes', 'throat,tongue', '', 1, 5, 0, '2022-10-04 12:08:30', '2022-10-04 09:45:32', ''),
(6, 'Cholesterol', 'Cholesterol/Lymph', 'None', NULL, '', 1, 6, 0, '2022-10-04 12:09:48', '2022-10-04 07:12:42', 'admin'),
(7, 'Diabetes', 'Diabetes', 'None', NULL, '', 1, 7, 0, '2022-10-04 12:09:48', '2022-10-04 07:12:44', 'admin'),
(8, 'Digestive', 'Digestive', 'None', NULL, '', 1, 8, 0, '2022-10-04 12:11:13', '2022-10-04 07:12:47', 'admin'),
(9, 'EarsNoseThroat', 'Ears/Nose,Throat', 'None', NULL, '', 1, 9, 0, '2022-10-04 12:11:13', '2022-10-04 07:12:49', 'admin'),
(10, 'Eczema Rashes', 'Eczema/Rashes', 'None', NULL, '', 1, 10, 0, '2022-10-04 12:12:15', '2022-10-04 07:29:46', 'admin'),
(11, 'Endocrine', 'Endocrine', 'None', NULL, '', 1, 11, 0, '2022-10-04 12:12:15', '2022-10-04 07:12:54', 'admin'),
(12, 'Genitourinary', 'Genitourinary', 'None', NULL, '', 1, 12, 0, '2022-10-04 12:59:25', '2022-10-04 07:39:19', 'admin'),
(13, 'High Blood Pressure', 'High-Blood-Pressure', 'None', NULL, '', 1, 13, 0, '2022-10-04 12:59:25', '2022-10-04 07:39:21', 'admin'),
(14, 'Integumentary(skin)', 'Integumentary-(skin)', 'None', NULL, '', 1, 14, 0, '2022-10-04 13:01:03', '2022-10-04 07:39:25', 'admin'),
(15, 'Kidney', 'Kidney', 'None', NULL, '', 1, 15, 0, '2022-10-04 13:01:03', '2022-10-04 07:39:27', 'admin'),
(16, 'Musde Bone', 'Musde-Bone', 'None', NULL, '', 1, 16, 0, '2022-10-04 13:02:00', '2022-10-04 07:39:30', 'admin'),
(17, 'Neurological', 'Neurological', 'None', NULL, '', 1, 17, 0, '2022-10-04 13:02:00', '2022-10-04 07:39:33', 'admin'),
(18, 'Psychological', 'Psychological', 'None', NULL, '', 1, 18, 0, '2022-10-04 13:04:01', '2022-10-04 07:39:36', 'admin'),
(19, 'Respiratory COPD Asthma etc.', 'Respiratory-COPD-Asthma etc.', 'None', NULL, '', 1, 19, 0, '2022-10-04 13:04:01', '2022-10-04 07:39:39', 'admin'),
(20, 'Sinus', 'Sinus', 'None', NULL, '', 1, 20, 0, '2022-10-04 13:05:03', '2022-10-04 07:39:42', 'admin'),
(21, 'Throat Infections', 'Throat-Infections', 'None', NULL, '', 1, 21, 0, '2022-10-04 13:05:03', '2022-10-04 07:39:44', 'admin'),
(22, 'Thyroid', 'Thyroid', 'None', NULL, '', 1, 22, 0, '2022-10-04 13:06:05', '2022-10-04 07:39:47', 'admin'),
(23, 'Unusual Weight Loss Gain', 'Unusual-Weight-Loss-Gain', 'None', NULL, '', 1, 23, 0, '2022-10-04 13:06:05', '2022-10-04 07:39:49', 'admin'),
(24, 'Currently Preganant', 'Currently-Preganant', 'None', NULL, '', 1, 24, 0, '2022-10-04 13:06:40', '2022-10-04 07:39:53', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `health_problems`
--

CREATE TABLE `health_problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genHealthStatus1` varchar(30) NOT NULL,
  `genHealthStatus2` varchar(30) NOT NULL,
  `genHealthStatus3` varchar(30) NOT NULL,
  `genHealthStatus4` varchar(30) NOT NULL,
  `genHealthStatus5` varchar(30) NOT NULL,
  `genHealthStatus6` varchar(30) NOT NULL,
  `genHealthStatus7` varchar(30) NOT NULL,
  `genHealthStatus8` varchar(30) NOT NULL,
  `genHealthStatus9` varchar(30) NOT NULL,
  `genHealthStatus10` varchar(30) NOT NULL,
  `genHealthStatus11` varchar(30) NOT NULL,
  `genHealthStatus12` varchar(30) NOT NULL,
  `genHealthStatus13` varchar(30) NOT NULL,
  `genHealthStatus14` varchar(30) NOT NULL,
  `genHealthStatus15` varchar(30) NOT NULL,
  `genHealthStatus16` varchar(30) NOT NULL,
  `genHealthStatus17` varchar(30) NOT NULL,
  `genHealthStatus18` varchar(30) NOT NULL,
  `genHealthStatus19` varchar(30) NOT NULL,
  `genHealthStatus20` varchar(30) NOT NULL,
  `genHealthStatus21` varchar(30) NOT NULL,
  `genHealthStatus22` varchar(30) NOT NULL,
  `genHealthStatus23` varchar(30) NOT NULL,
  `genHealthStatus24` varchar(30) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `randomId` varchar(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `encpassword` varchar(55) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `randomid` varchar(55) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`, `encpassword`, `user_type`, `randomid`, `status`, `created_at`) VALUES
(1, 'admin@brookwoodeyecare.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '62bc1ee2c', 1, '2022-06-29 09:45:58'),
(2, 'eyecare@gmail.com', 'focus9', '97ec5d85c120c683d94bf3d946aba5a4526b75e3', 'user', '', 1, '2022-09-17 07:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `ocularsymptoms`
--

CREATE TABLE `ocularsymptoms` (
  `columnId` bigint(20) UNSIGNED NOT NULL,
  `fieldName` varchar(55) NOT NULL,
  `displayFieldName` varchar(55) NOT NULL,
  `dispStatus` int(1) NOT NULL DEFAULT 1,
  `priority` int(3) NOT NULL,
  `type` text NOT NULL,
  `typevalues` text NOT NULL,
  `randomId` varchar(40) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedBy` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ocularsymptoms`
--

INSERT INTO `ocularsymptoms` (`columnId`, `fieldName`, `displayFieldName`, `dispStatus`, `priority`, `type`, `typevalues`, `randomId`, `createdAt`, `updatedAt`, `updatedBy`) VALUES
(1, 'BlurryVision', 'Blurry Vision', 1, 1, 'None', '', '', '2022-10-04 14:00:10', '2022-10-04 09:19:44', 'admin'),
(2, 'itchiness', 'itchiness', 1, 2, 'None', '', '', '2022-10-04 14:01:35', '2022-10-04 09:19:44', 'admin'),
(3, 'Burning', 'Burning', 1, 3, 'None', '', '', '2022-10-04 14:03:02', '2022-10-04 09:19:44', 'admin'),
(4, 'Grittiness', 'Grittiness', 1, 4, 'None', '', '', '2022-10-04 14:03:58', '2022-10-04 09:19:44', 'admin'),
(5, 'Dry Eyes', 'Dry_Eyes', 1, 5, 'None', '', '', '2022-10-04 14:05:02', '2022-10-04 09:19:44', 'admin'),
(6, 'Corneal Abrasion', 'Corneal-Abrasion', 1, 6, 'None', '', '', '2022-10-04 14:06:05', '2022-10-04 09:19:44', 'admin'),
(7, 'Crossed Eye/Eye Turn', 'Crossed-Eye/Eye-Turn', 1, 7, 'None', '', '', '2022-10-04 14:25:16', '2022-10-04 09:19:44', 'admin'),
(8, 'Lazy Eye', 'Lazy-Eye', 1, 8, 'None', '', '', '2022-10-04 14:25:16', '2022-10-04 09:19:44', 'admin'),
(9, 'Double Vision', 'Double-Vision', 1, 9, 'None', '', '', '2022-10-04 14:25:16', '2022-10-04 09:19:44', 'admin'),
(10, 'Eye Infections', 'Eye-Infections', 1, 10, 'None', '', '', '2022-10-04 14:25:16', '2022-10-04 09:19:44', 'admin'),
(11, 'Eye Injury', 'Eye-Injury', 1, 11, 'None', '', '', '2022-10-04 14:29:59', '2022-10-04 09:19:44', 'admin'),
(12, 'Eye Pain', 'Eye-Pain', 1, 12, 'None', '', '', '2022-10-04 14:29:59', '2022-10-04 09:19:44', 'admin'),
(13, 'Flashes Of Light', 'Flashes-Of-Lights', 1, 13, 'None', '', '', '2022-10-04 14:29:59', '2022-10-04 09:19:44', 'admin'),
(14, 'Floaters Spots', 'Floaters_Spots', 1, 14, 'None', '', '', '2022-10-04 14:35:55', '2022-10-04 09:19:44', 'admin'),
(15, 'Cataracts', 'Cataracts', 1, 15, 'None', '', '', '2022-10-04 14:35:55', '2022-10-04 09:19:44', 'admin'),
(16, 'Glaucoma', 'Glaucoma', 1, 16, 'None', '', '', '2022-10-04 14:35:55', '2022-10-04 09:19:44', 'admin'),
(17, 'Headaches', 'Headaches', 1, 17, 'None', '', '', '2022-10-04 14:38:17', '2022-10-04 09:19:44', 'admin'),
(18, 'Sunlight Sensitivity', 'Sunlight-Sensitivity', 1, 18, 'None', '', '', '2022-10-04 14:38:17', '2022-10-04 09:19:44', 'admin'),
(19, 'Iritis Uveitis', 'Iritis-Uveitis', 1, 19, 'None', '', '', '2022-10-04 14:38:17', '2022-10-04 09:19:44', 'admin'),
(20, 'Macular Degeneration', 'Macular-Degeneration', 1, 20, 'None', '', '', '2022-10-04 14:41:32', '2022-10-04 09:19:44', 'admin'),
(21, 'Eye Surgery', 'Eye-Surgery', 1, 21, 'None', '', '', '2022-10-04 14:41:32', '2022-10-04 09:19:44', 'admin'),
(22, 'Retinal Detachment Holes Tears', 'Retinal-Detachment-Holes-Tears', 1, 22, 'None', '', '', '2022-10-04 14:41:32', '2022-10-04 09:19:44', 'admin'),
(23, 'Tearing', 'Tearing', 1, 23, 'None', '', '', '2022-10-04 14:43:47', '2022-10-04 09:19:44', 'admin'),
(24, 'Trouble Seeing At Night?', 'Trouble-Seeing-At-Night?', 1, 24, 'None', '', '', '2022-10-04 14:43:47', '2022-10-04 09:19:44', 'admin'),
(25, 'Other Eye Disorder(s)', 'Other Eye Disorder(s)', 1, 25, 'None', '', '', '2022-10-04 14:43:47', '2022-10-04 09:19:44', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `office_details`
--

CREATE TABLE `office_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_Id` varchar(10) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `agree_tc` varchar(50) NOT NULL,
  `sign` varchar(250) NOT NULL,
  `date` varchar(20) NOT NULL,
  `patient_sign` varchar(50) NOT NULL,
  `codeval` varchar(10) NOT NULL,
  `randomId` varchar(10) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `office_details`
--

INSERT INTO `office_details` (`id`, `patient_Id`, `patient_number`, `agree_tc`, `sign`, `date`, `patient_sign`, `codeval`, `randomId`, `createdAt`, `updatedAt`) VALUES
(1, 'PATIENT1', '1001', 'agree_tc1,agree_tc2', 'signatures/signature2_124050.png', '2024-01-12', 'signatures/signature3_124050.png', '', '65a133528a', '0000-00-00 00:00:00', '2024-01-12 12:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `patient_eye_history`
--

CREATE TABLE `patient_eye_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_Id` varchar(10) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `dateOfLastEyeExam` varchar(100) NOT NULL,
  `doYouCurrentlyWearGlasses` varchar(100) NOT NULL,
  `doYouCurrentlyWearContacts` varchar(100) NOT NULL,
  `whatKind` varchar(100) NOT NULL,
  `solutionUsed` varchar(100) NOT NULL,
  `satisfied_vision` varchar(100) NOT NULL,
  `wouldYouPreferClear` varchar(100) NOT NULL,
  `doyouUseTheComputer` varchar(100) NOT NULL,
  `appr_hrs_day` varchar(100) NOT NULL,
  `ocupation` varchar(100) NOT NULL,
  `ocularsymptoms` varchar(50) NOT NULL,
  `codeval` varchar(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `createdBy` datetime NOT NULL DEFAULT current_timestamp(),
  `randomId` varchar(50) NOT NULL,
  `status` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_eye_history`
--

INSERT INTO `patient_eye_history` (`id`, `patient_Id`, `patient_number`, `dateOfLastEyeExam`, `doYouCurrentlyWearGlasses`, `doYouCurrentlyWearContacts`, `whatKind`, `solutionUsed`, `satisfied_vision`, `wouldYouPreferClear`, `doyouUseTheComputer`, `appr_hrs_day`, `ocupation`, `ocularsymptoms`, `codeval`, `createdAt`, `createdBy`, `randomId`, `status`) VALUES
(2, 'PATIENT1', '1001', '', 'No', 'No', '', '', '', '', '', '', '', '1', '', '2024-01-12 12:42:14', '2024-01-12 12:42:14', '65a133a6ea0', 0),
(3, 'PATIENT1', '1001', '', 'No', 'No', '', '', '', '', '', '', '', '21', '', '2024-01-12 12:42:14', '2024-01-12 12:42:14', '65a133a6ea1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient_master_table`
--

CREATE TABLE `patient_master_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_Id` varchar(10) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `toWhom` varchar(20) NOT NULL,
  `insSubscribers` varchar(20) NOT NULL,
  `codeval` varchar(20) NOT NULL,
  `pat_details_status` int(11) NOT NULL DEFAULT 0,
  `pat_medhst_status` int(11) NOT NULL DEFAULT 0,
  `pat_eyehst_status` int(11) NOT NULL DEFAULT 0,
  `fam_eyehst_status` int(11) NOT NULL DEFAULT 0,
  `office_det_status` int(11) NOT NULL DEFAULT 0,
  `createdAt` datetime NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `randomId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_master_table`
--

INSERT INTO `patient_master_table` (`id`, `patient_Id`, `patient_number`, `toWhom`, `insSubscribers`, `codeval`, `pat_details_status`, `pat_medhst_status`, `pat_eyehst_status`, `fam_eyehst_status`, `office_det_status`, `createdAt`, `updatedAt`, `randomId`) VALUES
(1, 'PATIENT1', '1001', '', 'MemberId', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2024-01-12 12:40:50', '65a133528a');

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_history`
--

CREATE TABLE `patient_medical_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_Id` varchar(10) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `physicianName` varchar(30) NOT NULL,
  `physicianCity` varchar(30) NOT NULL,
  `checkUplDate` varchar(30) NOT NULL,
  `currentMed` varchar(30) NOT NULL,
  `allergyMedication` varchar(30) NOT NULL,
  `allergyMedicationText` varchar(50) NOT NULL,
  `anySurgeries` varchar(30) NOT NULL,
  `asecigarettes` varchar(30) NOT NULL,
  `genHealth_Id` varchar(10) NOT NULL,
  `genHealthStatus` varchar(10) NOT NULL,
  `typevalue` varchar(10) NOT NULL,
  `codeval` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `randomId` varchar(15) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient_medical_history`
--

INSERT INTO `patient_medical_history` (`id`, `patient_Id`, `patient_number`, `physicianName`, `physicianCity`, `checkUplDate`, `currentMed`, `allergyMedication`, `allergyMedicationText`, `anySurgeries`, `asecigarettes`, `genHealth_Id`, `genHealthStatus`, `typevalue`, `codeval`, `status`, `randomId`, `createAt`, `updatedAt`) VALUES
(1, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '1', '1', '0', '', 0, '65a133528b1', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(2, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '2', '0', '0', '', 0, '65a133528b2', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(3, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '3', '0', '0', '', 0, '65a133528b3', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(4, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '4', '0', '0', '', 0, '65a133528b4', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(5, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '5', '0', '', '', 0, '65a133528b5', '2024-01-12 12:40:50', '2024-01-12 12:42:14'),
(6, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '6', '0', '0', '', 0, '65a133528b6', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(7, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '7', '1', '0', '', 0, '65a133528b7', '2024-01-12 12:40:50', '2024-01-12 12:42:14'),
(8, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '8', '0', '0', '', 0, '65a133528b8', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(9, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '9', '0', '0', '', 0, '65a133528b9', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(10, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '10', '0', '0', '', 0, '65a133528b10', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(11, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '11', '0', '0', '', 0, '65a133528b11', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(12, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '12', '0', '0', '', 0, '65a133528b12', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(13, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '13', '0', '0', '', 0, '65a133528b13', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(14, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '14', '0', '0', '', 0, '65a133528b14', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(15, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '15', '0', '0', '', 0, '65a133528b15', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(16, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '16', '0', '0', '', 0, '65a133528b16', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(17, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '17', '0', '0', '', 0, '65a133528b17', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(18, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '18', '0', '0', '', 0, '65a133528b18', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(19, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '19', '0', '0', '', 0, '65a133528b19', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(20, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '20', '0', '0', '', 0, '65a133528b20', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(21, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '21', '0', '0', '', 0, '65a133528b21', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(22, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '22', '0', '0', '', 0, '65a133528b22', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(23, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '23', '0', '0', '', 0, '65a133528b23', '2024-01-12 12:40:50', '2024-01-12 12:40:50'),
(24, 'PATIENT1', '1001', '', '', '', '', '', '', 'no', '', '24', '0', '0', '', 0, '65a133528b24', '2024-01-12 12:40:50', '2024-01-12 12:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `patient_reportdata`
--

CREATE TABLE `patient_reportdata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tablename` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patient_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ssn_no` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inserted_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `randomId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_reportdata`
--

INSERT INTO `patient_reportdata` (`id`, `patient_id`, `date`, `data`, `tablename`, `patient_number`, `ssn_no`, `inserted_date`, `randomId`) VALUES
(1, 'PATIENT1', '2023-12-01', '[{\"city_name\":\"Los Angeles\",\"state_name\":\"California\",\"id\":null,\"patient_Id\":\"PATIENT1\",\"toWhom\":\"\",\"patient_ssn\":\"1234\",\"patient_number\":\"1001\",\"insSubscribers\":\"MemberId\",\"codeval\":\"\",\"patientFname\":\"John\",\"plasLtname\":\"Wesley\",\"gender\":\"Male\",\"patDob\":\"1988-05-01\",\"homeph\":\"2135558523\",\"workNo\":\"\",\"cell\":\"2135558523\",\"email\":\"\",\"address\":\"California\",\"city\":\"1\",\"state\":\"1\",\"zipCode\":\"930001\",\"insFname\":\"\",\"insLname\":\"\",\"dob\":\"\",\"payment\":\"Groupon\",\"grouponcode\":\"11\",\"insurance\":\"\",\"office\":\"\",\"sign\":\"signatures/signature_124050.png\",\"date\":\"2023-12-01\",\"represent_name\":\"John Wesley\",\"selfcode\":\"\",\"pat_agree_tc\":\"pat_agree_tc2\",\"signature\":\"signatures/signature1_124050.png\",\"datePre\":\"2023-12-01\",\"status\":\"0\",\"randomId\":\"65a133528a\"}]', 'personal_information', '1001', '', '2024-01-12 12:42:14', '65a133a6e9'),
(2, 'PATIENT1', '2023-12-01', '[{\"id\":\"1\",\"towhom\":null,\"patient_Id\":\"PATIENT1\",\"patient_number\":\"1001\",\"patient_ssn\":\"1234\",\"insSubscribers\":\"MemberId\",\"codeval\":\"\",\"patientFname\":\"John\",\"plasLtname\":\"Wesley\",\"gender\":\"Male\",\"patDob\":\"1988-05-01\",\"homeph\":\"2135558523\",\"workNo\":\"\",\"cell\":\"2135558523\",\"email\":\"\",\"address\":\"California\",\"city\":\"1\",\"state\":\"1\",\"zipCode\":\"930001\",\"insFname\":\"\",\"insLname\":\"\",\"dob\":\"\",\"payment\":\"Groupon\",\"grouponcode\":\"11\",\"insurance\":\"\",\"office\":\"\",\"sign\":\"signatures/signature_124050.png\",\"date\":\"2023-12-01\",\"represent_name\":\"John Wesley\",\"pat_agree_tc\":\"pat_agree_tc2\",\"signature\":\"signatures/signature1_124050.png\",\"datePre\":\"2023-12-01\",\"status\":\"0\",\"randomId\":\"65a133528a\"}]', 'personal_information', '1001', '', '2024-01-12 12:42:14', '65a133a6e9'),
(3, 'PATIENT1', '2023-12-01', '[{\"columnId\":\"1\",\"genHealthStatus\":\"1\",\"displayFieldName\":\"Allergies\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"1\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b1\"},{\"columnId\":\"2\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Arthritis\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"2\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b2\"},{\"columnId\":\"3\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Blood/Lymph\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"3\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b3\"},{\"columnId\":\"4\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Broncchitis\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"4\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b4\"},{\"columnId\":\"5\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Cancer\",\"typevalues\":\"throat,tongue\",\"type\":\"Yes\",\"typevalue\":\"0\",\"genHealth_Id\":\"5\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b5\"},{\"columnId\":\"6\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Cholesterol/Lymph\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"6\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b6\"},{\"columnId\":\"7\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Diabetes\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"7\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b7\"},{\"columnId\":\"8\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Digestive\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"8\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b8\"},{\"columnId\":\"9\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Ears/Nose,Throat\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"9\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b9\"},{\"columnId\":\"10\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Eczema/Rashes\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"10\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b10\"},{\"columnId\":\"11\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Endocrine\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"11\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b11\"},{\"columnId\":\"12\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Genitourinary\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"12\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b12\"},{\"columnId\":\"13\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"High-Blood-Pressure\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"13\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b13\"},{\"columnId\":\"14\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Integumentary-(skin)\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"14\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b14\"},{\"columnId\":\"15\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Kidney\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"15\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b15\"},{\"columnId\":\"16\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Musde-Bone\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"16\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b16\"},{\"columnId\":\"17\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Neurological\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"17\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b17\"},{\"columnId\":\"18\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Psychological\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"18\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b18\"},{\"columnId\":\"19\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Respiratory-COPD-Asthma etc.\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"19\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b19\"},{\"columnId\":\"20\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Sinus\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"20\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b20\"},{\"columnId\":\"21\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Throat-Infections\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"21\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b21\"},{\"columnId\":\"22\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Thyroid\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"22\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b22\"},{\"columnId\":\"23\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Unusual-Weight-Loss-Gain\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"23\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b23\"},{\"columnId\":\"24\",\"genHealthStatus\":\"0\",\"displayFieldName\":\"Currently-Preganant\",\"typevalues\":null,\"type\":\"None\",\"typevalue\":\"0\",\"genHealth_Id\":\"24\",\"physicianName\":\"\",\"checkUplDate\":\"\",\"physicianCity\":\"\",\"currentMed\":\"\",\"allergyMedication\":\"\",\"allergyMedicationText\":\"\",\"anySurgeries\":\"no\",\"asecigarettes\":\"\",\"randomId\":\"65a133528b24\"}]', 'generalhealth', '1001', '', '2024-01-12 12:42:14', '65a133a6e9'),
(4, 'PATIENT1', '2023-12-01', '[{\"columnId\":\"1\",\"id\":\"1\",\"displayFieldName\":\"Blurry Vision\",\"priority\":\"1\",\"dispStatus\":\"1\",\"type\":\"None\",\"typevalues\":\"\",\"ocularsymptoms\":\"1\",\"dateOfLastEyeExam\":\"\",\"doYouCurrentlyWearGlasses\":\"No\",\"doYouCurrentlyWearContacts\":\"No\",\"whatKind\":\"\",\"solutionUsed\":\"\",\"satisfied_vision\":\"\",\"wouldYouPreferClear\":\"\",\"doyouUseTheComputer\":\"\",\"appr_hrs_day\":\"\",\"ocupation\":\"\",\"codeval\":\"\",\"randomId\":\"65a133528c0\"}]', 'patient_eye_history', '1001', '', '2024-01-12 12:42:14', '65a133a6e9'),
(5, 'PATIENT1', '2023-12-01', '[{\"columnId\":\"1\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Blindness\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c1\"},{\"columnId\":\"2\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Cataracts\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c2\"},{\"columnId\":\"3\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Corneal-Problems\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c3\"},{\"columnId\":\"4\",\"familyMedStatus\":\"1\",\"displayFieldName\":\"Diabetes\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"Father\",\"randomId\":\"65a133528c4\"},{\"columnId\":\"5\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Glaucoma\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c5\"},{\"columnId\":\"6\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Heart-Disease\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c6\"},{\"columnId\":\"7\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Lazy-Eye\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c7\"},{\"columnId\":\"8\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Macular Degeneration\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c8\"},{\"columnId\":\"9\",\"familyMedStatus\":\"0\",\"displayFieldName\":\"Retinal-Detachment\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c9\"},{\"columnId\":\"10\",\"familyMedStatus\":\"\",\"displayFieldName\":\"others\",\"whome\":\"Father,Mother,Uncle,Aunty\",\"whom\":\"\",\"randomId\":\"65a133528c10\"}]', 'familyhistory', '1001', '', '2024-01-12 12:42:14', '65a133a6e9'),
(6, 'PATIENT1', '2023-12-01', '[{\"id\":\"1\",\"patient_Id\":\"PATIENT1\",\"patient_number\":\"1001\",\"agree_tc\":\"agree_tc1,agree_tc2\",\"sign\":\"signatures/signature2_124050.png\",\"date\":\"2023-12-01\",\"patient_sign\":\"signatures/signature3_124050.png\",\"codeval\":\"\",\"randomId\":\"65a133528a\",\"createdAt\":\"0000-00-00 00:00:00\",\"updatedAt\":\"2024-01-12 12:40:50\"}]', 'office_details', '1001', '', '2024-01-12 12:42:14', '65a133a6e9');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

CREATE TABLE `personal_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_Id` varchar(10) NOT NULL,
  `toWhom` varchar(50) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `patient_ssn` varchar(10) NOT NULL,
  `insSubscribers` varchar(30) NOT NULL,
  `codeval` varchar(10) NOT NULL,
  `patientFname` varchar(50) NOT NULL,
  `plasLtname` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `patDob` varchar(20) NOT NULL,
  `homeph` varchar(10) NOT NULL,
  `workNo` varchar(10) NOT NULL,
  `cell` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zipCode` varchar(30) NOT NULL,
  `insFname` varchar(50) NOT NULL,
  `insLname` varchar(50) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `grouponcode` varchar(50) NOT NULL,
  `selfcode` varchar(50) NOT NULL,
  `insurance` varchar(55) NOT NULL,
  `office` varchar(30) NOT NULL,
  `sign` varchar(250) NOT NULL,
  `date` varchar(10) NOT NULL,
  `represent_name` varchar(50) NOT NULL,
  `pat_agree_tc` varchar(30) NOT NULL,
  `signature` varchar(250) NOT NULL,
  `datePre` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `randomId` varchar(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_information`
--

INSERT INTO `personal_information` (`id`, `patient_Id`, `toWhom`, `patient_number`, `patient_ssn`, `insSubscribers`, `codeval`, `patientFname`, `plasLtname`, `gender`, `patDob`, `homeph`, `workNo`, `cell`, `email`, `address`, `city`, `state`, `zipCode`, `insFname`, `insLname`, `dob`, `payment`, `grouponcode`, `selfcode`, `insurance`, `office`, `sign`, `date`, `represent_name`, `pat_agree_tc`, `signature`, `datePre`, `status`, `randomId`, `createdAt`, `updatedAt`) VALUES
(1, 'PATIENT1', '', '1001', '1234', 'MemberId', '', 'John', 'Wesley', 'Male', '1988-05-01', '2135558523', '', '2135558523', '', 'California', 'Los Angeles', '1', '930001', '', '', '', 'Groupon', '11', '', '', '', 'signatures/signature_124050.png', '2024-01-12', 'John Wesley', 'pat_agree_tc2', 'signatures/signature1_124050.png', '2024-01-12', 0, '65a133528a', '2024-01-12 12:40:50', '2024-01-12 12:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `relations_details`
--

CREATE TABLE `relations_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `towhom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relations_details`
--

INSERT INTO `relations_details` (`id`, `towhom`) VALUES
(1, 'Myself'),
(2, 'Wife'),
(3, 'Daughter'),
(4, 'Son'),
(5, 'Mother'),
(6, 'Father');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `random_id` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `random_id`, `created_at`, `updated_at`) VALUES
(1, 'California', '659fba9393', '2024-01-11 09:53:23', '2024-01-11 09:53:23'),
(2, 'Georgia', '659fba9fd5', '2024-01-11 09:53:35', '2024-01-11 09:53:35'),
(3, 'Virginia', '659fbab2d4', '2024-01-11 09:53:54', '2024-01-11 09:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `patient_Id` varchar(50) NOT NULL,
  `patient_number` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `familyhistory`
--
ALTER TABLE `familyhistory`
  ADD UNIQUE KEY `id` (`columnId`);

--
-- Indexes for table `familyhistory1`
--
ALTER TABLE `familyhistory1`
  ADD UNIQUE KEY `id` (`columnId`);

--
-- Indexes for table `family_eye_history`
--
ALTER TABLE `family_eye_history`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `constraint4` (`patient_Id`);

--
-- Indexes for table `generalhealth`
--
ALTER TABLE `generalhealth`
  ADD UNIQUE KEY `id` (`columnId`);

--
-- Indexes for table `health_problems`
--
ALTER TABLE `health_problems`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ocularsymptoms`
--
ALTER TABLE `ocularsymptoms`
  ADD UNIQUE KEY `id` (`columnId`);

--
-- Indexes for table `office_details`
--
ALTER TABLE `office_details`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `constraint5` (`patient_Id`);

--
-- Indexes for table `patient_eye_history`
--
ALTER TABLE `patient_eye_history`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `constraint2` (`patient_Id`);

--
-- Indexes for table `patient_master_table`
--
ALTER TABLE `patient_master_table`
  ADD PRIMARY KEY (`patient_Id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `patient_medical_history`
--
ALTER TABLE `patient_medical_history`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `constraint3` (`patient_Id`);

--
-- Indexes for table `patient_reportdata`
--
ALTER TABLE `patient_reportdata`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`patient_Id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `relations_details`
--
ALTER TABLE `relations_details`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `familyhistory`
--
ALTER TABLE `familyhistory`
  MODIFY `columnId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `familyhistory1`
--
ALTER TABLE `familyhistory1`
  MODIFY `columnId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_eye_history`
--
ALTER TABLE `family_eye_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `generalhealth`
--
ALTER TABLE `generalhealth`
  MODIFY `columnId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `health_problems`
--
ALTER TABLE `health_problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ocularsymptoms`
--
ALTER TABLE `ocularsymptoms`
  MODIFY `columnId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `office_details`
--
ALTER TABLE `office_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_eye_history`
--
ALTER TABLE `patient_eye_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_master_table`
--
ALTER TABLE `patient_master_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient_medical_history`
--
ALTER TABLE `patient_medical_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient_reportdata`
--
ALTER TABLE `patient_reportdata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_information`
--
ALTER TABLE `personal_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `relations_details`
--
ALTER TABLE `relations_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `family_eye_history`
--
ALTER TABLE `family_eye_history`
  ADD CONSTRAINT `constraint4` FOREIGN KEY (`patient_Id`) REFERENCES `patient_master_table` (`patient_Id`) ON DELETE CASCADE;

--
-- Constraints for table `office_details`
--
ALTER TABLE `office_details`
  ADD CONSTRAINT `constraint5` FOREIGN KEY (`patient_Id`) REFERENCES `patient_master_table` (`patient_Id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_eye_history`
--
ALTER TABLE `patient_eye_history`
  ADD CONSTRAINT `constraint2` FOREIGN KEY (`patient_Id`) REFERENCES `patient_master_table` (`patient_Id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_medical_history`
--
ALTER TABLE `patient_medical_history`
  ADD CONSTRAINT `constraint3` FOREIGN KEY (`patient_Id`) REFERENCES `patient_master_table` (`patient_Id`) ON DELETE CASCADE;

--
-- Constraints for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD CONSTRAINT `constraint1` FOREIGN KEY (`patient_Id`) REFERENCES `patient_master_table` (`patient_Id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
