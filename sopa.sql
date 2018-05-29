drop database if exists `sopadeletras`;
create database `sopadeletras`;
use `sopadeletras`;
CREATE TABLE `categoria` (
`id` int(11) NOT NULL,
`categoria` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `palabra` (
`id` int(11) NOT NULL,
`categoria_id` int(11) NOT NULL,
`palabra` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `palabra` ADD PRIMARY KEY (`id`);
ALTER TABLE `categoria` ADD PRIMARY KEY (`id`);
ALTER TABLE `palabra` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
ALTER TABLE `categoria` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
ALTER TABLE `palabra` ADD CONSTRAINT `fkCategoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `categoria` (`id`, `categoria`) VALUES
('','Coches'),
('','Marcas de movil'),
('','Marcas de ropa');
INSERT INTO `palabra` (`id`, `categoria_id`, `palabra`) VALUES
('','1','renault'),
('','1','volvo'),
('','1','peugeot'),
('','1','seat'),
('','1','mazda'),
('','1','nissan'),
('','1','audi'),
('','2','lenovo'),
('','2','xiaomi'),
('','2','lg'),
('','2','motorola'),
('','2','meizu'),
('','2','htc'),
('','2','apple'),
('','3','nike'),
('','3','puma'),
('','3','levis'),
('','3','adidas'),
('','3','reebok'),
('','3','lacoste'),
('','3','gucci');