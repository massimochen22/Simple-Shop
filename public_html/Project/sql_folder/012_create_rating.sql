CREATE TABLE IF NOT EXISTS `Ratings` (
    `id` INT NOT NULL AUTO_INCREMENT
    ,`product_id` INT
    ,`user_id` INT
    ,`rating` INT(5)
    ,`comment` TEXT
    ,`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,FOREIGN KEY (`user_id`) REFERENCES Users(`id`)
    ,FOREIGN KEY (`product_id`) REFERENCES Products(`id`)
    ,PRIMARY KEY (`id`)
)