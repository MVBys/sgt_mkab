-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 17 2022 г., 21:52
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mkabdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'История Украины', '2021-05-30 09:16:20', '2021-05-30 09:16:20'),
(2, 'Физкультура', '2021-05-30 09:16:20', '2021-05-30 09:16:20'),
(3, 'Биология', '2021-05-30 09:16:20', '2021-05-30 09:16:20'),
(4, 'Литература', '2021-05-30 09:16:20', '2021-05-30 09:16:20'),
(5, 'Химия', '2021-05-30 09:16:20', '2021-05-30 09:16:20'),
(6, 'Информатика', '2021-05-30 09:16:20', '2021-05-30 09:16:20'),
(7, 'География', '2021-05-30 09:16:20', '2021-05-30 09:16:20');

-- --------------------------------------------------------

--
-- Структура таблицы `category_material`
--

CREATE TABLE `category_material` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_material`
--

INSERT INTO `category_material` (`id`, `category_id`, `material_id`, `created_at`, `updated_at`) VALUES
(69, 6, 54, '2021-09-19 15:44:55', '2021-09-19 15:44:55'),
(70, 4, 55, '2021-09-19 15:46:09', '2021-09-19 15:46:09'),
(72, 1, 57, '2021-09-19 15:49:08', '2021-09-19 15:49:08'),
(73, 6, 58, '2021-09-26 15:32:59', '2021-09-26 15:32:59'),
(74, 6, 59, '2021-12-26 10:51:37', '2021-12-26 10:51:37');

-- --------------------------------------------------------

--
-- Структура таблицы `editions`
--

CREATE TABLE `editions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_file` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_file` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `editions`
--

INSERT INTO `editions` (`id`, `title`, `description`, `pdf_file`, `img_file`, `created_at`, `updated_at`) VALUES
(2, 'Вторая запись', 'Первая запись Первая записьПервая записьПервая записьПервая записьПервая запись Первая записьПервая запись Первая запись', 'file1.pdf', 'jurnal2.jpg', '2021-12-13 19:20:28', '2021-12-13 19:20:28'),
(5, 'Четвертая', 'Using color to add meaning only provides a visual indication, which will not be conveyed to users of assistive technologies – such as screen readers. Ensure that information denoted by the color is either obvious from the content itself (e.g. the visible text), or is included through alternative means, such as additional text hidden with the .visually-hidden class.', '', 'jurnal2.jpg', '2021-12-14 19:48:10', '2021-12-14 19:48:10'),
(9, 'Пробная публикация проба 3', 'Описание к пробной публикации №3', 'editions/Qpqi9mWY8iyJlyBuSuxypTzHn9R8W8EVHsRuoc38.pdf', 'editions/a7e1EdEZl4sDFUisOrSOlRb7lmvyYqPOWRCDlmhy.jpg', '2021-12-31 13:26:39', '2021-12-31 13:26:39');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `material_type_id` bigint(20) NOT NULL,
  `pdf_link` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentation_link` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_link` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`other_link`)),
  `published` tinyint(1) NOT NULL,
  `image` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id`, `title`, `description`, `user_id`, `material_type_id`, `pdf_link`, `presentation_link`, `other_link`, `published`, `image`, `created_at`, `updated_at`) VALUES
(54, 'Функции для работы со строками', 'Для получения информации о более сложной обработке строк обратитесь к функциями Perl-совместимых регулярных выражений. Для работы с многобайтовыми кодировками посмотрите на функции по работе с многобайтовыми кодировками.', 3, 1, 'materials/3/vysWITyPI4USoz0B8CtG8W0sozAAIpnb4BvEeB1l.pdf', 'materials/3/UoMWKqrmIeRc09ch94yK5TB1jkqPfOyvOom95xbd.pptx', NULL, 1, '6.jpg', '2021-09-19 15:44:55', '2021-09-19 15:44:55'),
(55, 'Additional content', 'Similarly, you can use flexbox utilities and Bootstrap Icons to create alerts with icons. Depending on your icons and content, you may want to add more utilities or custom styles.', 3, 2, 'materials/3/ZnMWyzkvvOWGXilXm3faQZz3Vxe4ww4KTaae2uN2.pdf', '', NULL, 1, '4.jpg', '2021-09-19 15:46:09', '2021-09-19 15:46:09'),
(57, 'Нове положення про атестацію педпрацівників – громадське обговорення МОН', 'Міністерство освіти і науки пропонує для громадського обговорення проєкт Положення про атестацію педагогічних працівників.\r\nПро це написали на сайті міністерства.', 3, 3, 'materials/3/8QdmHQoywH1LJ4nC3epdqIKR2DJY4GZmh6f98Rxs.pdf', '', NULL, 1, '1.jpg', '2021-09-19 15:49:08', '2021-09-19 15:49:08'),
(58, 'Как убрать public из URL в проектах Laravel', 'Первый способ\r\nШаг 1: - Во-первых, вы переходите в папку /public Вашего проекта.\r\nКопируйте файл .htaccess из папки /public в корневую директорию с Laravel.\r\n\r\nШаг 2: - В корневой папке вы найдете файл с именем server.php.\r\nВы должны изменить имя этого файла на index.php .\r\nШаг 3: - Теперь, если вы удалите публикацию из своего URL-адреса и запустите проект laravel,\r\nВаш проект будет открыт без общедоступности.', 3, 1, 'materials/3/IZCZz2GzO0gxhk7BLjnmz8txy2KURir32f0GWDVv.pdf', '', NULL, 1, '6.jpg', '2021-09-26 15:32:59', '2021-09-26 15:32:59'),
(59, 'Проверочная', 'This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API.', 4, 2, 'materials/4/iED3nYaIydnv0TYVLTIXyX772aKfG2PIQZatBwBA.pdf', '', NULL, 1, '6.jpg', '2021-12-26 10:51:37', '2021-12-26 10:51:37');

-- --------------------------------------------------------

--
-- Структура таблицы `material_types`
--

CREATE TABLE `material_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `material_types`
--

INSERT INTO `material_types` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Коспект урока', NULL, NULL),
(2, 'Доклад или статья', NULL, NULL),
(5, 'Учебные материалы', NULL, NULL),
(6, 'Внекласное мероприятие', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2019_08_19_000000_create_failed_jobs_table', 1),
(20, '2021_05_26_182936_create_materials_table', 1),
(25, '2021_05_30_100838_create_categories_table', 2),
(29, '2021_05_30_161915_create_category_material_table', 3),
(30, '2021_06_22_170134_create_permission_tables', 4),
(32, '2021_08_26_174743_create_teachers_table', 5),
(33, '2021_08_26_182059_create_qualification_category_table', 5),
(34, '2021_08_26_182116_create_teaching_title_table', 5),
(40, '2021_11_27_110434_create_materials_type_table', 6),
(41, '2021_11_27_111219_add_column_type_id_in_materials', 6),
(43, '2021_11_27_115252_create_material_types_table', 7),
(44, '2021_11_27_120427_add_column_type_id_in_materials', 8),
(45, '2021_12_13_191714_create_editions_table', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Структура таблицы `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create articles', 'web', '2021-06-22 14:10:23', '2021-06-22 14:10:23'),
(2, 'edit articles', 'web', '2021-06-22 14:10:23', '2021-06-22 14:10:23');

-- --------------------------------------------------------

--
-- Структура таблицы `qualification_category`
--

CREATE TABLE `qualification_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_title` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `qualification_category`
--

INSERT INTO `qualification_category` (`id`, `category_title`, `created_at`, `updated_at`) VALUES
(1, 'Спеціаліст', NULL, NULL),
(2, 'Спеціаліст другої категорії', NULL, NULL),
(3, 'Спеціаліст першої категорії', NULL, NULL),
(4, 'Спеціаліст вищої категорії', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'techer', 'web', '2021-06-22 14:10:23', '2021-06-22 14:10:23'),
(2, 'admin', 'web', '2021-06-22 14:11:39', '2021-06-22 14:11:39'),
(3, 'superadmin', 'web', '2021-06-22 14:12:01', '2021-06-22 14:12:01');

-- --------------------------------------------------------

--
-- Структура таблицы `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` bigint(20) NOT NULL,
  `qualification_category_id` bigint(20) NOT NULL,
  `teaching_title_id` bigint(20) NOT NULL,
  `teacher_photo` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_presentation` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `surname`, `patronymic`, `experience`, `qualification_category_id`, `teaching_title_id`, `teacher_photo`, `portfolio_presentation`, `created_at`, `updated_at`) VALUES
(3, 3, 'Петр', 'Петренко', 'Петрович', 2, 3, 5, 'theacherdata/3/n2sHJL5V1F48xyyHwEzAHaQVa3SDCqJKBVtvpYzz.png', '', NULL, NULL),
(4, 4, 'Маша', 'Машина', 'Машевна', 1, 2, 1, 'theacherdata/4/dShtILWS0dm9lICuw5CTp2SgXRalHmqTdBXwy4HK.jpg', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `teaching_title`
--

CREATE TABLE `teaching_title` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `teaching_title`
--

INSERT INTO `teaching_title` (`id`, `rank`, `created_at`, `updated_at`) VALUES
(1, 'Не має', NULL, NULL),
(2, 'Учитель-методист', NULL, NULL),
(3, 'Вихователь-методист', NULL, NULL),
(4, 'Педагог-організатор-методист', NULL, NULL),
(5, 'Практичний психолог - методист', NULL, NULL),
(6, 'Керівник гуртка - методист', NULL, NULL),
(7, 'Старший вожатий - методист', NULL, NULL),
(8, 'Старший викладач', NULL, NULL),
(9, 'Старший учитель', NULL, NULL),
(10, 'Старший вихователь', NULL, NULL),
(11, 'Майстер виробничого навчання I категорії', NULL, NULL),
(12, 'Майстер виробничого навчання II категорії', NULL, NULL),
(13, 'Викладач-методист', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'max', 'bismaxmail@gmail.com', '2021-06-21 18:36:50', '$2y$10$AT8VTvqVNAJX.uo66JHO8.EPADYEfR.yTLQRU.UPRRgELXW6ZNHAu', NULL, '2021-06-21 14:42:34', '2021-06-21 14:42:34'),
(2, 'xam', 'mvbys@outlook.com', '2021-06-21 18:36:35', '$2y$10$tyDbhM36BiP5V5BVzOyo5uvxh3CQEdJlogli.XCEwpBNnztjxYPUu', '1sgsayvxk9goIEetqpuHS1IBIzccNntUe8h2Zfb26dlaVrVSGWdXSbVL4WJB', '2021-06-21 15:35:57', '2021-06-21 15:35:57'),
(3, 'max', 'max@gmail.com', '2021-08-25 16:47:07', '$2y$10$/h31/BO1mxmaYY2edsS7Q.3.VpzIYEAAqW54v92Hpu7e6cXVg4RBK', 'Er4p6I3hzw8ux1Ag3RpeLsFw3wYhPJdjkmUMCaiHWT93DcxYZth7q47ZtCAh', '2021-08-25 14:02:43', '2021-08-25 14:02:43'),
(4, 'Maha', 'maha@gmail.com', '2021-09-29 19:44:40', '$2y$10$pi8zR1C3u2l/J8R6cRAgb.N3bD/wHYSnhFwsNsFvcPZt1tyGBqogS', 'KcAhex9BCgQcoXrbQVJiy23v31KJbZHiscmdJ7ERAoc66m3Fk5iBPOr4qoTF', '2021-09-19 16:43:43', '2021-09-19 16:43:43');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_title_unique` (`title`);

--
-- Индексы таблицы `category_material`
--
ALTER TABLE `category_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_material_category_id_foreign` (`category_id`),
  ADD KEY `category_material_material_id_foreign` (`material_id`);

--
-- Индексы таблицы `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `material_types`
--
ALTER TABLE `material_types`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `qualification_category`
--
ALTER TABLE `qualification_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Индексы таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teaching_title`
--
ALTER TABLE `teaching_title`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `category_material`
--
ALTER TABLE `category_material`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `editions`
--
ALTER TABLE `editions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `material_types`
--
ALTER TABLE `material_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `qualification_category`
--
ALTER TABLE `qualification_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `teaching_title`
--
ALTER TABLE `teaching_title`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_material`
--
ALTER TABLE `category_material`
  ADD CONSTRAINT `category_material_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_material_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`);

--
-- Ограничения внешнего ключа таблицы `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
