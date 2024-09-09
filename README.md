# Sistema de Gerenciamento de Tarefas

Este projeto faz parte de um processo seletivo para um desenvolvedor web iniciante. O objetivo é criar um sistema básico de gerenciamento de tarefas utilizando as tecnologias HTML, PHP e MySQL, integrado ao framework Laravel.

### Descrição

Este pull request inclui a implementação do sistema de gerenciamento de tarefas conforme o desafio proposto. O sistema permite que os usuários criem, visualizem, editem e excluam tarefas utilizando HTML para o front-end, PHP e Laravel para o back-end, e MySQL para o banco de dados.

## Funcionalidades Implementadas

1. **Listar Tarefas**: Implementada a exibição de todas as tarefas cadastradas.
2. **Adicionar Tarefa**: Funcionalidade para adicionar novas tarefas ao sistema.
3. **Editar Tarefa**: Permite a edição de tarefas existentes.
4. **Marcar como Concluída**: Permite a mudança do status da tarefa para concluída.
5. **Excluir Tarefa**: Implementada a funcionalidade para excluir tarefas.

## Requisitos Técnicos

### Front-end (HTML/CSS)
- **Listagem de Tarefas**: Exibição das tarefas em uma interface simples.
- **Formulário de Tarefas**: Permite a criação e edição de tarefas.
- **Estilo Básico**: Aplicação de CSS básico para uma interface limpa e funcional.

### Back-end (PHP e Laravel)
- **CRUD**: Implementação completa das operações de criação, leitura, atualização e exclusão.
- **Validação de Dados**: Validações mínimas aplicadas aos campos do formulário.
- **Boas Práticas**: Código organizado e seguindo boas práticas de desenvolvimento.

### Banco de Dados (MySQL)
- **Estrutura da Tabela**: Tabela `tarefas` com os campos necessários (`id`, `titulo`, `descricao`, `status`, `created_at`, `updated_at`).

## Estrutura do Projeto

- **/resources/views/**: Arquivos Blade para as páginas HTML.
- **/app/Http/Controllers/**: Com a lógica de controle.
- **/database/migrations**: Migration para criação da tabela `tarefas`.

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
- Atualize o arquivo `.env` com as credenciais do seu banco de dados.

5. **Execução:**
- Gere uma nova ``APP_KEY`` para a aplicação:
  ```bash
   php artisan key:generate
   ```
- Execute a aplicação:
```bash
   php artisan serve
   ```
- Acesse a aplicação via navegador no endereço configurado no seu ambiente local, por exemplo: http://localhost/gerenciador-tarefas/.

## Requisitos de Entrega
   - Commits:
   Commits frequentes e descritivos foram realizados durante o desenvolvimento.

## Repositório no GitHub**:
   - O projeto foi entregue em um repositório público no GitHub.

## Prazo de Entrega:
   - O desafio foi concluído e enviado dentro do prazo de 4 dias corridos.

## Critérios de Avaliação
- Organização e Estrutura do Código: Código organizado e claro.
- Funcionalidade: O sistema atende a todos os requisitos funcionais.
- Validações: Entrada de dados é tratada adequadamente.
- Uso do Git: Commits frequentes e bem descritos.

## Bônus
- Utilização de Plugins CSS: Utilizei Bootstrap 5 para melhorar o design da interface.
- jQuery: Implementado para manipulação simples do DOM.
- Laravel Livewire: Adicionada interatividade com Laravel Livewire para uma experiência de usuário mais dinâmica.

## Adicionalmente, foram implementadas as seguintes funcionalidades
- Filtros e busca nas tarefas.
- Funcionalidade de tarefas prioritárias.
- Categorias de tarefas.
- Autenticação de usuários para gerenciamento de tarefas pessoais.

## Obrigado pela consideração! 😊

### Atenciosamente, Carlos