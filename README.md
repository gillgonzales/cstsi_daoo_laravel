## Instalação
Após clonar o repositório execute o seguinte comando para instalar as dependências do Laravel.
```
composer install
```
Copie o arquivo '.env.example' para '.env' e configure as variáveis de ambiente necessárias, como conexão de banco de dados e credenciais.
Execute os seguintes comandos para criação das tabelas do banco assim como dados para testes:
```
php artisan migrate
```
```
php artisan db:seed
```
Após a coclusão destes passos basta rodar o seguinte comando para iniciar o servidor de desenvolvimento:
```
php artisan serve
```

## Uso
A após a execução dos seeders será gerados 3 usuário com papéis específicos(client, manager e admin), seus IDs, respectivamentes são 21, 22, 23. 
Na pasta 'tests/api' é possivel encontrar os arquivos  com as requisoções HTTP feitas pelo Thunder Client. 
A rota de login irá devolver um token para o usuário com sua respectiva habilidade, este token é necessário no header das demais requisições. 
O arquivo 'login.json' da pasta 'tests/api' representa requisições HTTP para cada tipo de usuário, ou seja, cada uma retorna um token com uma habilidade diferente.

