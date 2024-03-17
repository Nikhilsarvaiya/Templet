-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 12:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_radhe_krishna_temple`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aboutus_title` varchar(255) DEFAULT NULL,
  `aboutus_description` text DEFAULT NULL,
  `aboutus_image` text DEFAULT NULL,
  `programs_title` varchar(255) DEFAULT NULL,
  `programs_description1` text DEFAULT NULL,
  `programs_description2` text DEFAULT NULL,
  `programs_description3` text DEFAULT NULL,
  `ourmission_title` varchar(255) DEFAULT NULL,
  `ourmission_description` text DEFAULT NULL,
  `history_title` varchar(255) DEFAULT NULL,
  `history_description1` text DEFAULT NULL,
  `history_description2` text DEFAULT NULL,
  `history_description3` text DEFAULT NULL,
  `history_image` text DEFAULT NULL,
  `whoweare_title` varchar(255) DEFAULT NULL,
  `whoweare_description` text DEFAULT NULL,
  `whatarewe_title` varchar(255) DEFAULT NULL,
  `whatarewe_description` text DEFAULT NULL,
  `objectives_title` varchar(255) DEFAULT NULL,
  `objectives_description1` text DEFAULT NULL,
  `objectives_description2` text DEFAULT NULL,
  `objectives_description3` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `aboutus_title`, `aboutus_description`, `aboutus_image`, `programs_title`, `programs_description1`, `programs_description2`, `programs_description3`, `ourmission_title`, `ourmission_description`, `history_title`, `history_description1`, `history_description2`, `history_description3`, `history_image`, `whoweare_title`, `whoweare_description`, `whatarewe_title`, `whatarewe_description`, `objectives_title`, `objectives_description1`, `objectives_description2`, `objectives_description3`, `created_at`, `updated_at`) VALUES
(1, 'About Radha Krishna Temple', 'As a devoted seeker on the spiritual path, you will feel drawn to the temple, eager to experience the divine energy and receive the blessings of all the Hindu gods. We yearn you to immerse yourself in the devotional ambiance and seek solace in their divine presence.', 'aboutus/hZxyYykMJBRPfbKNedYEBPFNAN1skqQtcR2GhJDt.jpg', 'Programs', 'Every Morning .... At: 9.30am Uk time, Aarti and YOGA', 'Evening Prayers..... Aarti At: 9.30am uk time', 'Every Friday .... At: 9.30am Bhajan Sandhya followed by Aarti.', 'Our Mission', 'Our mission is to promote spiritual growth, cultural understanding, and community harmony through the practice of Hinduism. We strive to provide a platform for individuals to experience the divine presence, gain wisdom, and embrace the core values of love, compassion, and self-realization.', 'A Brief History of Radha Krishna Temple', 'The Hindu Welfare Association, established in January 2005, aims to create a vibrant Theosophical and Philosophical Cultural Centre rooted in Hindu Culture. Our mission is to foster peace and harmony within the multicultural community of our local and surrounding areas. Recognizing the need for such a facility, we aspire to fill the void that currently exists in our vicinity.', 'At the heart of our association is the desire to provide a welcoming space where individuals from all walks of life can come together to explore the rich cultural heritage of Hinduism. Through various activities and programs, we aim to promote understanding, dialogue, and appreciation for the values and teachings encompassed within Hindu culture.', 'Our vision is to cultivate an environment that nurtures spiritual growth, intellectual exploration, and personal development. We seek to serve as a source of inspiration, guidance, and support for individuals on their journey of self-discovery and inner transformation.', 'aboutus/EVRwLsdPTG1kzHp0K2PLe1JXGBPXeDgcajV641yM.jpg', 'Who we are?', '<p>By establishing this Theosophical and Philosophical Cultural Centre, we aim to create a place where people can gather, engage in meaningful discussions, participate in cultural events, and access resources that foster personal and collective well-being. Our hope is to contribute to the building of a harmonious and inclusive society, where individuals from diverse backgrounds can find common ground and celebrate their shared humanity.&nbsp;</p><p>We invite you to join us in this noble endeavour. Together, let us create a vibrant and inclusive community that embraces the principles of peace, harmony, and cultural understanding.</p>', 'What are we doing?', '<p>Since 2008 improvements have been carried out on the building from donations received along with grants to facilitate Worshiping, Puja and Bhajan/Kirtan. The building still needs further improvement to provide daily social and religious activities for the retired and the disabled old age pensioners as well as providing a foundation for children and youth.&nbsp;</p><p>The trustees and the executive committee have decided to launch an appeal for the building fund to repay the outstanding loans which currently stands at £540,000. The repayment of these loans would not only ease the burden of the association but would enable it to provide better facilities to devotees. This will allow the association to progress further in its objectives of serving the community.</p>', 'OBJECTIVES', 'To advance the education of the public in the Havering area in the tradition of the Hindu Religion, including yoga, the Hindi language and Hindu festivals by the establishment and operation of a Hindu Cultural Centre.', 'The advancement of the Hindu religion within Havering and surrounding areas by the establishment, support and operation of a Hindu Temple.', 'The provision, in the interests of social welfare, of facilities within the Havering area for recreation or other leisure time occupation among members of the Hindu Community with the object of improving their conditions of life.', NULL, '2023-08-05 05:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `last_logged_in_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `image`, `password`, `remember_token`, `last_logged_in_at`, `last_login_ip`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$10$DFVs5Bo4sAT/f8XeFQifFuDBlqib/Tzvr2UXXk6yOyjxr5DjSFqCa', '5V1DRp9LxOlBVxR1WsfCN5JTyndk48d9nEaJvMnUifS6iODs59U2vHG8pm0d', '2024-03-16 09:30:42', '::1', NULL, '2024-03-16 04:00:42'),
(2, 'sub-admin', 'waxej12940@paldept.com', NULL, '$2y$10$CL75YBY9FQ5n8k.CHhBCQexabkvkDIXMDOcMVZDxlyQlVmf8nCooK', '0gYm7p24bYv9rWKufEDBho0rWcwSBGwtfycQ5qHdiyrmN9219b3lsNeOcib9', '2023-07-25 16:43:42', '::1', NULL, '2023-07-25 11:16:30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Festival', 'festival', '2023-07-22 06:08:15', '2023-07-22 06:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Privacy Policy', 'privacy_policy', '<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br>&nbsp;</p><h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2023-07-24 09:24:17', '2023-07-24 11:09:27'),
(2, 'Terms & Conditions', 'terms_conditions', '<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><h2>Why do we use it?</h2><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><br>&nbsp;</p><h2>Where does it come from?</h2><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>', '2023-07-24 10:38:00', '2023-07-24 11:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_us_title` varchar(255) DEFAULT NULL,
  `contact_us_description` text DEFAULT NULL,
  `social_link1` text DEFAULT NULL,
  `social_link2` text DEFAULT NULL,
  `social_link3` text DEFAULT NULL,
  `social_link4` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `phone`, `email`, `address`, `contact_us_title`, `contact_us_description`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `location`, `created_at`, `updated_at`) VALUES
(1, '017083476281', 'hinduwelfare@googlemail.com', 'The School House, Church Road, Noak Hill, RM4 1LD', 'Write Us Any Message', 'These are the phrases we stay via way of means of in the whole lot we do. Each brand we build, and we create.', 'https://google.com', 'https://google.com', 'https://11google.com', 'https://google.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2477.047174293043!2d0.22281297594871155!3d51.62234500230056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8bcf2895718fb%3A0x5ffb0bed6c1ea7c0!2sRadha%20Krishna%20Temple!5e0!3m2!1sen!2sin!4v1690265665574!5m2!1sen!2sin', '2023-07-25 05:27:24', '2023-08-05 05:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `customer_pooja_bookings`
--

CREATE TABLE `customer_pooja_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pooja_creation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date DEFAULT NULL,
  `slots` longtext DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_number` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_pooja_bookings`
--

INSERT INTO `customer_pooja_bookings` (`id`, `pooja_creation_id`, `date`, `slots`, `customer_name`, `customer_number`, `country_code`, `created_at`, `updated_at`) VALUES
(2, 15, '2024-03-30', '17:15:00,17:45:00', 'ttryrdtyrdt', '56456456546', '91', '2024-03-16 04:48:23', '2024-03-16 05:28:30'),
(4, 15, '2024-03-31', '03:23:03,04:08:03,04:38:03,14:23:09,14:38:09', 'dfdfghdf', '43535345345', '32', '2024-03-16 05:47:59', '2024-03-16 05:48:26'),
(5, 15, '2024-03-31', '03:38:03,03:53:03,04:23:03,04:53:03,05:08:03,05:23:03,14:53:09,15:08:09,15:23:09', 'fdhfgfgh', '45646456456', '44', '2024-03-16 07:39:46', '2024-03-16 08:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `event_image` text DEFAULT NULL,
  `list_image` text DEFAULT NULL,
  `start_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `end_datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `duration` varchar(255) DEFAULT NULL,
  `cost` text DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `website_url` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `organizer_website_url` text DEFAULT NULL,
  `venue` text DEFAULT NULL,
  `google_map_url` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `days`, `address`, `description`, `event_image`, `list_image`, `start_datetime`, `end_datetime`, `duration`, `cost`, `category_id`, `website_url`, `name`, `phone`, `email`, `organizer_website_url`, `venue`, `google_map_url`, `created_at`, `updated_at`) VALUES
(1, 'erererer', 'erererer', '2', 'dfg', '<ul><li>sfdgssg</li><li>dfsgsd</li><li>fgs</li><li>dfg</li><li>sdfgsdg</li></ul>', 'events/zQm7C5ENR7wwJGNp8Wjd8GhRqztQY6aIpmUkjL2O.jpg', 'events/S32fyQk8wW2sRAKsacaMFg4V5P8n2JQV7ER0SiDm.jpg', '2023-07-22 15:30:41', '2023-07-22 15:32:41', NULL, '4545', 1, 'https://google.com', 'sdfg', '55555 66666', 'yahih92364@teknowa.com', 'https://google.com', 'gfhgfhghgfhfgh', 'https://www.google.com/maps/place/Church+Rd,+Noak+Hill,+Romford+RM4+1LD,+UK/@51.624731,0.2197132,17z/data=!3m1!4b1!4m6!3m5!1s0x47d8bcedcb159ca1:0x8f006b67cebcaafe!8m2!3d51.6247277!4d0.2222881!16s%2Fg%2F11_tdtvr0?entry=ttu', '2023-07-22 10:00:41', '2023-08-04 11:08:50'),
(2, 'Daily Morning Arti and Yoga', 'daily-morning-arti-and-yoga', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(12, 'gfhfg', 'gfhfg', '2', 'gfhgfh', '<p>fghgf</p>', 'events/ozPXE1ZjXWqxqeJ0CFiwKmWb4j7TZPXQhDOO7aaD.jpg', 'events/uoRKkujWxF20gQzlavm0ICpmjSPDXAgQINdWYCTJ.jpg', '2023-08-04 16:14:48', '2023-08-04 16:14:53', NULL, '6', 1, 'https://google.com', 'gh', '55555 66666', 'adfghfgmin@adgfhmin.com', 'https://google.com', 'gfh', 'https://google.com', '2023-08-04 10:45:50', '2023-08-04 10:45:50'),
(13, 'gfhgfh', 'gfhgfh', '3', 'fghfgh', '<p>fghfgh</p>', 'events/iTRZmMqtMw8VwyTg7SAlfdyQ2dnPBo9iPIR80pBv.jpg', 'events/KUf1PmuLMSPATLjGn3eDg5oGJCDlz8yMMjTzEetf.jpg', '2023-08-04 16:15:59', '2023-08-04 16:19:01', NULL, '65', 1, 'https://google.com', 'gfhfgh', '123-456-7890', 'ghfgh@fghfg.fghd', 'https://google.com', 'sdfgsdfg', 'https://google.com', '2023-08-04 10:46:26', '2023-08-04 10:46:26'),
(16, 'gfhdgh', 'gfhdgh', '3', 'fghfh', '<p>dgh</p>', 'events/8iuqTnbr9U81ef5jpCyiUBG6PqTPJswqSwEBpWnH.jpg', 'events/NUdlOx92FVQodtmST3c7dD04jHLLSxreGk9SGCQD.jpg', '2023-08-02 16:24:15', '2023-08-04 16:26:19', NULL, '54645', 1, 'https://google.com', 'ghfdg', '45353453545', 'ghgfhg@gf.dfgd', 'https://google.com', 'fgh', 'https://google.com', '2023-08-04 10:54:41', '2023-08-05 05:37:17'),
(17, 'Daily Morning Arti and Yoga2', 'daily-morning-arti-and-yoga2', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(18, 'Daily Morning Arti and Yoga3', 'daily-morning-arti-and-yoga3', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(19, 'Daily Morning Arti and Yoga4', 'daily-morning-arti-and-yoga4', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(20, 'Daily Morning Arti and Yoga5', 'daily-morning-arti-and-yoga5', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(21, 'Daily Morning Arti and Yoga6', 'daily-morning-arti-and-yoga6', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(22, 'Daily Morning Arti and Yoga7', 'daily-morning-arti-and-yoga7', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(23, 'Daily Morning Arti and Yoga8', 'daily-morning-arti-and-yoga8', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', NULL, '245.00', 1, 'https://hinduwa.org.uk', 'Radha Krishna Temple', '01708 347 628', 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', 'Radha Krishna Temple The School House, Church Road, Noak Hill, RM4 1LD', 'test', '2023-07-22 10:34:30', '2023-07-22 11:49:32'),
(24, 'Daily Morning Arti and Yoga9', 'daily-morning-arti-and-yoga9', '1', '56 Thatcher Avenue River Forest', '<p>Maecenas pulvinar non lectus et pharetra. Vestibulum quis pretium purus. Aliquam iaculis vitae justo in fermentum. Aliquam dapibus erat nec luctus vehicula. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum turpis ante, aliquam sed justo non, tincidunt imperdiet nisi. Nullam vel venenatis mauris, at vestibulum libero. Sed leo nunc, semper sed bibendum id, imperdiet at lectus. Mauris id elit eget arcu facilisis dictum at vel lectus. Phasellus libero odio, tristique eget viverra sed, efficitur eget ligula. Morbi quam orci, pretium sed faucibus non, dapibus et velit. Pellentesque convallis ultrices diam, ut venenatis eros venenatis eget. Etiam at egestas lorem. Praesent quis efficitur est. Curabitur est purus, semper in ligula vitae, sagittis blandit ipsum.</p><p>Phasellus libero arcu, porta vitae auctor eget, ullamcorper vitae ipsum. Curabitur pharetra leo sit amet neque convallis, in laoreet dui efficitur. Morbi vitae nisi sit amet lorem molestie sollicitudin ac et velit. Praesent ac suscipit lacus. Ut placerat hendrerit ligula ut dapibus. Proin sit amet blandit felis, vel rhoncus est. Curabitur a risus eu lectus porttitor hendrerit sed ut ante. Vestibulum gravida ultrices ex in posuere. Suspendisse congue, diam at dignissim efficitur, nulla mauris bibendum sem, at cursus elit metus tempus metus. Nulla gravida, magna et vehicula cursus, sem lacus tempus metus, maximus posuere tellus tortor nec velit. Aenean non orci sapien. Duis ac luctus velit. Vivamus sit amet arcu tortor. Vivamus placerat vestibulum nisi.</p>', 'events/z45vnuhV7SJI2rEd7eqi3mfWMyP6P5cNw1Jfiotp.jpg', 'events/Koj3dwAvY02Lft95csVt6ilgJVY8m36BD1hXCHNy.jpg', '2023-10-26 09:15:00', '2023-11-04 23:30:00', '10 mins', NULL, 1, NULL, NULL, NULL, 'hinduwelfare@googlemail.com', 'https://hinduwa.org.uk', NULL, NULL, '2023-07-22 10:34:30', '2023-10-14 11:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'What is Lorem Ipsum?', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2023-07-24 11:23:20', '2023-07-24 11:25:27'),
(3, 'Why do we use it?', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '2023-07-24 11:25:45', '2023-07-24 11:25:45'),
(4, 'dsfgsd', '<p>fg</p>', '2023-08-05 06:10:00', '2023-08-05 06:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Taminm Alows', 'galleries/CfxuYW6ArXW4hAHO1oWbhUKnuScXyEla1Kdn8Bgf.jpg', '2023-07-24 06:29:01', '2023-07-24 06:29:01'),
(2, 'Taminm Alows1', 'galleries/UsKeOm3zYXSkC2PbAGIli3My6QVAxQIXJGygZwmx.jpg', '2023-07-24 06:29:40', '2023-07-24 06:29:40'),
(3, 'test3', 'galleries/do5xVCOA3aXmS210W6LctZhfwF8TEpBU5M2H5GnV.jpg', '2023-07-24 06:33:01', '2023-07-24 06:33:01'),
(4, 'test4', 'galleries/owGVnayiwIJDeGd4a3ZELNul6alzx5yrPE3MA8Y1.jpg', '2023-07-24 06:33:16', '2023-07-24 06:33:16'),
(5, 'test5', 'galleries/7cThpjERkobfZTlKxTnPxR1GMlYeKPBr02e8mRIJ.jpg', '2023-07-24 06:33:33', '2023-07-24 06:33:33'),
(6, 'test6', 'galleries/QyLO0Z1EQx1Lir8bw8oFiSqiNkLx1EGKxjht4gLW.jpg', '2023-07-24 06:33:57', '2023-07-24 06:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url2` varchar(255) DEFAULT NULL,
  `sequence` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `image`, `url`, `url2`, `sequence`, `created_at`, `updated_at`) VALUES
(9, 'Dharma: the importance of fulfilling one\'s duty (dharma) without attachment to the results.', 'home-slider/RZ3n8HbPSM9tMw6gpjGDoIghHk4k8YikcCktvzCX.jpg', 'https://google.com', 'https://google.com', '0', '2023-07-20 09:24:18', '2023-07-20 09:35:45'),
(10, 'Self-realization: individuals to realize their true nature as eternal souls, distinct from the perishable body.', 'home-slider/TqjvuEZSMZC9gz3zCWPONj4vaiBqEqsriNJL15ee.jpg', NULL, NULL, '2', '2023-07-20 09:30:27', '2023-07-20 09:30:27'),
(11, 'Bhakti (Devotion): the path of devotion and love for God.', 'home-slider/SjgyN3zIEH4twyvZscNE6P8tfAKkVNHZK4WxnkxY.jpg', NULL, NULL, '3', '2023-07-20 09:35:01', '2023-07-20 09:35:19'),
(12, 'Karma Yoga: the path of selfless action (karma yoga).', 'home-slider/sXNn2to7suMmzMTljlYl18L8JyjiiALnDSV0YOMT.jpg', NULL, NULL, '4', '2023-07-20 09:36:05', '2023-07-20 09:36:13'),
(13, 'Renunciation and Detachment: true renunciation is not the abandonment of worldly responsibilities but rather cultivating a sense of detachment towards material possessions and outcomes.', 'home-slider/yP7ALhlntn9hecdV2c2GcF8czQJ5aCqKAcQE3FoP.jpg', NULL, NULL, '5', '2023-07-20 09:36:43', '2023-07-20 09:36:43'),
(14, 'Equality and Unity: the idea of equality and unity among all beings.', 'home-slider/R6Kp2CPVpYKAOEotUm31oq7y4u10qSjFiN48LqvG.jpg', NULL, NULL, '55', '2023-07-20 09:37:12', '2023-08-05 04:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_19_160355_create_admin_table', 2),
(6, '2023_07_19_163329_create_permission_tables', 3),
(8, '2023_07_20_104829_create_home_slider_table', 4),
(9, '2023_07_20_131352_add_url2_field_to_home_sliders_table', 5),
(11, '2023_07_20_155031_create_aboutus_table', 6),
(16, '2023_07_22_102925_create_categories_table', 8),
(17, '2023_07_21_162821_create_events_table', 9),
(20, '2023_07_22_154015_add_list_image_field_to_events_table', 10),
(21, '2023_07_22_171650_add_slug_field_to_events_table', 11),
(22, '2023_07_24_113150_create_galleries_table', 12),
(23, '2023_07_24_144051_create_cms_pages_table', 13),
(24, '2023_07_24_164358_create_faqs_table', 14),
(25, '2023_07_24_171321_create_contact_us_table', 15),
(26, '2023_07_25_122113_create_user_contact_us_table', 16),
(27, '2023_07_25_170143_create_teams_table', 17),
(28, '2023_10_14_163438_add_duration_field_to_events_table', 18),
(29, '2023_10_17_153520_add_role_field_to_users_table', 19),
(30, '2023_10_17_164728_create_park_assists_table', 20),
(31, '2023_10_18_162135_change_password_field_to_users_table', 21),
(32, '2023_10_24_145705_create_programs_details_table', 22),
(33, '2023_10_24_155640_create_programs_table', 23),
(34, '2024_03_09_104117_create_pooja_masters_table', 24),
(35, '2024_03_11_125327_create_panditji_availabilities_table', 25),
(36, '2024_03_12_100040_create_pooja_creations_table', 26),
(37, '2024_03_13_143242_create_pooja_creations_slots_table', 27),
(38, '2024_03_14_105917_add_slot_time_field_to_pooja_creations_slots_table', 28),
(40, '2024_03_15_121418_create_customer_pooja_bookings_table', 29),
(41, '2024_03_16_094917_add_country_code_field_to_customer_pooja_bookings_table', 30);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 3),
(1, 'App\\Models\\Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `panditji_availabilities`
--

CREATE TABLE `panditji_availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `morning` tinyint(4) DEFAULT 0 COMMENT '0=not,1=checked',
  `evening` tinyint(4) DEFAULT 0 COMMENT '0=not,1=checked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panditji_availabilities`
--

INSERT INTO `panditji_availabilities` (`id`, `date`, `morning`, `evening`, `created_at`, `updated_at`) VALUES
(1, '2024-03-11', 1, 1, '2024-03-11 09:15:18', '2024-03-11 09:26:53'),
(16, '2024-03-12', 0, 1, '2024-03-11 10:12:40', '2024-03-11 10:12:40'),
(17, '2024-03-13', 1, 1, '2024-03-11 10:12:40', '2024-03-11 10:12:40'),
(18, '2024-03-14', 1, 0, '2024-03-11 10:45:21', '2024-03-11 10:45:21'),
(19, '2024-03-15', 1, 1, '2024-03-11 10:45:21', '2024-03-11 10:45:21'),
(20, '2024-03-16', 1, 0, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(21, '2024-03-17', 1, 0, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(22, '2024-03-18', 0, 1, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(23, '2024-03-19', 1, 0, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(24, '2024-03-20', 1, 1, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(25, '2024-03-21', 1, 1, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(26, '2024-03-22', 0, 1, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(27, '2024-03-23', 0, 1, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(28, '2024-03-24', 1, 0, '2024-03-11 11:02:17', '2024-03-11 11:02:17'),
(29, '2024-03-25', 1, 0, '2024-03-11 11:02:17', '2024-03-11 11:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `park_assists`
--

CREATE TABLE `park_assists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vehicle_name` text DEFAULT NULL,
  `vehicle_no` text DEFAULT NULL,
  `mobile_no` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `park_assists`
--

INSERT INTO `park_assists` (`id`, `user_id`, `vehicle_name`, `vehicle_no`, `mobile_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'test1132423sdf', 'gj-03-12345', '4564564511', '2023-10-17 11:44:48', '2023-10-18 07:41:29'),
(3, 3, 'test ttt', 'gj-03-8888', '4564564566', '2023-10-18 10:34:14', '2023-10-18 10:34:14'),
(4, 3, 'testttttt', 'gj-03-6655', '6546546544', '2023-10-18 11:50:53', '2023-10-18 11:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'admin', '2023-07-19 11:33:16', '2023-07-19 11:33:16'),
(2, 'role-create', 'admin', '2023-07-19 11:33:16', '2023-07-19 11:33:16'),
(3, 'role-edit', 'admin', '2023-07-19 11:33:16', '2023-07-19 11:33:16'),
(4, 'role-delete', 'admin', '2023-07-19 11:33:16', '2023-07-19 11:33:16'),
(5, 'sub-admin-list', 'admin', '2023-07-19 11:33:16', '2023-07-19 11:33:16'),
(6, 'sub-admin-create', 'admin', '2023-07-19 11:33:16', '2023-07-19 11:33:16'),
(7, 'sub-admin-edit', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(8, 'sub-admin-delete', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(9, 'home-slider-list', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(10, 'home-slider-create', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(11, 'home-slider-edit', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(12, 'home-slider-delete', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(13, 'event-list', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(14, 'event-create', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(15, 'event-edit', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(16, 'event-delete', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(17, 'cms-page-list', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(18, 'cms-page-create', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(19, 'cms-page-edit', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(20, 'cms-page-delete', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(21, 'faq-list', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(22, 'faq-create', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(23, 'faq-edit', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(24, 'faq-delete', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17'),
(25, 'footer-setting-create', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pooja_creations`
--

CREATE TABLE `pooja_creations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pooja_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pooja_name` varchar(255) DEFAULT NULL,
  `pooja_desc` text DEFAULT NULL,
  `samagri_list` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `morning_start_time` varchar(255) DEFAULT NULL,
  `morning_end_time` varchar(255) DEFAULT NULL,
  `evening_start_time` varchar(255) DEFAULT NULL,
  `evening_end_time` varchar(255) DEFAULT NULL,
  `morning_blocked` tinyint(4) DEFAULT 0 COMMENT '0=not,1=checked',
  `evening_blocked` tinyint(4) DEFAULT 0 COMMENT '0=not,1=checked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pooja_creations`
--

INSERT INTO `pooja_creations` (`id`, `pooja_id`, `pooja_name`, `pooja_desc`, `samagri_list`, `date`, `morning_start_time`, `morning_end_time`, `evening_start_time`, `evening_end_time`, `morning_blocked`, `evening_blocked`, `created_at`, `updated_at`) VALUES
(5, 5, 'hjkghjk', '<p>ghjkhjkghj</p>', '<p>kghjkghjk</p>', '2024-03-24', '10:25', '10:29', NULL, NULL, 0, 1, '2024-03-13 04:59:56', '2024-03-13 04:59:56'),
(7, 4, 'yyyyyy', '<p>ghd gh d fdghdf</p>', '<p>h fgh h</p>', '2024-03-23', NULL, NULL, '12:10', '12:20:00', 1, 0, '2024-03-13 08:12:53', '2024-03-13 08:42:55'),
(8, 4, 'yyyyyy', '<p>ghd gh d fdghdf</p>', '<p>h fgh h</p>', '2024-03-31', '03:23:03', '05:23:06', '14:23:09', '15:25:11', 0, 0, '2024-03-13 08:53:19', '2024-03-16 05:39:59'),
(9, 5, 'hjkghjk', '<p>ghjkhjkghj</p>', '<p>kghjkghjk</p>', '2024-03-25', '09:51', '09:54', NULL, NULL, 0, 1, '2024-03-14 04:54:50', '2024-03-14 04:54:50'),
(10, 5, 'hjkghjk', '<p>ghjkhjkghj</p>', '<p>kghjkghjk</p>', '2024-03-26', NULL, NULL, '21:51', '21:54', 1, 0, '2024-03-14 04:54:50', '2024-03-14 04:54:50'),
(11, 3, 'tseste et323', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2024-03-27', '10:00', '10:57', NULL, NULL, 0, 1, '2024-03-14 05:31:25', '2024-03-14 05:51:42'),
(12, 5, 'hjkghjk', '<p>ghjkhjkghj</p>', '<p>kghjkghjk</p>', '2024-03-28', '11:00', '11:30', '23:05', '23:30', 0, 0, '2024-03-14 05:55:42', '2024-03-14 06:01:33'),
(14, 3, 'tseste et323', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2024-03-29', '06:00', '08:59', NULL, NULL, 0, 1, '2024-03-14 06:23:47', '2024-03-14 06:26:50'),
(15, 4, 'yyyyyy', '<p>ghd gh d fdghdf</p>', '<p>h fgh h</p>', '2024-03-30', NULL, NULL, '17:00', '17:59', 1, 0, '2024-03-14 06:30:40', '2024-03-14 06:30:40'),
(17, 3, 'tseste et323', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '2024-04-01', NULL, NULL, '14:39', '14:44', 1, 0, '2024-03-14 09:09:48', '2024-03-14 09:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `pooja_creations_slots`
--

CREATE TABLE `pooja_creations_slots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pooja_create_id` bigint(20) UNSIGNED DEFAULT NULL,
  `morning_start_time` varchar(255) DEFAULT NULL,
  `morning_end_time` varchar(255) DEFAULT NULL,
  `evening_start_time` varchar(255) DEFAULT NULL,
  `evening_end_time` varchar(255) DEFAULT NULL,
  `is_morning` tinyint(4) DEFAULT 0 COMMENT '0=not,1=checked',
  `is_evening` tinyint(4) DEFAULT 0 COMMENT '0=not,1=checked',
  `slot_time` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pooja_creations_slots`
--

INSERT INTO `pooja_creations_slots` (`id`, `pooja_create_id`, `morning_start_time`, `morning_end_time`, `evening_start_time`, `evening_end_time`, `is_morning`, `is_evening`, `slot_time`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(13, 11, '10:00', '10:57', NULL, NULL, 1, 0, '10:00:00', NULL, NULL, '2024-03-14 05:51:42', '2024-03-14 05:51:42'),
(14, 11, '10:00', '10:57', NULL, NULL, 1, 0, '10:15:00', NULL, NULL, '2024-03-14 05:51:42', '2024-03-14 05:51:42'),
(15, 11, '10:00', '10:57', NULL, NULL, 1, 0, '10:30:00', NULL, NULL, '2024-03-14 05:51:42', '2024-03-14 05:51:42'),
(16, 11, '10:00', '10:57', NULL, NULL, 1, 0, '10:45:00', NULL, NULL, '2024-03-14 05:51:42', '2024-03-14 05:51:42'),
(32, 12, '11:00', '11:30', NULL, NULL, 1, 0, '11:00:00', NULL, NULL, '2024-03-14 06:03:29', '2024-03-14 06:03:29'),
(33, 12, '11:00', '11:30', NULL, NULL, 1, 0, '11:15:00', NULL, NULL, '2024-03-14 06:03:29', '2024-03-14 06:03:29'),
(34, 12, '11:00', '11:30', NULL, NULL, 1, 0, '11:30:00', NULL, NULL, '2024-03-14 06:03:29', '2024-03-14 06:03:29'),
(35, 12, NULL, NULL, '23:05', '23:30', 0, 1, '11:05:00', NULL, NULL, '2024-03-14 06:03:29', '2024-03-14 06:03:29'),
(36, 12, NULL, NULL, '23:05', '23:30', 0, 1, '11:20:00', NULL, NULL, '2024-03-14 06:03:29', '2024-03-14 06:03:29'),
(37, 5, '10:25', '10:29', NULL, NULL, 1, 0, '10:25:00', NULL, NULL, '2024-03-14 06:06:27', '2024-03-14 06:06:27'),
(67, 15, NULL, NULL, '17:00', '17:59', 0, 1, '17:00:00', NULL, NULL, '2024-03-14 06:33:48', '2024-03-14 06:33:48'),
(68, 15, NULL, NULL, '17:00', '17:59', 0, 1, '17:15:00', NULL, NULL, '2024-03-14 06:33:48', '2024-03-14 06:33:48'),
(69, 15, NULL, NULL, '17:00', '17:59', 0, 1, '17:30:00', NULL, NULL, '2024-03-14 06:33:48', '2024-03-14 06:33:48'),
(70, 15, NULL, NULL, '17:00', '17:59', 0, 1, '17:45:00', NULL, NULL, '2024-03-14 06:33:48', '2024-03-14 06:33:48'),
(71, 14, '06:00', '08:59', NULL, NULL, 1, 0, '06:00:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(72, 14, '06:00', '08:59', NULL, NULL, 1, 0, '06:15:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(73, 14, '06:00', '08:59', NULL, NULL, 1, 0, '06:30:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(74, 14, '06:00', '08:59', NULL, NULL, 1, 0, '06:45:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(75, 14, '06:00', '08:59', NULL, NULL, 1, 0, '07:00:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(76, 14, '06:00', '08:59', NULL, NULL, 1, 0, '07:15:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(77, 14, '06:00', '08:59', NULL, NULL, 1, 0, '07:30:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(78, 14, '06:00', '08:59', NULL, NULL, 1, 0, '07:45:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(79, 14, '06:00', '08:59', NULL, NULL, 1, 0, '08:00:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(80, 14, '06:00', '08:59', NULL, NULL, 1, 0, '08:15:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(81, 14, '06:00', '08:59', NULL, NULL, 1, 0, '08:30:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(82, 14, '06:00', '08:59', NULL, NULL, 1, 0, '08:45:00', NULL, NULL, '2024-03-14 06:34:24', '2024-03-14 06:34:24'),
(83, 10, NULL, NULL, '21:51', '21:54', 0, 1, '21:51:00', NULL, NULL, '2024-03-14 06:35:19', '2024-03-14 06:35:19'),
(84, 17, NULL, NULL, '14:39', '14:44', 0, 1, '14:39:00', NULL, NULL, '2024-03-14 09:09:48', '2024-03-14 09:09:48'),
(85, 7, NULL, NULL, '12:10', '12:20:00', 0, 1, '12:10:00', NULL, NULL, '2024-03-15 11:25:50', '2024-03-15 11:25:50'),
(86, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '03:23:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(87, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '03:38:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(88, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '03:53:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(89, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '04:08:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(90, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '04:23:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(91, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '04:38:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(92, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '04:53:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(93, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '05:08:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(94, 8, '03:23:03', '05:23:06', NULL, NULL, 1, 0, '05:23:03', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(95, 8, NULL, NULL, '14:23:09', '15:25:11', 0, 1, '14:23:09', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(96, 8, NULL, NULL, '14:23:09', '15:25:11', 0, 1, '14:38:09', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(97, 8, NULL, NULL, '14:23:09', '15:25:11', 0, 1, '14:53:09', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(98, 8, NULL, NULL, '14:23:09', '15:25:11', 0, 1, '15:08:09', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59'),
(99, 8, NULL, NULL, '14:23:09', '15:25:11', 0, 1, '15:23:09', NULL, NULL, '2024-03-16 05:39:59', '2024-03-16 05:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `pooja_masters`
--

CREATE TABLE `pooja_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pooja_name` varchar(255) DEFAULT NULL,
  `pooja_desc` text DEFAULT NULL,
  `samagri_list` text DEFAULT NULL,
  `random_id` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pooja_masters`
--

INSERT INTO `pooja_masters` (`id`, `pooja_name`, `pooja_desc`, `samagri_list`, `random_id`, `created_at`, `updated_at`) VALUES
(3, 'tseste et323', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', '35795', '2024-03-09 05:35:02', '2024-03-09 05:37:31'),
(4, 'yyyyyy', '<p>ghd gh d fdghdf</p>', '<p>h fgh h</p>', '37154', '2024-03-09 05:38:28', '2024-03-09 05:38:28'),
(5, 'hjkghjk', '<p>ghjkhjkghj</p>', '<p>kghjkghjk</p>', '410776', '2024-03-09 06:09:14', '2024-03-09 06:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` text DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `title`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 'Purnima', '2023-10-23', '2023-10', NULL, '2023-10-24 11:06:41', '2023-10-24 11:06:41'),
(3, 'Ekadashi - Yogini', '2023-09-24', '2023-09', NULL, '2023-10-24 11:07:02', '2023-10-24 11:07:02'),
(4, 'Sankranti - Ashad', '2023-10-25', '2023-10', NULL, '2023-10-24 11:07:22', '2023-10-24 11:07:22'),
(5, 'Amavas', '2023-10-26', '2023-10', NULL, '2023-10-24 11:07:36', '2023-10-24 11:07:36'),
(6, 'Ekadashi - Dev Shayni', '2023-10-27', '2023-10', NULL, '2023-10-24 11:07:52', '2023-10-24 11:07:52'),
(7, 'Purnima - Guru', '2023-10-13', '2023-10', NULL, '2023-10-24 11:08:06', '2023-10-24 11:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `programs_details`
--

CREATE TABLE `programs_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `morning_title` text DEFAULT NULL,
  `morning_start_time` text DEFAULT NULL,
  `morning_end_time` text DEFAULT NULL,
  `evening_title` text DEFAULT NULL,
  `evening_start_time` text DEFAULT NULL,
  `evening_end_time` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs_details`
--

INSERT INTO `programs_details` (`id`, `morning_title`, `morning_start_time`, `morning_end_time`, `evening_title`, `evening_start_time`, `evening_end_time`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '08:00', '10:00', 'Evening', '18:00', '20:00', NULL, '2023-10-24 10:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2023-07-19 11:33:17', '2023-07-19 11:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `image`, `created_at`, `updated_at`) VALUES
(4, 'team3', 'team3', 'teams/oszDjrPqDHEZcKGcCabKgdbNkYJ0qgasy9SG8JH3.jpg', '2023-07-25 11:57:12', '2023-07-25 11:57:12'),
(5, 'team4', 'team4', 'teams/63Wls2VrNdJcGr09neQhAvA8nnA15bdSlPuvvbTC.jpg', '2023-07-25 11:57:24', '2023-07-25 11:57:24'),
(6, 'team5', 'team5', 'teams/Ylnz4meu4EvfH3tUs9ioc4X3YV2YfIaTu1JKQuuW.jpg', '2023-07-25 11:57:40', '2023-07-25 11:57:40'),
(7, 'team7', 'team7', 'teams/U4HSSE89UydYYbRhvLuz84Z6i26t7TrcsL33XKCw.jpg', '2023-07-25 11:57:56', '2023-07-25 11:57:56'),
(8, 'team8', 'team8', 'teams/ML5jokZm6ItqFmVxx61JRSIogFAJnZ3nZmmpWGHc.jpg', '2023-07-25 11:58:10', '2023-07-25 11:58:10'),
(9, 'team9', 'team9', 'teams/9EG5AQOmodzKc02obPzPl0fiMzZquSX9PCB4PvRE.jpg', '2023-07-25 11:58:22', '2023-07-25 11:58:22'),
(10, 'team10', 'team10', 'teams/UoamQFabelbF9M3AzQNuECASqEijLT1q4sAPQiII.jpg', '2023-07-25 11:58:34', '2023-07-25 11:58:34'),
(11, 'Julio Marry', 'Senior Instructor', 'teams/Md6fZ3Bm9a2OYfij3MOA9emN7daAzuhMmGd4xwDK.jpg', '2023-07-25 12:00:43', '2023-07-25 12:02:52'),
(12, 'Taminm Alows', 'Temple Chief', 'teams/J2VsPVDe7v9zvTqJaX7p1UlSBn6zmY9FQcZkiJRF.jpg', '2023-07-25 12:00:52', '2023-07-25 12:03:04'),
(13, 'tsetsetse', 'Senior Instructor', 'teams/YFoCcS6xSuCjXBNfUMZz9nW7YXb9rKLH3KHXkp6d.jpg', '2023-07-25 12:01:10', '2023-07-25 12:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) DEFAULT '0' COMMENT '0=normal,1=vehicle-user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Park Assist', 'user@gmail.com', NULL, '$2y$10$DFVs5Bo4sAT/f8XeFQifFuDBlqib/Tzvr2UXXk6yOyjxr5DjSFqCa', NULL, '1', NULL, NULL),
(3, 'test1111', 'test@gmail.com', NULL, '$2y$10$YipEDWSsJeyne8UV0CzMqujluHhCQ6.PsaODV1Q1UDOZTCaY1ePNG', NULL, '1', '2023-10-18 10:23:53', '2023-10-18 11:50:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_us`
--

CREATE TABLE `user_contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_contact_us`
--

INSERT INTO `user_contact_us` (`id`, `name`, `email`, `code`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'fgdfg', 'gh@dfgdsg', NULL, '34534534534', 'sdfg', 'sdfsdfsdsdg', '2023-07-25 08:25:36', '2023-07-25 08:25:36'),
(2, 'ghdgf', 'hghdg@sdf', NULL, '345345345', 'sdfgs', 'sdfgsdfg', '2023-07-25 08:33:51', '2023-07-25 08:33:51'),
(3, 'dfg', 'dfg@sdfg.sd', NULL, '24234234234', 'dfg', 'sdfgsdg', '2023-07-25 08:38:29', '2023-07-25 08:38:29'),
(4, 'hgj', 'ghj@regdsf.gds', NULL, '3453453453', 'gfj', 'sdfgsdg', '2023-07-25 08:40:14', '2023-07-25 08:40:14'),
(5, 'dfgsdg', 'sdfg@dfgsd.dsf', NULL, '34535345', 'dsfgsdg', 'sdfg', '2023-07-25 08:41:20', '2023-07-25 08:41:20'),
(6, 'fghd', 'dfgh@dgf.dfgh', NULL, '242424242', 'dfgh', 'sdfsaf', '2023-07-25 08:50:03', '2023-07-25 08:50:03'),
(7, 'ghjgfhj', 'fghjfgj@dgh.dfg', NULL, '4534534534', 'sdfgsdfg', 'sdfgsdfg', '2023-07-25 08:50:32', '2023-07-25 08:50:32'),
(9, 'dfgsdg', 'fdgdfgfg@dfg', NULL, NULL, 'sdfgsdfg', 'sdgsdg', '2023-07-25 09:31:18', '2023-07-25 09:31:18'),
(10, 'hfdghdfgh', 'dfgh@rfgsg.dfg', NULL, '345345345345', 'dghdfgh', 'sdfgsdgdfs', '2023-07-25 10:39:02', '2023-07-25 10:39:02'),
(11, 'gfhdgh', 'fghdg@dfg.fgh', '+44435345345', '435345345', 'fgh@dfg.gfh', 'dgh', '2023-08-04 12:14:02', '2023-08-04 12:14:02'),
(13, 'sfsdfasd', 'fsdf@sdf.sdf', NULL, '+4423323232233', 'sdfsdaf', 'sdfsdfds', '2023-08-05 04:35:57', '2023-08-05 04:35:57'),
(14, 'dfghdfgh', 'gfhdh@dfgsd.gh', NULL, '+35556567567567', 'gh', 'dfgdfghdfgh', '2024-03-15 11:53:51', '2024-03-15 11:53:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_pooja_bookings`
--
ALTER TABLE `customer_pooja_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_pooja_bookings_pooja_creation_id_foreign` (`pooja_creation_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `panditji_availabilities`
--
ALTER TABLE `panditji_availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `park_assists`
--
ALTER TABLE `park_assists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `park_assists_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pooja_creations`
--
ALTER TABLE `pooja_creations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pooja_creations_pooja_id_foreign` (`pooja_id`);

--
-- Indexes for table `pooja_creations_slots`
--
ALTER TABLE `pooja_creations_slots`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pooja_creations_slots_pooja_create_id_foreign` (`pooja_create_id`);

--
-- Indexes for table `pooja_masters`
--
ALTER TABLE `pooja_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs_details`
--
ALTER TABLE `programs_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_contact_us`
--
ALTER TABLE `user_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_pooja_bookings`
--
ALTER TABLE `customer_pooja_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `panditji_availabilities`
--
ALTER TABLE `panditji_availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `park_assists`
--
ALTER TABLE `park_assists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pooja_creations`
--
ALTER TABLE `pooja_creations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pooja_creations_slots`
--
ALTER TABLE `pooja_creations_slots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `pooja_masters`
--
ALTER TABLE `pooja_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `programs_details`
--
ALTER TABLE `programs_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_contact_us`
--
ALTER TABLE `user_contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_pooja_bookings`
--
ALTER TABLE `customer_pooja_bookings`
  ADD CONSTRAINT `customer_pooja_bookings_pooja_creation_id_foreign` FOREIGN KEY (`pooja_creation_id`) REFERENCES `pooja_creations_slots` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `park_assists`
--
ALTER TABLE `park_assists`
  ADD CONSTRAINT `park_assists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pooja_creations`
--
ALTER TABLE `pooja_creations`
  ADD CONSTRAINT `pooja_creations_pooja_id_foreign` FOREIGN KEY (`pooja_id`) REFERENCES `pooja_masters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pooja_creations_slots`
--
ALTER TABLE `pooja_creations_slots`
  ADD CONSTRAINT `pooja_creations_slots_pooja_create_id_foreign` FOREIGN KEY (`pooja_create_id`) REFERENCES `pooja_creations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
