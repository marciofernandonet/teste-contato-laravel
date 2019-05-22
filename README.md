# Projeto Teste Contato

## Instalação

1. Faça o clone deste projeto com `git clone https://github.com/marciofernandonet/contato.git`
2. Entre na pasta do projeto e instale as dependências com `composer install`

## Criando o banco de dados

O banco de dados para a aplicação é o MySql, para criar o banco é necessário executar o seguinte código abaixo.

```sql

    CREATE DATABASE db_contato;
  
    CREATE TABLE `contatos` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(80) NOT NULL,
      `email` varchar(60) NOT NULL,
      `telefone` varchar(14) NOT NULL,
      `mensagem` text NOT NULL,
      `arquivo_cam` varchar(200) NOT NULL,
      `ip` varchar(15) NOT NULL, 
      `data` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

```

## Configurando o arquivo de conexão com o banco de dados

O arquivo de configuração de conexão com o banco de dados está localizado em `application\config\database.php`, basta alterar os valores dos campos: `hostname, username, password e database` de acordo com as definições do seu banco de dados MySql.

## Configurando o arquivo para envio de e-mail

O arquivo de configuração para envio de e-mail está localizado em `application\config\email.php`, basta alterar os valores dos campos de acordo com cada opção de seu provedor de email. No exemplo de teste utilizei o serviço do Outlook para realizar o envio.

```
$config = [        
    'protocol' => 'smtp',
    'smtp_host' => 'smtp-mail.outlook.com',
    'smtp_user' => 'E-mail do outlook',
    'smtp_pass' => 'Senha',
    'smtp_crypto' => 'tls',    
    'newline' => "\r\n",
    'smtp_port' => 587,
    'mailtype' => 'html',
    'charset' => 'utf-8',
    'email_to' => 'E-mail de destino', 
    'email_subject' => 'Assunto do e-mail'
];
```
## Testando a aplicação

Para testar a aplicação em localhost acesse o diretório `public`. Exemplo: `localhost/contato/public`