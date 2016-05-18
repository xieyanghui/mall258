--  管理员权限
DROP TABLE IF EXISTS `admin_auth`;
CREATE TABLE  `admin_auth` (
	`aa_id` INT UNSIGNED AUTO_INCREMENT NOT NULL , -- ID
	`aa_nick` CHAR(20) NOT NULL ,  -- 昵称
	`aa_remark` VARCHAR(50),    -- 备注
  PRIMARY KEY (`aa_id`),
  UNIQUE(`aa_nick`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;



DROP TABLE IF EXISTS `auth_list`;
-- 权限列表
CREATE TABLE `auth_list`(
	`al_id` INT UNSIGNED AUTO_INCREMENT NOT NULL , -- ID
  `al_key` CHAR(20) NOT NULL ,    -- 权限关键字
	`al_nick` CHAR(20) NOT NULL ,     -- 昵称
	`al_remark` VARCHAR(50) ,   -- 备注
  UNIQUE(`al_key`),
  PRIMARY KEY (`al_id`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;


--  连接表
DROP TABLE IF EXISTS `admin_auth_list`;
CREATE TABLE `admin_auth_list`(
	`al_id` INT UNSIGNED NOT NULL ,     -- 权限列表ID
	`aa_id` INT UNSIGNED NOT NULL ,  -- 权限ID
  PRIMARY KEY (`al_id`,`aa_id`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;

-- 管理员
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`(
	`a_id` INT UNSIGNED AUTO_INCREMENT  NOT NULL,             -- 管理员ID
	`a_name` CHAR(20) NOT NULL,       -- 管理员账号
	`a_pwd` CHAR(32) NOT NULL,        -- 密码
	`a_reg` TIMESTAMP DEFAULT NOW(),  -- 注册时间
	`a_img` VARCHAR(200) ,             -- 头像图片
	`a_nick` CHAR(20)  ,                -- 真实姓名
	`a_status` TINYINT NOT NULL DEFAULT 1,  -- 状态 1启用,2不启用
	`aa_id` INT UNSIGNED NOT NULL  DEFAULT 2 , -- 权限ID
  PRIMARY KEY (`a_id`),
  UNIQUE (`a_name`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;


-- 管理员日志
DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log`(
	`sl_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,          -- 管理员日志 ID
	`a_id` INT UNSIGNED NOT NULL ,  -- 管理员ID
	`sl_key` CHAR(20) NOT NULL ,  -- 事件KEY
  `sl_content` VARCHAR(200) NOT NULL ,-- 事件详细
	`sl_date` TIMESTAMP DEFAULT NOW() NOT NULL  , -- 事件时间
  PRIMARY KEY (`sl_id`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;

-- 管理员登录日志
DROP TABLE IF EXISTS `admin_login_log`;
CREATE TABLE `admin_login_log`(
	`all_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,           --  ID
	`a_id` INT UNSIGNED NOT NULL ,    -- 管理员ID
	`ip` CHAR(16) NOT NULL ,           -- 登录IP
	`date` TIMESTAMP DEFAULT NOW()  NOT NULL ,  -- 事件时间
  PRIMARY KEY (`all_id`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;

-- 管理员图片空间类型
DROP TABLE IF EXISTS `admin_img_type`;
CREATE TABLE `admin_img_type`(
	`ait_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,    -- ID
	`ait_name` CHAR(40) ,      -- 图片分类
	`a_id` INT UNSIGNED NOT NULL  ,-- 用户ID
  PRIMARY KEY (`ait_id`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;


-- 管理员图片空间
DROP TABLE IF EXISTS `admin_img_space`;
CREATE TABLE `admin_img_space`(
  `ais_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,    -- ID
  `ais_name` CHAR(40) ,      -- 图片名
  `a_id` INT UNSIGNED NOT NULL , -- 用户ID
  `ais_img_url` VARCHAR(500) NOT NULL ,  -- 图片路径
  `ait_id` INT UNSIGNED NOT NULL ,     -- 图片
  `ais_time` TIMESTAMP DEFAULT NOW() NOT NULL,  -- 上传时间
  PRIMARY KEY (`ais_id`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;


-- 用户
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
	`u_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,          -- 用户ＩＤ
	`u_name` CHAR(20) NOT NULL,    -- 账号
	`u_pwd` CHAR(32) NOT NULL,     -- 密码
	`u_nick` CHAR(20) DEFAULT'' NOT NULL,              -- 昵称
	`u_phone` CHAR(11)  NOT NULL ,  -- 手机号码
	`u_email` CHAR(40) NOT NULL,   -- 电子邮件
	`u_address` CHAR(12) DEFAULT'' NOT NULL ,					-- 地址
	`u_reg` TIMESTAMP DEFAULT NOW() NOT NULL, -- 注册时间
	`u_status` TINYINT NOT NULL DEFAULT 1,  -- 权限状态 1启用,2不启用
	`u_img` VARCHAR(400)    ,          -- 头像
  PRIMARY KEY (`u_id`),
  UNIQUE (`u_name` , `u_phone`)
)DEFAULT CHARSET = utf8 ENGINE=InnoDB;


-- 用户收货地址
DROP TABLE IF EXISTS `user_ship_address`;
CREATE TABLE `user_ship_address`(
  `usa_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,      -- ID
	`u_id` INT UNSIGNED,								 -- 用户ID
  `usa_number` CHAR(12) NOT NULL , -- 地址编号
  `usa_name` CHAR(12) NOT NULL, -- 收件人姓名
	`usa_phone` CHAR(15) NOT NULL ,    -- 收件人电话
  PRIMARY KEY (`usa_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

-- 商品类型
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type`(
	`gt_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,  -- ID
	`gt_number` CHAR(15) NOT NULL,  -- 商品类型编号
	`gt_name` CHAR(20) NOT NULL ,   -- 类型名称
	`gt_remark` CHAR(60),             -- 备注
	`gt_status` TINYINT NOT NULL DEFAULT 1 , -- 状态 1启用,2不启用
  PRIMARY KEY (`gt_id`),
  UNIQUE (`gt_name`,`gt_number`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;


-- 商品
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`(
	`g_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,         -- ID
	`g_number` VARCHAR(30) NOT NULL, -- 编号
	`g_name` VARCHAR(300) NOT NULL, -- 商品名
	`gt_id` INT UNSIGNED NOT NULL,  -- 商品类型ID
	`g_price` DECIMAL(8,2) NOT NULL,   -- 价格
	`g_keywords` VARCHAR(300) ,      -- 商品关键字SEO
	`g_description` VARCHAR(500),     -- 商品描述SEO
	`g_img` VARCHAR(400),              -- 商品图片
	`g_reg` TIMESTAMP DEFAULT NOW(),   -- 上架时间
	`g_status` tinyINT NOT NULL DEFAULT 1,  -- 商品 状态
	`g_text` MEDIUMTEXT,         -- 详细资料
  PRIMARY KEY (`g_id`),
  UNIQUE (`g_name`,`g_number`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;


-- 商品属性大类型
DROP TABLE IF EXISTS `gt_attr_type`;
CREATE TABLE `gt_attr_type`(
  gtat_id INT UNSIGNED AUTO_INCREMENT NOT NULL,
  gtat_name VARCHAR(100) NOT NULL ,
  gt_id INT UNSIGNED NOT NULL ,
  PRIMARY KEY (gtat_id)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

-- 商品类型属性
DROP TABLE IF EXISTS `gt_attr`;
CREATE TABLE `gt_attr`(
	`gta_id` INT UNSIGNED AUTO_INCREMENT  NOT NULL,        -- ID
	`gt_id` INT UNSIGNED NOT NULL, -- 类型ID
	`gta_name` VARCHAR(100) NOT NULL ,   -- 属性名
	`gtat_id` INT UNSIGNED NOT NULL ,  -- 大分类
  PRIMARY KEY (`gta_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

-- 商品属性
DROP TABLE IF EXISTS `g_attr`;
CREATE TABLE `g_attr`(
  `ga_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,   -- ID
  `g_id` INT UNSIGNED NOT NULL,     -- 商品ID
  `gta_id` INT UNSIGNED NOT NULL,   -- 商品属性ID
  `ga_value` VARCHAR(100) DEFAULT '' NOT NULL ,          -- 值
  PRIMARY KEY (`ga_id`),
  KEY (`ga_value`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;


-- 商品类型属性价格
DROP TABLE IF EXISTS `gt_price`;
CREATE TABLE `gt_price`(
	`gtp_id` INT UNSIGNED AUTO_INCREMENT  NOT NULL,             -- ID
	`gt_id` INT UNSIGNED NOT NULL,      -- 商品类型ID
	`gtp_name` VARCHAR(100) NOT NULL,  -- 价格属性名称
  PRIMARY KEY (`gtp_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;


-- 商品价格名
DROP TABLE IF EXISTS `g_price`;
CREATE TABLE `g_price`(
	`gp_id` INT UNSIGNED AUTO_INCREMENT  NOT NULL,          -- ID
	`g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gtp_id` INT UNSIGNED NOT NULL ,-- 商品类型价格ID
  `gp_name` VARCHAR(100) NOT NULL ,    -- 价格属性
  PRIMARY KEY (`gp_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

-- 商品组合价格
DROP TABLE IF EXISTS `g_price_info`;
CREATE TABLE  `g_price_info`(
  `gpi_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,    -- ID
  `g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gpi_img` VARCHAR(400) ,   -- 图片
  `gpi_sum` INT UNSIGNED NOT NULL DEFAULT 0,  -- 数量
  `gpi_price` DECIMAL(8,2) ,  -- 价格
  PRIMARY KEY (`gpi_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;



-- 商品组合价格连接表
DROP TABLE IF EXISTS `g_price_list`;
CREATE TABLE  `g_price_list`(
  `gpi_id` INT UNSIGNED NOT NULL ,   -- 商品组合价格ID
  `gp_id` INT UNSIGNED NOT NULL , -- 商品价格属性ID
  PRIMARY KEY (`gpi_id`,`gp_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;


-- 购物车
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`(
	`c_id` INT UNSIGNED AUTO_INCREMENT NOT NULL,         -- ID
	`u_id` INT UNSIGNED NOT NULL, -- 用户ID
	`gpi_id` INT UNSIGNED NOT NULL, --  商品ID
	`c_sum` INT UNSIGNED NOT NULL DEFAULT 1 , -- 数量
  PRIMARY KEY (`c_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

-- 收藏夹
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect`(
	`u_id` INT UNSIGNED NOT NULL, -- 用户ID
	`g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  PRIMARY KEY (`u_id`,`g_id`)

)DEFAULT CHARSET =utf8 ENGINE=InnoDB;


-- 订单
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`(
	`o_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,      --
	`u_id` INT UNSIGNED NOT NULL,  -- 用户ID
	`o_number` CHAR(20) NOT NULL,  -- 订单编号
	`o_regtime` TIMESTAMP DEFAULT NOW(), -- 订单产生时间
	`o_status` tinyINT NOT NULL DEFAULT 1 , -- 订单状态
  PRIMARY KEY (`o_id`),
  UNIQUE (`o_number`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;;

-- 订单详细商品
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods`(
	`og_id` INT UNSIGNED AUTO_INCREMENT NOT NULL ,       -- ID
	`o_id` INT UNSIGNED NOT NULL,  -- 订单ID
	`gpi_id` INT UNSIGNED NOT NULL,  -- 商品ID
  PRIMARY KEY (`og_id`)

)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

-- 首页模块管理
DROP TABLE IF EXISTS `index_model`;
CREATE TABLE `index_model`(
	`im_id` INT UNSIGNED AUTO_INCREMENT  NOT NULL ,   -- ID
	`im_name` CHAR(20) NOT NULL , -- 模块名字
	`im_sort` SMALLINT DEFAULT 0 ,-- 排序
  PRIMARY KEY (`im_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

INSERT INTO `index_model` (`im_name`,`im_sort`) VALUES ('滚动图片',30001),('新品上市',1),('推荐商品',2);
-- 首页模块内容
DROP TABLE IF EXISTS `index_goods`;
CREATE TABLE `index_goods`(
	`ig_id` INT UNSIGNED AUTO_INCREMENT  NOT NULL ,   -- ID
	`ig_name` VARCHAR (100) NOT NULL,  -- 描述
	`ig_img` VARCHAR(400) ,              -- 图片路径
	`ig_label` CHAR(10),            -- 标示
	`ig_status`  TINYINT DEFAULT 1, -- 是否显示
	`g_id` INT UNSIGNED NOT NULL ,   -- 商品ID
	`im_id` INT UNSIGNED  NOT NULL ,  -- 模块ID
  PRIMARY KEY (`ig_id`)
)DEFAULT CHARSET =utf8 ENGINE=InnoDB;

INSERT INTO `index_model` (`im_name`,`im_sort`) VALUES ('滚动图片',30001),('新品上市',1),('推荐商品',2);

INSERT INTO `admin_auth` (`aa_nick`,`aa_remark`) VALUES ('超级管理员','系统的主宰'),('无权限管理员','一点权限都没有'),('普通管理员','一般的管理');

INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('report','报表统计','营运状况'),('service','客服管理','管理客服'),('order','订单管理','订单处理'),('goods','商品管理','商品各种操作');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('systemLog','系统日志','查看系统日志');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsRecommend','推荐商品管理','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('adminInfo','管理员管理',''),('adminDelete','删除管理员','超级权限'),('adminAdd','增加管理员',''),('adminUpdate','修改管理员','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('adminAuth','管理员权限管理',''),('adminAuthAdd','增加管理员权限',''),('adminAuthUpdate','修改管理员权限',''),('adminAuthDelete','删除管理员权限','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsType','商品类型管理',null),('goodsTypeAdd','增加商品类型',''),('goodsTypeUpdate','修改商品类型',''),('goodsTypeDelete','删除商品类型','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsInfo','商品管理',''),('goodsIndex','首页商品管理',''),('goodsAdd','增加商品',''),('goodsUpdate','修改商品',''),('goodsDelete','删除商品','');

INSERT INTO admin_auth_list(aa_id,al_id) VALUES (3,1),(3,4),(3,6),(3,10),(3,8),(3,9);

INSERT INTO `admin`(`a_name`,`a_pwd` ,`a_nick`,`aa_id`) VALUES('xieyanghui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢扬辉',1),('yefengxi' , 'e10adc3949ba59abbe56e057f20f883e' ,'逗比',2);

INSERT INTO `admin_img_type` (`ait_name`,`a_id`) VALUES ('回收站',0),('商品图片',0),('头像图片',0);

INSERT INTO `user` (`u_name`,`u_pwd` ,`u_nick`,`u_phone`,`u_email`) VALUES('xiehui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢辉','18588711500' ,'xieiyanghui@126.com');

INSERT INTO goods_type (`gt_number`,`gt_name`,`gt_remark`)VALUES('01001','手机','手机，合约机，各种定制机器'),('01002','笔记本','笔记本电脑'),('01003','相机','数码相机'),('01004','电视','平板电视');



#
DELETE from goods;
DELETE  from gt_attr_type;
DELETE  from gt_attr;
DELETE  from g_attr;
DELETE  from gt_price;
DELETE  from g_price;
DELETE  from g_price_info;
DELETE  from g_price_list;


#
# UPDATE `goods` SET g_img = replace(g_img ,'_430x430q90.jpg','');
#
# UPDATE `g_price_info` SET gpi_img = replace(gpi_img ,'_430x430q90.jpg','');
#
#
# INSERT  INTO gt_attr_type (gt_id,gtat_name) SELECT 1,gta_type as gtat_name FROM gt_attr GROUP BY gta_type;
#
# ALTER TABLE gt_attr ADD COLUMN (gtat_id INT UNSIGNED NOT NULL );
#
# UPDATE gt_attr INNER JOIN gt_attr_type ON gt_attr.gta_type=gt_attr_type.gtat_name SET gt_attr.gtat_id=gt_attr_type.gtat_id;
#
# ALTER TABLE gt_attr DROP COLUMN gta_type;

# show variables like '%char%'
-- show variables like "%char%";
-- SET character_set_database = utf8;
-- SET character_set_server = utf8;
-- show variables like '%time_zone%';
-- set time_zone = '+8:00';