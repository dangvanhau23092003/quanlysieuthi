-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2023 lúc 11:05 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbquanlysieuthi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_customer` int(11) UNSIGNED DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-09-23', 12000100, 'COD', 'eeeeeeeee', 1, '2023-09-23 11:42:39', '2023-09-27 08:26:17'),
(2, 2, '2023-09-23', 12000100, 'COD', 'eeeeeeeee', 3, '2023-09-23 11:42:40', '2023-09-24 20:39:18'),
(4, 4, '2023-09-24', 40000000, 'COD', 'Quý dê 4 đơn hàng', 0, '2023-09-23 21:15:45', '2023-09-26 03:16:51'),
(5, 5, '2023-09-24', 40000000, 'COD', 'Quý dê 4 đơn hàng', 0, '2023-09-23 21:16:18', '2023-09-23 21:16:18'),
(6, 6, '2023-09-24', 23100000, 'COD', 'tài chó điên 4 đơn hàng', 0, '2023-09-23 22:26:41', '2023-09-23 22:26:41'),
(7, 7, '2023-09-27', 31000000, 'ATM', '5 đơn hàng', 0, '2023-09-27 11:18:29', '2023-09-27 11:18:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_bill` int(11) UNSIGNED NOT NULL,
  `id_product` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 1, 6000000, '2023-09-23 21:16:18', '2023-09-23 21:16:18'),
(2, 5, 1, 1, 6000000, '2023-09-23 21:16:18', '2023-09-23 21:16:18'),
(3, 5, 2, 1, 6000000, '2023-09-23 21:16:18', '2023-09-23 21:16:18'),
(4, 5, 4, 1, 22000000, '2023-09-23 21:16:18', '2023-09-23 21:16:18'),
(5, 6, 7, 1, 200000, '2023-09-23 22:26:41', '2023-09-23 22:26:41'),
(6, 6, 2, 1, 6000000, '2023-09-23 22:26:41', '2023-09-23 22:26:41'),
(7, 6, 5, 1, 10900000, '2023-09-23 22:26:41', '2023-09-23 22:26:41'),
(8, 6, 1, 1, 6000000, '2023-09-23 22:26:41', '2023-09-23 22:26:41'),
(9, 7, 1, 1, 6000000, '2023-09-27 11:18:29', '2023-09-27 11:18:29'),
(10, 7, 5, 2, 10900000, '2023-09-27 11:18:29', '2023-09-27 11:18:29'),
(11, 7, 9, 1, 3000000, '2023-09-27 11:18:29', '2023-09-27 11:18:29'),
(12, 7, 7, 1, 200000, '2023-09-27 11:18:29', '2023-09-27 11:18:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qqqqqqqq', 'q@gmail.com', 'helooooooooo', 0, '0000-00-00', '2023-10-01'),
(2, 'hauuuu', 'h@gmail.com', 'qqqqqqqqqqqqqq', 0, '0000-00-00', '0000-00-00'),
(38, 'Trần Hùng Quý', 'quy@gmail.com', 'quysssssssssssss', 0, '2023-09-28', '2023-09-28'),
(39, 'quys', 'quy@gmail.com', '12345', 1, '2023-09-28', '2023-10-01'),
(41, 'dangvanhau', 'dangvanhau23092003@gmail.com', 'gfgf', 1, '2023-09-28', '2023-09-28'),
(42, 'thuaanj', 'quy@gmail.com', '123455555555', 0, '2023-09-28', '2023-09-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(1, 'hậu', 'nam', 'dangvanhau23092003@gmail.com', 'đà nẵng', '0234567893', 'eeeeeeeee', '2023-09-23 11:42:39', '2023-09-23 11:42:39'),
(2, 'hậu', 'nam', 'dangvanhau23092003@gmail.com', 'đà nẵng', '0234567893', 'eeeeeeeee', '2023-09-23 11:42:40', '2023-09-23 11:42:40'),
(4, 'Quý dê', 'nữ', 'quy@gmail.com', 'quãng nam', '0234567893', 'Quý dê 4 đơn hàng', '2023-09-23 21:15:45', '2023-09-23 21:15:45'),
(5, 'Quý dê', 'nam', 'quy@gmail.com', 'quãng nam', '1111111', 'Quý dê 4 đơn hàng', '2023-09-23 21:16:18', '2023-09-27 12:45:01'),
(6, 'Tài chó điên', 'nam', 'tai@gmail.com', 'đà nẵng', '0234567893', 'tài chó điên 4 đơn hàng', '2023-09-23 22:26:41', '2023-09-23 22:26:41'),
(7, 'Văn Hậu', 'nam', '11@gmail.com', 'đà nẵng', '0234567893', '5 đơn hàng', '2023-09-27 11:18:29', '2023-09-27 11:18:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(78, '2023_08_27_181909_create_products_table', 2),
(86, '2023_08_20_152600_create_bills_table', 3),
(144, '2023_08_28_032020_create_bills_table', 4),
(206, '2023_08_28_035644_create_bills_table', 5),
(600, '2023_08_19_034342_create_customers_table', 6),
(601, '2023_08_22_042926_create_personnels_table', 6),
(602, '2023_08_27_182243_create_type_products_table', 6),
(603, '2023_08_28_155217_create_bills_table', 6),
(604, '2023_08_28_155830_create_bill_details_table', 6),
(605, '2023_08_28_180347_create_products_table', 6),
(606, '2014_10_12_000000_create_users_table', 7),
(607, '2014_10_12_100000_create_password_reset_tokens_table', 7),
(608, '2019_08_19_000000_create_failed_jobs_table', 7),
(609, '2019_12_14_000001_create_personal_access_tokens_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `personnels`
--

CREATE TABLE `personnels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `personnels`
--

INSERT INTO `personnels` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Văn Hậu', 'dangvanhau23092003@gmail.com', '0123456789', 'Đà nẵng', '2023-09-23 22:03:33', '2023-09-27 08:26:58'),
(3, 'Thuận', 'thuan@gmail.com', '09988888811', 'quangnam', '2023-09-30 22:24:17', '2023-09-30 22:24:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `tensanpham` varchar(255) NOT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `giamoi` float NOT NULL,
  `giacu` float NOT NULL,
  `mota` varchar(255) NOT NULL,
  `new` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `tensanpham`, `id_type`, `giamoi`, `giacu`, `mota`, `new`, `image`, `created_at`, `updated_at`) VALUES
(1, 'LAP TOP GAMING F15', 1, 6000000, 8000000, 'LAP TOP GAMING F15', '1', '1695494414_1693677160_laptop1.jpg', '2023-09-23 11:40:14', '2023-09-25 21:41:57'),
(2, 'LAP TOP GAMING', 1, 6000000, 8000000, 'LAP TOP GAMING', '0', '1695494414_1693677160_laptop1.jpg', '2023-09-23 11:40:14', '2023-09-24 01:43:11'),
(4, 'Laptop Apple MacBook Air 13 inch M1 2020 8-core CPU/8GB/256GB/7-core GPU (MGN63SA/A)', 1, 22000000, 23000000, 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.', '1', '1695528182_1693969649_laptop5.jpg', '2023-09-23 21:03:02', '2023-09-24 21:12:48'),
(5, 'Tai nghe', 3, 10900000, 10000000, 'tai nghe', '0', '1695528257_1693677481_phukien2.jpg', '2023-09-23 21:04:17', '2023-09-26 02:21:27'),
(6, 'phím cơ', 3, 6000000, 8000000, 'phím cơ', '1', '1695528329_1693940023_phukien3.png', '2023-09-23 21:05:29', '2023-09-24 01:48:09'),
(7, 'Loa', 3, 200000, 300000, 'loa', '1', '1695529149_1693940333_phukien4.jpg', '2023-09-23 21:19:09', '2023-09-23 21:19:09'),
(8, 'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/256GB/120Hz/OfficeHS/Win11 (N5I5122W1)', 1, 22000000, 23000000, 'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/256GB/120Hz/OfficeHS/Win11 (N5I5122W1)', '1', '1695548436_1693937307_laptop4.jpg', '2023-09-24 02:40:36', '2023-09-24 02:40:36'),
(9, 'ipad', 5, 3000000, 3500000, 'ipad', '0', '1695548585_1693970835_table4.jpg', '2023-09-24 02:43:05', '2023-09-24 02:43:05'),
(11, 'Máy Tính Bảng iPad Gen 9 Wifi 64GB', 5, 11000000, 12000000, 'Máy Tính Bảng iPad Gen 9 Wifi 64GB', '0', '1695612137_1693937084_table3.jpg', '2023-09-24 20:22:17', '2023-09-24 20:22:17'),
(12, 'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/256GB/120Hz/OfficeHS/Win11 (N5I5122W1)', 1, 28000000, 30000000, 'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/256GB/120Hz/OfficeHS/Win11 (N5I5122W1)', '0', '1695613464_laptop2.jpg', '2023-09-24 20:44:24', '2023-09-24 20:44:24'),
(13, 'Điện thoại Samsung Galaxy A23 4GB', 6, 20000000, 23000000, 'Điện thoại Samsung Galaxy A23 4GB', '0', '1695613541_1693937960_iphone2.jpg', '2023-09-24 20:45:41', '2023-09-24 20:45:41'),
(14, 'Laptop HP 15-DW1001 Intel Celeron N4020, 4GB, 128GB SSD, 15.6\'FHD, Win 10', 1, 9000000, 11700000, 'Hệ điều hành: Windows 10 Home in S mode  CPU:  Intel® Celeron® N4020 (1.1 GHz base frequency, up to 2.8 GHz burst frequency, 4 MB L2 cache, 2 cores)  Ram:  4 GB DDR4-2400 MHz RAM (1 x 4 GB)  Ổ cứng: 128 GB SATA 3 TLC M.2 SSD  Ổ DVD: Không', '0', '1696148236_laptop.jpg', '2023-09-26 01:25:19', '2023-10-01 01:17:16'),
(15, 'Điện thoại iPhone 12 64GB', 6, 15000000, 17000000, 'Điện thoại iPhone 12 64GB', '0', '1695720021_anh1.jpg', '2023-09-26 02:20:21', '2023-09-26 02:21:17'),
(16, 'Bao da ốp lưng điện thoại', 3, 100000, 110000, 'Bao da ốp lưng điện thoại', '0', '1695840984_phukien5.jpg', '2023-09-27 11:56:24', '2023-09-27 11:58:35'),
(17, 'Máy Tính Bảng iPad Gen 9 Wifi 64GB', 5, 22000000, 25500000, 'Máy Tính Bảng iPad Gen 9 Wifi 64GB', '0', '1696095376_1694942329_table1.jpg', '2023-09-30 10:36:16', '2023-09-30 10:36:16'),
(18, 'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/256GB/120Hz/OfficeHS/Win11 (N5I5122W1)', 1, 100000, 200000, 'Laptop Dell Inspiron 15 3520 i5 1235U/8GB/256GB/120Hz/OfficeHS/Win11 (N5I5122W1)', '1', '1696100868_1695548585_1693970835_table4.jpg', '2023-09-30 12:07:48', '2023-09-30 12:09:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1695835210_1693505176_banner5.jpg', '2023-09-27 10:20:10', '2023-09-27 10:20:10'),
(2, '1695835377_slide2.jpg', '2023-09-27 10:22:57', '2023-09-27 10:22:57'),
(4, '1696101111_1693505614_banner6.jpg', '2023-09-30 12:11:51', '2023-09-30 12:11:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 'laptop', '1695494367_1693583409_laptop1.jpg', '2023-09-23 11:39:27', '2023-09-23 11:39:27'),
(3, 'Phụ kiện', 'Phụ kiện', '1695545377_1693584912_phukien1.jpg', '2023-09-23 21:03:35', '2023-09-24 01:49:37'),
(5, 'Máy tính bảng', 'Máy tính bảng', '1695548533_1693581824_table2.jpg', '2023-09-24 02:42:13', '2023-09-24 02:42:13'),
(6, 'Điện thoại', 'Điện thoại', '1695613496_1693583803_samsung1.jpg', '2023-09-24 20:44:56', '2023-09-24 20:44:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `phone`, `avatar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$LhsenhUIOg2VMQQ5IoaL7ujs8.Ft1YAOHsh09CTdAmms/5bxtdrNO', 'Hà nội', '0123456789', '1696148576_avatar1.jpg', 1, NULL, '2023-09-23 11:38:06', '2023-10-01 01:22:56'),
(2, 'hậu', 'dangvanhau23092003@gmail.com', NULL, '$2y$10$51ESNuz6E7Xu3FqYvwKf7.atc80kavwXHX9CJIdTBJt5f.o1fECVy', 'đà nẵng', '0123456789', '1696148960_avt1.jpg', 3, NULL, '2023-09-23 11:41:45', '2023-10-01 01:29:20'),
(3, 'Quý dê', 'quy@gmail.com', NULL, '$2y$10$55d7IsG5Ek61768m0OLvJeuOfF0mB6GIrotwDzPIgybrp4kmWKFD6', 'quãng nam', '0123456789', '1696149324_avt2.jpg', 3, NULL, '2023-09-23 21:01:34', '2023-10-01 01:35:24'),
(4, 'Tài chó điên', 'tai@gmail.com', NULL, '$2y$10$ATYHcejDpUw6auuSqPOb9.y0R9WOeMYAC7v5VPmnQwIU/vO3xlu5.', 'đà nẵng', '0123456781', '1696149357_avt2.jpg', 3, NULL, '2023-09-23 22:25:03', '2023-10-01 01:35:57'),
(5, 'Ronaldo', 'ronaldo@gmail.com', NULL, '$2y$10$ewbPYKIUuLvY/M8zOy1UkOu0.VdlWDC/A0bYVeM3uuMNFE66QyeVy', 'Đà nẵng', '0123456781', '1696149367_1696148576_avatar1.jpg', 1, NULL, '2023-09-24 23:55:59', '2023-10-01 01:36:07'),
(6, 'Messi', 'messi@gmail.com', NULL, '$2y$10$I2vI4Xmm1MZn7y.p8aqBaOvkH28kcifFgPV1VCRzIK0cDfFCytnMa', 'Hà nội', '0123456781', '1696148096_avt2.jpg', 3, NULL, '2023-09-25 00:20:54', '2023-10-01 01:14:56'),
(18, 'long vũ', 'vu@gmail.com', NULL, '$2y$10$OolcFdCTzR5MD7D8pXc3juGkIdJtan8qyAenWTwDjQB2EZ/IQu64.', 'quãng nam', '1111111111', '1696148617_avatar2.jpg', 3, NULL, '2023-09-30 22:47:39', '2023-10-01 01:23:37');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=610;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `id_customer` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `id_bill` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
