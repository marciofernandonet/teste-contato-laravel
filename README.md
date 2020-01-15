## Teste técnico PHP com Laravel
 A API do projeto foi desenvolvido usando o Framework Laravel o Frontend foi construído com Bootstrap e Axios.

## Instalação e teste

1. Faça o clone do projeto;
2. Use o _Composer_ para baixar as dependências `composer update`;
3. Configure o acesso ao banco de dados no arquivo _.env_. Exemplo:
```sql
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=teste_tecnico
DB_USERNAME=root
DB_PASSWORD=***
```
4. Execute o comando `php artisan migrate` para rodar as migrates;
5. Execute o comando `php artisan serve` para rodar o servidor de desenvolvimento, por padrão o servidor roda no endereço `http://localhost:8000`;
