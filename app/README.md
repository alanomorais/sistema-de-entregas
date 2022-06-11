#SISTEMA DE ENTREGA

## Sistema desenvolvido em PHP 8 usando o padrão MVC com banco de dados PostgreSQL 14.3.1

###  Criação da Estrutura do Banco de dados:
1) rodar o scritp abaixo:
1.1) composer install na pasta app do projeto

1.2) Criação do banco de dados

/*********************************************************/
-- Database: entrega

-- DROP DATABASE IF EXISTS entrega;

CREATE DATABASE entrega
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'Portuguese_Brazil.1252'
    LC_CTYPE = 'Portuguese_Brazil.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1;
/*********************************************************/
1.3) Criação da Tabela tb_entrega

CREATE TABLE tb_entrega (
  id serial PRIMARY KEY,
  titulo varchar(255) NOT NULL,
  descricao text   NOT NULL,
  previsao_entrega timestamp  NOT NULL,
  data_entrega timestamp  DEFAULT NULL,
  status char(1)  NOT NULL DEFAULT '0'  
)
1.4) Caso queira popular o banco de dados

INSERT INTO tb_entrega (id, titulo, descricao, previsao_entrega, data_entrega, status) VALUES
  (1, 'Entrega de Mercadoria', 'Entrega de encomenda para JoÃ£o Igor', '2022-06-08 00:00:00', NULL, '0'),
  (2, 'Entrega de Roupa', 'Entregar na rua 10', '2022-06-09 00:00:00', NULL, '0'),
  (3, 'Entrega de Mercadoria', 'teste', '2022-06-08 00:00:00', NULL, '0');



### As configurações do banco de dados estão definidas na Class Connection (App\Db\Connect)

### 
1) Sistema possui um Menu que chama a página Principal, onde são listadas todas as entregas pendente.
3) Acima da listagem possui o botão "novo" para incluir uma nova entrega.
4) Na listagem existem 2 botões de acões: Editar e Excluir. Estas acções só ficarão habilitadas para entregas pendentes.

