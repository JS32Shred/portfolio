-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 13, 2023 at 09:51 PM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jules_watches`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `city`, `phone`, `birth_date`, `image`, `password`) VALUES
(1, 'gyula', 'vigi menyhÃ¡rt', 'gyula02997@gmail.com', 'test', 'test', '65654987423', '1997-02-19', 'portrait_4-5.jpg', '$2y$10$TqBRPtWDMRz7DaSHAMWkCO131/tJ.7MtUB9argr7Ih85lIPof8kKC'),
(2, 'jules', 'vigi', 'julesvigi@gmail.com', 'test', 'test', NULL, NULL, 'Untitled-1.png', '$2y$10$NAjlPuukbiZfUZ/m69EPouNyVfmcbJXhIEdZm4feusP..fLiTLlzy'),
(12, 'test', 'test', 'test@test.com', 'test', 'test', NULL, NULL, NULL, '$2y$10$yiiKnDoLhtRwwIBKAjVTjeKKnrJYBBdQLRgbpqp28dpVv77iTbEKO');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

DROP TABLE IF EXISTS `watches`;
CREATE TABLE IF NOT EXISTS `watches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `gender` varchar(12) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sold` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `brand`, `model`, `image`, `description`, `rating`, `stock`, `gender`, `price`, `sold`) VALUES
(1, 'Garmin Vivomove Sport Smartwatch', '010-2566-00', 'VivomoveSport_HR_1001.0.jpg', 'For outdoor enthusiasts the world over, this collection of Garmin watches are sure to keep you on track, both physically, and with all your fitness goals and needs. Complete with sleek, streamlined designs, these men\'s and women\'s watches and their array of specially designed, practical features are a must for any sporting aficionado. Garmin watches come in a diverse range of bold colours, from white and black to red and purple, and special features include activity trackers, colour touch screens, GPS, sport apps and smart watch connectivity with notifications that allow the user to receive calls, texts, emails, and social media alerts. Garmin\'s rechargeable batteries can last up to 3 weeks and as if that wasn\'t enough, Garmin watches are made from a combination of rubber and plastic/resin.', 5, 3, 'male', '204.26', 4),
(2, 'Hugo Boss Watch', NULL, '1513802.jpg', 'Hugo Boss Metronome 1513802 is an amazing and special Gents watch. Material of the case is Stainless Steel while the dial colour is Black. The features of the watch include (among others) a chronograph. This model has got 50 metres water resistancy - it can be submerged in water for periods, so can be used for swimming and fishing. It is not recommended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', NULL, 1, 'male', '407.41', 3),
(3, 'STORM Sleek Lazer Blue Exclusive Watch', '47499/LB', 'Sleek_Lazer_Blue.jpg', 'STORM Sleek Lazer Blue 47499/LB is a functional and very impressive Gents watch from AW21 collection. Material of the case is Stainless Steel, which stands for a high quality of the item and the Black dial gives the watch that unique look. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not recommended for high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 5, 6, 'male', '94.26', 7),
(4, 'Mens Tissot Chrono XL Chronograph Watch', 'T1166173705100', 'T1166173705100.jpg', 'Exclusive to WatchShop, the Tissot Chrono XL Chronograph watch makes a big statement with its cool looks and on-trend style.\r\n\r\nThree subdials help you keep perfect track of time, covering hours, minutes and seconds, and there’s a date function, too. It’s also water resistant to 100 metres, so whether you’re a water sports fan or keen to hit the beach, it’s ideal.\r\n\r\nThe Tissot Chrono XL Exclusive Chronograph watch strikes the perfect balance between informal and smart with its low-key fabric strap and powerful black-and-blue colour scheme. Hard-wearing sapphire glass keeps it looking good as new, while the luminescent hands mean the watch looks great even when the sun goes down. Sporty, sophisticated, stylish – what more do you need?', 4, NULL, 'male', '356.84', 6),
(5, 'Mens Vivienne Westwood The Cranbourne Watch', NULL, 'VV207BKSL.jpg', 'From the Vivienne Westwood Cranbourne Collection, the Vivienne Westwood Cranbourne Watch is another effortlessly stylish timepiece.\r\n\r\nThe watch is water resistant to 50 metres, so there’s no need to remove it when washing your hands, and it’s fine if you’re caught in the rain unexpectedly. Quartz movement delivers stunning accuracy, too.\r\n\r\nThe trademark Vivienne Westwood orb logo adorns the face of this beautiful watch that features a patterned black dial, luminous hands, chunky silver hour batons and a day/date feature. The stainless steel case is finished with a butterfly clasp, completing the look of this gorgeous, uber-stylish watch.', 4, 4, 'male', '187.33', 9),
(6, 'Polar Ignite 2 Fitness Smartwatch', NULL, '90085182.jpg', 'The perfect watch for the fitness fanatic in your life; the Polar Ignite 2 will keep you motivated and help to reach those exercise goals.\r\n\r\nWith personalised guidance and with weekly summaries, you can track your fitness progress with ease. The Fitspark training guide will provide you with ready-made, daily workouts that match your recovery and training history.\r\n\r\nCombining functionality with elegant design, the smartwatch features a customisable watch face, fine detailing on the bezel, and a ventilated inner strap for extra comfort and breathability.', NULL, 4, 'male', '226.00', 4),
(7, 'Ladies Vivienne Westwood The Wallace Watch', NULL, 'VV208RSSL.jpg', 'From celebrated punk fashion designer Vivienne Westwood, the Ladies Vivienne Westwood Wallace Watch is a gorgeous accessory with a gothic twist.\r\n\r\nThe watch is water resistant to 50 metres, so it’s splash proof and won’t come to any harm if you’re caught in the rain unexpectedly. It’s powered by quartz movement, so it keeps amazingly accurate time, too.\r\n\r\nFeaturing the familiar orb logo at 12 o’clock, the silver-toned dial displays a Gothic motif that works brilliantly with the gold-toned hour baton markers, some of which have bejewelled motifs. This funky watch shows off the trademark edgy style of Vivienne Westwood, and is a chic timepiece you’ll want to show off.', 4, 5, 'female', '300.20', 12),
(8, 'Ladies Vivienne Westwood Orb Heart Watch', NULL, 'VV006RGDBLK.jpg', 'Beautiful styling that makes a big fashion statement, the Ladies Vivienne Westwood Mother Orb Watch is the perfect way to dress up an outfit.\r\n\r\nWater resistant to 50 metres, the watch is splash proof and can even be submerged in water for a short time, so if you’re planning a beach day, you’re in luck. Quartz movement ensures stunning timekeeping accuracy, too.\r\n\r\nWith its chunky gold-tone case and jet-black dial, the Ladies Vivienne Westwood Mother Orb Watch isn’t afraid to make itself heard. There’s a cute orb charm hanging from the case, with a patterned heart motif on the dial, as well as the famous orb logo and gold-toned hour markers. This beautiful watch will complement your look and is a must-have addition to your wardrobe.', 4, NULL, 'female', '220.90', 2),
(9, 'Ladies Olivia Burton Abstract Florals Blush Watch', 'OB16VM12', 'ob16vm12-1510130239-6439.jpg', 'This on-trend timepiece works a sand-blasted face, featuring a carefully screen-printed abstract effect on top. It\'s taken to new heights by applied rose gold anemones that dance across its 30mm-wide dial. The design is finished with a blush leather strap. We think it strikes the perfect balance between artistic and super-chic.', 5, 14, 'female', '80.54', 23),
(10, 'Ladies Radley Watch', NULL, 'RY2972_H.jpg', 'A cool, stylish fashion accessory, the Ladies Radley Watch brings vibrant colours and modern looks.\r\n\r\nThe watch is water resistant to 30 metres, so it\'s splash proof and you can keep it on while washing your hands. It’s protected by scratch-resistant mineral glass, so it will always look fabulous, and quartz movement means that it keeps superb time, too.\r\n\r\nThe gold-toned stainless-steel case surrounds a stunning blue patterned dial, with elegant gold hour markers and hands, with the famous Radley Scottie dog logo at 12 o\'clock. The slender navy-blue leather strap adds a chic touch. The Ladies Radley Watch is a delightful fashion accessory that will complement any outfit.', 4, 7, 'female', '67.91', 8),
(11, 'Ladies Michael Kors Pyper Watch', NULL, 'MK2741_main.jpg', 'This Michael Kors Pyper MK2741 is understated, yet still catches the eye because of its contrasting style from most other Michael Kors watches. The leather strap rather than the metal bracelet is a refreshing change and opens up more styling opportunities. The watch has a Rose-plated, stainless steel case and a white dial, with baton hour markers.', 5, 9, 'female', '131.44', 36),
(12, 'Ladies Jasper Conran London 36mm Watch with a Blue Dial and a Silver Metal bracelet', 'J1B104055', '1.jpg', 'Contemporary British design combined with high-quality materials give this Jasper Conran London timepiece a reassuring longevity to your own personal style. Made with solid stainless steel in a high polish finish, J1B104055 has a case diameter of 36mm. The dial is a playful high gloss pale blue that has been hand finished with individually applied busch set Austrian crystals and facetted hands with a circular date aperture at 3 o’clock. The high-quality specification is complete with a Japanese quartz movement, individual 3 link bracelet with deployment buckle, scratch resistant sapphire glass and water resistance to 50m.', 4, 2, 'female', '214.10', 10),
(13, 'Mens Emporio Armani Chronograph Watch', 'AR2434', 'AR243412658065194b72acb7d36ba.jpg', 'From the Emporio Armani Renato range, this Gents Emporio Armani Renato Chronograph Watch oozes style and class.\r\n\r\nThe three-dial chronograph offers full functionality, with subdials measuring hours, minutes and seconds, perfect for being on time all the time. Its 5 ATM water pressure resistance means it can withstand short periods in shallow water when you hit the beach, while the mineral glass helps it stay smart at all times. The date dial housed at 4 o’clock is a handy extra, too.\r\n\r\nThe on-trend contrast between the jet-black dial and the stainless steel case and bracelet helps you dress to impress. Silver baton hour markers and a double locking clasp complete the stylish look.', 5, NULL, 'male', '225.67', 4),
(14, 'Mens Maurice Lacroix Pontos Automatic Watch', NULL, 'PT6358_SS002_430_1.jpg', 'Maurice Lacroix Pontos PT6358-SS002-430-1 is an amazing and very impressive Gents watch from Potos Day - Date collection. Material of the case is Stainless Steel while the dial colour is Blue. In regards to the water resistance, the watch has a water resistance of 100 metres. This makes it suitable for swimming, but not high impact water sports. We ship it with an original box and a guarantee from the manufacturer.', 5, 2, 'male', '1723.71', 14),
(15, 'Mens Baume & Mercier Clifton Automatic Watch', NULL, 'M0A104682.jpg', 'Baume & Mercier Clifton M0A10468 is an amazing and attractive Gents watch from Baumatic collection. Case material is Stainless Steel, which stands for a high quality of the item. The features of the watch include (among others) a date function. In regards to the water resistance, the watch has got a resistancy up to 50 metres. It means it can be submerged in water for periods, so can be used for swimming and fishing. It is not reccomended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 4, 7, 'male', '3231.96', 11),
(16, 'Mens HUGO Smash Watch', NULL, '1530136_LRG_rgb_Web.jpg', 'HUGO gents watch from the #SMASH family. Featuring a 43mm blue IP case, blue dial and blue IP mesh bracelet. Water resistant to 5ATM.\r\nHUGO watches speak the language of self-expression fluently. They are about individual accents that reflect wearers’ uniqueness, losing nothing in translation. Opportunities replace rules in designs with attitude for wearers to match. Originality is the common denominator of a broad spectrum of eye-catching designs with some teasing twists. These timepieces are the ideal accomplices for men and women with up-to-the-minute lifestyles where comfort zones rarely appear on the map. Personality is not negotiable.', 3, 3, 'male', '116.80', 26),
(17, 'Junghans Watch', NULL, '27_4108.02_front.jpg', 'Junghans max bill Auto 27/4108.02 is an attractive Unisex watch. Material of the case is Plated Stainless Steel while the dial colour is White. In regards to the water resistance, the watch is marked as water resistant to 30 metres. This means it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. The watch is shipped with an original box and a guarantee from the manufacturer.', 5, NULL, 'female', '1513.92', 15),
(18, 'STORM SM2 Mesh Silver Smartwatch', '47510/S', 'SM2_SMART_WATCH_MESH_SILVER.jpg', 'For anyone looking to make a striking fashion statement, a STORM watch is the perfect choice for both men and women. The British designer creates watches that are more than simply modern - they look truly futuristic. A mixture of digital, analogue and chronograph are available for men and women, in a vast variety of colours and materials. The more subtle pieces feature slim, bangle-inspired straps holding minimalist timepieces encrusted with Swarovski crystals to catch the light. Lovers of colour will adore the pieces with vivid blue, purple or green faces, coupled with bright silver straps to create a striking look. Some of the designs are so contemporary, there\'s no one word to describe them; the pieces experiment with the very act of timekeeping itself, incorporating lights to indicate the time instead of digits.', 4, 16, 'female', '90.71', 42),
(19, 'STORM Reli Mesh Rose Gold Pink Exclusive Watch', '47498/RG/PK', 'Reli_Rose_Gold_Pink.jpg', 'STORM Reli Rose Gold Pink 47498/RG/PK is a beautiful and trendy Ladies watch from AW21 collection. Case material is Stainless Steel, which stands for a high quality of the item and the White dial gives the watch that unique look. 50 metres water resistancy will protect the watch and allows it to be submerged in water for periods, so can be used for swimming and fishing. It is not recommended for high impact water sports. The watch is shipped with an original box and a guarantee from the manufacturer.', 3, 7, 'female', '192.77', 16),
(20, 'Ladies Anne Klein Watch', NULL, '10-n9168wtwt-1461248971-441.jpg', 'Anne Klein 10/N9168WTWT is an amazing and eye-catching Ladies watch. Case material is Stainless Steel while the dial colour is White. In regards to the water resistance, the watch has got a resistancy up to 30 metres. It means it can be worn in scenarios where it is likely to be splashed but not immersed in water. It can be worn while washing your hands and will be fine in rain. The watch is shipped with an original box and a guarantee from the manufacturer.', NULL, 5, 'female', '62.37', 33);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
