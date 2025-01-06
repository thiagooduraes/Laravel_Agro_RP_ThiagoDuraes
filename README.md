# Laravel_Agro_RP_ThiagoDuraes
Desafio Backend
=======
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Desafio de implementação de ferramenta de busca de usuários do GitHub.

Requisitos:

● Criar uma interface de autenticação:
    
    Foi utilizada a interface do Laravel Breeze, onde é possível fazer o login no sistema ou criar um novo usuário. Há também a opção de manter conectado ("Remember me"). A opção de recuperação de senha não foi implementada, mantendo o padrão do framework.

    O usuário que utilizei para testes foi:
        Email: thiagooduraes@gmail.com
        Senha: admin123

● Cadastro/Edição/Remoção de admins para acesso ao sistema;

    Após logar no sistema, há a opção de entrar nas áreas de "Usuários" ou "GitHub". Na área de usuários, é apresentada uma lista dos usuários cadastrados no sistema, com as opções de cadastrar um novo usuário ou editar/excluir um usuário.

● Buscar usuários na API do GitHub com base no username;

    Na área "GitHub", na opção "Novo Perfil" (parte superior direita do formulário) é possível buscar um perfil do GitHub, apresentando as informações retornadas pela API.

● Montar uma lista com os usuários buscados (persistindo a lista em banco de dados);

    Ao "Salvar", o usuário apresentado é persistido no banco de dados, ligado ao usuário logado.

● Cada admin “logado” tem acesso apenas a sua lista cadastrada;

    Na tela "GitHub" são apresentados os perfis do GitHub salvos pelo usuário logado. Somente são apresentados os perfis relacionados com o usuário atual.

● Ao acessar um usuário da lista, abrir uma tela com detalhamento, onde precisa-se
mostrar as informações retornadas da API;

    Clicando em "Ver Detalhes", é possível ver as informações do perfil selecionado salvas no banco

● Remover/Editar usuários da lista;

    Na opção de "Ver Detalhes", é possível editar as informações do perfil aberto.
    Na tela "GitHub" é possível excluir o perfil selecionado.

● Atenção a tratamento de erros, validações, duplicatas e etc;

    Foram observadas validações, possíveis erros e duplicatas, além de confirmações antes de excluir dados do banco
