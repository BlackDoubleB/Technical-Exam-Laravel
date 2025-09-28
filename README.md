# Evaluación Práctica de Laravel

## Introducción

Bienvenido al repositorio de evaluación práctica de Laravel. Este repositorio contiene tres casos prácticos diseñados para evaluar tus habilidades en el desarrollo con Laravel. Cada caso está diseñado para medir diferentes aspectos del framework, desde la implementación básica de CRUD hasta el uso de autenticación con Sanctum y la aplicación de manejo de roles, areas y asistencias.

## Instrucciones Generales

1. Clona este repositorio en tu máquina local:
```bash
git clone https://github.com/KevinMO05/Technical-Exam-Laravel.git
cd Technical-Exam-Laravel
```
2. Instala las dependencias necesarias:
```bash
composer install
npm install
```
3. Configura tu archivo .env con las credenciales de tu base de datos.
4. Ejecuta las migraciones y los seeders:
```bash
php artisan migrate:fresh --seed
```
5. Lee cuidadosamente las instrucciones de cada caso antes de comenzar.

## Contenido del Repositorio

Este repositorio contiene tres casos prácticos:

1. **Caso 1** : Implementación básica de un CRUD sin autenticación.
2. **Caso 2** : Implementación de un CRUD con autenticación usando Sanctum, paginación, filtrado y ordenamiento.
3. **Caso 3** : Implementación de un CRUD aplicando manejo de roles, areas y asistencias.

Cada caso tiene su propia rama (_caso-1_, _caso-2_, _caso-3_) con un README detallado que describe los requisitos y las historias de usuario correspondientes.
