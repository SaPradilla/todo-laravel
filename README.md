# Todo list

Prueba tecnica todo list laravel 11, livewire, eloquent

## Setup

Instalar dependencias y buildear vite

```bash
    npm install && npm run build
```

Configurar correctamente los .env para las credenciales de la db, etc

Crear base de datos

Correr migraciones junto con los seeders

```bash
    php artisan migrate --seed
```

Correr la app

```bash
    composer run dev
```

App: http://127.0.0.1:8000/

## Architecture

### Api Rest

``` md
 📁 App
  -- Data Transfer Objects --
  ⤷📁 DTO
  ⤷📁 Http
    ⤷📁 Controllers
        ⤷📁 Api
            -- El controlador recibe y envia data json --
            ⤷📑 TodoController
        ⤷📁 Request
            -- valida al data recibida de la peticion --
            ⤷📑 TodoStoreRequest
            ⤷📑 TodoUpdateRequest
  -- Se encarga de mandar y leer info de la db --
  ⤷📁 Repository
  -- aqui va la logica de negocio, lo usa el controlador --
  ⤷📁 Services
```

****

## ApiRest reference

[Postman collection](https://www.postman.com/cherrystock/workspace/publico/collection/26378244-0938ad3c-155c-44ea-9a11-d5f95d0dbf5a?action=share&creator=26378244)

### Create

```http
   POST /todo
```

#### Reponse

```json
{
    "title": "Comprar jabon",
    "description": "Ir al d1 a comprarla",
    "completed": false,
    "user_id": 1,
    "updated_at": "2024-12-02T22:47:52.000000Z",
    "created_at": "2024-12-02T22:47:52.000000Z",
    "id": 2
}
```

### Get all by user

```http
   GET /todo/{user_id}
```

#### Reponse

```json
[
    {
        "id": 10,
        "title": "22d22DFDF",
        "description": "dfdDDD",
        "completed": 1,
        "user_id": 1,
        "created_at": "2024-12-02T04:12:18.000000Z",
        "updated_at": "2024-12-02T21:11:41.000000Z"
    },
    {
        "id": 1,
        "title": "Comprar mantequilla",
        "description": "Ir al d1 a comprar mantequilla",
        "completed": 1,
        "user_id": 1,
        "created_at": "2024-12-02T02:00:53.000000Z",
        "updated_at": "2024-12-02T22:29:21.000000Z"
    }
    // etc
]
```

### Get all with queries

```http
   GET /todo?title=Es
   GET /todo?title=Es&completed=1
```

#### Reponse

```json
[
    {
        "id": 10,
        "title": "Es2d22DFDF",
        "description": "dfdDDD",
        "completed": 1,
        "user_id": 1,
        "created_at": "2024-12-02T04:12:18.000000Z",
        "updated_at": "2024-12-02T21:11:41.000000Z"
    },
    {
        "id": 1,
        "title": "Comprar mantequilla",
        "description": "Ir al d1 a comprar mantequilla",
        "completed": 1,
        "user_id": 1,
        "created_at": "2024-12-02T02:00:53.000000Z",
        "updated_at": "2024-12-02T22:29:21.000000Z"
    }
    // etc
]
```

### UPDATE

```http
   PUT /todo/{id}
```

#### Reponse

```json
{
    "title": "Comprar leche",
    "description": "Ir al ara",
    "completed": true
}

```

### CHANGE STATUS

```http
   PATCH /todo/status/{id}
```

#### Reponse

```json
{
    "id": 1,
    "title": "Comprar mantequilla",
    "description": "Ir al d1 a comprar mantequilla",
    "completed": true, // change true or false
    "user_id": 1,
    "created_at": "2024-12-02T02:00:53.000000Z",
    "updated_at": "2024-12-02T19:45:55.000000Z"
}

```

### DELETE

```http
   DELETE /todo/{id}
```

