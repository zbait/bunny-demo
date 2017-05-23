CREATE DATABASE bunny;
use bunny;

DROP TABLE IF EXISTS `user_bunny`;
CREATE TABLE `user_bunny` (
  `id` varchar(32) NOT NULL COMMENT '主键',
  `username` varchar(20) DEFAULT NULL COMMENT '帐号',
  `password` varchar(20) DEFAULT NULL COMMENT '密码',
  `mail` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `tel` varchar(14) DEFAULT NULL COMMENT '电话',
  `create_time` datetime DEFAULT NULL COMMENT '记录插入时间',
  `update_time` datetime DEFAULT NULL COMMENT '记录更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


insert into user_bunny (id,username,password,mail,tel) values('id0','光头强',000,'guangtou@qq.com',1340987657);
insert into user_bunny (id,username,password,mail,tel) values('id1','熊大',111,'xiongda@qq.com',1345121212);
insert into user_bunny (id,username,password,mail,tel) values('id2','熊二',222,'xionger@qq.com',1345121121);
insert into user_bunny (id,username,password,mail,tel) values('id3','张三',333,'zhangsan@qq.com',1314498334);
insert into user_bunny (id,username,password,mail,tel) values('id4','李四',444,'lisi@qq.com',1724952948);
insert into user_bunny (id,username,password,mail,tel) values('id5','王五',555,'wangwu@qq.com',1818485638);
insert into user_bunny (id,username,password,mail,tel) values('id6','赵六',666,'zhaoliu@qq.com',1340987657);
insert into user_bunny (id,username,password,mail,tel) values('id7','毛毛',777,'maomao@qq.com',1340902643);
insert into user_bunny (id,username,password,mail,tel) values('id8','吉吉',888,'jiji@qq.com',1340982124);
insert into user_bunny (id,username,password,mail,tel) values('id9','笨笨',999,'benben@qq.com',1340212122);
