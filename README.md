# Sistema de Gerenciamento de Tarefas

Este projeto faz parte de um processo seletivo para um desenvolvedor web iniciante. O objetivo é criar um sistema básico de gerenciamento de tarefas utilizando as tecnologias HTML, PHP e MySQL, integrado ao framework Laravel.

## Descrição do Projeto

O sistema permitirá que os usuários criem, visualizem, editem e excluam tarefas, com uma interface simples em HTML. O backend será responsável por gerenciar as operações de CRUD (Create, Read, Update, Delete) para essas tarefas.

## Requisitos Técnicos

### 1. Front-end (HTML/CSS)
- **Listagem de Tarefas**: Exibir todas as tarefas cadastradas.
- **Formulário de Tarefas**: Permitir a criação e edição de tarefas.
- **Estilo Básico**: Aplicar um CSS básico para a interface.

### 2. Back-end (PHP e Laravel)
- **CRUD**: Implementar funcionalidades de criação, leitura, atualização e exclusão de tarefas.
- **Validação de Dados**: Implementar validações mínimas para os campos do formulário.
- **Boas Práticas**: Organizar o código seguindo as melhores práticas.

### 3. Banco de Dados (MySQL)
- **Estrutura da Tabela**: Tabela `tarefas` com os seguintes campos:
  - `id`: Chave primária
  - `titulo`: Título da tarefa
  - `descricao`: Descrição da tarefa
  - `status`: Status da tarefa (`pendente` ou `concluída`)
  - `categoria_id`: ID da categoria da tarefa
  - `prioridade`: Prioridade da tarefa (`ALTA`, `MEDIA` ou `BAIXA`)
  - `user_id`: ID do usuário a quem a tarefa pertence
  - `created_at`: Data de criação
  - `updated_at`: Data de atualização

## Funcionalidades do Sistema

1. **Listar Tarefas**: Exibir todas as tarefas cadastradas.
2. **Adicionar Tarefa**: Permitir a adição de novas tarefas.
3. **Editar Tarefa**: Permitir a edição de tarefas existentes.
4. **Marcar como Concluída**: Permitir a mudança do status da tarefa.
5. **Excluir Tarefa**: Permitir a exclusão de tarefas.

## Estrutura do Projeto

- **/resources/views/**: Arquivos blade para páginas HTML.
- **/app/Http/Controllers/**: Arquivos PHP com o controller principal `TarefaController`.
- **/database/migrations**: Script SQL para a criação da tabela `tarefas`.

## Instruções de Instalação

1. **Clone o Repositório**:
   ```bash
   git clone https://github.com/ByteCarlos/gerenciador-tarefas
   ```

2. **Instale as dependências:
   ```bash
   composer install
   ```

3. **Configuração do Banco de Dados:**
- Crie um banco de dados no MySQL.
- Execute as migrations:
  ```bash
   php artisan migrate
   ```

4. **Configuração do Projeto:**
- Atualize o arquivo `.env` as credenciais do seu banco de dados.

5. **Execução:**
- Execute a aplicação:
```bash
   php artisan serve
   ```
- Acesse a aplicação via navegador no endereço configurado no seu ambiente local, por exemplo: `http://localhost/gerenciador-tarefas/`.
