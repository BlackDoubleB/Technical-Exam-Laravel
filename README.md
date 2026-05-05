# API REST - Sistema de Posts
 
API RESTful desarrollada en Laravel para la gestión de usuarios y publicaciones (posts), con autenticación mediante Laravel Sanctum.
 
## Tecnologías
 
- **Framework**: Laravel 12
- **Autenticación**: Laravel Sanctum
- **Base de datos**: MySQL/PostgreSQL
- **Validación**: Form Requests

 
## Endpoints
 
### Base URL
```
http://localhost:8000/api
```
 
---
 
##  Autenticación
 
### 1. Registro de Usuario (HU-01)
 
**Endpoint:** `POST api/register`
 
**Body:**
```json
{
  "name": "Juan Pérez",
  "email": "juan@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}
```
 
**Validaciones:**
- `name`: requerido, string, máximo 255 caracteres
- `email`: requerido, email válido, único en la base de datos
- `password`: requerido, string, mínimo 6 caracteres, debe coincidir con confirmación

**Respuesta Exitosa (200):**
```json
{
  "message": "User register",
  "user": {
    "id": 1,
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "created_at": "2024-01-15T10:30:00.000000Z",
    "updated_at": "2024-01-15T10:30:00.000000Z"
  }
}
```
 
---
 
### 2. Inicio de Sesión (HU-02)
 
**Endpoint:** `POST api/login`
 
**Body:**
```json
{
  "email": "juan@example.com",
  "password": "password123"
}
```
 
**Validaciones:**
- `email`: requerido, formato email
- `password`: requerido, string, mínimo 6 caracteres

**Respuesta Exitosa (200):**
```json
{
  "message": "Login correcto",
  "token": "1|abcdefghijklmnopqrstuvwxyz123456",
  "user": {
    "id": 1,
    "name": "Juan Pérez",
    "email": "juan@example.com",
    "created_at": "2024-01-15T10:30:00.000000Z",
    "updated_at": "2024-01-15T10:30:00.000000Z"
  }
}
```
 
**Respuesta Error (422):**
```json
{
  "message": "Las credenciales son incorrectas.",
  "errors": {
    "email": ["Las credenciales son incorrectas."]
  }
}
```
 
 
---
 
##  Gestión de Posts
 

 
### 3. Crear Post (HU-03)
 
**Endpoint:** `POST api/posts`
 
**Body:**
```json
{
  "title": "Mi primer post",
  "content": "Este es el contenido de mi primer post en la plataforma"
}
```
 
**Validaciones:**
- `title`: requerido, string, mínimo 5 caracteres, máximo 255
- `content`: requerido, string, mínimo 5 caracteres

**Respuesta Exitosa (201):**
```json
{
  "message": "Post creado correctamente",
  "post": {
    "id": 1,
    "user_id": 1,
    "title": "Mi primer post",
    "content": "Este es el contenido de mi primer post en la plataforma",
    "created_at": "2024-01-15T11:00:00.000000Z",
    "updated_at": "2024-01-15T11:00:00.000000Z"
  }
}
```
 
---
 
### 4. Listar Posts (HU-04, HU-05, HU-06, HU-07)
 
**Endpoint:** `GET /posts`
 
**Parámetros de Query ( opcionales):**
 
| Parámetro | Tipo | Descripción | Valores |
|-----------|------|-------------|---------|
| `page` | integer | Número de página (paginación) | min: 1, default: 1 |
| `user_id` | integer | Filtrar posts de un usuario específico | ID válido de usuario |
| `mine` | boolean | Filtrar solo mis posts | true/false |
| `sort` | string | Ordenar por fecha de creación | asc/desc (default: desc) |
 
**Ejemplos de uso:**
 
```bash
# Todos los posts (paginados)
GET /posts
 
# Posts de la página 2
GET /posts?page=2
 
# Posts del usuario con ID 5
GET /posts?user_id=5
 
# Solo mis posts
GET /posts?mine=true
 
# Posts ordenados por fecha ascendente
GET /posts?sort=asc
 
# Combinación de filtros
GET /posts?mine=true&sort=asc&page=1
```
 
**Respuesta Exitosa (200):**
```json
{
  "current_page": 1,
  "data": [
    {
      "id": 10,
      "user_id": 1,
      "title": "Post más reciente",
      "content": "Contenido del post...",
      "created_at": "2024-01-15T15:00:00.000000Z",
      "updated_at": "2024-01-15T15:00:00.000000Z"
    },
    {
      "id": 9,
      "user_id": 1,
      "title": "Segundo post",
      "content": "Otro contenido...",
      "created_at": "2024-01-15T14:00:00.000000Z",
      "updated_at": "2024-01-15T14:00:00.000000Z"
    }
  ],
  "first_page_url": "http://localhost:8000/api/posts?page=1",
  "from": 1,
  "last_page": 3,
  "last_page_url": "http://localhost:8000/api/posts?page=3",
  "links": [...],
  "next_page_url": "http://localhost:8000/api/posts?page=2",
  "path": "http://localhost:8000/api/posts",
  "per_page": 5,
  "prev_page_url": null,
  "to": 5,
  "total": 15
}
```
 
**Notas:**
- El parámetro `mine=true` tiene prioridad sobre `user_id`
---
 
### 5. Obtener Post Específico
 
**Endpoint:** `GET /posts/{id}`
 
**Ejemplo:**
```bash
GET /posts/1
```
 
**Respuesta Exitosa (200):**
```json
{
  "id": 1,
  "user_id": 1,
  "title": "Mi primer post",
  "content": "Este es el contenido de mi primer post en la plataforma",
  "created_at": "2024-01-15T11:00:00.000000Z",
  "updated_at": "2024-01-15T11:00:00.000000Z"
}
```
 
**Respuesta Error (404):**
```json
{
  "message": "No query results for model [App\\Models\\Post] {id}"
}
```
 
---
 
### 6. Actualizar Post (HU-08)
 
**Endpoint:** `PATCH /posts/{id}`
 
**Body (campos opcionales):**
```json
{
  "title": "Título actualizado",
  "content": "Contenido actualizado del post"
}
```
 
**Validaciones:**
- `title`: opcional, string, mínimo 5 caracteres, máximo 255
- `content`: opcional, string, mínimo 5 caracteres

 
**Respuesta Exitosa (200):**
```json
{
  "message": "Updated data",
  "data": {
    "id": 1,
    "user_id": 1,
    "title": "Título actualizado",
    "content": "Contenido actualizado del post",
    "created_at": "2024-01-15T11:00:00.000000Z",
    "updated_at": "2024-01-15T16:00:00.000000Z"
  }
}
```
 
---
 
### 7. Eliminar Post (HU-09)
 
**Endpoint:** `DELETE /posts/{id}`
 
**Ejemplo:**
```bash
DELETE /posts/1
```
 
**Respuesta Exitosa (200):**
```json
{
  "message": "Post eliminado"
}
```
 
**Respuesta Error (404):**
```json
{
  "message": "No query results for model [App\\Models\\Post] {id}"
}
```
 

---
