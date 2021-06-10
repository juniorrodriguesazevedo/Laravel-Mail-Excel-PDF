## Larave Mail, Excel e PDF

Projeto feito para fins de aprendizado e treinamento, com autenticação de usuário, validações, relacionamento de banco de dados, exportação de dados em Excel e PDF e envio de e-mails de confirmação e atualização de livros cadastrados.

### Bibliotecas usadas:
* [Laravel Excel](https://laravel-excel.com/)
* [Laravel DomPDF](https://github.com/barryvdh/laravel-dompdf)
* [Laravel pt-BR Localization](https://github.com/lucascudo/laravel-pt-BR-localization)
* [Bootstrap 4 forms for Laravel 5/6/7/8](https://github.com/netojose/laravel-bootstrap-4-forms)

### Instalação: 

* Você precisará do PHP instalado em seu computador, [BAIXE AQUI](https://www.php.net/downloads). 
* Na raiz do projeto use o comando `composer install`.
* No arquivo `.ENV` edite o campo `DB_CONNECTION` e coloque os dados do seu banco de dados.
* Também dentro do arquivo `.ENV`, edite o campo `MAIL_MAILER` e coloque os dados do seu servidor de e-mail ([Recomendo o Mailtrap](https://mailtrap.io)). 
* Use o comando `php artisan migrate` para fazer as migrações.
* Use o comando `php artisan serve` para rodar em seu servidor.
* Navegue para `http://127.0.0.1:8000/`. O aplicativo será carregado automaticamente.
