

CREATE TABLE `departments` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `employee_departments` (
  `employee_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `employees` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `organizations` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `organizations_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `permissions` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `personal_access_tokens` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `role_permissions` (
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `roles` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `user_roles` (
  `user_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('1','2014_10_12_000000_create_users_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('2','2019_12_14_000001_create_personal_access_tokens_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('3','2022_01_22_105040_create_employees_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('4','2022_01_22_105148_create_organizations_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('5','2022_01_22_113001_create_departments_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('6','2022_01_22_113423_create_user_roles_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('7','2022_01_22_125912_create_roles_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('8','2022_01_22_141650_create_permissions_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('9','2022_01_22_142028_create_role_permissions_table','1');

INSERT INTO migrations (`id`, `migration`, `batch`) VALUES 
('10','2022_01_22_145050_create_employee_departments_table','1');

INSERT INTO permissions (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('359ef9ee-0328-4da7-8982-b2355cb9ecb1','','Update','update','1','2022-01-22 21:07:18','');

INSERT INTO permissions (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('428fe4f0-8b46-4504-ac64-1eb89b2802f1','','Delete','delete','1','2022-01-22 21:07:18','');

INSERT INTO permissions (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('945dc564-c542-4c3c-b262-1f4d12b608a1','','Create','create','1','2022-01-22 21:07:18','');

INSERT INTO permissions (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('abab1c09-0e05-4c11-b6e6-f0dbc3d0588a','','Read','read','1','2022-01-22 21:07:18','');

INSERT INTO personal_access_tokens (`id`, `user_id`, `token`, `expired_at`, `last_used_at`, `created_at`, `updated_at`) VALUES 
('003257bf-ff39-4dee-8b45-7b1d36d6b446','2a7e4e4f-64b9-4466-84a7-9407a17a84af','NlP0vNvNdsr2z2vERviIvuAk8IH19eX8ofQdOODFUYNOMXjuUrOoPLnxZedS','','','2022-01-22 15:38:40','2022-01-22 15:38:40');

INSERT INTO roles (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('57ec30df-7227-4c85-81b1-76fb041048e7','','Admin','admin','1','2022-01-22 21:07:18','');

INSERT INTO roles (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('67e174d0-5413-4fe0-8ebc-61cfe44ccf3b','','Accountant','accountant','1','2022-01-22 21:07:18','');

INSERT INTO roles (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('8f4d57cb-ba1c-48e9-b39a-5ccdf3bac617','','Owner','owner','1','2022-01-22 21:07:18','');

INSERT INTO roles (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('a2fa1cc6-647c-4f6a-94ec-5b5a696cc6f1','','Manager','manager','1','2022-01-22 21:07:18','');

INSERT INTO roles (`id`, `organization_id`, `title`, `slug`, `active`, `created_at`, `updated_at`) VALUES 
('f344076d-2fff-47cd-8a53-6b8b7bc3e1c4','','HR','hr','1','2022-01-22 21:07:18','');

INSERT INTO users (`id`, `name`, `username`, `email`, `password`, `photo_url`, `country_code`, `phone`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`) VALUES 
('2a7e4e4f-64b9-4466-84a7-9407a17a84af','Abhi Shukla','','shuklaji88as@gmail.com','$2y$10$cgUeF3nubdn7GnWTAzK1jO66v5vI/rQvLN4dxc..GjPugmMiL/w8K','','','','','','2022-01-22 15:38:40','2022-01-22 15:38:40');
