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
