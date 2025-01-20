/*
 Navicat Premium Data Transfer

 Source Server         : bimeta
 Source Server Type    : PostgreSQL
 Source Server Version : 160001 (160001)
 Source Host           : localhost:5432
 Source Catalog        : bimeta_2
 Source Schema         : transaction

 Target Server Type    : PostgreSQL
 Target Server Version : 160001 (160001)
 File Encoding         : 65001

 Date: 13/01/2025 04:01:57
*/


-- ----------------------------
-- Table structure for t_spk_templates
-- ----------------------------
DROP TABLE IF EXISTS "transaction"."t_spk_templates";
CREATE TABLE "transaction"."t_spk_templates" (
  "id" int4 NOT NULL DEFAULT nextval('"transaction".t_spk_templates_id_seq'::regclass),
  "goods_id" int4 NOT NULL,
  "spk_id" int4 NOT NULL
)
;

-- ----------------------------
-- Primary Key structure for table t_spk_templates
-- ----------------------------
ALTER TABLE "transaction"."t_spk_templates" ADD CONSTRAINT "t_spk_templates_pkey" PRIMARY KEY ("id");
