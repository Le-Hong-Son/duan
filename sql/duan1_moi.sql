-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2025 at 03:12 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1.moi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `cate_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `type`, `soft_delete`) VALUES
(1, 'Quần Áo Mùa Hè', 0, 0),
(2, 'Quần Áo Mùa Đông', 0, 0),
(5, 'Quần Áo GenZ', 1, 0),
(6, 'Quần Áo Nữ', 1, 0),
(10, 'Quần Áo Nam', 1, 0),
(11, 'Quần Áo Nam', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `content` varchar(255) NOT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `active`, `created_at`) VALUES
(1, 11, 23, '', 0, '2024-12-04 08:25:48'),
(2, 11, 23, 'adfadada', 1, '2024-12-04 08:25:52'),
(3, 9, 26, 'đẹp', 0, '2024-12-05 04:58:18'),
(4, 11, 25, 'ádfsa\r\n', 0, '2024-12-07 00:59:01'),
(5, 11, 25, 'ádfsa\r\n', 1, '2024-12-07 00:59:56'),
(6, 11, 25, 'ádafd', 1, '2024-12-07 00:59:59'),
(7, 11, 25, '123', 0, '2024-12-07 01:00:20'),
(8, 11, 25, '123', 1, '2024-12-07 01:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_method` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `payment_method`, `total_price`, `create_at`) VALUES
(1, 10, '1', 'cod', '4000', '2024-11-28 15:16:53'),
(2, 10, '1', 'cod', '4000', '2024-11-28 15:25:27'),
(3, 10, '1', 'cod', '12000', '2024-11-28 15:25:58'),
(4, 10, '1', 'cod', '4000', '2024-11-29 00:33:08'),
(5, 10, '1', 'cod', '5000', '2024-11-30 01:18:37'),
(6, 10, '1', 'cod', '17000', '2024-11-30 01:30:06'),
(7, 10, '1', 'cod', '11000', '2024-11-30 01:33:55'),
(8, 8, '3', 'cod', '5000', '2024-11-30 03:08:51'),
(9, 11, '1', 'cod', '1000', '2024-11-30 03:26:38'),
(10, 8, '4', 'cod', '4000', '2024-12-03 01:17:06'),
(11, 8, '4', 'cod', '8000', '2024-12-03 15:51:19'),
(12, 11, '3', 'cod', '1000', '2024-12-04 01:05:17'),
(13, 11, '3', 'cod', '21150000', '2024-12-07 00:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` bigint NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
(1, 1, 28, 4000, 1),
(2, 2, 28, 4000, 1),
(3, 3, 26, 1000, 3),
(4, 3, 28, 4000, 1),
(5, 3, 24, 5000, 1),
(6, 4, 26, 1000, 4),
(7, 5, 24, 5000, 1),
(8, 6, 28, 4000, 1),
(9, 6, 25, 3000, 4),
(10, 6, 26, 1000, 1),
(11, 7, 26, 1000, 3),
(12, 7, 28, 4000, 1),
(13, 7, 27, 2000, 2),
(14, 8, 26, 1000, 1),
(15, 8, 28, 4000, 1),
(16, 9, 26, 1000, 1),
(17, 10, 25, 3000, 1),
(18, 10, 26, 1000, 1),
(19, 11, 26, 1000, 1),
(20, 11, 28, 4000, 1),
(21, 11, 25, 3000, 1),
(22, 12, 26, 1000, 1),
(23, 13, 25, 300000, 70),
(24, 13, 28, 150000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` bigint NOT NULL,
  `quantity` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `content`, `status`, `category_id`) VALUES
(23, 'Jean', 'images/jean.jpg', 200000, 12, 'Quần jean là một item thời trang không bao giờ lỗi mốt, nổi bật với sự bền bỉ và tính linh hoạt trong phong cách. Được làm từ chất liệu denim chắc chắn, quần jean có nhiều kiểu dáng đa dạng như skinny, straight, slim, baggy hoặc wide-leg, phù hợp với mọi dáng người và sở thích. Với gam màu chủ đạo như xanh, đen, trắng, hoặc những biến tấu như rách gối, tua rua hay họa tiết, quần jean dễ dàng kết hợp với áo phông, sơ mi, hoodie hay áo khoác. Đây là lựa chọn hoàn hảo cho cả phong cách năng động thường ngày lẫn những dịp cần sự chỉn chu nhưng không kém phần thoải mái.', 'Bằng cách truy cập vào uniqlo.com và điều hướng mà không điều chỉnh các tham số, bạn đã chấp nhập việc sử dụng cookie hoặc công nghệ tương tự. Điều này giúp cho chúng tôi cung cấp dịch vụ tốt nhất và những ưu đãi phù hợp với sở thích của bạn. Nhưng quan trọng nhất là trải nghiệp lướt web an toàn khi bạn sử dụng trang web của chúng tôi. Để biết thêm thông tin, vui lòng xem qua Chính sách riêng tư.', 1, 1),
(24, 'Quần thun dáng rộng', 'images/b69ccfca5e62b59e991004e6fd36438b.jpg', 280000, 1214, 'Quần thun dáng rộng là một lựa chọn thời trang thoải mái và hiện đại, phù hợp với mọi đối tượng và phong cách. Được làm từ chất liệu thun mềm mại, co giãn tốt, quần mang lại cảm giác dễ chịu khi mặc, đồng thời giúp người dùng tự do vận động. Với thiết kế dáng rộng, quần không chỉ che khuyết điểm hiệu quả mà còn tạo nên vẻ ngoài phóng khoáng, trẻ trung. Quần thun dáng rộng thường có các màu sắc và họa tiết đơn giản, dễ dàng phối hợp với áo phông, crop-top, hay hoodie, mang đến phong cách năng động và thời thượng trong mọi hoàn cảnh, từ đi học, đi chơi đến dạo phố.', '', 1, 1),
(25, 'Hoodei', 'images/047f820e2d502a5dbdcbe9e918c8006d.jpg', 300000, 56, 'Áo hoodie là loại trang phục phổ biến, mang phong cách năng động và thoải mái, phù hợp cho mọi lứa tuổi. Được thiết kế với chất liệu nỉ hoặc cotton, áo hoodie giữ ấm tốt nhưng vẫn đảm bảo sự thoáng mát. Đặc trưng của áo là mũ trùm đầu, túi trước tiện dụng và dây rút điều chỉnh, mang đến sự tiện lợi và cá tính. Áo hoodie dễ dàng phối hợp với quần jeans, quần jogger hoặc chân váy, trở thành sự lựa chọn hoàn hảo cho các hoạt động thường ngày hay thể thao. Đây là item không thể thiếu trong tủ đồ, đặc biệt vào những ngày se lạnh.', '', 1, 6),
(26, 'Áo Len Khủng Long', 'images/0cb555e6139b745b7bd080ed6fbf3c86.jpg', 120000, 354, 'Áo len khủng long là một món đồ độc đáo, thường thu hút sự chú ý nhờ thiết kế ngộ nghĩnh và sáng tạo. Được làm từ chất liệu len mềm mại, ấm áp, áo thường có họa tiết hình khủng long dễ thương hoặc các chi tiết như gai khủng long nổi bật ở mũ và lưng, tạo điểm nhấn đầy cá tính. Phù hợp cho cả trẻ em và người lớn yêu thích phong cách vui nhộn, áo len khủng long không chỉ giúp giữ ấm trong mùa lạnh mà còn thể hiện gu thời trang đáng yêu và phá cách. Đây là lựa chọn lý tưởng cho những ai muốn mang lại sự mới mẻ và nổi bật cho tủ đồ của mình.', '', 1, 5),
(27, 'Quần Ống Rộng ', 'images/quanthundangrong.jpg', 200000, 145, 'Quần ống rộng là một item thời trang thanh lịch và thoải mái, được yêu thích nhờ khả năng tôn dáng và phù hợp với nhiều phong cách. Với thiết kế phần ống suông rộng từ hông xuống, quần mang đến vẻ mềm mại, bay bổng và giúp che khuyết điểm cơ thể hiệu quả. Chất liệu đa dạng như vải lụa, kaki, denim hay len càng làm tăng tính ứng dụng, từ trang phục công sở lịch sự đến phong cách dạo phố phóng khoáng. Quần ống rộng dễ dàng phối hợp với áo sơ mi, áo phông, crop-top hay blazer, tạo nên vẻ ngoài vừa cá tính vừa tinh tế. Đây là lựa chọn lý tưởng cho những ai muốn kết hợp giữa sự thoải mái và thời trang trong mọi hoàn cảnh.', '', 1, 2),
(28, 'Áo thun ngắn tay ', 'images/aothunngantay.jpg', 150000, 591, 'Áo thun ngắn tay là món đồ cơ bản, dễ mặc và không thể thiếu trong tủ đồ của mọi người. Với chất liệu cotton, thun co giãn hoặc vải poly mềm mại, áo mang lại cảm giác thoáng mát, thoải mái trong mọi hoạt động hàng ngày. Thiết kế đơn giản với cổ tròn hoặc cổ chữ V, kết hợp cùng tay ngắn, giúp áo thun phù hợp với mọi dáng người và hoàn cảnh, từ đi học, đi làm đến dạo phố. Áo có nhiều màu sắc, họa tiết đa dạng, dễ dàng phối với quần jean, quần short, chân váy hay áo khoác để tạo nên phong cách từ năng động, trẻ trung đến thanh lịch, tối giản.', '', 1, 6),
(30, 'Áo khoác GAR BETHE', 'images/6727197a14a7818d96e3ae666bdae15c.jpg', 200000, 13, 'Áo khoác GAR BETHE là sản phẩm thời trang cao cấp, mang phong cách hiện đại và mạnh mẽ, phù hợp cho những ai yêu thích sự phá cách và cá tính. Được thiết kế từ chất liệu bền bỉ, chống thấm nước và giữ ấm tốt, áo khoác này đáp ứng cả yếu tố thẩm mỹ lẫn chức năng. Với đường cắt may tinh tế, áo thường có các chi tiết nổi bật như logo đặc trưng, túi tiện dụng, và đường khóa kéo chắc chắn. Sự đa dạng trong màu sắc và kiểu dáng giúp áo khoác GAR BETHE dễ dàng phối hợp với nhiều loại trang phục, từ quần jean năng động đến quần jogger thể thao, tạo nên phong cách cuốn hút và thời thượng cho người mặc.', '', 1, 2),
(31, 'Áo khoác Varsity Manfinity Hypemode', 'images/5037fba2d782e5342014abc133ff76ef.jpg', 400000, 168, 'Áo khoác Varsity Manfinity Hypemode là sự kết hợp hoàn hảo giữa phong cách cổ điển và hiện đại, mang đến vẻ ngoài trẻ trung, năng động. Được lấy cảm hứng từ những chiếc áo varsity truyền thống, sản phẩm này thường được làm từ chất liệu cao cấp như vải dạ hoặc nỉ mềm, kết hợp với tay áo da hoặc giả da tạo điểm nhấn nổi bật. Thiết kế đặc trưng với cổ áo, tay áo và gấu áo bo chun kẻ sọc cùng các họa tiết hoặc logo độc quyền của Manfinity Hypemode, áo khoác toát lên vẻ cá tính và thời thượng. Đây là item lý tưởng để phối với quần jean, giày thể thao hoặc các phụ kiện streetwear, giúp người mặc tự tin thể hiện phong cách riêng trong mọi hoàn cảnh.', '', 1, 1),
(32, 'Áo thun Rio cotton', 'images/2f066027b250ecb754e2fecb74fb37f7.jpg', 140000, 55, 'Áo thun Rio cotton là sản phẩm thời trang đơn giản nhưng chất lượng, được yêu thích nhờ sự thoải mái và bền bỉ. Được làm từ chất liệu cotton tự nhiên, áo thun mang lại cảm giác mềm mại, thoáng khí, và thấm hút mồ hôi tốt, lý tưởng cho cả ngày dài hoạt động. Với thiết kế tối giản, thường là cổ tròn hoặc cổ chữ V, dáng suông nhẹ ôm vừa vặn cơ thể, áo phù hợp với mọi lứa tuổi và phong cách. Áo thun Rio cotton đa dạng về màu sắc, từ những gam màu trung tính đến tông nổi bật, dễ dàng phối hợp với quần short, quần jean hay chân váy để tạo nên những outfit trẻ trung, năng động nhưng vẫn tinh tế.', '', 1, 1),
(33, ' Áo thun Zhou Le Moyne', 'images/7847179d65a2d64b37bf9b5a6f4ee9d2.jpg', 220000, 34, 'Áo thun Zhou Le Moyne là một sản phẩm thời trang hiện đại và tinh tế, nổi bật với thiết kế đơn giản nhưng đầy phong cách. Được làm từ chất liệu vải cotton cao cấp, áo thun này mang đến cảm giác mềm mại và thoải mái, thích hợp cho nhiều hoạt động trong ngày. Với cổ tròn hoặc cổ chữ V và dáng suông, áo phù hợp với mọi dáng người và dễ dàng kết hợp với nhiều loại trang phục khác nhau. Thiết kế của áo thường có logo hoặc họa tiết đặc trưng của thương hiệu Zhou Le Moyne, mang đến sự trẻ trung và cá tính cho người mặc. Áo thun Zhou Le Moyne là lựa chọn hoàn hảo cho những ai yêu thích phong cách tối giản, nhưng vẫn muốn nổi bật và thể hiện gu thẩm mỹ của mình.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '', 1, 5),
(34, 'Áo sơ mi sọc túi trước Zhou', 'images/735a1ecad6575e32b5d61104987bfa98.jpg', 440000, 2943, 'Áo sơ mi sọc túi trước Zhou là một món đồ thời trang thanh lịch và hiện đại, mang lại vẻ ngoài trẻ trung và phong cách. Với chất liệu vải cao cấp, áo sơ mi này có độ bền tốt và thoáng mát, thích hợp cho nhiều dịp từ công sở đến đi chơi. Thiết kế sọc tinh tế kết hợp với túi trước tạo điểm nhấn đặc biệt, mang đến sự phá cách nhưng vẫn giữ được sự lịch sự. Cổ áo thường là kiểu cổ đứng, với nút cài tiện dụng, giúp người mặc dễ dàng điều chỉnh phong cách. Áo sơ mi sọc túi trước Zhou có thể phối với quần jean, quần tây hoặc chân váy để tạo nên những set đồ phù hợp cho cả ngày dài, vừa thoải mái lại vừa thời thượng.', '', 1, 10),
(35, ' Quần Jeans', 'images/e81c2fe90551957631d5e765cba1c518.jpg', 180, 67, 'Quần jean là một item thời trang không bao giờ lỗi mốt, nổi bật với sự bền bỉ và tính linh hoạt trong phong cách. Được làm từ chất liệu denim chắc chắn, quần jean có nhiều kiểu dáng đa dạng như skinny, straight, slim, baggy hoặc wide-leg, phù hợp với mọi dáng người và sở thích. Với gam màu chủ đạo như xanh, đen, trắng, hoặc những biến tấu như rách gối, tua rua hay họa tiết, quần jean dễ dàng kết hợp với áo phông, sơ mi, hoodie hay áo khoác. Đây là lựa chọn hoàn hảo cho cả phong cách năng động thường ngày lẫn những dịp cần sự chỉn chu nhưng không kém phần thoải mái.', '', 1, 5),
(36, 'Bộ trang phục cà vạt Acubi', 'images/1859f2a0e3aec0530a2fa638e1bc54b1.jpg', 700000, 1455, 'Bộ trang phục cà vạt Acubi là một lựa chọn thời trang sang trọng và tinh tế, phù hợp với những dịp đặc biệt hoặc công sở. Với chất liệu vải cao cấp, bộ trang phục này mang lại cảm giác thoải mái, đồng thời toát lên vẻ ngoài lịch lãm. Cà vạt Acubi thường có thiết kế đơn giản nhưng tinh tế, dễ dàng kết hợp với sơ mi và vest để tạo thành một bộ đồ hoàn hảo cho các sự kiện quan trọng. Với màu sắc đa dạng và họa tiết phong phú, bộ trang phục này không chỉ mang đến sự chỉn chu mà còn giúp người mặc thể hiện phong cách cá nhân đầy tự tin.', '', 1, 6),
(37, 'Áo Thun Baby Tee', 'images/9bb853da8ac34b611c107ce38c0db533.jpg', 280000, 351, '\r\nÁo thun Baby Tee là một món đồ thời trang trẻ trung và năng động, đặc trưng bởi kiểu dáng ôm nhẹ cơ thể và chiều dài ngắn trên eo, mang lại vẻ ngoài vừa thoải mái vừa quyến rũ. Với chất liệu cotton mềm mại, áo thun Baby Tee rất thoáng mát và dễ chịu, phù hợp cho các hoạt động thường ngày hoặc những ngày hè oi ả. Thiết kế đơn giản với cổ tròn hoặc cổ tim, kết hợp cùng các màu sắc hoặc họa tiết dễ thương, áo Baby Tee dễ dàng phối hợp với quần jeans, chân váy hoặc quần short để tạo nên phong cách trẻ trung, cá tính. Đây là lựa chọn lý tưởng cho những ai yêu thích vẻ đẹp nhẹ nhàng, tinh tế nhưng vẫn năng động.', '', 1, 6),
(38, 'Áo Thun Raglan ', 'images/0c82129e8f950734cec94982e3c6b6f6.jpg', 220000, 153, 'Áo thun Raglan là một món đồ thời trang phổ biến với thiết kế đặc biệt, có tay áo được may liền từ cổ xuống dưới, tạo nên một đường may chéo đặc trưng. Thiết kế này không chỉ mang lại sự thoải mái mà còn tạo ra phong cách năng động, thể thao. Áo thun Raglan thường có cổ tròn và tay áo được làm từ chất liệu vải khác biệt, như cotton, tạo điểm nhấn về màu sắc và kiểu dáng. Mẫu áo này có thể kết hợp với nhiều loại trang phục như quần jeans, quần thể thao hoặc quần short, thích hợp cho những buổi dạo phố hay tham gia các hoạt động thể thao. Áo thun Raglan mang đến vẻ ngoài trẻ trung, thoải mái và dễ dàng phối đồ cho những ai yêu thích sự đơn giản nhưng vẫn đầy phong cách.', '', 1, 6),
(39, 'Set áo Babytee và quần vải ống rộng Parachute', 'images/33bee0bf7d570d425ad777ab236b10c1.jpg', 680000, 126, 'Set áo Babytee và quần vải ống rộng Parachute là một sự kết hợp thời trang hoàn hảo giữa sự năng động và thoải mái. Áo Babytee với kiểu dáng ôm nhẹ và chiều dài ngắn trên eo mang lại vẻ trẻ trung, quyến rũ, dễ dàng phối với nhiều trang phục khác nhau. Khi kết hợp với quần vải ống rộng Parachute, bộ trang phục này tạo nên một phong cách thoải mái nhưng vẫn vô cùng thời thượng. Quần vải ống rộng Parachute thường có chất liệu vải nhẹ, thoáng khí và thiết kế đặc trưng với ống rộng từ trên xuống, tạo cảm giác tự do và thoải mái khi di chuyển. Set này phù hợp cho những buổi đi chơi, dạo phố hay những ngày hè năng động, giúp người mặc vừa cá tính, vừa phong cách.', '', 1, 6),
(40, 'Set Đồ Cruehawts Triple Tee', 'images/bc58c4907f76592f8004f81acf7a663e.jpg', 660000, 453, 'Set đồ Cruehawts Triple Tee là một bộ trang phục thời trang mang đậm phong cách streetwear, nổi bật với thiết kế năng động và hiện đại. Bộ trang phục này thường bao gồm một chiếc áo thun Triple Tee, đặc trưng với kiểu dáng layer, kết hợp nhiều lớp áo thun chồng lên nhau, tạo nên vẻ ngoài độc đáo và cá tính. Áo thường có các họa tiết, logo, hoặc chữ nổi bật, thể hiện sự phá cách và năng lượng trẻ trung. Kết hợp cùng với quần jeans hoặc quần thể thao, set đồ này mang lại sự thoải mái tuyệt vời mà vẫn đầy phong cách. Set đồ Cruehawts Triple Tee là lựa chọn lý tưởng cho những ai yêu thích sự phá cách, năng động nhưng vẫn giữ được sự thời thượng trong từng chi tiết.', '', 1, 10),
(41, 'Set áo Hoodie Doris và quần jean Menswear Pants', 'images/960f370de2c630bfc014e3b288aac332.jpg', 780000, 776, 'Set áo Hoodie Doris và quần jean Menswear Pants là sự kết hợp hoàn hảo giữa phong cách thể thao năng động và sự lịch lãm, mang lại vẻ ngoài thoải mái nhưng vẫn đầy tinh tế. Áo hoodie Doris thường có thiết kế đơn giản, với chất liệu nỉ hoặc cotton mềm mại, giúp giữ ấm hiệu quả và mang lại sự thoải mái tối đa. Mũ trùm và túi trước là các chi tiết đặc trưng, làm tăng thêm tính năng động của bộ trang phục.\r\n\r\nKhi kết hợp với quần jean Menswear Pants, bộ đồ này trở nên vừa thời thượng lại vẫn thoải mái. Quần jean Menswear Pants có thiết kế ôm vừa phải, tôn dáng mà không quá chật, giúp tạo ra sự cân đối giữa áo hoodie rộng rãi và dáng quần gọn gàng. Set đồ này là lựa chọn lý tưởng cho những buổi dạo phố, gặp gỡ bạn bè hay những ngày nghỉ cuối tuần, mang đến sự tự tin và phong cách hiện đại.', '', 1, 10),
(42, 'set Áo Thun FaFic và quần short Kaki', 'images/89bcd967774483a3e969563613ed5c27.jpg', 480000, 654, 'Set áo thun FaFic và quần short kaki là một bộ trang phục đơn giản nhưng cực kỳ thời thượng và thoải mái, thích hợp cho những ngày hè năng động. Áo thun FaFic thường có thiết kế cổ tròn hoặc cổ chữ V với chất liệu cotton mềm mại, giúp thấm hút mồ hôi tốt và mang lại cảm giác dễ chịu. Họa tiết hoặc logo của FaFic trên áo tạo điểm nhấn, giúp bộ trang phục trở nên nổi bật và cá tính.\r\n\r\nKết hợp cùng với quần short kaki, bộ đồ này mang đến một phong cách trẻ trung, thoáng mát và dễ dàng vận động. Quần short kaki có chất liệu vải nhẹ, thoải mái và thường có màu sắc trung tính hoặc tươi sáng, dễ dàng phối hợp với áo thun. Set áo thun FaFic và quần short kaki là lựa chọn lý tưởng cho các hoạt động ngoài trời, dạo phố, hay những chuyến du lịch mùa hè, tạo ra một vẻ ngoài năng động và hiện đại.', '', 1, 10),
(43, 'Áo Len Giáng Rộng', 'images/b0219f4736a6f17fafa923617bb546c5.jpg', 180000, 561, 'Áo len giáng rộng là một món đồ thời trang thoải mái và ấm áp, phù hợp cho mùa thu và mùa đông. Với thiết kế rộng rãi, áo len này không chỉ mang lại sự ấm áp mà còn giúp người mặc cảm thấy dễ chịu, tự do trong mọi hoạt động. Chất liệu len mềm mại, co giãn tốt và giữ nhiệt hiệu quả, thường được sử dụng cho áo giáng rộng, tạo cảm giác êm ái và thoải mái. Áo có thể có các chi tiết như cổ cao, cổ tròn hoặc cổ chữ V, cùng với tay dài hoặc kiểu dáng bo chun ở gấu áo và tay áo.', '', 1, 2),
(44, 'Áo Len Thừng Mỏng', 'images/d7c628d1406979f02985f8ed9262eadc.jpg', 230000, 682, 'Áo len thừng mỏng là một món đồ thời trang thanh lịch và tinh tế, mang đến vẻ ngoài nhẹ nhàng, nhưng vẫn đủ ấm áp cho những ngày thu hoặc đầu đông. Với thiết kế kiểu thừng, áo len này nổi bật với các họa tiết đan chéo hoặc xoắn đặc trưng, tạo nên sự độc đáo và bắt mắt. Chất liệu len mỏng mềm mại và thoáng khí, không quá dày nhưng vẫn có khả năng giữ ấm, giúp bạn cảm thấy dễ chịu trong mọi hoạt động.', '', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullname` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(199) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `password`, `email`, `phone`, `address`, `role`, `active`, `created_at`, `updated_at`) VALUES
(8, 'admin', '$2y$10$3sHjlkHt63tfLJ80TCv2XO2kt.KGnJvc73jdSibsGxSSF9j1svb2G', 'admin@gmail.com', '12303123', '123ôádasd', 'admin', 1, '2024-11-25 14:18:38', '2024-11-25 14:18:38'),
(9, 'admin', '$2y$10$/RxQILSwzmiJH7M2XXqrKO/3/h38zsoJr6w7Dk5uz93dEe9KxeM5y', 'admin1@gmail.com', '123', '123', 'user', 1, '2024-11-26 00:58:49', '2024-11-26 00:58:49'),
(11, 'Lê Hồng Sơn', '$2y$10$NlqdjaA/zaeA5PbIYU5oLeUbrQaVmvldDUnqk32z3IyNeoctG.Mt2', 'lehongsonok@gmail.com', '0867131702', '63 Kim Đồng', 'user', 1, '2024-11-27 13:53:10', '2024-11-27 13:53:10'),
(12, 'Nguyễn Văn A', '$2y$10$0TaojJz/qy3vtnZqFmVtk.lyQtpOuI6MvRZcnGO7k/OwJRN0UD72K', 'a123@gmail.com', '0123456789', 'Ha Noi', 'user', 1, '2024-12-06 11:33:02', '2024-12-06 11:33:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
