CREATE TABLE IF NOT EXISTS `roles` (
	`id` int NOT NULL AUTO_INCREMENT,
	`rol` varchar(45) NOT NULL UNIQUE,
	`desc` varchar(45) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `tags` (
	`id` int NOT NULL AUTO_INCREMENT,
	`tag` varchar(45) NOT NULL,
	PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `post_has_tags` (
	`post_id` int(11) NOT NULL,
	`tags_id` int NOT NULL
);

CREATE TABLE IF NOT EXISTS `post` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`title` varchar(100) NOT NULL UNIQUE,
	`cont` varchar(255) NOT NULL UNIQUE,
	`user` int(11) NOT NULL,
	`create_date` datetime NOT NULL DEFAULT NOW(),
	`modify_date` datetime NOT NULL DEFAULT NOW(),
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `comments` (
	`id` int NOT NULL AUTO_INCREMENT,
	`comment` varchar(45) NOT NULL UNIQUE,
	`user` int(11) NOT NULL,
	`post` int(11) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `user` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` varchar(45) NOT NULL UNIQUE,
	`email` varchar(90) NOT NULL UNIQUE,
	`passwd` varchar(64) NOT NULL,
	`rol` int NOT NULL,
	PRIMARY KEY (`id`)
);


ALTER TABLE `user` ADD CONSTRAINT `user_fk0` FOREIGN KEY (`rol`) REFERENCES `roles`(`id`);

ALTER TABLE `post_has_tags` ADD CONSTRAINT `post_has_tags_fk0` FOREIGN KEY (`tags_id`) REFERENCES `tags`(`id`);

ALTER TABLE `post_has_tags` ADD CONSTRAINT `post_has_tags_fk1` FOREIGN KEY (`post_id`) REFERENCES `post`(`id`);

ALTER TABLE `post` ADD CONSTRAINT `post_fk0` FOREIGN KEY (`user`) REFERENCES `user`(`id`);

ALTER TABLE `comments` ADD CONSTRAINT `comments_fk0` FOREIGN KEY (`user`) REFERENCES `user`(`id`);

ALTER TABLE `comments` ADD CONSTRAINT `comments_fk1` FOREIGN KEY (`post`) REFERENCES `post`(`id`);
