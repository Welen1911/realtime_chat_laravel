## Sobre o projeto

Se trata de uma aplicação de chat em tempo real, onde você poderá conversar com outro usuário. Esse sistema conta com:

- [InertiaJs juntamente com Vue 3](https://inertiajs.com/).
- [Laravel Jetstream](https://jetstream.laravel.com/introduction.html).
- [Laravel Reverb](https://reverb.laravel.com/) para Websocket e Broadcasting.
- [Filas no Laravel](https://laravel.com/docs/11.x/queues#main-content) e [Eventos](https://laravel.com/docs/11.x/events#main-content) para processamento assíncrono.

## Pre-requisitos
Para rodar o projeto você precisará:

-[xampp](https://www.apachefriends.org/pt_br/download.html).
-[composer](https://getcomposer.org/).
-[node](https://nodejs.org/en).

## Como rodar o projeto

Primeiro, clone o repositório:
```
git clone https://github.com/Welen1911/realtime_chat_laravel.git
```

Segundo, instale as dependências:
```
composer install
npm install
```

Terceiro, configurações básicas:
```
copy exampe.env ./.env
php artisan key:generate
php artisan migrate
php artisan serve
```

Agora basta acessar o app em [localhost](http://127.0.0.1:8000/).
