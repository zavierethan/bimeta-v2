/*
 Navicat Premium Data Transfer

 Source Server         : bimeta
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : bimeta_clone
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 28/06/2024 00:30:56
*/


-- ----------------------------
-- Sequence structure for app_menus_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."app_menus_id_seq";
CREATE SEQUENCE "public"."app_menus_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for failed_jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
CREATE SEQUENCE "public"."failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
CREATE SEQUENCE "public"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for personal_access_tokens_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."personal_access_tokens_id_seq";
CREATE SEQUENCE "public"."personal_access_tokens_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for role_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."role_id_seq";
CREATE SEQUENCE "public"."role_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_privilege_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_privilege_id_seq";
CREATE SEQUENCE "public"."users_privilege_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for app_menus
-- ----------------------------
DROP TABLE IF EXISTS "public"."app_menus";
CREATE TABLE "public"."app_menus" (
  "id" int8 NOT NULL DEFAULT nextval('app_menus_id_seq'::regclass),
  "title" varchar(191) COLLATE "pg_catalog"."default" NOT NULL,
  "url" varchar(191) COLLATE "pg_catalog"."default",
  "icon" varchar(191) COLLATE "pg_catalog"."default",
  "description" varchar(191) COLLATE "pg_catalog"."default",
  "app_menu_id" int4,
  "order" int4 NOT NULL,
  "group_menu_id" int4,
  "is_shortcut" int4 NOT NULL DEFAULT 0,
  "is_active" int4 NOT NULL DEFAULT 1,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of app_menus
-- ----------------------------
INSERT INTO "public"."app_menus" VALUES (15, 'Purchase Order', 'procurement/purchase-order', 'bx bxs-dashboard', 'Purchase Order', 14, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (16, 'Penerimaan Material', 'procurement/goods-receive', 'bx bxs-dashboard', 'Penerimaan Material', 14, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (11, 'Pengiriman', 'warehouse/shipping', 'bx bxs-dashboard', 'Pengiriman', 10, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (12, 'Stok Finish Goods', 'warehouse/finish-goods', 'bx bxs-dashboard', 'Stok Finish Goods', 10, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (3, 'PO Customer', 'sales-order', 'file-text', 'PO Customer', 2, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (4, 'Kalkulator Index Harga', 'index-price', 'smartphone', 'Kalkulator Index Harga', 2, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (6, 'Todo List Order', 'production/todo-list', 'list', 'Todo List Order', 5, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (7, 'SPK', 'production/spk', 'clipboard', 'SPK', 5, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (8, 'Monitoring', 'production/monitoring', 'eye', 'Monitoring', 5, 3, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (1, 'Dashboard', 'dashboard', 'fa fa-pie-chart fa-lg', 'Dashboard', NULL, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (28, 'Settings', '', 'fa fa-cog fa-lg', 'Settings', NULL, 9, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (25, 'User Management', NULL, 'fa fa-user fa-lg
', 'User Management', NULL, 8, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (2, 'Sales Order', NULL, 'fa fa-shopping-bag fa-lg', 'Menu Sales Order', NULL, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (14, 'Pengadaan', NULL, 'fa fa-shopping-cart fa-lg', 'Pengadaan', NULL, 5, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (10, 'Gudang', NULL, 'fa fa-truck fa-lg', 'Gudang', NULL, 4, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (5, 'Produksi', NULL, 'fa fa-industry fa-lg', 'Produksi', NULL, 3, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (17, 'Keuangan', NULL, 'fa fa-money fa-lg', 'Keuangan', NULL, 6, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (19, 'Master Data', NULL, 'fa fa-database fa-lg', 'Master', NULL, 7, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (13, 'Stok Raw Material', 'warehouse/raw-materials', 'bx bxs-dashboard', 'Raw Material', 14, 3, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (26, 'Users', 'user-management/users', '', 'Users', 25, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (27, 'Roles', 'user-management/roles', 'bx bxs-dashboard', 'Roles', 25, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (29, 'Backup Database', 'settings/backup', 'bx bxs-dashboard', 'Backup Database', 28, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (20, 'Barang', 'master/goods', 'bx bxs-dashboard', 'Barang', 19, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (21, 'Customer', 'master/customers', 'bx bxs-dashboard', 'Customer', 19, 2, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (22, 'Supplier', 'master/suppliers', 'bx bxs-dashboard', 'Supplier', 19, 3, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (23, 'Material', 'master/materials', 'bx bxs-dashboard', 'Material', 19, 4, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (24, 'Substances', 'master/substances', 'bx bxs-dashboard', 'Substances', 19, 5, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (30, 'Progress Individu', 'production/progress-individu', NULL, 'Progres Individu', 5, 4, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (9, 'Pemakaian Kertas', 'production/material-used', 'activity', 'Pemakaian Kertas', 5, 5, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (18, 'Faktur', 'finance/invoice', 'bx bxs-dashboard', 'Invoice', 17, 1, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (31, 'Laporan', 'procurement/report', NULL, 'Laporan Pengadaan', 14, 4, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (32, 'Laporan', 'warehouse/report', NULL, 'Laporan Pengiriman', 10, 3, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (33, 'Laporan', 'sales-order/reports/index', NULL, 'Laporan Penjualan', 2, 3, NULL, 0, 1, NULL, NULL);
INSERT INTO "public"."app_menus" VALUES (34, 'Laporan', 'production/report', NULL, 'Laporan Produksi', 5, 6, NULL, 0, 1, NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS "public"."failed_jobs";
CREATE TABLE "public"."failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "uuid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "public"."migrations";
CREATE TABLE "public"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "public"."migrations" VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO "public"."migrations" VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO "public"."migrations" VALUES (3, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO "public"."migrations" VALUES (4, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO "public"."migrations" VALUES (5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_reset_tokens";
CREATE TABLE "public"."password_reset_tokens" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS "public"."password_resets";
CREATE TABLE "public"."password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS "public"."personal_access_tokens";
CREATE TABLE "public"."personal_access_tokens" (
  "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
  "tokenable_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tokenable_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "abilities" text COLLATE "pg_catalog"."default",
  "last_used_at" timestamp(0),
  "expires_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" int8 NOT NULL DEFAULT nextval('role_id_seq'::regclass),
  "name" varchar(225) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "default_menus" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO "public"."roles" VALUES (4, 'Staff Gudang', '2024-02-26 04:24:39', 'ALI', NULL, NULL, NULL);
INSERT INTO "public"."roles" VALUES (3, 'Staff Sales', '2024-02-26 04:24:27', 'ALI', NULL, NULL, NULL);
INSERT INTO "public"."roles" VALUES (1, 'Admin', '2024-02-16 02:27:48', 'ALI', '2024-04-04 15:39:00', 'ADMIN', '1,3,4,6,7,8,9,11,12,13,15,16,18,20,21,22,23,24,26,27,29');
INSERT INTO "public"."roles" VALUES (2, 'Staff Produksi', '2024-02-20 12:24:20', 'ALI', '2024-04-04 15:57:09', 'ADMIN', '1,6,7,8');
INSERT INTO "public"."roles" VALUES (5, 'Staff Finance', '2024-03-06 12:50:08', 'ALI', NULL, NULL, NULL);
INSERT INTO "public"."roles" VALUES (6, 'Staff Pengadaan', '2024-03-06 12:50:17', 'ALI', NULL, NULL, NULL);
INSERT INTO "public"."roles" VALUES (7, 'Operator', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "username" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "role_id" int4,
  "status" int2,
  "last_login" timestamp(6),
  "display_name" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (2, 'admin', 'loki@unisoft.com', NULL, '$2y$10$P/C9.zlJcuGWwDhUI5dMa.WfCFJqqL3Aopwa8C6IDt1BHO2vt7y3i', NULL, '2023-12-20 19:23:37', '2023-12-20 19:23:37', 1, 1, '2024-02-20 18:26:23', 'Admin');
INSERT INTO "public"."users" VALUES (8, 'ali', 'ali@bimeta.com', NULL, '$2y$12$Qdk4ZQXDq6s9LF1r4JzVB.7Bhi7uDppBuIdHS91w2Jn9Lo94n4NIS', NULL, '2024-04-19 19:07:19', NULL, 2, 1, NULL, 'Ali');
INSERT INTO "public"."users" VALUES (9, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$12$sCg718IcG7LAjFstn7oqNOTj3sLJ2h0o7kMnv0hWxiiWSALAz7CDu', NULL, '2024-04-19 19:21:39', NULL, 2, 1, NULL, 'Ahmad');
INSERT INTO "public"."users" VALUES (10, 'ghofar', 'ghofar@gmail.com', NULL, '$2y$12$b/Avk9ar4pPX0U3quEYomeKrDnzS7e/lyY9SNN0uQ3PiWLSv1lPpC', NULL, '2024-04-19 19:22:00', NULL, 2, 1, NULL, 'Ghofar');
INSERT INTO "public"."users" VALUES (11, 'deden', 'deden@gmail.com', NULL, '$2y$12$gbb04NCYcOQeLYjmMT0eS.OgG6sKkYPtNZoo.5I9lTxOyLPTAFpn2', NULL, '2024-04-19 19:22:18', NULL, 2, 1, NULL, 'Deden');
INSERT INTO "public"."users" VALUES (12, 'yati', 'yati@gmail.com', NULL, '$2y$12$jurLerZ6lv9bNKu0nKcnnekjDxaX4lzbIPlUD7zynYNVPr7afKfW6', NULL, '2024-04-19 19:22:42', NULL, 2, 1, NULL, 'Yati');
INSERT INTO "public"."users" VALUES (13, 'elis', 'elis@gmail.com', NULL, '$2y$12$pcukJVt7.0vLXI5Y3srUmOvztlmJNlt0uUeNwipqOu.YBD2wRfIdK', NULL, '2024-04-19 19:23:16', NULL, 2, 1, NULL, 'Elis');
INSERT INTO "public"."users" VALUES (14, 'lucy', 'lucy@gmail.com', NULL, '$2y$12$EGTOqpB1dwlt0DJpEo6dZedDiN5OFwamNfFMWUIYdzic0EokCdqCe', NULL, '2024-04-19 19:23:51', NULL, 4, 1, NULL, 'Lucy');
INSERT INTO "public"."users" VALUES (15, 'puri', 'puri@gmail.com', NULL, '$2y$12$JVWfj5gpqwCJ5Sd6O7wSV.seFX6YH1k07y/PryxuX048.4eK3mDdu', NULL, '2024-04-19 19:24:13', NULL, 4, 1, NULL, 'Puri');
INSERT INTO "public"."users" VALUES (16, 'agus', 'agus@gmail.com', NULL, '$2y$12$eFkVhkwkwZBEr5jfH3CfN.nLBEfVjM2Z/YrEZIDPlfSZ5azDpphJq', NULL, '2024-04-19 19:24:48', NULL, 3, 1, NULL, 'Agus');
INSERT INTO "public"."users" VALUES (17, 'dhani', 'dhani@gmail.com', NULL, '$2y$12$24vVBdifTzGwnL4LoSzNYejL3HsYtUtahxUKCMDsgdun1YAY3vx72', NULL, '2024-04-19 19:25:05', NULL, 3, 1, NULL, 'Dhani');
INSERT INTO "public"."users" VALUES (18, 'yongki', 'yongki@gmail.com', NULL, '$2y$12$Gy23jfmhczb.UlQjQa6ZWO/IyUly8WLGNkvlijI6GNI7wWT/VZU52', NULL, '2024-04-19 19:25:31', NULL, 5, 1, NULL, 'Yongki');
INSERT INTO "public"."users" VALUES (19, 'yuli', 'yuli@gmail.com', NULL, '$2y$12$tasRXJ7I0OrjL3.nI7ghk.Q0bo1xJkz.LaYB5lI1SB8MubJUUauCq', NULL, '2024-04-19 19:26:00', NULL, 5, 1, NULL, 'Yuli');
INSERT INTO "public"."users" VALUES (20, 'opr', 'opr@gmail.com', NULL, '$2y$12$fS7BAs9IW4uYx8jB8/1zvu5wBPyTVurFS2PBwwIGphi/SJ9t7vUu2', NULL, '2024-05-15 14:28:55', NULL, 7, 1, NULL, 'Operator Pengiriman');
INSERT INTO "public"."users" VALUES (21, 'test.user', 'test.user@gmail.com', NULL, '$2y$12$HmK7aTGXakdqm1NIclCifOMx5U/L3dbAQTnH/UlMimxc3GZtZ.k0.', NULL, '2024-05-20 03:51:42', NULL, 6, 1, NULL, 'Test User');

-- ----------------------------
-- Table structure for users_privilege
-- ----------------------------
DROP TABLE IF EXISTS "public"."users_privilege";
CREATE TABLE "public"."users_privilege" (
  "id" int8 NOT NULL DEFAULT nextval('users_privilege_id_seq'::regclass),
  "user_id" int4 NOT NULL,
  "app_menu_id" int4 NOT NULL,
  "permission" varchar(191) COLLATE "pg_catalog"."default",
  "status" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of users_privilege
-- ----------------------------
INSERT INTO "public"."users_privilege" VALUES (1146, 14, 1, NULL, 1, '2024-04-19 19:26:54', NULL);
INSERT INTO "public"."users_privilege" VALUES (1147, 14, 3, NULL, 1, '2024-04-19 19:26:54', NULL);
INSERT INTO "public"."users_privilege" VALUES (1148, 14, 11, NULL, 1, '2024-04-19 19:26:54', NULL);
INSERT INTO "public"."users_privilege" VALUES (1149, 14, 12, NULL, 1, '2024-04-19 19:26:54', NULL);
INSERT INTO "public"."users_privilege" VALUES (1150, 14, 20, NULL, 1, '2024-04-19 19:26:54', NULL);
INSERT INTO "public"."users_privilege" VALUES (1151, 14, 21, NULL, 1, '2024-04-19 19:26:54', NULL);
INSERT INTO "public"."users_privilege" VALUES (1267, 8, 1, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1268, 8, 3, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1269, 8, 4, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1270, 8, 33, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1271, 8, 6, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1272, 8, 7, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1273, 8, 8, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1274, 8, 30, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1275, 8, 9, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1276, 8, 34, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1277, 8, 11, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1278, 8, 12, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1279, 8, 32, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1280, 8, 15, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1281, 8, 16, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1174, 2, 1, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1175, 2, 3, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1176, 2, 4, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1177, 2, 6, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1178, 2, 7, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1179, 2, 8, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1180, 2, 9, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1181, 2, 11, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1182, 2, 12, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1183, 2, 15, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1184, 2, 16, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1185, 2, 13, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1186, 2, 18, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1187, 2, 20, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1188, 2, 21, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1189, 2, 22, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1190, 2, 23, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1191, 2, 24, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1192, 2, 26, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1193, 2, 27, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1194, 2, 29, NULL, 1, '2024-05-15 14:24:13', NULL);
INSERT INTO "public"."users_privilege" VALUES (1282, 8, 13, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1283, 8, 31, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1284, 8, 18, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1285, 8, 20, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1286, 8, 21, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1287, 8, 22, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1288, 8, 23, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1289, 8, 24, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1290, 8, 26, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1291, 8, 27, NULL, 1, '2024-06-22 04:40:02', NULL);
INSERT INTO "public"."users_privilege" VALUES (1292, 8, 29, NULL, 1, '2024-06-22 04:40:02', NULL);

-- ----------------------------
-- Function structure for _generate_menus
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."_generate_menus"("var_user_id" int8);
CREATE OR REPLACE FUNCTION "public"."_generate_menus"("var_user_id" int8)
  RETURNS TABLE("id" int8, "title" varchar, "url" varchar, "icon" text, "description" varchar, "sub_menu" text, "is_checked" int4, "is_shortcut" int4) AS $BODY$ 
          BEGIN
            RETURN QUERY 
            SELECT
							tbl."id",
							tbl.title,
							tbl.url,
							tbl.icon :: TEXT,
							tbl.description,
							sub."sub_menu" :: TEXT,
							CASE 
								WHEN COALESCE(sub."menu_checked",0) > 0 THEN
								1 
								ELSE 
								COALESCE(usr_priv."status",0)
							END AS "is_checked",
							tbl.is_shortcut 
						FROM
							"public".app_menus tbl
							LEFT JOIN (
							SELECT
								menus."app_menu_id",
								SUM(usr_priv."status") as "menu_checked",
								json_agg (
									json_build_object (
										'id',
										menus."id",
										'title',
										menus."title",
										'url',
										menus."url",
										'icon',
										menus."icon",
										'description',
										menus."description",
										'order',
										menus."order",
										'is_checked',
										COALESCE ( usr_priv."status", 0 ) 
									) 
								ORDER BY
									( menus."order" ) 
								) AS "sub_menu" 
							FROM
								"public".app_menus menus
								LEFT JOIN "public"."users_privilege" usr_priv ON menus.ID = usr_priv.app_menu_id 
								AND usr_priv."user_id" = "var_user_id"
							WHERE
								menus.app_menu_id IS NOT NULL 
							GROUP BY
								menus."app_menu_id" 
							) sub ON tbl."id" = sub."app_menu_id" 
							AND tbl."is_shortcut" != 1
							LEFT JOIN "public"."users_privilege" usr_priv ON tbl.ID = usr_priv.app_menu_id 
							AND usr_priv."user_id" = "var_user_id"
						WHERE
							tbl.app_menu_id IS NULL 
							AND tbl.is_active = 1 
						ORDER BY
							tbl."order";
          END;
         $BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;

-- ----------------------------
-- Function structure for _generate_role_menus
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."_generate_role_menus"();
CREATE OR REPLACE FUNCTION "public"."_generate_role_menus"()
  RETURNS TABLE("id" int8, "title" varchar, "url" varchar, "icon" text, "description" varchar, "sub_menu" text, "is_shortcut" int4) AS $BODY$ 
          BEGIN
            RETURN QUERY 
            SELECT
							tbl."id",
							tbl.title,
							tbl.url,
							tbl.icon :: TEXT,
							tbl.description,
							sub."sub_menu" :: TEXT,
							tbl.is_shortcut 
						FROM
							"public".app_menus tbl
							LEFT JOIN (
							SELECT
								menus."app_menu_id",
								SUM(usr_priv."status") as "menu_checked",
								json_agg (
									json_build_object (
										'id',
										menus."id",
										'title',
										menus."title",
										'url',
										menus."url",
										'icon',
										menus."icon",
										'description',
										menus."description",
										'order',
										menus."order"
									) 
								ORDER BY
									( menus."order" ) 
								) AS "sub_menu" 
							FROM
								"public".app_menus menus
								LEFT JOIN "public"."users_privilege" usr_priv ON menus.ID = usr_priv.app_menu_id 
							WHERE
								menus.app_menu_id IS NOT NULL 
							GROUP BY
								menus."app_menu_id" 
							) sub ON tbl."id" = sub."app_menu_id" 
							AND tbl."is_shortcut" != 1
							LEFT JOIN "public"."users_privilege" usr_priv ON tbl.ID = usr_priv.app_menu_id 
						WHERE
							tbl.app_menu_id IS NULL 
							AND tbl.is_active = 1 
						ORDER BY
							tbl."order";
          END;
         $BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100
  ROWS 1000;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."app_menus_id_seq"
OWNED BY "public"."app_menus"."id";
SELECT setval('"public"."app_menus_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."failed_jobs_id_seq"
OWNED BY "public"."failed_jobs"."id";
SELECT setval('"public"."failed_jobs_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."migrations_id_seq"
OWNED BY "public"."migrations"."id";
SELECT setval('"public"."migrations_id_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."personal_access_tokens_id_seq"
OWNED BY "public"."personal_access_tokens"."id";
SELECT setval('"public"."personal_access_tokens_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"public"."role_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id";
SELECT setval('"public"."users_id_seq"', 21, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_privilege_id_seq"
OWNED BY "public"."users_privilege"."id";
SELECT setval('"public"."users_privilege_id_seq"', 1292, true);

-- ----------------------------
-- Primary Key structure for table app_menus
-- ----------------------------
ALTER TABLE "public"."app_menus" ADD CONSTRAINT "app_menus_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_uuid_unique" UNIQUE ("uuid");

-- ----------------------------
-- Primary Key structure for table failed_jobs
-- ----------------------------
ALTER TABLE "public"."failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "public"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table password_reset_tokens
-- ----------------------------
ALTER TABLE "public"."password_reset_tokens" ADD CONSTRAINT "password_reset_tokens_pkey" PRIMARY KEY ("email");

-- ----------------------------
-- Indexes structure for table password_resets
-- ----------------------------
CREATE INDEX "password_resets_email_index" ON "public"."password_resets" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Indexes structure for table personal_access_tokens
-- ----------------------------
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "public"."personal_access_tokens" USING btree (
  "tokenable_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "tokenable_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_token_unique" UNIQUE ("token");

-- ----------------------------
-- Primary Key structure for table personal_access_tokens
-- ----------------------------
ALTER TABLE "public"."personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table users_privilege
-- ----------------------------
ALTER TABLE "public"."users_privilege" ADD CONSTRAINT "users_privilege_pkey" PRIMARY KEY ("id");
