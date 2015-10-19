# Trianglenine

## Create Table
CREATE TABLE IF NOT EXISTS `order_image` (
  `id` int(11) unsigned NOT NULL,
  `status` int(11) unsigned NOT NULL,
  `created_time` datetime NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_time` datetime NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `order_image` ADD PRIMARY KEY (`id`);
ALTER TABLE `order_image` MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
