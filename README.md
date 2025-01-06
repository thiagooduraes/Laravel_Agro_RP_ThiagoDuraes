# Laravel_Agro_RP_ThiagoDuraes
Desafio Backend
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Desafio de implementação de ferramenta de busca de usuários do GitHub.

## Requisitos:

● Criar uma interface de autenticação:
    
* Foi utilizada a interface do Laravel Breeze, onde é possível fazer o login no sistema ou criar um novo usuário. Há também a opção de manter conectado ("Remember me"). A opção de recuperação de senha não foi implementada, mantendo o padrão do framework.

* O usuário que utilizei para testes foi:

        Email: thiagooduraes@gmail.com
        Senha: admin123

* Os demais usuários inseridos pelo arquivo de seeds usam a senha

        12345678


● Cadastro/Edição/Remoção de admins para acesso ao sistema;

* Após logar no sistema, há a opção de entrar nas áreas de "Usuários" ou "GitHub". Na área de usuários, é apresentada uma lista dos usuários cadastrados no sistema, com as opções de cadastrar um novo usuário ou editar/excluir um usuário.

● Buscar usuários na API do GitHub com base no username;

* Na área "GitHub", na opção "Novo Perfil" (parte superior direita do formulário) é possível buscar um perfil do GitHub, apresentando as informações retornadas pela API.

● Montar uma lista com os usuários buscados (persistindo a lista em banco de dados);

* Ao "Salvar", o usuário apresentado é persistido no banco de dados, ligado ao usuário logado.

● Cada admin “logado” tem acesso apenas a sua lista cadastrada;

* Na tela "GitHub" são apresentados os perfis do GitHub salvos pelo usuário logado. Somente são apresentados os perfis relacionados com o usuário atual.

● Ao acessar um usuário da lista, abrir uma tela com detalhamento, onde precisa-se
mostrar as informações retornadas da API;

* Clicando em "Ver Detalhes", é possível ver as informações do perfil selecionado salvas no banco

● Remover/Editar usuários da lista;

* Na opção de "Ver Detalhes", é possível editar as informações do perfil aberto.
* Na tela "GitHub" é possível excluir o perfil selecionado.

● Atenção a tratamento de erros, validações, duplicatas e etc;

* Foram observadas validações, possíveis erros e duplicatas, além de confirmações antes de excluir dados do banco

## Configurações do ambiente

● PHP 8.1.31

● Banco de dados Mysql

● Laravel 10.48.25

## Utilização

● Para simplificar o uso do sistema, foi utilizado o Docker durante a implementação, sendo necessário que o Docker esteja instalado no ambiente.

● Foi utilizado o Docker na versão 4.34.3. A versão mais recente pode ser obtido através do site:

    https://www.docker.com/products/docker-desktop/

● Após clonar o repositório e certificar de que o docker esteja em execução, basta executar os comando abaixo para inicializar e popular o sistema:

    docker-compose up -d

* Com o container em execução, é necessário executar as migrações do banco:

        docker-compose exec app php artisan migrate

* Para efeito de teste, foi criado um arquivo de Seeds para popular a tabela de usuários com usuários de exemplo. Caso o usuário do sistema deseje executar esse seeder, use o comando:

        docker-compose exec app php artisan db:seed --class=UserSeeder

* Após a migração e uma possível população do banco, a inicialização do servidor se dá com o comando:

        docker-compose exec app php artisan serve --host=0.0.0.0

* O sistema pode ser acessado pelo link

        localhost:8000/login

* Para parar o servidor, basta parar a execução do terminal com o comando *Ctrl+C*

* Para parar a execução do Docker:
    
        docker-compose down

* Caso deseje parar a execução e excluir os contêineres, redes, volumes e imagens associadas ao docker deste projeto, utilize o comando:

        docker-compose down --volumes --rmi all