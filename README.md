
# Orion Teste

### Passo a passo
1. Clone Repositório
```sh
https://github.com/paccolajoao/orion-teste.git
```
```sh
cd orion-teste/
```

2. Suba os containers do projeto
```sh
docker-compose up -d
```

3. No container app, rode o composer para instalar as dependências
```sh
composer install
```

4. No container app, rode as migrations do projeto
```sh
php artisan migrate
```

5. API:
http://localhost:8989/api/

6. Endpoints
Método Endpoint Descrição
POST /clienteCadastro
PUT /cliente/{id} 
DELETE /cliente/{id} 
GET /cliente/{id} 
GET /consulta/final-placa/{numero}

Acesse o projeto
[http://localhost:8989](http://localhost:8989)