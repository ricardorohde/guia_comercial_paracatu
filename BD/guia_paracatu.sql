CREATE DATABASE guia_paracatu;
use guia_paracatu;

CREATE TABLE supersu(
    Id_senha int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    senha text NOT NULL
);

INSERT INTO `supersu` (`IdSenha`, `senha`) VALUES (NULL, '');

CREATE TABLE user (
  `id_user` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login` text  NOT NULL,
  `senha` text  NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `categoria` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` text  NOT NULL,
  `endereco` text  NOT NULL,
  `telefone` text  NOT NULL,
  `celular` text  NOT NULL,
  `servicos` text  NOT NULL,
  `categoria` int(11) NOT NULL,
  `categoria_dois` int(11) DEFAULT NULL,
  `categoria_tres` int(11) DEFAULT NULL,
  `logo` text  DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `propaganda` (
  `id_propaganda` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `caminho` text not null,
  `descricao` text not null,
  `link` text not null,
  `id_empresa` int(11)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `destaques` (
  `id_destaque` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `destaque` text not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `empresa`
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `id_categoria_dois` FOREIGN KEY (`categoria_dois`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `id_categoria_tres` FOREIGN KEY (`categoria_tres`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

ALTER TABLE `propaganda`
  ADD CONSTRAINT `id_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);
