# Mini IMDb

Mini IMDb é uma aplicação web inspirada no IMDb que permite aos usuários buscar filmes, ver detalhes como sinopse, elenco e avaliações, e deixar suas próprias avaliações e comentários. A aplicação utiliza Laravel para o backend e React para o frontend.

## Tecnologias Utilizadas

- **Backend**: Laravel
- **Frontend**: React
- **Autenticação**: JWT (JSON Web Tokens)
- **Gerenciamento de Estado**: Context API
- **Interações com API**: Axios 
- **Banco de Dados**: MySQL

## Funcionalidades

- Autenticação de usuários (registro e login)
- Listagem de filmes
- Visualização de detalhes de um filme
- Avaliação de filmes (com pontuação e comentário)
- Reações (like/dislike) em avaliações
- Visualização da média de avaliações de um filme

## Requisitos

- PHP >= 7.3
- Composer
- Node.js
- NPM ou Yarn
- MySQL
- WampServer (ou similar)

## Instalação

### Backend (Laravel)

1. Clone o repositório:

    ```bash
    git clone https://github.com/seu-usuario/mini-imdb.git
    cd mini-imdb
    ```

2. Instale as dependências do PHP com o Composer:

    ```bash
    composer install
    ```

3. Configure o arquivo `.env`:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Configure a conexão com o banco de dados no arquivo `.env`.

5. Execute as migrações e seeds:

    ```bash
    php artisan migrate --seed
    ```

6. Inicie o servidor de desenvolvimento:

    ```bash
    php artisan serve
    ```

### Frontend (React)

1. Navegue para a pasta do frontend:

    ```bash
    cd frontend
    ```

2. Instale as dependências do Node.js:

    ```bash
    npm install
    # ou
    yarn install
    ```

3. Inicie o servidor de desenvolvimento:

    ```bash
    npm start
    # ou
    yarn start
    ```

## Estrutura do Projeto

### Backend (Laravel)

- **Models**: Representações das tabelas do banco de dados.
  - `User`
  - `Filme`
  - `Avaliacao`
  - `AvaliacaoLike`
- **Controllers**: Lógica de controle para lidar com as requisições.
  - `AuthController`
  - `FilmeController`
  - `AvaliacaoController`
- **Migrations**: Scripts para criação e atualização das tabelas do banco de dados.
- **Routes**: Definições de rotas de API no arquivo `routes/api.php`.

### Frontend (React)

- **Components**: Componentes reutilizáveis da interface do usuário.
  - `AdicionarFilme.js`
  - `DetalhesFilme.js`
  - `Home.js`
  - `ListaFilmes.js`
  - `Login.js`
  - `PrivateRoute.js`
  - `Register.js`
- **Pages**: Páginas principais da aplicação.
- **Services**: Serviços para interações com a API.
  - `api.js`
- **Context**: Context API para gerenciamento de estado global.

## Rotas da API

### Autenticação

- `POST /api/register`: Registrar um novo usuário.
- `POST /api/login`: Fazer login e obter o token JWT.

### Filmes

- `GET /api/filmes`: Listar todos os filmes.
- `GET /api/filmes/{id}`: Obter detalhes de um filme específico.
- `POST /api/filmes`: Adicionar um novo filme (autenticado).

### Avaliações

- `POST /api/filmes/{id}/avaliacoes`: Adicionar uma avaliação a um filme (autenticado).
- `POST /api/avaliacoes/{id}/like`: Dar like em uma avaliação (autenticado).
- `POST /api/avaliacoes/{id}/dislike`: Dar dislike em uma avaliação (autenticado).
- `GET /api/avaliacoes/{id}`: Obter contagem de likes e dislikes de uma avaliação.

## Contribuindo

Se você deseja contribuir com o projeto, por favor, abra uma issue ou faça um fork do repositório e envie um pull request com suas alterações.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## Contato

Para mais informações, entre em contato através do email: [seu-email@exemplo.com](mailto:seu-email@exemplo.com).
