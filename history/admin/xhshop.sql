

--  管理员权限
DROP TABLE IF EXISTS `adminAuth`;
CREATE TABLE  `adminAuth` (
	`aa_id` INT NOT NULL , -- ID
	`aa_nick` CHAR(20) NOT NULL ,  -- 昵称
	`aa_remark` VARCHAR(50)    -- 备注
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminAuth` ADD PRIMARY KEY (`aa_id`);
ALTER TABLE `adminAuth` MODIFY `aa_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `adminAuth` ADD UNIQUE (`aa_nick`);
INSERT INTO `adminAuth` (`aa_nick`,`aa_remark`) VALUES ('超级管理员','系统的主宰'),('普通管理员','一般的管理');

DROP TABLE IF EXISTS `authList`;
-- 权限列表
CREATE TABLE `authList`(
	`al_id` INT NOT NULL , -- ID
  `al_key` CHAR(20) NOT NULL ,
	`al_nick` CHAR(20) NOT NULL ,     -- 昵称
	`al_remark` VARCHAR(50)    -- 备注
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `authList` ADD PRIMARY KEY (`al_id`);
ALTER TABLE `authList` ADD UNIQUE(`al_key`);
ALTER TABLE `authList` MODIFY `al_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO `authList` (`al_key`,`al_nick`,`al_remark`) VALUES ('report','报表统计','营运状况'),('service','客服管理','管理客服'),('order','订单管理','订单处理'),('goods','商品管理','商品各种操作');
INSERT INTO `authList` (`al_key`,`al_nick`,`al_remark`) VALUES ('admin','管理员管理',''),('log','系统日志','查看系统日志'),('adminAuth','管理员权限管理','');
INSERT INTO `authList` (`al_key`,`al_nick`,`al_remark`) VALUES ('goodsType','商品类型管理',''),('goodsinfo','商品管理',''),('recommend','推荐商品管理','');


--  连接表
DROP TABLE IF EXISTS `adminAuthList`;
CREATE TABLE `adminAuthList`(
	`aal_id` INT NOT NULL , -- ID
	`al_id` INT UNSIGNED NOT NULL ,     -- 权限列表ID
	`aa_id` INT UNSIGNED NOT NULL   -- 权限ID
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminAuthList` ADD PRIMARY KEY (`aal_id`);
ALTER TABLE `adminAuthList` MODIFY `aal_id` INT UNSIGNED AUTO_INCREMENT;

-- 管理员
DROP TABLE IF EXISTS `adminInfo`;
CREATE TABLE `adminInfo`(
	`a_id` INT  NOT NULL,             -- 管理员ID
	`a_name` CHAR(20) NOT NULL,       -- 管理员账号
	`a_pwd` CHAR(32) NOT NULL,        -- 密码
	`a_reg` TIMESTAMP DEFAULT NOW(),  -- 注册时间
	`a_img` VARCHAR(200) ,             -- 头像图片
	`a_nick` CHAR(20)  ,                -- 真实姓名
	`aa_id` INT UNSIGNED NOT NULL    -- 权限ID
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;

ALTER TABLE `adminInfo` ADD PRIMARY KEY (`a_id`);
ALTER TABLE `adminInfo` MODIFY `a_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `adminInfo` ADD UNIQUE (`a_name`);
INSERT INTO `adminInfo`(`a_name`,`a_pwd` ,`a_nick`,`aa_id`) VALUES('xieyanghui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢扬辉',1),('yefengxi' , 'e10adc3949ba59abbe56e057f20f883e' ,'逗比',2);

-- 管理员日志
DROP TABLE IF EXISTS `adminLog`;
CREATE TABLE `adminLog`(
	`alog_id` INT NOT NULL ,          -- 管理员日志 ID
	`a_id` INT UNSIGNED NOT NULL ,  -- 管理员ID
	`alog_key` CHAR(20) NOT NULL ,  -- 事件KEY
  `alog_content` VARCHAR(200) NOT NULL ,-- 事件详细
	`date` TIMESTAMP DEFAULT NOW()    -- 事件时间

)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminLog` ADD PRIMARY KEY (`alog_id`);
ALTER TABLE `adminLog` MODIFY `alog_id` INT UNSIGNED AUTO_INCREMENT;

-- 管理员登录日志
DROP TABLE IF EXISTS `adminLoginLog`;
CREATE TABLE `adminLoginLog`(
	`all_id` INT NOT NULL ,           --  ID
	`a_id` INT UNSIGNED NOT NULL ,    -- 管理员ID
	`ip` CHAR(16) NOT NULL ,           -- 登录IP
	`date` TIMESTAMP DEFAULT NOW()    -- 事件时间
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminLoginLog` ADD PRIMARY KEY (`all_id`);
ALTER TABLE `adminLoginLog` MODIFY `all_id` INT UNSIGNED AUTO_INCREMENT;

-- 管理员图片空间
DROP TABLE IF EXISTS `adminImgScope`;
CREATE TABLE `adminImgScope`(
  `ais_id` INT NOT NULL,    -- ID
  `ais_name` CHAR(40) ,      -- 图片名
  `a_id` INT UNSIGNED NOT NULL , -- 用户ID
  `ais_imgurl` VARCHAR(500) NOT NULL ,  -- 图片路径
  `ais_type` CHAR(20) NOT NULL ,     -- 图片分类
  `ais_time` TIMESTAMP DEFAULT NOW()  -- 上传时间
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminImgScope` ADD PRIMARY KEY (`ais_id`);
ALTER TABLE `adminImgScope` MODIFY `ais_id` INT UNSIGNED AUTO_INCREMENT;

-- 用户
DROP TABLE IF EXISTS `userInfo`;
CREATE TABLE `userInfo`(
	`u_id` INT NOT NULL ,          -- 用户ＩＤ
	`u_name` CHAR(20) NOT NULL,    -- 账号
	`u_pwd` CHAR(32) NOT NULL,     -- 密码
	`u_nick` CHAR(20),              -- 昵称
	`u_phone` CHAR(11) ,            -- 手机号码
	`u_email` CHAR(40) ,            -- 电子邮件
	`u_reg` TIMESTAMP DEFAULT NOW(), -- 注册时间
	`u_img` CHAR(200)                -- 头像
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;

ALTER TABLE `userInfo` ADD PRIMARY KEY (`u_id`);
ALTER TABLE `userInfo` MODIFY `u_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `userInfo` ADD UNIQUE (`u_name` , `u_phone`);
INSERT INTO `userInfo` (`u_name`,`u_pwd` ,`u_nick`,`u_phone`,`u_email`) VALUES('xiehui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢辉','18588711500' ,'xieiyanghui@126.com');

DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`(
  `add_id` INT NOT NULL,
  `add_name` CHAR(20) NOT NULL ,
  `add_number` CHAR(12) NOT NULL ,
  `add_parend` CHAR(12) NOT NULL DEFAULT '0',
  `add_cx` CHAR(3) NOT NULL
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `address` ADD PRIMARY KEY (`add_id`);
ALTER TABLE `address` MODIFY `add_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `address` ADD UNIQUE (`add_name`,`add_number`);

-- 商品类型
DROP TABLE IF EXISTS `goodsType`;
CREATE TABLE `goodsType`(
	`gt_id` INT NOT NULL ,  -- ID
	`gt_number` CHAR(5) NOT NULL,  -- 商品类型编号
	`gt_name` CHAR(20) NOT NULL ,   -- 类型名称
	`gt_remark` CHAR(60)             -- 备注
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `goodsType` ADD PRIMARY KEY (`gt_id`);
ALTER TABLE `goodsType` MODIFY `gt_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `goodsType` ADD UNIQUE (`gt_name`,`gt_number`);

INSERT INTO goodsType (`gt_number`,`gt_name`,`gt_remark`)VALUES('01001','手机','手机，合约机，各种定制机器'),
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
DROP TABLE IF EXISTS `gtAttr`;
CREATE TABLE `gtAttr`(
  `gta_id` INT  NOT NULL,        -- ID
  `gt_id` INT UNSIGNED NOT NULL, -- 类型ID
  `gta_name` CHAR(20) NOT NULL    -- 属性名
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gtAttr` ADD PRIMARY KEY (`gta_id`);
ALTER TABLE `gtAttr` MODIFY `gta_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO gtAttr(`gt_id`,`gta_name`)VALUES(1,'品牌'),(1,'型号'),(1,'屏幕尺寸'),(1,'分辨率'),(1,'CPU'),(1,'前置摄像头'),(1,'后置摄像头'),(1,'长'),(1,'厚'),(1,'宽'),(1,'RAM'),(1,'上市时间'),(2,'品牌'),(2,'型号'),(2,'像素'),(2,'显示屏类型'),(2,'上市时间');

-- 商品属性
DROP TABLE IF EXISTS `gAttrValue`;
CREATE TABLE `gAttrValue`(
  `gav_id` INT UNSIGNED NOT NULL,   -- ID
  `g_id` INT UNSIGNED NOT NULL,     -- 商品ID
  `gta_id` INT UNSIGNED NOT NULL,   -- 商品属性ID
  `gav_value` CHAR(20)              -- 值
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gAttrValue` ADD PRIMARY KEY (`gav_id`);
ALTER TABLE `gAttrValue` MODIFY `gav_id` INT UNSIGNED AUTO_INCREMENT;

-- 商品类型属性价格
DROP TABLE IF EXISTS `gtAttrPrice`;
CREATE TABLE `gtAttrPrice`(
	`gtap_id` INT  NOT NULL,             -- ID
	`gt_id` INT UNSIGNED NOT NULL,      -- 商品类型ID
	`gtap_name` CHAR(20) NOT NULL  -- 价格属性名称
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gtAttrPrice` ADD PRIMARY KEY (`gtap_id`);
ALTER TABLE `gtAttrPrice` MODIFY `gtap_id` INT UNSIGNED AUTO_INCREMENT;

INSERT INTO gtAttrPrice(`gt_id`,`gtap_name`) VALUES(1,'版本'),(1,'颜色'),(1,'容量'),(1,'套餐'),(2,'版本'),(2,'套餐');

-- 商品价格属性
DROP TABLE IF EXISTS `gPriceAttr`;
CREATE TABLE `gPriceAttr`(
	`gpa_id` INT  NOT NULL,          -- ID
	`g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gtap_id` INT UNSIGNED NOT NULL ,-- 商品类型价格属性名
  `gpa_name` CHAR(20) NOT NULL     -- 价格属性
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gPriceAttr` ADD PRIMARY KEY (`gpa_id`);
ALTER TABLE `gPriceAttr` MODIFY `gpa_id` INT UNSIGNED AUTO_INCREMENT;

DROP TABLE IF EXISTS `gPrices`;
-- 商品组合价格
CREATE TABLE  `gPrices`(
  `gps_id` INT NOT NULL ,
  `g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gps_img` VARCHAR(200) ,   -- 图片
  `gps_sum` INT UNSIGNED NOT NULL DEFAULT 0,  -- 数量
  `gps_price` float(8,2)   -- 价格
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `gPrices` ADD PRIMARY KEY (`gps_id`);
ALTER TABLE `gPrices` MODIFY `gps_id` INT UNSIGNED AUTO_INCREMENT;

DROP TABLE IF EXISTS `gPricesLink`;
-- 商品组合价格连接表
CREATE TABLE  `gPricesLink`(
  `gpsl_id` INT NOT NULL ,
  `g_id` INT UNSIGNED NOT NULL,  -- 商品ID
  `gps_id` INT UNSIGNED NOT NULL ,   -- 商品组合价格ID
  `gpa_id` INT UNSIGNED NOT NULL  -- 商品价格属性ID
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;
ALTER TABLE `gPricesLink` ADD PRIMARY KEY (`gpsl_id`);
ALTER TABLE `gPricesLink` MODIFY `gpsl_id` INT UNSIGNED AUTO_INCREMENT;



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
	`o_id` INT NOT NULL ,      -- ID
	`u_id` INT UNSIGNED NOT NULL,  -- 用户ID
	`o_number` CHAR(20) NOT NULL,  -- 订单编号
	`o_regtime` TIMESTAMP DEFAULT NOW(), -- 订单产生时间
	`o_status` tinyINT NOT NULL DEFAULT 1  -- 订单状态

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `order` ADD PRIMARY KEY (`o_id`);
ALTER TABLE `order` MODIFY `o_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `order` ADD UNIQUE (`o_number`);

-- 订单详细商品
DROP TABLE IF EXISTS `orderGoods`;
CREATE TABLE `orderGoods`(
	`og_id` INT NOT NULL ,       -- ID
	`o_id` INT UNSIGNED NOT NULL,  -- 订单ID
	`gps_id` INT UNSIGNED NOT NULL  -- 商品ID

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `orderGoods` ADD PRIMARY KEY (`og_id`);
ALTER TABLE `orderGoods` MODIFY `og_id` INT UNSIGNED AUTO_INCREMENT;


--  页面SEO设置
DROP TABLE IF EXISTS `webInfo`;
CREATE TABLE `webInfo`(
	`key` CHAR(20) NOT NULL,  -- key
	`title` CHAR(100) NOT NULL, -- 标题
	`keywords` CHAR(200) NOT NULL,  -- 关键字
	`description` CHAR(200) NOT NULL   -- 描述
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `webInfo` ADD PRIMARY KEY (`key`);
INSERT INTO `webInfo`(`key`,`title`,`keywords`,`description`) VALUES('index','星火数码','手机，相机','599只要599');



