
--Dados usuários
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `cidade` int(11) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cliente` char(1) DEFAULT NULL,
  `administrador` char(1) DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

INSERT INTO `usuario` (`id`, `nome`, `estado`, `cidade`, `email`, `senha`, `cliente`, `administrador`, `data_cadastro`) VALUES
(5, 'Fabio Barros', 33, 3300936, 'fabio.junior643@outlook.com', '123456', 's', 'S', '2021-04-06 02:17:03'),
(6, 'João Pedro', 23, 2301000, 'cbm@dev.com', '123456', 's', 'N', '2021-04-06 07:24:35'),
(7, 'Matheus', 16, 1600550, 'desenv@desenv.com', '789456', 's', 'N', '2021-04-06 07:24:54');

-- Dados produtos
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(400) DEFAULT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

INSERT INTO `produto` (`id`, `nome`, `descricao`, `valor`) VALUES
(13, 'Horizon Forbidden West', 'Acompanhe Aloy ao enfrentar o Oeste Proibido em uma fronteira majestosa, mas perigosa, escondendo novas e misteriosas ameaças.', 35),
(14, 'Ratchet & Clank: Em uma outra dimensão', 'Abra caminho em uma aventura interdimensional com Ratchet e Clank.', 80),
(15, 'Gran TurismoTM 7', 'O Gran Turismo 7 baseia-se em 22 anos de experiência para oferecer a você os melhores recursos da história da franquia.', 150),
(16, 'Returnal', 'Quebre o ciclo do caos em um planeta alienígena em constante mudança neste jogo de tiro em terceira pessoa, no estilo anti-herói.', 123),
(17, 'Sackboy: Uma Grande Aventura', 'Acompanhe Sackboy e seus amigos em uma aventura épica em plataforma 3D.', 35);