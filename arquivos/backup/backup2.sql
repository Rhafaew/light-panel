--
-- Banco de dados: `meu_painel`
--
CREATE DATABASE IF NOT EXISTS meu_painel DEFAULT CHARACTER SET utf8;
USE meu_painel;

--
-- Estrutura para tabela `categorias`
--
DROP TABLE IF EXISTS categorias;
CREATE TABLE `categorias` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `categoria_mae` int(11) NOT NULL,
  PRIMARY KEY (`idcat`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO categorias VALUES("1","CSS","css","2");
INSERT INTO categorias VALUES("2","Programação","programacao","0");
INSERT INTO categorias VALUES("3","Internet","internet","0");
INSERT INTO categorias VALUES("4","Redes","redes","3");
INSERT INTO categorias VALUES("5","PHP","php","2");
INSERT INTO categorias VALUES("6","HTML","html","2");
INSERT INTO categorias VALUES("7","Funções","funcoes","5");

--
-- Estrutura para tabela `conteudo`
--
DROP TABLE IF EXISTS conteudo;
CREATE TABLE `conteudo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `titulo_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `texto` longtext COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `data_mod` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO conteudo VALUES("1","Lorem ipsum dolor sit","lorem-ipsum-dolor-sit","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt massa eget odio accumsan, non congue tortor fermentum. Nunc risus sem, placerat in egestas ut, ullamcorper vitae dolor.","Redes","","05/01/16","09/05/2016","1");
INSERT INTO conteudo VALUES("2","Quisque non arcu","quisque-non-arcu","Quisque non arcu ut diam vestibulum venenatis. Donec vehicula orci vitae nunc lacinia sit amet tincidunt tortor dapibus. Aliquam erat volutpat. Sed gravida sem eget massa fringilla posuere. Nulla ac leo at enim elementum convallis non vitae neque. Nulla sit amet felis erat, in euismod erat.","CSS","","06/01/16","09/05/2016","1");
INSERT INTO conteudo VALUES("3","Nullam sed turpis","nullam-sed-turpis","Nullam sed turpis vel risus dapibus convallis. Nulla porta volutpat felis eget interdum. Mauris vehicula, elit tempus consequat auctor, tellus odio pretium neque, eu congue erat nulla ut elit. Praesent non enim massa, ac aliquet metus.","Programação","","07/01/16","09/05/2016","1");
INSERT INTO conteudo VALUES("4","Luctus a Sapien","luctus-a-sapien","<p>Fusce tristique dui et tellus tincidunt vehicula. Quisque pretium dignissim gravida. Nulla blandit luctus aliquam. Morbi velit risus, vestibulum nec condimentum vestibulum, convallis a risus. Aliquam dignissim vestibulum ligula, vel elementum augue imperdiet nec. Nunc dignissim, mauris vitae bibendum facilisis, metus elit varius sem, ac commodo tellus nunc vel turpis. Suspendisse sit amet quam libero. Nulla viverra sapien et quam dignissim et mollis diam congue. Vestibulum dictum leo id lectus elementum varius. Nam ligula felis, laoreet ut auctor sed, facilisis in massa. Ut ut nisi at libero rhoncus adipiscing. Nullam lacus ipsum, facilisis vel congue eu, . Pellentesque elementum tincidunt mi in ornare. Cras dignissim semper faucibus. Nunc vitae lectus enim, in euismod tortor.</p>","PHP","","08/01/2016","11/07/2016","1");
INSERT INTO conteudo VALUES("5","Nova Imagem","Nova Imagem","Cadastrando imagem","HTML","130f9d292921301a22e5052c84e138f3.png","03/08/2016","","1");
INSERT INTO conteudo VALUES("6","Euismod Tortor","euismod-tortor","<p>Fusce tristique dui et tellus tincidunt vehicula. Quisque pretium dignissim gravida. Nulla blandit luctus aliquam. , vestibulum nec condimentum vestibulum, convallis a risus. Aliquam dignissim vestibulum ligula, vel elementum augue imperdiet nec. Nunc dignissim, mauris vitae bibendum facilisis, metus elit varius sem, ac commodo tellus nunc vel turpis. Suspendisse sit amet quam libero. Nulla viverra sapien et quam dignissim et mollis diam congue. Vestibulum dictum leo id lectus elementum varius. Nam ligula felis, laoreet ut auctor sed, facilisis in massa. Ut ut nisi at libero rhoncus adipiscing. Nullam lacus ipsum, facilisis vel congue eu, . Pellentesque elementum tincidunt mi in ornare. Cras dignissim semper faucibus. Nunc vitae lectus enim, in euismod tortor.</p>","Internet","","08/01/2016","11/07/2016","1");
INSERT INTO conteudo VALUES("7","LOREM Ipsum","LOREM Ipsum","Nullam condimentum nulla sed dolor facilisis, sit amet dignissim mi accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer quis libero risus. Proin lacinia cursus ipsum, sit amet fringilla leo viverra aliquet. Nunc varius gravida leo vel laoreet. Suspendisse ac iaculis risus. Aliquam eu purus fringilla, egestas urna non, maximus ipsum. Etiam ac ultricies massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec aliquam augue. In hac habitasse platea dictumst. Aliquam ultricies placerat ligula, eu egestas augue euismod a. Sed fermentum eros vel posuere aliquam.

Aliquam metus lacus, sagittis sit amet sagittis sagittis, tincidunt at turpis. Nulla sed lacinia lorem. Cras vehicula ultricies vestibulum. Donec eleifend tristique felis, et aliquet quam tincidunt vitae. Nulla arcu dolor, facilisis sit amet scelerisque vel, imperdiet ultrices dui. Maecenas ultrices ipsum vel leo pretium, sed ornare arcu ultrices. Vivamus a sagittis sem.

Nunc laoreet vehicula dui, non gravida erat aliquet quis. Sed magna dolor, gravida quis leo eget, ullamcorper tincidunt mauris. In laoreet diam non mauris placerat, non auctor odio aliquet. Integer at velit odio. Quisque vulputate sit amet purus sed commodo. Duis ac lectus in neque molestie pellentesque at posuere ante. Quisque hendrerit nisl ac turpis tristique ullamcorper. Suspendisse ut mauris diam. Suspendisse dictum turpis magna, et convallis libero iaculis ut. Morbi malesuada eget libero at convallis. Aliquam dictum aliquam lacinia. Nunc eget sem orci. Fusce varius viverra felis, quis maximus tellus efficitur sed. Phasellus ac consequat nisi, vel convallis risus.

Suspendisse et tempor nisl. Duis vestibulum nunc at felis blandit posuere. Sed justo augue, suscipit eget diam vel, sodales rutrum turpis. Nulla libero est, hendrerit suscipit quam vitae, consectetur pretium turpis. Proin faucibus quis elit sit amet sollicitudin. Pellentesque facilisis efficitur purus, et malesuada nunc porttitor a. Donec nec suscipit justo. Nulla blandit gravida nibh, sit amet porttitor justo dignissim feugiat.

Fusce sed vestibulum ex, laoreet pulvinar purus. Fusce efficitur nisi maximus tortor tempor, at aliquam velit ornare. Sed id nisl odio. In erat tellus, mollis ut tincidunt nec, pulvinar a tortor. Curabitur rhoncus erat justo, ut varius purus congue in. Integer eleifend nibh orci, et tempor diam eleifend at. Cras eleifend, sem in luctus lobortis, ipsum nisl vestibulum elit, eu consequat purus odio eget nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam semper augue quis molestie eleifend. Proin lacinia purus massa, tincidunt imperdiet purus ullamcorper ac. Cras eros diam, accumsan nec pharetra quis, molestie sed nisl. Fusce magna dolor, malesuada id nibh vel, egestas iaculis sapien. Nunc scelerisque metus et convallis hendrerit. Morbi porta in arcu nec dictum. Cras dictum enim ipsum, pellentesque volutpat risus sollicitudin vitae. Nulla imperdiet diam ac mattis varius.","HTML","","03/08/2016","","1");
INSERT INTO conteudo VALUES("8","Aliquam erat volutpat","aliquam-erat-volutpat","Quisque non arcu ut diam vestibulum venenatis. Donec vehicula orci vitae nunc lacinia sit amet tincidunt tortor dapibus. Aliquam erat volutpat. Sed gravida sem eget massa fringilla posuere. Nulla ac leo at enim elementum convallis non vitae neque. Nulla sit amet felis erat, in euismod erat.","CSS","","06/01/16","09/05/2016","1");
INSERT INTO conteudo VALUES("9","Teste de Imagem 1","teste-de-imagem-1","<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt massa eget odio accumsan, non congue tortor fermentum. Nunc risus sem, placerat in egestas ut, ullamcorper vitae dolor.</p>","PHP","183bfd6705ea3f95989a6e1fbbd399e1.jpg","15/01/2016","21/06/2016","0");
INSERT INTO conteudo VALUES("10","teste de imagem 2","teste-de-imagem-2","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt massa eget odio accumsan, non congue tortor fermentum. Nunc risus sem, placerat in egestas ut, ullamcorper vitae dolor.","HTML","01898cafd9a7269ad71658567030aa02.png","15/01/2016","09/05/2016","1");
INSERT INTO conteudo VALUES("11","teste de imagem 3","teste-de-imagem-3","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt massa eget odio accumsan, non congue tortor fermentum. Nunc risus sem, placerat in egestas ut, ullamcorper vitae dolor.","Funções","3d4f7ce25b54baa7e90ef8620594bece.png","15/01/2016","09/05/2016","1");
INSERT INTO conteudo VALUES("12","teste de imagem 4","teste-de-imagem-4","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt massa eget odio accumsan, non congue tortor fermentum. Nunc risus sem, placerat in egestas ut, ullamcorper vitae dolor.","Redes","6493a700ba036da095d61f7d9c6143ab.jpg","15/01/2016","09/05/2016","1");
INSERT INTO conteudo VALUES("13","Testando Remover Imagem","Testando Remover Imagem","Remover imagem.","Internet","","02/08/2016","03/08/2016","1");
INSERT INTO conteudo VALUES("25","Testando Adicionar Imagem","Testando Adicionar Imagem","imagem","Internet","5ceb486e59a3bf54076296def563cc3d.jpg","03/08/2016","","1");

--
-- Estrutura para tabela `paginas`
--
DROP TABLE IF EXISTS paginas;
CREATE TABLE `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `conteudo` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `first` int(11) NOT NULL,
  `post` int(11) NOT NULL,
  `data` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `menu_pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO paginas VALUES("1","Contato","contato","É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação. A vantagem de usar Lorem Ipsum é que ele tem uma distribuição normal de letras, ao contrário de \"Conteúdo aqui, conteúdo aqui\", fazendo com que ele tenha uma aparência similar a de um texto legível.","0","","0","0","06/04/2016","1","4");
INSERT INTO paginas VALUES("3","Sobre Nós","sobre-nos","Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.","0","ab94b79e3d4b76c427427ed63404bc04.jpg","0","0","06/04/2016","1","3");
INSERT INTO paginas VALUES("4","Postagens","postagens","Existem muitas variações disponíveis de passagens de Lorem Ipsum, mas a maioria sofreu algum tipo de alteração, seja por inserção de passagens com humor, ou palavras aleatórias que não parecem nem um pouco convincentes.","0","","0","1","06/04/2016","1","2");
INSERT INTO paginas VALUES("5","Inicio","inicio","Ao contrário do que se acredita, Lorem Ipsum não é simplesmente um texto randômico. Com mais de 2000 anos, suas raízes podem ser encontradas em uma obra de literatura latina clássica datada de 45 AC. Richard McClintock, um professor de latim do Hampden-Sydney College na Virginia, pesquisou uma das mais obscuras palavras em latim, consectetur, oriunda de uma passagem de Lorem Ipsum, e, procurando por entre citações da palavra na literatura clássica, descobriu a sua indubitável origem. Lorem Ipsum vem das seções 1.10.32 e 1.10.33 do \"de Finibus Bonorum et Malorum\" (Os Extremos do Bem e do Mal), de Cícero, escrito em 45 AC. Este livro é um tratado de teoria da ética muito popular na época da Renascença. A primeira linha de Lorem Ipsum, \"Lorem Ipsum dolor sit amet...\" vem de uma linha na seção 1.10.32.

O trecho padrão original de Lorem Ipsum, usado desde o século XVI, está reproduzido abaixo para os interessados. Seções 1.10.32 e 1.10.33 de \"de Finibus Bonorum et Malorum\" de Cicero também foram reproduzidas abaixo em sua forma exata original, acompanhada das versões para o inglês da tradução feita por H. Rackham em 1914.","0","b1feb57b7dd062e6766178e6c4f11462.jpg","1","0","06/04/2016","1","1");

--
-- Estrutura para tabela `produto`
--
DROP TABLE IF EXISTS produto;
CREATE TABLE `produto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Estrutura para tabela `site_info`
--
DROP TABLE IF EXISTS site_info;
CREATE TABLE `site_info` (
  `titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sub_titulo` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO site_info VALUES("Painel CMS","Content Management System");

--
-- Estrutura para tabela `usuarios`
--
DROP TABLE IF EXISTS usuarios;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO usuarios VALUES("1","Administrador","Admin","21232f297a57a5a743894a0e4a801fc3","","admin@admin.com");
INSERT INTO usuarios VALUES("2","Rafael Barreto Andrade","Rhafaew","8d04b5029e0573fc68a98372340d1c7a","69-993017086","fael_karate_gojuryu@hotmail.com");

