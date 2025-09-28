# Evaluación Práctica – Backend Administrativo (Laravel)

## Objetivo

Construir la base de un backend administrativo en Laravel para gestionar:

- Áreas (p. ej., Recursos Humanos, Logística, Ventas).
- Personas (empleados vinculados a un área).
- Asistencias (registro diario por persona: Presente, Falta, Tardanza, Permiso).
- Roles de usuario (Administrador, Supervisor, Colaborador).
- Reportes (consolidados por área y persona, con filtros por rango de fechas).

Este repositorio ya incluye modelos, migraciones, factories y seeders listos para usar. La autenticación y los endpoints los implementará el candidato durante su ejercicio.

---

## Requisitos

- PHP 8.2+
- Composer
- Base de datos (MySQL/MariaDB recomendado)

---

## Instalación

1) Clona el repositorio:
```bash
git clone https://github.com/KevinMO05/Technical-Exam-Laravel.git
cd examen-laravel
```
2) Instala dependencias:
```bash
composer install
```
3) Copia el archivo de entorno y configura tu base de datos:
```bash
cp .env.example .env
# Edita .env -> DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
```
4) Genera la key de la app (si es necesario):
```bash
php artisan key:generate
```
5) Ejecuta migraciones y seeders:
```bash
php artisan migrate:fresh --seed
```

---

## Estructura de Datos (resumen)

Tablas y campos principales creados por las migraciones:

- roles
  - id, name (único), description, timestamps
- areas
  - id, name, description (nullable), status (bool), timestamps
- people (empleados)
  - id, first_name, last_name, dni_id (único), email (único), area_id (FK a areas), timestamps
- attendances
  - id, person_id (FK a people), date (date), status (enum: Presente|Falta|Tardanza|Permiso), timestamps
  - Índice único: (person_id, date) para impedir duplicados por fecha y persona
- users
  - role_id (FK a roles) agregado a la tabla

Modelos Eloquent:

- Role (1:N) users
- Area (1:N) people
- Persona (people) pertenece a Area y tiene muchas Asistencia (attendances)
- Asistencia (attendances) pertenece a Persona (people)
- User pertenece a Role

Notas:
- Se utiliza people como nombre de tabla para personas y attendances para asistencias.
- Los nombres de columnas están en inglés, pero los valores de catálogos/semillas (áreas/estados) están en español.

---

## Datos Semilla

El seeding crea datos mínimos para empezar:

- Roles: Administrador, Supervisor, Colaborador.
- Áreas: Recursos Humanos, Logística, Ventas (y algunas aleatorias vía factory).
- Personas: 30 personas distribuidas en las áreas existentes.
- Asistencias: registros diarios de los últimos 30 días para cada persona (valores en Presente|Falta|Tardanza|Permiso).
- Usuarios demo (contraseña por defecto: password):
  - admin@example.com (Administrador)
  - supervisor@example.com (Supervisor)
  - colaborador@example.com (Colaborador)

Puedes volver a poblar la base con:
```bash
php artisan migrate:fresh --seed
```

---

## Lineamientos para el Candidato

Tu reto es construir la capa de aplicación (controladores, requests, reportes y endpoints) sobre esta base de datos. Sugerencias:

- Implementar endpoints RESTful para CRUD de áreas, personas y asistencias.
- Aplicar validaciones (por ejemplo, evitar duplicidad de asistencia por fecha y persona ya está a nivel de DB).
- Crear reportes:
  - Consolidado por área (totales de Presente, Falta, Tardanza, Permiso y rango de fechas).
  - Reporte individual por persona (historial filtrado por fechas).
- Implementar roles/permisos mínimo:
  - Administrador: CRUD completo y acceso a reportes globales.
  - Supervisor: CRUD de asistencias y reportes solo de su área.
  - Colaborador: marcar asistencia y consultar sus propios datos.

Documenta tus endpoints en `NOMENCLATURA-ENDPOINT.md`.

---

## Scripts útiles

- Levantar servidor de desarrollo:
```bash
php artisan serve
```
- Ejecutar pruebas (si agregas tests):
```bash
php artisan test
```

---

¡Éxitos en tu implementación!