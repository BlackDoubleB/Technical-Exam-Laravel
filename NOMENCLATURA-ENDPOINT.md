# NOMENCLATURA-ENDPOINT

---

# AUTENTICACIÓN

## LOGIN

**POST**
`http://127.0.0.1:8000/login`

**Body**

```json
{
  "email": "admin@example.com",
  "password": "password"
}
```

### Usuarios de prueba

* `admin@example.com` → Administrador
* `supervisor@example.com` → Supervisor
* `colaborador@example.com` → Colaborador

---

# AUTORIZACIÓN

Todos los endpoints (excepto login) requieren:

```http
Authorization: Bearer {token}
```

---


# ADMINISTRADOR

### 1. Listar áreas

**GET**
`/api/areas`

---

### 2. Obtener área por ID

**GET**
`/api/areas/{id}`

*  Retorna 404 si no existe

---

### 3. Crear área

**POST**
`/api/areas`

**Body**

```json
{
  "name": "Recursos Humanos",
  "description": "Área de personal",
  "status": 1
}
```

#### Validaciones

* `name` → requerido
* `status` → requerido (boolean)
* `description` → opcional

---

### 4. Actualizar área

**PUT/PATCH**
`/api/areas/{id}`

* mismos campos que creación  
* permite omitir campos

---

### 5. Eliminar área

**DELETE**
`/api/areas/{id}`

#### Validaciones

* No se elimina si tiene personas asociadas, retorna error 400
---

##  PERSONAS (people)

### 1. Listar personas

**GET**
`/api/people`

---

### 2. Obtener persona

**GET**
`/api/people/{id}`

---

### 3. Crear persona

**POST**
`/api/people`

**Body**

```json
{
  "first_name": "Juan",
  "last_name": "Perez",
  "dni_id": "12345678",
  "email": "juan@example.com",
  "area_id": 1
}
```

####  Validaciones

* `first_name` → requerido
* `last_name` → requerido
* `dni_id` → único
* `email` → único
* `area_id` → debe existir

---

### 4. Actualizar persona

**PUT/PATCH**
`/api/people/{id}`

---

### 5. Eliminar persona

**DELETE**
`/api/people/{id}`

---

##  ASISTENCIAS

### 1. Listar asistencias

**GET**
`/api/attendances`

* Incluye relación con persona

---

### 2. Obtener asistencia

**GET**
`/api/attendances/{id}`

---

### 3. Registrar asistencia

**POST**
`/api/attendances`

**Body**

```json
{
  "person_id": 1,
  "date": "2024-01-01",
  "status": "Presente"
}
```

####  Validaciones

* `person_id` → requerido, existe
* `date` → requerido
* `status` → enum:
  * Presente
  * Falta
  * Tardanza
  * Permiso
* No permite duplicados por: persona + fecha

---

### 4. Actualizar asistencia

**PUT/PATCH**
`/api/attendances/{id}`

---

### 5. Eliminar asistencia

**DELETE**
`/api/attendances/{id}`

---

#  REPORTES

##  1. Reporte de áreas

**GET**
`/api/reports/areas`

**Query Params**

```http
?from=2024-01-01&to=2024-01-31
```

### Retorna

* Total Presente
* Total Falta
* Total Tardanza
* Total Permiso

Agrupado por área dentro de un rango de fechas.
Es necesario poner el rango de fechas.

---
##  2. Reporte por áreas

**GET**
`/api/reports/areas`

**Query Params**

```http
?area=Ventas&from=2026-01-01&to=2026-01-31
```

### Retorna

* Total Presente
* Total Falta
* Total Tardanza
* Total Permiso

De un area en especifico dentro de un rango de fechas.


---

#  SUPERVISOR
###  Permisos
* CRUD de asistencias  

###  Restricciones

* Solo puede consultar reporte por área.
* Debe enviar:

```http
?area=NombreArea
```

* No puede consultar global

---

#  COLABORADOR
---
##  Reporte por persona

**GET**
`/api/reports/people`

**Query Params**

```http
?person_id=1&from=2024-01-01&to=2026-01-31
```

###  Permisos
* Solo puede consultar reportes por persona
* Registrar asistencia

###  Restricciones
* No puede ver reportes globales.
* No puede ver reporte por área.

###  Validaciones
* Error 404 cuando no existe el colaborador.
* Error 404 cuando no hay asistencias en un rango de fechas.
---

#  ERRORES

| Código | Descripción           |
| ------ | --------------------- |
| 401    | No autenticado        |
| 403    | No autorizado         |
| 404    | Recurso no encontrado |
| 422    | Error de validación   |
---