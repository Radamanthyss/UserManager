# UserManager

Projeto Gestor de Usuario

para executar este projeto, basta dar o comando -> php artisan serve <- em seu terminal do vscode.

# Como eu Acesso?

Para acessar o sistema é necessário entrar no seguinte endpoint -> http://127.0.0.1:8000/usuarios <-
<br>
Para acesso localhost e sabendo que a porta usada pelo laravel por default é 8000, se no seu caso é outra porta basta alterar e respeitar o endpoint usuarios, então lembre-se de alterar a senha no arquivo env do projeto colocando a senha do seu banco de dados mysql que vai funcionar :)
<br>
Foi utilizado Laravel 10, modelo monólito com uso de Html, Css e JS para fazer o front e o blade foi usado só pra fazer o básico como chamar as páginas segundo cada operação era efetuada.

O Objetivo foi utilizar interface bem simplificada para facil operação e mais agilidade em carregamentos.

Desenvolvido Por este que vos fala, Bruno Brasil Weiber.
<br>
OBS: Todas as regras de negócio foram implementadas conforme solicitado, e sobre a feature busca cep foi inserida somente na tela de cadastro, na exportação do pdf consta todos os usuarios independente de ter sido "removido" ou não, pois achei que fazia sentido dessa forma, isso tudo foi decisão minha baseado no meu entendimento seguindo as regras do que foi pedido, qualquer dúvida estou à disposição.

## Curiosidades

Eu achei que seria legal deixar meu outro projeto que ficou de lado pra focar neste aqui, eu estava desenvolvendo esse teste em laravel 10 no back e angular 16 no front, mas decidi focar neste aqui, se quem for avaliar tiver interesse em ver o que foi feito segue os links dos respos:
<br>
BACK-END -> https://github.com/Radamanthyss/UserManagerApi
<br>
FRONT-END -> https://github.com/Radamanthyss/UserManagerFront
