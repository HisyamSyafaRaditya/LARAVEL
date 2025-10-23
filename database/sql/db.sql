-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 05:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `a_id` char(8) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_country` varchar(20) NOT NULL,
  `a_biography` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`a_id`, `a_name`, `a_country`, `a_biography`) VALUES
('A001', 'John Green', 'USA', 'Famous for young adult novels.'),
('A002', 'Tere Liye', 'Indonesia', 'Popular Indonesian novelist.'),
('A003', 'Haruki Murakami', 'Japan', 'Known for surreal storytelling.'),
('A004', 'J.K. Rowling', 'UK', 'Author of Harry Potter series.'),
('A005', 'Andrea Hirata', 'Indonesia', 'Author of Laskar Pelangi.'),
('A006', 'George Orwell', 'UK', 'Known for dystopian novels.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `b_id` char(8) NOT NULL,
  `b_title` varchar(50) NOT NULL,
  `b_isbn` char(20) NOT NULL,
  `b_publication_year` date NOT NULL,
  `b_stock` int(11) NOT NULL,
  `b_available_stock` int(11) NOT NULL,
  `b_synopsys` text DEFAULT NULL,
  `Author_a_id` char(8) NOT NULL,
  `Category_c_id` char(8) NOT NULL,
  `Publisher_p_id` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`b_id`, `b_title`, `b_isbn`, `b_publication_year`, `b_stock`, `b_available_stock`, `b_synopsys`, `Author_a_id`, `Category_c_id`, `Publisher_p_id`) VALUES
('B001', 'The Fault in Our Stars', '9780142424179', '2012-01-01', 10, 7, 'A love story of two teens with cancer.', 'A001', 'C004', 'P002'),
('B002', 'Laskar Pelangi', '9789793062792', '2005-01-01', 15, 10, 'A story about friendship and education.', 'A005', 'C001', 'P001'),
('B003', 'Norwegian Wood', '9780375704024', '1987-01-01', 12, 6, 'A nostalgic story of love and loss.', 'A003', 'C004', 'P005'),
('B004', 'Harry Potter and the Philosopher’s Stone', '9780747532699', '1997-01-01', 20, 18, 'First book in the Harry Potter series.', 'A004', 'C003', 'P003'),
('B005', '1984', '9780451524935', '1949-01-01', 10, 9, 'A dystopian novel about surveillance.', 'A006', 'C001', 'P006'),
('B006', 'Animal Farm', '9780451526342', '1945-01-01', 8, 8, 'Political satire using farm animals.', 'A006', 'C001', 'P006'),
('B007', 'Rindu', '9786020310935', '2015-01-01', 9, 6, 'A story about love, loss, and longing.', 'A002', 'C004', 'P004'),
('B008', 'Pulang', '9786020300127', '2012-01-01', 11, 8, 'A story about journey and identity.', 'A002', 'C001', 'P004'),
('B009', 'Kafka on the Shore', '9781400079278', '2002-01-01', 14, 12, 'A surreal story of parallel worlds.', 'A003', 'C003', 'P005'),
('B010', 'Paper Towns', '9780142414934', '2008-01-01', 10, 8, 'A mystery adventure of friendship.', 'A001', 'C001', 'P002'),
('B011', 'Becoming', '9781524763138', '2018-01-01', 7, 5, 'Memoir of Michelle Obama.', 'A001', 'C002', 'P002'),
('B012', 'The Catcher in the Rye', '9780316769488', '1951-01-01', 13, 9, 'A story about teenage angst.', 'A001', 'C001', 'P003'),
('B013', 'Tenggelamnya Kapal Van Der Wijck', '9789793060408', '1938-01-01', 8, 7, 'Classic Indonesian romance novel.', 'A005', 'C004', 'P001'),
('B014', 'To Kill a Mockingbird', '9780061120084', '1960-01-01', 9, 9, 'A story about justice and prejudice.', 'A006', 'C001', 'P002'),
('B015', 'Bumi', '9786020311079', '2014-01-01', 10, 7, 'Fantasy world with multiple dimensions.', 'A002', 'C003', 'P004'),
('B016', 'Pergi', '9786020316548', '2018-01-01', 10, 8, 'Sequel to Pulang.', 'A002', 'C001', 'P004'),
('B017', 'Perahu Kertas', '9786020401459', '2012-01-01', 11, 9, 'Romantic story of two dreamers.', 'A002', 'C004', 'P004'),
('B018', 'Men Without Women', '9781787330641', '2017-01-01', 7, 5, 'Short stories about loneliness.', 'A003', 'C001', 'P005'),
('B019', 'Colorless Tsukuru Tazaki', '9780385352109', '2013-01-01', 9, 6, 'A story of loss and self-discovery.', 'A003', 'C001', 'P005'),
('B020', 'Origin', '9780385514231', '2017-01-01', 15, 13, 'Mystery involving technology and faith.', 'A001', 'C001', 'P002'),
('B021', 'Komet', '9786024811681', '2018-01-01', 9, 9, 'Fantasy journey through worlds.', 'A002', 'C003', 'P004'),
('B022', 'Sang Pemimpi', '9789793060415', '2006-01-01', 8, 7, 'Sequel of Laskar Pelangi.', 'A005', 'C001', 'P001'),
('B023', 'Big Brother', '9780451524940', '1949-01-01', 5, 3, 'A futuristic surveillance dystopia.', 'A006', 'C001', 'P006'),
('B024', 'The Casual Vacancy', '9780316228534', '2012-01-01', 6, 6, 'A small town political drama.', 'A004', 'C002', 'P003'),
('B025', 'Fantastic Beasts', '9781338132311', '2016-01-01', 12, 10, 'Guide to magical creatures.', 'A004', 'C003', 'P003'),
('B026', 'Animal Spirit', '9780451526359', '2000-01-01', 8, 8, 'Psychological interpretation of life.', 'A006', 'C002', 'P006'),
('B027', 'Detektif Conan Vol.1', '9786020310996', '1994-01-01', 20, 18, 'Detective mystery series.', 'A002', 'C003', 'P004'),
('B028', 'Harry Potter and the Goblet of Fire', '9780747546245', '2000-01-01', 18, 15, 'Fourth book in Harry Potter series.', 'A004', 'C003', 'P003'),
('B029', 'Harry Potter and the Order of Phoenix', '9780747551003', '2003-01-01', 16, 15, 'Fifth book in the series.', 'A004', 'C003', 'P003'),
('B030', 'Harry Potter and the Half-Blood Prince', '9780747581086', '2005-01-01', 14, 13, 'Sixth book in the series.', 'A004', 'C003', 'P003');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` char(8) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_name`, `c_description`) VALUES
('C001', 'Fiction', 'Imaginative narrative writing.'),
('C002', 'Non-Fiction', 'Based on factual events.'),
('C003', 'Fantasy', 'Contains magical or supernatural elements.'),
('C004', 'Romance', 'Focuses on romantic relationships.'),
('C005', 'Science', 'Covers topics about science and discovery.'),
('C006', 'History', 'Covers historical events and figures.');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `l_id` char(8) NOT NULL,
  `l_date` datetime NOT NULL,
  `l_return_date` datetime DEFAULT NULL,
  `l_status` varchar(20) NOT NULL,
  `Member_m_id` char(8) NOT NULL,
  `Staff_s_id` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`l_id`, `l_date`, `l_return_date`, `l_status`, `Member_m_id`, `Staff_s_id`) VALUES
('L001', '2025-01-10 09:00:00', '2025-01-20 09:00:00', 'Returned', 'M001', 'S001'),
('L002', '2025-02-05 10:00:00', '2025-02-15 10:00:00', 'Returned', 'M002', 'S002'),
('L003', '2025-03-12 14:00:00', '2025-03-22 14:00:00', 'Borrowed', 'M003', 'S003'),
('L004', '2025-04-01 11:00:00', '2025-04-10 11:00:00', 'Borrowed', 'M004', 'S004'),
('L005', '2025-04-20 13:00:00', '2025-04-30 13:00:00', 'Returned', 'M005', 'S005');

-- --------------------------------------------------------

--
-- Table structure for table `loan_book`
--

CREATE TABLE `loan_book` (
  `Loan_l_id` char(8) NOT NULL,
  `Book_b_id` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_book`
--

INSERT INTO `loan_book` (`Loan_l_id`, `Book_b_id`) VALUES
('L001', 'B002'),
('L001', 'B010'),
('L002', 'B004'),
('L003', 'B007'),
('L003', 'B015'),
('L004', 'B009'),
('L005', 'B013');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `m_id` char(8) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_phone` varchar(15) NOT NULL,
  `m_address` varchar(100) NOT NULL,
  `m_join_date` date NOT NULL,
  `m_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `m_name`, `m_email`, `m_phone`, `m_address`, `m_join_date`, `m_status`) VALUES
('M001', 'Fajar Nugroho', 'fajar@mail.com', '0811111111', 'Surabaya', '2022-01-01', 'Active'),
('M002', 'Lina Wulandari', 'lina@mail.com', '0811111112', 'Malang', '2022-03-11', 'Active'),
('M003', 'Dedi Prasetya', 'dedi@mail.com', '0811111113', 'Jakarta', '2021-09-12', 'Active'),
('M004', 'Maya Sari', 'maya@mail.com', '0811111114', 'Bandung', '2023-02-10', 'Active'),
('M005', 'Rian Setiawan', 'rian@mail.com', '0811111115', 'Solo', '2022-07-05', 'Active'),
('M006', 'Citra Permata', 'citra@mail.com', '0811111116', 'Yogyakarta', '2023-01-01', 'Active'),
('M007', 'Bayu Ramadhan', 'bayu@mail.com', '0811111117', 'Makassar', '2021-11-21', 'Active'),
('M008', 'Nanda Aulia', 'nanda@mail.com', '0811111118', 'Medan', '2023-06-15', 'Active'),
('M009', 'Zaki Maulana', 'zaki@mail.com', '0811111119', 'Palembang', '2021-04-04', 'Active'),
('M010', 'Vina Maharani', 'vina@mail.com', '0811111120', 'Semarang', '2020-10-18', 'Inactive'),
('M011', 'Taufik Ismail', 'taufik@mail.com', '0811111121', 'Surabaya', '2023-03-25', 'Active'),
('M012', 'Rika Lestari', 'rika@mail.com', '0811111122', 'Bali', '2023-05-10', 'Active'),
('M013', 'Farhan Nur', 'farhan@mail.com', '0811111123', 'Depok', '2023-07-11', 'Active'),
('M014', 'Yulia Kartini', 'yulia@mail.com', '0811111124', 'Tangerang', '2021-02-22', 'Active'),
('M015', 'Aldo Pratama', 'aldo@mail.com', '0811111125', 'Bekasi', '2022-04-14', 'Active'),
('M016', 'Bella Anjani', 'bella@mail.com', '0811111126', 'Bogor', '2021-08-30', 'Active'),
('M017', 'Gilang Putra', 'gilang@mail.com', '0811111127', 'Surabaya', '2020-12-12', 'Inactive'),
('M018', 'Dina Rosita', 'dina@mail.com', '0811111128', 'Malang', '2021-05-05', 'Active'),
('M019', 'Rafi Prakoso', 'rafi@mail.com', '0811111129', 'Padang', '2023-06-30', 'Active'),
('M020', 'Salma Hidayah', 'salma@mail.com', '0811111130', 'Surabaya', '2022-11-11', 'Active');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_21_013947_create_library_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `p_id` char(8) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `p_phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`p_id`, `p_name`, `p_address`, `p_phone`) VALUES
('P001', 'Gramedia', 'Jakarta', '0215551111'),
('P002', 'HarperCollins', 'New York', '0012125551212'),
('P003', 'Penguin Books', 'London', '4412345678'),
('P004', 'Bentang Pustaka', 'Yogyakarta', '0274555123'),
('P005', 'Vintage', 'Tokyo', '8135557788'),
('P006', 'Cambridge Press', 'Cambridge', '4412237654');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` char(8) NOT NULL,
  `s_name` varchar(50) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_phone` varchar(15) NOT NULL,
  `s_position` varchar(10) NOT NULL,
  `s_join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `s_name`, `s_email`, `s_phone`, `s_position`, `s_join_date`) VALUES
('S001', 'Rina Kartika', 'rina@library.com', '0812345001', 'Librarian', '2020-03-10'),
('S002', 'Ahmad Fauzi', 'ahmad@library.com', '0812345002', 'Assistant', '2021-01-15'),
('S003', 'Budi Santoso', 'budi@library.com', '0812345003', 'Admin', '2019-07-22'),
('S004', 'Siti Rahmawati', 'siti@library.com', '0812345004', 'Librarian', '2020-05-11'),
('S005', 'Dewi Anggraini', 'dewi@library.com', '0812345005', 'Assistant', '2022-08-09'),
('S006', 'Andi Prasetyo', 'andi@library.com', '0812345006', 'Admin', '2021-09-17'),
('S007', 'Rizky Hidayat', 'rizky@library.com', '0812345007', 'Technician', '2023-01-20'),
('S008', 'Tasya Amelia', 'tasya@library.com', '0812345008', 'Librarian', '2022-02-12'),
('S009', 'Putri Lestari', 'putri@library.com', '0812345009', 'Assistant', '2020-11-03'),
('S010', 'Hendri Saputra', 'hendri@library.com', '0812345010', 'Manager', '2018-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'final_test', 'tt@gmail.com', NULL, '$2y$12$YHfCvj8bues.FElhT5YTcO9N8WtDNgKgcf.mLzrFG00lUSoVqVCtG', NULL, '2025-10-22 19:43:50', '2025-10-22 19:43:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `books_author_a_id_foreign` (`Author_a_id`),
  ADD KEY `books_category_c_id_foreign` (`Category_c_id`),
  ADD KEY `books_publisher_p_id_foreign` (`Publisher_p_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `loans_member_m_id_foreign` (`Member_m_id`),
  ADD KEY `loans_staff_s_id_foreign` (`Staff_s_id`);

--
-- Indexes for table `loan_book`
--
ALTER TABLE `loan_book`
  ADD PRIMARY KEY (`Loan_l_id`,`Book_b_id`),
  ADD KEY `loan_book_book_b_id_foreign` (`Book_b_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_a_id_foreign` FOREIGN KEY (`Author_a_id`) REFERENCES `authors` (`a_id`),
  ADD CONSTRAINT `books_category_c_id_foreign` FOREIGN KEY (`Category_c_id`) REFERENCES `categories` (`c_id`),
  ADD CONSTRAINT `books_publisher_p_id_foreign` FOREIGN KEY (`Publisher_p_id`) REFERENCES `publishers` (`p_id`);

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_member_m_id_foreign` FOREIGN KEY (`Member_m_id`) REFERENCES `members` (`m_id`),
  ADD CONSTRAINT `loans_staff_s_id_foreign` FOREIGN KEY (`Staff_s_id`) REFERENCES `staff` (`s_id`);

--
-- Constraints for table `loan_book`
--
ALTER TABLE `loan_book`
  ADD CONSTRAINT `loan_book_book_b_id_foreign` FOREIGN KEY (`Book_b_id`) REFERENCES `books` (`b_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loan_book_loan_l_id_foreign` FOREIGN KEY (`Loan_l_id`) REFERENCES `loans` (`l_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
