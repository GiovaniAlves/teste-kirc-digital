## <p align="center"> <i>Teste Kirc Digital</i> </p>

<div align="center">
  <img width="800" src="https://raw.githubusercontent.com/GiovaniAlves/teste-kirc-digital/master/public/img/animacao.gif" class="d-block w-100" alt="...">
</div>

### Passo a passo
#### Clone o Repositório
```
git clone https://github.com/GiovaniAlves/teste-kirc-digital.git
```
```
cd teste-kirc-digital/
```

#### Crie o Arquivo .env
```
cp .env.example .env
```

#### Atualize as variáveis de ambiente no arquivo .env
```
APP_NAME=nome_da_aplicacao
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=root
DB_PASSWORD=root

```

#### Instalar as dependências do projeto
```
composer install
```

#### Gerar a key do projeto Laravel
```
php artisan key:generate
```

#### Executar as migrações
```
php artisan migrate
```

#### compilar os assets
```
npm run dev
```

#### Subir o servidor
```
php artisan serve
```


#### Acesse o projeto em http://localhost:8000
