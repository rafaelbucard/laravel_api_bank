# laravel_api_bank :heavy_dollar_sign:
 Api criada em Laravel com autentificação JWT
 
 # Laravel v8.29.0 (PHP v8.0.0)
 
 
 ## Instalação:
 
 ### Copie conteúdo do o arquivo.env exemplo para um .env e configure com o nome do DB criado.
 
 ### No terminal dentro da pasta do pojeto utilize o comando *composer install*
 
 
 




Endpoint teste: Metodo GET = api/ping Retorna {"pong" :true}

Endpoints :

Metodo POST = api/auth/login = {email, ,password} Retorna {token}

Metodo POST = api/auth/register = {name, email, cpf, password, password_confirm}

Metodo POST = api/auth/validate = {token} Retorna {Usuário dados}

Metodo POST = api/auth/logout = {token}

Metodo GET = api/user = {Todos os Usuários}

Metodo PUT = api/userup/{id} = {Atualiza informaçoes passadas}

Metodo GET = api/user/{id} = {Usuário}

Metodo DELETE = api/userdel/{id} = {Apaga Usuário}

Metodo GET = api/deposit/{id}= {Todos os depositos de um usuário}

Metodo GET = api/deposit/{id}/specific/{id_deposit} = {depósito específico}

Metodo PUT = api/deposit/{id} = {Cadastra um depósito}

Metodo DELETE = api/depositdel/{id} = {Apaga depósito}

Metodo GET = api/profitability/{id}= {Todos as rentabilidades de um deposito}

Metodo GET = api/profitability/{id}/specific/{id_deposit}= { rentabilidades específica}

Method POST = api/profitability/{id_deposito}/= {Cria rentabilidades}

Method DELETE = api/profitabilitydel/{id}/= {Deleta rentabilidades}

Metodo GET = api/balance/{id} = {Todos os balanços de um usuário}

Metodo GET = api/balance/{id}/specific/{id_balance}= {balanço específico}

Method POST = api/balance/{id_deposito}/= {Cria balanço}

Method DELETE = api/balancedel/{id}/= {Deleta balanço}

Method GET = api/balancesums/{id} = {Retorna soma de Balanços de Usuários}

Metodo GET = api/verified/{id} = {Todos os verified de um usuário}

Metodo GET = api/verified/{id}/specific/{id_verified}= {verified específico}

Method POST = api/verified/{id_deposito}/= {Cria verified}

Method DELETE = api/verified/{id}/= {Deleta verified}

Metodo GET = api/wallet/{id} = {Todos os wallet de um usuário}

Metodo GET = api/wallet/{id}/specific/{id_wallet}= {wallet específico}

Method POST = api/wallet/{id_wallet}/= {Cria wallet}

Method DELETE = api/wallet/{id}/= {Deleta wallet}

Metodo GET = api/withdraw/{id} = {Todos os withdraw de um usuário}

Metodo GET = api/withdraw/{id}/specific/{id_withdraw}= {withdraw específico}

Method POST = api/withdraw/{id_withdraw}/= {Cria withdraw}

Method DELETE = api/withdraw/{id}/= {Deleta withdraw}
