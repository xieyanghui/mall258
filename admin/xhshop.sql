--  管理员权限
DROP TABLE IF EXISTS `admin_auth`;
CREATE TABLE  `admin_auth` (
	`aa_id` INT NOT NULL , -- ID
	`aa_nick` CHAR(20) NOT NULL ,  -- 昵称
	`aa_remark` VARCHAR(50)    -- 备注
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `admin_auth` ADD PRIMARY KEY (`aa_id`);
ALTER TABLE `admin_auth` MODIFY `aa_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `admin_auth` ADD UNIQUE (`aa_nick`);
INSERT INTO `admin_auth` (`aa_nick`,`aa_remark`) VALUES ('超级管理员','系统的主宰'),('无权限管理员','一点权限都没有'),('普通管理员','一般的管理');

DROP TABLE IF EXISTS `auth_list`;
-- 权限列表
CREATE TABLE `auth_list`(
	`al_id` INT NOT NULL , -- ID
  `al_key` CHAR(20) NOT NULL ,    -- 权限关键字
	`al_nick` CHAR(20) NOT NULL ,     -- 昵称
	`al_remark` VARCHAR(50)    -- 备注
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `auth_list` ADD PRIMARY KEY (`al_id`);
ALTER TABLE `auth_list` ADD UNIQUE(`al_key`);
ALTER TABLE `auth_list` MODIFY `al_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('report','报表统计','营运状况'),('service','客服管理','管理客服'),('order','订单管理','订单处理'),('goods','商品管理','商品各种操作');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('log','系统日志','查看系统日志');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsRecommend','推荐商品管理','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('admin','管理员管理',''),('adminDelete','删除管理员','超级权限'),('adminAdd','增加管理员',''),('adminUpdate','修改管理员','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('adminAuth','管理员权限管理',''),('adminAuthAdd','增加管理员权限',''),('adminAuthUpdate','修改管理员权限',''),('adminAuthDelete','删除管理员权限','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsType','商品类型管理',null),('goodsTypeAdd','增加商品类型',''),('goodsTypeUpdate','修改商品类型',''),('goodsTypeDelete','删除商品类型','');
INSERT INTO `auth_list` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsInfo','商品管理',''),('goodsAdd','增加商品',''),('goodsUpdate','修改商品',''),('goodsDelete','删除商品','');
--  连接表
DROP TABLE IF EXISTS `admin_auth_list`;
CREATE TABLE `admin_auth_list`(
	`al_id` INT UNSIGNED NOT NULL ,     -- 权限列表ID
	`aa_id` INT UNSIGNED NOT NULL   -- 权限ID
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `admin_auth_list` ADD PRIMARY KEY (`al_id`,`aa_id`);
INSERT INTO `admin_auth_list` (aa_id,al_id) VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8);

-- 管理员
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`(
	`a_id` INT  NOT NULL,             -- 管理员ID
	`a_name` CHAR(20) NOT NULL,       -- 管理员账号
	`a_pwd` CHAR(32) NOT NULL,        -- 密码
	`a_reg` TIMESTAMP DEFAULT NOW(),  -- 注册时间
	`a_img` VARCHAR(200) ,             -- 头像图片
	`a_nick` CHAR(20)  ,                -- 真实姓名
	`a_status` TINYINT NOT NULL DEFAULT 1,  -- 状态 1启用,2不启用
	`aa_id` INT UNSIGNED NOT NULL  DEFAULT 2  -- 权限ID
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;

ALTER TABLE `admin` ADD PRIMARY KEY (`a_id`);
ALTER TABLE `admin` MODIFY `a_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `admin` ADD UNIQUE (`a_name`);
INSERT INTO `admin`(`a_name`,`a_pwd` ,`a_nick`,`aa_id`) VALUES('xieyanghui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢扬辉',1),('yefengxi' , 'e10adc3949ba59abbe56e057f20f883e' ,'逗比',2);

-- 管理员日志
DROP TABLE IF EXISTS `system_log`;
CREATE TABLE `system_log`(
	`sl_id` INT NOT NULL ,          -- 管理员日志 ID
	`a_id` INT UNSIGNED NOT NULL ,  -- 管理员ID
	`sl_key` CHAR(20) NOT NULL ,  -- 事件KEY
  `sl_content` VARCHAR(200) NOT NULL ,-- 事件详细
	`sl_date` TIMESTAMP DEFAULT NOW()    -- 事件时间

)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `system_log` ADD PRIMARY KEY (`sl_id`);
ALTER TABLE `system_log` MODIFY `sl_id` INT UNSIGNED AUTO_INCREMENT;

-- 管理员登录日志
DROP TABLE IF EXISTS `admin_login_log`;
CREATE TABLE `admin_login_log`(
	`all_id` INT NOT NULL ,           --  ID
	`a_id` INT UNSIGNED NOT NULL ,    -- 管理员ID
	`ip` CHAR(16) NOT NULL ,           -- 登录IP
	`date` TIMESTAMP DEFAULT NOW()    -- 事件时间
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `admin_login_log` ADD PRIMARY KEY (`all_id`);
ALTER TABLE `admin_login_log` MODIFY `all_id` INT UNSIGNED AUTO_INCREMENT;

-- 管理员图片空间
DROP TABLE IF EXISTS `admin_img_scope`;
CREATE TABLE `admin_img_scope`(
  `ais_id` INT NOT NULL,    -- ID
  `ais_name` CHAR(40) ,      -- 图片名
  `a_id` INT UNSIGNED NOT NULL , -- 用户ID
  `ais_imgurl` VARCHAR(500) NOT NULL ,  -- 图片路径
  `ais_type` CHAR(20) NOT NULL ,     -- 图片分类
  `ais_time` TIMESTAMP DEFAULT NOW()  -- 上传时间
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `admin_img_scope` ADD PRIMARY KEY (`ais_id`);
ALTER TABLE `admin_img_scope` MODIFY `ais_id` INT UNSIGNED AUTO_INCREMENT;

-- 用户
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
	`u_id` INT NOT NULL ,          -- 用户ＩＤ
	`u_name` CHAR(20) NOT NULL,    -- 账号
	`u_pwd` CHAR(32) NOT NULL,     -- 密码
	`u_nick` CHAR(20),              -- 昵称
	`u_phone` CHAR(11) ,            -- 手机号码
	`u_email` CHAR(40) ,            -- 电子邮件
	`u_address` CHAR(12) ,					-- 地址
	`u_reg` TIMESTAMP DEFAULT NOW(), -- 注册时间
	`u_status` TINYINT NOT NULL DEFAULT 1,  -- 权限状态 1启用,2不启用
	`u_img` VARCHAR(400)              -- 头像
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;

ALTER TABLE `user` ADD PRIMARY KEY (`u_id`);
ALTER TABLE `user` MODIFY `u_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `user` ADD UNIQUE (`u_name` , `u_phone`);
INSERT INTO `user` (`u_name`,`u_pwd` ,`u_nick`,`u_phone`,`u_email`) VALUES('xiehui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢辉','18588711500' ,'xieiyanghui@126.com');

-- 用户收货地址
DROP TABLE IF EXISTS `user_ship_address`;
CREATE TABLE `user_ship_address`(
  `add_id` INT NOT NULL,      -- ID
	`u_id` INT ,								 -- 用户ID
  `add_number` CHAR(12) NOT NULL , -- 地址编号
  `add_consignee` CHAR(12) NOT NULL, -- 收件人姓名
	`add_phone` CHAR(15) NOT NULL      -- 收件人电话
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `user_ship_address` ADD PRIMARY KEY (`add_id`);
ALTER TABLE `user_ship_address` MODIFY `add_id` INT UNSIGNED AUTO_INCREMENT;

-- 商品类型
DROP TABLE IF EXISTS `goods_type`;
CREATE TABLE `goods_type`(
	`gt_id` INT NOT NULL ,  -- ID
	`gt_number` CHAR(5) NOT NULL,  -- 商品类型编号
	`gt_name` CHAR(20) NOT NULL ,   -- 类型名称
	`gt_remark` CHAR(60),             -- 备注
	`gt_status` TINYINT NOT NULL DEFAULT 1  -- 状态 1启用,2不启用
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `goods_type` ADD PRIMARY KEY (`gt_id`);
ALTER TABLE `goods_type` MODIFY `gt_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `goods_type` ADD UNIQUE (`gt_name`,`gt_number`);

INSERT INTO goods_type (`gt_number`,`gt_name`,`gt_remark`)VALUES('01001','手机','手机，合约机，各种定制机器'),
	('01002','相机','数码相机等');

-- 商品
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods`(
	`g_id` INT NOT NULL,         -- ID
	`g_number` CHAR(10) NOT NULL, -- 编号
	`g_name` VARCHAR(100) NOT NULL, -- 商品名
	`gt_id` INT UNSIGNED NOT NULL,  -- 商品类型ID
	`g_price` float(8,2) NOT NULL,   -- 价格
	`g_keywoeds` VARCHAR(200) ,      -- 商品关键字SEO
	`g_description` VARCHAR(200),     -- 商品描述SEO
	`g_img` VARCHAR(300),              -- 商品图片
	`g_reg` TIMESTAMP DEFAULT NOW(),   -- 上架时间
	`g_status` tinyINT NOT NULL DEFAULT 1,  -- 商品 状态
	`g_text` text         -- 详细资料
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `goods` ADD PRIMARY KEY (`g_id`);
ALTER TABLE `goods` MODIFY `g_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `goods` ADD UNIQUE (`g_name`,`g_number`);

INSERT INTO  `goods`(`g_number`,`g_name`,`gt_id`,`g_price`,`g_keywoeds`,`g_description`)VALUES
	('0100100001','一加one',1,1999.99,'智能手机，4G手机','不错的一款手机' ),
	('0100200001','佳能',2,1999.99,'100000s，wifi','不错的一款相机' );


-- 商品类型属性
DROP TABLE IF EXISTS `gt_attr`;
CREATE TABLE `gt_attr`(
  `gta_id` INT  NOT NULL,        -- ID
  `gt_id` INT UNSIGNED NOT NULL, -- 类型ID
  `gta_name` CHAR(20) NOT NULL    -- 属性名
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gt_attr` ADD PRIMARY KEY (`gta_id`);
ALTER TABLE `gt_attr` MODIFY `gta_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO gt_attr(`gt_id`,`gta_name`)VALUES(1,'品牌'),(1,'型号'),(1,'屏幕尺寸'),(1,'分辨率'),(1,'CPU'),(1,'前置摄像头'),(1,'后置摄像头'),(1,'长'),(1,'厚'),(1,'宽'),(1,'RAM'),(1,'上市时间'),(2,'品牌'),(2,'型号'),(2,'像素'),(2,'显示屏类型'),(2,'上市时间');

-- 商品属性
DROP TABLE IF EXISTS `g_attr`;
CREATE TABLE `g_attr`(
  `ga_id` INT UNSIGNED NOT NULL,   -- ID
  `g_id` INT UNSIGNED NOT NULL,     -- 商品ID
  `gta_id` INT UNSIGNED NOT NULL,   -- 商品属性ID
  `ga_value` CHAR(20)              -- 值
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `g_attr` ADD PRIMARY KEY (`ga_id`);
ALTER TABLE `g_attr` MODIFY `ga_id` INT UNSIGNED AUTO_INCREMENT;

-- 商品类型属性价格
DROP TABLE IF EXISTS `gt_price`;
CREATE TABLE `gt_price`(
	`gtp_id` INT  NOT NULL,             -- ID
	`gt_id` INT UNSIGNED NOT NULL,      -- 商品类型ID
	`gtp_name` CHAR(20) NOT NULL  -- 价格属性名称
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gt_price` ADD PRIMARY KEY (`gtp_id`);
ALTER TABLE `gt_price` MODIFY `gtp_id` INT UNSIGNED AUTO_INCREMENT;

INSERT INTO gt_price(`gt_id`,`gtp_name`) VALUES(1,'版本'),(1,'颜色'),(1,'容量'),(1,'套餐'),(2,'版本'),(2,'套餐');

-- 商品价格名
DROP TABLE IF EXISTS `g_price`;
CREATE TABLE `g_price`(
	`gp_id` INT  NOT NULL,          -- ID
	`g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gtp_id` INT UNSIGNED NOT NULL ,-- 商品类型价格ID
  `gp_name` CHAR(20) NOT NULL     -- 价格属性
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `g_price` ADD PRIMARY KEY (`gp_id`);
ALTER TABLE `g_price` MODIFY `gp_id` INT UNSIGNED AUTO_INCREMENT;

INSERT INTO g_price(`g_id`,`gtp_id`,`gp_name`)VALUES (1,1,'亚太'),(1,1,'欧版'),(1,1,'国行'),(1,2,'红色'),(1,2,'白色'),(1,3,'16'),(1,3,'32'),(1,4,'套餐1');
INSERT INTO g_price(`g_id`,`gtp_id`,`gp_name`)VALUES (2,5,'亚太'),(2,5,'欧版'),(2,5,'国行'),(2,6,'套餐1'),(2,6,'套餐2');



-- 商品组合价格
DROP TABLE IF EXISTS `g_price_info`;
CREATE TABLE  `g_price_info`(
  `gpi_id` INT NOT NULL ,    -- ID
  `g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gpi_img` VARCHAR(200) ,   -- 图片
  `gpi_sum` INT UNSIGNED NOT NULL DEFAULT 0,  -- 数量
  `gpi_price` float(8,2)   -- 价格
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `g_price_info` ADD PRIMARY KEY (`gpi_id`);
ALTER TABLE `g_price_info` MODIFY `gpi_id` INT UNSIGNED AUTO_INCREMENT;

INSERT INTO `g_price_info`(`g_id`,`gpi_img`,`gpi_sum`,`gpi_price`)VALUES (1,'aaa',100,1688), (1,'qqqqq',88,2088) ,(1,'aaqqqa',100,1999);

DROP TABLE IF EXISTS `g_price_list`;
-- 商品组合价格连接表
CREATE TABLE  `g_price_list`(
  `gpi_id` INT UNSIGNED NOT NULL ,   -- 商品组合价格ID
  `gp_id` INT UNSIGNED NOT NULL  -- 商品价格属性ID
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `g_price_list` ADD PRIMARY KEY (`gpi_id`,`gp_id`);
INSERT INTO g_price_list(`gp_id`,`gpi_id`) VALUES (1,1),(4,1),(6,1),(7,1),(1,2),(4,2),(5,2),(7,2),(2,3),(6,3),(7,3);



-- 购物车
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`(
	`c_id` INT NOT NULL,         -- ID
	`u_id` INT UNSIGNED NOT NULL, -- 用户ID
	`gps_id` INT UNSIGNED NOT NULL, --  商品ID
	`c_sum` INT UNSIGNED NOT NULL DEFAULT 1  -- 数量
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `cart` ADD PRIMARY KEY (`c_id`);
ALTER TABLE `cart` MODIFY `c_id` INT UNSIGNED AUTO_INCREMENT;

-- 收藏夹
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect`(
	`c_id` INT NOT NULL,  -- ID
	`u_id` INT UNSIGNED NOT NULL, -- 用户ID
	`g_id` INT UNSIGNED NOT NULL  -- 商品ID

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `collect` ADD PRIMARY KEY (`c_id`);
ALTER TABLE `collect` MODIFY `c_id` INT UNSIGNED AUTO_INCREMENT;


-- 订单
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order`(
	`o_id` INT NOT NULL ,      --
	`u_id` INT UNSIGNED NOT NULL,  -- 用户ID
	`o_number` CHAR(20) NOT NULL,  -- 订单编号
	`o_regtime` TIMESTAMP DEFAULT NOW(), -- 订单产生时间
	`o_status` tinyINT NOT NULL DEFAULT 1  -- 订单状态

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `order` ADD PRIMARY KEY (`o_id`);
ALTER TABLE `order` MODIFY `o_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `order` ADD UNIQUE (`o_number`);

-- 订单详细商品
DROP TABLE IF EXISTS `order_goods`;
CREATE TABLE `order_goods`(
	`og_id` INT NOT NULL ,       -- ID
	`o_id` INT UNSIGNED NOT NULL,  -- 订单ID
	`gps_id` INT UNSIGNED NOT NULL  -- 商品ID

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `order_goods` ADD PRIMARY KEY (`og_id`);
ALTER TABLE `order_goods` MODIFY `og_id` INT UNSIGNED AUTO_INCREMENT;


--  页面SEO设置
DROP TABLE IF EXISTS `web_info`;
CREATE TABLE `web_info`(
	`key` CHAR(20) NOT NULL,  -- key
	`title` CHAR(100) NOT NULL, -- 标题
	`keywords` CHAR(200) NOT NULL,  -- 关键字
	`description` CHAR(200) NOT NULL   -- 描述
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `web_info` ADD PRIMARY KEY (`key`);
INSERT INTO `web_info`(`key`,`title`,`keywords`,`description`) VALUES('index','星火数码','手机，相机','599只要599');

DROP VIEW IF EXISTS `admin_info_v`;
CREATE VIEW `admin_info_v` AS
	SELECT
		`a_id`,
		`a_name`,
		`a_reg`,
		admin.aa_id as `aa_id`,
		`aa_nick`,
		`a_img`,
		`a_status`,
		`a_nick`
	FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id;


DROP VIEW IF EXISTS `admin_auth_v`;
CREATE VIEW `admin_auth_v` AS
	SELECT
		admin_auth.aa_id as `aa_id`,
		auth_list.al_id as `al_id`,
		`aa_nick`,
		`al_key`,
		`al_nick`
	FROM `admin_auth`,`auth_list`,admin_auth_list WHERE admin_auth.aa_id = admin_auth_list.aa_id AND auth_list.al_id = admin_auth_list.al_id;

DROP VIEW IF EXISTS `goods_info_v`;
CREATE VIEW `goods_info_v` AS
	SELECT
		`g_id`,
		`g_number`,
		`g_name` ,
		`gt_name` ,
		`g_price` ,
		`g_reg`,
		`g_status`,
		goods.gt_id as `gt_id`
	FROM goods,goods_type WHERE goods.gt_id = goods_type.gt_id ;

DROP VIEW IF EXISTS `g_attr_v`;
CREATE VIEW `g_attr_v` AS
	SELECT
		`ga_id`,
		`g_id`,
		`gt_id`,
		`gta_name`,
		`ga_value` ,
		g_attr.gta_id as 'gta_id'
	FROM g_attr,gt_attr WHERE g_attr.gta_id = gt_attr.gta_id ;

DROP VIEW IF EXISTS `g_price_v`;
CREATE VIEW `g_price_v` AS
	SELECT
		`g_id`,
		`gp_id`,
		g_price.gtp_id as `gtp_id`,
		`gp_name`,
		`gtp_name`
	FROM gt_price,g_price WHERE g_price.gtp_id = gt_price.gtp_id;

DROP VIEW IF EXISTS `system_log_v`;
CREATE VIEW `system_log_v` AS
	SELECT
		`sl_id`,
		`sl_key`,
		`sl_content`,
		`sl_date`,
    system_log.a_id as `a_id`,
		`a_nick`
	FROM system_log,admin WHERE system_log.a_id = admin.a_id;


-- show variables like "%char%";
-- SET character_set_database = utf8;
-- SET character_set_server = utf8;