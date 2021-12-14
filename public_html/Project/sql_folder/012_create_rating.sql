id, product_id, user_id, rating, comment, created

CREATE TABLE IF NOT EXISTS `Ratings` (
    `id` INT NOT NULL AUTO_INCREMENT
    ,`product_id` VARCHAR(100) NOT NULL
    ,`user_id` INT
    ,`rating` INT(5)
    ,`comment` TEXT
    ,`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    ,`modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ,PRIMARY KEY (`id`)
    ,UNIQUE (`email`)
)