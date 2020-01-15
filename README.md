# Teste técnico PHP com Laravel

## O teste
**Crie uma página de contato que contenha os seguintes campos:**
- Nome
- E-mail
- Telefone
- Mensagem
- Arquivo Anexo

**A criação dessa página deve obedecer os seguintes requisitos:**

Os dados enviados deverão ser armazenados em um banco de dados e conter, além das informações exibidas, o ip do remetente e a data e hora do envio.

Os dados informados devem ser validados utilizando as seguintes regras:
- Todos os campos são obrigatórios;
- O e-mail deve ser válido;
- O telefone deve ser válido;
- O arquivo deve ter no máximo 500kb e só deve ser aceito se o arquivo for pdf, doc, docx, odt ou txt;
- O arquivo enviado deve ser armazenado em disco. Apenas o caminho do arquivo deve ser armazenado no banco de dados;
- Uma mensagem deve ser enviada com as informações submetidas no formulário para um e-mail definido em um arquivo de configuração;

## Instalação e execução 
1. Faça o clone do projeto;
2. Use o _Composer_ para baixar as dependências `composer update`;
3. Crie uma cópia do arquivo _.env.example_ com o nome _.env_, ou execute o comando `cp .env.example .env`;
4. Execute o comando `php artisan key:generate` para gerar uma chave de encriptação;
5. Configure o acesso ao banco de dados no arquivo _.env_ com as credenciais:
```sql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

O mesmo deve ser feito para o envio do e-mail:
```sql
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

6. Execute o comando `php artisan migrate` para rodar as migrates;
7. Execute o comando `php artisan serve` para rodar o servidor de desenvolvimento, por padrão o servidor roda no endereço `http://localhost:8000`;
