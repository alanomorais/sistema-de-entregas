-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para entrega
CREATE DATABASE IF NOT EXISTS `entrega` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `entrega`;

-- Copiando estrutura para tabela entrega.tb_entrega
CREATE TABLE IF NOT EXISTS `tb_entrega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `previsao_entrega` datetime NOT NULL,
  `data_entrega` datetime DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela entrega.tb_entrega: ~2 rows (aproximadamente)
DELETE FROM `tb_entrega`;
/*!40000 ALTER TABLE `tb_entrega` DISABLE KEYS */;
INSERT INTO `tb_entrega` (`id`, `titulo`, `descricao`, `previsao_entrega`, `data_entrega`, `status`) VALUES
	(3, 'Entrega de Mercadoria', 'Entrega de encomenda para JoÃ£o Igor', '2022-06-08 00:00:00', NULL, '0'),
	(4, 'Entrega de Roupa', 'Entregar na rua 10', '2022-06-09 00:00:00', NULL, '0'),
	(5, 'Entrega de Mercadoria', 'teste', '2022-06-08 00:00:00', NULL, '0');
/*!40000 ALTER TABLE `tb_entrega` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
