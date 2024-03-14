-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 09:58 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nandhini`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `ad_login` varchar(20) NOT NULL,
  `ad_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ad_login`, `ad_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `arrival`
--

CREATE TABLE `arrival` (
  `id` int(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_type` varchar(100) NOT NULL,
  `old_price` int(20) NOT NULL,
  `new_price` int(20) NOT NULL,
  `p_img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `basketID` int(11) NOT NULL,
  `basketSession` varchar(50) DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `productPrice` varchar(50) DEFAULT NULL,
  `productQty` int(11) NOT NULL,
  `rtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `wh_number` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `overall_total` int(11) NOT NULL,
  `cus_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `name`, `email`, `wh_number`, `city`, `address`, `sub_total`, `discount`, `overall_total`, `cus_date`) VALUES
(2, 'Saravanan', 'saravanaperumal886@gmail.com', '99999999999999', 'Sivakasi', '1/1426 B, Thiruvalluvar Nagar', 16240, 12992, 3248, '2023-04-11'),
(3, 'Sarap', 'WWW@GMAIL.COM', '6666666666666666', 'Sivakasi', '1/1426 B, Thiruvalluvar Nagar', 19450, 15560, 3890, '2023-04-11'),
(4, 'eee', 'saravanaperumal886@gmail.com', '666', 'Sivakasi', '1/1426 B, Thiruvalluvar Nagar', 12914, 10331, 2583, '2023-04-11'),
(5, 'ganesh', 'sarap@gmail.com', '9787951522', 'chennai', '44444', 100, 300, 400, '2023-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `kid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `keywords` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`kid`, `pid`, `keywords`) VALUES
(7, 1, 'Slim Fit Royal Blue'),
(8, 1, 'Designer Suits'),
(9, 1, 'PRODUCTS'),
(13, 3, 'Hand Bell - For Perumal'),
(14, 3, 'Brass Lamps And Arts Plates'),
(15, 3, 'PRODUCTS'),
(16, 4, 'Kerala Lamp 1'),
(17, 4, 'Brass Lamps And Arts Plates'),
(18, 4, 'RENTAL MENS'),
(19, 5, 'Step Lamps With Annams - 4ft'),
(20, 5, 'Brass Lamps And Arts Plates'),
(21, 5, 'PRODUCTS'),
(28, 8, 'Brass Astothira Deppam (Ganesh)'),
(29, 8, 'Brass Lamps And Arts Plates'),
(30, 8, 'PRODUCTS'),
(91, 29, 'Laxmi Standing15SPL silver inlay'),
(92, 29, 'Special Orders'),
(93, 29, 'RENTAL MENS'),
(103, 33, 'higreavaa 11 Sitting Spl solid'),
(104, 33, 'Special Orders'),
(105, 33, 'RENTAL MENS'),
(112, 36, 'Amman Face Handmade'),
(113, 36, 'Special Orders'),
(114, 36, 'RENTAL MENS'),
(115, 37, 'Vittal Rukmani 13nf bronze'),
(116, 37, 'Special Orders'),
(117, 37, 'RENTAL MENS'),
(127, 41, 'Bronze Bala Tirupura sundari 18nf SPL'),
(128, 41, 'Special Orders'),
(129, 41, 'RENTAL MENS'),
(136, 44, 'durga 18hands Spl 31nf'),
(137, 44, 'Special Orders'),
(138, 44, 'RENTAL MENS'),
(145, 47, 'Krishna Special Art Arch 5ft Af Bronze'),
(146, 47, 'Special Orders'),
(147, 47, 'RENTAL MENS'),
(307, 101, 'Laxmi Siting on Leafbase 3ft Spl Af'),
(308, 101, 'Laxmi'),
(309, 101, 'RENTAL MENS'),
(313, 102, 'TNatraja Spl Af-15.inch'),
(314, 102, 'Natarajar'),
(315, 102, 'RENTAL MENS'),
(364, 119, 'bronze Parvathi 4ft Af'),
(365, 119, 'Parvathi/Sivagami'),
(366, 119, 'RENTAL MENS'),
(367, 120, 'Vishnu Spl Af - 5 ft'),
(368, 120, 'Perumal/Vishnu'),
(369, 120, 'RENTAL MENS'),
(370, 121, 'Perumal solid -Lacker Coat nf 10 inch'),
(371, 121, 'Perumal/Vishnu'),
(372, 121, 'RENTAL MENS'),
(376, 123, 'Gaja Perumal SPL SET 8 laxmi +10 avathar 75 Inch Af'),
(377, 123, 'Perumal/Vishnu'),
(378, 123, 'RENTAL MENS'),
(379, 124, 'Gaja Perumal Spl 24'),
(380, 124, 'Perumal/Vishnu'),
(381, 124, 'RENTAL MENS'),
(382, 125, 'Gaja Perumal Af 15'),
(383, 125, 'Perumal/Vishnu'),
(384, 125, 'RENTAL MENS'),
(412, 135, 'Saraswathi25spl Sitting Af'),
(413, 135, 'Saraswathi'),
(414, 135, 'RENTAL MENS'),
(415, 136, 'Virichiga Thandavam Af 18'),
(416, 136, 'Shiva'),
(417, 136, 'RENTAL MENS'),
(418, 137, 'Veenadara Siva 30 Af'),
(419, 137, 'Shiva'),
(420, 137, 'RENTAL MENS'),
(421, 138, 'Urduva Thandavm 21 Af'),
(422, 138, 'Shiva'),
(423, 138, 'RENTAL MENS'),
(424, 139, 'Thandavam & Amman'),
(425, 139, 'Shiva'),
(426, 139, 'RENTAL MENS'),
(427, 140, 'Thandavam 26 Af'),
(428, 140, 'Shiva'),
(429, 140, 'RENTAL MENS'),
(430, 141, 'Siva Markandaiyar 13 Af'),
(431, 141, 'Shiva'),
(432, 141, 'RENTAL MENS'),
(433, 142, 'Siva+Parvathi Solid Spl 15'),
(434, 142, 'Shiva'),
(435, 142, 'RENTAL MENS'),
(436, 143, 'Siva Sitting 25 Af'),
(437, 143, 'Shiva'),
(438, 143, 'RENTAL MENS'),
(439, 144, 'Siva Parvathi Set 18 SPL Af'),
(440, 144, 'Shiva'),
(441, 144, 'RENTAL MENS'),
(442, 145, 'Rishabadevar Set 12 Af Rb'),
(443, 145, 'Shiva'),
(444, 145, 'RENTAL MENS'),
(445, 146, 'Rishabadevar Af Spl 10'),
(446, 146, 'Shiva'),
(447, 146, 'RENTAL MENS'),
(448, 147, 'Rishabadevar 24 spl Af'),
(449, 147, 'Shiva'),
(450, 147, 'RENTAL MENS'),
(451, 148, 'Chatur Thandavam 36 SPL Af'),
(452, 148, 'Shiva'),
(453, 148, 'RENTAL MENS'),
(454, 149, 'Renganathar Sayanam Perumal-SPL Af -18 Inch H'),
(455, 149, 'Renganathar Perumal'),
(456, 149, 'RENTAL MENS'),
(457, 150, 'Renganathar SPL 4 inch Af'),
(458, 150, 'Renganathar Perumal'),
(459, 150, 'RENTAL SUITS'),
(460, 151, 'Renganathar Set 18 Inch spl Af'),
(461, 151, 'Renganathar Perumal'),
(462, 151, 'RENTAL SUITS'),
(463, 152, 'Renganathar Set 8 Af'),
(464, 152, 'Renganathar Perumal'),
(465, 152, 'RENTAL SUITS'),
(466, 153, 'Varagha+Narasiman with Amman7 Sitting AF'),
(467, 153, 'Avathars'),
(468, 153, 'RENTAL SUITS'),
(469, 154, 'Varaghi+Amman 6Nf'),
(470, 154, 'Avathars'),
(471, 154, 'RENTAL SUITS'),
(472, 155, 'Narayana Laxmi 7inch Af'),
(473, 155, 'Avathars'),
(474, 155, 'RENTAL SUITS'),
(475, 156, 'Higreavaa 11 Sitting Spl solid'),
(476, 156, 'Avathars'),
(477, 156, 'RENTAL SUITS'),
(478, 157, 'Venugopal+Set-32spl'),
(479, 157, 'Venugopal 4 Hands'),
(480, 157, 'RENTAL SUITS'),
(481, 158, 'Venugopal + 2 dancing Lady Set Af 24'),
(482, 158, 'Venugopal 4 Hands'),
(483, 158, 'RENTAL SUITS'),
(484, 159, 'Venugopal 24 spl + 2 lady SPL Af'),
(485, 159, 'Venugopal 4 Hands'),
(486, 159, 'RENTAL SUITS'),
(487, 160, 'Venugopal 15 spl dye'),
(488, 160, 'Venugopal 4 Hands'),
(489, 160, 'RENTAL SUITS'),
(490, 161, 'Venugopal 24 Af Spl'),
(491, 161, 'Venugopal 4 Hands'),
(492, 161, 'RENTAL SUITS'),
(493, 162, 'Nandi Spl Af-18bx12hgt'),
(494, 162, 'Other Idols'),
(495, 162, 'RENTAL SUITS'),
(496, 163, 'KamadhenuSPL Standing-12inch'),
(497, 163, 'Other Idols'),
(498, 163, 'RENTAL SUITS'),
(499, 164, 'Durga on Lion Nf-9inch'),
(500, 164, 'Other Idols'),
(501, 164, 'RENTAL SUITS'),
(502, 165, 'Durga GOLD solid Nf-6inch'),
(503, 165, 'Other Idols'),
(504, 165, 'RENTAL SUITS'),
(505, 166, 'Balaji+AmmanArch NF set-12inch'),
(506, 166, 'Other Idols'),
(507, 166, 'RENTAL SUITS'),
(508, 167, 'Arumuga Kadavul Nf-10inch'),
(509, 167, 'Other Idols'),
(510, 167, 'RENTAL SUITS'),
(511, 168, 'Chakrat Alwar Nf-6inch'),
(512, 168, 'Other Idols'),
(513, 168, 'RENTAL SUITS'),
(514, 169, 'Jain Thiirthankar24 Gold-10inch'),
(515, 169, 'Other Idols'),
(516, 169, 'RENTAL SUITS'),
(517, 170, 'RajaRajeswari+Umbrella Spl Nf-10inch'),
(518, 170, 'Other Idols'),
(519, 170, 'RENTAL SUITS'),
(520, 171, 'Vel Balamurugan Peacock Nf-5inch'),
(521, 171, 'Other Idols'),
(522, 171, 'RENTAL SUITS'),
(523, 172, 'Subramaniyar Set Nf -19inch'),
(524, 172, 'Other Idols'),
(525, 172, 'RENTAL SUITS'),
(526, 173, 'Pitchandavar Spl Af- 9.5.inch'),
(527, 173, 'Other Idols'),
(528, 173, 'RENTAL SUITS'),
(529, 174, 'Pitchandavar Spl Af-10inch'),
(530, 174, 'Other Idols'),
(531, 174, 'RENTAL SUITS'),
(532, 175, 'Paavai Vilakku solid Set Af-12inch'),
(533, 175, 'Other Idols'),
(534, 175, 'RENTAL SUITS'),
(535, 176, 'Dakshina Moorthy Spl Nf-9inch'),
(536, 176, 'Other Idols'),
(537, 176, 'RENTAL SUITS'),
(538, 177, 'Kuber Solid Af-15inch'),
(539, 177, 'Other Idols'),
(540, 177, 'RENTAL SUITS'),
(541, 178, 'Iyappan+Mala+Arch solid SPL Nf-21inch'),
(542, 178, 'Other Idols'),
(543, 178, 'RENTAL SUITS'),
(544, 179, 'Hanuman Standing Spl Af-30inch'),
(545, 179, 'Other Idols'),
(546, 179, 'RENTAL SUITS'),
(547, 180, 'Diya lady gold-24inch'),
(548, 180, 'Other Idols'),
(549, 180, 'RENTAL SUITS'),
(550, 181, 'Boghsakthi SPL Af-2ft'),
(551, 181, 'Other Idols'),
(552, 181, 'RENTAL SUITS'),
(553, 182, 'Boghsakthi Baseless Af-9inch'),
(554, 182, 'Other Idols'),
(555, 182, 'RENTAL SUITS'),
(556, 183, 'Arthanari Spl RB Af-18inch'),
(557, 183, 'Other Idols'),
(558, 183, 'RENTAL SUITS'),
(559, 184, 'Arthanari SPL Nf-5Ft'),
(560, 184, 'Other Idols'),
(561, 184, 'RENTAL SUITS'),
(562, 185, 'Aandal Solid Af spl-15inch'),
(563, 185, 'Other Idols'),
(564, 185, 'RENTAL SUITS'),
(565, 186, 'Aadhi Andha Prabhu SPL Af-21inch'),
(566, 186, 'Other Idols'),
(567, 186, 'RENTAL SUITS'),
(568, 187, 'Tiruchendur Murugan 18nf'),
(569, 187, 'Other Idols'),
(570, 187, 'RENTAL SUITS'),
(571, 188, 'RISHABADEVA SET BRONZE'),
(572, 188, 'Small Idols'),
(573, 188, 'RENTAL SUITS'),
(574, 189, 'BRONZE LAXMI NARASIMHA 3NF'),
(575, 189, 'Small Idols'),
(576, 189, 'RENTAL SUITS'),
(577, 190, 'GANESH LAXMI SARASWATHY SET ARCH 5NF'),
(578, 190, 'Small Idols'),
(579, 190, 'RENTAL SUITS'),
(580, 191, 'Small Bronze Idols'),
(581, 191, 'Small Idols'),
(582, 191, 'RENTAL SUITS'),
(583, 192, 'Bronze handmade traditional idol polished-5 inch shani bhagawan'),
(584, 192, 'Small Idols'),
(585, 192, 'RENTAL SUITS'),
(586, 193, 'Copper handmade special finish artwork done statue-das avathar in arch, standing perumal and conrts Amman 2,with deep carved embossed 10 avathar vishnu idols,is excellent to see,perfect complete set.One will sure feel the presence of Lord in Home..'),
(587, 193, 'Small Idols'),
(588, 193, 'RENTAL SUITS'),
(589, 194, 'Nandi Hand Made NF 3 Inch'),
(590, 194, 'Dye Idols'),
(591, 194, 'RENTAL SUITS'),
(592, 195, 'Ganesh+Lingam 4inch'),
(593, 195, 'Dye Idols'),
(594, 195, 'RENTAL SUITS'),
(595, 196, 'Nandi Corner set-3inch'),
(596, 196, 'Dye Idols'),
(597, 196, 'RENTAL SUITS'),
(598, 197, 'Ganesh+Krishnababy-Pooja 4inch'),
(599, 197, 'Dye Idols'),
(600, 197, 'RENTAL SUITS'),
(601, 198, 'Shanmuganathar+Annam+Snake set-8inch'),
(602, 198, 'Dye Idols'),
(603, 198, 'RENTAL SUITS'),
(604, 199, 'Saibaba Relax Sit 3.5inch'),
(605, 199, 'Dye Idols'),
(606, 199, 'RENTAL SUITS'),
(607, 200, 'Happyman sitting-3inch'),
(608, 200, 'Dye Idols'),
(609, 200, 'RENTAL SUITS'),
(610, 201, 'Brass Handmade Special Idols'),
(611, 201, 'Dye Idols'),
(612, 201, 'RENTAL SUITS'),
(613, 202, 'Hanuman'),
(614, 202, 'Special idols'),
(615, 202, 'PRODUCTS'),
(616, 203, 'Natarajar'),
(617, 203, 'Special idols'),
(618, 203, 'PRODUCTS'),
(622, 205, 'Lord Vishnu'),
(623, 205, 'Special idols'),
(624, 205, 'PRODUCTS'),
(625, 206, 'Lord Vishnu'),
(626, 206, 'Special idols'),
(627, 206, 'PRODUCTS'),
(628, 207, 'Vishnu'),
(629, 207, 'Special idols'),
(630, 207, 'PRODUCTS'),
(631, 208, 'vishnu'),
(632, 208, 'Special idols'),
(633, 208, 'PRODUCTS'),
(634, 209, 'vishnu'),
(635, 209, 'Special idols'),
(636, 209, 'PRODUCTS'),
(643, 210, 'Lord Vishnu'),
(644, 210, 'Special idols'),
(645, 210, 'PRODUCTS'),
(646, 204, 'Special Idol'),
(647, 204, 'Special idols'),
(648, 204, 'PRODUCTS'),
(649, 1, '4 lakshmi'),
(650, 1, 'Lakshmi'),
(651, 1, 'PRODUCTS'),
(655, 3, '4 lakshmi'),
(656, 3, 'Lakshmi'),
(657, 3, 'PRODUCTS'),
(658, 4, '3 Â½â€ lakshmi'),
(659, 4, 'Lakshmi'),
(660, 4, 'PRODUCTS'),
(661, 0, '4 lakshmi'),
(662, 0, 'Lakshmi'),
(663, 0, 'PRODUCTS'),
(664, 0, '4 lakshmi'),
(665, 0, 'Lakshmi'),
(666, 0, 'PRODUCTS'),
(667, 0, '4 lakshmi'),
(668, 0, 'Lakshmi'),
(669, 0, 'PRODUCTS'),
(670, 1, '4 lakshmi'),
(671, 1, 'Lakshmi'),
(672, 1, 'PRODUCTS'),
(676, 0, '4 lakshmi'),
(677, 0, 'Lakshmi'),
(678, 0, 'PRODUCTS'),
(679, 0, '3 Â½â€ lakshmi'),
(680, 0, 'Lakshmi'),
(681, 0, 'PRODUCTS'),
(682, 3, '3 Â½â€ lakshmi'),
(683, 3, 'Lakshmi'),
(684, 3, 'PRODUCTS'),
(730, 4, 'Chakkar1'),
(731, 4, 'chakkar'),
(732, 4, 'PRODUCTS'),
(733, 5, 'Chakkar2'),
(734, 5, 'chakkar'),
(735, 5, 'PRODUCTS'),
(742, 6, 'chakkar3'),
(743, 6, 'chakkar'),
(744, 6, 'PRODUCTS'),
(748, 8, 'Bomb2'),
(749, 8, 'Bomb'),
(750, 8, 'PRODUCTS'),
(757, 1, 'Sample'),
(758, 1, 'munish'),
(759, 1, 'PRODUCTS'),
(763, 2, 'Sample1'),
(764, 2, 'munish'),
(765, 2, 'PRODUCTS'),
(766, 3, 'Sample2'),
(767, 3, 'sarap'),
(768, 3, 'PRODUCTS'),
(769, 4, 'Sample2'),
(770, 4, 'sarap'),
(771, 4, 'PRODUCTS'),
(772, 5, '100lax'),
(773, 5, 'hai'),
(774, 5, 'PRODUCTS'),
(775, 6, 'vedi'),
(776, 6, 'hai'),
(777, 6, 'PRODUCTS'),
(781, 7, 'Sample2'),
(782, 7, 'hello'),
(783, 7, 'PRODUCTS'),
(784, 8, 'tt'),
(785, 8, 'hello'),
(786, 8, 'PRODUCTS'),
(850, 29, 'Chakkar big(25pcs)'),
(851, 29, 'Ground chakkars'),
(852, 29, 'PRODUCTS'),
(862, 33, 'Disco wheel'),
(863, 33, 'Ground chakkars'),
(864, 33, 'PRODUCTS'),
(871, 36, 'Rocket bomb'),
(872, 36, 'Twinkling star '),
(873, 36, 'PRODUCTS'),
(874, 37, '3 sound rocket '),
(875, 37, 'Twinkling star '),
(876, 37, 'PRODUCTS'),
(886, 41, '10cm green sparklers'),
(887, 41, 'Sparklers '),
(888, 41, 'PRODUCTS'),
(895, 44, '15cm green sparklers '),
(896, 44, 'Sparklers '),
(897, 44, 'PRODUCTS'),
(904, 47, '30cm green sparklers '),
(905, 47, 'Sparklers '),
(906, 47, 'PRODUCTS'),
(1069, 101, 'Sky Traffic (25 shot)'),
(1070, 101, 'Biggest shots'),
(1071, 101, 'PRODUCTS'),
(1072, 102, 'Grants (16 shot)'),
(1073, 102, 'Biggest shots'),
(1074, 102, 'PRODUCTS'),
(1198, 39, '3 sound rocket'),
(1199, 39, 'Rocket '),
(1200, 39, 'PRODUCTS'),
(1498, 119, 'Chakkar Big(10 pcs)'),
(1499, 119, 'Chakkar'),
(1500, 119, 'PRODUCTS'),
(1501, 120, 'Chakkar Special'),
(1502, 120, 'Chakkar'),
(1503, 120, 'PRODUCTS'),
(1504, 121, 'Chakkar Deluxe'),
(1505, 121, 'Chakkar'),
(1506, 121, 'PRODUCTS'),
(1759, 112, '7 Shot Colour (5pcs)'),
(1760, 112, 'New Arrivals'),
(1761, 112, 'PRODUCTS'),
(1771, 13, '5â€ avathar '),
(1772, 13, 'ONE SOUND CRACKERS'),
(1773, 13, 'PRODUCTS'),
(1774, 14, 'Two sound'),
(1775, 14, 'ONE SOUND CRACKERS'),
(1776, 14, 'PRODUCTS'),
(1777, 12, '4â€ super deluxe'),
(1778, 12, 'ONE SOUND CRACKERS'),
(1779, 12, 'PRODUCTS'),
(1780, 11, '2 Â¾â€ kuruvi'),
(1781, 11, 'ONE SOUND CRACKERS'),
(1782, 11, 'PRODUCTS'),
(1783, 10, '3 Â½â€ lakshmi'),
(1784, 10, 'ONE SOUND CRACKERS'),
(1785, 10, 'PRODUCTS'),
(1786, 9, '4â€lakshmi'),
(1787, 9, 'ONE SOUND CRACKERS'),
(1788, 9, 'PRODUCTS'),
(1792, 18, 'Stripped bijili 50 bag'),
(1793, 18, 'BIJILI CRACKERS'),
(1794, 18, 'PRODUCTS'),
(1795, 17, 'Stripped bijili 100 pcs'),
(1796, 17, 'BIJILI CRACKERS'),
(1797, 17, 'PRODUCTS'),
(1798, 16, ' Red bijili 50 bag'),
(1799, 16, 'BIJILI CRACKERS'),
(1800, 16, 'PRODUCTS'),
(1801, 15, 'Red bijili 100 pcs'),
(1802, 15, 'BIJILI CRACKERS'),
(1803, 15, 'PRODUCTS'),
(1804, 23, 'Bullet bomb'),
(1805, 23, '2 ATOM BOMB'),
(1806, 23, 'PRODUCTS'),
(1807, 22, 'Jurassic bomb'),
(1808, 22, '2 ATOM BOMB'),
(1809, 22, 'PRODUCTS'),
(1810, 21, 'Classic Bomb'),
(1811, 21, '2 ATOM BOMB'),
(1812, 21, 'PRODUCTS'),
(1813, 20, 'King of king'),
(1814, 20, '2 ATOM BOMB'),
(1815, 20, 'PRODUCTS'),
(1816, 28, 'Flower pot deluxe'),
(1817, 28, 'FLOWER POTS'),
(1818, 28, 'PRODUCTS'),
(1819, 27, 'Flower pot Colour koti'),
(1820, 27, 'FLOWER POTS'),
(1821, 27, 'PRODUCTS'),
(1822, 26, 'Flower pot ashoka'),
(1823, 26, 'FLOWER POTS'),
(1824, 26, 'PRODUCTS'),
(1825, 25, 'Flower pot special'),
(1826, 25, 'FLOWER POTS'),
(1827, 25, 'PRODUCTS'),
(1828, 24, 'Flower pot big '),
(1829, 24, 'FLOWER POTS'),
(1830, 24, 'PRODUCTS'),
(1834, 35, '4â€™ twinkling star'),
(1835, 35, 'TWINKLING STAR'),
(1836, 35, 'PRODUCTS'),
(1840, 122, 'Two sound rocket'),
(1841, 122, 'ROCKET'),
(1842, 122, 'PRODUCTS'),
(1843, 38, 'Rocket bomb'),
(1844, 38, 'ROCKET'),
(1845, 38, 'PRODUCTS'),
(1846, 49, '50cm colour Sparklers'),
(1847, 49, 'SPARKLERS'),
(1848, 49, 'PRODUCTS'),
(1849, 48, '50cm electric sparklers'),
(1850, 48, 'SPARKLERS'),
(1851, 48, 'PRODUCTS'),
(1855, 46, '30cm colour sparklers '),
(1856, 46, 'SPARKLERS'),
(1857, 46, 'PRODUCTS'),
(1861, 43, '15cm colour sparklers '),
(1862, 43, 'SPARKLERS'),
(1863, 43, 'PRODUCTS'),
(1864, 42, '15cm electric sparklers'),
(1865, 42, 'SPARKLERS'),
(1866, 42, 'PRODUCTS'),
(1867, 40, '10cm electric sparklers'),
(1868, 40, 'SPARKLERS'),
(1869, 40, 'PRODUCTS'),
(1870, 123, '10cm Color'),
(1871, 123, 'SPARKLERS'),
(1872, 123, 'PRODUCTS'),
(1873, 124, '7cm electric'),
(1874, 124, 'SPARKLERS'),
(1875, 124, 'PRODUCTS'),
(1876, 125, '7cm Colour'),
(1877, 125, 'SPARKLERS'),
(1878, 125, 'PRODUCTS'),
(1882, 52, 'Colour paper bomb '),
(1883, 52, 'FANCY SPECIAL ITEMS'),
(1884, 52, 'PRODUCTS'),
(1885, 51, 'Paper bomb(250g)'),
(1886, 51, 'FANCY SPECIAL ITEMS'),
(1887, 51, 'PRODUCTS'),
(1888, 50, 'Paper bomb(500g) '),
(1889, 50, 'FANCY SPECIAL ITEMS'),
(1890, 50, 'PRODUCTS'),
(1894, 54, 'Ravindra 4â€ rock n roll(2pcs)'),
(1895, 54, '4â€ FANCY'),
(1896, 54, 'PRODUCTS'),
(1897, 55, 'Ravindra 4â€ 8d warf(2pcs) '),
(1898, 55, '4â€ FANCY'),
(1899, 55, 'PRODUCTS'),
(1900, 19, 'Ravindras Basket bomb'),
(1901, 19, 'BIJILI CRACKERS '),
(1902, 19, 'PRODUCTS'),
(1903, 61, '240 shots n-joy'),
(1904, 61, 'MULTI SHOTS'),
(1905, 61, 'PRODUCTS'),
(1906, 60, '120 shots jayam'),
(1907, 60, 'MULTI SHOTS'),
(1908, 60, 'PRODUCTS'),
(1912, 58, '30 shots leo '),
(1913, 58, 'MULTI SHOTS'),
(1914, 58, 'PRODUCTS'),
(1915, 59, '60 Shots Techno'),
(1916, 59, 'MULTI SHOTS'),
(1917, 59, 'PRODUCTS'),
(1918, 57, '25 shots rider '),
(1919, 57, 'MULTI SHOTS'),
(1920, 57, 'PRODUCTS'),
(1924, 67, 'Ravindra\'s 4â€ Royal Salute (2 Pcs) '),
(1925, 67, '4â€ FANCY SPECIAL ITEMS'),
(1926, 67, 'PRODUCTS'),
(1927, 66, 'Ravindras4â€ Barbie Girl (2pcs) '),
(1928, 66, '4â€ FANCY SPECIAL ITEMS'),
(1929, 66, 'PRODUCTS'),
(1930, 65, 'Ravindra\'s 4â€ Golden Octopussy(2 Pcs)'),
(1931, 65, '4â€ FANCY SPECIAL ITEMS'),
(1932, 65, 'PRODUCTS'),
(1933, 64, 'Ravindra\'s 4â€ Twin Angel(2pcs)'),
(1934, 64, '4â€ FANCY SPECIAL ITEMS'),
(1935, 64, 'PRODUCTS'),
(1936, 63, 'Ravindra\'s 4â€ Moti Mahal(2 Pcs)'),
(1937, 63, '4â€ FANCY SPECIAL ITEMS'),
(1938, 63, 'PRODUCTS'),
(1939, 62, 'Ravindra\'s 4\'\' Nakshatra'),
(1940, 62, '4â€ FANCY SPECIAL ITEMS'),
(1941, 62, 'PRODUCTS'),
(1942, 114, '4x4 Wheel'),
(1943, 114, '3 in 1 FANCY'),
(1944, 114, 'PRODUCTS'),
(1945, 75, 'Disco wheel (5 pcs)'),
(1946, 75, '3 in 1 FANCY'),
(1947, 75, 'PRODUCTS'),
(1951, 73, '7 shot colour  (5 pcs) '),
(1952, 73, '3 in 1 FANCY'),
(1953, 73, 'PRODUCTS'),
(1957, 71, '2 Â½ pipe '),
(1958, 71, '3 in 1 FANCY'),
(1959, 71, 'PRODUCTS'),
(1960, 72, '7 shot colour(1pcs) '),
(1961, 72, '3 in 1 FANCY'),
(1962, 72, 'PRODUCTS'),
(1963, 70, 'Chotta (single pcs box) '),
(1964, 70, '3 in 1 FANCY'),
(1965, 70, 'PRODUCTS'),
(1969, 68, 'Yahoo '),
(1970, 68, '3 in 1 FANCY'),
(1971, 68, 'PRODUCTS'),
(1972, 69, '3 in 1 fancy '),
(1973, 69, '3 in 1 FANCY'),
(1974, 69, 'PRODUCTS'),
(1975, 80, 'Kitkat '),
(1976, 80, 'TOYS SPARKLERS'),
(1977, 80, 'PRODUCTS'),
(1978, 79, 'Electric stone '),
(1979, 79, 'TOYS SPARKLERS'),
(1980, 79, 'PRODUCTS'),
(1981, 78, 'Magic pops'),
(1982, 78, 'TOYS SPARKLERS'),
(1983, 78, 'PRODUCTS'),
(1984, 77, 'Jee Boom Baa '),
(1985, 77, 'TOYS SPARKLERS'),
(1986, 77, 'PRODUCTS'),
(1987, 76, 'Cartoon '),
(1988, 76, 'TOYS SPARKLERS'),
(1989, 76, 'PRODUCTS'),
(1990, 32, 'Chakkar deluxe'),
(1991, 32, 'GROUND CHAKKARS'),
(1992, 32, 'PRODUCTS'),
(1993, 31, 'Chakkar special '),
(1994, 31, 'GROUND CHAKKARS'),
(1995, 31, 'PRODUCTS'),
(1996, 30, 'Chakkar big(10pcs)'),
(1997, 30, 'GROUND CHAKKARS'),
(1998, 30, 'PRODUCTS'),
(1999, 82, 'Symphony Musical Rocket'),
(2000, 82, 'MUSICAL ROCKETS'),
(2001, 82, 'PRODUCTS'),
(2002, 81, 'Musical rocket'),
(2003, 81, 'MUSICAL ROCKETS'),
(2004, 81, 'PRODUCTS'),
(2005, 85, 'Agni Missiles 25 Shot'),
(2006, 85, 'MULTIPLE MUSICAL SHOTS'),
(2007, 85, 'PRODUCTS'),
(2011, 84, 'Arabian Night 12 Shot'),
(2012, 84, 'MULTIPLE MUSICAL SHOTS'),
(2013, 84, 'PRODUCTS'),
(2014, 83, 'Jingle bells 6shot'),
(2015, 83, 'MULTIPLE MUSICAL SHOTS'),
(2016, 83, 'PRODUCTS'),
(2017, 93, 'Ravindra\'s Jackpot 240 shots'),
(2018, 93, 'Ravindra Multiple SHOTS'),
(2019, 93, 'PRODUCTS'),
(2020, 92, 'Ravindra\'s Casino 120 Shots'),
(2021, 92, 'Ravindra Multiple SHOTS'),
(2022, 92, 'PRODUCTS'),
(2023, 91, 'Ravindra\'s Rang Bazaar 60 Shot'),
(2024, 91, 'Ravindra Multiple SHOTS'),
(2025, 91, 'PRODUCTS'),
(2026, 90, 'Ravindra\'s Mid Night Gala 30 shot'),
(2027, 90, 'Ravindra Multiple SHOTS'),
(2028, 90, 'PRODUCTS'),
(2032, 89, 'Ravindra\'s Angel Queen 12 shot'),
(2033, 89, 'Ravindra Multiple SHOTS'),
(2034, 89, 'PRODUCTS'),
(2035, 88, 'Ravindra\'s Boom Boom 12 Shot'),
(2036, 88, 'Ravindra Multiple SHOTS'),
(2037, 88, 'PRODUCTS'),
(2038, 87, ' Ravindra\'s Sundae Magic 12 Shot'),
(2039, 87, 'Ravindra Multiple SHOTS'),
(2040, 87, 'PRODUCTS'),
(2041, 86, 'Ravindra\'s Silver Spring 12 Shot'),
(2042, 86, 'Ravindra Multiple SHOTS'),
(2043, 86, 'PRODUCTS'),
(2044, 97, 'Ravindra\'s Dil Chandhini '),
(2045, 97, '2â€ COMET DIL SERIES'),
(2046, 97, 'PRODUCTS'),
(2050, 96, 'Ravindra\'s Dil Masala'),
(2051, 96, '2â€ COMET DIL SERIES'),
(2052, 96, 'PRODUCTS'),
(2053, 95, 'Ravindra\'sDil Diwana'),
(2054, 95, '2â€ COMET DIL SERIES'),
(2055, 95, 'PRODUCTS'),
(2056, 94, 'Ravindra\'s Dil Dil'),
(2057, 94, '2â€ COMET DIL SERIES'),
(2058, 94, 'PRODUCTS'),
(2059, 100, 'Ravindra\'s Choco Dhamaka'),
(2060, 100, '2â€ COMET DHAMAKA SERIES'),
(2061, 100, 'PRODUCTS'),
(2062, 99, 'Ravindra\'s Nila Dhamaka'),
(2063, 99, '2â€ COMET DHAMAKA SERIES'),
(2064, 99, 'PRODUCTS'),
(2065, 98, 'Ravindra\'s Mirichi Dhamaka'),
(2066, 98, '2â€ COMET DHAMAKA SERIES'),
(2067, 98, 'PRODUCTS'),
(2068, 118, 'Photo Flash'),
(2069, 118, 'NEW ARRIVALS'),
(2070, 118, 'PRODUCTS'),
(2071, 117, 'Tin 5 in 1'),
(2072, 117, 'NEW ARRIVALS'),
(2073, 117, 'PRODUCTS'),
(2074, 113, 'Tri Colour '),
(2075, 113, 'NEW ARRIVALS'),
(2076, 113, 'PRODUCTS'),
(2077, 111, 'Water Queen '),
(2078, 111, 'NEW ARRIVALS'),
(2079, 111, 'PRODUCTS'),
(2080, 110, 'Peacock Beem'),
(2081, 110, 'NEW ARRIVALS'),
(2082, 110, 'PRODUCTS'),
(2083, 109, 'Popcorn'),
(2084, 109, 'NEW ARRIVALS'),
(2085, 109, 'PRODUCTS'),
(2086, 108, 'Wonder Star'),
(2087, 108, 'NEW ARRIVALS'),
(2088, 108, 'PRODUCTS'),
(2089, 107, 'Rock Star'),
(2090, 107, 'NEW ARRIVALS'),
(2091, 107, 'PRODUCTS'),
(2095, 106, 'Lion Gun '),
(2096, 106, 'NEW ARRIVALS'),
(2097, 106, 'PRODUCTS'),
(2098, 105, 'Butterfly'),
(2099, 105, 'NEW ARRIVALS'),
(2100, 105, 'PRODUCTS'),
(2101, 104, 'Helicopter'),
(2102, 104, 'NEW ARRIVALS'),
(2103, 104, 'PRODUCTS'),
(2104, 103, 'Spinner'),
(2105, 103, 'NEW ARRIVALS'),
(2106, 103, 'PRODUCTS'),
(2107, 116, 'Ravindra\'s Grants'),
(2108, 116, 'RAVINDRA\'S BIGGEST SHOTS'),
(2109, 116, 'PRODUCTS'),
(2110, 115, 'Ravindra\'s Sky Traffic'),
(2111, 115, 'RAVINDRA\'S BIGGEST SHOTS'),
(2112, 115, 'PRODUCTS'),
(2113, 53, 'Colour smoke '),
(2114, 53, 'FANCY SPECIAL ITEMS'),
(2115, 53, 'PRODUCTS'),
(2116, 34, '1 Â½â€™ twinkling star '),
(2117, 34, 'TWINKLING STAR'),
(2118, 34, 'PRODUCTS'),
(2119, 45, '30cm electric sparklers'),
(2120, 45, 'SPARKLERS'),
(2121, 45, 'PRODUCTS'),
(2155, 134, '10K CRACKER'),
(2156, 134, 'CHORSA AND CRACKER ITEMS'),
(2157, 134, 'PRODUCTS'),
(2158, 133, '5K CRACKER'),
(2159, 133, 'CHORSA AND CRACKER ITEMS'),
(2160, 133, 'PRODUCTS'),
(2161, 132, '2K CRACKER'),
(2162, 132, 'CHORSA AND CRACKER ITEMS'),
(2163, 132, 'PRODUCTS'),
(2164, 131, '1K CRACKER'),
(2165, 131, 'CHORSA AND CRACKER ITEMS'),
(2166, 131, 'PRODUCTS'),
(2167, 130, '100 CRACKER'),
(2168, 130, 'CHORSA AND CRACKER ITEMS'),
(2169, 130, 'PRODUCTS'),
(2170, 129, '24 DELUXE '),
(2171, 129, 'CHORSA AND CRACKER ITEMS'),
(2172, 129, 'PRODUCTS'),
(2173, 128, '56 GIANT'),
(2174, 128, 'CHORSA AND CRACKER ITEMS'),
(2175, 128, 'PRODUCTS'),
(2176, 127, '28 GIANT '),
(2177, 127, 'CHORSA AND CRACKER ITEMS'),
(2178, 127, 'PRODUCTS'),
(2179, 126, '28 CHORSA '),
(2180, 126, 'CHORSA AND CRACKER ITEMS'),
(2181, 126, 'PRODUCTS'),
(2194, 56, '12 Shot rider '),
(2195, 56, 'MULTI SHOTS'),
(2196, 56, 'PRODUCTS'),
(2197, 74, 'Whishling wheel(5 pcs)'),
(2198, 74, '3 in 1 FANCY'),
(2199, 74, 'PRODUCTS');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `name1` varchar(25) NOT NULL,
  `pwd1` varchar(25) NOT NULL,
  `ip1` varchar(25) NOT NULL,
  `ldate1` datetime NOT NULL,
  `attempt1` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `name1`, `pwd1`, `ip1`, `ldate1`, `attempt1`) VALUES
(1, 'admin', 'a801fc3', '::1', '2022-04-27 08:08:15', 'pass'),
(2, 'admin', 'a801fc3', '::1', '2022-04-27 09:12:36', 'pass'),
(3, 'admin', 'a801fc3', '::1', '2022-04-27 13:28:26', 'pass'),
(4, 'admin', 'a801fc3', '::1', '2022-05-03 12:56:15', 'pass'),
(5, 'admin', 'a801fc3', '::1', '2022-05-24 13:24:51', 'pass'),
(6, 'admin', 'a801fc3', '::1', '2022-05-24 13:26:43', 'pass'),
(7, 'admin', 'a801fc3', '::1', '2022-05-25 06:47:36', 'pass'),
(8, 'admin', 'a801fc3', '::1', '2022-05-25 11:32:05', 'pass'),
(9, 'admin', 'a801fc3', '::1', '2022-05-25 12:01:41', 'pass'),
(10, 'admin', 'a801fc3', '::1', '2022-05-25 12:02:09', 'pass'),
(11, 'admin', 'a801fc3', '::1', '2022-06-02 12:43:44', 'pass'),
(12, 'admin', 'a801fc3', '::1', '2022-06-02 15:20:05', 'pass'),
(13, 'admin', 'a801fc3', '::1', '2022-08-20 06:41:03', 'pass'),
(14, 'admin', 'a801fc3', '::1', '2022-09-01 09:12:18', 'pass'),
(15, 'admin', 'a801fc3', '::1', '2022-09-01 09:23:13', 'pass'),
(16, 'admin', 'a801fc3', '::1', '2022-09-06 10:38:56', 'pass'),
(17, 'admin', 'a801fc3', '::1', '2022-09-06 10:40:51', 'pass'),
(18, 'admin', 'a801fc3', '::1', '2022-09-06 11:59:40', 'pass'),
(19, 'admin', 'a801fc3', '::1', '2022-09-07 06:52:34', 'pass'),
(20, 'admin', 'a801fc3', '::1', '2022-09-08 14:21:24', 'pass'),
(21, 'admin', 'a801fc3', '::1', '2022-09-08 15:10:49', 'pass'),
(22, 'admin', 'a801fc3', '::1', '2022-09-08 15:34:18', 'pass'),
(23, 'admin', 'a801fc3', '::1', '2022-09-08 15:54:51', 'pass'),
(24, 'admin', 'a801fc3', '::1', '2022-09-09 06:36:45', 'pass'),
(25, 'admin', 'a801fc3', '::1', '2022-09-09 06:46:41', 'pass'),
(26, 'admin', 'a801fc3', '::1', '2022-09-09 15:12:06', 'pass'),
(27, 'admin', 'a801fc3', '::1', '2022-09-09 16:32:49', 'pass'),
(28, 'admin', 'a801fc3', '::1', '2022-09-09 16:48:17', 'pass'),
(29, 'admin', 'a801fc3', '::1', '2022-09-09 16:58:57', 'pass'),
(30, 'admin', 'a801fc3', '::1', '2022-09-09 18:00:33', 'pass'),
(31, 'admin', 'a801fc3', '::1', '2022-09-09 19:11:19', 'pass'),
(32, 'admin', 'a801fc3', '60.243.74.49', '2022-09-10 14:00:34', 'pass'),
(33, 'admin', 'a801fc3', '60.243.74.49', '2022-09-10 14:07:01', 'pass'),
(34, 'admin', '3629e7e', '60.243.74.49', '2022-09-10 14:10:45', 'pass'),
(35, 'admin', '3629e7e', '27.5.174.98', '2022-09-10 16:05:58', 'pass'),
(36, 'admin', '3629e7e', '27.62.138.123', '2022-09-10 17:05:31', 'pass'),
(37, 'admin', '3629e7e', '27.5.174.98', '2022-09-10 19:18:25', 'pass'),
(38, 'admin', '3629e7e', '27.5.174.98', '2022-09-10 20:38:57', 'pass'),
(39, 'Admin', '3629e7e', '42.106.178.226', '2022-09-11 04:05:27', 'pass'),
(40, 'Admin', '3629e7e', '42.106.178.226', '2022-09-11 04:06:33', 'pass'),
(41, 'Admin', '3629e7e', '42.106.178.226', '2022-09-11 04:16:00', 'pass'),
(42, 'admin', '3629e7e', '27.62.138.123', '2022-09-11 04:54:29', 'pass'),
(43, 'Admin', '3629e7e', '42.106.179.92', '2022-09-11 07:02:58', 'pass'),
(44, 'Admin', '3629e7e', '42.106.179.92', '2022-09-11 07:04:29', 'pass'),
(45, 'Admin ', '3629e7e', '223.182.198.33', '2022-09-11 07:15:07', 'pass'),
(46, 'admin', '3629e7e', '27.5.174.98', '2022-09-11 09:04:34', 'pass'),
(47, 'admin', '3629e7e', '27.62.142.183', '2022-09-11 13:34:39', 'pass'),
(48, 'Admin', '3629e7e', '106.220.255.174', '2022-09-11 15:17:07', 'pass'),
(49, 'theriyathu', '1f84e7b', '45.119.130.4', '2022-09-12 05:31:41', 'fail'),
(50, 'admin', 'a801fc3', '27.5.241.33', '2022-09-12 15:49:41', 'fail'),
(51, 'admin', 'a0d2c43', '27.62.142.183', '2022-09-12 17:09:37', 'fail'),
(52, 'admin', 'a801fc3', '42.106.177.7', '2022-09-13 13:14:47', 'fail'),
(53, 'admin', '3629e7e', '27.5.198.251', '2022-09-13 15:51:19', 'pass'),
(54, 'admin', '3629e7e', '27.5.198.251', '2022-09-13 16:16:33', 'pass'),
(55, 'admin', '3629e7e', '27.5.198.251', '2022-09-13 17:11:39', 'pass'),
(56, 'admin', '3629e7e', '122.174.4.12', '2022-09-14 06:04:17', 'pass'),
(57, 'Admin', '3629e7e', '42.106.178.134', '2022-09-14 11:14:32', 'pass'),
(58, '', 'cf8427e', '106.51.40.229', '2022-09-14 11:14:35', 'fail'),
(59, '', 'cf8427e', '223.196.9.69', '2022-09-14 11:14:36', 'fail'),
(60, 'nandhiniagaency', 'b0281aa', '103.84.178.106', '2022-09-15 08:56:47', 'fail'),
(61, 'admin ', '3629e7e', '103.84.178.106', '2022-09-15 08:57:17', 'pass'),
(62, 'admin', '3629e7e', '115.96.5.208', '2022-09-15 16:31:58', 'pass'),
(63, 'admin', '3629e7e', '103.84.178.106', '2022-09-16 06:09:37', 'pass'),
(64, 'admin', '3629e7e', '103.84.178.106', '2022-09-16 07:37:06', 'pass'),
(65, 'admin', '3629e7e', '103.84.178.106', '2022-09-16 07:42:03', 'pass'),
(66, 'admin', '3629e7e', '103.84.178.106', '2022-09-16 12:39:49', 'pass'),
(67, 'admin', '3629e7e', '103.84.178.106', '2022-09-17 09:58:42', 'pass'),
(68, 'Admin', '3629e7e', '42.106.179.52', '2022-10-03 05:01:38', 'pass'),
(69, 'admin', '3629e7e', '122.183.168.97', '2022-10-03 12:05:34', 'pass'),
(70, 'admin', '3629e7e', '182.77.35.59', '2022-10-07 05:37:28', 'pass'),
(71, 'Admin', '3629e7e', '42.106.179.189', '2022-10-29 06:46:00', 'pass'),
(72, 'admin', '3629e7e', '103.84.178.108', '2022-11-21 13:48:57', 'pass'),
(73, 'admin', '3629e7e', '103.84.178.108', '2022-11-22 13:19:15', 'pass'),
(74, 'Admin', '2fa874e', '157.49.90.192', '2022-11-23 07:01:15', 'fail'),
(75, 'Admin', '3629e7e', '157.49.90.192', '2022-11-23 07:03:00', 'pass'),
(76, 'admin', '3629e7e', '103.84.178.109', '2022-11-24 13:45:39', 'pass'),
(77, 'Admin', '3629e7e', '42.106.179.244', '2022-11-24 13:56:44', 'pass'),
(78, 'admin', 'a801fc3', '122.164.87.19', '2023-03-08 09:02:50', 'fail'),
(79, 'admin', '01497bc', '122.164.87.19', '2023-03-08 09:03:57', 'fail'),
(80, 'admin', '38c54c8', '122.164.87.19', '2023-03-08 09:04:08', 'fail'),
(81, 'Admin', '3629e7e', '42.106.178.210', '2023-03-10 09:00:49', 'pass'),
(82, 'admin', '2d808ff', '122.164.81.172', '2023-04-08 05:23:31', 'fail'),
(83, 'admin', 'a801fc3', '::1', '2023-04-08 07:46:46', 'pass'),
(84, 'admin', 'a801fc3', '::1', '2023-04-11 09:14:08', 'pass'),
(85, 'admin', 'a801fc3', '::1', '2023-04-11 09:35:07', 'pass'),
(86, 'admin', 'cf8427e', '::1', '2023-04-11 09:42:03', 'fail'),
(87, 'admin', 'cf8427e', '::1', '2023-04-11 09:43:02', 'fail'),
(88, 'admin', 'cf8427e', '::1', '2023-04-11 09:43:48', 'fail'),
(89, 'admin', 'cf8427e', '::1', '2023-04-11 09:44:23', 'fail'),
(90, 'admin', 'cf8427e', '::1', '2023-04-11 09:46:12', 'fail'),
(91, 'admin', 'cf8427e', '::1', '2023-04-11 09:46:15', 'fail'),
(92, 'admin', 'a801fc3', '::1', '2023-04-11 09:55:29', 'pass'),
(93, 'admin', 'a801fc3', '::1', '2023-04-11 09:56:50', 'pass'),
(94, 'admin', 'a801fc3', '::1', '2023-04-11 10:22:11', 'pass'),
(95, 'admin', 'a801fc3', '::1', '2023-04-11 10:23:22', 'pass'),
(96, 'admin', 'a801fc3', '::1', '2023-04-11 10:23:29', 'pass'),
(97, 'admin', 'a801fc3', '::1', '2023-04-11 10:31:43', 'pass'),
(98, 'admin', 'a801fc3', '::1', '2023-04-11 12:51:01', 'pass'),
(99, 'admin', 'a801fc3', '::1', '2023-04-11 12:57:52', 'pass'),
(100, 'admin', 'a801fc3', '::1', '2023-04-11 15:38:16', 'pass'),
(101, 'admin', 'a801fc3', '::1', '2023-04-11 16:02:47', 'pass'),
(102, 'admin', 'a801fc3', '::1', '2023-04-12 07:27:26', 'pass'),
(103, 'admin', 'a801fc3', '::1', '2023-04-12 07:41:15', 'pass'),
(104, 'admin', 'a801fc3', '::1', '2023-04-12 07:54:36', 'pass'),
(105, 'admin', 'a801fc3', '::1', '2023-04-12 07:56:41', 'pass'),
(106, 'admin', 'a801fc3', '::1', '2023-04-12 09:26:33', 'pass'),
(107, 'admin', 'a801fc3', '::1', '2023-04-12 09:29:13', 'pass'),
(108, 'admin', 'a801fc3', '::1', '2023-04-12 09:30:02', 'pass'),
(109, 'admin', 'a801fc3', '::1', '2023-04-12 11:21:35', 'pass'),
(110, 'admin', 'a801fc3', '::1', '2023-04-12 11:33:19', 'pass'),
(111, 'admin', 'a801fc3', '::1', '2023-04-13 07:11:07', 'pass'),
(112, 'admin', 'a801fc3', '::1', '2023-04-13 15:33:12', 'pass'),
(113, 'admin', 'a801fc3', '::1', '2023-04-13 15:47:41', 'pass'),
(114, 'admin', 'a801fc3', '::1', '2023-04-13 15:54:00', 'pass'),
(115, 'admin', 'a801fc3', '::1', '2023-04-15 06:59:20', 'pass'),
(116, 'admin', 'a801fc3', '::1', '2023-04-20 09:55:24', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `popup`
--

CREATE TABLE `popup` (
  `style_id` int(11) NOT NULL,
  `imaged` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `hlink` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `popup`
--

INSERT INTO `popup` (`style_id`, `imaged`, `hlink`, `status`) VALUES
(1, 'uploads/banner3.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_uname` varchar(100) NOT NULL,
  `admin_pwd` varchar(25) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_uname`, `admin_pwd`, `admin_email`, `admin_status`) VALUES
(4, 'admin', 'a801fc3', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_arrival`
--

CREATE TABLE `tbl_arrival` (
  `id` int(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `mrp` int(30) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id1` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL,
  `cat_status` int(1) NOT NULL,
  `catimg` varchar(200) NOT NULL,
  `sortid` int(11) NOT NULL,
  `submenu` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id1`, `cat_id`, `cat_name`, `cat_status`, `catimg`, `sortid`, `submenu`) VALUES
(1, 1, 'PRODUCTS', 1, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gift_pack`
--

CREATE TABLE `tbl_gift_pack` (
  `id` int(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `mrp` int(30) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gift_pack`
--

INSERT INTO `tbl_gift_pack` (`id`, `product_name`, `product_type`, `mrp`, `product_image`, `product_category`) VALUES
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44),
(0, 'rr', '0', 0, 'upload/21.jpg', 44);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `image_id` int(11) NOT NULL,
  `Product_id` int(11) NOT NULL,
  `Product_image` varchar(250) NOT NULL,
  `thumb_image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`image_id`, `Product_id`, `Product_image`, `thumb_image`) VALUES
(1, 5, 'products/1662734602.jpg', 'products/1662734602.jpg'),
(2, 6, 'products/1662734628.jpg', 'products/1662734628.jpg'),
(3, 7, 'products/1662734675.jpg', 'products/1662734675.jpg'),
(4, 8, 'products/1662734700.jpg', 'products/1662734700.jpg'),
(5, 9, 'products/1662820297.jpg', 'products/1662820297.jpg'),
(6, 10, 'products/1662820338.jpg', 'products/1662820338.jpg'),
(7, 11, 'products/1662820672.jpg', 'products/1662820672.jpg'),
(8, 12, 'products/1662820710.jpg', 'products/1662820710.jpg'),
(9, 13, 'products/1662820741.jpg', 'products/1662820741.jpg'),
(10, 14, 'products/1662820779.jpg', 'products/1662820779.jpg'),
(11, 15, 'products/1662823369.jpg', 'products/1662823369.jpg'),
(12, 16, 'products/1662823401.jpg', 'products/1662823401.jpg'),
(13, 17, 'products/1662823439.jpg', 'products/1662823439.jpg'),
(14, 18, 'products/1662823470.jpg', 'products/1662823470.jpg'),
(15, 19, 'products/1662823494.jpg', 'products/1662823494.jpg'),
(16, 20, 'products/1662826006.jpg', 'products/1662826006.jpg'),
(17, 21, 'products/1662826043.jpg', 'products/1662826043.jpg'),
(18, 22, 'products/1662826226.jpg', 'products/1662826226.jpg'),
(19, 23, 'products/1662826265.jpg', 'products/1662826265.jpg'),
(20, 24, 'products/1662826700.jpg', 'products/1662826700.jpg'),
(21, 25, 'products/1662826730.jpg', 'products/1662826730.jpg'),
(22, 26, 'products/1662826770.jpg', 'products/1662826770.jpg'),
(23, 27, 'products/1662826803.jpg', 'products/1662826803.jpg'),
(24, 28, 'products/1662826838.jpg', 'products/1662826838.jpg'),
(25, 29, 'products/1662827395.jpg', 'products/1662827395.jpg'),
(26, 30, 'products/1662827425.jpg', 'products/1662827425.jpg'),
(27, 31, 'products/1662827466.jpg', 'products/1662827466.jpg'),
(28, 32, 'products/1662827523.jpg', 'products/1662827523.jpg'),
(29, 33, 'products/1662827633.jpg', 'products/1662827633.jpg'),
(30, 34, 'products/1662827785.jpg', 'products/1662827785.jpg'),
(31, 35, 'products/1662827806.jpg', 'products/1662827806.jpg'),
(32, 36, 'products/1662827954.jpg', 'products/1662827954.jpg'),
(33, 37, 'products/1662827984.jpg', 'products/1662827984.jpg'),
(34, 38, 'products/1662828088.jpg', 'products/1662828088.jpg'),
(35, 39, 'products/1662828135.jpg', 'products/1662828135.jpg'),
(36, 40, 'products/1662829606.jpg', 'products/1662829606.jpg'),
(37, 41, 'products/1662829626.jpg', 'products/1662829626.jpg'),
(38, 42, 'products/1662829651.jpg', 'products/1662829651.jpg'),
(39, 43, 'products/1662829673.jpg', 'products/1662829673.jpg'),
(40, 44, 'products/1662829702.jpg', 'products/1662829702.jpg'),
(41, 45, 'products/1662829726.jpg', 'products/1662829726.jpg'),
(42, 46, 'products/1662829850.jpg', 'products/1662829850.jpg'),
(43, 47, 'products/1662829872.jpg', 'products/1662829872.jpg'),
(44, 48, 'products/1662829891.jpg', 'products/1662829891.jpg'),
(45, 49, 'products/1662829920.jpg', 'products/1662829920.jpg'),
(46, 50, 'products/1662830299.jpg', 'products/1662830299.jpg'),
(47, 51, 'products/1662830321.jpg', 'products/1662830321.jpg'),
(48, 52, 'products/1662830345.jpg', 'products/1662830345.jpg'),
(49, 53, 'products/1662830363.jpg', 'products/1662830363.jpg'),
(50, 54, 'products/1662830668.jpg', 'products/1662830668.jpg'),
(51, 55, 'products/1662830739.jpg', 'products/1662830739.jpg'),
(52, 56, 'products/1678439445.jpg', 'products/1678439445.jpg'),
(53, 57, 'products/1662831367.jpg', 'products/1662831367.jpg'),
(54, 58, 'products/1662831392.jpg', 'products/1662831392.jpg'),
(55, 59, 'products/1662831418.jpg', 'products/1662831418.jpg'),
(56, 60, 'products/1662831440.jpg', 'products/1662831440.jpg'),
(57, 61, 'products/1662831467.jpg', 'products/1662831467.jpg'),
(58, 62, 'products/1662832594.jpg', 'products/1662832594.jpg'),
(59, 63, 'products/1662832612.jpg', 'products/1662832612.jpg'),
(60, 64, 'products/1662832631.jpg', 'products/1662832631.jpg'),
(61, 65, 'products/1662832665.jpg', 'products/1662832665.jpg'),
(62, 66, 'products/1662832684.jpg', 'products/1662832684.jpg'),
(63, 67, 'products/1662832704.jpg', 'products/1662832704.jpg'),
(64, 68, 'products/1662834355.jpg', 'products/1662834355.jpg'),
(65, 69, 'products/1662834373.jpg', 'products/1662834373.jpg'),
(66, 70, 'products/1662834406.jpeg', 'products/1662834406.jpeg'),
(67, 71, 'products/1662834424.jpg', 'products/1662834424.jpg'),
(68, 72, 'products/1662834443.jpg', 'products/1662834443.jpg'),
(69, 73, 'products/1662834465.jpg', 'products/1662834465.jpg'),
(70, 74, 'products/1678439609.jpg', 'products/1678439609.jpg'),
(71, 75, 'products/1662834535.jpg', 'products/1662834535.jpg'),
(72, 76, 'products/1662834626.jpg', 'products/1662834626.jpg'),
(73, 77, 'products/1662834650.jpg', 'products/1662834650.jpg'),
(74, 78, 'products/1662834669.jpg', 'products/1662834669.jpg'),
(75, 79, 'products/1662834693.jpg', 'products/1662834693.jpg'),
(76, 80, 'products/1662834711.jpg', 'products/1662834711.jpg'),
(77, 81, 'products/1662903577.jpg', 'products/1662903577.jpg'),
(78, 82, 'products/1662903613.jpg', 'products/1662903613.jpg'),
(79, 83, 'products/1662903827.jpg', 'products/1662903827.jpg'),
(80, 84, 'products/1662903866.jpeg', 'products/1662903866.jpeg'),
(81, 85, 'products/1662909705.jpg', 'products/1662909705.jpg'),
(82, 86, 'products/1662904564.jpg', 'products/1662904564.jpg'),
(83, 87, 'products/1662904606.jpg', 'products/1662904606.jpg'),
(84, 88, 'products/1662904644.jpg', 'products/1662904644.jpg'),
(85, 89, 'products/1662904673.jpg', 'products/1662904673.jpg'),
(86, 90, 'products/1662904747.jpg', 'products/1662904747.jpg'),
(87, 91, 'products/1662904893.jpg', 'products/1662904893.jpg'),
(88, 92, 'products/1662904824.jpg', 'products/1662904824.jpg'),
(89, 93, 'products/1662904847.jpg', 'products/1662904847.jpg'),
(90, 94, 'products/1662905312.jpg', 'products/1662905312.jpg'),
(91, 95, 'products/1662905407.jpg', 'products/1662905407.jpg'),
(92, 96, 'products/1662905504.jpg', 'products/1662905504.jpg'),
(93, 97, 'products/1662905569.jpg', 'products/1662905569.jpg'),
(94, 98, 'products/1662905922.jpg', 'products/1662905922.jpg'),
(95, 99, 'products/1662905947.jpg', 'products/1662905947.jpg'),
(96, 100, 'products/1662905971.jpg', 'products/1662905971.jpg'),
(97, 101, 'products/1662906711.jpg', 'products/1662906711.jpg'),
(98, 102, 'products/1662906772.jpg', 'products/1662906772.jpg'),
(99, 103, 'products/1662906802.jpg', 'products/1662906802.jpg'),
(100, 104, 'products/1662906826.jpg', 'products/1662906826.jpg'),
(101, 105, 'products/1662906850.jpg', 'products/1662906850.jpg'),
(102, 106, 'products/1662906872.jpg', 'products/1662906872.jpg'),
(103, 107, 'products/1662906957.jpg', 'products/1662906957.jpg'),
(104, 108, 'products/1662906987.jpg', 'products/1662906987.jpg'),
(105, 109, 'products/1662907019.jpg', 'products/1662907019.jpg'),
(106, 110, 'products/1662907049.jpg', 'products/1662907049.jpg'),
(107, 111, 'products/1662907077.jpg', 'products/1662907077.jpg'),
(108, 112, 'products/1662907107.jpg', 'products/1662907107.jpg'),
(109, 113, 'products/1662907135.jpg', 'products/1662907135.jpg'),
(110, 114, 'products/1663311558.jpg', 'products/1663311558.jpg'),
(111, 115, 'products/1663312964.jpg', 'products/1663312964.jpg'),
(112, 116, 'products/1663313618.jpg', 'products/1663313618.jpg'),
(113, 117, 'products/1663314048.jpg', 'products/1663314048.jpg'),
(114, 118, 'products/1663408899.jpg', 'products/1663408899.jpg'),
(115, 119, 'products/1664774135.jpg', 'products/1664774135.jpg'),
(116, 120, 'products/1664774202.jpg', 'products/1664774202.jpg'),
(117, 121, 'products/1664774235.jpg', 'products/1664774235.jpg'),
(118, 122, 'products/1664774426.jpg', 'products/1664774426.jpg'),
(119, 123, 'products/1669042032.jpeg', 'products/1669042032.jpeg'),
(120, 124, 'products/1669042253.jpeg', 'products/1669042253.jpeg'),
(121, 125, 'products/1669042272.jpeg', 'products/1669042272.jpeg'),
(122, 126, 'products/1669298431.jpg', 'products/1669298431.jpg'),
(123, 127, 'products/1669298415.jpg', 'products/1669298415.jpg'),
(124, 128, 'products/1669298388.jpg', 'products/1669298388.jpg'),
(125, 129, 'products/1669298369.jpg', 'products/1669298369.jpg'),
(126, 130, 'products/1669298350.jpg', 'products/1669298350.jpg'),
(127, 131, 'products/1669298329.jpg', 'products/1669298329.jpg'),
(128, 132, 'products/1669298302.jpg', 'products/1669298302.jpg'),
(129, 133, 'products/1669298281.jpg', 'products/1669298281.jpg'),
(130, 134, 'products/1669298265.jpg', 'products/1669298265.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_new_product`
--

CREATE TABLE `tbl_new_product` (
  `id` int(30) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `mrp` int(30) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_new_product`
--

INSERT INTO `tbl_new_product` (`id`, `product_name`, `product_type`, `mrp`, `product_image`, `product_category`) VALUES
(2, 'Symphony Musical  rocket', '1 Box', 935, 'upload/1-symph.jpg', 735),
(3, 'Musical  Rocket', '1 Box', 520, 'upload/2-ro.jpg', 470),
(5, 'Boomboom 12  shot', '1 Box', 1200, 'upload/3-boom.jpg', 1084),
(6, 'Peacock Beem', '1 Box', 700, 'upload/4-beem.jpg', 635),
(7, 'Tri Colour', '1 Box', 1000, 'upload/5-tri.jpg', 970),
(8, '7 shot  colour (5pcs)', '1 Box', 1000, 'upload/6-.jpg', 350);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_other`
--

CREATE TABLE `tbl_other` (
  `style_id` int(30) NOT NULL,
  `imaged` varchar(300) NOT NULL,
  `Product_name` varchar(200) NOT NULL,
  `Product_type` varchar(100) NOT NULL,
  `old_price` int(30) NOT NULL,
  `newPrice` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `Product_name` varchar(100) DEFAULT NULL,
  `Product_rate` double DEFAULT NULL,
  `Product_type` varchar(100) DEFAULT NULL,
  `Product_desc` text DEFAULT NULL,
  `Product_image` varchar(250) DEFAULT NULL,
  `thumb_image` varchar(100) DEFAULT NULL,
  `Product_status` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `cat_id`, `subcat_id`, `Product_name`, `Product_rate`, `Product_type`, `Product_desc`, `Product_image`, `thumb_image`, `Product_status`) VALUES
(11, 1, 1, '2 2/3 kuruvi', 40, '0', '', 'products/1662820672.jpg', 'products/1662820672.jpg', 0),
(9, 1, 1, '4â€lakshmi', 85, '0', '', 'products/1662820297.jpg', 'products/1662820297.jpg', 0),
(10, 1, 1, '3 Â½â€ lakshmi', 52, '0', '', 'products/1662820338.jpg', 'products/1662820338.jpg', 0),
(12, 1, 1, '4â€ super deluxe', 125, '0', '', 'products/1662820710.jpg', 'products/1662820710.jpg', 0),
(13, 1, 1, '5â€ avathar ', 175, '0', '', 'products/1662820741.jpg', 'products/1662820741.jpg', 0),
(14, 1, 1, 'Two sound', 112, '0', '', 'products/1662820779.jpg', 'products/1662820779.jpg', 0),
(15, 1, 3, 'Red bijili 100 pcs', 138, '0', '', 'products/1662823369.jpg', 'products/1662823369.jpg', 0),
(16, 1, 3, ' Red bijili 50 bag', 70, '0', '', 'products/1662823401.jpg', 'products/1662823401.jpg', 0),
(17, 1, 3, 'Stripped bijili 100 pcs', 152, '0', '', 'products/1662823439.jpg', 'products/1662823439.jpg', 0),
(18, 1, 3, 'Stripped bijili 50 bag', 75, '0', '', 'products/1662823470.jpg', 'products/1662823470.jpg', 0),
(19, 1, 3, 'Ravindras Basket bomb', 270, '0', '', 'products/1662823494.jpg', 'products/1662823494.jpg', 0),
(20, 1, 4, 'King of king', 425, '0', '', 'products/1662826006.jpg', 'products/1662826006.jpg', 0),
(21, 1, 4, 'Classic Bomb', 675, '0', '', 'products/1662826043.jpg', 'products/1662826043.jpg', 0),
(22, 1, 4, 'Jurassic bomb', 825, '0', '', 'products/1662826226.jpg', 'products/1662826226.jpg', 0),
(23, 1, 4, 'Bullet bomb', 110, '0', '', 'products/1662826265.jpg', 'products/1662826265.jpg', 0),
(24, 1, 5, 'Flower pot big ', 300, '0', '', 'products/1662826700.jpg', 'products/1662826700.jpg', 0),
(25, 1, 5, 'Flower pot special', 450, '0', '', 'products/1662826730.jpg', 'products/1662826730.jpg', 0),
(26, 1, 5, 'Flower pot ashoka', 750, '0', '', 'products/1662826770.jpg', 'products/1662826770.jpg', 0),
(27, 1, 5, 'Flower pot Colour koti', 900, '0', '', 'products/1662826803.jpg', 'products/1662826803.jpg', 0),
(28, 1, 5, 'Flower pot deluxe', 750, '0', '', 'products/1662826838.jpg', 'products/1662826838.jpg', 0),
(117, 1, 22, 'Tin 5 in 1', 655, '10 Pieces', '', 'products/1663314048.jpg', 'products/1663314048.jpg', 0),
(30, 1, 16, 'Chakkar big(10pcs)', 153, '1 Box', '', 'products/1662827425.jpg', 'products/1662827425.jpg', 0),
(31, 1, 16, 'Chakkar special ', 350, '1 Box', '', 'products/1662827466.jpg', 'products/1662827466.jpg', 0),
(32, 1, 16, 'Chakkar deluxe', 675, '1 Box', '', 'products/1662827523.jpg', 'products/1662827523.jpg', 0),
(127, 1, 24, '28 GIANT ', 105, '10 Pieces', '', 'products/1669298415.jpg', 'products/1669298415.jpg', 0),
(34, 1, 6, '1 Â½â€™ twinkling star ', 118, '0', '', 'products/1662827785.jpg', 'products/1662827785.jpg', 0),
(35, 1, 6, '4â€™ twinkling star', 320, '0', '', 'products/1662827806.jpg', 'products/1662827806.jpg', 0),
(38, 1, 7, 'Rocket bomb', 282, '0', '', 'products/1662828088.jpg', 'products/1662828088.jpg', 0),
(118, 1, 22, 'Photo Flash', 325, '0', '', 'products/1663408899.jpg', 'products/1663408899.jpg', 0),
(40, 1, 8, '10cm electric sparklers', 115, '0', '', 'products/1662829606.jpg', 'products/1662829606.jpg', 0),
(114, 1, 13, '4x4 Wheel', 725, '0', '', 'products/1663311558.jpg', 'products/1663311558.jpg', 0),
(42, 1, 8, '15cm electric sparklers', 210, '0', '', 'products/1662829651.jpg', 'products/1662829651.jpg', 0),
(43, 1, 8, '15cm colour sparklers ', 225, '0', '', 'products/1662829673.jpg', 'products/1662829673.jpg', 0),
(126, 1, 24, '28 CHORSA ', 85, '10 Pieces', '', 'products/1669298431.jpg', 'products/1669298431.jpg', 0),
(45, 1, 8, '30cm electric sparklers', 210, '0', '', 'products/1662829726.jpg', 'products/1662829726.jpg', 0),
(46, 1, 8, '30cm colour sparklers ', 225, '0', '', 'products/1662829850.jpg', 'products/1662829850.jpg', 0),
(81, 1, 17, 'Musical rocket', 675, '1 Box', '', 'products/1662903577.jpg', 'products/1662903577.jpg', 0),
(48, 1, 8, '50cm electric sparklers', 850, '0', '', 'products/1662829891.jpg', 'products/1662829891.jpg', 0),
(49, 1, 8, '50cm colour Sparklers', 950, '0', '', 'products/1662829920.jpg', 'products/1662829920.jpg', 0),
(50, 1, 9, 'Paper bomb(500g) ', 600, '10 Pieces', '', 'products/1662830299.jpg', 'products/1662830299.jpg', 0),
(51, 1, 9, 'Paper bomb(250g)', 300, '10 Pieces', '', 'products/1662830321.jpg', 'products/1662830321.jpg', 0),
(52, 1, 9, 'Colour paper bomb ', 350, '0', '', 'products/1662830345.jpg', 'products/1662830345.jpg', 0),
(53, 1, 9, 'Colour smoke ', 1000, '0', '', 'products/1662830363.jpg', 'products/1662830363.jpg', 0),
(54, 1, 10, 'Ravindra 4â€ rock n roll(2pcs)', 3580, '0', '', 'products/1662830668.jpg', 'products/1662830668.jpg', 0),
(55, 1, 10, 'Ravindra 4â€ 8d warf(2pcs) ', 3600, '0', '', 'products/1662830739.jpg', 'products/1662830739.jpg', 0),
(56, 1, 11, '12 Shot rider ', 525, '0', '', 'products/1678439445.jpg', 'products/1678439445.jpg', 0),
(57, 1, 11, '25 shots rider ', 975, '0', '', 'products/1662831367.jpg', 'products/1662831367.jpg', 0),
(58, 1, 11, '30 shots leo ', 2000, '0', '', 'products/1662831392.jpg', 'products/1662831392.jpg', 0),
(59, 1, 11, '60 Shots Techno', 4000, '0', '', 'products/1662831418.jpg', 'products/1662831418.jpg', 0),
(60, 1, 11, '120 shots jayam', 7750, '0', '', 'products/1662831440.jpg', 'products/1662831440.jpg', 0),
(61, 1, 11, '240 shots n-joy', 15500, '0', '', 'products/1662831467.jpg', 'products/1662831467.jpg', 0),
(62, 1, 12, 'Ravindra\'s 4\'\' Nakshatra', 3125, '0', '', 'products/1662832594.jpg', 'products/1662832594.jpg', 0),
(63, 1, 12, 'Ravindra\'s 4â€ Moti Mahal(2 Pcs)', 3125, '0', '', 'products/1662832612.jpg', 'products/1662832612.jpg', 0),
(64, 1, 12, 'Ravindra\'s 4â€ Twin Angel(2pcs)', 3125, '0', '', 'products/1662832631.jpg', 'products/1662832631.jpg', 0),
(65, 1, 12, 'Ravindra\'s 4â€ Golden Octopussy(2 Pcs)', 3125, '0', '', 'products/1662832665.jpg', 'products/1662832665.jpg', 0),
(66, 1, 12, 'Ravindras4â€ Barbie Girl (2pcs) ', 3125, '1 Box', '', 'products/1662832684.jpg', 'products/1662832684.jpg', 0),
(67, 1, 12, 'Ravindra\'s 4â€ Royal Salute (2 Pcs) ', 3125, '0', '', 'products/1662832704.jpg', 'products/1662832704.jpg', 0),
(69, 1, 13, '3 in 1 fancy ', 1075, '0', '', 'products/1662834373.jpg', 'products/1662834373.jpg', 0),
(70, 1, 13, 'Chotta (single pcs box) ', 168, '0', '', 'products/1662834406.jpeg', 'products/1662834406.jpeg', 0),
(71, 1, 13, '2 Â½ pipe ', 375, '10 Pieces', '', 'products/1662834424.jpg', 'products/1662834424.jpg', 0),
(72, 1, 13, '7 shot colour(1pcs) ', 92, '10 Pieces', '', 'products/1662834443.jpg', 'products/1662834443.jpg', 0),
(73, 1, 13, '7 shot colour  (5 pcs) ', 605, '1 Box', '', 'products/1662834465.jpg', 'products/1662834465.jpg', 0),
(74, 1, 13, 'Whishling wheel(5 pcs)', 550, '1 Box', '', 'products/1678439609.jpg', 'products/1678439609.jpg', 0),
(75, 1, 13, 'Disco wheel (5 pcs)', 410, '0', '', 'products/1662834535.jpg', 'products/1662834535.jpg', 0),
(76, 1, 14, 'Cartoon ', 102, '1 PKTS', '', 'products/1662834626.jpg', 'products/1662834626.jpg', 0),
(77, 1, 14, 'Jee Boom Baa ', 60, '1 Box', '', 'products/1662834650.jpg', 'products/1662834650.jpg', 0),
(78, 1, 14, 'Magic pops', 60, '1 Box', '', 'products/1662834669.jpg', 'products/1662834669.jpg', 0),
(79, 1, 14, 'Electric stone ', 102, '1 Box', '', 'products/1662834693.jpg', 'products/1662834693.jpg', 0),
(80, 1, 14, 'Kitkat ', 105, '1 Box', '', 'products/1662834711.jpg', 'products/1662834711.jpg', 0),
(82, 1, 17, 'Symphony Musical Rocket', 925, '1 Box', '', 'products/1662903613.jpg', 'products/1662903613.jpg', 0),
(83, 1, 18, 'Jingle bells 6shot', 165, '0', '', 'products/1662903827.jpg', 'products/1662903827.jpg', 0),
(84, 1, 18, 'Arabian Night 12 Shot', 1550, '0', '', 'products/1662903866.jpeg', 'products/1662903866.jpeg', 0),
(85, 1, 18, 'Agni Missiles 25 Shot', 3190, '10 Pieces', '', 'products/1662909705.jpg', 'products/1662909705.jpg', 0),
(86, 1, 19, 'Ravindra\'s Silver Spring 12 Shot', 1475, '0', '', 'products/1662904564.jpg', 'products/1662904564.jpg', 0),
(87, 1, 19, ' Ravindra\'s Sundae Magic 12 Shot', 1475, '0', '', 'products/1662904606.jpg', 'products/1662904606.jpg', 0),
(88, 1, 19, 'Ravindra\'s Boom Boom 12 Shot', 1475, '0', '', 'products/1662904644.jpg', 'products/1662904644.jpg', 0),
(89, 1, 19, 'Ravindra\'s Angel Queen 12 shot', 1475, '0', '', 'products/1662904673.jpg', 'products/1662904673.jpg', 0),
(90, 1, 19, 'Ravindra\'s Mid Night Gala 30 shot', 2200, '1 Box', '', 'products/1662904747.jpg', 'products/1662904747.jpg', 0),
(91, 1, 19, 'Ravindra\'s Rang Bazaar 60 Shot', 4900, '0', '', 'products/1662904893.jpg', 'products/1662904893.jpg', 0),
(92, 1, 19, 'Ravindra\'s Casino 120 Shots', 9425, '0', '', 'products/1662904824.jpg', 'products/1662904824.jpg', 0),
(93, 1, 19, 'Ravindra\'s Jackpot 240 shots', 19000, '10 Pieces', '', 'products/1662904847.jpg', 'products/1662904847.jpg', 0),
(94, 1, 20, 'Ravindra\'s Dil Dil', 1650, '0', '', 'products/1662905312.jpg', 'products/1662905312.jpg', 0),
(95, 1, 20, 'Ravindra\'sDil Diwana', 1650, '0', '', 'products/1662905407.jpg', 'products/1662905407.jpg', 0),
(96, 1, 20, 'Ravindra\'s Dil Masala', 1650, '0', '', 'products/1662905504.jpg', 'products/1662905504.jpg', 0),
(97, 1, 20, 'Ravindra\'s Dil Chandhini ', 1650, '0', '', 'products/1662905569.jpg', 'products/1662905569.jpg', 0),
(98, 1, 21, 'Ravindra\'s Mirichi Dhamaka', 1775, '0', '', 'products/1662905922.jpg', 'products/1662905922.jpg', 0),
(99, 1, 21, 'Ravindra\'s Nila Dhamaka', 1775, '0', '', 'products/1662905947.jpg', 'products/1662905947.jpg', 0),
(100, 1, 21, 'Ravindra\'s Choco Dhamaka', 1775, '0', '', 'products/1662905971.jpg', 'products/1662905971.jpg', 0),
(115, 1, 23, 'Ravindra\'s Sky Traffic', 17750, '0', '', 'products/1663312964.jpg', 'products/1663312964.jpg', 0),
(116, 1, 23, 'Ravindra\'s Grants', 18750, '0', '', 'products/1663313618.jpg', 'products/1663313618.jpg', 0),
(103, 1, 22, 'Spinner', 610, '0', '', 'products/1662906802.jpg', 'products/1662906802.jpg', 0),
(104, 1, 22, 'Helicopter', 575, '1 Box', '', 'products/1662906826.jpg', 'products/1662906826.jpg', 0),
(105, 1, 22, 'Butterfly', 350, '0', '', 'products/1662906850.jpg', 'products/1662906850.jpg', 0),
(106, 1, 22, 'Lion Gun ', 410, '0', '', 'products/1662906872.jpg', 'products/1662906872.jpg', 0),
(107, 1, 22, 'Rock Star', 800, '10 Pieces', '', 'products/1662906957.jpg', 'products/1662906957.jpg', 0),
(108, 1, 22, 'Wonder Star', 800, '10 Pieces', '', 'products/1662906987.jpg', 'products/1662906987.jpg', 0),
(109, 1, 22, 'Popcorn', 800, '10 Pieces', '', 'products/1662907019.jpg', 'products/1662907019.jpg', 0),
(110, 1, 22, 'Peacock Beem', 802, '10 Pieces', '', 'products/1662907049.jpg', 'products/1662907049.jpg', 0),
(111, 1, 22, 'Water Queen ', 802, '1 Box', '', 'products/1662907077.jpg', 'products/1662907077.jpg', 0),
(113, 1, 22, 'Tri Colour ', 1425, '0', '', 'products/1662907135.jpg', 'products/1662907135.jpg', 0),
(128, 1, 24, '56 GIANT', 210, '10 Pieces', '', 'products/1669298388.jpg', 'products/1669298388.jpg', 0),
(122, 1, 7, 'Two sound rocket', 600, '0', '', 'products/1664774426.jpg', 'products/1664774426.jpg', 0),
(123, 1, 8, '10cm Color', 120, '1 Box', '', 'products/1669042032.jpeg', 'products/1669042032.jpeg', 0),
(124, 1, 8, '7cm electric', 52.5, '1 Box', '', 'products/1669042253.jpeg', 'products/1669042253.jpeg', 0),
(125, 1, 8, '7cm Colour', 55, '1 Box', '', 'products/1669042272.jpeg', 'products/1669042272.jpeg', 0),
(129, 1, 24, '24 DELUXE ', 200, '10 Pieces', '', 'products/1669298369.jpg', 'products/1669298369.jpg', 0),
(130, 1, 24, '100 CRACKER', 200, '0', '', 'products/1669298350.jpg', 'products/1669298350.jpg', 0),
(131, 1, 24, '1K CRACKER', 1000, '0', '', 'products/1669298329.jpg', 'products/1669298329.jpg', 0),
(132, 1, 24, '2K CRACKER', 2000, '10 Pieces', '', 'products/1669298302.jpg', 'products/1669298302.jpg', 0),
(133, 1, 24, '5K CRACKER', 5000, '10 Pieces', '', 'products/1669298281.jpg', 'products/1669298281.jpg', 0),
(134, 1, 24, '10K CRACKER', 10000, '10 Pieces', '', 'products/1669298265.jpg', 'products/1669298265.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `review` text NOT NULL,
  `memstatus` int(1) NOT NULL,
  `stars` int(2) NOT NULL,
  `posted_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`id`, `product_id`, `product_name`, `mname`, `summary`, `review`, `memstatus`, `stars`, `posted_date`) VALUES
(1, 1, 'Slim Fit Royal Blue', 'Testing', 'test@test.com', 'test commebny', 1, 5, '2022-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcat_id1` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat_name` varchar(100) NOT NULL,
  `subcat_des` text NOT NULL,
  `subcat_image` varchar(250) NOT NULL,
  `subcat_status` int(1) NOT NULL,
  `sortid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcat_id1`, `subcat_id`, `cat_id`, `subcat_name`, `subcat_des`, `subcat_image`, `subcat_status`, `sortid`) VALUES
(5, 1, 1, 'ONE SOUND CRACKERS', '', '', 1, 1),
(21, 17, 1, 'RAVINDRA\'S MUSICAL ROCKETS', '', '', 1, 17),
(7, 3, 1, 'BIJILI CRACKERS ', '', '', 1, 3),
(8, 4, 1, '2 ATOM BOMB', '', '', 1, 4),
(9, 5, 1, 'FLOWER POTS', '', '', 1, 5),
(10, 6, 1, 'TWINKLING STAR', '', '', 1, 6),
(11, 7, 1, 'ROCKET', '', '', 1, 7),
(12, 8, 1, 'SPARKLERS', '', '', 1, 8),
(13, 9, 1, 'FANCY SPECIAL ITEMS', '', '', 1, 9),
(14, 10, 1, '4â€ FANCY', '', '', 1, 10),
(15, 11, 1, 'MULTI SHOTS', '', '', 1, 11),
(16, 12, 1, 'RAVINDRA\'S 4â€ FANCY SPECIAL ITEMS', '', '', 1, 12),
(17, 13, 1, '3 in 1 FANCY', '', '', 1, 13),
(18, 14, 1, 'TOYS SPARKLERS', '', '', 1, 14),
(22, 18, 1, 'RAVINDRA\'S MULTIPLE MUSICAL SHOTS', '', '', 1, 18),
(20, 16, 1, 'GROUND CHAKKARS', '', '', 1, 16),
(23, 19, 1, 'RAVINDRA\'S MULTIPLE SHOTS', '', '', 1, 19),
(24, 20, 1, 'RAVINDRA\'S FANCY PIPE 2â€ COMET DIL SERIES', '', '', 1, 20),
(25, 21, 1, 'RAVINDRA\'S FANCY PIPE 2â€ COMET DHAMAKA SERIES', '', '', 1, 21),
(26, 22, 1, 'NEW ARRIVALS', '', '', 1, 22),
(28, 23, 1, 'RAVINDRA\'S BIGGEST SHOTS', '', '', 1, 23),
(30, 24, 1, 'CHORSA AND CRACKER ITEMS', '', '', 1, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `style_id` int(11) NOT NULL,
  `desce` varchar(300) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_style1`
--

CREATE TABLE `tb_style1` (
  `style_id` int(11) NOT NULL,
  `imaged` varchar(300) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_style1`
--

INSERT INTO `tb_style1` (`style_id`, `imaged`) VALUES
(1, 'upload/3.png'),
(2, 'upload/2.png'),
(3, 'upload/1.png'),
(5, 'upload/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_style5`
--

CREATE TABLE `tb_style5` (
  `style_id` int(11) NOT NULL,
  `desce` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `imaged` varchar(300) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arrival`
--
ALTER TABLE `arrival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`basketID`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popup`
--
ALTER TABLE `popup`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_arrival`
--
ALTER TABLE `tbl_arrival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id1`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_new_product`
--
ALTER TABLE `tbl_new_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_other`
--
ALTER TABLE `tbl_other`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcat_id1`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `tb_style1`
--
ALTER TABLE `tb_style1`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `tb_style5`
--
ALTER TABLE `tb_style5`
  ADD PRIMARY KEY (`style_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `arrival`
--
ALTER TABLE `arrival`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `basketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2200;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `popup`
--
ALTER TABLE `popup`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_arrival`
--
ALTER TABLE `tbl_arrival`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tbl_new_product`
--
ALTER TABLE `tbl_new_product`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_other`
--
ALTER TABLE `tbl_other`
  MODIFY `style_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcat_id1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_style1`
--
ALTER TABLE `tb_style1`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_style5`
--
ALTER TABLE `tb_style5`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
