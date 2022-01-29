DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(16) NOT NULL,
  `name` varchar(30) NOT NULL,
  `creator` int(10) unsigned DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modifier` int(10) unsigned DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO myfuel.users (id, account, name, creator, created, modifier, modified, deleted) VALUES (1, 'admin', '管理人', 1, '2022-01-26 22:35:19', 1, '2022-01-26 22:35:29', null);
INSERT INTO myfuel.users (id, account, name, creator, created, modifier, modified, deleted) VALUES (2, 'guest', 'ゲスト', 1, '2022-01-26 22:36:28', 1, '2022-01-26 22:36:40', null);
INSERT INTO myfuel.users (id, account, name, creator, created, modifier, modified, deleted) VALUES (3, 'hoge', 'ほげ', 1, '2022-01-26 22:36:28', 1, '2022-01-26 22:36:40', null);


