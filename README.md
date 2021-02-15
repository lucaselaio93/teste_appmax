Tecnologias utilizadas:

Laravel 8
PHP 7.X
MySQL 5

Instruções{
	* Ter Laravel 8 instalado;
	* Ter uma tabela no banco de dados MySQL chamada gerenciamento_estoque;
	* Executar a instalação das dependencias do projeto;
	* Configurar um arquivo .env com as configurações que usei no meu projeto local, ou adaptá-lo para a sua configuração de banco de dados da sua máquina;
	* Criar usuário e senha na aplicação;
    * As migrations das tabelas estão em app/database/migrations;
	* Existe Seed para popular as tabelas de "stocks" e "products" mas elas não estabelecem o vínculo entre as entidades pois presumi que a ideia era executar as tarefas de vinculação, entrada e baixa pela aplicação;
	* Para consumir a API, utilize o Postman ou Insomnia;

	#Abaixo estou disponibilizando o conteúdo do meu arquivo .env#
}

####################################################### CONTEÚDO DO ARQUIVO .ENV ############################################################################
APP_NAME="Gestão de Estoque"
APP_ENV=local
APP_KEY=base64:E207WR8OCEJUq+rWXzrdsH5NF+HE+l97a/knHpFYBWc=
APP_DEBUG=true
APP_URL=http://projetoAppMax.test

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gerenciamento_estoque
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
