-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 12 2022 г., 03:32
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mechanics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `car_brands`
--

CREATE TABLE `car_brands` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `car_brands`
--

INSERT INTO `car_brands` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'ВАЗ', '2022-04-11 20:14:59', '2022-04-11 20:14:59');

-- --------------------------------------------------------

--
-- Структура таблицы `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carbrand_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `car_models`
--

INSERT INTO `car_models` (`id`, `title`, `carbrand_id`, `created_at`, `updated_at`) VALUES
(1, 'Ваз 2109', 1, '2022-04-11 20:14:59', '2022-04-11 20:14:59');

-- --------------------------------------------------------

--
-- Структура таблицы `car_model_product`
--

CREATE TABLE `car_model_product` (
  `id` bigint UNSIGNED NOT NULL,
  `car_model_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `car_model_product`
--

INSERT INTO `car_model_product` (`id`, `car_model_id`, `product_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_09_154835_create_product_types_table', 1),
(6, '2022_04_09_154851_create_products_table', 1),
(7, '2022_04_09_154857_create_car_brands_table', 1),
(8, '2022_04_09_154926_create_car_models_table', 1),
(9, '2022_04_09_230802_create_car_model_product_table', 1),
(10, '2022_04_11_171155_create_statements_table', 1),
(11, '2022_04_11_172642_create_purchases_table', 1),
(12, '2022_04_11_201014_create_purchase_statement_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` double(8,2) NOT NULL,
  `producttype_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `subtitle`, `image`, `brand`, `description`, `price`, `producttype_id`, `created_at`, `updated_at`) VALUES
(1, 'аккумулятор SWITCH PRO', 'lorem ipsum', 'images/products/2c3fcab6f91a9c28e39f0bb6f4b50f9c.jpg', 'Bosch', '<h2>Мощно</h2>\r\n\r\n<p>Особая технология обработки пластин обеспечивает повышенную мощность, пусковой ток и низкий уровень саморазряда. Автомобиль легко заводится даже после длительного простоя.</p>\r\n\r\n<p>АКБ SWITCH PRO составит качественную конкуренцию именитым импортным аналогам: Energizer, Topla, TAB, Mutlu, а цена на порядок ниже.</p>\r\n\r\n<h2>Надежно</h2>\r\n\r\n<p>Технологии для предотвращения короткого замыкания позволяют использовать АКБ на неровных дорогах, где наблюдаются сильные вибрации.</p>\r\n\r\n<h2>Долговечно</h2>\r\n\r\n<p>Исключение деформации внутренних пластин, контроль заряда и специальная конфигурация жил пластин обеспечивают устойчивость к коротким замыканиям, длительную работу в любых климатических условиях. Данные АКБ практически не требуют обслуживания.&nbsp;</p>', 4500.00, 1, '2022-04-11 20:21:34', '2022-04-11 20:21:34'),
(2, 'Varta', 'lorem', 'images/products/59acee7d614eab0d2c481ed27fcf908e.jpg', 'Varta', NULL, 3900.00, 1, '2022-04-11 20:22:41', '2022-04-11 20:22:41'),
(3, 'Свечи зажигания Spark', NULL, 'images/products/fc60ab3cb17499f0474c951bd574f247.jpg', 'Spark', NULL, 500.00, 1, '2022-04-11 20:23:30', '2022-04-11 20:23:30'),
(4, 'Свечи зажигания', 'some info', 'images/products/1663782ac49f0fcf203d20fe612dbf72.jpg', 'Denso', NULL, 700.00, 1, '2022-04-11 20:24:53', '2022-04-11 20:24:53'),
(5, 'AutoBase MM', 'plus', 'images/products/e71724f03f68275a18300aed3c3f567e.jpg', 'Sikkens', NULL, 4300.00, 1, '2022-04-11 20:26:05', '2022-04-11 20:26:05'),
(6, 'Decor Lux', 'Paint', 'images/products/47f76f08a8b327d67cd76a2c88dee623.jpeg', 'Nowa', NULL, 790.00, 1, '2022-04-11 20:26:58', '2022-04-11 20:26:58');

-- --------------------------------------------------------

--
-- Структура таблицы `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_types`
--

INSERT INTO `product_types` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Аккумуляторы', 'Автомобильный аккумулятор является важным элементом электрооборудования - наряду с генератором выступает источником тока.', '2022-04-11 20:14:59', '2022-04-11 20:14:59'),
(2, 'Двигатель', NULL, '2022-04-11 20:19:45', '2022-04-11 20:19:45'),
(3, 'Кузовная краска', NULL, '2022-04-11 20:19:52', '2022-04-11 20:19:52'),
(4, 'Элементы салона', NULL, '2022-04-11 20:19:58', '2022-04-11 20:19:58'),
(5, 'Кузовные детали', NULL, '2022-04-11 20:20:03', '2022-04-11 20:20:03'),
(6, 'Осветительные приборы', NULL, '2022-04-11 20:20:13', '2022-04-11 20:20:13'),
(7, 'Диски', NULL, '2022-04-11 20:20:22', '2022-04-11 20:20:22'),
(8, 'Шины', NULL, '2022-04-11 20:28:21', '2022-04-11 20:28:21'),
(9, 'Аудиосистема', NULL, '2022-04-11 20:28:33', '2022-04-11 20:28:42'),
(10, 'Электрика', NULL, '2022-04-11 20:29:03', '2022-04-11 20:29:03');

-- --------------------------------------------------------

--
-- Структура таблицы `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_ready` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `product_id`, `quantity`, `is_active`, `is_ready`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, '2022-04-11 20:30:14', '2022-04-11 20:30:14'),
(2, 1, 3, 4, 1, 0, '2022-04-11 20:30:19', '2022-04-11 20:30:19'),
(3, 1, 6, 2, 1, 0, '2022-04-11 20:30:23', '2022-04-11 20:30:23'),
(4, 1, 5, 2, 1, 0, '2022-04-11 20:30:29', '2022-04-11 20:30:29');

-- --------------------------------------------------------

--
-- Структура таблицы `purchase_statement`
--

CREATE TABLE `purchase_statement` (
  `id` bigint UNSIGNED NOT NULL,
  `purchase_id` bigint UNSIGNED NOT NULL,
  `statement_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statements`
--

CREATE TABLE `statements` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `summ` double(8,2) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `is_admin`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.admin', NULL, '$2y$10$fGuAFojZihgfBeKBA3eGZ.dN3bd77hMvbL9CU.hLHn5kmY5SzUYQS', 'qFuW8ZSj7tRhTluuahX4dCZEbaEeXzSYg1gXxgSmhPa8RvQGOZ5YxZvTh4tY', '2022-04-11 20:14:59', '2022-04-11 20:14:59'),
(2, 0, 'doawkdowa', 'qweqwe@qwe', NULL, '$2y$10$oBflgpD.UthG/JJmK5UYpelbEGLwFyrr8xLb0BByGjpS6X9Jk8x6.', NULL, '2022-04-11 20:15:51', '2022-04-11 20:15:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_brands_title_unique` (`title`);

--
-- Индексы таблицы `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_models_title_unique` (`title`),
  ADD KEY `car_models_carbrand_id_foreign` (`carbrand_id`);

--
-- Индексы таблицы `car_model_product`
--
ALTER TABLE `car_model_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_model_product_car_model_id_foreign` (`car_model_id`),
  ADD KEY `car_model_product_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_producttype_id_foreign` (`producttype_id`);

--
-- Индексы таблицы `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_title_unique` (`title`);

--
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchases_user_id_foreign` (`user_id`),
  ADD KEY `purchases_product_id_foreign` (`product_id`);

--
-- Индексы таблицы `purchase_statement`
--
ALTER TABLE `purchase_statement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_statement_purchase_id_foreign` (`purchase_id`),
  ADD KEY `purchase_statement_statement_id_foreign` (`statement_id`);

--
-- Индексы таблицы `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statements_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `car_model_product`
--
ALTER TABLE `car_model_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `purchase_statement`
--
ALTER TABLE `purchase_statement`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `statements`
--
ALTER TABLE `statements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_carbrand_id_foreign` FOREIGN KEY (`carbrand_id`) REFERENCES `car_brands` (`id`);

--
-- Ограничения внешнего ключа таблицы `car_model_product`
--
ALTER TABLE `car_model_product`
  ADD CONSTRAINT `car_model_product_car_model_id_foreign` FOREIGN KEY (`car_model_id`) REFERENCES `car_models` (`id`),
  ADD CONSTRAINT `car_model_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_producttype_id_foreign` FOREIGN KEY (`producttype_id`) REFERENCES `product_types` (`id`);

--
-- Ограничения внешнего ключа таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `purchases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `purchase_statement`
--
ALTER TABLE `purchase_statement`
  ADD CONSTRAINT `purchase_statement_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchase_statement_statement_id_foreign` FOREIGN KEY (`statement_id`) REFERENCES `statements` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `statements`
--
ALTER TABLE `statements`
  ADD CONSTRAINT `statements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
