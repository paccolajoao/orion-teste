
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
docker-compose  exec app bash
```
```sh
composer install
```

4. Rode as migrations do projeto
```sh
php artisan migrate
```

5. API:
http://localhost:8989/api/

6. Endpoints<br>
    POST /clienteCadastro<br>
    PUT /cliente/{id} <br>
    DELETE /cliente/{id} <br>
    GET /cliente/{id} <br>
    GET /consulta/final-placa/{numero}<br>

Acesse o projeto
[http://localhost:8989](http://localhost:8989)