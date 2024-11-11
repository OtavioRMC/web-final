# Projeto Prático - Cardápio Restaurante

## Vídeo de Apresentação
[Link Vídeo](colocar-link)

## Objetivo
Desenvolver uma Aplicação Web, utilizando HTML, CSS, JavaScript e PHP, que permita aos usuários (clientes) visualizar o cardápio de um restaurante e realizar pedidos. O foco do projeto será a implementação de uma interface simples e funcional, que permita a navegação entre as seções do cardápio e a adição de itens a um pedido.

## Requisitos Funcionais

### RF001 Login/Logout
- A aplicação deve ter uma tela de login com campos de email, senha, e o logotipo da empresa do cliente.
- Deve haver botões para entrar na aplicação e cadastro de novo usuário.
- Ao realizar logout, os dados devem ser descartados e a tela de login reapresentada.
- Todas as funcionalidades desta interface devem ser integradas ao banco de dados MySQL.

### RF002 Cadastro de Usuário
- A aplicação deve permitir o cadastro de novos usuários com os campos: nome, e-mail, data de nascimento, telefone, senha e confirmação de senha e endereço (cep, rua, número, bairro, complemento, cidade e estado).
- Utilizar JavaScript para validar o preenchimento de todos os campos, se o e-mail é válido, e se senha e confirmação coincidem.
- A senha deve ser armazenada de forma criptografada (utilize uma função de criptografia do MySQL).

Os dados deverão ser armazenados em uma tabela denominada tb_usuario, com o seguinte script:

```sql
CREATE TABLE tb_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    data_nascimento DATE,
    telefone VARCHAR(20),
    senha VARCHAR(255) NOT NULL,
    cep VARCHAR(10),
    rua VARCHAR(255),
    numero VARCHAR(10),
    bairro VARCHAR(100),
    complemento VARCHAR(100),
    cidade VARCHAR(100),
    estado CHAR(2)
);
```

### RF003 Visualização do Cardápio
- A aplicação deverá exibir o cardápio do restaurante de forma organizada e acessível ao usuário.
- O cardápio será dividido em categorias (por exemplo, entradas, pratos principais, bebidas e sobremesas), com a possibilidade do usuário navegar facilmente entre essas seções.

As categorias serão armazenadas na tabela tb_categoria:

```sql
CREATE TABLE tb_categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);
```

Os itens que fazem parte das categorias serão armazenados em uma outra tabela denominada tb_itens:

```sql
CREATE TABLE tb_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCategoria INT,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    foto BLOB,
    preco DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idCategoria) REFERENCES tb_categorias(id)
);
```

### RF005 Detalhes do Item
Ao selecionar um item no cardápio, o usuário deverá ser redirecionado para uma tela que exibe informações detalhadas sobre o item escolhido.

#### A tela de detalhes será organizada com as seguintes seções:
- **Imagem do Item**: Exibir uma imagem em destaque do item selecionado
- **Nome do Item**: Logo abaixo da imagem, exibir o nome do item de maneira destacada
- **Descrição Completa**: Abaixo do nome, exibir uma descrição detalhada do item
- **Preço**: Exibir o preço do item de forma clara e visível

#### Interação do Usuário:
- **Botão de Adicionar ao Pedido**: Um botão com o texto "Adicionar ao Pedido" deverá estar disponível

Os itens do pedido serão armazenados na tabela tb_itens_pedido:

```sql
CREATE TABLE tb_itens_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT,
    idItem INT,
    quantidade INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    finalizado BOOLEAN NOT NULL DEFAULT FALSE,
    FOREIGN KEY (idUsuario) REFERENCES tb_usuario(id),
    FOREIGN KEY (idItem) REFERENCES tb_itens(id)
);
```

### RF006 Resumo do Pedido
A tela de resumo do pedido será responsável por exibir ao usuário os itens que ele adicionou ao pedido, bem como o valor total da compra.

#### Informações por Item:
- Nome do Item
- Quantidade
- Preço Unitário
- Preço Total do Item

#### Interação do Usuário:
- Botões para Alterar Quantidades ou Remover Itens
- Exibição do Total Geral
- Botão para Confirmar Pedido

## Requisitos Não-Funcionais
- A aplicação deve ser desenvolvida utilizando as tecnologias HTML, CSS, JavaScript e PHP.
- A aplicação deve realizar o armazenamento de dados no SGBD MySQL.
- A aplicação pode ser desenvolvida individualmente ou em duplas.

## O que precisa ser entregue?
- A entrega será realizada através de um repositório público no GitHub.
- Entregar um arquivo SQL contendo o script para criação do banco e respectivas tabelas.
- Entregar um arquivo texto com nome e código dos alunos que compõem a dupla, assim como link do projeto no Github.
- Deve ser entregue também um vídeo de até 5 minutos apresentando a aplicação.

## Critérios de Avaliação

### [10%] RF001 Login / Logout
- A tela de login contém campos de e-mail, senha, logotipo e botões de "Entrar", "Cadastrar" e "Esqueceu a senha".
- Validação correta de e-mail (formato) e campos vazios.
- Integração ao banco de dados MySQL
- Utilização adequada de HTML, CSS e JavaScript.

### [10%] RF002 Cadastro de Usuário
- Cadastro de usuário possui todos os campos necessários
- Validação correta de nome, e-mail, senha e confirmação de senha.
- Integração ao banco de dados MySQL
- Utilização adequada de HTML, CSS e JavaScript.

### [20%] RF003 Visualização do Cardápio
- Exibição do cardápio de forma organizada.
- Divisão do cardápio em categorias.
- Apresentação dos itens de cada categoria
- Integração ao banco de dados MySQL
- Utilização adequada de HTML, CSS e JavaScript.

### [30%] RF004 Detalhes do Item
- Apresentação detalhada dos itens do cardápio, incluindo imagem, nome, descrição completa e preço
- Adicionar item ao pedido.
- Integração ao banco de dados MySQL
- Utilização adequada de HTML, CSS e JavaScript.

### [30%] RF005 Resumo do Pedido
- Exibição dos itens do pedido, incluindo nome, quantidade, preço unitário e preço total.
- Permitir alterar a quantidade ou remover itens do pedido.
- Exibição do total geral e botão para confirmar pedido.
- Integração ao banco de dados MySQL
- Utilização adequada de HTML, CSS e JavaScript.

## Considerações Finais
- A identificação de cópias indiscriminadas de código fonte da Internet, ou de colegas da turma, ocasionará a perda da pontuação.
- Caso haja suspeita de fraude, a dupla poderá passar por uma avaliação oral acerca do projeto desenvolvido.
- A entrega fora do prazo estipulado acarretará em nota zero.
- O repositório no Github será avaliado levando em consideração somente os commits realizados até a data de entrega.
- Sugestão: tente baixar seu código em outra máquina e executar a aplicação para ter a certeza de que não está faltando nenhum arquivo de configuração que possa vir a prejudicar sua nota.
