

#管理员权限
CREATE TABLE  `adminAuth` (
	`aa_id` INT NOT NULL , -- ID
	`aa_nick` CHAR(20) NOT NULL ,     -- 昵称
	`aa_remark` VARCHAR(50)    -- 备注
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminAuth` ADD PRIMARY KEY (`aa_id`);
ALTER TABLE `adminAuth` MODIFY `aa_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO `adminAuth` (`aa_nick`,`aa_remark`) VALUES ('超级管理员','系统的主宰'),('普通管理员','一般的管理');


#权限列表
CREATE TABLE `authList`(
	`al_id` INT NOT NULL , -- ID
	`al_nick` CHAR(20) NOT NULL ,     -- 昵称
	`al_remark` VARCHAR(50)    -- 备注
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `authList` ADD PRIMARY KEY (`al_id`);
ALTER TABLE `authList` MODIFY `al_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO `authList` (`al_nick`,`al_remark`) VALUES ('系统管理','系统的核心'),('报表统计','营运状况');

# 连接表
CREATE TABLE `adminAuthList`(
	`aal_id` INT NOT NULL , -- ID
	`al_id` INT UNSIGNED NOT NULL ,     -- 权限列表ID
	`aa_id` INT UNSIGNED NOT NULL   -- 权限ID
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminAuthList` ADD PRIMARY KEY (`aal_id`);
ALTER TABLE `adminAuthList` MODIFY `aal_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO `adminAuthList` (`aa_id`,`al_id`) VALUES (1,1),(1,2),(2,2);


#管理员
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


#日志事件
CREATE TABLE `logEvent`(
	`le_id` INT NOT NULL ,       -- 日志ID
	`event` VARCHAR(100)          --  事件
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `logEvent` ADD PRIMARY KEY (`le_id`);
ALTER TABLE `logEvent` MODIFY `le_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO  `logEvent` (`event`) VALUES ('登录');

#管理员日志
CREATE TABLE `adminLog`(
	`al_id` INT NOT NULL ,          -- 管理员日志 ID
	`a_id` INT UNSIGNED NOT NULL ,  -- 管理员ID
	`le_id` INT UNSIGNED NOT NULL ,  -- 事件ID
	`date` TIMESTAMP DEFAULT NOW()    -- 事件时间

)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminLog` ADD PRIMARY KEY (`al_id`);
ALTER TABLE `adminLog` MODIFY `al_id` INT UNSIGNED AUTO_INCREMENT;

#管理员登录日志
CREATE TABLE `adminLoginLog`(
	`all_id` INT NOT NULL ,           --  ID
	`a_id` INT UNSIGNED NOT NULL ,    -- 管理员ID
	`ip` CHAR(16) NOT NULL ,           -- 登录IP
	`date` TIMESTAMP DEFAULT NOW()    -- 事件时间
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;
ALTER TABLE `adminLoginLog` ADD PRIMARY KEY (`all_id`);
ALTER TABLE `adminLoginLog` MODIFY `all_id` INT UNSIGNED AUTO_INCREMENT;

#用户
CREATE TABLE `userInfo`(
	`u_id` INT NOT NULL ,          -- 用户ＩＤ
	`u_name` CHAR(20) NOT NULL,    -- 账号
	`u_pwd` CHAR(32) NOT NULL,     -- 密码
	`u_nick` CHAR(20),              -- 昵称
	`u_phone` CHAR(11) ,            -- 手机号码
	`u_email` CHAR(40) ,            --  电子邮件
	`u_reg` TIMESTAMP DEFAULT NOW(), -- 注册时间
	`u_img` CHAR(200)                -- 头像
)DEFAULT CHARSET = utf8 ENGINE=MyISAM;

ALTER TABLE `userInfo` ADD PRIMARY KEY (`u_id`);
ALTER TABLE `userInfo` MODIFY `u_id` INT UNSIGNED AUTO_INCREMENT;
ALTER TABLE `userInfo` ADD UNIQUE (`u_name` , `u_phone`);
INSERT INTO `userInfo` (`u_name`,`u_pwd` ,`u_nick`,`u_phone`,`u_email`) VALUES('xiehui' , 'e10adc3949ba59abbe56e057f20f883e' ,'谢辉','18588711500' ,'xieiyanghui@126.com');


#商品类型
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

#商品
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
	('0100200001','一加one',2,1999.99,'100000s，wifi','不错的一款相机' );
#商品类型属性价格
CREATE TABLE `gtAttrPrice`(
	`gtap_id` INT  NOT NULL,             -- ID
	`gt_id` INT UNSIGNED NOT NULL,      -- 商品类型ID
	`gtap_attrName` CHAR(20) NOT NULL,  -- 价格属性名称
	`gtap_priceName` tinyINT NOT NULL   -- 价格关键字 1-4
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gtAttrPrice` ADD PRIMARY KEY (`gtap_id`);
ALTER TABLE `gtAttrPrice` MODIFY `gtap_id` INT UNSIGNED AUTO_INCREMENT;

INSERT INTO gtAttrPrice(`gt_id`,`gtap_attrName`,`gtap_priceName`) VALUES(1,'版本',1),(1,'颜色',2),(1,'容量',3),(1,'套餐',4),(2,'版本',1),(2,'套餐',2);

#商品价格
CREATE TABLE `gPriceValue`(
	`gp_id` INT  NOT NULL,          -- ID
	`g_id` INT UNSIGNED NOT NULL,  -- 商品ID
	`gp1` CHAR(20) ,           -- 属性1
	`gp2` CHAR(20) ,           -- 属性2
	`gp3` CHAR(20) ,           -- 属性3
	`gp4` CHAR(20) ,           -- 属性4
	`gp_img` VARCHAR(200) ,   -- 图片
	`gp_price` float(8,2) NOT NULL   -- 价格
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gPriceValue` ADD PRIMARY KEY (`gp_id`);
ALTER TABLE `gPriceValue` MODIFY `gp_id` INT UNSIGNED AUTO_INCREMENT;

#商品类型属性
CREATE TABLE `gtAttr`(
	`gta_id` INT  NOT NULL,        -- ID
	`gt_id` INT UNSIGNED NOT NULL, -- 类型ID
	`gta_name` CHAR(20) NOT NULL    -- 属性名
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gtAttr` ADD PRIMARY KEY (`gta_id`);
ALTER TABLE `gtAttr` MODIFY `gta_id` INT UNSIGNED AUTO_INCREMENT;
INSERT INTO gtAttr(`gt_id`,`gta_name`)VALUES(1,'品牌'),(1,'型号'),(1,'屏幕尺寸'),(1,'分辨率'),(1,'CPU'),(1,'前置摄像头'),(1,'后置摄像头'),(1,'长'),(1,'厚'),(1,'宽'),(1,'RAM'),(1,'上市时间'),(2,'品牌'),(2,'型号'),(2,'像素'),(2,'显示屏类型'),(2,'上市时间');

#商品属性
CREATE TABLE `gAttrValue`(
	`gav_id` INT UNSIGNED NOT NULL,   -- ID
	`g_id` INT UNSIGNED NOT NULL,     -- 商品ID
	`gta_id` INT UNSIGNED NOT NULL,   -- 商品属性ID
	`gav_value` CHAR(20)              -- 值
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `gAttrValue` ADD PRIMARY KEY (`gav_id`);
ALTER TABLE `gAttrValue` MODIFY `gav_id` INT UNSIGNED AUTO_INCREMENT;

#购物车
CREATE TABLE `cart`(
	`c_id` INT NOT NULL,
	`u_id` INT UNSIGNED NOT NULL,
	`gp_id` INT UNSIGNED NOT NULL,
	`c_sum` INT UNSIGNED NOT NULL DEFAULT 1
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `cart` ADD PRIMARY KEY (`c_id`);
ALTER TABLE `cart` MODIFY `c_id` INT UNSIGNED AUTO_INCREMENT;



#购物车详细视图
CREATE VIEW cartinfo AS
	select 	cart.c_id AS c_id ,
					cart.c_sum AS c_sum ,
					cart.gp_id AS gp_id ,
					gPriceValue.g_id AS g_id,
					gPriceValue.gp_img AS gp_img,
					gPriceValue.gp_price AS gp_price,
					gPriceValue.gp1 AS gp1,
					gPriceValue.gp2 AS gp2,
					gPriceValue.gp3 AS gp3,
					gPriceValue.gp4 AS gp4 FROM cart, gPriceValue WHERE cart.gp_id = gPriceValue.gp_id ;


#收藏夹
CREATE TABLE `collect`(
	`c_id` INT NOT NULL,
	`u_id` INT UNSIGNED NOT NULL,
	`g_id` INT UNSIGNED NOT NULL

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `collect` ADD PRIMARY KEY (`c_id`);
ALTER TABLE `collect` MODIFY `c_id` INT UNSIGNED AUTO_INCREMENT;

#收藏夹详细视图

CREATE VIEW `collectInfo` AS
	SELECT  collect.c_id AS `c_id` ,
					collect.g_id AS `g_id` ,
					collect.u_id AS `u_id` ,
					goods.g_name AS `g_name` ,
					goods.g_img  AS  `g_img` FROM goods ,collect WHERE goods.g_id = collect.g_id;



#订单
CREATE TABLE `order`(
	`o_id` INT NOT NULL ,
	`u_id` INT UNSIGNED NOT NULL,
	`o_number` INT UNSIGNED NOT NULL,
	`o_regtime` TIMESTAMP DEFAULT NOW(),
	`o_status` tinyINT NOT NULL DEFAULT 1

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `order` ADD PRIMARY KEY (`o_id`);
ALTER TABLE `order` MODIFY `o_id` INT UNSIGNED AUTO_INCREMENT;


#订单商品
CREATE TABLE `orderGoods`(
	`og_id` INT NOT NULL ,
	`o_id` INT UNSIGNED NOT NULL,
	`gp_id` INT UNSIGNED NOT NULL

)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `orderGoods` ADD PRIMARY KEY (`og_id`);
ALTER TABLE `orderGoods` MODIFY `og_id` INT UNSIGNED AUTO_INCREMENT;

CREATE TABLE `webInfo`(
	`key` CHAR(20) NOT NULL,
	`title` CHAR(100) NOT NULL,
	`keywords` CHAR(200) NOT NULL,
	`description` CHAR(200) NOT NULL
)DEFAULT CHARSET =utf8 ENGINE=MyISAM;

ALTER TABLE `webInfo` ADD PRIMARY KEY (`key`);
INSERT INTO `webInfo`(`key`,`title`,`keywords`,`description`) VALUES('index','星火数码','手机，相机','599只要599');



