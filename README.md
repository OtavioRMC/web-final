# Documentação do Sistema de Menu do Restaurante Divino

Projeto Desenvolvido para obtenção de parte da nota da disciplina
Desenvolvimento - WEB (AI222A)

Desenvolvedor: Otávio Ribeiro <838807>

## Componentes Principais

### 1. Interface do Menu
- Layout responsivo organizado em grid
- Três seções principais:
  - Entradas
  - Pratos Principais
  - Sobremesas
- Cada item do menu contém:
  - Imagem do prato
  - Nome
  - Descrição
  - Preço
  - Botão de pedido

### 2. Sistema de Pedidos
- Funcionalidade de adicionar pedidos
- Visualização de pedidos realizados
- Atualização automática da lista de pedidos a cada 30 segundos
- Sistema de notificações para feedback ao usuário

## Estilização (CSS)

### Elementos Principais
- `.menu-container`: Container principal com largura máxima de 1200px
- `.menu`: Cartão branco com sombra suave
- `.menu-items-grid`: Grid responsivo para itens do menu
- `.menu-item`: Card individual para cada item do menu
- `.status-message`: Notificações flutuantes
- `.order-item`: Estilo para itens na lista de pedidos

### Recursos Visuais
- Animações hover nos itens do menu
- Sistema de cores consistente
- Layout responsivo
- Sombras e bordas arredondadas para profundidade visual

### 1. Gerenciamento de Pedidos
```javascript
handleOrderClick(event)
```
- Captura cliques nos botões de pedido
- Solicita quantidade via prompt
- Valida entrada do usuário
- Envia pedido para processamento

### 2. Comunicação com Backend
```javascript
addOrder(itemData, quantity)
```
- Envia dados do pedido via POST para `adicionar_pedido.php`
- Processa resposta do servidor
- Exibe mensagem de sucesso/erro
- Atualiza lista de pedidos

### 3. Atualização de Pedidos
```javascript
fetchOrders()
```
- Busca lista atualizada de pedidos
- Atualiza interface automaticamente
- Executa a cada 30 segundos

### 4. Interface de Usuário
```javascript
displayOrders(orders)
```
- Renderiza lista de pedidos
- Calcula totais
- Formata datas e valores
- Exibe mensagem quando não há pedidos

```javascript
showMessage(message, type)
```
- Exibe notificações temporárias
- Suporta diferentes tipos (sucesso/erro)
- Auto-oculta após 3 segundos

## Integração com Backend

### Endpoints
- `POST adicionar_pedido.php`: Adiciona novo pedido
  - Payload: `{ itemId, itemName, itemPrice, quantity }`
  - Retorno: `{ success: boolean, message?: string }`

- `GET adicionar_pedido.php?action=list`: Lista pedidos
  - Retorno: `{ success: boolean, pedidos: Array, message?: string }`

## Especifações Técnicas Frontend e Backend

### Frontend
  - CSS Grid
  - Flexbox
  - Fetch API
  - ES6+ JavaScript

### Backend
- Servidor web com backend PHP
- Banco de dados MySQL
- Pacote XAMPP,
para facilitar instação e configuração do servidor apache e integração com o banco de dados


## Estrutura do Banco

O banco de dados(*db_cardapio*) contém as seguintes tabelas:

- tb_categoria
  ```sql
  CREATE TABLE tb_categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255)
  );
  ```

- tb_itens
```sql
CREATE TABLE tb_itens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idCategoria INT,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT,
    foto varchar(255),
    preco DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (idCategoria) REFERENCES tb_categorias(id)
);
```

- tb_pedidos
```sql
CREATE TABLE tb_pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_id INT,
    item_name VARCHAR(255),
    item_price DECIMAL(10,2) NOT NULL,
    quantity INT,
    created_at TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES tb_itens(id)
);
```
- tb_usuario
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
