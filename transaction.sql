/*
 Navicat Premium Data Transfer

 Source Server         : bimeta
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : bimeta_clone
 Source Schema         : transaction

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 28/06/2024 00:31:11
*/


-- ----------------------------
-- Sequence structure for goods_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."goods_id_seq";
CREATE SEQUENCE "transaction"."goods_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for m_mapping_index_price_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."m_mapping_index_price_id_seq";
CREATE SEQUENCE "transaction"."m_mapping_index_price_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for purchase_order_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."purchase_order_seq";
CREATE SEQUENCE "transaction"."purchase_order_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for roll_code_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."roll_code_seq";
CREATE SEQUENCE "transaction"."roll_code_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for so_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."so_numbering_seq";
CREATE SEQUENCE "transaction"."so_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for spk_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."spk_numbering_seq";
CREATE SEQUENCE "transaction"."spk_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_delivery_attachments_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_delivery_attachments_id_seq";
CREATE SEQUENCE "transaction"."t_delivery_attachments_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_delivery_order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_delivery_order_id_seq";
CREATE SEQUENCE "transaction"."t_delivery_order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_delivery_order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_delivery_order_id_seq";
CREATE SEQUENCE "transaction"."t_detail_delivery_order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_goods_receive_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_goods_receive_id_seq";
CREATE SEQUENCE "transaction"."t_detail_goods_receive_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_invoice_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_invoice_id_seq";
CREATE SEQUENCE "transaction"."t_detail_invoice_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_material_used_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_material_used_id_seq";
CREATE SEQUENCE "transaction"."t_detail_material_used_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_progress_individu_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_progress_individu_id_seq";
CREATE SEQUENCE "transaction"."t_detail_progress_individu_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_purchase_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_purchase_id_seq";
CREATE SEQUENCE "transaction"."t_detail_purchase_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_sales_order_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_sales_order_id_seq";
CREATE SEQUENCE "transaction"."t_detail_sales_order_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_detail_sales_order_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_detail_sales_order_seq";
CREATE SEQUENCE "transaction"."t_detail_sales_order_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_goods_receive_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_goods_receive_id_seq";
CREATE SEQUENCE "transaction"."t_goods_receive_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_invoice_b_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_invoice_b_seq";
CREATE SEQUENCE "transaction"."t_invoice_b_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_invoice_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_invoice_id_seq";
CREATE SEQUENCE "transaction"."t_invoice_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_invoice_k_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_invoice_k_seq";
CREATE SEQUENCE "transaction"."t_invoice_k_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_invoice_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_invoice_numbering_seq";
CREATE SEQUENCE "transaction"."t_invoice_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_mapping_index_price_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_mapping_index_price_seq";
CREATE SEQUENCE "transaction"."t_mapping_index_price_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_material_used_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_material_used_id_seq";
CREATE SEQUENCE "transaction"."t_material_used_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_production_process_item_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_production_process_item_id_seq";
CREATE SEQUENCE "transaction"."t_production_process_item_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_progress_individu_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_progress_individu_id_seq";
CREATE SEQUENCE "transaction"."t_progress_individu_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_purchase_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_purchase_id_seq";
CREATE SEQUENCE "transaction"."t_purchase_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_sales_order_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_sales_order_seq";
CREATE SEQUENCE "transaction"."t_sales_order_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_spk_production_process_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_spk_production_process_id_seq";
CREATE SEQUENCE "transaction"."t_spk_production_process_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_spk_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_spk_seq";
CREATE SEQUENCE "transaction"."t_spk_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_stock_finish_goods_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_stock_finish_goods_id_seq";
CREATE SEQUENCE "transaction"."t_stock_finish_goods_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for t_stock_raw_material_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."t_stock_raw_material_id_seq";
CREATE SEQUENCE "transaction"."t_stock_raw_material_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for travel_permit_numbering_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "transaction"."travel_permit_numbering_seq";
CREATE SEQUENCE "transaction"."travel_permit_numbering_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for date
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."date";
CREATE TABLE "transaction"."date" (
  "to_char" text COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of date
-- ----------------------------
INSERT INTO "transaction"."date" VALUES ('240620');

-- ----------------------------
-- Table structure for t_delivery_attachments
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_delivery_attachments";
CREATE TABLE "transaction"."t_delivery_attachments" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_delivery_attachments_id_seq'::regclass),
  "delivery_order_id" int4,
  "col_1" varchar(255) COLLATE "pg_catalog"."default",
  "col_2" varchar(255) COLLATE "pg_catalog"."default",
  "col_3" varchar(255) COLLATE "pg_catalog"."default",
  "col_4" varchar(255) COLLATE "pg_catalog"."default",
  "col_5" varchar(50) COLLATE "pg_catalog"."default",
  "col_6" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_delivery_attachments
-- ----------------------------

-- ----------------------------
-- Table structure for t_delivery_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_delivery_order";
CREATE TABLE "transaction"."t_delivery_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_delivery_order_id_seq'::regclass),
  "sales_order_id" int4,
  "travel_permit_no" varchar(255) COLLATE "pg_catalog"."default",
  "delivery_date" date,
  "licence_plate" varchar(255) COLLATE "pg_catalog"."default",
  "driver_name" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar COLLATE "pg_catalog"."default",
  "status" int2,
  "flag_use_attachments" int2 DEFAULT 0
)
;

-- ----------------------------
-- Records of t_delivery_order
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_delivery_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_delivery_order";
CREATE TABLE "transaction"."t_detail_delivery_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_delivery_order_id_seq'::regclass),
  "detail_sales_order_id" int4,
  "quantity" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "delivery_order_id" int4
)
;

-- ----------------------------
-- Records of t_detail_delivery_order
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_goods_receive
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_goods_receive";
CREATE TABLE "transaction"."t_detail_goods_receive" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_goods_receive_id_seq'::regclass),
  "goods_receive_id" int4,
  "detail_purchase_id" int4,
  "diameter" int2,
  "weight" float8,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_ by" varchar(255) COLLATE "pg_catalog"."default",
  "no_roll" varchar(255) COLLATE "pg_catalog"."default",
  "remarks" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_goods_receive
-- ----------------------------
INSERT INTO "transaction"."t_detail_goods_receive" VALUES (67, 30, 53, NULL, 1090, '2024-06-25 13:18:17', NULL, NULL, NULL, 'ABC1', NULL);
INSERT INTO "transaction"."t_detail_goods_receive" VALUES (68, 30, 53, NULL, 980, '2024-06-25 13:18:17', NULL, NULL, NULL, 'ABC2', NULL);

-- ----------------------------
-- Table structure for t_detail_invoice
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_invoice";
CREATE TABLE "transaction"."t_detail_invoice" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_invoice_id_seq'::regclass),
  "delivery_order_id" int4,
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "invoice_id" int4
)
;

-- ----------------------------
-- Records of t_detail_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_material_used
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_material_used";
CREATE TABLE "transaction"."t_detail_material_used" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_material_used_id_seq'::regclass),
  "material_used_id" int4,
  "material_id" int4,
  "quantity_used" numeric(10,0),
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "machine_no" int4,
  "initial_quantity" int4,
  "remaining_quantity" int4
)
;

-- ----------------------------
-- Records of t_detail_material_used
-- ----------------------------
INSERT INTO "transaction"."t_detail_material_used" VALUES (18, 13, 86, 200, '2024-06-22 04:59:36', NULL, NULL, NULL, 0, NULL, NULL);
INSERT INTO "transaction"."t_detail_material_used" VALUES (20, 13, 93, 400, '2024-06-23 12:52:20', NULL, NULL, NULL, 1, 495, 95);
INSERT INTO "transaction"."t_detail_material_used" VALUES (21, 13, 181, 500, '2024-06-25 12:42:58', NULL, NULL, NULL, 2, 875, 375);

-- ----------------------------
-- Table structure for t_detail_production_process_item
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_production_process_item";
CREATE TABLE "transaction"."t_detail_production_process_item" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_spk_production_process_id_seq'::regclass),
  "production_process_item_id" int4,
  "date" date,
  "operator" varchar(225) COLLATE "pg_catalog"."default",
  "result" int4,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" date,
  "status" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_production_process_item
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_progress_individu
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_progress_individu";
CREATE TABLE "transaction"."t_detail_progress_individu" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_progress_individu_id_seq'::regclass),
  "progress_individu_id" int4,
  "spk_id" int4,
  "result" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "process_id" int4
)
;

-- ----------------------------
-- Records of t_detail_progress_individu
-- ----------------------------

-- ----------------------------
-- Table structure for t_detail_purchase
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_purchase";
CREATE TABLE "transaction"."t_detail_purchase" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_purchase_id_seq'::regclass),
  "purchase_id" int4,
  "material_id" int2,
  "quantity" int2,
  "price" numeric(10,2),
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "width" int2,
  "weight" int2,
  "measure_unit" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_detail_purchase
-- ----------------------------
INSERT INTO "transaction"."t_detail_purchase" VALUES (53, 25, 266, 2, 4500.00, '2024-06-25 13:10:58', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_detail_sales_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_detail_sales_order";
CREATE TABLE "transaction"."t_detail_sales_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_detail_sales_order_id_seq'::regclass),
  "sales_order_id" int4,
  "quantity" int4,
  "flag_print" int4,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "goods_id" int4,
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "price" numeric(10,2)
)
;

-- ----------------------------
-- Records of t_detail_sales_order
-- ----------------------------

-- ----------------------------
-- Table structure for t_goods_receive
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_goods_receive";
CREATE TABLE "transaction"."t_goods_receive" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_goods_receive_id_seq'::regclass),
  "purchase_id" int4,
  "gr_no" varchar(255) COLLATE "pg_catalog"."default",
  "date" date,
  "receiver" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_goods_receive
-- ----------------------------
INSERT INTO "transaction"."t_goods_receive" VALUES (30, 25, 'SJ-00023222', '2024-06-25', 'ELIS', 2, '2024-06-25 13:17:38', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_invoice
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_invoice";
CREATE TABLE "transaction"."t_invoice" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_invoice_id_seq'::regclass),
  "invoice_no" varchar(50) COLLATE "pg_catalog"."default",
  "customer_id" int4,
  "date" date,
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "due_date" date,
  "down_payment" numeric(10,2),
  "alt_invoice_no" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for t_mapping_index_price
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_mapping_index_price";
CREATE TABLE "transaction"."t_mapping_index_price" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_mapping_index_price_seq'::regclass),
  "ply_type" varchar(255) COLLATE "pg_catalog"."default",
  "flute_type" varchar(255) COLLATE "pg_catalog"."default",
  "substance_id" int4,
  "price" numeric(10,1),
  "tag" date,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_mapping_index_price
-- ----------------------------
INSERT INTO "transaction"."t_mapping_index_price" VALUES (107, 'SF', 'B', 68, 3226.6, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (36, 'SW', 'B', 40, 5348.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (37, 'SW', 'B', 39, 6180.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (38, 'SW', 'B', 47, 5747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (39, 'SW', 'B', 45, 6578.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (40, 'SW', 'B', 46, 6976.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (41, 'SW', 'B', 61, 6587.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (42, 'SW', 'B', 58, 7418.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (43, 'SW', 'B', 59, 7816.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (44, 'SW', 'B', 60, 8656.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (45, 'SW', 'B', 55, 5747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (46, 'SW', 'B', 53, 6975.9, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (47, 'SW', 'B', 52, 6577.8, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (48, 'DW', 'B', 37, 7744.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (49, 'DW', 'B', 42, 8575.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (50, 'DW', 'B', 41, 9406.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (51, 'DW', 'B', 50, 8973.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (52, 'DW', 'B', 48, 9804.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (53, 'DW', 'B', 49, 10203.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (54, 'DW', 'B', 65, 9813.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (55, 'DW', 'B', 62, 10644.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (56, 'DW', 'B', 63, 11043.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (57, 'DW', 'B', 64, 11883.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (58, 'DW', 'B', 57, 8973.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (59, 'DW', 'B', 56, 10203.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (60, 'DW', 'B', 66, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (61, 'DW', 'B', 67, 15243.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (62, 'TW', 'B', 44, 11802.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (63, 'TW', 'B', 43, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (64, 'SF', 'B', 40, 3226.6, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (65, 'SF', 'B', 38, 4057.8, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (66, 'SF', 'B', 51, 4455.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (67, 'SW', 'E', 36, 4674.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (68, 'SW', 'E', 40, 5600.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (69, 'SW', 'E', 39, 6526.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (70, 'SF', 'E', 40, 3236.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (71, 'SF', 'E', 38, 4131.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (72, 'SF', 'E', 51, 4606.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (73, 'SW', 'E', 55, 6044.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (74, 'SW', 'E', 54, 7414.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (75, 'SW', 'E', 46, 7414.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (76, 'SW', 'E', 52, 6970.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (77, 'SW', 'E', 53, 7417.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (78, 'SW', 'B', 69, 4517.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (79, 'SW', 'B', 73, 4583.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (80, 'SW', 'B', 72, 4648.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (81, 'SW', 'B', 80, 4854.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (82, 'SW', 'B', 78, 4920.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (83, 'SW', 'B', 79, 5191.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (84, 'SW', 'B', 94, 5397.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (85, 'SW', 'B', 91, 5462.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (86, 'SW', 'B', 92, 5733.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (87, 'SW', 'B', 93, 6276.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (88, 'SW', 'B', 88, 5747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (89, 'SW', 'B', 86, 6975.9, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (90, 'SW', 'B', 85, 6812.2, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (91, 'DW', 'B', 70, 7744.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (92, 'DW', 'B', 75, 7809.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (93, 'DW', 'B', 74, 7875.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (94, 'DW', 'B', 83, 8081.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (95, 'DW', 'B', 81, 8146.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (96, 'DW', 'B', 82, 8418.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (97, 'DW', 'B', 98, 8623.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (98, 'DW', 'B', 95, 8689.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (99, 'DW', 'B', 96, 8960.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (100, 'DW', 'B', 97, 9503.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (101, 'DW', 'B', 90, 8973.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (102, 'DW', 'B', 89, 10203.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (103, 'DW', 'B', 99, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (104, 'DW', 'B', 67, 15243.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (105, 'TW', 'B', 77, 11036.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (106, 'TW', 'B', 76, 0.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (108, 'SF', 'B', 71, 3292.5, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (109, 'SF', 'B', 84, 4455.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (110, 'SW', 'E', 69, 4674.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (111, 'SW', 'E', 73, 4747.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (112, 'SW', 'B', 72, 4820.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (113, 'SF', 'E', 68, 3236.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (114, 'SF', 'E', 71, 3309.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (115, 'SF', 'E', 84, 4606.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (116, 'SW', 'E', 88, 6044.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (117, 'SW', 'E', 87, 7414.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (118, 'SW', 'E', 79, 5425.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (119, 'SW', 'E', 85, 6117.0, '2024-01-24', NULL, NULL, NULL, NULL);
INSERT INTO "transaction"."t_mapping_index_price" VALUES (120, 'SW', 'E', 86, 6419.0, '2024-01-24', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_material_used
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_material_used";
CREATE TABLE "transaction"."t_material_used" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_material_used_id_seq'::regclass),
  "date" date,
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "incharge" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_material_used
-- ----------------------------
INSERT INTO "transaction"."t_material_used" VALUES (13, '2024-06-22', '2024-06-22 04:58:26', NULL, NULL, NULL, 'ELIS');

-- ----------------------------
-- Table structure for t_production_process_item
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_production_process_item";
CREATE TABLE "transaction"."t_production_process_item" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_production_process_item_id_seq'::regclass),
  "spk_id" int4,
  "process_id" int2,
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2,
  "sequence_order" int2
)
;

-- ----------------------------
-- Records of t_production_process_item
-- ----------------------------

-- ----------------------------
-- Table structure for t_progress_individu
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_progress_individu";
CREATE TABLE "transaction"."t_progress_individu" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_progress_individu_id_seq'::regclass),
  "process_id" int4,
  "date" date,
  "operator" varchar(50) COLLATE "pg_catalog"."default",
  "team_leader" varchar(50) COLLATE "pg_catalog"."default",
  "shift_head" varchar(50) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_progress_individu
-- ----------------------------

-- ----------------------------
-- Table structure for t_purchase
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_purchase";
CREATE TABLE "transaction"."t_purchase" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_purchase_id_seq'::regclass),
  "supplier_id" int4,
  "date" date,
  "tax_type" varchar(255) COLLATE "pg_catalog"."default",
  "status" int2,
  "remarks" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "po_no" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_purchase
-- ----------------------------
INSERT INTO "transaction"."t_purchase" VALUES (25, 19, '2024-06-25', '1', 2, NULL, '2024-06-25 13:10:00', NULL, '2024-06-25 13:46:31', NULL, '000025-PO-BK-VI-2024');

-- ----------------------------
-- Table structure for t_sales_order
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_sales_order";
CREATE TABLE "transaction"."t_sales_order" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_sales_order_seq'::regclass),
  "transaction_no" varchar COLLATE "pg_catalog"."default",
  "ref_po_customer" varchar(50) COLLATE "pg_catalog"."default",
  "customer_id" int8,
  "order_date" date,
  "delivery_date" date,
  "tax_type" int4,
  "assign_to" int8,
  "status" int8,
  "attachment" text COLLATE "pg_catalog"."default",
  "remarks" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(255) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(255) COLLATE "pg_catalog"."default",
  "shipping_address" varchar(255) COLLATE "pg_catalog"."default",
  "attach_mime_type" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_sales_order
-- ----------------------------

-- ----------------------------
-- Table structure for t_spk
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_spk";
CREATE TABLE "transaction"."t_spk" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_spk_seq'::regclass),
  "detail_sales_order_id" int4,
  "spk_no" varchar(50) COLLATE "pg_catalog"."default",
  "start_date" date,
  "finish_date" date,
  "quantity" int4,
  "length" numeric(10,0),
  "width" numeric(10,0),
  "height" numeric(10,0),
  "l2" numeric(10,0),
  "p1" numeric(10,0),
  "l1" numeric(10,0),
  "p2" numeric(10,0),
  "t" numeric(10,0),
  "plape" numeric(10,0),
  "k" numeric(10,0),
  "netto_width" numeric(10,0),
  "netto_length" numeric(10,0),
  "bruto_width" numeric(10,0),
  "bruto_length" numeric(10,0),
  "sheet_quantity" int4,
  "flag_stitching" int2,
  "flag_glue" int2,
  "flag_pounch" int2,
  "status" int4,
  "current_process" varchar(50) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "persentage" numeric(10,0) DEFAULT 0,
  "specification" varchar(50) COLLATE "pg_catalog"."default",
  "spk_type" varchar(50) COLLATE "pg_catalog"."default",
  "flute_type" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_spk
-- ----------------------------

-- ----------------------------
-- Table structure for t_stock_finish_goods
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_stock_finish_goods";
CREATE TABLE "transaction"."t_stock_finish_goods" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_stock_finish_goods_id_seq'::regclass),
  "goods_id" int4,
  "quantity" int4,
  "created_at" timestamp(6),
  "created_by" varchar(6) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default",
  "source_from" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_stock_finish_goods
-- ----------------------------

-- ----------------------------
-- Table structure for t_stock_raw_material
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_stock_raw_material";
CREATE TABLE "transaction"."t_stock_raw_material" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_stock_raw_material_id_seq'::regclass),
  "material_id" int4,
  "width" numeric,
  "no_roll" varchar(50) COLLATE "pg_catalog"."default",
  "weight" numeric,
  "source_from" varchar(50) COLLATE "pg_catalog"."default",
  "created_at" timestamp(6),
  "created_by" varchar(50) COLLATE "pg_catalog"."default",
  "updated_at" timestamp(6),
  "updated_by" varchar(50) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of t_stock_raw_material
-- ----------------------------
INSERT INTO "transaction"."t_stock_raw_material" VALUES (154, 482, NULL, '240620WK150PB85-71', 622, 'Stok Opname', '2024-06-20 07:51:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (87, 242, NULL, '240620M125SIK85-4', 632, 'Stok Opname', '2024-06-20 03:01:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (88, 242, NULL, '240620M125SIK85-5', 613, 'Stok Opname', '2024-06-20 03:02:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (89, 242, NULL, '240620M125SIK85-6', 571, 'Stok Opname', '2024-06-20 03:02:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (90, 242, NULL, '240620M125SIK85-7', 584, 'Stok Opname', '2024-06-20 03:03:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (91, 322, NULL, '240620M125PK85-8', 708, 'Stok Opname', '2024-06-20 03:03:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (92, 322, NULL, '240620M125PK85-9', 719, 'Stok Opname', '2024-06-20 03:04:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (93, 243, NULL, '240620M125SIK90-10', 495, 'Stok Opname', '2024-06-20 03:06:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (94, 327, NULL, '240620M125PK110-11', 892, 'Stok Opname', '2024-06-20 03:07:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (95, 247, NULL, '240620M125SIK110-12', 778, 'Stok Opname', '2024-06-20 03:09:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (96, 247, NULL, '240620M125SIK110-13', 783, 'Stok Opname', '2024-06-20 03:10:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (99, 328, NULL, '240620M125PK115-16', 952, 'Stok Opname', '2024-06-20 03:13:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (100, 328, NULL, '240620M125PK115-17', 943, 'Stok Opname', '2024-06-20 03:13:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (101, 328, NULL, '240620M125PK115-18', 950, 'Stok Opname', '2024-06-20 03:14:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (102, 249, NULL, '240620M125SIK120-19', 875, 'Stok Opname', '2024-06-20 04:31:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (103, 330, NULL, '240620M125PK125-20', 1074, 'Stok Opname', '2024-06-20 04:35:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (104, 330, NULL, '240620M125PK125-21', 1006, 'Stok Opname', '2024-06-20 04:36:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (105, 330, NULL, '240620M125PK125-22', 1027, 'Stok Opname', '2024-06-20 04:36:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (106, 331, NULL, '240620M125PK130-23', 996, 'Stok Opname', '2024-06-20 04:37:04', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (107, 331, NULL, '240620M125PK130-24', 1051, 'Stok Opname', '2024-06-20 04:37:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (108, 713, NULL, '240620M125ESK120-25', 858, 'Stok Opname', '2024-06-20 05:06:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (109, 713, NULL, '240620M125ESK120-26', 875, 'Stok Opname', '2024-06-20 05:06:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (110, 714, NULL, '240620M125ESK125-27', 931, 'Stok Opname', '2024-06-20 05:07:04', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (111, 714, NULL, '240620M125ESK125-28', 927, 'Stok Opname', '2024-06-20 05:07:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (112, 714, NULL, '240620M125ESK125-29', 927, 'Stok Opname', '2024-06-20 05:08:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (113, 714, NULL, '240620M125ESK125-30', 915, 'Stok Opname', '2024-06-20 05:09:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (114, 715, NULL, '240620M125ESK130-31', 940, 'Stok Opname', '2024-06-20 05:09:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (115, 715, NULL, '240620M125ESK130-32', 931, 'Stok Opname', '2024-06-20 05:09:52', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (116, 718, NULL, '240620M125ESK145-33', 502, 'Stok Opname', '2024-06-20 05:10:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (117, 718, NULL, '240620M125ESK145-34', 1032, 'Stok Opname', '2024-06-20 05:11:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (155, 482, NULL, '240620WK150PB85-72', 585, 'Stok Opname', '2024-06-20 07:52:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (156, 706, NULL, '240620M125ESK85-73', 260, 'Stok Opname', '2024-06-20 07:52:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (97, 712, NULL, '240620M125ESK115-14', 928, 'Stok Opname', '2024-06-20 03:12:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (98, 712, NULL, '240620M125ESK115-15', 835, 'Stok Opname', '2024-06-20 03:12:40', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (118, 254, NULL, '240620M125SIK145-35', 421, 'Stok Opname', '2024-06-20 06:19:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (119, 718, NULL, '240620M125ESK145-36', 1043, 'Stok Opname', '2024-06-20 06:19:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (120, 254, NULL, '240620M125SIK145-37', 1011, 'Stok Opname', '2024-06-20 06:20:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (121, 254, NULL, '240620M125SIK145-38', 1083, 'Stok Opname', '2024-06-20 06:20:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (122, 254, NULL, '240620M125SIK145-39', 1180, 'Stok Opname', '2024-06-20 06:21:04', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (123, 254, NULL, '240620M125SIK145-40', 954, 'Stok Opname', '2024-06-20 06:21:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (124, 256, NULL, '240620M125SIK155-41', 1152, 'Stok Opname', '2024-06-20 06:21:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (125, 256, NULL, '240620M125SIK155-42', 1150, 'Stok Opname', '2024-06-20 06:22:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (126, 256, NULL, '240620M125SIK155-43', 1124, 'Stok Opname', '2024-06-20 06:22:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (127, 256, NULL, '240620M125SIK155-44', 1163, 'Stok Opname', '2024-06-20 06:22:50', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (128, 257, NULL, '240620M125SIK160-45', 1194, 'Stok Opname', '2024-06-20 06:23:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (129, 257, NULL, '240620M125SIK160-46', 1169, 'Stok Opname', '2024-06-20 06:23:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (157, 242, NULL, '240620M125SIK85-74', 291, 'Stok Opname', '2024-06-20 07:53:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (130, 644, NULL, '240620TL200SIK95-47', 216, 'Stok Opname', '2024-06-20 06:24:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (131, 835, NULL, '240620K275PC90-48', 629, 'Stok Opname', '2024-06-20 06:38:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (132, 848, NULL, '240620K275PC155-49', 1179, 'Stok Opname', '2024-06-20 06:39:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (133, 842, NULL, '240620K275PC125-50', 1039, 'Stok Opname', '2024-06-20 06:40:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (134, 835, NULL, '240620K275PC90-51', 661, 'Stok Opname', '2024-06-20 07:35:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (135, 834, NULL, '240620K275PC85-52', 633, 'Stok Opname', '2024-06-20 07:35:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (136, 838, NULL, '240620K275PC105-53', 731, 'Stok Opname', '2024-06-20 07:35:47', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (137, 849, NULL, '240620K275PC160-54', 1124, 'Stok Opname', '2024-06-20 07:36:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (138, 149, NULL, '240620K300PB100-55', 774, 'Stok Opname', '2024-06-20 07:37:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (139, 149, NULL, '240620K300PB100-56', 824, 'Stok Opname', '2024-06-20 07:38:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (140, 835, NULL, '240620K275PC90-57', 606, 'Stok Opname', '2024-06-20 07:39:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (141, 621, NULL, '240620TL125SIK140-58', 1063, 'Stok Opname', '2024-06-20 07:40:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (142, 621, NULL, '240620TL125SIK140-59', 685, 'Stok Opname', '2024-06-20 07:41:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (143, 552, NULL, '240620TL150PK115-60', 443, 'Stok Opname', '2024-06-20 07:42:06', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (144, 836, NULL, '240620K275PC95-61', 449, 'Stok Opname', '2024-06-20 07:42:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (145, 120, NULL, '240620K200PB115-62', 951, 'Stok Opname', '2024-06-20 07:43:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (146, 24, NULL, '240620K150PK115-63', 1024, 'Stok Opname', '2024-06-20 07:44:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (147, 166, NULL, '240620K125CIK105-64', 645, 'Stok Opname', '2024-06-20 07:44:47', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (148, 526, NULL, '240620TL125PK145-65', 1200, 'Stok Opname', '2024-06-20 07:45:13', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (149, 629, NULL, '240620TL150SIK100-66', 700, 'Stok Opname', '2024-06-20 07:49:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (150, 486, NULL, '240620WK154PB105-67', 660, 'Stok Opname', '2024-06-20 07:50:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (151, 486, NULL, '240620WK154PB105-68', 661, 'Stok Opname', '2024-06-20 07:50:28', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (152, 494, NULL, '240620WK162PB145-69', 1147, 'Stok Opname', '2024-06-20 07:50:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (153, 490, NULL, '240620WK158PB125-70', 925, 'Stok Opname', '2024-06-20 07:51:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (158, 244, NULL, '240620M125SIK95-75', 445, 'Stok Opname', '2024-06-20 07:53:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (159, 243, NULL, '240620M125SIK90-76', 250, 'Stok Opname', '2024-06-20 07:54:24', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (160, 712, NULL, '240620M125ESK115-77', 386, 'Stok Opname', '2024-06-20 07:55:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (161, 249, NULL, '240620M125SIK120-78', 330, 'Stok Opname', '2024-06-20 07:55:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (162, 713, NULL, '240620M125ESK120-79', 520, 'Stok Opname', '2024-06-20 07:55:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (163, 250, NULL, '240620M125SIK125-80', 663, 'Stok Opname', '2024-06-20 07:56:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (164, 714, NULL, '240620M125ESK125-81', 429, 'Stok Opname', '2024-06-20 07:57:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (165, 331, NULL, '240621M125PK130-82', 783, 'Stok Opname', '2024-06-21 01:13:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (166, 251, NULL, '240621M125SIK130-83', 357, 'Stok Opname', '2024-06-21 01:14:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (167, 716, NULL, '240621M125ESK135-84', 360, 'Stok Opname', '2024-06-21 01:14:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (168, 716, NULL, '240621M125ESK135-85', 411, 'Stok Opname', '2024-06-21 01:15:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (169, 715, NULL, '240621M125ESK130-86', 342, 'Stok Opname', '2024-06-21 01:15:45', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (170, 249, NULL, '240621M125SIK120-87', 802, 'Stok Opname', '2024-06-21 01:17:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (171, 847, NULL, '240621K275PC150-88', 1377, 'Stok Opname', '2024-06-21 01:18:21', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (172, 494, NULL, '240621WK162PB145-89', 1047, 'Stok Opname', '2024-06-21 01:19:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (173, 496, NULL, '240621WK164PB155-90', 1040, 'Stok Opname', '2024-06-21 01:19:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (174, 492, NULL, '240621WK160PB135-91', 1001, 'Stok Opname', '2024-06-21 01:19:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (175, 496, NULL, '240621WK164PB155-92', 1170, 'Stok Opname', '2024-06-21 01:20:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (176, 484, NULL, '240621WK152PB95-93', 644, 'Stok Opname', '2024-06-21 01:20:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (177, 490, NULL, '240621WK158PB125-94', 855, 'Stok Opname', '2024-06-21 01:21:13', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (178, 488, NULL, '240621WK156PB115-95', 772, 'Stok Opname', '2024-06-21 01:21:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (179, 482, NULL, '240621WK150PB85-96', 502, 'Stok Opname', '2024-06-21 01:22:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (180, 497, NULL, '240621WK165PB160-97', 1223, 'Stok Opname', '2024-06-21 01:22:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (181, 263, NULL, '240621M150SIK110-98', 875, 'Stok Opname', '2024-06-21 01:23:21', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (182, 263, NULL, '240621M150SIK110-99', 903, 'Stok Opname', '2024-06-21 01:23:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (183, 639, NULL, '240621TL150SIK150-100', 691, 'Stok Opname', '2024-06-21 01:24:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (184, 67, NULL, '240621K300PK90-101', 240, 'Stok Opname', '2024-06-21 01:24:47', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (185, 846, NULL, '240621K275PC145-102', 1037, 'Stok Opname', '2024-06-21 01:25:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (186, 849, NULL, '240621K275PC160-103', 1001, 'Stok Opname', '2024-06-21 01:25:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (187, 81, NULL, '240621K300PK160-104', 888, 'Stok Opname', '2024-06-21 01:26:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (188, 835, NULL, '240621K275PC90-105', 686, 'Stok Opname', '2024-06-21 01:26:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (189, 149, NULL, '240621K300PB100-106', 880, 'Stok Opname', '2024-06-21 01:27:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (190, 520, NULL, '240621TL125PK115-107', 372, 'Stok Opname', '2024-06-21 01:27:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (191, 614, NULL, '240621TL125SIK105-108', 425, 'Stok Opname', '2024-06-21 01:29:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (192, 536, NULL, '240621TL150PK115-109', 411, 'Stok Opname', '2024-06-21 01:30:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (193, 645, NULL, '240621TL150SIK100-110', 330, 'Stok Opname', '2024-06-21 01:30:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (194, 614, NULL, '240621TL125SIK105-111', 512, 'Stok Opname', '2024-06-21 01:31:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (195, 521, NULL, '240621TL125PK120-112', 311, 'Stok Opname', '2024-06-21 01:32:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (196, 519, NULL, '240621TL125PK110-113', 645, 'Stok Opname', '2024-06-21 01:32:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (197, 519, NULL, '240621TL125PK110-114', 311, 'Stok Opname', '2024-06-21 01:34:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (198, 519, NULL, '240621TL125PK110-115', 645, 'Stok Opname', '2024-06-21 01:35:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (199, 521, NULL, '240621TL125PK120-116', 310, 'Stok Opname', '2024-06-21 01:35:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (200, 629, NULL, '240621TL150SIK100-117', 453, 'Stok Opname', '2024-06-21 01:36:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (201, 632, NULL, '240621TL150SIK115-118', 513, 'Stok Opname', '2024-06-21 01:36:21', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (202, 634, NULL, '240621TL150SIK125-119', 424, 'Stok Opname', '2024-06-21 01:37:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (203, 631, NULL, '240621TL150SIK110-120', 331, 'Stok Opname', '2024-06-21 01:39:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (204, 525, NULL, '240621TL125PK140-121', 867, 'Stok Opname', '2024-06-21 01:39:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (205, 522, NULL, '240621TL125PK125-122', 683, 'Stok Opname', '2024-06-21 01:40:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (206, 522, NULL, '240621TL125PK125-123', 607, 'Stok Opname', '2024-06-21 01:40:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (207, 552, NULL, '240621TL150PK115-124', 397, 'Stok Opname', '2024-06-21 01:41:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (208, 33, NULL, '240621K150PK160-125', 601, 'Stok Opname', '2024-06-21 01:41:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (209, 157, NULL, '240621K300PB140-126', 721, 'Stok Opname', '2024-06-21 01:42:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (210, 815, NULL, '240621K150PC150-127', 521, 'Stok Opname', '2024-06-21 01:42:50', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (211, 23, NULL, '240621K150PK110-128', 432, 'Stok Opname', '2024-06-21 01:43:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (212, 24, NULL, '240621K150PK115-129', 1024, 'Stok Opname', '2024-06-21 01:43:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (213, 838, NULL, '240621K275PC105-130', 413, 'Stok Opname', '2024-06-21 01:44:40', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (214, 823, NULL, '240621K200PC110-131', 485, 'Stok Opname', '2024-06-21 01:44:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (215, 719, NULL, '240621M125ESK150-132', 280, 'Stok Opname', '2024-06-21 01:46:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (216, 626, NULL, '240621TL150SIK85-133', 148, 'Stok Opname', '2024-06-21 01:46:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (217, 496, NULL, '240621WK164PB155-134', 250, 'Stok Opname', '2024-06-21 01:46:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (218, 639, NULL, '240621TL150SIK150-135', 240, 'Stok Opname', '2024-06-21 01:47:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (219, 16, NULL, '240621K125PK155-136', 240, 'Stok Opname', '2024-06-21 01:48:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (220, 32, NULL, '240621K150PK155-137', 148, 'Stok Opname', '2024-06-21 01:48:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (221, 497, NULL, '240621WK165PB160-138', 453, 'Stok Opname', '2024-06-21 01:49:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (222, 523, NULL, '240621TL125PK130-139', 375, 'Stok Opname', '2024-06-21 01:49:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (223, 22, NULL, '240621K150PK105-140', 490, 'Stok Opname', '2024-06-21 01:49:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (224, 252, NULL, '240621M125SIK135-141', 157, 'Stok Opname', '2024-06-21 01:50:40', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (225, 251, NULL, '240621M125SIK130-142', 145, 'Stok Opname', '2024-06-21 01:51:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (226, 254, NULL, '240621M125SIK145-143', 300, 'Stok Opname', '2024-06-21 01:51:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (227, 9, NULL, '240621K125PK120-144', 694, 'Stok Opname', '2024-06-21 01:52:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (228, 522, NULL, '240621TL125PK125-145', 300, 'Stok Opname', '2024-06-21 01:52:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (229, 522, NULL, '240621TL125PK125-146', 256, 'Stok Opname', '2024-06-21 01:53:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (230, 521, NULL, '240621TL125PK120-147', 510, 'Stok Opname', '2024-06-21 01:53:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (231, 617, NULL, '240621TL125SIK120-148', 458, 'Stok Opname', '2024-06-21 01:54:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (232, 7, NULL, '240621K125PK110-149', 515, 'Stok Opname', '2024-06-21 01:54:32', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (233, 247, NULL, '240621M125SIK110-150', 811, 'Stok Opname', '2024-06-21 01:54:52', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (234, 247, NULL, '240621M125SIK110-151', 523, 'Stok Opname', '2024-06-21 01:55:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (235, 247, NULL, '240621M125SIK110-152', 633, 'Stok Opname', '2024-06-21 01:55:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (236, 247, NULL, '240621M125SIK110-153', 453, 'Stok Opname', '2024-06-21 01:56:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (237, 492, NULL, '240621WK160PB135-154', 905, 'Stok Opname', '2024-06-21 01:56:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (238, 482, NULL, '240621WK150PB85-155', 560, 'Stok Opname', '2024-06-21 01:57:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (239, 484, NULL, '240621WK152PB95-156', 694, 'Stok Opname', '2024-06-21 01:57:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (240, 483, NULL, '240621WK151PB90-157', 388, 'Stok Opname', '2024-06-21 01:57:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (241, 617, NULL, '240621TL125SIK120-158', 671, 'Stok Opname', '2024-06-21 02:05:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (242, 617, NULL, '240621TL125SIK120-159', 325, 'Stok Opname', '2024-06-21 02:05:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (245, 42, NULL, '240621K200PK125-162', 345, 'Stok Opname', '2024-06-21 04:05:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (246, 34, NULL, '240621K200PK85-163', 389, 'Stok Opname', '2024-06-21 04:05:45', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (247, 46, NULL, '240621K200PK145-164', 443, 'Stok Opname', '2024-06-21 04:06:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (248, 44, NULL, '240621K200PK135-165', 1162, 'Stok Opname', '2024-06-21 04:06:40', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (249, 44, NULL, '240621K200PK135-166', 1120, 'Stok Opname', '2024-06-21 04:07:04', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (250, 8, NULL, '240621K125PK115-167', 1119, 'Stok Opname', '2024-06-21 04:07:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (251, 42, NULL, '240621K200PK125-168', 1126, 'Stok Opname', '2024-06-21 04:08:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (252, 47, NULL, '240621K200PK150-169', 1383, 'Stok Opname', '2024-06-21 04:08:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (253, 49, NULL, '240621K200PK160-170', 1402, 'Stok Opname', '2024-06-21 04:09:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (254, 49, NULL, '240621K200PK160-171', 1459, 'Stok Opname', '2024-06-21 04:09:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (255, 49, NULL, '240621K200PK160-172', 1271, 'Stok Opname', '2024-06-21 04:10:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (256, 46, NULL, '240621K200PK145-173', 1200, 'Stok Opname', '2024-06-21 04:10:21', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (257, 47, NULL, '240621K200PK150-174', 1307, 'Stok Opname', '2024-06-21 04:10:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (258, 49, NULL, '240621K200PK160-175', 1513, 'Stok Opname', '2024-06-21 04:11:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (259, 824, NULL, '240621K200PC115-176', 1013, 'Stok Opname', '2024-06-21 04:11:40', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (260, 40, NULL, '240621K200PK115-177', 970, 'Stok Opname', '2024-06-21 04:11:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (261, 40, NULL, '240621K200PK115-178', 1091, 'Stok Opname', '2024-06-21 04:12:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (262, 40, NULL, '240621K200PK115-179', 1158, 'Stok Opname', '2024-06-21 04:12:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (263, 40, NULL, '240621K200PK115-180', 1065, 'Stok Opname', '2024-06-21 04:12:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (264, 39, NULL, '240621K200PK110-181', 1055, 'Stok Opname', '2024-06-21 04:13:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (265, 43, NULL, '240621K200PK130-182', 1181, 'Stok Opname', '2024-06-21 04:13:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (266, 40, NULL, '240621K200PK115-183', 1048, 'Stok Opname', '2024-06-21 04:14:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (267, 822, NULL, '240621K200PC105-184', 934, 'Stok Opname', '2024-06-21 04:14:28', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (268, 824, NULL, '240621K200PC115-185', 1126, 'Stok Opname', '2024-06-21 04:15:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (269, 823, NULL, '240621K200PC110-186', 776, 'Stok Opname', '2024-06-21 04:15:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (270, 41, NULL, '240621K200PK120-187', 1019, 'Stok Opname', '2024-06-21 04:15:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (271, 41, NULL, '240621K200PK120-188', 1132, 'Stok Opname', '2024-06-21 04:16:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (272, 41, NULL, '240621K200PK120-189', 1004, 'Stok Opname', '2024-06-21 04:16:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (273, 40, NULL, '240621K200PK115-190', 1020, 'Stok Opname', '2024-06-21 04:16:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (274, 40, NULL, '240621K200PK115-191', 1099, 'Stok Opname', '2024-06-21 04:17:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (275, 40, NULL, '240621K200PK115-192', 1083, 'Stok Opname', '2024-06-21 04:17:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (276, 41, NULL, '240621K200PK120-193', 955, 'Stok Opname', '2024-06-21 04:17:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (277, 821, NULL, '240621K200PC100-194', 842, 'Stok Opname', '2024-06-21 04:17:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (278, 822, NULL, '240621K200PC105-195', 978, 'Stok Opname', '2024-06-21 04:18:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (279, 824, NULL, '240621K200PC115-196', 1126, 'Stok Opname', '2024-06-21 04:18:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (280, 822, NULL, '240621K200PC105-197', 968, 'Stok Opname', '2024-06-21 04:19:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (281, 822, NULL, '240621K200PC105-198', 843, 'Stok Opname', '2024-06-21 04:19:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (282, 822, NULL, '240621K200PC105-199', 757, 'Stok Opname', '2024-06-21 04:19:47', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (283, 117, NULL, '240621K200PB100-200', 781, 'Stok Opname', '2024-06-21 04:20:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (284, 43, NULL, '240621K200PK130-201', 1161, 'Stok Opname', '2024-06-21 04:20:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (285, 43, NULL, '240621K200PK130-202', 1184, 'Stok Opname', '2024-06-21 04:21:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (286, 43, NULL, '240621K200PK130-203', 860, 'Stok Opname', '2024-06-21 04:21:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (287, 41, NULL, '240621K200PK120-204', 1170, 'Stok Opname', '2024-06-21 04:21:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (288, 47, NULL, '240621K200PK150-205', 1289, 'Stok Opname', '2024-06-21 04:22:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (289, 41, NULL, '240621K200PK120-206', 1031, 'Stok Opname', '2024-06-21 04:22:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (290, 40, NULL, '240621K200PK115-207', 1102, 'Stok Opname', '2024-06-21 04:22:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (291, 41, NULL, '240621K200PK120-208', 1048, 'Stok Opname', '2024-06-21 04:23:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (292, 40, NULL, '240621K200PK115-209', 1095, 'Stok Opname', '2024-06-21 04:23:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (293, 41, NULL, '240621K200PK120-210', 1004, 'Stok Opname', '2024-06-21 04:23:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (294, 38, NULL, '240621K200PK105-211', 1022, 'Stok Opname', '2024-06-21 04:24:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (295, 41, NULL, '240621K200PK120-212', 1019, 'Stok Opname', '2024-06-21 04:24:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (296, 40, NULL, '240621K200PK115-213', 1081, 'Stok Opname', '2024-06-21 04:24:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (297, 41, NULL, '240621K200PK120-214', 1170, 'Stok Opname', '2024-06-21 04:25:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (298, 40, NULL, '240621K200PK115-215', 1128, 'Stok Opname', '2024-06-21 04:26:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (299, 40, NULL, '240621K200PK115-216', 1100, 'Stok Opname', '2024-06-21 04:27:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (300, 41, NULL, '240621K200PK120-217', 1097, 'Stok Opname', '2024-06-21 04:28:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (301, 41, NULL, '240621K200PK120-218', 955, 'Stok Opname', '2024-06-21 04:28:24', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (302, 41, NULL, '240621K200PK120-219', 1170, 'Stok Opname', '2024-06-21 04:28:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (303, 40, NULL, '240621K200PK115-220', 1102, 'Stok Opname', '2024-06-21 04:29:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (304, 40, NULL, '240621K200PK115-221', 1039, 'Stok Opname', '2024-06-21 04:29:28', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (305, 39, NULL, '240621K200PK110-222', 981, 'Stok Opname', '2024-06-21 04:30:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (306, 39, NULL, '240621K200PK110-223', 971, 'Stok Opname', '2024-06-21 04:30:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (307, 47, NULL, '240621K200PK150-224', 1207, 'Stok Opname', '2024-06-21 04:31:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (308, 45, NULL, '240621K200PK140-225', 1351, 'Stok Opname', '2024-06-21 04:31:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (309, 40, NULL, '240621K200PK115-226', 1069, 'Stok Opname', '2024-06-21 04:31:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (310, 39, NULL, '240621K200PK110-227', 1022, 'Stok Opname', '2024-06-21 04:32:05', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (311, 41, NULL, '240621K200PK120-228', 1358, 'Stok Opname', '2024-06-21 04:32:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (312, 790, NULL, '240621K125PC105-229', 713, 'Stok Opname', '2024-06-21 04:32:50', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (313, 199, NULL, '240621K200CIK110-230', 968, 'Stok Opname', '2024-06-21 04:33:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (314, 38, NULL, '240621K200PK105-231', 1002, 'Stok Opname', '2024-06-21 04:33:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (315, 823, NULL, '240621K200PC110-232', 776, 'Stok Opname', '2024-06-21 04:34:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (316, 17, NULL, '240621K125PK160-233', 477, 'Stok Opname', '2024-06-21 04:35:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (317, 47, NULL, '240621K200PK150-234', 1415, 'Stok Opname', '2024-06-21 04:35:21', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (318, 47, NULL, '240621K200PK150-235', 1377, 'Stok Opname', '2024-06-21 04:35:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (319, 4, NULL, '240621K125PK95-236', 285, 'Stok Opname', '2024-06-21 04:36:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (320, 4, NULL, '240621K125PK95-237', 902, 'Stok Opname', '2024-06-21 04:36:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (321, 4, NULL, '240621K125PK95-238', 916, 'Stok Opname', '2024-06-21 04:36:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (322, 4, NULL, '240621K125PK95-239', 872, 'Stok Opname', '2024-06-21 04:37:06', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (323, 4, NULL, '240621K125PK95-240', 901, 'Stok Opname', '2024-06-21 05:43:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (324, 8, NULL, '240621K125PK115-241', 1046, 'Stok Opname', '2024-06-21 05:43:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (325, 9, NULL, '240621K125PK120-242', 1120, 'Stok Opname', '2024-06-21 05:44:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (326, 9, NULL, '240621K125PK120-243', 1048, 'Stok Opname', '2024-06-21 05:44:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (327, 7, NULL, '240621K125PK110-244', 884, 'Stok Opname', '2024-06-21 05:45:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (328, 9, NULL, '240621K125PK120-245', 1108, 'Stok Opname', '2024-06-21 05:45:45', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (329, 7, NULL, '240621K125PK110-246', 1010, 'Stok Opname', '2024-06-21 05:46:42', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (330, 9, NULL, '240621K125PK120-247', 1134, 'Stok Opname', '2024-06-21 05:47:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (333, 10, NULL, '240621K125PK125-250', 1078, 'Stok Opname', '2024-06-21 05:58:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (334, 10, NULL, '240621K125PK125-251', 1053, 'Stok Opname', '2024-06-21 05:59:03', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (335, 10, NULL, '240621K125PK125-252', 1088, 'Stok Opname', '2024-06-21 05:59:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (336, 10, NULL, '240621K125PK125-253', 1048, 'Stok Opname', '2024-06-21 05:59:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (337, 10, NULL, '240621K125PK125-254', 1232, 'Stok Opname', '2024-06-21 06:00:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (338, 10, NULL, '240621K125PK125-255', 1234, 'Stok Opname', '2024-06-21 06:00:24', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (339, 10, NULL, '240621K125PK125-256', 1238, 'Stok Opname', '2024-06-21 06:00:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (340, 10, NULL, '240621K125PK125-257', 701, 'Stok Opname', '2024-06-21 06:01:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (341, 10, NULL, '240621K125PK125-258', 1193, 'Stok Opname', '2024-06-21 06:01:28', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (342, 11, NULL, '240621K125PK130-259', 1162, 'Stok Opname', '2024-06-21 06:01:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (343, 11, NULL, '240621K125PK130-260', 1277, 'Stok Opname', '2024-06-21 06:02:13', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (344, 11, NULL, '240621K125PK130-261', 1222, 'Stok Opname', '2024-06-21 06:02:32', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (345, 11, NULL, '240621K125PK130-262', 1257, 'Stok Opname', '2024-06-21 06:03:05', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (346, 11, NULL, '240621K125PK130-263', 1181, 'Stok Opname', '2024-06-21 06:03:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (347, 10, NULL, '240621K125PK125-264', 1116, 'Stok Opname', '2024-06-21 06:03:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (348, 10, NULL, '240621K125PK125-265', 1158, 'Stok Opname', '2024-06-21 06:03:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (349, 10, NULL, '240621K125PK125-266', 1150, 'Stok Opname', '2024-06-21 06:04:42', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (350, 10, NULL, '240621K125PK125-267', 1172, 'Stok Opname', '2024-06-21 06:04:57', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (351, 11, NULL, '240621K125PK130-268', 1189, 'Stok Opname', '2024-06-21 06:05:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (352, 11, NULL, '240621K125PK130-269', 1218, 'Stok Opname', '2024-06-21 06:05:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (353, 11, NULL, '240621K125PK130-270', 1271, 'Stok Opname', '2024-06-21 06:05:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (354, 11, NULL, '240621K125PK130-271', 1192, 'Stok Opname', '2024-06-21 06:05:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (355, 11, NULL, '240621K125PK130-272', 1203, 'Stok Opname', '2024-06-21 06:07:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (356, 11, NULL, '240621K125PK130-273', 1139, 'Stok Opname', '2024-06-21 06:08:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (357, 11, NULL, '240621K125PK130-274', 1220, 'Stok Opname', '2024-06-21 06:08:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (358, 11, NULL, '240621K125PK130-275', 1224, 'Stok Opname', '2024-06-21 06:08:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (359, 10, NULL, '240621K125PK125-276', 1169, 'Stok Opname', '2024-06-21 06:09:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (360, 10, NULL, '240621K125PK125-277', 1182, 'Stok Opname', '2024-06-21 06:09:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (361, 10, NULL, '240621K125PK125-278', 1172, 'Stok Opname', '2024-06-21 06:10:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (362, 11, NULL, '240621K125PK130-279', 1132, 'Stok Opname', '2024-06-21 06:10:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (363, 11, NULL, '240621K125PK130-280', 1230, 'Stok Opname', '2024-06-21 06:10:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (364, 11, NULL, '240621K125PK130-281', 1206, 'Stok Opname', '2024-06-21 06:10:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (365, 11, NULL, '240621K125PK130-282', 1236, 'Stok Opname', '2024-06-21 06:11:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (366, 11, NULL, '240621K125PK130-283', 1239, 'Stok Opname', '2024-06-21 06:11:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (367, 11, NULL, '240621K125PK130-284', 1214, 'Stok Opname', '2024-06-21 06:12:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (368, 11, NULL, '240621K125PK130-285', 1220, 'Stok Opname', '2024-06-21 06:12:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (369, 11, NULL, '240621K125PK130-286', 1138, 'Stok Opname', '2024-06-21 06:12:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (370, 11, NULL, '240621K125PK130-287', 1280, 'Stok Opname', '2024-06-21 06:13:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (371, 11, NULL, '240621K125PK130-288', 1302, 'Stok Opname', '2024-06-21 06:13:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (372, 12, NULL, '240621K125PK135-289', 1224, 'Stok Opname', '2024-06-21 06:13:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (373, 12, NULL, '240621K125PK135-290', 1170, 'Stok Opname', '2024-06-21 06:14:06', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (374, 12, NULL, '240621K125PK135-291', 1189, 'Stok Opname', '2024-06-21 06:14:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (375, 12, NULL, '240621K125PK135-292', 1277, 'Stok Opname', '2024-06-21 06:14:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (376, 12, NULL, '240621K125PK135-293', 1194, 'Stok Opname', '2024-06-21 06:14:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (377, 11, NULL, '240621K125PK130-294', 1170, 'Stok Opname', '2024-06-21 06:15:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (378, 12, NULL, '240621K125PK135-295', 1281, 'Stok Opname', '2024-06-21 06:15:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (379, 12, NULL, '240621K125PK135-296', 1284, 'Stok Opname', '2024-06-21 06:16:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (380, 13, NULL, '240621K125PK140-297', 1021, 'Stok Opname', '2024-06-21 06:16:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (381, 13, NULL, '240621K125PK140-298', 1303, 'Stok Opname', '2024-06-21 12:42:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (382, 13, NULL, '240621K125PK140-299', 1324, 'Stok Opname', '2024-06-21 12:43:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (383, 14, NULL, '240621K125PK145-300', 1401, 'Stok Opname', '2024-06-21 12:43:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (384, 13, NULL, '240621K125PK140-301', 1321, 'Stok Opname', '2024-06-21 12:43:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (385, 11, NULL, '240621K125PK130-302', 1230, 'Stok Opname', '2024-06-21 12:44:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (386, 12, NULL, '240621K125PK135-303', 1212, 'Stok Opname', '2024-06-21 12:44:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (387, 12, NULL, '240621K125PK135-304', 1262, 'Stok Opname', '2024-06-21 12:44:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (388, 14, NULL, '240621K125PK145-305', 1302, 'Stok Opname', '2024-06-21 12:44:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (389, 12, NULL, '240621K125PK135-306', 714, 'Stok Opname', '2024-06-21 12:45:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (390, 15, NULL, '240621K125PK150-307', 751, 'Stok Opname', '2024-06-21 12:45:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (391, 17, NULL, '240621K125PK160-308', 842, 'Stok Opname', '2024-06-21 12:45:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (392, 14, NULL, '240621K125PK145-309', 1285, 'Stok Opname', '2024-06-21 12:46:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (393, 14, NULL, '240621K125PK145-310', 1217, 'Stok Opname', '2024-06-21 12:46:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (394, 14, NULL, '240621K125PK145-311', 1305, 'Stok Opname', '2024-06-21 12:46:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (395, 14, NULL, '240621K125PK145-312', 1312, 'Stok Opname', '2024-06-21 12:46:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (396, 14, NULL, '240621K125PK145-313', 1422, 'Stok Opname', '2024-06-21 12:47:18', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (397, 16, NULL, '240621K125PK155-314', 1376, 'Stok Opname', '2024-06-21 12:47:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (398, 14, NULL, '240621K125PK145-315', 1348, 'Stok Opname', '2024-06-21 12:48:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (399, 14, NULL, '240621K125PK145-316', 1379, 'Stok Opname', '2024-06-21 12:48:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (400, 14, NULL, '240621K125PK145-317', 1213, 'Stok Opname', '2024-06-21 12:48:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (401, 14, NULL, '240621K125PK145-318', 1292, 'Stok Opname', '2024-06-21 12:48:57', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (402, 14, NULL, '240621K125PK145-319', 1400, 'Stok Opname', '2024-06-21 12:49:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (403, 14, NULL, '240621K125PK145-320', 1311, 'Stok Opname', '2024-06-21 12:49:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (404, 13, NULL, '240621K125PK140-321', 1144, 'Stok Opname', '2024-06-21 12:49:42', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (405, 14, NULL, '240621K125PK145-322', 1301, 'Stok Opname', '2024-06-21 12:50:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (406, 14, NULL, '240621K125PK145-323', 1307, 'Stok Opname', '2024-06-21 12:50:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (407, 14, NULL, '240621K125PK145-324', 1305, 'Stok Opname', '2024-06-21 12:50:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (408, 14, NULL, '240621K125PK145-325', 1258, 'Stok Opname', '2024-06-21 12:50:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (409, 14, NULL, '240621K125PK145-326', 1380, 'Stok Opname', '2024-06-21 12:51:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (410, 14, NULL, '240621K125PK145-327', 1445, 'Stok Opname', '2024-06-21 12:51:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (411, 14, NULL, '240621K125PK145-328', 1467, 'Stok Opname', '2024-06-21 12:51:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (412, 14, NULL, '240621K125PK145-329', 1294, 'Stok Opname', '2024-06-21 12:51:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (413, 14, NULL, '240621K125PK145-330', 1257, 'Stok Opname', '2024-06-21 12:52:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (414, 14, NULL, '240621K125PK145-331', 1323, 'Stok Opname', '2024-06-21 12:52:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (415, 16, NULL, '240621K125PK155-332', 961, 'Stok Opname', '2024-06-21 12:52:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (416, 16, NULL, '240621K125PK155-333', 510, 'Stok Opname', '2024-06-21 12:53:13', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (417, 15, NULL, '240621K125PK150-334', 1424, 'Stok Opname', '2024-06-21 12:53:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (418, 14, NULL, '240621K125PK145-335', 1366, 'Stok Opname', '2024-06-21 12:53:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (419, 14, NULL, '240621K125PK145-336', 1440, 'Stok Opname', '2024-06-21 12:53:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (420, 14, NULL, '240621K125PK145-337', 1269, 'Stok Opname', '2024-06-21 12:54:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (421, 14, NULL, '240621K125PK145-338', 1286, 'Stok Opname', '2024-06-21 12:54:32', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (422, 14, NULL, '240621K125PK145-339', 1270, 'Stok Opname', '2024-06-21 12:54:47', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (423, 14, NULL, '240621K125PK145-340', 1208, 'Stok Opname', '2024-06-21 12:55:05', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (424, 16, NULL, '240621K125PK155-341', 1254, 'Stok Opname', '2024-06-21 12:55:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (425, 14, NULL, '240621K125PK145-342', 1293, 'Stok Opname', '2024-06-21 12:55:40', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (426, 16, NULL, '240621K125PK155-343', 1468, 'Stok Opname', '2024-06-21 12:56:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (427, 16, NULL, '240621K125PK155-344', 1338, 'Stok Opname', '2024-06-21 12:56:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (428, 16, NULL, '240621K125PK155-345', 1405, 'Stok Opname', '2024-06-21 12:56:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (429, 16, NULL, '240621K125PK155-346', 1419, 'Stok Opname', '2024-06-21 12:57:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (430, 16, NULL, '240621K125PK155-347', 1377, 'Stok Opname', '2024-06-21 12:57:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (431, 16, NULL, '240621K125PK155-348', 1595, 'Stok Opname', '2024-06-21 12:57:52', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (432, 16, NULL, '240621K125PK155-349', 1325, 'Stok Opname', '2024-06-21 12:58:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (433, 16, NULL, '240621K125PK155-350', 1446, 'Stok Opname', '2024-06-21 12:58:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (434, 17, NULL, '240621K125PK160-351', 1471, 'Stok Opname', '2024-06-21 12:58:50', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (435, 17, NULL, '240621K125PK160-352', 1359, 'Stok Opname', '2024-06-21 12:59:06', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (436, 17, NULL, '240621K125PK160-353', 1488, 'Stok Opname', '2024-06-21 12:59:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (437, 17, NULL, '240621K125PK160-354', 1352, 'Stok Opname', '2024-06-21 12:59:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (438, 16, NULL, '240621K125PK155-355', 1391, 'Stok Opname', '2024-06-21 12:59:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (439, 17, NULL, '240621K125PK160-356', 1370, 'Stok Opname', '2024-06-21 13:00:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (440, 16, NULL, '240621K125PK155-357', 1436, 'Stok Opname', '2024-06-21 13:00:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (441, 16, NULL, '240621K125PK155-358', 1493, 'Stok Opname', '2024-06-21 13:00:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (442, 16, NULL, '240621K125PK155-359', 1363, 'Stok Opname', '2024-06-21 13:01:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (443, 17, NULL, '240621K125PK160-360', 1415, 'Stok Opname', '2024-06-21 13:01:22', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (444, 17, NULL, '240621K125PK160-361', 1383, 'Stok Opname', '2024-06-21 13:01:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (445, 17, NULL, '240621K125PK160-362', 1330, 'Stok Opname', '2024-06-21 13:02:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (446, 17, NULL, '240621K125PK160-363', 1426, 'Stok Opname', '2024-06-21 13:02:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (447, 17, NULL, '240621K125PK160-364', 1331, 'Stok Opname', '2024-06-21 13:04:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (448, 16, NULL, '240621K125PK155-365', 1360, 'Stok Opname', '2024-06-21 13:04:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (449, 17, NULL, '240621K125PK160-366', 1352, 'Stok Opname', '2024-06-21 13:04:56', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (450, 17, NULL, '240621K125PK160-367', 1387, 'Stok Opname', '2024-06-21 13:05:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (451, 16, NULL, '240621K125PK155-368', 1321, 'Stok Opname', '2024-06-21 13:05:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (452, 523, NULL, '240621TL125PK130-369', 1145, 'Stok Opname', '2024-06-21 13:06:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (453, 629, NULL, '240621TL150SIK100-370', 858, 'Stok Opname', '2024-06-21 13:06:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (454, 614, NULL, '240621TL125SIK105-371', 854, 'Stok Opname', '2024-06-21 13:08:02', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (455, 26, NULL, '240621K150PK125-372', 1153, 'Stok Opname', '2024-06-21 13:08:32', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (456, 26, NULL, '240621K150PK125-373', 1120, 'Stok Opname', '2024-06-21 13:09:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (457, 25, NULL, '240621K150PK120-374', 1117, 'Stok Opname', '2024-06-21 13:09:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (458, 32, NULL, '240621K150PK155-375', 1203, 'Stok Opname', '2024-06-21 13:09:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (459, 17, NULL, '240621K125PK160-376', 1477, 'Stok Opname', '2024-06-21 13:10:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (460, 26, NULL, '240621K150PK125-377', 1076, 'Stok Opname', '2024-06-21 13:10:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (461, 26, NULL, '240621K150PK125-378', 1089, 'Stok Opname', '2024-06-21 13:10:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (462, 21, NULL, '240621K150PK100-379', 781, 'Stok Opname', '2024-06-21 13:11:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (463, 23, NULL, '240621K150PK110-380', 963, 'Stok Opname', '2024-06-21 13:11:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (464, 23, NULL, '240621K150PK110-381', 979, 'Stok Opname', '2024-06-21 13:11:47', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (465, 26, NULL, '240621K150PK125-382', 1198, 'Stok Opname', '2024-06-21 13:12:04', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (466, 24, NULL, '240621K150PK115-383', 1133, 'Stok Opname', '2024-06-21 13:12:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (467, 26, NULL, '240621K150PK125-384', 1143, 'Stok Opname', '2024-06-21 13:12:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (468, 24, NULL, '240621K150PK115-385', 306, 'Stok Opname', '2024-06-21 13:12:57', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (469, 25, NULL, '240621K150PK120-386', 1109, 'Stok Opname', '2024-06-21 13:13:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (470, 26, NULL, '240621K150PK125-387', 1149, 'Stok Opname', '2024-06-21 13:13:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (471, 27, NULL, '240621K150PK130-388', 1147, 'Stok Opname', '2024-06-21 13:14:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (472, 25, NULL, '240621K150PK120-389', 1125, 'Stok Opname', '2024-06-21 13:14:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (473, 25, NULL, '240621K150PK120-390', 1132, 'Stok Opname', '2024-06-21 13:14:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (474, 23, NULL, '240621K150PK110-391', 972, 'Stok Opname', '2024-06-21 13:15:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (475, 23, NULL, '240621K150PK110-392', 960, 'Stok Opname', '2024-06-21 13:15:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (476, 23, NULL, '240621K150PK110-393', 1044, 'Stok Opname', '2024-06-21 13:16:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (477, 23, NULL, '240621K150PK110-394', 961, 'Stok Opname', '2024-06-21 13:16:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (478, 23, NULL, '240621K150PK110-395', 992, 'Stok Opname', '2024-06-21 13:16:52', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (479, 23, NULL, '240621K150PK110-396', 920, 'Stok Opname', '2024-06-21 13:17:08', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (480, 24, NULL, '240621K150PK115-397', 954, 'Stok Opname', '2024-06-21 13:17:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (481, 22, NULL, '240621K150PK105-398', 976, 'Stok Opname', '2024-06-21 13:17:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (482, 24, NULL, '240621K150PK115-399', 777, 'Stok Opname', '2024-06-21 13:17:57', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (483, 27, NULL, '240621K150PK130-400', 1124, 'Stok Opname', '2024-06-21 13:18:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (484, 27, NULL, '240621K150PK130-401', 1162, 'Stok Opname', '2024-06-21 13:18:29', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (485, 11, NULL, '240621K125PK130-402', 330, 'Stok Opname', '2024-06-21 13:18:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (486, 26, NULL, '240621K150PK125-403', 1102, 'Stok Opname', '2024-06-21 13:19:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (487, 33, NULL, '240621K150PK160-404', 1251, 'Stok Opname', '2024-06-21 13:20:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (488, 25, NULL, '240621K150PK120-405', 1040, 'Stok Opname', '2024-06-21 13:20:38', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (489, 798, NULL, '240621K125PC145-406', 1306, 'Stok Opname', '2024-06-21 13:20:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (490, 175, NULL, '240621K125CIK150-407', 1255, 'Stok Opname', '2024-06-21 13:21:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (491, 193, NULL, '240621K150CIK160-408', 1584, 'Stok Opname', '2024-06-21 13:21:48', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (492, 189, NULL, '240621K150CIK140-409', 586, 'Stok Opname', '2024-06-21 13:22:16', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (493, 90, NULL, '240621K125PB125-410', 813, 'Stok Opname', '2024-06-21 13:22:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (494, 176, NULL, '240621K125CIK155-411', 1346, 'Stok Opname', '2024-06-21 13:23:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (495, 10, NULL, '240621K125PK125-412', 1213, 'Stok Opname', '2024-06-21 13:25:11', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (496, 111, NULL, '240621K150PB150-413', 1243, 'Stok Opname', '2024-06-21 13:25:45', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (497, 815, NULL, '240621K150PC150-414', 1332, 'Stok Opname', '2024-06-21 13:26:57', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (498, 176, NULL, '240621K125CIK155-415', 1610, 'Stok Opname', '2024-06-21 13:27:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (499, 93, NULL, '240621K125PB140-416', 1510, 'Stok Opname', '2024-06-21 13:28:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (500, 173, NULL, '240621K125CIK140-417', 1246, 'Stok Opname', '2024-06-21 13:28:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (501, 810, NULL, '240621K150PC125-418', 1005, 'Stok Opname', '2024-06-21 13:29:30', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (502, 173, NULL, '240621K125CIK140-419', 1283, 'Stok Opname', '2024-06-21 13:29:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (503, 17, NULL, '240621K125PK160-420', 1416, 'Stok Opname', '2024-06-21 13:30:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (504, 176, NULL, '240621K125CIK155-421', 1155, 'Stok Opname', '2024-06-21 13:30:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (505, 336, NULL, '240621M125PK155-422', 1007, 'Stok Opname', '2024-06-21 13:30:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (506, 791, NULL, '240621K125PC110-423', 531, 'Stok Opname', '2024-06-21 13:31:12', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (507, 16, NULL, '240621K125PK155-424', 1408, 'Stok Opname', '2024-06-21 13:31:33', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (508, 16, NULL, '240621K125PK155-425', 1346, 'Stok Opname', '2024-06-21 13:32:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (509, 188, NULL, '240621K150CIK135-426', 1021, 'Stok Opname', '2024-06-21 13:32:39', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (510, 14, NULL, '240621K125PK145-427', 1302, 'Stok Opname', '2024-06-21 13:33:00', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (511, 6, NULL, '240621K125PK105-428', 210, 'Stok Opname', '2024-06-21 13:33:46', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (512, 329, NULL, '240621M125PK120-429', 160, 'Stok Opname', '2024-06-21 13:34:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (513, 5, NULL, '240621K125PK100-430', 251, 'Stok Opname', '2024-06-21 13:34:34', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (514, 7, NULL, '240621K125PK110-431', 230, 'Stok Opname', '2024-06-21 13:34:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (515, 252, NULL, '240621M125SIK135-432', 315, 'Stok Opname', '2024-06-21 13:35:15', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (516, 7, NULL, '240621K125PK110-433', 230, 'Stok Opname', '2024-06-21 13:35:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (517, 257, NULL, '240621M125SIK160-434', 125, 'Stok Opname', '2024-06-21 13:35:52', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (518, 334, NULL, '240621M125PK145-435', 235, 'Stok Opname', '2024-06-21 13:36:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (519, 332, NULL, '240621M125PK135-436', 125, 'Stok Opname', '2024-06-21 13:36:26', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (520, 253, NULL, '240621M125SIK140-437', 115, 'Stok Opname', '2024-06-21 13:36:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (521, 250, NULL, '240621M125SIK125-438', 120, 'Stok Opname', '2024-06-21 13:37:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (522, 330, NULL, '240621M125PK125-439', 115, 'Stok Opname', '2024-06-21 13:37:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (523, 252, NULL, '240621M125SIK135-440', 180, 'Stok Opname', '2024-06-21 13:37:37', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (524, 253, NULL, '240621M125SIK140-441', 105, 'Stok Opname', '2024-06-21 13:38:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (525, 332, NULL, '240621M125PK135-442', 290, 'Stok Opname', '2024-06-21 13:39:25', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (526, 327, NULL, '240621M125PK110-443', 115, 'Stok Opname', '2024-06-21 13:39:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (527, 242, NULL, '240621M125SIK85-444', 120, 'Stok Opname', '2024-06-21 13:39:55', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (528, 245, NULL, '240621M125SIK100-445', 130, 'Stok Opname', '2024-06-21 13:40:50', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (529, 8, NULL, '240621K125PK115-446', 190, 'Stok Opname', '2024-06-21 13:41:14', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (530, 24, NULL, '240621K150PK115-447', 285, 'Stok Opname', '2024-06-21 13:41:32', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (531, 42, NULL, '240621K200PK125-448', 170, 'Stok Opname', '2024-06-21 13:42:09', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (532, 113, NULL, '240621K150PB160-449', 310, 'Stok Opname', '2024-06-21 13:42:27', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (533, 72, NULL, '240621K300PK115-450', 160, 'Stok Opname', '2024-06-21 13:42:43', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (534, 71, NULL, '240621K300PK110-451', 140, 'Stok Opname', '2024-06-21 13:42:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (535, 11, NULL, '240621K125PK130-452', 125, 'Stok Opname', '2024-06-21 13:43:19', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (536, 10, NULL, '240621K125PK125-453', 180, 'Stok Opname', '2024-06-21 13:43:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (537, 111, NULL, '240621K150PB150-454', 115, 'Stok Opname', '2024-06-21 13:44:44', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (538, 14, NULL, '240621K125PK145-455', 110, 'Stok Opname', '2024-06-21 13:45:05', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (539, 43, NULL, '240621K200PK130-456', 178, 'Stok Opname', '2024-06-21 13:45:23', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (540, 13, NULL, '240621K125PK140-457', 135, 'Stok Opname', '2024-06-21 13:45:41', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (541, 14, NULL, '240621K125PK145-458', 185, 'Stok Opname', '2024-06-21 13:45:59', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (542, 38, NULL, '240622K200PK105-459', 547, 'Stok Opname', '2024-06-22 03:12:20', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (543, 1109, NULL, '240622K200SIK100-460', 840, 'Stok Opname', '2024-06-22 03:16:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (544, 1109, NULL, '240622K200SIK100-461', 827, 'Stok Opname', '2024-06-22 03:16:28', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (545, 1110, NULL, '240622K200SIK105-462', 871, 'Stok Opname', '2024-06-22 03:16:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (546, 1109, NULL, '240622K200SIK100-463', 832, 'Stok Opname', '2024-06-22 03:17:06', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (547, 1110, NULL, '240622K200SIK105-464', 581, 'Stok Opname', '2024-06-22 03:17:36', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (548, 1108, NULL, '240622K200SIK95-465', 547, 'Stok Opname', '2024-06-22 03:17:53', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (549, 1110, NULL, '240622K200SIK105-466', 382, 'Stok Opname', '2024-06-22 03:19:01', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (550, 911, NULL, '240622K150FJR150-467', 1258, 'Stok Opname', '2024-06-22 03:19:58', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (551, 911, NULL, '240622K150FJR150-468', 1182, 'Stok Opname', '2024-06-22 03:20:17', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (552, 893, NULL, '240622K125FJR140-469', 1250, 'Stok Opname', '2024-06-22 03:20:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (553, 892, NULL, '240622K125FJR135-470', 1256, 'Stok Opname', '2024-06-22 03:20:51', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (554, 973, NULL, '240622K125WP140-471', 1210, 'Stok Opname', '2024-06-22 03:21:10', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (555, 893, NULL, '240622K125FJR140-472', 1257, 'Stok Opname', '2024-06-22 03:21:32', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (556, 888, NULL, '240622K125FJR115-473', 434, 'Stok Opname', '2024-06-22 03:21:49', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (557, 896, NULL, '240622K125FJR155-474', 1511, 'Stok Opname', '2024-06-22 03:22:07', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (558, 1087, NULL, '240622WK150PB150-475', 1213, 'Stok Opname', '2024-06-22 03:22:54', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (559, 502, NULL, '240622WK200PB105-476', 1246, 'Stok Opname', '2024-06-22 03:23:21', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (560, 1109, NULL, '240622K200SIK100-477', 310, 'Stok Opname', '2024-06-22 03:24:06', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (561, 1087, NULL, '240622WK150PB150-478', 110, 'Stok Opname', '2024-06-22 03:24:35', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (86, 242, NULL, '240620M125SIK85-3', 441, 'Stok Opname', '2024-06-20 03:01:13', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (562, 266, NULL, 'ABC2', 980, '000025-PO-BK-VI-2024', '2024-06-25 13:46:31', NULL, NULL, NULL);
INSERT INTO "transaction"."t_stock_raw_material" VALUES (563, 266, NULL, 'ABC1', 1090, '000025-PO-BK-VI-2024', '2024-06-25 13:46:31', NULL, NULL, NULL);

-- ----------------------------
-- Function structure for generate_invoice_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_invoice_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_invoice_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    current_year VARCHAR;
    sequence_number VARCHAR;
    invoice_number VARCHAR;
BEGIN
    -- Get the current year
    current_year := TO_CHAR(CURRENT_DATE, 'YY');

    -- Get the next value from the sequence and format it with leading zeros
    sequence_number := LPAD(NEXTVAL('transaction.t_invoice_numbering_seq')::VARCHAR, 4, '0');

    -- Create the invoice number with the specified format
    invoice_number := 'K' || current_year || sequence_number;

    RETURN invoice_number;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_invoice_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_invoice_number"("tax_type" varchar);
CREATE OR REPLACE FUNCTION "transaction"."generate_invoice_number"("tax_type" varchar)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    current_year VARCHAR;
    sequence_number VARCHAR;
    invoice_number VARCHAR;
BEGIN
    -- Get the current year
    current_year := TO_CHAR(CURRENT_DATE, 'YY');

		IF tax_type = '0' OR tax_type = '1' THEN
        -- Get the next value from the sequence and format it with leading zeros for tax_type 0 or 1
        sequence_number := LPAD(NEXTVAL('transaction.t_invoice_k_seq')::VARCHAR, 6, '0');
        -- Create the invoice number with the specified format for tax_type 0 or 1
        invoice_number := 'INV/B/' || current_year || '/' || sequence_number;
    ELSE
        -- Get the next value from the sequence and format it with leading zeros for other tax_types
        sequence_number := LPAD(NEXTVAL('transaction.t_invoice_b_seq')::VARCHAR, 6, '0');
        -- Create the invoice number with the specified format for other tax_types
        invoice_number := 'INV/K/' || current_year || '/' || sequence_number;
    END IF;

    RETURN invoice_number;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_purchase_order_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_purchase_order_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_purchase_order_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    month_roman VARCHAR;
BEGIN
		-- Get the Roman numeral representation of the current month
    SELECT CASE EXTRACT(MONTH FROM CURRENT_DATE)
        WHEN 1 THEN 'I'
        WHEN 2 THEN 'II'
        WHEN 3 THEN 'III'
        WHEN 4 THEN 'IV'
        WHEN 5 THEN 'V'
        WHEN 6 THEN 'VI'
        WHEN 7 THEN 'VII'
        WHEN 8 THEN 'VIII'
        WHEN 9 THEN 'IX'
        WHEN 10 THEN 'X'
        WHEN 11 THEN 'XI'
        WHEN 12 THEN 'XII'
    END INTO month_roman;
		
    -- Get the next value from the sequence
    SELECT nextval('transaction.purchase_order_seq') INTO seq_num;

    -- Format the result string
    result_str := to_char(seq_num, 'FM000000') || '-PO-BK-' || month_roman || '-' || EXTRACT(YEAR FROM CURRENT_DATE);

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_roll_code
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_roll_code"("material_id" int4);
CREATE OR REPLACE FUNCTION "transaction"."generate_roll_code"("material_id" int4)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    current_date_var CHAR(6);
    material_info VARCHAR(50);
    sequence_number INT;
    roll_code VARCHAR(50);
BEGIN
    -- Fetch current date
    SELECT to_char(CURRENT_DATE, 'YYMMDD') INTO current_date_var;
    
    -- Fetch material information
    SELECT code INTO material_info
    FROM master.m_material
    WHERE id = material_id;

    -- Get the next sequence number from the sequence
    SELECT nextval('transaction.roll_code_seq') INTO sequence_number;

    -- Generate the roll code
    roll_code := current_date_var || material_info || '-' || sequence_number;

    -- Return the generated roll code
    RETURN roll_code;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_sales_order_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_sales_order_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_sales_order_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.so_numbering_seq') INTO seq_num;

    -- Format the result string
    result_str := 'SO-' || last_two_digits || '-' || to_char(seq_num, 'FM000000');

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_spk_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_spk_number"();
CREATE OR REPLACE FUNCTION "transaction"."generate_spk_number"()
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
    prefix_str VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.spk_numbering_seq') INTO seq_num;

    -- Format the result string
    result_str := 'SPK-' || last_two_digits || '-' || LPAD(seq_num::TEXT, 6, '0');

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_spk_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_spk_number"("param_mode" int4);
CREATE OR REPLACE FUNCTION "transaction"."generate_spk_number"("param_mode" int4)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
    prefix_str VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.spk_numbering_seq') INTO seq_num;

    -- Format the result string
    result_str := 'SPK-' || last_two_digits || '-' || LPAD(seq_num::TEXT, 6, '0');

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Function structure for generate_travel_permit_number
-- ----------------------------
DROP FUNCTION IF EXISTS "transaction"."generate_travel_permit_number"("type_param" int4);
CREATE OR REPLACE FUNCTION "transaction"."generate_travel_permit_number"("type_param" int4)
  RETURNS "pg_catalog"."varchar" AS $BODY$
DECLARE
    seq_num INTEGER;
    result_str VARCHAR;
    last_two_digits VARCHAR;
BEGIN
    -- Get the last two digits of the current year
    SELECT RIGHT(EXTRACT(YEAR FROM CURRENT_DATE)::TEXT, 2) INTO last_two_digits;

    -- Get the next value from the sequence
    SELECT nextval('transaction.travel_permit_numbering_seq'::regclass) INTO seq_num;

    -- Format the result string based on the parameter
    IF type_param = 0 OR type_param = 1 THEN
        result_str := 'B' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSIF type_param = 2 THEN
        result_str := 'K' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSIF type_param = 3 THEN
        result_str := 'S' || last_two_digits || to_char(seq_num, 'FM0000');
    ELSE
        RAISE EXCEPTION 'Invalid parameter: %', type_param;
    END IF;

    RETURN result_str;
END;
$BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."goods_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."m_mapping_index_price_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."purchase_order_seq"', 25, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."roll_code_seq"', 478, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."so_numbering_seq"', 82, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."spk_numbering_seq"', 156, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_delivery_attachments_id_seq"', 15, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_delivery_order_id_seq"', 46, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_delivery_order_id_seq"', 83, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_goods_receive_id_seq"', 68, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_invoice_id_seq"', 57, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_material_used_id_seq"', 21, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_progress_individu_id_seq"', 26, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_purchase_id_seq"', 53, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_id_seq"', 97, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_detail_sales_order_seq"', 29, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_goods_receive_id_seq"', 30, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_invoice_b_seq"', 5, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_invoice_id_seq"', 26, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_invoice_k_seq"', 8, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_invoice_numbering_seq"', 25, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_mapping_index_price_seq"', 120, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_material_used_id_seq"', 13, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_production_process_item_id_seq"', 235, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_progress_individu_id_seq"', 7, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_purchase_id_seq"', 25, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_sales_order_seq"', 75, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_production_process_id_seq"', 34, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_spk_seq"', 152, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_stock_finish_goods_id_seq"', 51, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."t_stock_raw_material_id_seq"', 563, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"transaction"."travel_permit_numbering_seq"', 46, true);

-- ----------------------------
-- Primary Key structure for table t_delivery_attachments
-- ----------------------------
ALTER TABLE "transaction"."t_delivery_attachments" ADD CONSTRAINT "delivery_attachments_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_delivery_order
-- ----------------------------
ALTER TABLE "transaction"."t_delivery_order" ADD CONSTRAINT "t_delivery_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_delivery_order
-- ----------------------------
ALTER TABLE "transaction"."t_detail_delivery_order" ADD CONSTRAINT "t_detail_delivery_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_goods_receive
-- ----------------------------
ALTER TABLE "transaction"."t_detail_goods_receive" ADD CONSTRAINT "t_detail_goods_receive_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_invoice
-- ----------------------------
ALTER TABLE "transaction"."t_detail_invoice" ADD CONSTRAINT "t_detail_invoice_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_material_used
-- ----------------------------
ALTER TABLE "transaction"."t_detail_material_used" ADD CONSTRAINT "t_detail_material_used_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_production_process_item
-- ----------------------------
ALTER TABLE "transaction"."t_detail_production_process_item" ADD CONSTRAINT "t_spk_production_process_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_progress_individu
-- ----------------------------
ALTER TABLE "transaction"."t_detail_progress_individu" ADD CONSTRAINT "t_detail_progress_individu_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_purchase
-- ----------------------------
ALTER TABLE "transaction"."t_detail_purchase" ADD CONSTRAINT "t_detail_purchase_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_detail_sales_order
-- ----------------------------
ALTER TABLE "transaction"."t_detail_sales_order" ADD CONSTRAINT "t_detail_sales_order_temp_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_goods_receive
-- ----------------------------
ALTER TABLE "transaction"."t_goods_receive" ADD CONSTRAINT "t_goods_receive_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_invoice
-- ----------------------------
ALTER TABLE "transaction"."t_invoice" ADD CONSTRAINT "t_invoice_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_mapping_index_price
-- ----------------------------
ALTER TABLE "transaction"."t_mapping_index_price" ADD CONSTRAINT "t_mapping_index_price_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_material_used
-- ----------------------------
ALTER TABLE "transaction"."t_material_used" ADD CONSTRAINT "t_material_used_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_production_process_item
-- ----------------------------
ALTER TABLE "transaction"."t_production_process_item" ADD CONSTRAINT "t_production_process_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_progress_individu
-- ----------------------------
ALTER TABLE "transaction"."t_progress_individu" ADD CONSTRAINT "t_progress_individu_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_purchase
-- ----------------------------
ALTER TABLE "transaction"."t_purchase" ADD CONSTRAINT "t_purchase_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_sales_order
-- ----------------------------
ALTER TABLE "transaction"."t_sales_order" ADD CONSTRAINT "t_sales_order_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_spk
-- ----------------------------
ALTER TABLE "transaction"."t_spk" ADD CONSTRAINT "t_spk_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_stock_finish_goods
-- ----------------------------
ALTER TABLE "transaction"."t_stock_finish_goods" ADD CONSTRAINT "t_stock_finish_goods_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table t_stock_raw_material
-- ----------------------------
ALTER TABLE "transaction"."t_stock_raw_material" ADD CONSTRAINT "t_stock_raw_material_pkey" PRIMARY KEY ("id");
